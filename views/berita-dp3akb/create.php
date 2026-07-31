<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BeritaDp3akb */

$this->title = 'Tambah Berita';

$this->params['breadcrumbs'][] = [
    'label' => 'Berita',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="berita-dp3akb-create">

    <div class="page-header" style="margin-top: 0;">

        <h1 style="margin-top: 0;">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="text-muted">
            Tambahkan berita atau kegiatan baru.
        </p>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>