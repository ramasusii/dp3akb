<?php

namespace app\controllers;

use Yii;
use app\models\KategoriBerita;
use app\models\KategoriBeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class KategoriBeritaController extends Controller
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
     * Daftar kategori berita.
     */
    public function actionIndex()
    {
        $searchModel = new KategoriBeritaSearch();

        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams
        );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Detail kategori berita.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Tambah kategori berita.
     */
    public function actionCreate()
    {
        $model = new KategoriBerita();

        $model->status = 1;

        if ($model->load(Yii::$app->request->post())) {
            /*
             * Slug dibuat otomatis dari nama kategori
             * di model sebelum validasi.
             */
            if ($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Kategori berita berhasil ditambahkan.'
                );

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Update kategori berita.
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Kategori berita berhasil diperbarui.'
                );

                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Hapus kategori berita.
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        /*
         * Kategori tidak boleh dihapus jika masih
         * dipakai oleh data berita.
         */
        if ($model->getBeritas()->exists()) {
            Yii::$app->session->setFlash(
                'error',
                'Kategori tidak dapat dihapus karena masih digunakan oleh berita.'
            );

            return $this->redirect(['index']);
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash(
                'success',
                'Kategori berita berhasil dihapus.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Kategori berita gagal dihapus.'
            );
        }

        return $this->redirect(['index']);
    }

    /**
     * Mencari data kategori berdasarkan ID.
     */
    protected function findModel($id)
    {
        $model = KategoriBerita::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'Data kategori berita tidak ditemukan.'
        );
    }
}