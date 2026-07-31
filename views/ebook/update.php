<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ebook */

$this->title = 'Update Ebook: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ebook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
