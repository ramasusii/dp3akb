<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Tambah Pegawai';

$this->params['breadcrumbs'][] = [
    'label' => 'Pegawai',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pegawai-create">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Tambahkan data pegawai baru.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>