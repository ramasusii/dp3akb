<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'jenis_pegawai') ?>

    <?= $form->field($model, 'jabatan') ?>

    <?php // echo $form->field($model, 'pangkat_golongan') ?>

    <?php // echo $form->field($model, 'unit_kerja') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'whatsapp') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'urutan') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
