<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $stats */
/** @var bool $isManager */
/** @var array $regencies */
/** @var array $filters */

$this->title = 'Kaji Cepat KBG & Audit Keselamatan';

echo $this->render('_styles');

$models = $dataProvider->getModels();
?>

<div class="kbg-page">

    <div class="kbg-topbar">

        <div class="kbg-title-block">
            <div class="eyebrow">
                <i class="fa fa-shield"></i>
                DP3AKB Provinsi Sumatera Utara
            </div>

            <h1>
                Kaji Cepat KBG & Audit Keselamatan
            </h1>

            <p>
                Pendataan risiko kekerasan berbasis gender, kondisi
                keselamatan, fasilitas pengungsian, dan akses layanan
                dalam satu sistem terintegrasi.
            </p>
        </div>


        <div class="kbg-actions">

            <?= Html::a(
                '<i class="fa fa-map-marker"></i> Peta Assessment',
                ['map'],
                ['class' => 'kbg-btn kbg-btn-light']
            ) ?>

            <?= Html::a(
                '<i class="fa fa-download"></i> Export CSV',
                ['export-csv'],
                ['class' => 'kbg-btn kbg-btn-light']
            ) ?>

            <?= Html::a(
                '<i class="fa fa-plus"></i> Assessment Baru',
                ['create'],
                ['class' => 'kbg-btn kbg-btn-primary']
            ) ?>

        </div>

    </div>


    <div class="kbg-stat-grid">

        <div class="kbg-stat">
            <div class="kbg-stat-icon">
                <i class="fa fa-clipboard"></i>
            </div>

            <strong><?= number_format($stats['total']) ?></strong>
            <span>Total Assessment</span>
        </div>


        <div class="kbg-stat">
            <div class="kbg-stat-icon">
                <i class="fa fa-users"></i>
            </div>

            <strong><?= number_format($stats['refugees']) ?></strong>
            <span>Total Pengungsi Tercatat</span>
        </div>


        <div class="kbg-stat warning">
            <div class="kbg-stat-icon">
                <i class="fa fa-paper-plane"></i>
            </div>

            <strong><?= number_format($stats['submitted']) ?></strong>
            <span>Menunggu Verifikasi</span>
        </div>


        <div class="kbg-stat">
            <div class="kbg-stat-icon">
                <i class="fa fa-check-circle"></i>
            </div>

            <strong><?= number_format($stats['verified']) ?></strong>
            <span>Terverifikasi</span>
        </div>


        <div class="kbg-stat danger">
            <div class="kbg-stat-icon">
                <i class="fa fa-exclamation-triangle"></i>
            </div>

            <strong><?= number_format($stats['critical']) ?></strong>
            <span>Memiliki Flag Kritis</span>
        </div>

    </div>


    <div class="kbg-filter-card kbg-card">

        <?= Html::beginForm(['index'], 'get') ?>

        <div class="kbg-filter-grid">

            <div class="filter-search">
                <label class="kbg-field-label">
                    Pencarian
                </label>

                <input
                    type="search"
                    name="q"
                    class="kbg-control"
                    value="<?= Html::encode($filters['q']) ?>"
                    placeholder="Kode, nama pos, desa, kecamatan, kabupaten..."
                >
            </div>


            <div>
                <label class="kbg-field-label">
                    Status
                </label>

                <?= Html::dropDownList(
                    'status',
                    $filters['status'],
                    [
                        '' => 'Semua status',
                        'draft' => 'Draft',
                        'submitted' => 'Dikirim',
                        'revision' => 'Perlu Revisi',
                        'verified' => 'Terverifikasi',
                    ],
                    ['class' => 'kbg-control']
                ) ?>
            </div>


            <div>
                <label class="kbg-field-label">
                    Indikator Sistem
                </label>

                <?= Html::dropDownList(
                    'risk',
                    $filters['risk'],
                    [
                        '' => 'Semua indikator',
                        'Perlu Tindak Lanjut'
                            => 'Perlu Tindak Lanjut',
                        'Perlu Perhatian'
                            => 'Perlu Perhatian',
                        'Terpantau'
                            => 'Terpantau',
                        'Belum Ada Flag'
                            => 'Belum Ada Flag',
                    ],
                    ['class' => 'kbg-control']
                ) ?>
            </div>


            <div>
                <label class="kbg-field-label">
                    Kabupaten
                </label>

                <?php
                $regencyOptions = ['' => 'Semua kabupaten'];

                foreach ($regencies as $item) {
                    $regencyOptions[$item] = $item;
                }
                ?>

                <?= Html::dropDownList(
                    'regency',
                    $filters['regency'],
                    $regencyOptions,
                    ['class' => 'kbg-control']
                ) ?>
            </div>


            <div>
                <button
                    type="submit"
                    class="kbg-btn kbg-btn-primary"
                    style="width:100%;"
                >
                    <i class="fa fa-search"></i>
                    Filter
                </button>
            </div>

        </div>

        <?= Html::endForm() ?>

    </div>


    <div class="kbg-table-card kbg-card">

        <?php if (empty($models)): ?>

            <div class="kbg-empty">
                <div class="kbg-empty-icon">
                    <i class="fa fa-clipboard"></i>
                </div>

                <h3>Belum ada assessment</h3>

                <p>
                    Buat assessment baru atau ubah filter pencarian.
                </p>
            </div>

        <?php else: ?>

            <div class="table-responsive">
                <table class="table kbg-table">
                    <thead>
                    <tr>
                        <th>Kode / Pos</th>
                        <th>Wilayah</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Indikator</th>
                        <th>Petugas</th>
                        <th style="width:92px;">Aksi</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($models as $model): ?>

                        <tr>
                            <td>
                                <span class="kbg-code">
                                    <?= Html::encode($model->kode) ?>
                                </span>

                                <span class="kbg-site-name">
                                    <?= Html::encode(
                                        $model->site_name
                                        ?: 'Nama pos belum diisi'
                                    ) ?>
                                </span>

                                <span class="kbg-site-sub">
                                    <?= Html::encode(
                                        $model->assessment_datetime
                                        ? date(
                                            'd M Y H:i',
                                            strtotime(
                                                $model->assessment_datetime
                                            )
                                        )
                                        : '-'
                                    ) ?>
                                </span>
                            </td>

                            <td>
                                <span class="kbg-site-name">
                                    <?= Html::encode(
                                        $model->regency ?: '-'
                                    ) ?>
                                </span>

                                <span class="kbg-site-sub">
                                    <?= Html::encode(
                                        trim(
                                            ($model->district ?: '')
                                            . ' · '
                                            . ($model->village ?: ''),
                                            ' ·'
                                        ) ?: '-'
                                    ) ?>
                                </span>
                            </td>

                            <td>
                                <span
                                    class="kbg-badge kbg-badge-<?= Html::encode(
                                        $model->getStatusClass()
                                    ) ?>"
                                >
                                    <?= Html::encode(
                                        $model->getStatusLabel()
                                    ) ?>
                                </span>
                            </td>

                            <td style="min-width:120px;">
                                <div class="kbg-progress-track">
                                    <div
                                        class="kbg-progress-fill"
                                        style="width: <?= (int) $model->progress_percent ?>%;"
                                    ></div>
                                </div>

                                <div class="kbg-progress-text">
                                    <span>
                                        Tahap <?= (int) $model->current_step ?>/7
                                    </span>

                                    <strong>
                                        <?= (int) $model->progress_percent ?>%
                                    </strong>
                                </div>
                            </td>

                            <td>
                                <span
                                    class="kbg-badge kbg-badge-<?= Html::encode(
                                        $model->getRiskClass()
                                    ) ?>"
                                >
                                    <?= Html::encode(
                                        $model->risk_level
                                    ) ?>
                                </span>

                                <?php if ($model->critical_count > 0): ?>
                                    <span class="kbg-site-sub">
                                        <?= (int) $model->critical_count ?>
                                        flag kritis
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <span class="kbg-site-name">
                                    <?= Html::encode(
                                        $model->enumerator_name ?: '-'
                                    ) ?>
                                </span>

                                <span class="kbg-site-sub">
                                    Update
                                    <?= Html::encode(
                                        $model->updated_at
                                        ? date(
                                            'd/m/Y H:i',
                                            strtotime(
                                                $model->updated_at
                                            )
                                        )
                                        : '-'
                                    ) ?>
                                </span>
                            </td>

                            <td>
                                <div style="display:flex; gap:5px;">
                                    <?= Html::a(
                                        '<i class="fa fa-eye"></i>',
                                        ['view', 'id' => $model->id],
                                        [
                                            'class' => 'btn btn-default btn-sm',
                                            'title' => 'Lihat',
                                        ]
                                    ) ?>

                                    <?php if ($model->canEdit()): ?>
                                        <?= Html::a(
                                            '<i class="fa fa-pencil"></i>',
                                            [
                                                'form',
                                                'id' => $model->id,
                                                'step' => max(
                                                    1,
                                                    (int) $model->current_step
                                                ),
                                            ],
                                            [
                                                'class'
                                                    => 'btn btn-primary btn-sm',
                                                'title' => 'Lanjutkan',
                                            ]
                                        ) ?>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>


            <div class="kbg-mobile-list">

                <?php foreach ($models as $model): ?>

                    <div class="kbg-mobile-item">

                        <div class="kbg-mobile-head">
                            <div>
                                <span class="kbg-code">
                                    <?= Html::encode($model->kode) ?>
                                </span>

                                <strong style="display:block;margin-top:3px;">
                                    <?= Html::encode(
                                        $model->site_name
                                        ?: 'Nama pos belum diisi'
                                    ) ?>
                                </strong>
                            </div>

                            <span
                                class="kbg-badge kbg-badge-<?= Html::encode(
                                    $model->getStatusClass()
                                ) ?>"
                            >
                                <?= Html::encode(
                                    $model->getStatusLabel()
                                ) ?>
                            </span>
                        </div>

                        <div class="kbg-progress-track">
                            <div
                                class="kbg-progress-fill"
                                style="width: <?= (int) $model->progress_percent ?>%;"
                            ></div>
                        </div>

                        <div class="kbg-mobile-meta">
                            <span>
                                <i class="fa fa-map-marker"></i>
                                <?= Html::encode(
                                    $model->regency ?: '-'
                                ) ?>
                            </span>

                            <span>
                                <i class="fa fa-user"></i>
                                <?= Html::encode(
                                    $model->enumerator_name ?: '-'
                                ) ?>
                            </span>

                            <span>
                                Progress:
                                <b><?= (int) $model->progress_percent ?>%</b>
                            </span>

                            <span>
                                <?= Html::encode($model->risk_level) ?>
                            </span>
                        </div>

                        <div style="display:flex; gap:7px; margin-top:10px;">
                            <?= Html::a(
                                '<i class="fa fa-eye"></i> Lihat',
                                ['view', 'id' => $model->id],
                                [
                                    'class' => 'kbg-btn kbg-btn-light',
                                    'style' => 'flex:1;',
                                ]
                            ) ?>

                            <?php if ($model->canEdit()): ?>
                                <?= Html::a(
                                    '<i class="fa fa-pencil"></i> Lanjutkan',
                                    [
                                        'form',
                                        'id' => $model->id,
                                        'step' => max(
                                            1,
                                            (int) $model->current_step
                                        ),
                                    ],
                                    [
                                        'class'
                                            => 'kbg-btn kbg-btn-primary',
                                        'style' => 'flex:1;',
                                    ]
                                ) ?>
                            <?php endif; ?>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>


    <?php if (!empty($models)): ?>
        <div style="text-align:center;">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination pagination-sm'],
            ]) ?>
        </div>
    <?php endif; ?>


    <div
        class="kbg-card"
        style="margin-top:18px;padding:14px 16px;color:#718094;font-size:10px;line-height:1.6;"
    >
        <i
            class="fa fa-info-circle"
            style="color:#0d4ba8;margin-right:5px;"
        ></i>

        <strong style="color:#405069;">
            Catatan:
        </strong>

        “Indikator Sistem” merupakan flag bantu berdasarkan jawaban
        instrumen untuk memudahkan peninjauan data. Flag ini bukan
        penetapan kasus, diagnosis, atau pengganti verifikasi petugas
        yang berwenang.
    </div>

</div>
