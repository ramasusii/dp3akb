<?php

namespace app\controllers;

use Yii;
use app\models\ProfilList;
use app\models\ProfilListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use DOMDocument;

/**
 * ProfilListController implements the CRUD actions for ProfilList model.
 */
class ProfilListController extends Controller
{
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
     * Lists all ProfilList models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new ProfilListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single ProfilList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "ProfilList #".$id,
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
     * Creates a new ProfilList model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new ProfilList();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new ProfilList",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new ProfilList",
                    'content'=>'<span class="text-success">Create ProfilList success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new ProfilList",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing ProfilList model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionUpdate($id)
    // {
    //     $request = Yii::$app->request;
    //     $model = $this->findModel($id);       

    //     if($request->isAjax){
    //         /*
    //         *   Process for ajax request
    //         */
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         if($request->isGet){
    //             return [
    //                 'title'=> "Update ProfilList #".$id,
    //                 'content'=>$this->renderAjax('update', [
    //                     'model' => $model,
    //                 ]),
    //                 'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
    //                             Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
    //             ];         
    //         }else if($model->load($request->post()) && $model->save()){
    //             return [
    //                 'forceReload'=>'#crud-datatable-pjax',
    //                 'title'=> "ProfilList #".$id,
    //                 'content'=>$this->renderAjax('view', [
    //                     'model' => $model,
    //                 ]),
    //                 'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
    //                         Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
    //             ];    
    //         }else{
    //              return [
    //                 'title'=> "Update ProfilList #".$id,
    //                 'content'=>$this->renderAjax('update', [
    //                     'model' => $model,
    //                 ]),
    //                 'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
    //                             Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
    //             ];        
    //         }
    //     }else{
    //         /*
    //         *   Process for non-ajax request
    //         */
    //         if ($model->load($request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         } else {
    //             return $this->render('update', [
    //                 'model' => $model,
    //             ]);
    //         }
    //     }
    // }

    /**
     * Delete an existing ProfilList model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

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
     * Delete multiple existing ProfilList model.
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
     * Finds the ProfilList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProfilList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfilList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdateHome($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        // if ($model->load($request->post()) && $model->save()) {
        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-home', [
            'model' => $model,
        ]);
    }

    public function actionUpdateTentang($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Tentang Landing Page berhasil disimpan.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-tentang', [
            'model' => $model,
        ]);
    }

    public function actionUpdateVisimisi($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        // if ($model->load($request->post()) && $model->save()) {
        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-visimisi', [
            'model' => $model,
        ]);
    }

    public function actionUpdateStruktur($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        // if ($model->load($request->post()) && $model->save()) {
        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-struktur', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdateProfil($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-profil', [
            'model' => $model,
        ]);
    }

    public function actionUpdateTugasfungsi($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        // if ($model->load($request->post()) && $model->save()) {
        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-tugasfungsi', [
            'model' => $model,
        ]);
    }

    public function actionUpdateMaklumat($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        // if ($model->load($request->post()) && $model->save()) {
        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-maklumat', [
            'model' => $model,
        ]);
    }

    public function actionUpdateTema($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Header Landing Page berhasil disimpan.');
                  return $this->redirect(['index']);
            }
        }

        return $this->render('update-tema', [
            'model' => $model,
        ]);
    }

    public function actionUpdateKeunggulan($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Keunggulan Landing Page berhasil disimpan.');
                 return $this->redirect(['index']);
            }
        }

        return $this->render('update-keunggulan', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdateVideo($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Video Landing Page berhasil disimpan.');
                  return $this->redirect(['index']);
            }
        }

        return $this->render('update-video', [
            'model' => $model,
        ]);
    }

    public function actionUpdateDonwload($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Video Landing Page berhasil disimpan.');
                  return $this->redirect(['index']);
            }
        }

        return $this->render('update-download', [
            'model' => $model,
        ]);
    }


     public function actionUpdateSetting($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if ($model->load($request->post()))
        {
            $filename=$this->save_base64_image($model->images, Yii::$app->security->generateRandomString(12),  "web/uploads/website/");
            $model->images="web/uploads/website/".$filename;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Video Landing Page berhasil disimpan.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update-setting', [
            'model' => $model,
        ]);
    }
    
    
    
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function save_base64_image($base64_image_string, $output_file_without_extension, $path_with_end_slash="" ) {
        //usage:  if( substr( $img_src, 0, 5 ) === "data:" ) {  $filename=save_base64_image($base64_image_string, $output_file_without_extentnion, getcwd() . "/application/assets/pins/$user_id/"); }      
        //
        //data is like:    data:image/png;base64,asdfasdfasdf
        $splited = explode(',', substr( $base64_image_string , 5 ) , 2);
        $mime=$splited[0];
        $data=$splited[1];
    
        $mime_split_without_base64=explode(';', $mime,2);
        $mime_split=explode('/', $mime_split_without_base64[0],2);
        if(count($mime_split)==2)
        {
            $extension=$mime_split[1];
            if($extension=='jpeg')$extension='jpg';
            //if($extension=='javascript')$extension='js';
            //if($extension=='text')$extension='txt';
            $output_file_with_extension=$output_file_without_extension.'.'.$extension;
        }
        file_put_contents( $path_with_end_slash . $output_file_with_extension, base64_decode($data) );
        return $output_file_with_extension;
    }
}
