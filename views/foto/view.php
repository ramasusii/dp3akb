<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */
?>
<div class="foto-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'judul',
            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<img src="'.Yii::$app->request->baseUrl.'/'.$data->foto.'" height="100px" />';
                },
        
            ],
            'deskripsi',
            'tanggal',
        ],
    ]) ?>

</div>
