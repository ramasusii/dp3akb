<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
$this->registerCss("cke_editable {  }");


/* @var $this yii\web\View */
/* @var $model app\models\ProfilList */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="profil-list-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list_data')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            // 'height' => 100,
            'toolbar' => [
                ['items' => [
                         'NumberedList',
                    ] ],
               ]]
    ]); ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
          <?= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
  <?php } ?>

  <?php ActiveForm::end(); ?>
</div>
