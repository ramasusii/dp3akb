<?php
namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{

    public function actions()
    {
        return [
            'uploadFoto' => [
                'class'=> 'budyaga\cropper\actions\UploadAction',
                'url'  => Yii::getAlias('@web') . '/web/uploads/berita',        // URL untuk akses via browser
                'path' => Yii::getAlias('@webroot') . '/web/uploads/berita',    // path fisik untuk simpan file
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {     
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "News #".$id,
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
     * Creates a new News model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionLogtest()
    {
        \Yii::error("INI ERROR TESTING");
        \Yii::warning("INI WARNING TESTING");
        \Yii::info("INI INFO TESTING");

        return "Log test sudah dijalankan";
    }



    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new News();

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($request->isGet) {
                return [
                    'title' => "Create new News",
                    'content' => $this->renderAjax('create', ['model' => $model]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } elseif ($model->load($request->post())) {
                $model->slug_berita = str_replace(" ", "-", preg_replace('/[^A-Za-z0-9\  ]/', '', strtolower($model->judul_berita)));
                $model->id = Yii::$app->user->identity->id;

                $fileBerita = UploadedFile::getInstance($model, 'gambar');

                if (!empty($fileBerita)) {
                    $uploadPath = Yii::getAlias('@webroot/web/uploads/berita/');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }
                    $filenamerandom = Yii::$app->security->generateRandomString(12) . '.' . $fileBerita->extension;
                    if ($fileBerita->saveAs($uploadPath . $filenamerandom)) {
                        $model->gambar = $filenamerandom;
                    }
                } else {
                    // Jika file tidak diupload langsung, pastikan hanya nama file disimpan dari cropper
                    $model->gambar = basename($model->gambar);
                }

                $model->save(false);

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new News",
                    'content' => '<span class="text-success">Create News success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
        } else {
            if ($model->load($request->post())) {
                $model->slug_berita = str_replace(" ", "-", preg_replace('/[^A-Za-z0-9\  ]/', '', strtolower($model->judul_berita)));
                $model->id = Yii::$app->user->identity->id;

                $fileBerita = UploadedFile::getInstance($model, 'gambar');

                if (!empty($fileBerita)) {
                    $uploadPath = Yii::getAlias('@webroot/web/uploads/berita/');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }
                    $filenamerandom = Yii::$app->security->generateRandomString(12) . '.' . $fileBerita->extension;
                    if ($fileBerita->saveAs($uploadPath . $filenamerandom)) {
                        $model->gambar = $filenamerandom;
                    }
                } else {
                    $model->gambar = basename($model->gambar);
                }

                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->berita_id]);
                }
            }

            return $this->render('create', ['model' => $model]);
        }
    }




    /**
     * Updates an existing News model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $oldFile = $model->gambar; // Simpan nama file lama

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($request->isGet) {
                // Tampilkan form update di modal
                return [
                    'title' => "Update News #" . $id,
                    'content' => $this->renderAjax('update', ['model' => $model]),
                    'footer' => 
                        Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } elseif ($model->load($request->post())) {
                // Generate slug
                $model->slug_berita = str_replace(" ", "-", preg_replace('/[^A-Za-z0-9\  ]/', '', strtolower($model->judul_berita)));

                // Ambil data dari POST
                $postData = $request->post('News', []);
                $rawGambar = $postData['gambar'] ?? '';

                // 🔥 AMBIL HANYA NAMA FILE, BUANG PATH/URL
                $newFileName = $rawGambar ? basename(trim($rawGambar)) : '';

                // Path upload
                $uploadPath = Yii::getAlias('@webroot/web/uploads/berita/');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }

                // Validasi ekstensi (opsional)
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = strtolower(pathinfo($newFileName, PATHINFO_EXTENSION));
                $isValidExt = in_array($ext, $allowed);

                // Cek apakah user ganti gambar
                $isDifferent = $newFileName && $newFileName !== $oldFile;

                if ($isDifferent && $isValidExt) {
                    $newFilePath = $uploadPath . $newFileName;

                    // Pastikan file baru benar-benar ada (hasil upload cropper)
                    if (file_exists($newFilePath)) {
                        // Hapus file lama
                        if ($oldFile) {
                            $oldFilePath = $uploadPath . $oldFile;
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                        // Simpan hanya nama file
                        $model->gambar = $newFileName;
                    } else {
                        // Jika file tidak ditemukan, kembali ke lama
                        $model->gambar = $oldFile;
                    }
                } else {
                    // Tidak ada perubahan atau ekstensi tidak valid
                    $model->gambar = $oldFile;
                }

                // Simpan ke database (skip validation file)
                if ($model->save(false)) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "News #" . $id,
                        'content' => '<span class="text-success">✅ Update berhasil!</span>',
                        'footer' => 
                            Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                            Html::a('Edit Lagi', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                } else {
                    \Yii::error("Gagal simpan: " . print_r($model->getErrors(), true));
                    return [
                        'title' => "Update Gagal",
                        'content' => '<span class="text-danger">❌ Gagal menyimpan data.</span>',
                        'footer' => 
                            Html::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) .
                            Html::button('Coba Lagi', ['class' => 'btn btn-primary', 'type' => "submit"])
                    ];
                }
            }
        } else {
            // Non-AJAX request
            if ($model->load($request->post())) {
                $model->slug_berita = str_replace(" ", "-", preg_replace('/[^A-Za-z0-9\  ]/', '', strtolower($model->judul_berita)));

                $postData = $request->post('News', []);
                $rawGambar = $postData['gambar'] ?? '';
                $newFileName = $rawGambar ? basename(trim($rawGambar)) : '';

                $uploadPath = Yii::getAlias('@webroot/web/uploads/berita/');
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
                        $model->gambar = $newFileName;
                    } else {
                        $model->gambar = $oldFile;
                    }
                } else {
                    $model->gambar = $oldFile;
                }

                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->berita_id]);
                }
            }

            return $this->render('update', ['model' => $model]);
        }
    }

    /**
     * Delete an existing News model.
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

    // public function actionDelete($id)
    // {
    //     $request = Yii::$app->request;
    //     $model = $this->findModel($id);

    //     // Simpan nama file sebelum dihapus dari DB
    //     $oldFile = $model->gambar;
    //     $uploadPath = Yii::getAlias('@webroot/web/uploads/berita/');

    //     // Hapus dari database
    //     if ($model->delete()) {
    //         // Hapus file fisik jika ada
    //         if ($oldFile) {
    //             $filePath = $uploadPath . $oldFile;
    //             if (file_exists($filePath)) {
    //                 unlink($filePath); // Hapus file
    //             }
    //         }
    //     }

    //     if ($request->isAjax) {
    //         // Untuk AJAX (modal)
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         return [
    //             'forceClose' => true,
    //             'forceReload' => '#crud-datatable-pjax'
    //         ];
    //     } else {
    //         // Untuk non-AJAX
    //         return $this->redirect(['index']);
    //     }
    // }

     /**
     * Delete multiple existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
