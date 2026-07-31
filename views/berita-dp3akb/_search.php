<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeritaDp3akbSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-dp3akb-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kategori_id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'ringkasan') ?>

    <?php // echo $form->field($model, 'isi') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'is_utama') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'tanggal_publish') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
