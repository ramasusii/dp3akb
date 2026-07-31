<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriEdukasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-edukasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">

        <div class="col-md-4">

            <?= $form->field(
                $model,
                'nama_kategori'
            )->textInput([
                'placeholder'
                    => 'Cari nama kategori',
            ]) ?>

        </div>

        <div class="col-md-4">

            <?= $form->field(
                $model,
                'ikon'
            )->dropDownList([
                'book' => 'Buku',
                'video' => 'Video',
                'image' => 'Infografis',
                'shield' => 'Perlindungan',
                'female' => 'Perempuan',
                'family' => 'Keluarga',
                'health' => 'Kesehatan',
                'publication' => 'Publikasi',
            ], [
                'prompt' => 'Semua Jenis Ikon',
            ]) ?>

        </div>

        <div class="col-md-4">

            <?= $form->field(
                $model,
                'status'
            )->dropDownList([
                1 => 'Aktif',
                0 => 'Tidak Aktif',
            ], [
                'prompt' => 'Semua Status',
            ]) ?>

        </div>

    </div>

    <div class="form-group">

        <?= Html::submitButton(
            'Cari',
            [
                'class' => 'btn btn-primary',
            ]
        ) ?>

        <?= Html::a(
            'Reset',
            ['index'],
            [
                'class' => 'btn btn-default',
            ]
        ) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>