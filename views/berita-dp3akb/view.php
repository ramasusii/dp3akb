<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BeritaDp3akb */

$this->title = $model->judul;

$this->params['breadcrumbs'][] = [
    'label' => 'Berita',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="berita-dp3akb-view">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Detail informasi berita.
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
                        'confirm' => 'Yakin ingin menghapus berita ini?',
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

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Preview Berita</strong>
                </div>

                <div class="panel-body">

                    <?= Html::img(
                        $model->getImageUrl(),
                        [
                            'class' => 'img-responsive',
                            'alt' => $model->judul,

                            'style' => [
                                'width' => '470px',
                                'max-width' => '100%',
                                'border-radius' => '6px',
                                'border' => '1px solid #ddd',
                                'margin-bottom' => '20px',
                            ],
                        ]
                    ) ?>

                    <h2 style="margin-top: 0;">
                        <?= Html::encode($model->judul) ?>
                    </h2>

                    <p class="text-muted">
                        <?= Html::encode(
                            $model->kategori
                                ? $model->kategori->nama_kategori
                                : 'Tanpa Kategori'
                        ) ?>

                        &nbsp;|&nbsp;

                        <?= !empty($model->tanggal_publish)
                            ? Yii::$app->formatter->asDatetime(
                                $model->tanggal_publish,
                                'php:d F Y H:i'
                            )
                            : '-' ?>

                        &nbsp;|&nbsp;

                        <?= (int) $model->hits ?> kali dilihat
                    </p>

                    <hr>

                    <p>
                        <strong>Ringkasan:</strong>
                    </p>

                    <p>
                        <?= nl2br(
                            Html::encode($model->ringkasan)
                        ) ?>
                    </p>

                    <hr>

                    <div class="berita-content">
                        <?= nl2br(
                            Html::encode($model->isi)
                        ) ?>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Informasi Data</strong>
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

                            [
                                'attribute' => 'kategori_id',

                                'value' => $model->kategori
                                    ? $model->kategori
                                        ->nama_kategori
                                    : '-',
                            ],

                            'slug',

                            [
                                'attribute' => 'status',

                                'format' => 'raw',

                                'value' => (int) $model->status === 1
                                    ? Html::tag(
                                        'span',
                                        'Publik',
                                        [
                                            'class' => 'label label-success',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Draft',
                                        [
                                            'class' => 'label label-default',
                                        ]
                                    ),
                            ],

                            [
                                'attribute' => 'is_utama',

                                'format' => 'raw',

                                'value' => (int) $model->is_utama === 1
                                    ? Html::tag(
                                        'span',
                                        'Berita Utama',
                                        [
                                            'class' => 'label label-warning',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Berita Biasa',
                                        [
                                            'class' => 'label label-default',
                                        ]
                                    ),
                            ],

                            'hits',

                            [
                                'attribute' => 'tanggal_publish',

                                'format' => [
                                    'datetime',
                                    'php:d-m-Y H:i:s',
                                ],
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

    </div>

</div>