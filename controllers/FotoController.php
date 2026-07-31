<?php

namespace app\controllers;

use Yii;
use app\models\Foto;
use app\models\FotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * FotoController implements the CRUD actions for Foto model.
 */
class FotoController extends Controller
{
    public function actions()
    {
        return [
            'uploadFoto' => [
                'class'=> 'budyaga\cropper\actions\UploadAction',
                'url'  => Yii::getAlias('@web') . '/web/uploads/foto',        // URL untuk akses via browser
                'path' => Yii::getAlias('@webroot') . '/web/uploads/foto',    
            ] 
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Foto models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new FotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Foto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Foto #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

 /**
 * Creates a new Foto model.
 */
public function actionCreate()
{
    $request = Yii::$app->request;
    $model = new Foto();

    if ($request->isAjax) {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($request->isGet) {
            return [
                'title' => "Create new Foto",
                'content' => $this->renderAjax('create', ['model' => $model]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
            ];
        } elseif ($model->load($request->post())) {
            // --- LOGIKA SAMA PERSIS DENGAN NEWS, TAPI UNTUK FIELD `foto` ---
            $fileFoto = UploadedFile::getInstance($model, 'foto');

            if (!empty($fileFoto)) {
                $uploadPath = Yii::getAlias('@webroot/web/uploads/foto/');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }
                $filename = Yii::$app->security->generateRandomString(12) . '.' . $fileFoto->extension;
                if ($fileFoto->saveAs($uploadPath . $filename)) {
                    $model->foto = $filename;
                }
            } else {
                // Dari cropper: ambil hanya nama file
                $model->foto = basename($model->foto);
            }

            $model->save(false); // skip validation (karena cropper sudah handle)

            return [
                'forceReload' => '#crud-datatable-pjax',
                'title' => "Create new Foto",
                'content' => '<span class="text-success">Create Foto success</span>',
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        }
    } else {
        if ($model->load($request->post())) {
            $fileFoto = UploadedFile::getInstance($model, 'foto');

            if (!empty($fileFoto)) {
                $uploadPath = Yii::getAlias('@webroot/web/uploads/foto/');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }
                $filename = Yii::$app->security->generateRandomString(12) . '.' . $fileFoto->extension;
                if ($fileFoto->saveAs($uploadPath . $filename)) {
                    $model->foto = $filename;
                }
            } else {
                $model->foto = basename($model->foto);
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', ['model' => $model]);
    }
}

/**
 * Updates an existing Foto model.
 */
public function actionUpdate($id)
{
    $request = Yii::$app->request;
    $model = $this->findModel($id);
    $oldFile = $model->foto; // simpan file lama

    if ($request->isAjax) {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($request->isGet) {
            return [
                'title' => "Update Foto #" . $id,
                'content' => $this->renderAjax('update', ['model' => $model]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
            ];
        } elseif ($model->load($request->post())) {
            $postData = $request->post('Foto', []);
            $rawFoto = $postData['foto'] ?? '';
            $newFileName = $rawFoto ? basename(trim($rawFoto)) : '';

            $uploadPath = Yii::getAlias('@webroot/web/uploads/foto/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($newFileName, PATHINFO_EXTENSION));
            $isValidExt = in_array($ext, $allowed);
            $isDifferent = $newFileName && $newFileName !== $oldFile;

            if ($isDifferent && $isValidExt) {
                $newFilePath = $uploadPath . $newFileName;
                if (file_exists($newFilePath)) {
                    if ($oldFile && file_exists($uploadPath . $oldFile)) {
                        unlink($uploadPath . $oldFile);
                    }
                    $model->foto = $newFileName;
                } else {
                    $model->foto = $oldFile;
                }
            } else {
                $model->foto = $oldFile;
            }

            if ($model->save(false)) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Foto #" . $id,
                    'content' => '<span class="text-success">✅ Update berhasil!</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit Lagi', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Gagal",
                    'content' => '<span class="text-danger">❌ Gagal menyimpan.</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) .
                        Html::button('Coba Lagi', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        }
    } else {
        if ($model->load($request->post())) {
            $postData = $request->post('Foto', []);
            $rawFoto = $postData['foto'] ?? '';
            $newFileName = $rawFoto ? basename(trim($rawFoto)) : '';

            $uploadPath = Yii::getAlias('@webroot/web/uploads/foto/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $ext = strtolower(pathinfo($newFileName, PATHINFO_EXTENSION));
            $isValidExt = in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
            $isDifferent = $newFileName && $newFileName !== $oldFile;

            if ($isDifferent && $isValidExt) {
                $newFilePath = $uploadPath . $newFileName;
                if (file_exists($newFilePath)) {
                    if ($oldFile && file_exists($uploadPath . $oldFile)) {
                        unlink($uploadPath . $oldFile);
                    }
                    $model->foto = $newFileName;
                } else {
                    $model->foto = $oldFile;
                }
            } else {
                $model->foto = $oldFile;
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model]);
    }
}

    /**
     * Delete an existing Foto model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        unlink($model->foto);
        $model->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Foto model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Foto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Foto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Foto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
