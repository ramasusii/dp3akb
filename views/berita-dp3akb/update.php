<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BeritaDp3akb */

$this->title = 'Ubah Berita';

$this->params['breadcrumbs'][] = [
    'label' => 'Berita',
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

<div class="berita-dp3akb-update">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Perbarui informasi dan isi berita.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>