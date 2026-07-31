<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Pegawai';
$this->params['breadcrumbs'][] = $this->title;

$unitKerjaFilter = [
    'Kepala Dinas' => 'Kepala Dinas',
    'Sekretariat' => 'Sekretariat',

    'Bidang Pengarusutamaan Gender dan Pemberdayaan Perempuan'
        => 'Bidang Pengarusutamaan Gender dan Pemberdayaan Perempuan',

    'Bidang Pemenuhan Hak Anak dan Kualitas Keluarga'
        => 'Bidang Pemenuhan Hak Anak dan Kualitas Keluarga',

    'Bidang Perlindungan Perempuan dan Perlindungan Khusus Anak'
        => 'Bidang Perlindungan Perempuan dan Perlindungan Khusus Anak',

    'Bidang Pengendalian Penduduk'
        => 'Bidang Pengendalian Penduduk',

    'Bidang Keluarga Berencana, Ketahanan dan Kesejahteraan Keluarga'
        => 'Bidang Keluarga Berencana, Ketahanan dan Kesejahteraan Keluarga',

    'UPTD Perlindungan Perempuan dan Anak'
        => 'UPTD Perlindungan Perempuan dan Anak',
];
?>

<div class="pegawai-index">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Kelola data, jabatan, unit kerja, dan foto pegawai.
            </p>

        </div>

        <div class="col-md-4 text-right">

            <?= Html::a(
                'Tambah Pegawai',
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
            <strong>Daftar Pegawai</strong>
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
                        . 'dari <strong>{totalCount}</strong> pegawai'
                        . '</div>',

                    'emptyText' => 'Belum ada data pegawai.',

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
                            'attribute' => 'foto',
                            'format' => 'raw',
                            'filter' => false,

                            'value' => function ($model) {
                                return Html::img(
                                    $model->getFotoUrl(),
                                    [
                                        'alt' => $model->nama,
                                        'style' => [
                                            'width' => '70px',
                                            'height' => '70px',
                                            'object-fit' => 'cover',
                                            'border-radius' => '6px',
                                            'border' => '1px solid #ddd',
                                        ],
                                    ]
                                );
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 75px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'nama',
                            'format' => 'raw',

                            'value' => function ($model) {
                                $nip = !empty($model->nip)
                                    ? 'NIP: ' . Html::encode($model->nip)
                                    : 'NIP: -';

                                return Html::tag(
                                    'strong',
                                    Html::encode($model->nama)
                                )
                                . '<br>'
                                . Html::tag(
                                    'small',
                                    $nip,
                                    [
                                        'class' => 'text-muted',
                                    ]
                                );
                            },
                        ],

                        [
                            'attribute' => 'jenis_pegawai',
                            'filter' => [
                                'ASN' => 'ASN',
                                'PPPK' => 'PPPK',
                                'NON-ASN' => 'Non-ASN',
                            ],

                            'contentOptions' => [
                                'style' => '
                                    width: 100px;
                                    text-align: center;
                                ',
                            ],
                        ],

                        [
                            'attribute' => 'jabatan',

                            'value' => function ($model) {
                                return !empty($model->jabatan)
                                    ? $model->jabatan
                                    : '-';
                            },
                        ],

                        [
                            'attribute' => 'unit_kerja',
                            'filter' => $unitKerjaFilter,

                            'value' => function ($model) {
                                return !empty($model->unit_kerja)
                                    ? $model->unit_kerja
                                    : '-';
                            },
                        ],

                        [
                            'attribute' => 'pangkat_golongan',

                            'value' => function ($model) {
                                return !empty($model->pangkat_golongan)
                                    ? $model->pangkat_golongan
                                    : '-';
                            },

                            'contentOptions' => [
                                'style' => '
                                    width: 100px;
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
                                            'class' => 'label label-success',
                                        ]
                                    )
                                    : Html::tag(
                                        'span',
                                        'Tidak Aktif',
                                        [
                                            'class' => 'label label-default',
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
                            'template' => '{view} {update} {delete}',

                            'contentOptions' => [
                                'style' => '
                                    width: 130px;
                                    text-align: center;
                                    white-space: nowrap;
                                ',
                            ],

                            'buttons' => [
                                'view' => function ($url, $model) {
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

                                'update' => function ($url, $model) {
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

                                'delete' => function ($url, $model) {
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
                                                'confirm' => 'Yakin ingin menghapus data pegawai ini?',
                                                'method' => 'post',
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