<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use mdm\admin\components\Helper;

$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
?>
<div class="user-index">

    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                ],
                [
                    'attribute' => 'foto',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return '<img src="'.$data->foto.'" height="50px" style="border-radius: 50px;"/>';
                    },
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'username',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'nama',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'role',
                ],

                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'status',
                    'value' => function ($data) {
                        if ($data->status == 10) {
                            $result = 'Aktif';
                        } else {
                            $result = 'Non Aktif';
                        }
            
                        return $result;
                    },
                    'visible' => \Yii::$app->user->identity->role == 'Developer',
                ],
                
                [
                    'header' => 'View',
                    'template' => '{view}',
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => false,
                    'vAlign'=>'middle',
                    'urlCreator' => function($action, $model, $key, $index) { 
                            return Url::to([$action,'id'=>$key]);
                    },
                    'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
                    'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
                    'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                                      'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                      'data-request-method'=>'post',
                                      'data-toggle'=>'tooltip',
                                      'data-confirm-title'=>'Are you sure?',
                                      'data-confirm-message'=>'Are you sure want to delete this item'], 
                ],
                [
                    'header' => 'Update Role',
                    'template' => '{update}',
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => false,
                    'vAlign'=>'middle',
                    'urlCreator' => function($action, $model, $key, $index) { 
                            return Url::to([$action,'id'=>$key]);
                    },
                    'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
                    'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
                    'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                                      'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                      'data-request-method'=>'post',
                                      'data-toggle'=>'tooltip',
                                      'data-confirm-title'=>'Are you sure?',
                                      'data-confirm-message'=>'Are you sure want to delete this item'], 
                    'visible' => \Yii::$app->user->identity->role == 'Developer' || \Yii::$app->user->identity->role == 'Super Admin',
                ],
                [
                    'header' => 'Reset Password',
                    'width' => '100px',
                    'template' => Helper::filterActionColumn('{admin-reset-password}'),
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => false,
                    'vAlign' => 'middle',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'id' => $key]);
                    },
                    'buttons' => [
                        'admin-reset-password' => function ($url, $model) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-lock"></span>',
                                [
                                    'admin-reset-password',
                                    'id' => $model->id,
                                ],
                                [
                                    'role' => 'modal-remote',
                                    'title' => 'Reset Password',
                                    'data-toggle' => 'tooltip',
                                    'class' => 'btn btn-warning btn-xs',
                                    'data-confirm-title' => 'Apakah Anda yakin?',
                                    'data-confirm-message' => 'Setelah direset password akan menjadi sama dengan username/email.'
                                ]
                            );
                        },
                    ],
                    'visible' => \Yii::$app->user->identity->role == 'Developer'
                ],
                [
                    'header' => 'Pass Cadangan',
                    'width' => '100px',
                    'template' => Helper::filterActionColumn('{set-password-cadangan}'),
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => false,
                    'vAlign' => 'middle',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'id' => $key]);
                    },
                    'buttons' => [
                        'set-password-cadangan' => function ($url, $model) {
                            return Html::a('<span class="fa fa-plus"></span>', 
                                ['set-password-cadangan', 'id' => $model->id],
                                [
                                    'class' => 'btn btn-info btn-xs',
                                    'role'=>'modal-remote','title'=>'Set Password Cadangan', 
                                    'data-confirm'=>false, 'data-method'=>false, 
                                    'data-request-method'=>'post',
                                    'data-toggle'=>'tooltip',
                                    'data-confirm-title'=>'Set Password Cadangan',
                                    'data-confirm-message'=>'Are you sure want to set password cadangan to this user?',
                                ]
                            );
                        },
                    ],
                    'visible' => \Yii::$app->user->identity->role == 'Developer'
                ],
            ],
            
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah User ', ['signup'],
                    ['role'=>'modal-remote','title'=> 'Tambah User Baru','class'=>'btn btn-primary']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,   
            'responsiveWrap' => false,         
            'panel' => [
                'type' => 'default',
                'heading' => false,
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",
])?>
<?php Modal::end(); ?>
