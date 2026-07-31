<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ringkasan')->textarea(['rows' => 3, 'placeholder' => 'Ringkasan singkat berita']) ?>

    <?= $form->field($model, 'isi')->textarea(['id' => 'summernote']) ?>


    <?= $form->field($model, 'gambar')->widget(Widget::className(), [ 
        'uploadUrl' => Url::toRoute('news/uploadFoto'),
        'width'     => 750,
        'height'    => 500,
    ])->label('Foto Ukuran (750 x 500)') ?>

    <?= $form->field($model, 'ket_foto')->textInput(['maxlength' => true]) ?>
        
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'tgl_berita')->textInput([
                'class' => 'form-control datepicker', 
                'placeholder' => 'Pilih tanggal'
            ]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList([
                0 => 'Draft',
                1 => 'Publik'
            ], ['prompt' => 'Pilih status']) ?>
        </div>
    </div>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
            ]) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs("
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('#summernote').summernote({
        height: 250,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
");
?>

