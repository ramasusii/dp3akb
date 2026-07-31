<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KategoriBeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Berita';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kategori-berita-index">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Kelola kategori yang digunakan pada modul berita.
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
        ['success', 'error', 'warning', 'info']
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
                    Yii::$app->session->getFlash($flashType)
                ) ?>

            </div>

        <?php endif; ?>

    <?php endforeach; ?>

    <div class="panel panel-default">

        <div class="panel-heading">
            <strong>Daftar Kategori Berita</strong>
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

                    'emptyText' => 'Belum ada kategori berita.',

                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'No.',
                            'contentOptions' => [
                                'style' => '
                                    width: 55px;
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
                                );
                            },
                        ],

                        [
                            'attribute' => 'slug',

                            'value' => function ($model) {
                                return !empty($model->slug)
                                    ? $model->slug
                                    : '-';
                            },
                        ],

                        [
                            'label' => 'Jumlah Berita',

                            'format' => 'raw',

                            'value' => function ($model) {
                                $jumlah = $model->getJumlahBerita();

                                return Html::tag(
                                    'span',
                                    $jumlah . ' Berita',
                                    [
                                        'class' => $jumlah > 0
                                            ? 'label label-info'
                                            : 'label label-default',
                                    ]
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
                                if ((int) $model->status === 1) {
                                    return Html::tag(
                                        'span',
                                        'Aktif',
                                        [
                                            'class' => 'label label-success',
                                        ]
                                    );
                                }

                                return Html::tag(
                                    'span',
                                    'Tidak Aktif',
                                    [
                                        'class' => 'label label-default',
                                    ]
                                );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 120px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'created_at',

                            'format' => [
                                'datetime',
                                'php:d-m-Y H:i',
                            ],

                            'filter' => false,

                            'contentOptions' => [
                                'style' => 'width: 150px;',
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
                                    /*
                                     * Tombol tetap muncul, tetapi controller
                                     * akan menolak jika kategori masih dipakai.
                                     */
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
                                                'confirm' => 'Yakin ingin menghapus kategori ini?',
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