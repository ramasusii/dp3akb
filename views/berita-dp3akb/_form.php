<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\KategoriBerita;

/* @var $this yii\web\View */
/* @var $model app\models\BeritaDp3akb */
/* @var $form yii\widgets\ActiveForm */

$kategoriList = ArrayHelper::map(
    KategoriBerita::find()
        ->orderBy([
            'nama_kategori' => SORT_ASC,
        ])
        ->all(),
    'id',
    'nama_kategori'
);

$tanggalPublishValue = !empty($model->tanggal_publish)
    ? date(
        'Y-m-d\TH:i',
        strtotime($model->tanggal_publish)
    )
    : date('Y-m-d\TH:i');

$this->registerJs("
    $('#beritaupdate-imagefile, #beritadp3akb-imagefile').on(
        'change',
        function () {
            var input = this;

            if (!input.files || !input.files[0]) {
                return;
            }

            var file = input.files[0];
            var maxSize = 1024 * 1024;

            if (file.size > maxSize) {
                alert('Ukuran gambar maksimal 1 MB.');
                input.value = '';
                $('#berita-preview-new').hide();
                return;
            }

            var reader = new FileReader();

            reader.onload = function (event) {
                var image = new Image();

                image.onload = function () {
                    if (
                        image.width !== 1080
                        || image.height !== 636
                    ) {
                        alert(
                            'Ukuran gambar wajib 1080 × 636 piksel. '
                            + 'Gambar yang dipilih berukuran '
                            + image.width
                            + ' × '
                            + image.height
                            + ' piksel.'
                        );

                        input.value = '';
                        $('#berita-preview-new').hide();
                        return;
                    }

                    $('#berita-preview-image')
                        .attr('src', event.target.result);

                    $('#berita-preview-new').show();
                };

                image.src = event.target.result;
            };

            reader.readAsDataURL(file);
        }
    );
");
?>

<div class="berita-dp3akb-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Informasi Berita</strong>
                </div>

                <div class="panel-body">

                    <?= $form->field(
                        $model,
                        'judul'
                    )->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Masukkan judul berita',
                        'autofocus' => true,
                    ]) ?>

                    <?= $form->field(
                        $model,
                        'kategori_id'
                    )->dropDownList(
                        $kategoriList,
                        [
                            'prompt' => 'Pilih Kategori Berita',
                        ]
                    ) ?>

                    <?= $form->field(
                        $model,
                        'ringkasan'
                    )->textarea([
                        'rows' => 4,
                        'maxlength' => 500,
                        'placeholder' => 'Masukkan ringkasan singkat berita',
                    ]) ?>

                    <?= $form->field(
                        $model,
                        'isi'
                    )->textarea([
                        'rows' => 15,
                        'placeholder' => 'Masukkan isi lengkap berita',
                    ]) ?>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field(
                                $model,
                                'tanggal_publish'
                            )->input(
                                'datetime-local',
                                [
                                    'value' => $tanggalPublishValue,
                                ]
                            ) ?>

                        </div>

                        <div class="col-md-3">

                            <?= $form->field(
                                $model,
                                'status'
                            )->dropDownList([
                                1 => 'Publik',
                                0 => 'Draft',
                            ]) ?>

                        </div>

                        <div class="col-md-3">

                            <?= $form->field(
                                $model,
                                'is_utama'
                            )->dropDownList([
                                1 => 'Ya',
                                0 => 'Tidak',
                            ]) ?>

                        </div>

                    </div>

                    <?php if (!$model->isNewRecord): ?>

                        <div class="form-group">
                            <label class="control-label">
                                Slug Berita
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= Html::encode($model->slug) ?>"
                                readonly
                            >

                            <p class="help-block">
                                Slug dibuat otomatis berdasarkan judul berita.
                            </p>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Gambar Berita</strong>
                </div>

                <div class="panel-body">

                    <div class="alert alert-info">
                        <strong>Ketentuan gambar:</strong>
                        <br>
                        Resolusi wajib:
                        <strong>1080 × 636 px</strong>
                        <br>
                        Ukuran maksimal:
                        <strong>1 MB</strong>
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
                        id="berita-preview-new"
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
                                id="berita-preview-image"
                                src=""
                                alt="Preview Gambar Berita"
                                class="img-responsive"
                                style="
                                    width: 100%;
                                    border-radius: 4px;
                                "
                            >
                        </div>
                    </div>

                    <?= $form->field(
                        $model,
                        'imageFile'
                    )->fileInput([
                        'accept' => '.jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp',
                    ]) ?>

                    <?php if (!$model->isNewRecord): ?>

                        <p class="help-block">
                            Kosongkan file jika tetap menggunakan
                            gambar yang lama.
                        </p>

                    <?php endif; ?>

                </div>

            </div>

            <?php if (!$model->isNewRecord): ?>

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <strong>Statistik</strong>
                    </div>

                    <div class="panel-body">

                        <p style="margin-bottom: 5px;">
                            Jumlah dilihat:
                            <strong>
                                <?= (int) $model->hits ?>
                            </strong>
                        </p>

                        <p style="margin-bottom: 0;">
                            Dibuat:
                            <strong>
                                <?= !empty($model->created_at)
                                    ? Yii::$app->formatter->asDatetime(
                                        $model->created_at,
                                        'php:d-m-Y H:i'
                                    )
                                    : '-' ?>
                            </strong>
                        </p>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

    <div class="form-group">

        <?= Html::submitButton(
            $model->isNewRecord
                ? 'Simpan Berita'
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