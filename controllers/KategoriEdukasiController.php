<?php

namespace app\controllers;

use Yii;
use app\models\KategoriEdukasi;
use app\models\KategoriEdukasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class KategoriEdukasiController extends Controller
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
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new KategoriEdukasiSearch();

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
        $model = new KategoriEdukasi();

        $model->urutan = 0;
        $model->status = 1;
        $model->ikon = 'book';

        if (
            $model->load(Yii::$app->request->post())
            && $model->save()
        ) {
            Yii::$app->session->setFlash(
                'success',
                'Kategori edukasi berhasil ditambahkan.'
            );

            return $this->redirect([
                'view',
                'id' => $model->id,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (
            $model->load(Yii::$app->request->post())
            && $model->save()
        ) {
            Yii::$app->session->setFlash(
                'success',
                'Kategori edukasi berhasil diperbarui.'
            );

            return $this->redirect([
                'view',
                'id' => $model->id,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionToggleStatus($id)
    {
        $model = $this->findModel($id);

        $model->status = (int) $model->status === 1
            ? 0
            : 1;

        if ($model->save(false)) {
            Yii::$app->session->setFlash(
                'success',
                'Status kategori edukasi berhasil diperbarui.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Status kategori edukasi gagal diperbarui.'
            );
        }

        return $this->redirect(
            Yii::$app->request->referrer
                ?: ['index']
        );
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        /*
         * Kategori tidak boleh dihapus jika sudah digunakan.
         */
        if ($model->getKontenEdukasi()->exists()) {
            Yii::$app->session->setFlash(
                'error',
                'Kategori tidak dapat dihapus karena sudah digunakan oleh konten edukasi.'
            );

            return $this->redirect(['index']);
        }

        if ($model->delete() !== false) {
            Yii::$app->session->setFlash(
                'success',
                'Kategori edukasi berhasil dihapus.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Kategori edukasi gagal dihapus.'
            );
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = KategoriEdukasi::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'Kategori edukasi tidak ditemukan.'
        );
    }
}