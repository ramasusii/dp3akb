<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KontenEdukasi */
/* @var $kategoriList array */

$this->registerJs("
    function updateKontenForm() {
        var jenis = $('#kontenedukasi-jenis_konten').val();

        $('.field-video').hide();
        $('.field-media').hide();
        $('.field-ebook').hide();

        if (jenis === 'video') {
            $('.field-video').show();
        }

        if (jenis === 'infografis') {
            $('.field-media').show();

            $('#media-help').html(
                'Upload gambar infografis JPG, PNG, atau WEBP. '
                + 'Ukuran maksimal 15 MB.'
            );
        }

        if (jenis === 'ebook') {
            $('.field-media').show();
            $('.field-ebook').show();

            $('#media-help').html(
                'Upload dokumen e-book dalam format PDF. '
                + 'Ukuran maksimal 15 MB.'
            );
        }
    }

    $('#kontenedukasi-jenis_konten').on(
        'change',
        updateKontenForm
    );

    updateKontenForm();

    $('#kontenedukasi-thumbnailfile').on(
        'change',
        function () {
            var input = this;

            if (!input.files || !input.files[0]) {
                return;
            }

            var file = input.files[0];

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran thumbnail maksimal 2 MB.');
                input.value = '';
                $('#thumbnail-preview-new').hide();

                return;
            }

            var reader = new FileReader();

            reader.onload = function (event) {
                $('#thumbnail-preview-image')
                    .attr('src', event.target.result);

                $('#thumbnail-preview-new').show();
            };

            reader.readAsDataURL(file);
        }
    );
");
?>

