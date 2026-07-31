<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Foto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'foto')->widget(Widget::className(), [ 
        'uploadUrl' => Url::toRoute('foto/uploadFoto'),
        'width'     => 500,
        'height'    => 500,
        ])->label('Foto Ukuran (500 x 500)') ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
