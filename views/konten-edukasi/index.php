<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KontenEdukasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $kategoriList array */

$this->title = 'Manajemen Konten Edukasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="konten-edukasi-index">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Kelola video edukasi, infografis,
                e-book, dan publikasi digital.
            </p>

        </div>

        <div class="col-md-4 text-right">

            <?= Html::a(
                'Tambah Konten Edukasi',
                ['create'],
                [
                    'class' => 'btn btn-success',
                    'style' => 'margin-top: 5px;',
                ]
            ) ?>

        </div>

    </div>

    <?php foreach (
        [
            'success',
            'error',
            'warning',
            'info',
        ]
        as $flashType
    ): ?>

        <?php if (
            Yii::$app->session->hasFlash($flashType)
        ): ?>

            <div class="alert alert-<?=
                $flashType === 'error'
                    ? 'danger'
                    : $flashType
            ?> alert-dismissible">

                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true"
                >
                    &times;
                </button>

                <?= Html::encode(
                    Yii::$app->session
                        ->getFlash($flashType)
                ) ?>

            </div>

        <?php endif; ?>

    <?php endforeach; ?>

    <div class="panel panel-default">

        <div class="panel-heading">

            <strong>
                Daftar Konten Edukasi
            </strong>

        </div>

        <div class="panel-body" style="padding: 0;">

            <div class="table-responsive">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'tableOptions' => [
                        'class' => 'table table-bordered table-hover',
                        'style' => 'margin-bottom: 0;',
                    ],

                    'summary' => '<div style="padding: 15px 15px 5px;">'
                        . 'Menampilkan <strong>{begin}-{end}</strong> '
                        . 'dari <strong>{totalCount}</strong> konten'
                        . '</div>',

                    'emptyText' => '
                        <div
                            class="text-center text-muted"
                            style="padding: 35px;"
                        >
                            Belum ada konten edukasi.
                        </div>
                    ',

                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',

                            'header' => 'No.',

                            'contentOptions' => [
                                'style' => '
                                    width: 50px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'thumbnail',

                            'format' => 'raw',

                            'filter' => false,

                            'value' => function ($model) {
                                return Html::img(
                                    $model->getThumbnailUrl(),
                                    [
                                        'alt' => $model->judul,

                                        'style' => [
                                            'width' => '110px',
                                            'height' => '70px',
                                            'object-fit' => 'cover',
                                            'border-radius' => '6px',
                                            'border'
                                                => '1px solid #ddd',
                                        ],
                                    ]
                                );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 125px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'judul',

                            'format' => 'raw',

                            'value' => function ($model) {
                                $kategori = $model->kategori
                                    ? $model->kategori
                                        ->nama_kategori
                                    : '-';

                                return Html::tag(
                                    'strong',
                                    Html::encode(
                                        $model->judul
                                    )
                                )
                                . '<br>'
                                . Html::tag(
                                    'small',
                                    Html::encode($kategori),
                                    [
                                        'class' => 'text-muted',
                                    ]
                                );
                            },
                        ],

                        [
                            'attribute' => 'kategori_id',

                            'filter' => $kategoriList,

                            'value' => function ($model) {
                                return $model->kategori
                                    ? $model->kategori
                                        ->nama_kategori
                                    : '-';
                            },

                            'contentOptions' => [
                                'style' => '
                                    min-width: 160px;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'jenis_konten',

                            'filter' => [
                                'video' => 'Video',
                                'infografis' => 'Infografis',
                                'ebook' => 'E-Book',
                            ],

                            'format' => 'raw',

                            'value' => function ($model) {
                                $class = 'label-info';

                                if (
                                    $model->jenis_konten
                                    === 'infografis'
                                ) {
                                    $class = 'label-warning';
                                }

                                if (
                                    $model->jenis_konten
                                    === 'ebook'
                                ) {
                                    $class = 'label-primary';
                                }

                                return Html::tag(
                                    'span',
                                    Html::encode(
                                        $model->getJenisLabel()
                                    ),
                                    [
                                        'class'
                                            => 'label ' . $class,
                                    ]
                                );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 115px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'status',

                            'format' => 'raw',

                            'filter' => [
                                1 => 'Publik',
                                0 => 'Draft',
                            ],

                            'value' => function ($model) {
                                return (int) $model->status === 1
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
                                    );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 90px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'is_utama',

                            'label' => 'Utama',

                            'format' => 'raw',

                            'filter' => [
                                1 => 'Ya',
                                0 => 'Tidak',
                            ],

                            'value' => function ($model) {
                                return (int) $model->is_utama === 1
                                    ? Html::tag(
                                        'span',
                                        'Utama',
                                        [
                                            'class'
                                                => 'label label-danger',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Biasa',
                                        [
                                            'class'
                                                => 'label label-default',
                                        ]
                                    );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 85px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'tanggal_publish',

                            'filter' => false,

                            'format' => [
                                'datetime',
                                'php:d-m-Y H:i',
                            ],

                            'contentOptions' => [
                                'style' => '
                                    width: 130px;
                                    white-space: nowrap;
                                ',
                            ],
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',

                            'header' => 'Aksi',

                            'template' => '
                                {view}
                                {update}
                                {status}
                                {utama}
                                {delete}
                            ',

                            'contentOptions' => [
                                'style' => '
                                    width: 190px;
                                    text-align: center;
                                    white-space: nowrap;
                                ',
                            ],

                            'buttons' => [
                                'view' => function (
                                    $url,
                                    $model
                                ) {
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-eye-open"></span>',
                                        [
                                            'view',
                                            'id' => $model->id,
                                        ],
                                        [
                                            'class'
                                                => 'btn btn-info btn-xs',
                                            'title'
                                                => 'Lihat',
                                        ]
                                    );
                                },

                                'update' => function (
                                    $url,
                                    $model
                                ) {
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-pencil"></span>',
                                        [
                                            'update',
                                            'id' => $model->id,
                                        ],
                                        [
                                            'class'
                                                => 'btn btn-primary btn-xs',
                                            'title'
                                                => 'Ubah',
                                        ]
                                    );
                                },

                                'status' => function (
                                    $url,
                                    $model
                                ) {
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-adjust"></span>',
                                        [
                                            'toggle-status',
                                            'id' => $model->id,
                                        ],
                                        [
                                            'class'
                                                => 'btn btn-warning btn-xs',
                                            'title'
                                                => 'Ubah Status',

                                            'data' => [
                                                'confirm'
                                                    => 'Ubah status publikasi konten ini?',
                                                'method'
                                                    => 'post',
                                            ],
                                        ]
                                    );
                                },

                                'utama' => function (
                                    $url,
                                    $model
                                ) {
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-star"></span>',
                                        [
                                            'toggle-utama',
                                            'id' => $model->id,
                                        ],
                                        [
                                            'class'
                                                => 'btn btn-default btn-xs',
                                            'title'
                                                => 'Ubah Konten Utama',

                                            'data' => [
                                                'confirm'
                                                    => 'Ubah status konten utama?',
                                                'method'
                                                    => 'post',
                                            ],
                                        ]
                                    );
                                },

                                'delete' => function (
                                    $url,
                                    $model
                                ) {
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-trash"></span>',
                                        [
                                            'delete',
                                            'id' => $model->id,
                                        ],
                                        [
                                            'class'
                                                => 'btn btn-danger btn-xs',
                                            'title'
                                                => 'Hapus',

                                            'data' => [
                                                'confirm'
                                                    => 'Yakin ingin menghapus konten edukasi ini?',
                                                'method'
                                                    => 'post',
                                            ],
                                        ]
                                    );
                                },
                            ],
                        ],
                    ],
                ]) ?>

            </div>

        </div>

    </div>

</div>