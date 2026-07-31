<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pimpinan */

$this->title = 'Create Pimpinan';
$this->params['breadcrumbs'][] = ['label' => 'Pimpinans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pimpinan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
