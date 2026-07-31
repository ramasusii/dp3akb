<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

class PegawaiController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),

                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();

        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Pegawai();

        $model->jenis_pegawai = 'ASN';
        $model->status = 1;
        $model->urutan = 0;

        if ($model->load(Yii::$app->request->post())) {
            $model->fotoFile = UploadedFile::getInstance(
                $model,
                'fotoFile'
            );

            if ($model->validate()) {
                $newFotoName = null;
                $newFotoPath = null;

                if ($model->fotoFile !== null) {
                    $uploadPath = $this->getUploadPath();

                    if (!$this->prepareUploadDirectory($uploadPath)) {
                        Yii::$app->session->setFlash(
                            'error',
                            'Folder upload foto pegawai tidak dapat ditulis. '
                            . 'Path: ' . $uploadPath
                        );

                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }

                    $newFotoName = $this->generateFileName(
                        $model->fotoFile
                    );

                    $newFotoPath = $uploadPath
                        . DIRECTORY_SEPARATOR
                        . $newFotoName;

                    if (!$model->fotoFile->saveAs($newFotoPath)) {
                        Yii::$app->session->setFlash(
                            'error',
                            'Foto pegawai gagal diunggah.'
                        );

                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }

                    $model->foto = $newFotoName;
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash(
                        'success',
                        'Data pegawai berhasil ditambahkan.'
                    );

                    return $this->redirect(['index']);
                }

                if (
                    $newFotoPath !== null
                    && is_file($newFotoPath)
                ) {
                    @unlink($newFotoPath);
                }

                Yii::$app->session->setFlash(
                    'error',
                    'Data pegawai gagal disimpan.'
                );
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldFoto = $model->foto;

        if ($model->load(Yii::$app->request->post())) {
            $model->fotoFile = UploadedFile::getInstance(
                $model,
                'fotoFile'
            );

            if ($model->validate()) {
                $newFotoName = null;
                $newFotoPath = null;

                if ($model->fotoFile !== null) {
                    $uploadPath = $this->getUploadPath();

                    if (!$this->prepareUploadDirectory($uploadPath)) {
                        $model->foto = $oldFoto;

                        Yii::$app->session->setFlash(
                            'error',
                            'Folder upload foto pegawai tidak dapat ditulis. '
                            . 'Path: ' . $uploadPath
                        );

                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }

                    $newFotoName = $this->generateFileName(
                        $model->fotoFile
                    );

                    $newFotoPath = $uploadPath
                        . DIRECTORY_SEPARATOR
                        . $newFotoName;

                    if (!$model->fotoFile->saveAs($newFotoPath)) {
                        $model->foto = $oldFoto;

                        Yii::$app->session->setFlash(
                            'error',
                            'Foto pegawai baru gagal diunggah.'
                        );

                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }

                    $model->foto = $newFotoName;
                } else {
                    $model->foto = $oldFoto;
                }

                if ($model->save(false)) {
                    if (
                        $newFotoName !== null
                        && !empty($oldFoto)
                        && $oldFoto !== $newFotoName
                    ) {
                        $this->deleteFotoFile($oldFoto);
                    }

                    Yii::$app->session->setFlash(
                        'success',
                        'Data pegawai berhasil diperbarui.'
                    );

                    return $this->redirect(['index']);
                }

                if (
                    $newFotoPath !== null
                    && is_file($newFotoPath)
                ) {
                    @unlink($newFotoPath);
                }

                $model->foto = $oldFoto;

                Yii::$app->session->setFlash(
                    'error',
                    'Data pegawai gagal diperbarui.'
                );
            } else {
                $model->foto = $oldFoto;
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $fotoName = $model->foto;

        if ($model->delete()) {
            $this->deleteFotoFile($fotoName);

            Yii::$app->session->setFlash(
                'success',
                'Data pegawai berhasil dihapus.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Data pegawai gagal dihapus.'
            );
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = Pegawai::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'Data pegawai tidak ditemukan.'
        );
    }

    private function getUploadPath()
    {
        return Yii::getAlias('@app')
            . DIRECTORY_SEPARATOR
            . 'web'
            . DIRECTORY_SEPARATOR
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'pegawai';
    }

    private function prepareUploadDirectory($path)
    {
        clearstatcache(true, $path);

        if (!is_dir($path)) {
            try {
                if (
                    !mkdir($path, 0775, true)
                    && !is_dir($path)
                ) {
                    return false;
                }
            } catch (\Throwable $e) {
                Yii::error(
                    $e->getMessage(),
                    __METHOD__
                );

                return false;
            }
        }

        clearstatcache(true, $path);

        if (!is_dir($path) || !is_writable($path)) {
            return false;
        }

        $testFile = $path
            . DIRECTORY_SEPARATOR
            . '.write-test-'
            . uniqid('', true);

        if (@file_put_contents($testFile, 'test') === false) {
            return false;
        }

        if (is_file($testFile)) {
            @unlink($testFile);
        }

        return true;
    }

    private function generateFileName(UploadedFile $file)
    {
        $extension = strtolower(
            pathinfo(
                $file->name,
                PATHINFO_EXTENSION
            )
        );

        if (empty($extension)) {
            $extension = strtolower($file->extension);
        }

        return 'pegawai_'
            . date('Ymd_His')
            . '_'
            . Yii::$app->security
                ->generateRandomString(10)
            . '.'
            . $extension;
    }

    private function deleteFotoFile($fileName)
    {
        if (empty($fileName)) {
            return;
        }

        $filePath = $this->getUploadPath()
            . DIRECTORY_SEPARATOR
            . basename($fileName);

        if (is_file($filePath)) {
            @unlink($filePath);
        }
    }
}