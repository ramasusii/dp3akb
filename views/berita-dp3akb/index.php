<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\grid\GridView;
use app\models\KategoriBerita;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeritaDp3akbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Berita';

$this->params['breadcrumbs'][] = $this->title;

$kategoriFilter = ArrayHelper::map(
    KategoriBerita::find()
        ->orderBy([
            'nama_kategori' => SORT_ASC,
        ])
        ->all(),
    'id',
    'nama_kategori'
);
?>

<div class="berita-dp3akb-index">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Kelola berita dan kegiatan yang ditampilkan pada website.
            </p>

        </div>

        <div class="col-md-4 text-right">

            <?= Html::a(
                'Tambah Berita',
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
            <strong>Daftar Berita</strong>
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
                        . 'dari <strong>{totalCount}</strong> data'
                        . '</div>',

                    'emptyText' => 'Belum ada data berita.',

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
                            'attribute' => 'gambar',

                            'format' => 'raw',

                            'filter' => false,

                            'value' => function ($model) {
                                return Html::img(
                                    $model->getImageUrl(),
                                    [
                                        'alt' => $model->judul,

                                        'style' => [
                                            'width' => '118px',
                                            'height' => '70px',
                                            'object-fit' => 'cover',
                                            'border-radius' => '5px',
                                            'border' => '1px solid #ddd',
                                        ],
                                    ]
                                );
                            },

                            'contentOptions' => [
                                'style' => 'width: 135px;',
                            ],
                        ],

                        [
                            'attribute' => 'judul',

                            'format' => 'raw',

                            'value' => function ($model) {
                                $ringkasan = !empty($model->ringkasan)
                                    ? StringHelper::truncate(
                                        strip_tags(
                                            $model->ringkasan
                                        ),
                                        90
                                    )
                                    : '-';

                                return Html::tag(
                                    'strong',
                                    Html::encode($model->judul)
                                )
                                . '<br>'
                                . Html::tag(
                                    'small',
                                    Html::encode($ringkasan),
                                    [
                                        'class' => 'text-muted',
                                    ]
                                );
                            },
                        ],

                        [
                            'attribute' => 'kategori_id',

                            'label' => 'Kategori',

                            'filter' => $kategoriFilter,

                            'value' => function ($model) {
                                return $model->kategori
                                    ? $model->kategori
                                        ->nama_kategori
                                    : '-';
                            },

                            'contentOptions' => [
                                'style' => 'width: 150px;',
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
                                            'class' => 'label label-warning',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Biasa',
                                        [
                                            'class' => 'label label-default',
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
                                            'class' => 'label label-success',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Draft',
                                        [
                                            'class' => 'label label-default',
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
                            'attribute' => 'tanggal_publish',

                            'format' => [
                                'datetime',
                                'php:d-m-Y H:i',
                            ],

                            'filter' => false,

                            'contentOptions' => [
                                'style' => 'width: 145px;',
                            ],
                        ],

                        [
                            'attribute' => 'hits',

                            'filter' => false,

                            'contentOptions' => [
                                'style' => '
                                    width: 75px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',

                            'header' => 'Aksi',

                            'template' => '{view} {update} {delete}',

                            'contentOptions' => [
                                'style' => '
                                    width: 130px;
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
                                            'class' => 'btn btn-info btn-xs',
                                            'title' => 'Lihat',
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
                                            'class' => 'btn btn-primary btn-xs',
                                            'title' => 'Ubah',
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
                                            'class' => 'btn btn-danger btn-xs',
                                            'title' => 'Hapus',

                                            'data' => [
                                                'confirm' => 'Yakin ingin menghapus berita ini?',
                                                'method' => 'post',
                                            ],
                                        ]
                                    );
                                },
                            ],
                        ],
                    ],
                ]); ?>

            </div>

        </div>

    </div>

</div>