<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */

$unitKerjaList = [
    'Kepala Dinas' => 'Kepala Dinas',

    'Sekretariat' => 'Sekretariat',

    'Bidang Pengarusutamaan Gender dan Pemberdayaan Perempuan'
        => 'Bidang Pengarusutamaan Gender dan Pemberdayaan Perempuan',

    'Bidang Pemenuhan Hak Anak dan Kualitas Keluarga'
        => 'Bidang Pemenuhan Hak Anak dan Kualitas Keluarga',

    'Bidang Perlindungan Perempuan dan Perlindungan Khusus Anak'
        => 'Bidang Perlindungan Perempuan dan Perlindungan Khusus Anak',

    'Bidang Pengendalian Penduduk'
        => 'Bidang Pengendalian Penduduk',

    'Bidang Keluarga Berencana, Ketahanan dan Kesejahteraan Keluarga'
        => 'Bidang Keluarga Berencana, Ketahanan dan Kesejahteraan Keluarga',

    'UPTD Perlindungan Perempuan dan Anak'
        => 'UPTD Perlindungan Perempuan dan Anak',
];

$this->registerJs("
    $('#pegawai-fotofile').on('change', function () {
        var input = this;

        if (!input.files || !input.files[0]) {
            return;
        }

        var file = input.files[0];
        var maxSize = 1024 * 1024;

        if (file.size > maxSize) {
            alert('Ukuran foto maksimal 1 MB.');
            input.value = '';
            $('#pegawai-preview-new').hide();
            return;
        }

        var reader = new FileReader();

        reader.onload = function (event) {
            var image = new Image();

            image.onload = function () {
                if (
                    image.width !== 600
                    || image.height !== 600
                ) {
                    alert(
                        'Ukuran foto wajib 600 × 600 piksel. '
                        + 'Foto yang dipilih berukuran '
                        + image.width
                        + ' × '
                        + image.height
                        + ' piksel.'
                    );

                    input.value = '';
                    $('#pegawai-preview-new').hide();
                    return;
                }

                $('#pegawai-preview-image')
                    .attr('src', event.target.result);

                $('#pegawai-preview-new').show();
            };

            image.src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
");
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Informasi Pegawai</strong>
                </div>

                <div class="panel-body">

                    <?= $form->field(
                        $model,
                        'nama'
                    )->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Masukkan nama lengkap dan gelar',
                        'autofocus' => true,
                    ]) ?>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'nip'
                            )->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Masukkan NIP',
                            ]) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'jenis_pegawai'
                            )->dropDownList([
                                'ASN' => 'ASN',
                                'PPPK' => 'PPPK',
                                'NON-ASN' => 'Non-ASN',
                            ], [
                                'prompt' => 'Pilih Jenis Pegawai',
                            ]) ?>

                        </div>

                    </div>

                    <?= $form->field(
                        $model,
                        'jabatan'
                    )->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Masukkan jabatan pegawai',
                    ]) ?>

                    <div class="row">

                        <div class="col-md-4">

                            <?= $form->field(
                                $model,
                                'pangkat_golongan'
                            )->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Contoh: III/a',
                            ]) ?>

                        </div>

                        <div class="col-md-8">

                            <?= $form->field(
                                $model,
                                'unit_kerja'
                            )->dropDownList(
                                $unitKerjaList,
                                [
                                    'prompt' => 'Pilih Unit Kerja/Bidang',
                                ]
                            ) ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'email'
                            )->textInput([
                                'maxlength' => true,
                                'type' => 'email',
                                'placeholder' => 'pegawai@example.com',
                            ]) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'whatsapp'
                            )->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Contoh: 628123456789',
                            ]) ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'urutan'
                            )->textInput([
                                'type' => 'number',
                                'min' => 0,
                            ]) ?>

                        </div>

                        <div class="col-md-6">

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

        </div>

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Foto Pegawai</strong>
                </div>

                <div class="panel-body">

                   <div class="alert alert-info">
                        <strong>Ketentuan foto:</strong>
                        <br>
                        Resolusi:
                        <strong>600 × 600 px</strong>
                        <br>
                        Rasio:
                        <strong>1:1</strong>
                        <br>
                        Ukuran maksimal:
                        <strong>1 MB</strong>
                        <br>
                        Format: JPG, JPEG, PNG, WEBP
                        <br>
                        Foto bersifat opsional.
                    </div>

                    <?php if (
                        !$model->isNewRecord
                        && !empty($model->foto)
                    ): ?>

                        <div style="margin-bottom: 15px;">

                            <label>Foto Saat Ini</label>

                            <div
                                style="
                                    max-width: 240px;
                                    margin: auto;
                                    border: 1px solid #ddd;
                                    padding: 6px;
                                    border-radius: 6px;
                                    background: #fafafa;
                                "
                            >
                                <?= Html::img(
                                    $model->getFotoUrl(),
                                    [
                                        'alt' => $model->nama,
                                        'class' => 'img-responsive',
                                        'style' => [
                                            'width' => '100%',
                                            'max-width' => '300px',
                                            'aspect-ratio' => '1 / 1',
                                            'object-fit' => 'cover',
                                            'margin' => 'auto',
                                            'border-radius' => '8px',
                                            'border' => '1px solid #ddd',
                                        ],
                                    ]
                                ) ?>
                            </div>

                        </div>

                    <?php endif; ?>

                    <div
                        id="pegawai-preview-new"
                        style="display: none; margin-bottom: 15px;"
                    >

                        <label>Preview Foto Baru</label>

                        <div
                            style="
                                max-width: 240px;
                                margin: auto;
                                border: 1px solid #ddd;
                                padding: 6px;
                                border-radius: 6px;
                                background: #fafafa;
                            "
                        >
                            <img
                                id="pegawai-preview-image"
                                src=""
                                alt="Preview Foto Pegawai"
                                class="img-responsive"
                                style="
                                    width: 100%;
                                    aspect-ratio: 1 / 1;
                                    object-fit: cover;
                                    border-radius: 4px;
                                "
                            >
                        </div>

                    </div>

                    <?= $form->field(
                        $model,
                        'fotoFile'
                    )->fileInput([
                        'accept' => '.jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp',
                    ]) ?>

                    <?php if (!$model->isNewRecord): ?>

                        <p class="help-block">
                            Kosongkan jika tetap menggunakan foto lama.
                        </p>

                    <?php else: ?>

                        <p class="help-block">
                            Data pegawai tetap bisa disimpan tanpa foto.
                        </p>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <div class="form-group">

        <?= Html::submitButton(
            $model->isNewRecord
                ? 'Simpan Pegawai'
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