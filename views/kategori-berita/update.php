<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriBerita */

$this->title = 'Ubah Kategori Berita';

$this->params['breadcrumbs'][] = [
    'label' => 'Kategori Berita',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = [
    'label' => $model->nama_kategori,
    'url' => [
        'view',
        'id' => $model->id,
    ],
];

$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="kategori-berita-update">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Perbarui nama dan status kategori berita.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>