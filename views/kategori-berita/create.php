<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriBerita */

$this->title = 'Tambah Kategori Berita';

$this->params['breadcrumbs'][] = [
    'label' => 'Kategori Berita',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kategori-berita-create">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Tambahkan kategori untuk mengelompokkan konten berita.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>