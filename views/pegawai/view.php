<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = $model->nama;

$this->params['breadcrumbs'][] = [
    'label' => 'Pegawai',
    'url' => ['index'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pegawai-view">

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-8">

            <h1 style="margin-top: 0;">
                <?= Html::encode($this->title) ?>
            </h1>

            <p class="text-muted">
                Detail informasi pegawai.
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
                        'confirm' => 'Yakin ingin menghapus data pegawai ini?',
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

        <div class="col-md-4">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Foto Pegawai</strong>
                </div>

                <div class="panel-body text-center">

                    <?= Html::img(
                        $model->getFotoUrl(),
                        [
                            'alt' => $model->nama,
                            'class' => 'img-responsive',
                            'style' => [
                                'width' => '100%',
                                'max-width' => '300px',
                                'aspect-ratio' => '1 / 1',
                                'object-fit' => 'cover',
                                'margin' => 'auto',
                                'border-radius' => '8px',
                                'border' => '1px solid #ddd',
                            ],
                        ]
                    ) ?>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>Informasi Pegawai</strong>
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
                            'nama',

                            [
                                'attribute' => 'nip',
                                'value' => !empty($model->nip)
                                    ? $model->nip
                                    : '-',
                            ],

                            'jenis_pegawai',

                            [
                                'attribute' => 'jabatan',
                                'value' => !empty($model->jabatan)
                                    ? $model->jabatan
                                    : '-',
                            ],

                            [
                                'attribute' => 'pangkat_golongan',
                                'value' => !empty($model->pangkat_golongan)
                                    ? $model->pangkat_golongan
                                    : '-',
                            ],

                            [
                                'attribute' => 'unit_kerja',
                                'value' => !empty($model->unit_kerja)
                                    ? $model->unit_kerja
                                    : '-',
                            ],

                            [
                                'attribute' => 'email',
                                'format' => 'email',
                                'value' => !empty($model->email)
                                    ? $model->email
                                    : null,
                            ],

                            [
                                'attribute' => 'whatsapp',
                                'value' => !empty($model->whatsapp)
                                    ? $model->whatsapp
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