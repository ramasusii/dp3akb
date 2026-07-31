<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KontenEdukasi */
/* @var $kategoriList array */

$this->title = 'Tambah Konten Edukasi';

$this->params['breadcrumbs'][] = [
    'label' => 'Konten Edukasi',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="konten-edukasi-create">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Tambahkan video, infografis,
            e-book, atau publikasi digital.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'kategoriList' => $kategoriList,
    ]) ?>

</div>