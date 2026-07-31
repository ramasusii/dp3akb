<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KategoriEdukasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Kategori Edukasi';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kategori-edukasi-index">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Kelola kategori video, infografis,
                e-book, dan publikasi digital.
            </p>

        </div>

        <div class="col-md-4 text-right">

            <?= Html::a(
                'Tambah Kategori',
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
                Daftar Kategori Edukasi
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
                        . 'dari <strong>{totalCount}</strong> kategori'
                        . '</div>',

                    'emptyText' => '
                        <div
                            class="text-center text-muted"
                            style="padding: 30px;"
                        >
                            Belum ada kategori edukasi.
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
                            'attribute' => 'nama_kategori',

                            'format' => 'raw',

                            'value' => function ($model) {
                                return Html::tag(
                                    'strong',
                                    Html::encode(
                                        $model->nama_kategori
                                    )
                                )
                                . '<br>'
                                . Html::tag(
                                    'small',
                                    'Slug: '
                                    . Html::encode(
                                        $model->slug
                                    ),
                                    [
                                        'class' => 'text-muted',
                                    ]
                                );
                            },
                        ],

                        [
                            'attribute' => 'deskripsi',

                            'value' => function ($model) {
                                if (empty($model->deskripsi)) {
                                    return '-';
                                }

                                return mb_strlen(
                                    $model->deskripsi
                                ) > 100
                                    ? mb_substr(
                                        $model->deskripsi,
                                        0,
                                        100
                                    ) . '...'
                                    : $model->deskripsi;
                            },
                        ],

                        [
                            'attribute' => 'ikon',

                            'filter' => [
                                'book' => 'Buku',
                                'video' => 'Video',
                                'image' => 'Infografis',
                                'shield' => 'Perlindungan',
                                'female' => 'Perempuan',
                                'family' => 'Keluarga',
                                'health' => 'Kesehatan',
                                'publication' => 'Publikasi',
                            ],

                            'value' => function ($model) {
                                $labels = [
                                    'book' => 'Buku',
                                    'video' => 'Video',
                                    'image' => 'Infografis',
                                    'shield' => 'Perlindungan',
                                    'female' => 'Perempuan',
                                    'family' => 'Keluarga',
                                    'health' => 'Kesehatan',
                                    'publication' => 'Publikasi',
                                ];

                                return $labels[$model->ikon]
                                    ?? (
                                        !empty($model->ikon)
                                            ? $model->ikon
                                            : '-'
                                    );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 130px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'status',

                            'format' => 'raw',

                            'filter' => [
                                1 => 'Aktif',
                                0 => 'Tidak Aktif',
                            ],

                            'value' => function ($model) {
                                return (int) $model->status === 1
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
                                    );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 105px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'urutan',

                            'filter' => false,

                            'contentOptions' => [
                                'style' => '
                                    width: 70px;
                                    text-align: center;
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
                                {delete}
                            ',

                            'contentOptions' => [
                                'style' => '
                                    width: 165px;
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
                                    $icon = (int) $model->status === 1
                                        ? 'glyphicon-pause'
                                        : 'glyphicon-play';

                                    $title = (int) $model->status === 1
                                        ? 'Nonaktifkan'
                                        : 'Aktifkan';

                                    return Html::a(
                                        '<span class="glyphicon '
                                        . $icon
                                        . '"></span>',
                                        [
                                            'toggle-status',
                                            'id' => $model->id,
                                        ],
                                        [
                                            'class'
                                                => 'btn btn-warning btn-xs',
                                            'title'
                                                => $title,

                                            'data' => [
                                                'confirm'
                                                    => 'Yakin ingin mengubah status kategori ini?',
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
                                                    => 'Yakin ingin menghapus kategori edukasi ini?',
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