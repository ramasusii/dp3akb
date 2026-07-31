<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilList */
?>
<div class="profil-list-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'list_data:ntext',
            'tanggal',
            'images:ntext',
            'link:ntext',
            'field',
        ],
    ]) ?>

</div>
