<?php

namespace app\controllers;

use Yii;
use app\models\Banner;
use app\models\BannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

class BannerController extends Controller
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
     * Daftar banner.
     */
    public function actionIndex()
    {
        $searchModel = new BannerSearch();

        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );

        $dataProvider->sort->defaultOrder = [
            'urutan' => SORT_ASC,
            'id' => SORT_DESC,
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Detail banner.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Tambah banner.
     */
    public function actionCreate()
    {
        $model = new Banner();

        $model->status = 1;
        $model->urutan = 0;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance(
                $model,
                'imageFile'
            );

            /*
             * Validasi model, termasuk:
             * - gambar wajib saat create
             * - maksimal 1 MB
             * - resolusi 1600 x 686
             */
            if ($model->validate()) {
                $uploadPath = $this->getUploadPath();

                if (!$this->prepareUploadDirectory($uploadPath)) {
                    Yii::$app->session->setFlash(
                        'error',
                        'Folder upload banner tidak dapat dibuat atau '
                        . 'tidak dapat ditulis. Path: '
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
                        'Gambar banner gagal diunggah.'
                    );

                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                $model->gambar = $fileName;

                if ($model->save(false)) {
                    Yii::$app->session->setFlash(
                        'success',
                        'Banner berhasil ditambahkan.'
                    );

                    return $this->redirect(['index']);
                }

                /*
                 * Jika file berhasil diunggah tetapi database gagal,
                 * hapus file agar tidak menjadi file sampah.
                 */
                if (is_file($fullPath)) {
                    @unlink($fullPath);
                }

                Yii::$app->session->setFlash(
                    'error',
                    'Data banner gagal disimpan.'
                );
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Update banner.
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldImage = $model->gambar;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance(
                $model,
                'imageFile'
            );

            /*
             * Saat update, imageFile boleh kosong.
             * Jika kosong, gambar lama akan dipertahankan.
             */
            if ($model->validate()) {
                $newImageName = null;
                $newImagePath = null;

                if ($model->imageFile !== null) {
                    $uploadPath = $this->getUploadPath();

                    if (!$this->prepareUploadDirectory($uploadPath)) {
                        $model->gambar = $oldImage;

                        Yii::$app->session->setFlash(
                            'error',
                            'Folder upload banner tidak dapat dibuat atau '
                            . 'tidak dapat ditulis. Path: '
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
                            'Gambar banner baru gagal diunggah.'
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
                    /*
                     * Hapus gambar lama setelah:
                     * 1. gambar baru berhasil diunggah
                     * 2. perubahan database berhasil disimpan
                     */
                    if (
                        $newImageName !== null
                        && !empty($oldImage)
                        && $oldImage !== $newImageName
                    ) {
                        $this->deleteImageFile($oldImage);
                    }

                    Yii::$app->session->setFlash(
                        'success',
                        'Banner berhasil diperbarui.'
                    );

                    return $this->redirect(['index']);
                }

                /*
                 * Database gagal menyimpan.
                 * Hapus file baru dan gunakan kembali gambar lama.
                 */
                if (
                    $newImagePath !== null
                    && is_file($newImagePath)
                ) {
                    @unlink($newImagePath);
                }

                $model->gambar = $oldImage;

                Yii::$app->session->setFlash(
                    'error',
                    'Data banner gagal diperbarui.'
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
     * Hapus banner.
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $imageName = $model->gambar;

        if ($model->delete()) {
            $this->deleteImageFile($imageName);

            Yii::$app->session->setFlash(
                'success',
                'Banner berhasil dihapus.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Banner gagal dihapus.'
            );
        }

        return $this->redirect(['index']);
    }

    /**
     * Mencari data Banner berdasarkan ID.
     */
    protected function findModel($id)
    {
        $model = Banner::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'Data banner tidak ditemukan.'
        );
    }

    /**
     * Path fisik folder upload banner.
     *
     * Hasil pada Mac kakak:
     * /Applications/XAMPP/xamppfiles/htdocs/dp3akb/web/uploads/banner
     */
    private function getUploadPath()
    {
        return Yii::getAlias('@app')
            . DIRECTORY_SEPARATOR
            . 'web'
            . DIRECTORY_SEPARATOR
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'banner';
    }

    /**
     * Memastikan folder tersedia dan writable.
     */
    private function prepareUploadDirectory($path)
    {
        /*
         * Bersihkan cache informasi file PHP.
         */
        clearstatcache(true, $path);

        if (!is_dir($path)) {
            try {
                if (!mkdir($path, 0775, true) && !is_dir($path)) {
                    Yii::error(
                        'Gagal membuat folder banner: ' . $path,
                        __METHOD__
                    );

                    return false;
                }
            } catch (\Throwable $e) {
                Yii::error(
                    'Exception saat membuat folder banner: '
                    . $e->getMessage()
                    . ' | Path: '
                    . $path,
                    __METHOD__
                );

                return false;
            }
        }

        clearstatcache(true, $path);

        if (!is_dir($path)) {
            Yii::error(
                'Path upload bukan folder: ' . $path,
                __METHOD__
            );

            return false;
        }

        if (!is_writable($path)) {
            Yii::error(
                'Folder upload tidak writable. '
                . 'Path: '
                . $path
                . ' | Permission: '
                . $this->getPermission($path),
                __METHOD__
            );

            return false;
        }

        /*
         * Tes tulis sungguhan dari proses PHP/Apache.
         * Ini lebih akurat daripada hanya is_writable().
         */
        $testFile = $path
            . DIRECTORY_SEPARATOR
            . '.write-test-'
            . uniqid('', true);

        $testResult = @file_put_contents(
            $testFile,
            'test'
        );

        if ($testResult === false) {
            Yii::error(
                'PHP tidak dapat membuat file tes di folder upload. '
                . 'Path: '
                . $path
                . ' | Permission: '
                . $this->getPermission($path),
                __METHOD__
            );

            return false;
        }

        if (is_file($testFile)) {
            @unlink($testFile);
        }

        return true;
    }

    /**
     * Membuat nama file unik dan aman.
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

        return 'banner_'
            . date('Ymd_His')
            . '_'
            . Yii::$app->security->generateRandomString(10)
            . '.'
            . $extension;
    }

    /**
     * Hapus gambar banner dari folder upload.
     */
    private function deleteImageFile($fileName)
    {
        if (empty($fileName)) {
            return;
        }

        /*
         * basename mencegah path traversal.
         */
        $safeFileName = basename($fileName);

        $filePath = $this->getUploadPath()
            . DIRECTORY_SEPARATOR
            . $safeFileName;

        if (is_file($filePath)) {
            if (!@unlink($filePath)) {
                Yii::warning(
                    'File banner tidak berhasil dihapus: '
                    . $filePath,
                    __METHOD__
                );
            }
        }
    }

    /**
     * Mendapatkan permission folder untuk log.
     */
    private function getPermission($path)
    {
        $permission = @fileperms($path);

        if ($permission === false) {
            return 'tidak diketahui';
        }

        return substr(
            sprintf('%o', $permission),
            -4
        );
    }
}