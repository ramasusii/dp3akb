<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
        if ($model->status == 0 && Helper::checkRoute($controllerId . 'activate')) {
            echo Html::a(Yii::t('app', 'Activate'), ['activate', 'id' => $model->id], [
                'class' => 'btn btn-primary',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to activate this user?'),
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'nama',
            'role',
            'email',
        ],
    ])
    ?>
</div>
