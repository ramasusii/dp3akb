<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriEdukasi */

$this->title = $model->nama_kategori;

$this->params['breadcrumbs'][] = [
    'label' => 'Kategori Edukasi',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;

$ikonLabels = [
    'book' => 'Buku',
    'video' => 'Video',
    'image' => 'Infografis',
    'shield' => 'Perlindungan',
    'female' => 'Perempuan',
    'family' => 'Keluarga',
    'health' => 'Kesehatan',
    'publication' => 'Publikasi',
];
?>

<div class="kategori-edukasi-view">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Detail informasi kategori edukasi.
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
                        'confirm'
                            => 'Yakin ingin menghapus kategori edukasi ini?',
                        'method'
                            => 'post',
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

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Ringkasan Kategori
                    </strong>

                </div>

                <div class="panel-body text-center">

                    <div
                        style="
                            width: 100px;
                            height: 100px;
                            margin: 10px auto 20px;
                            border-radius: 50%;
                            background: #337ab7;
                            color: #ffffff;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 38px;
                            font-weight: bold;
                        "
                    >
                        <?= Html::encode(
                            mb_strtoupper(
                                mb_substr(
                                    $model->nama_kategori,
                                    0,
                                    1
                                )
                            )
                        ) ?>
                    </div>

                    <h4>
                        <?= Html::encode(
                            $model->nama_kategori
                        ) ?>
                    </h4>

                    <p class="text-muted">
                        <?= Html::encode(
                            $ikonLabels[$model->ikon]
                                ?? 'Kategori Edukasi'
                        ) ?>
                    </p>

                    <?php if (
                        (int) $model->status === 1
                    ): ?>

                        <span class="label label-success">
                            Aktif
                        </span>

                    <?php else: ?>

                        <span class="label label-default">
                            Tidak Aktif
                        </span>

                    <?php endif; ?>

                    <hr>

                    <p class="text-muted">
                        Jumlah konten:
                    </p>

                    <h3 style="margin-top: 0;">
                        <?= (int) $model
                            ->getKontenEdukasi()
                            ->count() ?>
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Informasi Kategori
                    </strong>

                </div>

                <div
                    class="panel-body"
                    style="padding: 0;"
                >

                    <?= DetailView::widget([
                        'model' => $model,

                        'options' => [
                            'class'
                                => 'table table-bordered table-striped detail-view',
                            'style'
                                => 'margin-bottom: 0;',
                        ],

                        'attributes' => [
                            'id',

                            'nama_kategori',

                            [
                                'attribute' => 'slug',

                                'value' => !empty($model->slug)
                                    ? $model->slug
                                    : '-',
                            ],

                            [
                                'attribute' => 'deskripsi',

                                'format' => 'ntext',

                                'value' => !empty(
                                    $model->deskripsi
                                )
                                    ? $model->deskripsi
                                    : '-',
                            ],

                            [
                                'attribute' => 'ikon',

                                'label' => 'Jenis Ikon',

                                'value' => $ikonLabels[
                                    $model->ikon
                                ] ?? (
                                    !empty($model->ikon)
                                        ? $model->ikon
                                        : '-'
                                ),
                            ],

                            'urutan',

                            [
                                'attribute' => 'status',

                                'format' => 'raw',

                                'value' => (int) $model->status === 1
                                    ? Html::tag(
                                        'span',
                                        'Aktif',
                                        [
                                            'class'
                                                => 'label label-success',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Tidak Aktif',
                                        [
                                            'class'
                                                => 'label label-default',
                                        ]
                                    ),
                            ],

                            [
                                'label' => 'Jumlah Konten',

                                'value' => (int) $model
                                    ->getKontenEdukasi()
                                    ->count(),
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