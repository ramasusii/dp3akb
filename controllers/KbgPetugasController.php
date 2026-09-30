<?php

namespace app\controllers;

use Yii;
use app\models\KbgPetugas;
use app\models\Pegawai;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

class KbgPetugasController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['Developer', 'SuperAdmin', 'Admin'],
                    ],
                ],
                'denyCallback' => function () {
                    throw new ForbiddenHttpException(
                        'Hanya Admin Provinsi yang dapat mengelola Petugas KBG.'
                    );
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'activate' => ['POST'],
                    'activate-selected' => ['POST'],
                    'deactivate' => ['POST'],
                    'reset-password' => ['POST'],
                    'sync' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = KbgPetugas::find()
            ->alias('kp')
            ->joinWith(['pegawai p', 'user u'])
            ->orderBy([
                'kp.is_active' => SORT_DESC,
                'p.nama' => SORT_ASC,
            ]);

        $q = trim((string) Yii::$app->request->get('q', ''));
        $status = trim((string) Yii::$app->request->get('status', ''));
        $unit = trim((string) Yii::$app->request->get('unit', ''));

        if ($q !== '') {
            $query->andWhere([
                'or',
                ['like', 'p.nama', $q],
                ['like', 'p.nip', $q],
                ['like', 'p.jabatan', $q],
                ['like', 'p.unit_kerja', $q],
            ]);
        }

        if ($status === 'active') {
            $query->andWhere(['kp.is_active' => 1]);
        } elseif ($status === 'inactive') {
            $query->andWhere(['kp.is_active' => 0]);
        }

        if ($unit !== '') {
            $query->andWhere(['p.unit_kerja' => $unit]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $stats = [
            'total' => (int) KbgPetugas::find()->count(),
            'active' => (int) KbgPetugas::find()
                ->where(['is_active' => 1])
                ->count(),
            'inactive' => (int) KbgPetugas::find()
                ->where(['is_active' => 0])
                ->count(),
        ];

        $units = Pegawai::find()
            ->select('unit_kerja')
            ->where(['not', ['unit_kerja' => null]])
            ->andWhere(['<>', 'unit_kerja', ''])
            ->distinct()
            ->orderBy(['unit_kerja' => SORT_ASC])
            ->column();

        $credentials = Yii::$app->session->getFlash(
            'kbg_credentials',
            []
        );

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'stats' => $stats,
            'units' => $units,
            'filters' => [
                'q' => $q,
                'status' => $status,
                'unit' => $unit,
            ],
            'credentials' => $credentials,
        ]);
    }

    public function actionSync()
    {
        $result = $this->syncFromPegawai();

        Yii::$app->session->setFlash(
            'success',
            'Sinkronisasi selesai. '
            . $result['registry']
            . ' registry dan '
            . $result['users']
            . ' akun login baru disiapkan.'
        );

        return $this->redirect(['index']);
    }

    public function actionActivate($id)
    {
        $model = $this->findModel($id);
        $credential = $this->activatePetugas($model);

        if ($credential !== null) {
            Yii::$app->session->setFlash(
                'kbg_credentials',
                [$credential]
            );
        }

        Yii::$app->session->setFlash(
            'success',
            'Petugas KBG berhasil diaktifkan.'
        );

        return $this->redirect(['index']);
    }

    public function actionActivateSelected()
    {
        $ids = Yii::$app->request->post('selection', []);

        if (!is_array($ids) || empty($ids)) {
            Yii::$app->session->setFlash(
                'warning',
                'Pilih minimal satu pegawai yang akan diaktifkan.'
            );

            return $this->redirect(['index']);
        }

        $credentials = [];
        $activated = 0;

        foreach ($ids as $id) {
            $model = KbgPetugas::findOne((int) $id);

            if ($model === null || (int) $model->is_active === 1) {
                continue;
            }

            $credential = $this->activatePetugas($model);

            if ($credential !== null) {
                $credentials[] = $credential;
            }

            $activated++;
        }

        if (!empty($credentials)) {
            Yii::$app->session->setFlash(
                'kbg_credentials',
                $credentials
            );
        }

        Yii::$app->session->setFlash(
            'success',
            $activated . ' Petugas KBG berhasil diaktifkan.'
        );

        return $this->redirect(['index']);
    }

    public function actionDeactivate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;

        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($user !== null) {
                $this->revokePetugasRole($user->id);

                // Akun yang dibuat khusus KBG boleh dinonaktifkan total.
                // Akun lama yang sudah ada di sistem tidak dimatikan agar
                // akses modul lain tidak ikut terpengaruh.
                if ((int) $model->account_owned === 1) {
                    $user->status = User::STATUS_INACTIVE;
                    $user->save(false);
                }
            }

            $model->is_active = 0;
            $model->deactivated_at = date('Y-m-d H:i:s');
            $model->save(false);

            $transaction->commit();
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }

        Yii::$app->session->setFlash(
            'success',
            'Akses Petugas KBG berhasil dinonaktifkan. Data assessment lama tetap tersimpan.'
        );

        return $this->redirect(['index']);
    }

    public function actionResetPassword($id)
    {
        $model = $this->findModel($id);
        $user = $this->ensureUser($model);

        if ((int) $model->account_owned !== 1) {
            Yii::$app->session->setFlash(
                'warning',
                'Akun ini merupakan akun lama sistem. Password tidak direset dari modul KBG agar akses lain tidak terganggu.'
            );

            return $this->redirect(['index']);
        }

        $password = $this->generateTemporaryPassword();

        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        $user->save(false);

        $model->must_change_password = 1;
        $model->password_changed_at = null;
        $model->save(false);

        Yii::$app->session->setFlash('kbg_credentials', [[
            'name' => $model->getDisplayName(),
            'nip' => $model->getNip(),
            'password' => $password,
        ]]);

        Yii::$app->session->setFlash(
            'success',
            'Password sementara berhasil dibuat ulang.'
        );

        return $this->redirect(['index']);
    }

    private function activatePetugas(KbgPetugas $model)
    {
        $pegawai = $model->pegawai;

        if ($pegawai === null || trim((string) $pegawai->nip) === '') {
            throw new \RuntimeException(
                'Pegawai tidak memiliki NIP sehingga belum dapat dibuatkan akun login.'
            );
        }

        $transaction = Yii::$app->db->beginTransaction();

        try {
            $user = $this->ensureUser($model);
            $password = null;

            if ((int) $model->account_owned === 1) {
                $password = $this->generateTemporaryPassword();
                $user->setPassword($password);
                $user->generateAuthKey();
                $user->status = User::STATUS_ACTIVE;
                $user->save(false);
                $model->must_change_password = 1;
                $model->password_changed_at = null;
            } else {
                // Akun lama tidak direset agar password layanan lain aman.
                if ((int) $user->status !== User::STATUS_ACTIVE) {
                    $user->status = User::STATUS_ACTIVE;
                    $user->save(false);
                }
                $model->must_change_password = 0;
            }

            $this->assignPetugasRole($user->id);

            $model->is_active = 1;
            $model->activated_at = date('Y-m-d H:i:s');
            $model->activated_by = (int) Yii::$app->user->id;
            $model->deactivated_at = null;
            $model->save(false);

            $transaction->commit();

            if ($password !== null) {
                return [
                    'name' => $model->getDisplayName(),
                    'nip' => $model->getNip(),
                    'password' => $password,
                ];
            }

            return null;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    private function ensureUser(KbgPetugas $model)
    {
        if ($model->user !== null) {
            return $model->user;
        }

        $pegawai = $model->pegawai;
        $nip = trim((string) ($pegawai !== null ? $pegawai->nip : ''));

        if ($nip === '') {
            throw new \RuntimeException(
                'NIP pegawai kosong.'
            );
        }

        $existing = User::find()
            ->where(['username' => $nip])
            ->one();

        if ($existing !== null) {
            $model->user_id = $existing->id;
            $model->account_owned = 0;
            $model->save(false);

            return $existing;
        }

        $user = new User();
        $user->username = $nip;
        $user->email = trim((string) $pegawai->email) !== ''
            ? trim((string) $pegawai->email)
            : $nip . '@kbg.internal';
        $user->status = User::STATUS_INACTIVE;
        $user->setPassword(Yii::$app->security->generateRandomString(48));
        $user->generateAuthKey();

        if (!$user->save(false)) {
            throw new \RuntimeException(
                'Akun login gagal dibuat.'
            );
        }

        $model->user_id = $user->id;
        $model->account_owned = 1;
        $model->must_change_password = 1;
        $model->save(false);

        return $user;
    }

    private function syncFromPegawai()
    {
        $pegawaiList = Pegawai::find()
            ->where(['status' => 1])
            ->andWhere(['not', ['nip' => null]])
            ->andWhere(['<>', 'nip', ''])
            ->orderBy(['id' => SORT_ASC])
            ->all();

        $registryCount = 0;
        $userCount = 0;

        foreach ($pegawaiList as $pegawai) {
            $registry = KbgPetugas::findOne([
                'pegawai_id' => $pegawai->id,
            ]);

            if ($registry === null) {
                $registry = new KbgPetugas();
                $registry->pegawai_id = $pegawai->id;
                $registry->is_active = 0;
                $registry->account_owned = 1;
                $registry->must_change_password = 1;
                $registry->save(false);
                $registryCount++;
            }

            if ($registry->user_id === null) {
                $before = User::find()
                    ->where(['username' => trim((string) $pegawai->nip)])
                    ->one();

                $this->ensureUser($registry);

                if ($before === null) {
                    $userCount++;
                }
            }
        }

        return [
            'registry' => $registryCount,
            'users' => $userCount,
        ];
    }

    private function assignPetugasRole($userId)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole('PetugasKBG');

        if ($role === null) {
            throw new \RuntimeException(
                'Role PetugasKBG belum tersedia. Import SQL modul KBG terlebih dahulu.'
            );
        }

        if ($auth->getAssignment('PetugasKBG', (string) $userId) === null) {
            $auth->assign($role, (string) $userId);
        }
    }

    private function revokePetugasRole($userId)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole('PetugasKBG');

        if ($role !== null) {
            $auth->revoke($role, (string) $userId);
        }
    }

    private function generateTemporaryPassword()
    {
        $raw = Yii::$app->security->generateRandomString(10);
        $clean = preg_replace('/[^A-Za-z0-9]/', '', $raw);

        if (strlen($clean) < 8) {
            $clean .= substr(md5(uniqid('', true)), 0, 8);
        }

        return 'KBG#' . substr($clean, 0, 8);
    }

    private function findModel($id)
    {
        $model = KbgPetugas::find()
            ->with(['pegawai', 'user'])
            ->where(['id' => (int) $id])
            ->one();

        if ($model === null) {
            throw new NotFoundHttpException(
                'Data Petugas KBG tidak ditemukan.'
            );
        }

        return $model;
    }
}
