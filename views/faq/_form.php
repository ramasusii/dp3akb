<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use budyaga\cropper\Widget;
use yii\helpers\Url;

$this->registerCss("cke_editable {  }");


/* @var $this yii\web\View */
/* @var $model app\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>



<style>
.modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}

.select2-search__field{
     width: 200px!important; 
}

.cke_top {
    background-image: -moz-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -webkit-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -o-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -ms-linear-gradient(top,#f5f5f5,#ffffff);
    background-image: linear-gradient(top,#f5f5f5,#ffffff)!important;
}

.cke_bottom {
    background-image: -moz-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -webkit-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -o-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -ms-linear-gradient(top,#f5f5f5,#ffffff);
    background-image: linear-gradient(top,#f5f5f5,#ffffff)!important;
}

.cke_button_on {
    box-shadow: 0 1px 5px rgb(255 255 255 / 60%) inset, 0 1px 0 rgb(0 0 0 / 20%);
    background-image: -moz-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: -webkit-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: -o-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: -ms-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: linear-gradient(top,#e9e9e9,#ffffff);
}

.new-photo-area{
    width : 400px!important;
}

</style>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pertanyaan')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'jawaban')->widget(CKEditor::className(), [
        'preset' => 'full',
        'clientOptions' => [
            'height' => 140,
        ]
    ]); ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
