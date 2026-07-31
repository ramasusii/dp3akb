<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriEdukasi */
/* @var $form yii\widgets\ActiveForm */

$ikonList = [
    'book' => 'Buku',
    'video' => 'Video',
    'image' => 'Infografis',
    'shield' => 'Perlindungan',
    'female' => 'Perempuan',
    'family' => 'Keluarga',
    'health' => 'Kesehatan',
    'publication' => 'Publikasi',
];
?>

<div class="kategori-edukasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Informasi Kategori Edukasi
                    </strong>

                </div>

                <div class="panel-body">

                    <?= $form->field(
                        $model,
                        'nama_kategori'
                    )->textInput([
                        'maxlength' => true,
                        'placeholder'
                            => 'Contoh: Perlindungan Anak',
                        'autofocus' => true,
                    ]) ?>

                    <?= $form->field(
                        $model,
                        'deskripsi'
                    )->textarea([
                        'rows' => 7,
                        'placeholder'
                            => 'Tuliskan deskripsi kategori edukasi...',
                    ]) ?>

                    <?php if (!$model->isNewRecord): ?>

                        <div class="form-group">

                            <label>
                                Slug
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= Html::encode(
                                    $model->slug
                                ) ?>"
                                readonly
                            >

                            <p class="help-block">
                                Slug dibuat otomatis berdasarkan nama kategori.
                            </p>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Pengaturan Kategori
                    </strong>

                </div>

                <div class="panel-body">

                    <div class="alert alert-info">

                        <strong>
                            Informasi:
                        </strong>

                        <br>

                        Kategori digunakan untuk mengelompokkan
                        video, infografis, e-book, dan publikasi
                        digital pada halaman edukasi.

                    </div>

                    <?= $form->field(
                        $model,
                        'ikon'
                    )->dropDownList(
                        $ikonList,
                        [
                            'prompt'
                                => 'Pilih Jenis Ikon',
                        ]
                    ) ?>

                    <?= $form->field(
                        $model,
                        'urutan'
                    )->textInput([
                        'type' => 'number',
                        'min' => 0,
                        'placeholder' => '0',
                    ]) ?>

                    <p class="help-block">
                        Angka lebih kecil akan tampil lebih dahulu.
                    </p>

                    <?= $form->field(
                        $model,
                        'status'
                    )->dropDownList([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif',
                    ]) ?>

                </div>

            </div>

        </div>

    </div>

    <div class="form-group">

        <?= Html::submitButton(
            $model->isNewRecord
                ? 'Simpan Kategori'
                : 'Simpan Perubahan',
            [
                'class' => $model->isNewRecord
                    ? 'btn btn-success'
                    : 'btn btn-primary',
            ]
        ) ?>

        <?= Html::a(
            'Kembali',
            ['index'],
            [
                'class' => 'btn btn-default',
            ]
        ) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>