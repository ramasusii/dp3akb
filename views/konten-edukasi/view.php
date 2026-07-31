<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KontenEdukasi */

$this->title = $model->judul;

$this->params['breadcrumbs'][] = [
    'label' => 'Konten Edukasi',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="konten-edukasi-view">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Detail informasi konten edukasi.
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
                            => 'Yakin ingin menghapus konten ini?',
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

        <div class="col-md-5">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Preview Konten
                    </strong>

                </div>

                <div class="panel-body">

                    <?php if (
                        $model->jenis_konten === 'video'
                        && $model->getYoutubeEmbedUrl() !== null
                    ): ?>

                        <div
                            class="embed-responsive embed-responsive-16by9"
                        >

                            <iframe
                                class="embed-responsive-item"
                                src="<?= Html::encode(
                                    $model->getYoutubeEmbedUrl()
                                ) ?>"
                                allowfullscreen
                            ></iframe>

                        </div>

                    <?php elseif (
                        $model->jenis_konten
                        === 'infografis'
                    ): ?>

                        <?= Html::img(
                            $model->getMediaUrl(),
                            [
                                'class' => 'img-responsive',

                                'style' => [
                                    'width' => '100%',
                                    'border-radius' => '6px',
                                    'border'
                                        => '1px solid #ddd',
                                ],
                            ]
                        ) ?>

                    <?php else: ?>

                        <?= Html::img(
                            $model->getThumbnailUrl(),
                            [
                                'class' => 'img-responsive',

                                'style' => [
                                    'width' => '100%',
                                    'aspect-ratio' => '16 / 9',
                                    'object-fit' => 'cover',
                                    'border-radius' => '6px',
                                    'border'
                                        => '1px solid #ddd',
                                ],
                            ]
                        ) ?>

                    <?php endif; ?>

                    <?php if (
                        $model->getMediaUrl() !== null
                    ): ?>

                        <hr>

                        <?= Html::a(
                            $model->jenis_konten === 'ebook'
                                ? 'Buka File PDF'
                                : 'Buka File Infografis',
                            $model->getMediaUrl(),
                            [
                                'class'
                                    => 'btn btn-success btn-block',
                                'target'
                                    => '_blank',
                                'rel'
                                    => 'noopener noreferrer',
                            ]
                        ) ?>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <div class="col-md-7">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>
                        Informasi Konten
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

                            'judul',

                            [
                                'label' => 'Kategori',

                                'value' => $model->kategori
                                    ? $model->kategori
                                        ->nama_kategori
                                    : '-',
                            ],

                            [
                                'attribute' => 'jenis_konten',

                                'value' => $model
                                    ->getJenisLabel(),
                            ],

                            'slug',

                            [
                                'attribute' => 'ringkasan',

                                'format' => 'ntext',
                            ],

                            [
                                'attribute' => 'isi',

                                'format' => 'ntext',

                                'value' => !empty($model->isi)
                                    ? $model->isi
                                    : '-',
                            ],

                            [
                                'attribute' => 'youtube_url',

                                'format' => 'url',

                                'visible' => $model
                                    ->jenis_konten === 'video',
                            ],

                            [
                                'attribute' => 'nama_file_asli',

                                'visible' => $model
                                    ->jenis_konten !== 'video',

                                'value' => !empty(
                                    $model->nama_file_asli
                                )
                                    ? $model->nama_file_asli
                                    : '-',
                            ],

                            [
                                'label' => 'Ukuran File',

                                'visible' => $model
                                    ->jenis_konten !== 'video',

                                'value' => $model
                                    ->getUkuranFileLabel(),
                            ],

                            [
                                'attribute' => 'penulis',

                                'value' => $model->penulis
                                    ?: '-',
                            ],

                            [
                                'attribute' => 'penerbit',

                                'visible' => $model
                                    ->jenis_konten === 'ebook',

                                'value' => $model->penerbit
                                    ?: '-',
                            ],

                            [
                                'attribute' => 'tahun_terbit',

                                'visible' => $model
                                    ->jenis_konten === 'ebook',

                                'value' => $model->tahun_terbit
                                    ?: '-',
                            ],

                            [
                                'attribute' => 'jumlah_halaman',

                                'visible' => $model
                                    ->jenis_konten === 'ebook',

                                'value' => $model
                                    ->jumlah_halaman
                                    ?: '-',
                            ],

                            [
                                'attribute' => 'durasi_video',

                                'visible' => $model
                                    ->jenis_konten === 'video',

                                'value' => $model->durasi_video
                                    ?: '-',
                            ],

                            [
                                'attribute' => 'status',

                                'format' => 'raw',

                                'value' => (int) $model->status === 1
                                    ? Html::tag(
                                        'span',
                                        'Publik',
                                        [
                                            'class'
                                                => 'label label-success',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Draft',
                                        [
                                            'class'
                                                => 'label label-default',
                                        ]
                                    ),
                            ],

                            [
                                'attribute' => 'is_utama',

                                'format' => 'raw',

                                'value' => (int) $model->is_utama === 1
                                    ? Html::tag(
                                        'span',
                                        'Konten Utama',
                                        [
                                            'class'
                                                => 'label label-danger',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Konten Biasa',
                                        [
                                            'class'
                                                => 'label label-default',
                                        ]
                                    ),
                            ],

                            'hits',

                            'jumlah_download',

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