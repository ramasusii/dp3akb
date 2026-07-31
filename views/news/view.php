<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */
?>
<div class="news-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'class' => 'kartik\grid\DataColumn',
                'attribute' => 'gambar',
                'format' => ['image', ['width' => '300']],
                'value' => function ($model) {
                    return $model->getImageUrl(); // panggil method custom
                },
            ],
            'judul_berita',
            'ringkasan',
             [
                'attribute' => 'isi',
                'format' => 'raw',
            ],
            // 'gambar',
            'tgl_berita',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 1 ? 'Publik' : 'Draft';
                },
            ],
        ],
    ]) ?>

</div>
