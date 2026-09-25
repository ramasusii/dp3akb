<?php

use yii\helpers\Html;

/** @var app\models\KbgAssessment $model */
/** @var array $sections */
/** @var array $answerMap */
/** @var array $attention */
/** @var bool $isManager */

$this->title = 'Detail ' . $model->kode;

echo $this->render('_styles');

$formatAnswer = function ($value) {
    if (is_array($value)) {
        return implode(', ', $value);
    }

    if ($value === null || $value === '') {
        return '-';
    }

    return (string) $value;
};
?>

<div class="kbg-page">

    <div class="kbg-topbar">

        <div class="kbg-title-block">
            <div class="eyebrow">
                <i class="fa fa-shield"></i>
                Detail Assessment
            </div>

            <h1><?= Html::encode($model->kode) ?></h1>

            <p>
                Ringkasan jawaban, indikator perhatian, status verifikasi,
                dan informasi lokasi assessment.
            </p>
        </div>


        <div class="kbg-actions">

            <?= Html::a(
                '<i class="fa fa-print"></i> Cetak',
                ['print', 'id' => $model->id],
                [
                    'class' => 'kbg-btn kbg-btn-light',
                    'target' => '_blank',
                ]
            ) ?>

            <?php if ($model->canEdit()): ?>
                <?= Html::a(
                    '<i class="fa fa-pencil"></i> Lanjutkan Isi',
                    [
                        'form',
                        'id' => $model->id,
                        'step' => max(
                            1,
                            (int) $model->current_step
                        ),
                    ],
                    ['class' => 'kbg-btn kbg-btn-primary']
                ) ?>
            <?php endif; ?>

            <?= Html::a(
                '<i class="fa fa-arrow-left"></i> Kembali',
                ['index'],
                ['class' => 'kbg-btn kbg-btn-light']
            ) ?>

        </div>

    </div>


    <div class="kbg-detail-grid">

        <div class="kbg-detail-main">

            <div class="kbg-summary-card kbg-card">

                <div class="kbg-summary-head">
                    <h3>Ringkasan Assessment</h3>

                    <div style="display:flex; gap:6px; flex-wrap:wrap;">
                        <span
                            class="kbg-badge kbg-badge-<?= Html::encode(
                                $model->getStatusClass()
                            ) ?>"
                        >
                            <?= Html::encode($model->getStatusLabel()) ?>
                        </span>

                        <span
                            class="kbg-badge kbg-badge-<?= Html::encode(
                                $model->getRiskClass()
                            ) ?>"
                        >
                            <?= Html::encode($model->risk_level) ?>
                        </span>
                    </div>
                </div>


                <div class="kbg-meta-grid">

                    <div class="kbg-meta-item">
                        <span>Nama Pos</span>
                        <strong>
                            <?= Html::encode(
                                $model->site_name ?: '-'
                            ) ?>
                        </strong>
                    </div>

                    <div class="kbg-meta-item">
                        <span>Kabupaten</span>
                        <strong>
                            <?= Html::encode(
                                $model->regency ?: '-'
                            ) ?>
                        </strong>
                    </div>

                    <div class="kbg-meta-item">
                        <span>Provinsi</span>
                        <strong>
                            <?= Html::encode(
                                $model->province ?: '-'
                            ) ?>
                        </strong>
                    </div>

                    <div class="kbg-meta-item">
                        <span>Petugas</span>
                        <strong>
                            <?= Html::encode(
                                $model->enumerator_name ?: '-'
                            ) ?>
                        </strong>
                    </div>

                    <div class="kbg-meta-item">
                        <span>Waktu Pendataan</span>
                        <strong>
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
                        </strong>
                    </div>

                    <div class="kbg-meta-item">
                        <span>Progress</span>
                        <strong>
                            <?= (int) $model->progress_percent ?>%
                        </strong>
                    </div>

                </div>


                <div style="margin-top:14px;">
                    <div class="kbg-progress-track">
                        <div
                            class="kbg-progress-fill"
                            style="width: <?= (int) $model->progress_percent ?>%;"
                        ></div>
                    </div>
                </div>

            </div>


            <?php foreach ($sections as $section): ?>

                <?php
                $hasAnswer = false;

                foreach ($section['questions'] as $question) {
                    $key = $question['key'];

                    if (array_key_exists($key, $answerMap)
                        && app\models\KbgQuestionnaire::isAnswered(
                            $answerMap[$key]
                        )) {
                        $hasAnswer = true;
                        break;
                    }
                }

                if (!$hasAnswer) {
                    continue;
                }
                ?>

                <div class="kbg-answer-section kbg-card">

                    <div class="kbg-answer-section-head">
                        <i
                            class="fa <?= Html::encode(
                                $section['icon']
                            ) ?>"
                        ></i>

                        <h4>
                            Tahap <?= (int) $section['step'] ?> —
                            <?= Html::encode($section['title']) ?>
                        </h4>
                    </div>


                    <div class="kbg-answer-list">

                        <?php foreach ($section['questions'] as $question): ?>

                            <?php
                            $key = $question['key'];

                            if (!array_key_exists(
                                $key,
                                $answerMap
                            )) {
                                continue;
                            }

                            $value = $answerMap[$key];

                            if (!app\models\KbgQuestionnaire::isAnswered(
                                $value
                            )) {
                                continue;
                            }
                            ?>

                            <div class="kbg-answer-row">

                                <div class="kbg-answer-question">
                                    <b>
                                        <?= Html::encode(
                                            $question['code']
                                        ) ?>
                                    </b>
                                    &nbsp;
                                    <?= Html::encode(
                                        $question['label']
                                    ) ?>
                                </div>

                                <div class="kbg-answer-value">
                                    <?= nl2br(Html::encode(
                                        $formatAnswer($value)
                                    )) ?>

                                    <?php if (!empty(
                                        $question['suffix']
                                    )): ?>
                                        <?= ' ' . Html::encode(
                                            $question['suffix']
                                        ) ?>
                                    <?php endif; ?>
                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>


        <aside class="kbg-detail-side">

            <div class="kbg-side-card kbg-card">

                <h4>
                    <i
                        class="fa fa-exclamation-triangle"
                        style="color:#d99321;margin-right:5px;"
                    ></i>
                    Indikator Sistem
                </h4>

                <div
                    style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:12px;"
                >
                    <div
                        style="padding:10px;text-align:center;background:#fff1f3;border-radius:10px;"
                    >
                        <strong
                            style="display:block;color:#a53645;font-size:20px;"
                        >
                            <?= (int) $attention['critical'] ?>
                        </strong>

                        <span
                            style="font-size:8px;color:#9b5c65;text-transform:uppercase;font-weight:800;"
                        >
                            Kritis
                        </span>
                    </div>

                    <div
                        style="padding:10px;text-align:center;background:#fff8e9;border-radius:10px;"
                    >
                        <strong
                            style="display:block;color:#94651d;font-size:20px;"
                        >
                            <?= (int) $attention['attention'] ?>
                        </strong>

                        <span
                            style="font-size:8px;color:#97743d;text-transform:uppercase;font-weight:800;"
                        >
                            Perhatian
                        </span>
                    </div>
                </div>


                <?php if (empty($attention['flags'])): ?>

                    <div class="kbg-flag">
                        <i class="fa fa-check-circle"></i>
                        Belum ada flag perhatian dari jawaban yang tersimpan.
                    </div>

                <?php else: ?>

                    <div class="kbg-flag-list">

                        <?php foreach ($attention['flags'] as $flag): ?>
                            <div
                                class="kbg-flag <?= Html::encode(
                                    $flag['level']
                                ) ?>"
                            >
                                <i
                                    class="fa <?= $flag['level'] === 'critical'
                                        ? 'fa-exclamation-circle'
                                        : 'fa-info-circle' ?>"
                                ></i>

                                <span>
                                    <?= Html::encode(
                                        $flag['label']
                                    ) ?>
                                </span>
                            </div>
                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>


                <div class="kbg-disclaimer">
                    Flag merupakan alat bantu peninjauan data berdasarkan
                    jawaban instrumen. Bukan penetapan kasus atau pengganti
                    verifikasi petugas yang berwenang.
                </div>

            </div>


            <div class="kbg-side-card kbg-card">

                <h4>
                    <i
                        class="fa fa-map-marker"
                        style="color:#0d4ba8;margin-right:5px;"
                    ></i>
                    Lokasi
                </h4>

                <div class="kbg-meta-item" style="margin-bottom:8px;">
                    <span>Desa / Kelurahan</span>
                    <strong>
                        <?= Html::encode($model->village ?: '-') ?>
                    </strong>
                </div>

                <div class="kbg-meta-item" style="margin-bottom:8px;">
                    <span>Kecamatan</span>
                    <strong>
                        <?= Html::encode($model->district ?: '-') ?>
                    </strong>
                </div>

                <div class="kbg-meta-item" style="margin-bottom:8px;">
                    <span>Koordinat</span>
                    <strong>
                        <?php if (
                            $model->latitude !== null
                            && $model->longitude !== null
                        ): ?>
                            <?= Html::encode(
                                $model->latitude
                                . ', '
                                . $model->longitude
                            ) ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </strong>
                </div>

                <?php if (
                    $model->latitude !== null
                    && $model->longitude !== null
                ): ?>

                    <?= Html::a(
                        '<i class="fa fa-map"></i> Lihat di Peta Assessment',
                        ['map'],
                        [
                            'class' => 'kbg-btn kbg-btn-light',
                            'style' => 'width:100%;',
                        ]
                    ) ?>

                <?php endif; ?>

            </div>


            <?php if ($model->canEdit()): ?>

                <div class="kbg-side-card kbg-card">
                    <h4>
                        <i
                            class="fa fa-paper-plane"
                            style="color:#0d4ba8;margin-right:5px;"
                        ></i>
                        Kirim Assessment
                    </h4>

                    <p
                        style="color:#778395;font-size:10px;line-height:1.6;margin-bottom:12px;"
                    >
                        Pastikan data wajib sudah lengkap sebelum
                        dikirim untuk verifikasi.
                    </p>

                    <?= Html::beginForm(
                        ['submit', 'id' => $model->id],
                        'post'
                    ) ?>

                    <button
                        type="submit"
                        class="kbg-btn kbg-btn-primary"
                        style="width:100%;"
                        data-confirm="Kirim assessment ini untuk verifikasi?"
                    >
                        <i class="fa fa-paper-plane"></i>
                        Kirim untuk Verifikasi
                    </button>

                    <?= Html::endForm() ?>
                </div>

            <?php endif; ?>


            <?php if (
                $isManager
                && in_array(
                    $model->status,
                    [
                        app\models\KbgAssessment::STATUS_SUBMITTED,
                        app\models\KbgAssessment::STATUS_VERIFIED,
                    ],
                    true
                )
            ): ?>

                <div class="kbg-side-card kbg-card">
                    <h4>
                        <i
                            class="fa fa-check-square-o"
                            style="color:#24936e;margin-right:5px;"
                        ></i>
                        Verifikasi Admin
                    </h4>

                    <?= Html::beginForm(
                        ['verify', 'id' => $model->id],
                        'post'
                    ) ?>

                    <div class="kbg-manager-note">
                        <textarea
                            name="verification_note"
                            placeholder="Catatan verifikasi / revisi..."
                        ><?= Html::encode(
                            $model->verification_note
                        ) ?></textarea>
                    </div>

                    <div
                        style="display:grid;grid-template-columns:1fr 1fr;gap:7px;margin-top:9px;"
                    >
                        <button
                            type="submit"
                            name="decision"
                            value="revision"
                            class="kbg-btn kbg-btn-light"
                            data-confirm="Kembalikan assessment untuk revisi?"
                        >
                            <i class="fa fa-undo"></i>
                            Revisi
                        </button>

                        <button
                            type="submit"
                            name="decision"
                            value="approve"
                            class="kbg-btn kbg-btn-primary"
                            data-confirm="Setujui dan verifikasi assessment ini?"
                        >
                            <i class="fa fa-check"></i>
                            Verifikasi
                        </button>
                    </div>

                    <?= Html::endForm() ?>
                </div>

            <?php endif; ?>


            <?php if (
                $model->verification_note
                && !$isManager
            ): ?>

                <div class="kbg-side-card kbg-card">
                    <h4>
                        Catatan Verifikator
                    </h4>

                    <p
                        style="margin:0;color:#69778b;font-size:10.5px;line-height:1.6;"
                    >
                        <?= nl2br(Html::encode(
                            $model->verification_note
                        )) ?>
                    </p>
                </div>

            <?php endif; ?>


            <?php if (
                $isManager
                || (
                    $model->status
                    === app\models\KbgAssessment::STATUS_DRAFT
                    && (int) $model->enumerator_id
                        === (int) Yii::$app->user->id
                )
            ): ?>

                <div class="kbg-side-card kbg-card">
                    <?= Html::a(
                        '<i class="fa fa-trash"></i> Hapus Assessment',
                        ['delete', 'id' => $model->id],
                        [
                            'class' => 'kbg-btn kbg-btn-danger',
                            'style' => 'width:100%;',
                            'data' => [
                                'method' => 'post',
                                'confirm'
                                    => 'Yakin ingin menghapus assessment ini? Data jawaban juga akan dihapus.',
                            ],
                        ]
                    ) ?>
                </div>

            <?php endif; ?>

        </aside>

    </div>

</div>
