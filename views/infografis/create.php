<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Infografis */

$this->title = 'Create Infografis';
$this->params['breadcrumbs'][] = ['label' => 'Infografis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infografis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
