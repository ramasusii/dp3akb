<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = 'Tambah Banner';

$this->params['breadcrumbs'][] = [
    'label' => 'Banner',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="banner-create">

    <div class="page-header" style="margin-top: 0;">
        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Tambahkan banner baru untuk ditampilkan pada halaman utama.
        </p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>