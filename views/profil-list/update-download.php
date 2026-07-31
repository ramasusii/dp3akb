<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
$this->title = 'Update DownloadApp';
?>
<div class="content-update">
<?= Html::a('<i class="fa fa-arrow-left"></i> Kembali ke Settings', ['site/set-download'], ['class' => 'btn btn-default']). '&nbsp; <a class="btn btn-blue" href="#">Download App - Landing Page</a>' ?>
<br>
<br>
<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->label('Input Headline')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'data2')->label('Input Sub Headline')->textArea(['maxlength' => 200]) ?>

    <?= $form->field($model, 'images')->widget(\bilginnet\cropper\Cropper::className(), [
                    'uniqueId' => 'image_cropper2',
                    'label' => 'Upload Gambar (1170 x 450)',
                    'cropperOptions' => [
                        'preview' => [
                            'url' => (!empty($model->images)) ? Yii::$app->request->baseUrl.'/'.$model->images : Yii::$app->request->baseUrl.'/web/assets-guest/img/struktur.png', 
                            'width' => 612, // must be specified // you can set as string '100%'
                            'height' => 626, // must be specified // you can set as string '100px'
                        ],
                        'width' => 612, // must be specified // you can set as string '100%'
                        'height' => 626, // must be specified // you can set as string '100px'
                    ]
                ])?>

    <?= $form->field($model, 'link')->label('Link Playstore') ?>
    <?= $form->field($model, 'link2')->label('Link AppStore') ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

</div>


