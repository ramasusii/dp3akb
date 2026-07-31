<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
$this->registerCss("cke_editable {  }");

/* @var $this yii\web\View */
/* @var $model app\models\Content */
$this->title = 'Update Visi Misi';
?>
<div class="content-update">
<?= Html::a('<i class="fa fa-arrow-left"></i> Kembali ke Setting Profil', ['index'], ['class' => 'btn btn-default']). '&nbsp; <a class="btn btn-blue" href="#">'.$model->name.'</a>' ?>
<br>
<br>
<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

 <?= $form->field($model, 'data')->label('Input Visi')->textarea(['rows' => 1, 'maxlength' => 255]) ?>

   <?= $form->field($model, 'list_data')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'toolbar' => [
                ['items' => ['NumberedList']]
            ]
        ]
    ])->label('Input Misi') ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

</div>


