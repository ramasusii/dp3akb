<?php

namespace app\controllers;

use Yii;
use app\models\BeritaDp3akb;
use app\models\BeritaDp3akbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

class BeritaDp3akbController extends Controller
{
    /**
     * Konfigurasi HTTP method.
     */
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

    /**
     * Daftar berita.
     */
    public function actionIndex()
    {
        $searchModel = new BeritaDp3akbSearch();

        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Detail berita.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Tambah berita.
     */
    public function actionCreate()
    {
        $model = new BeritaDp3akb();

        $model->status = 1;
        $model->is_utama = 0;
        $model->hits = 0;
        $model->tanggal_publish = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal_publish = $this->normalizeDateTime(
                $model->tanggal_publish
            );

            $model->imageFile = UploadedFile::getInstance(
                $model,
                'imageFile'
            );

            if ($model->validate()) {
                $uploadPath = $this->getUploadPath();

                if (!$this->prepareUploadDirectory($uploadPath)) {
                    Yii::$app->session->setFlash(
                        'error',
                        'Folder upload berita tidak dapat dibuat '
                        . 'atau tidak dapat ditulis. Path: '
                        . $uploadPath
                    );

                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                $fileName = $this->generateFileName(
                    $model->imageFile
                );

                $fullPath = $uploadPath
                    . DIRECTORY_SEPARATOR
                    . $fileName;

                if (!$model->imageFile->saveAs($fullPath)) {
                    Yii::$app->session->setFlash(
                        'error',
                        'Gambar berita gagal diunggah.'
                    );

                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                $model->gambar = $fileName;

                if ($model->save(false)) {
                    Yii::$app->session->setFlash(
                        'success',
                        'Berita berhasil ditambahkan.'
                    );

                    return $this->redirect(['index']);
                }

                if (is_file($fullPath)) {
                    @unlink($fullPath);
                }

                Yii::$app->session->setFlash(
                    'error',
                    'Data berita gagal disimpan.'
                );
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Update berita.
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldImage = $model->gambar;

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal_publish = $this->normalizeDateTime(
                $model->tanggal_publish
            );

            $model->imageFile = UploadedFile::getInstance(
                $model,
                'imageFile'
            );

            if ($model->validate()) {
                $newImageName = null;
                $newImagePath = null;

                if ($model->imageFile !== null) {
                    $uploadPath = $this->getUploadPath();

                    if (!$this->prepareUploadDirectory($uploadPath)) {
                        $model->gambar = $oldImage;

                        Yii::$app->session->setFlash(
                            'error',
                            'Folder upload berita tidak dapat dibuat '
                            . 'atau tidak dapat ditulis. Path: '
                            . $uploadPath
                        );

                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }

                    $newImageName = $this->generateFileName(
                        $model->imageFile
                    );

                    $newImagePath = $uploadPath
                        . DIRECTORY_SEPARATOR
                        . $newImageName;

                    if (!$model->imageFile->saveAs($newImagePath)) {
                        $model->gambar = $oldImage;

                        Yii::$app->session->setFlash(
                            'error',
                            'Gambar berita baru gagal diunggah.'
                        );

                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }

                    $model->gambar = $newImageName;
                } else {
                    $model->gambar = $oldImage;
                }

                if ($model->save(false)) {
                    if (
                        $newImageName !== null
                        && !empty($oldImage)
                        && $oldImage !== $newImageName
                    ) {
                        $this->deleteImageFile($oldImage);
                    }

                    Yii::$app->session->setFlash(
                        'success',
                        'Berita berhasil diperbarui.'
                    );

                    return $this->redirect(['index']);
                }

                if (
                    $newImagePath !== null
                    && is_file($newImagePath)
                ) {
                    @unlink($newImagePath);
                }

                $model->gambar = $oldImage;

                Yii::$app->session->setFlash(
                    'error',
                    'Data berita gagal diperbarui.'
                );
            } else {
                $model->gambar = $oldImage;
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Hapus berita.
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $imageName = $model->gambar;

        if ($model->delete()) {
            $this->deleteImageFile($imageName);

            Yii::$app->session->setFlash(
                'success',
                'Berita berhasil dihapus.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Berita gagal dihapus.'
            );
        }

        return $this->redirect(['index']);
    }

    /**
     * Mencari berita berdasarkan ID.
     */
    protected function findModel($id)
    {
        $model = BeritaDp3akb::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'Data berita tidak ditemukan.'
        );
    }

    /**
     * Path folder upload berita.
     */
    private function getUploadPath()
    {
        return Yii::getAlias('@app')
            . DIRECTORY_SEPARATOR
            . 'web'
            . DIRECTORY_SEPARATOR
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'berita';
    }

    /**
     * Memastikan folder upload tersedia dan writable.
     */
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

    /**
     * Membuat nama file unik.
     */
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

        return 'berita_'
            . date('Ymd_His')
            . '_'
            . Yii::$app->security
                ->generateRandomString(10)
            . '.'
            . $extension;
    }

    /**
     * Menghapus file gambar berita.
     */
    private function deleteImageFile($fileName)
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

    /**
     * Mengubah datetime-local menjadi format MySQL.
     */
    private function normalizeDateTime($value)
    {
        if (empty($value)) {
            return null;
        }

        $timestamp = strtotime($value);

        if ($timestamp === false) {
            return null;
        }

        return date('Y-m-d H:i:s', $timestamp);
    }
}