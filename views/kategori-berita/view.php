<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriBerita */

$this->title = $model->nama_kategori;

$this->params['breadcrumbs'][] = [
    'label' => 'Kategori Berita',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kategori-berita-view">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Detail kategori berita.
            </p>

        </div>

        <div class="col-md-4 text-right">

            <?= Html::a(
                'Ubah',
                [
                    'update',
                    'id' => $model->id,
                ],
                [
                    'class' => 'btn btn-primary',
                ]
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
                        'confirm' => 'Yakin ingin menghapus kategori ini?',
                        'method' => 'post',
                    ],
                ]
            ) ?>

            <?= Html::a(
                'Kembali',
                ['index'],
                [
                    'class' => 'btn btn-default',
                ]
            ) ?>

        </div>

    </div>

    <div class="panel panel-default">

        <div class="panel-heading">
            <strong>Informasi Kategori</strong>
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

                    'nama_kategori',

                    'slug',

                    [
                        'label' => 'Jumlah Berita',

                        'format' => 'raw',

                        'value' => Html::tag(
                            'span',
                            $model->getJumlahBerita()
                                . ' Berita',
                            [
                                'class' => 'label label-info',
                            ]
                        ),
                    ],

                    [
                        'attribute' => 'status',

                        'format' => 'raw',

                        'value' => (int) $model->status === 1
                            ? Html::tag(
                                'span',
                                'Aktif',
                                [
                                    'class' => 'label label-success',
                                ]
                            )
                            : Html::tag(
                                'span',
                                'Tidak Aktif',
                                [
                                    'class' => 'label label-default',
                                ]
                            ),
                    ],

                    [
                        'attribute' => 'created_at',

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