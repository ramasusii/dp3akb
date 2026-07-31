<?php

namespace app\controllers;

use Yii;
use app\models\KontenEdukasi;
use app\models\KontenEdukasiSearch;
use app\models\KategoriEdukasi;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class KontenEdukasiController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),

                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],

                'verbs' => [
                    'class' => VerbFilter::className(),

                    'actions' => [
                        'delete' => ['POST'],
                        'toggle-status' => ['POST'],
                        'toggle-utama' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new KontenEdukasiSearch();

        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );

        $kategoriList = $this->getKategoriList(false);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'kategoriList' => $kategoriList,
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
        $model = new KontenEdukasi();

        $model->jenis_konten = 'video';
        $model->status = 1;
        $model->is_utama = 0;
        $model->hits = 0;
        $model->jumlah_download = 0;
        $model->tanggal_publish = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            $model->thumbnailFile = UploadedFile::getInstance(
                $model,
                'thumbnailFile'
            );

            $model->mediaFile = UploadedFile::getInstance(
                $model,
                'mediaFile'
            );

            if (!$this->validateMediaRequirement($model, true)) {
                return $this->render('create', [
                    'model' => $model,
                    'kategoriList' => $this->getKategoriList(),
                ]);
            }

            if ($model->validate()) {
                $uploadedFiles = [];

                if ($model->thumbnailFile !== null) {
                    $thumbnailResult = $this->uploadFile(
                        $model->thumbnailFile,
                        'thumbnail',
                        'thumbnail'
                    );

                    if ($thumbnailResult === null) {
                        return $this->render('create', [
                            'model' => $model,
                            'kategoriList' => $this->getKategoriList(),
                        ]);
                    }

                    $model->thumbnail = $thumbnailResult['name'];

                    $uploadedFiles[] = $thumbnailResult['path'];
                }

                if (
                    $model->jenis_konten !== 'video'
                    && $model->mediaFile !== null
                ) {
                    $folder = $model->jenis_konten === 'ebook'
                        ? 'ebook'
                        : 'infografis';

                    $prefix = $model->jenis_konten === 'ebook'
                        ? 'ebook'
                        : 'infografis';

                    $mediaResult = $this->uploadFile(
                        $model->mediaFile,
                        $folder,
                        $prefix
                    );

                    if ($mediaResult === null) {
                        $this->deleteUploadedPaths($uploadedFiles);

                        return $this->render('create', [
                            'model' => $model,
                            'kategoriList' => $this->getKategoriList(),
                        ]);
                    }

                    $model->file_media = $mediaResult['name'];
                    $model->nama_file_asli = $model->mediaFile->name;
                    $model->ukuran_file = $model->mediaFile->size;

                    $uploadedFiles[] = $mediaResult['path'];
                }

                if ($model->jenis_konten === 'video') {
                    $model->file_media = null;
                    $model->nama_file_asli = null;
                    $model->ukuran_file = null;
                    $model->jumlah_halaman = null;
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash(
                        'success',
                        'Konten edukasi berhasil ditambahkan.'
                    );

                    return $this->redirect([
                        'view',
                        'id' => $model->id,
                    ]);
                }

                $this->deleteUploadedPaths($uploadedFiles);

                Yii::$app->session->setFlash(
                    'error',
                    'Konten edukasi gagal disimpan.'
                );
            }
        }

        return $this->render('create', [
            'model' => $model,
            'kategoriList' => $this->getKategoriList(),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldThumbnail = $model->thumbnail;
        $oldMedia = $model->file_media;
        $oldJenis = $model->jenis_konten;
        $oldNamaFile = $model->nama_file_asli;
        $oldUkuranFile = $model->ukuran_file;

        if ($model->load(Yii::$app->request->post())) {
            $model->thumbnailFile = UploadedFile::getInstance(
                $model,
                'thumbnailFile'
            );

            $model->mediaFile = UploadedFile::getInstance(
                $model,
                'mediaFile'
            );

            if (!$this->validateMediaRequirement($model, false)) {
                $model->thumbnail = $oldThumbnail;
                $model->file_media = $oldMedia;
                $model->nama_file_asli = $oldNamaFile;
                $model->ukuran_file = $oldUkuranFile;

                return $this->render('update', [
                    'model' => $model,
                    'kategoriList' => $this->getKategoriList(),
                ]);
            }

            if ($model->validate()) {
                $newUploadedPaths = [];
                $newThumbnailName = null;
                $newMediaName = null;

                if ($model->thumbnailFile !== null) {
                    $thumbnailResult = $this->uploadFile(
                        $model->thumbnailFile,
                        'thumbnail',
                        'thumbnail'
                    );

                    if ($thumbnailResult === null) {
                        $this->restoreOldFiles(
                            $model,
                            $oldThumbnail,
                            $oldMedia,
                            $oldNamaFile,
                            $oldUkuranFile
                        );

                        return $this->render('update', [
                            'model' => $model,
                            'kategoriList' => $this->getKategoriList(),
                        ]);
                    }

                    $newThumbnailName = $thumbnailResult['name'];
                    $model->thumbnail = $newThumbnailName;

                    $newUploadedPaths[] = $thumbnailResult['path'];
                } else {
                    $model->thumbnail = $oldThumbnail;
                }

                if ($model->jenis_konten === 'video') {
                    $model->file_media = null;
                    $model->nama_file_asli = null;
                    $model->ukuran_file = null;
                    $model->jumlah_halaman = null;
                } elseif ($model->mediaFile !== null) {
                    $folder = $model->jenis_konten === 'ebook'
                        ? 'ebook'
                        : 'infografis';

                    $prefix = $model->jenis_konten === 'ebook'
                        ? 'ebook'
                        : 'infografis';

                    $mediaResult = $this->uploadFile(
                        $model->mediaFile,
                        $folder,
                        $prefix
                    );

                    if ($mediaResult === null) {
                        $this->deleteUploadedPaths(
                            $newUploadedPaths
                        );

                        $this->restoreOldFiles(
                            $model,
                            $oldThumbnail,
                            $oldMedia,
                            $oldNamaFile,
                            $oldUkuranFile
                        );

                        return $this->render('update', [
                            'model' => $model,
                            'kategoriList' => $this->getKategoriList(),
                        ]);
                    }

                    $newMediaName = $mediaResult['name'];

                    $model->file_media = $newMediaName;
                    $model->nama_file_asli = $model->mediaFile->name;
                    $model->ukuran_file = $model->mediaFile->size;

                    $newUploadedPaths[] = $mediaResult['path'];
                } else {
                    /*
                     * File lama hanya dipertahankan jika jenis
                     * kontennya tidak berubah.
                     */
                    if ($oldJenis === $model->jenis_konten) {
                        $model->file_media = $oldMedia;
                        $model->nama_file_asli = $oldNamaFile;
                        $model->ukuran_file = $oldUkuranFile;
                    } else {
                        $model->addError(
                            'mediaFile',
                            'Upload file baru karena jenis konten berubah.'
                        );

                        $this->deleteUploadedPaths(
                            $newUploadedPaths
                        );

                        $this->restoreOldFiles(
                            $model,
                            $oldThumbnail,
                            $oldMedia,
                            $oldNamaFile,
                            $oldUkuranFile
                        );

                        return $this->render('update', [
                            'model' => $model,
                            'kategoriList' => $this->getKategoriList(),
                        ]);
                    }
                }

                if ($model->save(false)) {
                    if (
                        $newThumbnailName !== null
                        && !empty($oldThumbnail)
                        && $oldThumbnail !== $newThumbnailName
                    ) {
                        $this->deleteFile(
                            'thumbnail',
                            $oldThumbnail
                        );
                    }

                    if (
                        $model->jenis_konten === 'video'
                        && !empty($oldMedia)
                    ) {
                        $this->deleteFile(
                            $oldJenis === 'ebook'
                                ? 'ebook'
                                : 'infografis',
                            $oldMedia
                        );
                    }

                    if (
                        $newMediaName !== null
                        && !empty($oldMedia)
                        && $oldMedia !== $newMediaName
                    ) {
                        $this->deleteFile(
                            $oldJenis === 'ebook'
                                ? 'ebook'
                                : 'infografis',
                            $oldMedia
                        );
                    }

                    Yii::$app->session->setFlash(
                        'success',
                        'Konten edukasi berhasil diperbarui.'
                    );

                    return $this->redirect([
                        'view',
                        'id' => $model->id,
                    ]);
                }

                $this->deleteUploadedPaths($newUploadedPaths);

                Yii::$app->session->setFlash(
                    'error',
                    'Konten edukasi gagal diperbarui.'
                );
            }

            $this->restoreOldFiles(
                $model,
                $oldThumbnail,
                $oldMedia,
                $oldNamaFile,
                $oldUkuranFile
            );
        }

        return $this->render('update', [
            'model' => $model,
            'kategoriList' => $this->getKategoriList(),
        ]);
    }

    public function actionToggleStatus($id)
    {
        $model = $this->findModel($id);

        $model->status = (int) $model->status === 1
            ? 0
            : 1;

        if (
            (int) $model->status === 1
            && empty($model->tanggal_publish)
        ) {
            $model->tanggal_publish = date('Y-m-d H:i:s');
        }

        $model->save(false);

        Yii::$app->session->setFlash(
            'success',
            'Status konten edukasi berhasil diperbarui.'
        );

        return $this->redirect(
            Yii::$app->request->referrer
                ?: ['index']
        );
    }

    public function actionToggleUtama($id)
    {
        $model = $this->findModel($id);

        $model->is_utama = (int) $model->is_utama === 1
            ? 0
            : 1;

        $model->save(false);

        Yii::$app->session->setFlash(
            'success',
            'Status konten utama berhasil diperbarui.'
        );

        return $this->redirect(
            Yii::$app->request->referrer
                ?: ['index']
        );
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $thumbnail = $model->thumbnail;
        $media = $model->file_media;
        $jenis = $model->jenis_konten;

        if ($model->delete()) {
            $this->deleteFile(
                'thumbnail',
                $thumbnail
            );

            if (!empty($media)) {
                $this->deleteFile(
                    $jenis === 'ebook'
                        ? 'ebook'
                        : 'infografis',
                    $media
                );
            }

            Yii::$app->session->setFlash(
                'success',
                'Konten edukasi berhasil dihapus.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Konten edukasi gagal dihapus.'
            );
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = KontenEdukasi::find()
            ->with('kategori')
            ->where([
                'id' => $id,
            ])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'Konten edukasi tidak ditemukan.'
        );
    }

    private function getKategoriList($aktifSaja = true)
    {
        $query = KategoriEdukasi::find();

        if ($aktifSaja) {
            $query->andWhere([
                'status' => 1,
            ]);
        }

        $kategori = $query
            ->orderBy([
                'urutan' => SORT_ASC,
                'nama_kategori' => SORT_ASC,
            ])
            ->all();

        return ArrayHelper::map(
            $kategori,
            'id',
            'nama_kategori'
        );
    }

    private function validateMediaRequirement(
        KontenEdukasi $model,
        $isCreate
    ) {
        if (
            $model->jenis_konten === 'infografis'
            && $isCreate
            && $model->mediaFile === null
        ) {
            $model->addError(
                'mediaFile',
                'File infografis wajib diunggah.'
            );

            return false;
        }

        if (
            $model->jenis_konten === 'ebook'
            && $isCreate
            && $model->mediaFile === null
        ) {
            $model->addError(
                'mediaFile',
                'File PDF e-book wajib diunggah.'
            );

            return false;
        }

        return true;
    }

    private function uploadFile(
        UploadedFile $file,
        $folder,
        $prefix
    ) {
        $uploadPath = $this->getUploadPath($folder);

        if (!$this->prepareUploadDirectory($uploadPath)) {
            Yii::$app->session->setFlash(
                'error',
                'Folder upload tidak dapat ditulis: '
                . $uploadPath
            );

            return null;
        }

        $fileName = $this->generateFileName(
            $file,
            $prefix
        );

        $filePath = $uploadPath
            . DIRECTORY_SEPARATOR
            . $fileName;

        if (!$file->saveAs($filePath)) {
            Yii::$app->session->setFlash(
                'error',
                'File gagal diunggah.'
            );

            return null;
        }

        return [
            'name' => $fileName,
            'path' => $filePath,
        ];
    }

    private function getUploadPath($folder)
    {
        return Yii::getAlias('@app')
            . DIRECTORY_SEPARATOR
            . 'web'
            . DIRECTORY_SEPARATOR
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'edukasi'
            . DIRECTORY_SEPARATOR
            . $folder;
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

        return is_dir($path)
            && is_writable($path);
    }

    private function generateFileName(
        UploadedFile $file,
        $prefix
    ) {
        $extension = strtolower(
            pathinfo(
                $file->name,
                PATHINFO_EXTENSION
            )
        );

        if (empty($extension)) {
            $extension = strtolower(
                $file->extension
            );
        }

        return $prefix
            . '_'
            . date('Ymd_His')
            . '_'
            . Yii::$app->security
                ->generateRandomString(10)
            . '.'
            . $extension;
    }

    private function deleteFile(
        $folder,
        $fileName
    ) {
        if (empty($fileName)) {
            return;
        }

        $filePath = $this->getUploadPath($folder)
            . DIRECTORY_SEPARATOR
            . basename($fileName);

        if (is_file($filePath)) {
            @unlink($filePath);
        }
    }

    private function deleteUploadedPaths(
        array $paths
    ) {
        foreach ($paths as $path) {
            if (is_file($path)) {
                @unlink($path);
            }
        }
    }

    private function restoreOldFiles(
        KontenEdukasi $model,
        $thumbnail,
        $media,
        $namaFile,
        $ukuranFile
    ) {
        $model->thumbnail = $thumbnail;
        $model->file_media = $media;
        $model->nama_file_asli = $namaFile;
        $model->ukuran_file = $ukuranFile;
    }
}