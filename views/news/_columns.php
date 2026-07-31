<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Kategori;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'gambar',
        'format' => ['image', ['width' => '100']],
        'value' => function ($model) {
            return $model->getImageUrl(); // panggil method custom
        },
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'judul_berita',
        'header' => 'Judul',
        'format' => 'text',
    ],
    
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'tgl_berita',
        'format' => ['date', 'php:d M Y'],
        'label' => 'Date',
    ],

    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'status',
        'format' => 'text',
        'value' => function ($model) {
            return $model->status == 1 ? 'Publik' : 'Draft';
        },
    ],


    [
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

];   