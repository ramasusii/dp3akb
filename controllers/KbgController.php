<?php

namespace app\controllers;

use Yii;
use app\models\KbgAssessment;
use app\models\KbgAnswer;
use app\models\KbgAssessmentLog;
use app\models\KbgQuestionnaire;
use app\models\KbgPetugas;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class KbgController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['Developer', 'SuperAdmin', 'Admin', 'PetugasKBG'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    if (Yii::$app->user->isGuest) {
                        return Yii::$app->response->redirect(
                            ['/site/kbg-login']
                        );
                    }

                    throw new ForbiddenHttpException(
                        'Anda tidak memiliki akses ke modul Kaji Cepat KBG.'
                    );
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['POST', 'GET'],
                    'save' => ['POST'],
                    'autosave' => ['POST'],
                    'submit' => ['POST'],
                    'verify' => ['POST'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest && !$this->isManager()) {
            $petugas = KbgPetugas::current();

            if ($petugas === null || (int) $petugas->is_active !== 1) {
                Yii::$app->user->logout();

                Yii::$app->session->setFlash(
                    'warning',
                    'Akses Petugas KBG belum aktif. Silakan hubungi Admin Provinsi.'
                );

                Yii::$app->response->redirect(['/site/kbg-login']);

                return false;
            }

            if ((int) $petugas->must_change_password === 1
                && $action->id !== 'change-password') {
                Yii::$app->response->redirect([
                    '/kbg/change-password',
                ]);

                return false;
            }
        }

        return true;
    }

    public function actionChangePassword()
    {
        if ($this->isManager()) {
            return $this->redirect(['index']);
        }

        $this->layout = 'kbg-mobile';

        $petugas = KbgPetugas::current();

        if ($petugas === null || (int) $petugas->is_active !== 1) {
            Yii::$app->user->logout();

            return $this->redirect(['/site/kbg-login']);
        }

        $model = new DynamicModel([
            'password',
            'password_repeat',
        ]);

        $model->addRule(
            ['password', 'password_repeat'],
            'required',
            [
                'message' => '{attribute} wajib diisi.',
            ]
        );

        $model->addRule(
            ['password'],
            'string',
            [
                'min' => 8,
                'tooShort' => 'Password minimal 8 karakter.',
            ]
        );

        $model->addRule(
            ['password_repeat'],
            'compare',
            [
                'compareAttribute' => 'password',
                'message' => 'Konfirmasi password tidak sama.',
            ]
        );

        $model->setAttributeLabels([
            'password' => 'Password Baru',
            'password_repeat' => 'Ulangi Password Baru',
        ]);

        if ($model->load(Yii::$app->request->post())
            && $model->validate()) {
            $user = User::findOne((int) Yii::$app->user->id);

            if ($user === null) {
                throw new NotFoundHttpException(
                    'Akun pengguna tidak ditemukan.'
                );
            }

            $user->setPassword($model->password);
            $user->generateAuthKey();

            if (!$user->save(false)) {
                Yii::$app->session->setFlash(
                    'error',
                    'Password belum berhasil disimpan.'
                );

                return $this->refresh();
            }

            $petugas->must_change_password = 0;
            $petugas->password_changed_at = date('Y-m-d H:i:s');
            $petugas->save(false);

            /*
             * Password pertama mengganti auth_key user.
             * Refresh identity + remember-me cookie agar sesi Petugas KBG
             * tidak dianggap logout pada request berikutnya.
             */
            Yii::$app->user->switchIdentity(
                $user,
                3600 * 24 * 30
            );

            Yii::$app->session->setFlash(
                'success',
                'Password berhasil dibuat. Selamat datang di Portal Petugas KBG.'
            );

            return $this->redirect(['/kbg/index']);
        }

        return $this->render('change-password', [
            'model' => $model,
            'petugas' => $petugas,
        ]);
    }

    public function actionIndex()
    {
        $isManager = $this->isManager();
        $this->layout = $isManager ? 'main' : 'kbg-mobile';

        $query = KbgAssessment::find()
            ->orderBy(['updated_at' => SORT_DESC, 'id' => SORT_DESC]);

        $this->applyScope($query);

        $search = trim((string) Yii::$app->request->get('q', ''));
        $status = trim((string) Yii::$app->request->get('status', ''));
        $risk = trim((string) Yii::$app->request->get('risk', ''));
        $regency = trim((string) Yii::$app->request->get('regency', ''));

        if ($search !== '') {
            $query->andWhere([
                'or',
                ['like', 'kode', $search],
                ['like', 'site_name', $search],
                ['like', 'village', $search],
                ['like', 'district', $search],
                ['like', 'regency', $search],
                ['like', 'enumerator_name', $search],
            ]);
        }

        if ($status !== '') {
            $query->andWhere(['status' => $status]);
        }

        if ($risk !== '') {
            $query->andWhere(['risk_level' => $risk]);
        }

        if ($regency !== '') {
            $query->andWhere(['regency' => $regency]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $isManager ? 20 : 10,
            ],
        ]);

        $statsQuery = KbgAssessment::find();
        $this->applyScope($statsQuery);

        $stats = [
            'total' => (int) (clone $statsQuery)->count(),
            'draft' => (int) (clone $statsQuery)
                ->andWhere(['status' => KbgAssessment::STATUS_DRAFT])
                ->count(),
            'submitted' => (int) (clone $statsQuery)
                ->andWhere(['status' => KbgAssessment::STATUS_SUBMITTED])
                ->count(),
            'revision' => (int) (clone $statsQuery)
                ->andWhere(['status' => KbgAssessment::STATUS_REVISION])
                ->count(),
            'verified' => (int) (clone $statsQuery)
                ->andWhere(['status' => KbgAssessment::STATUS_VERIFIED])
                ->count(),
            'critical' => (int) (clone $statsQuery)
                ->andWhere(['>', 'critical_count', 0])
                ->count(),
            'refugees' => $this->sumRefugeesForScope(),
        ];

        $regencies = KbgAssessment::find()
            ->select('regency')
            ->where(['not', ['regency' => null]])
            ->andWhere(['<>', 'regency', ''])
            ->distinct()
            ->orderBy(['regency' => SORT_ASC]);

        $this->applyScope($regencies);

        $view = $isManager ? 'index' : 'petugas-index';

        return $this->render($view, [
            'dataProvider' => $dataProvider,
            'stats' => $stats,
            'isManager' => $isManager,
            'regencies' => $regencies->column(),
            'filters' => [
                'q' => $search,
                'status' => $status,
                'risk' => $risk,
                'regency' => $regency,
            ],
        ]);
    }

    public function actionCreate()
    {
        $model = new KbgAssessment();
        $model->enumerator_id = (int) Yii::$app->user->id;

        $petugas = KbgPetugas::current();

        $model->enumerator_name = $petugas !== null
            ? $petugas->getDisplayName()
            : Yii::$app->user->identity->username;
        $model->assessment_datetime = date('Y-m-d H:i:s');
        $model->status = KbgAssessment::STATUS_DRAFT;
        $model->current_step = 1;
        $model->progress_percent = 0;
        $model->verification_status = 'belum';
        $model->risk_level = 'Belum Ada Flag';

        if (!$model->save()) {
            Yii::$app->session->setFlash(
                'error',
                'Assessment baru gagal dibuat. Silakan coba kembali.'
            );

            return $this->redirect(['index']);
        }

        $this->writeLog(
            $model->id,
            'create',
            'Assessment dibuat sebagai draft.'
        );

        return $this->redirect([
            'form',
            'id' => $model->id,
            'step' => 1,
        ]);
    }

    public function actionForm($id, $step = 1)
    {
        $this->layout = $this->isManager() ? 'main' : 'kbg-mobile';

        $model = $this->findAccessibleModel($id);

        if (!$model->canEdit()) {
            Yii::$app->session->setFlash(
                'warning',
                'Assessment ini sudah dikirim dan tidak dapat diedit sebelum dikembalikan untuk revisi.'
            );

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $step = max(1, min(
            KbgQuestionnaire::TOTAL_STEPS,
            (int) $step
        ));

        $section = KbgQuestionnaire::getSection($step);

        if ($section === null) {
            throw new NotFoundHttpException('Tahap formulir tidak ditemukan.');
        }

        $answerMap = $model->getAnswerMap();

        if ($step === 1) {
            if (!isset($answerMap['q1_1']) || $answerMap['q1_1'] === '') {
                $date = $model->assessment_datetime ?: date('Y-m-d H:i:s');
                $answerMap['q1_1'] = date(
                    'Y-m-d\TH:i',
                    strtotime($date)
                );
            }

            if (!isset($answerMap['q1_2']) || $answerMap['q1_2'] === '') {
                $answerMap['q1_2'] = $model->enumerator_name;
            }
        }

        return $this->render('form', [
            'model' => $model,
            'step' => $step,
            'section' => $section,
            'sections' => KbgQuestionnaire::sections(),
            'answerMap' => $answerMap,
        ]);
    }

    public function actionSave($id, $step)
    {
        $model = $this->findAccessibleModel($id);

        if (!$model->canEdit()) {
            throw new NotFoundHttpException(
                'Assessment tidak dapat diedit.'
            );
        }

        $step = max(1, min(
            KbgQuestionnaire::TOTAL_STEPS,
            (int) $step
        ));

        $posted = Yii::$app->request->post('answers', []);

        if (!is_array($posted)) {
            $posted = [];
        }

        $transaction = Yii::$app->db->beginTransaction();

        try {
            $this->saveStepAnswers($model, $step, $posted);

            $transaction->commit();
        } catch (\Throwable $e) {
            $transaction->rollBack();

            Yii::error(
                'KBG save error: ' . $e->getMessage(),
                __METHOD__
            );

            Yii::$app->session->setFlash(
                'error',
                'Data belum berhasil disimpan. Silakan coba kembali.'
            );

            return $this->redirect([
                'form',
                'id' => $model->id,
                'step' => $step,
            ]);
        }

        $nav = Yii::$app->request->post('nav_action', 'next');

        if ($nav === 'previous') {
            return $this->redirect([
                'form',
                'id' => $model->id,
                'step' => max(1, $step - 1),
            ]);
        }

        if ($nav === 'review'
            || $step >= KbgQuestionnaire::TOTAL_STEPS) {
            Yii::$app->session->setFlash(
                'success',
                'Draft berhasil disimpan. Silakan tinjau sebelum dikirim.'
            );

            return $this->redirect([
                'view',
                'id' => $model->id,
            ]);
        }

        return $this->redirect([
            'form',
            'id' => $model->id,
            'step' => min(
                KbgQuestionnaire::TOTAL_STEPS,
                $step + 1
            ),
        ]);
    }

    public function actionAutosave($id, $step)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = $this->findAccessibleModel($id);

        if (!$model->canEdit()) {
            return [
                'success' => false,
                'message' => 'Assessment tidak dapat diedit.',
            ];
        }

        $posted = Yii::$app->request->post('answers', []);

        if (!is_array($posted)) {
            $posted = [];
        }

        $transaction = Yii::$app->db->beginTransaction();

        try {
            $this->saveStepAnswers(
                $model,
                (int) $step,
                $posted,
                false
            );

            $transaction->commit();

            return [
                'success' => true,
                'message' => 'Draft tersimpan',
                'savedAt' => date('H:i'),
                'progress' => (int) $model->progress_percent,
                'riskLevel' => $model->risk_level,
                'attention' => (int) $model->attention_count,
                'critical' => (int) $model->critical_count,
            ];
        } catch (\Throwable $e) {
            $transaction->rollBack();

            Yii::warning(
                'KBG autosave error: ' . $e->getMessage(),
                __METHOD__
            );

            return [
                'success' => false,
                'message' => 'Autosave gagal',
            ];
        }
    }

    public function actionView($id)
    {
        $this->layout = $this->isManager() ? 'main' : 'kbg-mobile';

        $model = $this->findAccessibleModel($id);
        $answerMap = $model->getAnswerMap();
        $attention = KbgQuestionnaire::attentionSummary($answerMap);

        return $this->render('view', [
            'model' => $model,
            'sections' => KbgQuestionnaire::sections(),
            'answerMap' => $answerMap,
            'attention' => $attention,
            'isManager' => $this->isManager(),
        ]);
    }

    public function actionSubmit($id)
    {
        $model = $this->findAccessibleModel($id);

        if (!$model->canEdit()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $answerMap = $model->getAnswerMap();
        $missing = KbgQuestionnaire::requiredMissing($answerMap);

        if (!empty($missing)) {
            $first = $missing[0];

            Yii::$app->session->setFlash(
                'error',
                'Masih ada data wajib yang belum diisi: '
                . $first['code']
                . ' '
                . $first['label']
                . '.'
            );

            return $this->redirect([
                'form',
                'id' => $model->id,
                'step' => isset($first['step'])
                    ? (int) $first['step']
                    : 1,
            ]);
        }

        $model->recalculateMetrics($answerMap);
        $model->status = KbgAssessment::STATUS_SUBMITTED;
        $model->submitted_at = date('Y-m-d H:i:s');
        $model->verification_status = 'menunggu';

        if ($model->save()) {
            $this->writeLog(
                $model->id,
                'submit',
                'Assessment dikirim untuk verifikasi.'
            );

            Yii::$app->session->setFlash(
                'success',
                'Assessment berhasil dikirim untuk verifikasi.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Assessment gagal dikirim.'
            );
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionVerify($id)
    {
        if (!$this->isManager()) {
            throw new NotFoundHttpException(
                'Anda tidak memiliki akses verifikasi.'
            );
        }

        $model = KbgAssessment::findOne((int) $id);

        if ($model === null) {
            throw new NotFoundHttpException(
                'Assessment tidak ditemukan.'
            );
        }

        $decision = Yii::$app->request->post('decision');
        $note = trim((string) Yii::$app->request->post(
            'verification_note',
            ''
        ));

        if ($decision === 'approve') {
            $model->status = KbgAssessment::STATUS_VERIFIED;
            $model->verification_status = 'disetujui';
            $action = 'verify';
            $message = 'Assessment telah diverifikasi.';
        } elseif ($decision === 'revision') {
            $model->status = KbgAssessment::STATUS_REVISION;
            $model->verification_status = 'revisi';
            $action = 'revision';
            $message = 'Assessment dikembalikan untuk revisi.';
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Keputusan verifikasi tidak valid.'
            );

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->verified_by = (int) Yii::$app->user->id;
        $model->verified_at = date('Y-m-d H:i:s');
        $model->verification_note = $note;

        if ($model->save()) {
            $this->writeLog(
                $model->id,
                $action,
                $note !== '' ? $note : $message
            );

            Yii::$app->session->setFlash('success', $message);
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionDelete($id)
    {
        $model = $this->findAccessibleModel($id);

        $allowed = $this->isManager()
            || (
                $model->enumerator_id == Yii::$app->user->id
                && $model->status === KbgAssessment::STATUS_DRAFT
            );

        if (!$allowed) {
            throw new NotFoundHttpException(
                'Assessment tidak dapat dihapus.'
            );
        }

        $model->delete();

        Yii::$app->session->setFlash(
            'success',
            'Assessment berhasil dihapus.'
        );

        return $this->redirect(['index']);
    }

    public function actionMap()
    {
        $this->layout = $this->isManager() ? 'main' : 'kbg-mobile';

        $query = KbgAssessment::find()
            ->where(['not', ['latitude' => null]])
            ->andWhere(['not', ['longitude' => null]])
            ->orderBy(['updated_at' => SORT_DESC]);

        $this->applyScope($query);

        $models = $query->all();

        return $this->render('map', [
            'models' => $models,
            'isManager' => $this->isManager(),
        ]);
    }

    public function actionExportCsv()
    {
        $query = KbgAssessment::find()
            ->orderBy(['updated_at' => SORT_DESC]);

        $this->applyScope($query);

        $models = $query->all();

        $filename = 'kbg-assessment-'
            . date('Ymd-His')
            . '.csv';

        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->headers->set(
            'Content-Type',
            'text/csv; charset=UTF-8'
        );
        Yii::$app->response->headers->set(
            'Content-Disposition',
            'attachment; filename="' . $filename . '"'
        );

        $handle = fopen('php://temp', 'r+');

        // BOM agar Excel membaca UTF-8 dengan benar.
        fwrite($handle, "\xEF\xBB\xBF");

        fputcsv($handle, [
            'Kode',
            'Status',
            'Tanggal Pendataan',
            'Nama Pos',
            'Desa/Kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Jenis Pengungsian',
            'Skala',
            'Petugas',
            'Progress (%)',
            'Indikator Sistem',
            'Flag Kritis',
            'Flag Perhatian',
            'Latitude',
            'Longitude',
            'Dibuat',
            'Diperbarui',
        ]);

        foreach ($models as $model) {
            fputcsv($handle, [
                $model->kode,
                $model->getStatusLabel(),
                $model->assessment_datetime,
                $model->site_name,
                $model->village,
                $model->district,
                $model->regency,
                $model->province,
                $model->settlement_type,
                $model->settlement_size,
                $model->enumerator_name,
                $model->progress_percent,
                $model->risk_level,
                $model->critical_count,
                $model->attention_count,
                $model->latitude,
                $model->longitude,
                $model->created_at,
                $model->updated_at,
            ]);
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return $content;
    }

    public function actionPrint($id)
    {
        $model = $this->findAccessibleModel($id);
        $answerMap = $model->getAnswerMap();
        $attention = KbgQuestionnaire::attentionSummary($answerMap);

        $this->layout = false;

        return $this->render('print', [
            'model' => $model,
            'sections' => KbgQuestionnaire::sections(),
            'answerMap' => $answerMap,
            'attention' => $attention,
        ]);
    }

    private function saveStepAnswers(
        KbgAssessment $model,
        $step,
        array $posted,
        $writeLog = true
    ) {
        $section = KbgQuestionnaire::getSection($step);

        if ($section === null) {
            throw new \RuntimeException(
                'Tahap formulir tidak ditemukan.'
            );
        }

        $answerMap = $model->getAnswerMap();

        // Gabungkan sementara supaya conditional field dapat dievaluasi
        // menggunakan jawaban yang baru dipilih.
        foreach ($posted as $key => $value) {
            $answerMap[$key] = $value;
        }

        foreach ($section['questions'] as $question) {
            $key = $question['key'];

            if (!KbgQuestionnaire::isApplicable(
                $question,
                $answerMap
            )) {
                KbgAnswer::deleteAll([
                    'assessment_id' => $model->id,
                    'question_key' => $key,
                ]);

                unset($answerMap[$key]);

                continue;
            }

            $value = array_key_exists($key, $posted)
                ? $posted[$key]
                : null;

            if ($question['type'] === 'checkbox'
                && $value === null) {
                $value = [];
            }

            if (!KbgQuestionnaire::isAnswered($value)) {
                KbgAnswer::deleteAll([
                    'assessment_id' => $model->id,
                    'question_key' => $key,
                ]);

                unset($answerMap[$key]);

                continue;
            }

            $answer = KbgAnswer::findOne([
                'assessment_id' => $model->id,
                'question_key' => $key,
            ]);

            if ($answer === null) {
                $answer = new KbgAnswer();
                $answer->assessment_id = $model->id;
                $answer->question_key = $key;
            }

            $answer->section_step = (int) $step;
            $answer->question_code = $question['code'];
            $answer->question_text = $question['label'];
            $answer->answer_type = $question['type'];
            $answer->setEncodedValue($value);

            if (!$answer->save()) {
                throw new \RuntimeException(
                    'Gagal menyimpan jawaban '
                    . $question['code']
                    . '.'
                );
            }

            $answerMap[$key] = $value;
        }

        // Baca ulang untuk memastikan jawaban conditional yang dihapus
        // tidak ikut menghitung progress.
        $freshAnswers = KbgAnswer::find()
            ->where(['assessment_id' => $model->id])
            ->all();

        $answerMap = [];

        foreach ($freshAnswers as $answer) {
            $answerMap[$answer->question_key]
                = $answer->getDecodedValue();
        }

        $model->syncMetadataFromAnswers($answerMap);
        $model->current_step = (int) $step;
        $model->recalculateMetrics($answerMap);

        if (!$model->save()) {
            throw new \RuntimeException(
                'Gagal memperbarui assessment.'
            );
        }

        if ($writeLog) {
            $this->writeLog(
                $model->id,
                'save_step',
                'Tahap ' . (int) $step . ' disimpan.'
            );
        }
    }

    private function findAccessibleModel($id)
    {
        $model = KbgAssessment::findOne((int) $id);

        if ($model === null) {
            throw new NotFoundHttpException(
                'Assessment tidak ditemukan.'
            );
        }

        if (!$this->isManager()
            && (int) $model->enumerator_id
                !== (int) Yii::$app->user->id) {
            throw new NotFoundHttpException(
                'Assessment tidak ditemukan.'
            );
        }

        return $model;
    }

    private function isManager()
    {
        return Yii::$app->user->can('Developer')
            || Yii::$app->user->can('SuperAdmin')
            || Yii::$app->user->can('Admin');
    }

    private function applyScope($query)
    {
        if (!$this->isManager()) {
            $query->andWhere([
                'enumerator_id' => (int) Yii::$app->user->id,
            ]);
        }
    }

    private function sumRefugeesForScope()
    {
        $query = KbgAnswer::find()
            ->alias('a')
            ->innerJoin(
                ['s' => KbgAssessment::tableName()],
                's.id = a.assessment_id'
            )
            ->where(['a.question_key' => 'q6_1']);

        if (!$this->isManager()) {
            $query->andWhere([
                's.enumerator_id' => (int) Yii::$app->user->id,
            ]);
        }

        $value = $query
            ->select(new Expression(
                'COALESCE(SUM(CAST(a.answer_value AS UNSIGNED)), 0)'
            ))
            ->scalar();

        return (int) $value;
    }

    private function writeLog($assessmentId, $action, $note = null)
    {
        $log = new KbgAssessmentLog();
        $log->assessment_id = (int) $assessmentId;
        $log->user_id = (int) Yii::$app->user->id;
        $log->action = $action;
        $log->note = $note;
        $log->save(false);
    }
}
