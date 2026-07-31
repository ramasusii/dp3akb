<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\models\Treatment;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Donwload App - LandingPage';
?>

<div class="site-index">
    <div class="content-update">
        <?= Html::a('<i class="fa fa-edit"></i> Edit Sekarang', ['profil-list/update-donwload', 'id'=>$models->id], ['class' => 'btn btn-primary pull-right']) ?>
    
    <div class="text-center" >
        <img src="<?= Yii::$app->request->baseUrl.'/'.$models->images; ?>" alt="Img Landing Page Gho Class" style="height: 250px;">
    </div>
    <div class="jumbotron bg-transparent">
    <div class="box box-solid">
        <div class="box-header with-border">
        <i class="fa fa-text-width"></i>
        <h3 class="box-title">Headline</h3>
        </div> 

        <div class="box-body">
            <p><?= $models->data; ?></p>
        </div>
    </div>
    <div class="box box-solid">
        <div class="box-header with-border">
        <i class="fa fa-text-width"></i>
        <h3 class="box-title">Sub Headline</h3>
        </div> 

        <div class="box-body">
            <p><?= $models->data2; ?></p>
        </div>
    </div>

    <div class="box box-solid">
        <div class="box-header with-border">
        <i class="fa fa-video-camera"></i>
        <h3 class="box-title">Link Playstore</h3>
        </div> 

        <div class="box-body">
            <p><?= $models->link; ?></p>
        </div>
    </div>

    <div class="box box-solid">
        <div class="box-header with-border">
        <i class="fa fa-video-camera"></i>
        <h3 class="box-title">Link AppStore</h3>
        </div> 

        <div class="box-body">
            <p><?= $models->link2; ?></p>
        </div>
    </div>



    </div>
</div>