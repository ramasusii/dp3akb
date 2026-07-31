<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("
    function previewBannerImage(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var maxSize = 1024 * 1024;

            if (file.size > maxSize) {
                alert('Ukuran gambar maksimal 1 MB.');
                input.value = '';
                $('#banner-preview-new').hide();
                return;
            }

            var reader = new FileReader();

            reader.onload = function(e) {
                var img = new Image();

                img.onload = function() {
                    if (img.width !== 1600 || img.height !== 686) {
                        alert(
                            'Ukuran gambar wajib 1600 x 686 piksel. ' +
                            'Gambar yang dipilih berukuran ' +
                            img.width + ' x ' + img.height + ' piksel.'
                        );

                        input.value = '';
                        $('#banner-preview-new').hide();
                        return;
                    }

                    $('#banner-preview-image')
                        .attr('src', e.target.result);

                    $('#banner-preview-new').show();
                };

                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

    $('#banner-imagefile').on('change', function() {
        previewBannerImage(this);
    });
");
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Informasi Banner</strong>
                </div>

                <div class="panel-body">

                    <?= $form->field($model, 'judul')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Masukkan judul banner',
                    ]) ?>

                    <?= $form->field($model, 'deskripsi')->textarea([
                        'rows' => 5,
                        'placeholder' => 'Masukkan deskripsi singkat banner',
                    ]) ?>

                    <div class="row">

                        <div class="col-md-6">
                            <?= $form->field($model, 'link')->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Contoh: site/pengaduan',
                            ]) ?>

                            <p class="help-block">
                                Gunakan format route seperti
                                <code>site/pengaduan</code>
                                atau URL lengkap.
                            </p>
                        </div>

                        <div class="col-md-6">
                            <?= $form->field($model, 'button_text')->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Contoh: Selengkapnya',
                            ]) ?>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <?= $form->field($model, 'urutan')->textInput([
                                'type' => 'number',
                                'min' => 0,
                                'placeholder' => '0',
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $form->field($model, 'status')->dropDownList([
                                1 => 'Aktif',
                                0 => 'Tidak Aktif',
                            ], [
                                'prompt' => 'Pilih Status',
                            ]) ?>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Gambar Banner</strong>
                </div>

                <div class="panel-body">

                    <div class="alert alert-info" style="font-size: 13px;">
                        <strong>Ketentuan gambar:</strong>
                        <br>
                        Resolusi wajib: <strong>1600 × 686 px</strong>
                        <br>
                        Ukuran maksimal: <strong>1 MB</strong>
                        <br>
                        Format: JPG, JPEG, PNG, atau WEBP
                    </div>

                    <?php if (
                        !$model->isNewRecord
                        && !empty($model->gambar)
                    ): ?>

                        <div style="margin-bottom: 15px;">
                            <label>Gambar Saat Ini</label>

                            <div
                                style="
                                    border: 1px solid #ddd;
                                    padding: 6px;
                                    border-radius: 6px;
                                    background: #fafafa;
                                "
                            >
                                <?= Html::img(
                                    $model->getImageUrl(),
                                    [
                                        'class' => 'img-responsive',
                                        'style' => [
                                            'width' => '100%',
                                            'border-radius' => '4px',
                                        ],
                                        'alt' => $model->judul,
                                    ]
                                ) ?>
                            </div>
                        </div>

                    <?php endif; ?>

                    <div
                        id="banner-preview-new"
                        style="display: none; margin-bottom: 15px;"
                    >
                        <label>Preview Gambar Baru</label>

                        <div
                            style="
                                border: 1px solid #ddd;
                                padding: 6px;
                                border-radius: 6px;
                                background: #fafafa;
                            "
                        >
                            <img
                                id="banner-preview-image"
                                src=""
                                alt="Preview Banner"
                                class="img-responsive"
                                style="
                                    width: 100%;
                                    border-radius: 4px;
                                "
                            >
                        </div>
                    </div>

                    <?= $form->field($model, 'imageFile')->fileInput([
                        'accept' => '.jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp',
                    ]) ?>

                    <?php if (!$model->isNewRecord): ?>
                        <p class="help-block">
                            Kosongkan file upload jika tetap menggunakan
                            gambar yang lama.
                        </p>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord
                ? 'Simpan Banner'
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
            ['class' => 'btn btn-default']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>