<div class="konten-edukasi-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Informasi Konten Edukasi
                    </strong>

                </div>

                <div class="panel-body">

                    <?= $form->field(
                        $model,
                        'judul'
                    )->textInput([
                        'maxlength' => true,
                        'placeholder'
                            => 'Masukkan judul konten edukasi',
                        'autofocus' => true,
                    ]) ?>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'kategori_id'
                            )->dropDownList(
                                $kategoriList,
                                [
                                    'prompt'
                                        => 'Pilih Kategori Edukasi',
                                ]
                            ) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'jenis_konten'
                            )->dropDownList([
                                'video'
                                    => 'Video Edukasi',
                                'infografis'
                                    => 'Infografis',
                                'ebook'
                                    => 'E-Book',
                            ], [
                                'prompt'
                                    => 'Pilih Jenis Konten',
                            ]) ?>

                        </div>

                    </div>

                    <?= $form->field(
                        $model,
                        'ringkasan'
                    )->textarea([
                        'rows' => 4,
                        'placeholder'
                            => 'Tuliskan ringkasan singkat konten...',
                    ]) ?>

                    <?= $form->field(
                        $model,
                        'isi'
                    )->textarea([
                        'rows' => 10,
                        'placeholder'
                            => 'Tuliskan isi atau deskripsi lengkap...',
                    ]) ?>

                    <div class="field-video">

                        <?= $form->field(
                            $model,
                            'youtube_url'
                        )->textInput([
                            'maxlength' => true,
                            'placeholder'
                                => 'https://www.youtube.com/watch?v=...',
                        ]) ?>

                        <?= $form->field(
                            $model,
                            'durasi_video'
                        )->textInput([
                            'maxlength' => true,
                            'placeholder'
                                => 'Contoh: 08:30',
                        ]) ?>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'sumber'
                            )->textInput([
                                'maxlength' => true,
                                'placeholder'
                                    => 'Sumber konten',
                            ]) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'penulis'
                            )->textInput([
                                'maxlength' => true,
                                'placeholder'
                                    => 'Nama penulis',
                            ]) ?>

                        </div>

                    </div>

                    <div class="field-ebook">

                        <div class="row">

                            <div class="col-md-6">

                                <?= $form->field(
                                    $model,
                                    'penerbit'
                                )->textInput([
                                    'maxlength' => true,
                                    'placeholder'
                                        => 'Nama penerbit',
                                ]) ?>

                            </div>

                            <div class="col-md-3">

                                <?= $form->field(
                                    $model,
                                    'tahun_terbit'
                                )->textInput([
                                    'type' => 'number',
                                    'min' => 1900,
                                    'max' => date('Y') + 1,
                                    'placeholder'
                                        => date('Y'),
                                ]) ?>

                            </div>

                            <div class="col-md-3">

                                <?= $form->field(
                                    $model,
                                    'jumlah_halaman'
                                )->textInput([
                                    'type' => 'number',
                                    'min' => 1,
                                    'placeholder'
                                        => 'Halaman',
                                ]) ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Media Konten
                    </strong>

                </div>

                <div class="panel-body">

                    <div class="alert alert-info">

                        <strong>
                            Thumbnail:
                        </strong>

                        <br>

                        Format JPG, JPEG, PNG, atau WEBP.

                        <br>

                        Maksimal 2 MB.

                        <br>

                        Disarankan rasio 16:9.

                    </div>

                    <?php if (
                        !$model->isNewRecord
                        && !empty($model->thumbnail)
                    ): ?>

                        <div style="margin-bottom: 15px;">

                            <label>
                                Thumbnail Saat Ini
                            </label>

                            <?= Html::img(
                                $model->getThumbnailUrl(),
                                [
                                    'class'
                                        => 'img-responsive',

                                    'style' => [
                                        'width'
                                            => '100%',
                                        'aspect-ratio'
                                            => '16 / 9',
                                        'object-fit'
                                            => 'cover',
                                        'border-radius'
                                            => '6px',
                                        'border'
                                            => '1px solid #ddd',
                                    ],
                                ]
                            ) ?>

                        </div>

                    <?php endif; ?>

                    <div
                        id="thumbnail-preview-new"
                        style="
                            display: none;
                            margin-bottom: 15px;
                        "
                    >

                        <label>
                            Preview Thumbnail Baru
                        </label>

                        <img
                            id="thumbnail-preview-image"
                            src=""
                            alt="Preview Thumbnail"
                            class="img-responsive"
                            style="
                                width: 100%;
                                aspect-ratio: 16 / 9;
                                object-fit: cover;
                                border-radius: 6px;
                                border: 1px solid #ddd;
                            "
                        >

                    </div>

                    <?= $form->field(
                        $model,
                        'thumbnailFile'
                    )->fileInput([
                        'accept'
                            => '.jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp',
                    ]) ?>

                    <p class="help-block">
                        Untuk video, thumbnail dapat dikosongkan
                        agar memakai thumbnail YouTube.
                    </p>

                    <hr>

                    <div class="field-media">

                        <div class="alert alert-warning">

                            <strong>
                                File Konten:
                            </strong>

                            <br>

                            <span id="media-help">
                                Pilih jenis konten terlebih dahulu.
                            </span>

                        </div>

                        <?php if (
                            !$model->isNewRecord
                            && !empty($model->file_media)
                        ): ?>

                            <div class="well well-sm">

                                <strong>
                                    File Saat Ini:
                                </strong>

                                <br>

                                <?= Html::encode(
                                    $model->nama_file_asli
                                        ?: $model->file_media
                                ) ?>

                                <br>

                                <small class="text-muted">
                                    <?= Html::encode(
                                        $model->getUkuranFileLabel()
                                    ) ?>
                                </small>

                            </div>

                        <?php endif; ?>

                        <?= $form->field(
                            $model,
                            'mediaFile'
                        )->fileInput([
                            'accept'
                                => '.jpg,.jpeg,.png,.webp,.pdf,image/jpeg,image/png,image/webp,application/pdf',
                        ]) ?>

                        <?php if (
                            !$model->isNewRecord
                        ): ?>

                            <p class="help-block">
                                Kosongkan jika tetap menggunakan
                                file lama.
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Pengaturan Publikasi
                    </strong>

                </div>

                <div class="panel-body">

                    <?= $form->field(
                        $model,
                        'status'
                    )->dropDownList([
                        1 => 'Publik',
                        0 => 'Draft',
                    ]) ?>

                    <?= $form->field(
                        $model,
                        'is_utama'
                    )->dropDownList([
                        1 => 'Ya, Konten Utama',
                        0 => 'Tidak',
                    ]) ?>

                    <?= $form->field(
                        $model,
                        'tanggal_publish'
                    )->input('datetime-local', [
                        'value' => !empty(
                            $model->tanggal_publish
                        )
                            ? date(
                                'Y-m-d\TH:i',
                                strtotime(
                                    $model->tanggal_publish
                                )
                            )
                            : '',
                    ]) ?>

                    <?php if (!$model->isNewRecord): ?>

                        <div class="well well-sm">

                            <strong>
                                Statistik:
                            </strong>

                            <br>

                            Dilihat:
                            <?= (int) $model->hits ?>

                            <br>

                            Download:
                            <?= (int) $model
                                ->jumlah_download ?>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <div class="form-group">

        <?= Html::submitButton(
            $model->isNewRecord
                ? 'Simpan Konten'
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