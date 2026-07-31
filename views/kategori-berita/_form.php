<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriBerita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-berita-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">

        <div class="panel-heading">
            <strong>
                Informasi Kategori Berita
            </strong>
        </div>

        <div class="panel-body">

            <div class="row">

                <div class="col-md-8">

                    <?= $form->field(
                        $model,
                        'nama_kategori'
                    )->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Contoh: Berita Utama',
                        'autofocus' => true,
                    ]) ?>

                    <p class="help-block">
                        Slug akan dibuat otomatis berdasarkan nama kategori.
                    </p>

                </div>

                <div class="col-md-4">

                    <?= $form->field(
                        $model,
                        'status'
                    )->dropDownList([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif',
                    ], [
                        'prompt' => 'Pilih Status',
                    ]) ?>

                </div>

            </div>

            <?php if (!$model->isNewRecord): ?>

                <div class="row">

                    <div class="col-md-8">

                        <div class="form-group">
                            <label class="control-label">
                                Slug Saat Ini
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= Html::encode($model->slug) ?>"
                                readonly
                            >

                            <p class="help-block">
                                Slug akan diperbarui otomatis jika nama kategori diubah.
                            </p>
                        </div>

                    </div>

                </div>

            <?php endif; ?>

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