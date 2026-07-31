<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
$this->title = 'Update Header';
?>
<div class="content-update">
<?= Html::a('<i class="fa fa-arrow-left"></i> Kembali ke Settings', ['index'], ['class' => 'btn btn-default']). '&nbsp; <a class="btn btn-blue" href="#">Header - Landing Page</a>' ?>
<br>
<br>
<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'list_data')->label('Tagline Home Website')->textArea([
                'maxlength' => 200,
                'rows' => 3,
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'data')->label('Grup Anggota')->textInput([
                'maxlength' => 40,
                'type' => 'number',
                'min' => 0,
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'data2')->label('Sekolah Mitra')->textInput([
                'maxlength' => 40,
                'type' => 'number',
                'min' => 0,
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'data3')->label('Kegiatan Tahunan')->textInput([
                'maxlength' => 40,
                'type' => 'number',
                'min' => 0,
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'data4')->label('Kota Pelayanan')->textInput([
                'maxlength' => 40,
                'type' => 'number',
                'min' => 0,
            ]) ?>
        </div>
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

</div>


