<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriEdukasi */

$this->title = 'Ubah Kategori Edukasi';

$this->params['breadcrumbs'][] = [
    'label' => 'Kategori Edukasi',
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

<div class="kategori-edukasi-update">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Perbarui data kategori
            <?= Html::encode(
                $model->nama_kategori
            ) ?>.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>