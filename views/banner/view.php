<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = $model->judul;

$this->params['breadcrumbs'][] = [
    'label' => 'Banner',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="banner-view">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">
            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Detail informasi banner halaman utama.
            </p>
        </div>

        <div class="col-md-4 text-right">

            <?= Html::a(
                'Ubah',
                [
                    'update',
                    'id' => $model->id,
                ],
                ['class' => 'btn btn-primary']
            ) ?>

            <?= Html::a(
                'Hapus',
                [
                    'delete',
                    'id' => $model->id,
                ],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Yakin ingin menghapus banner ini?',
                        'method' => 'post',
                    ],
                ]
            ) ?>

            <?= Html::a(
                'Kembali',
                ['index'],
                ['class' => 'btn btn-default']
            ) ?>

        </div>

    </div>

    <div class="panel panel-default">

        <div class="panel-heading">
            <strong>Preview Banner</strong>
        </div>

        <div class="panel-body">

            <?= Html::img(
                $model->getImageUrl(),
                [
                    'class' => 'img-responsive',
                    'alt' => $model->judul,
                    'style' => [
                        'width' => '100%',
                        'border-radius' => '6px',
                        'border' => '1px solid #ddd',
                    ],
                ]
            ) ?>

        </div>

    </div>

    <div class="panel panel-default">

        <div class="panel-heading">
            <strong>Informasi Banner</strong>
        </div>

        <div class="panel-body" style="padding: 0;">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table table-bordered table-striped detail-view',
                    'style' => 'margin-bottom: 0;',
                ],
                'attributes' => [
                    'id',
                    'judul',

                    [
                        'attribute' => 'deskripsi',
                        'format' => 'ntext',
                    ],

                    [
                        'attribute' => 'gambar',
                        'value' => $model->gambar,
                    ],

                    [
                        'attribute' => 'link',
                        'format' => 'raw',
                        'value' => !empty($model->link)
                            ? Html::encode($model->link)
                            : '-',
                    ],

                    [
                        'attribute' => 'button_text',
                        'value' => !empty($model->button_text)
                            ? $model->button_text
                            : '-',
                    ],

                    'urutan',

                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => (int) $model->status === 1
                            ? Html::tag(
                                'span',
                                'Aktif',
                                ['class' => 'label label-success']
                            )
                            : Html::tag(
                                'span',
                                'Tidak Aktif',
                                ['class' => 'label label-default']
                            ),
                    ],

                    [
                        'attribute' => 'created_at',
                        'format' => [
                            'datetime',
                            'php:d-m-Y H:i:s',
                        ],
                    ],

                    [
                        'attribute' => 'updated_at',
                        'format' => [
                            'datetime',
                            'php:d-m-Y H:i:s',
                        ],
                    ],
                ],
            ]) ?>

        </div>

    </div>

</div>