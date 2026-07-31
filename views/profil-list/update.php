<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
?>
<div class="content-update">
    <?= Html::a('<i class="fa fa-arrow-left"></i> Kembali ke Setting Profil', ['index'], ['class' => 'btn btn-default']). '&nbsp; <a class="btn btn-blue" href="#">'.$model->name.'</a>' ?>
    <br>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
