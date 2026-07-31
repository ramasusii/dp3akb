<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Ubah Pegawai';

$this->params['breadcrumbs'][] = [
    'label' => 'Pegawai',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = [
    'label' => $model->nama,
    'url' => [
        'view',
        'id' => $model->id,
    ],
];

$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="pegawai-update">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Perbarui data dan foto pegawai.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>