<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ebook */

$this->title = 'Create Ebook';
$this->params['breadcrumbs'][] = ['label' => 'Ebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ebook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
