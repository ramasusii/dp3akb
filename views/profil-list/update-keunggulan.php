<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;

$this->registerCss("cke_editable {  }");

/* @var $this yii\web\View */
/* @var $model app\models\Content */
$this->title = 'Update Keunggulan';
?>
<div class="content-update">
    <?= Html::a('<i class="fa fa-arrow-left"></i> Kembali ke Setting Profil', ['site/set-keunggulan'], ['class' => 'btn btn-default']). '&nbsp; <a class="btn btn-blue" href="#">'.$model->name.'</a>' ?>
<br>
<br>
<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->label('Input Tagline')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'images')->widget(\bilginnet\cropper\Cropper::className(), [
                    'uniqueId' => 'image_cropper2',
                    'label' => 'Upload Gambar (318 x 764)',
                    'cropperOptions' => [
                        'preview' => [
                            'url' => (!empty($model->images)) ? Yii::$app->request->baseUrl.'/'.$model->images : Yii::$app->request->baseUrl.'/web/assets-guest/img/struktur.png', 
                            'width' => 381, // must be specified // you can set as string '100%'
                            'height' => 764, // must be specified // you can set as string '100px'
                        ],
                        'width' => 381, // must be specified // you can set as string '100%'
                            'height' => 764, // must be specified // you can set as string '100px'
                    ]
                ]); ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

</div>


