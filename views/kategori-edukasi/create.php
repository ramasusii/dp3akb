<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriEdukasi */

$this->title = 'Tambah Kategori Edukasi';

$this->params['breadcrumbs'][] = [
    'label' => 'Kategori Edukasi',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kategori-edukasi-create">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Tambahkan kategori untuk video,
            infografis, e-book, dan publikasi digital.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>