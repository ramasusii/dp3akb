<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KontenEdukasi */
/* @var $kategoriList array */

$this->title = 'Ubah Konten Edukasi';

$this->params['breadcrumbs'][] = [
    'label' => 'Konten Edukasi',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = [
    'label' => $model->judul,
    'url' => [
        'view',
        'id' => $model->id,
    ],
];

$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="konten-edukasi-update">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Perbarui konten
            <?= Html::encode($model->judul) ?>.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'kategoriList' => $kategoriList,
    ]) ?>

</div>