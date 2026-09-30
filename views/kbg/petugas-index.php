<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\KbgAssessment;
use app\models\KbgPetugas;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $stats */
/** @var array $filters */

$this->title = 'Beranda Petugas KBG';

echo $this->render('_styles');

$models = $dataProvider->getModels();

$identity = Yii::$app->user->identity;
$petugas = KbgPetugas::current();
$displayName = $petugas !== null
    ? $petugas->getDisplayName()
    : (string) $identity->username;

$statusLabels = [
    KbgAssessment::STATUS_DRAFT => 'Draft',
    KbgAssessment::STATUS_REVISION => 'Perlu Revisi',
    KbgAssessment::STATUS_SUBMITTED => 'Menunggu Verifikasi',
    KbgAssessment::STATUS_VERIFIED => 'Terverifikasi',
];

$statusIcons = [
    KbgAssessment::STATUS_DRAFT => 'fa-pencil',
    KbgAssessment::STATUS_REVISION => 'fa-refresh',
    KbgAssessment::STATUS_SUBMITTED => 'fa-paper-plane',
    KbgAssessment::STATUS_VERIFIED => 'fa-check-circle',
];
?>

<div class="kbg-petugas-home">

    <section class="petugas-welcome">

        <div class="petugas-welcome-copy">
            <span class="petugas-kicker">
                <i class="fa fa-map-marker"></i>
                Pendataan Lapangan
            </span>

            <h1>
                Halo,
                <?= Html::encode($displayName) ?>
            </h1>

            <p>
                Catat kondisi pos pengungsian dan risiko KBG
                secara bertahap. Data draft dapat dilanjutkan
                kembali sebelum dikirim untuk verifikasi.
            </p>
        </div>

        <a
            href="<?= Url::to(['create']) ?>"
            class="petugas-primary-action"
        >
            <span class="petugas-action-icon">
                <i class="fa fa-plus"></i>
            </span>

            <span>
                <strong>Assessment Baru</strong>
                <small>Mulai pendataan lapangan</small>
            </span>

            <i class="fa fa-chevron-right"></i>
        </a>

    </section>


    <?php if (($stats['revision'] ?? 0) > 0): ?>
        <a
            href="<?= Url::to([
                'index',
                'status' => KbgAssessment::STATUS_REVISION,
            ]) ?>"
            class="petugas-revision-alert"
        >
            <span class="revision-alert-icon">
                <i class="fa fa-exclamation-circle"></i>
            </span>

            <span class="revision-alert-copy">
                <strong>
                    Ada <?= (int) $stats['revision'] ?>
                    assessment perlu diperbaiki
                </strong>

                <small>
                    Buka kembali assessment dan periksa catatan
                    verifikasi dari admin.
                </small>
            </span>

            <i class="fa fa-chevron-right"></i>
        </a>
    <?php endif; ?>


    <section class="petugas-status-grid">

        <a
            href="<?= Url::to([
                'index',
                'status' => KbgAssessment::STATUS_DRAFT,
            ]) ?>"
            class="petugas-status-card"
        >
            <span class="status-card-icon draft">
                <i class="fa fa-pencil"></i>
            </span>

            <strong><?= number_format($stats['draft']) ?></strong>
            <span>Draft</span>
        </a>

        <a
            href="<?= Url::to([
                'index',
                'status' => KbgAssessment::STATUS_REVISION,
            ]) ?>"
            class="petugas-status-card"
        >
            <span class="status-card-icon revision">
                <i class="fa fa-refresh"></i>
            </span>

            <strong><?= number_format($stats['revision'] ?? 0) ?></strong>
            <span>Revisi</span>
        </a>

        <a
            href="<?= Url::to([
                'index',
                'status' => KbgAssessment::STATUS_SUBMITTED,
            ]) ?>"
            class="petugas-status-card"
        >
            <span class="status-card-icon sent">
                <i class="fa fa-paper-plane"></i>
            </span>

            <strong><?= number_format($stats['submitted']) ?></strong>
            <span>Dikirim</span>
        </a>

        <a
            href="<?= Url::to([
                'index',
                'status' => KbgAssessment::STATUS_VERIFIED,
            ]) ?>"
            class="petugas-status-card"
        >
            <span class="status-card-icon verified">
                <i class="fa fa-check"></i>
            </span>

            <strong><?= number_format($stats['verified']) ?></strong>
            <span>Selesai</span>
        </a>

    </section>


    <section class="petugas-list-section" id="riwayat">

        <div class="petugas-section-head">

            <div>
                <span>Assessment Saya</span>

                <h2>
                    <?= $filters['status'] !== ''
                        ? Html::encode(
                            isset($statusLabels[$filters['status']])
                                ? $statusLabels[$filters['status']]
                                : 'Riwayat'
                        )
                        : 'Riwayat Terbaru'
                    ?>
                </h2>
            </div>

            <?php if ($filters['status'] !== '' || $filters['q'] !== ''): ?>
                <a href="<?= Url::to(['index']) ?>">
                    Reset
                </a>
            <?php endif; ?>

        </div>


        <?= Html::beginForm(['index'], 'get', [
            'class' => 'petugas-search',
        ]) ?>

            <i class="fa fa-search"></i>

            <input
                type="search"
                name="q"
                value="<?= Html::encode($filters['q']) ?>"
                placeholder="Cari nama pos, desa, kecamatan..."
                autocomplete="off"
            >

            <?php if ($filters['status'] !== ''): ?>
                <?= Html::hiddenInput(
                    'status',
                    $filters['status']
                ) ?>
            <?php endif; ?>

            <button type="submit">
                Cari
            </button>

        <?= Html::endForm() ?>


        <?php if (empty($models)): ?>

            <div class="petugas-empty">
                <span>
                    <i class="fa fa-clipboard"></i>
                </span>

                <h3>Belum ada assessment</h3>

                <p>
                    Mulai pendataan pertama dengan menekan
                    tombol Assessment Baru.
                </p>

                <a href="<?= Url::to(['create']) ?>">
                    <i class="fa fa-plus"></i>
                    Buat Assessment
                </a>
            </div>

        <?php else: ?>

            <div class="petugas-assessment-list">

                <?php foreach ($models as $model): ?>

                    <?php
                    $status = $model->status;
                    $canEdit = $model->canEdit();
                    $siteName = trim((string) $model->site_name) !== ''
                        ? $model->site_name
                        : 'Pos pengungsian belum diisi';

                    $locationParts = array_filter([
                        $model->village,
                        $model->district,
                        $model->regency,
                    ]);

                    $location = !empty($locationParts)
                        ? implode(', ', $locationParts)
                        : 'Lokasi belum dilengkapi';

                    $updatedAt = $model->updated_at
                        ? Yii::$app->formatter->asDatetime(
                            $model->updated_at,
                            'php:d M Y, H:i'
                        )
                        : '-';
                    ?>

                    <article class="petugas-assessment-card">

                        <div class="assessment-card-head">

                            <div class="assessment-card-title">
                                <span class="assessment-code">
                                    <?= Html::encode($model->kode) ?>
                                </span>

                                <h3>
                                    <?= Html::encode($siteName) ?>
                                </h3>
                            </div>

                            <span
                                class="petugas-status-pill status-<?= Html::encode($status) ?>"
                            >
                                <i class="fa <?= Html::encode(
                                    isset($statusIcons[$status])
                                        ? $statusIcons[$status]
                                        : 'fa-circle'
                                ) ?>"></i>

                                <?= Html::encode(
                                    isset($statusLabels[$status])
                                        ? $statusLabels[$status]
                                        : $model->getStatusLabel()
                                ) ?>
                            </span>

                        </div>


                        <div class="assessment-location">
                            <i class="fa fa-map-marker"></i>

                            <span>
                                <?= Html::encode($location) ?>
                            </span>
                        </div>


                        <div class="assessment-progress-row">

                            <div class="assessment-progress-copy">
                                <span>Progress pengisian</span>

                                <strong>
                                    <?= (int) $model->progress_percent ?>%
                                </strong>
                            </div>

                            <div class="assessment-progress">
                                <span
                                    style="width:<?= max(
                                        0,
                                        min(
                                            100,
                                            (int) $model->progress_percent
                                        )
                                    ) ?>%;"
                                ></span>
                            </div>

                        </div>


                        <div class="assessment-card-footer">

                            <span class="assessment-updated">
                                <i class="fa fa-clock-o"></i>
                                <?= Html::encode($updatedAt) ?>
                            </span>

                            <?php if ($canEdit): ?>

                                <a
                                    href="<?= Url::to([
                                        'form',
                                        'id' => $model->id,
                                        'step' => max(
                                            1,
                                            (int) $model->current_step
                                        ),
                                    ]) ?>"
                                    class="assessment-open primary"
                                >
                                    <?= $status === KbgAssessment::STATUS_REVISION
                                        ? 'Perbaiki'
                                        : 'Lanjutkan'
                                    ?>

                                    <i class="fa fa-arrow-right"></i>
                                </a>

                            <?php else: ?>

                                <a
                                    href="<?= Url::to([
                                        'view',
                                        'id' => $model->id,
                                    ]) ?>"
                                    class="assessment-open"
                                >
                                    Lihat

                                    <i class="fa fa-chevron-right"></i>
                                </a>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


            <div class="petugas-pagination">
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'maxButtonCount' => 5,
                ]) ?>
            </div>

        <?php endif; ?>

    </section>

</div>


<style>
.kbg-petugas-home {
    width: 100%;
}

.petugas-welcome {
    position: relative;
    margin-bottom: 14px;
    padding: 24px 22px;
    overflow: hidden;
    color: #fff;
    background:
        radial-gradient(
            circle at 95% 4%,
            rgba(255,255,255,.13),
            transparent 27%
        ),
        linear-gradient(
            135deg,
            #071f61,
            #0d4ba8
        );
    border-radius: 22px;
    box-shadow:
        0 15px 35px rgba(7,31,97,.15);
}

.petugas-welcome::after {
    position: absolute;
    right: -60px;
    bottom: -90px;
    width: 210px;
    height: 210px;
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 50%;
    content: "";
}

.petugas-welcome-copy {
    position: relative;
    z-index: 2;
}

.petugas-kicker {
    display: inline-flex;
    margin-bottom: 8px;
    align-items: center;
    gap: 6px;
    color: #f1c96d;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .8px;
    text-transform: uppercase;
}

.petugas-welcome h1 {
    margin: 0 0 7px;
    color: #fff;
    font-size: 25px;
    font-weight: 820;
    line-height: 1.25;
}

.petugas-welcome p {
    max-width: 630px;
    margin: 0;
    color: rgba(255,255,255,.7);
    font-size: 11.5px;
    line-height: 1.7;
}

.petugas-primary-action {
    position: relative;
    z-index: 2;
    display: flex;
    margin-top: 20px;
    padding: 12px 13px;
    align-items: center;
    gap: 11px;
    color: #21314a !important;
    background: rgba(255,255,255,.96);
    border-radius: 14px;
    box-shadow: 0 9px 22px rgba(0,0,0,.12);
    text-decoration: none !important;
}

.petugas-action-icon {
    display: flex;
    width: 40px;
    height: 40px;
    flex: 0 0 40px;
    align-items: center;
    justify-content: center;
    color: #fff;
    background:
        linear-gradient(
            135deg,
            #0d4ba8,
            #1768d2
        );
    border-radius: 12px;
    font-size: 14px;
}

.petugas-primary-action > span:nth-child(2) {
    min-width: 0;
    flex: 1;
}

.petugas-primary-action strong,
.petugas-primary-action small {
    display: block;
}

.petugas-primary-action strong {
    font-size: 11.5px;
    font-weight: 800;
}

.petugas-primary-action small {
    margin-top: 2px;
    color: #7c899b;
    font-size: 9px;
}

.petugas-primary-action > i {
    color: #8592a4;
    font-size: 10px;
}

.petugas-revision-alert {
    display: flex;
    margin-bottom: 14px;
    padding: 13px;
    align-items: center;
    gap: 11px;
    color: #5e3c16 !important;
    background: #fff7e7;
    border: 1px solid #f0d8a7;
    border-radius: 14px;
    text-decoration: none !important;
}

.revision-alert-icon {
    display: flex;
    width: 39px;
    height: 39px;
    flex: 0 0 39px;
    align-items: center;
    justify-content: center;
    color: #a76c18;
    background: #fff;
    border-radius: 11px;
    font-size: 16px;
}

.revision-alert-copy {
    min-width: 0;
    flex: 1;
}

.revision-alert-copy strong,
.revision-alert-copy small {
    display: block;
}

.revision-alert-copy strong {
    font-size: 10.5px;
    font-weight: 800;
}

.revision-alert-copy small {
    margin-top: 2px;
    color: #88704f;
    font-size: 8.8px;
    line-height: 1.45;
}

.petugas-revision-alert > i {
    color: #aa7b34;
}

.petugas-status-grid {
    display: grid;
    margin-bottom: 22px;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 10px;
}

.petugas-status-card {
    display: flex;
    min-height: 112px;
    padding: 13px 9px;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: #314056 !important;
    background: #fff;
    border: 1px solid #e3e9f0;
    border-radius: 16px;
    box-shadow:
        0 7px 19px rgba(34,52,79,.045);
    text-decoration: none !important;
}

.status-card-icon {
    display: flex;
    width: 34px;
    height: 34px;
    margin-bottom: 8px;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    font-size: 12px;
}

.status-card-icon.draft {
    color: #526b8e;
    background: #eef2f7;
}

.status-card-icon.revision {
    color: #a66b16;
    background: #fff3dc;
}

.status-card-icon.sent {
    color: #0d4ba8;
    background: #eaf2ff;
}

.status-card-icon.verified {
    color: #207749;
    background: #e9f7ef;
}

.petugas-status-card strong {
    display: block;
    color: #26364e;
    font-size: 20px;
    font-weight: 850;
    line-height: 1;
}

.petugas-status-card > span:last-child {
    display: block;
    margin-top: 5px;
    color: #7e8a9c;
    font-size: 8.5px;
    font-weight: 750;
}

.petugas-list-section {
    margin-top: 4px;
}

.petugas-section-head {
    display: flex;
    margin-bottom: 11px;
    align-items: flex-end;
    justify-content: space-between;
    gap: 10px;
}

.petugas-section-head > div > span {
    display: block;
    margin-bottom: 2px;
    color: #8a95a6;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: .9px;
    text-transform: uppercase;
}

.petugas-section-head h2 {
    margin: 0;
    color: #26364e;
    font-size: 18px;
    font-weight: 820;
}

.petugas-section-head > a {
    color: #0d4ba8 !important;
    font-size: 9.5px;
    font-weight: 800;
    text-decoration: none !important;
}

.petugas-search {
    position: relative;
    display: flex;
    margin-bottom: 12px;
    padding: 5px;
    align-items: center;
    background: #fff;
    border: 1px solid #e0e7ef;
    border-radius: 13px;
    box-shadow:
        0 6px 18px rgba(36,54,81,.04);
}

.petugas-search > i {
    margin-left: 9px;
    color: #8591a3;
    font-size: 11px;
}

.petugas-search input {
    min-width: 0;
    height: 37px;
    padding: 0 9px;
    flex: 1;
    color: #324158;
    background: transparent;
    border: 0;
    outline: 0;
    font-size: 10.5px;
}

.petugas-search button {
    min-width: 58px;
    height: 34px;
    padding: 0 10px;
    color: #fff;
    background: #0d4ba8;
    border: 0;
    border-radius: 9px;
    font-size: 9px;
    font-weight: 800;
}

.petugas-assessment-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 11px;
}

.petugas-assessment-card {
    padding: 15px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 17px;
    box-shadow:
        0 8px 21px rgba(31,49,78,.045);
}

.assessment-card-head {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
}

.assessment-card-title {
    min-width: 0;
    flex: 1;
}

.assessment-code {
    display: block;
    margin-bottom: 3px;
    color: #8793a5;
    font-size: 7.8px;
    font-weight: 800;
    letter-spacing: .45px;
}

.assessment-card-title h3 {
    margin: 0;
    overflow: hidden;
    color: #293950;
    font-size: 12px;
    font-weight: 800;
    line-height: 1.35;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.petugas-status-pill {
    display: inline-flex;
    padding: 5px 7px;
    flex: 0 0 auto;
    align-items: center;
    gap: 4px;
    border-radius: 999px;
    font-size: 7.7px;
    font-weight: 800;
    white-space: nowrap;
}

.status-draft {
    color: #607087;
    background: #eef2f6;
}

.status-revision {
    color: #9b6418;
    background: #fff1d8;
}

.status-submitted {
    color: #0d4ba8;
    background: #eaf2ff;
}

.status-verified {
    color: #23754b;
    background: #e8f6ee;
}

.assessment-location {
    display: flex;
    margin-top: 10px;
    align-items: flex-start;
    gap: 6px;
    color: #788598;
    font-size: 9px;
    line-height: 1.45;
}

.assessment-location i {
    margin-top: 2px;
    color: #0d4ba8;
}

.assessment-progress-row {
    margin-top: 13px;
    padding-top: 11px;
    border-top: 1px solid #eef1f5;
}

.assessment-progress-copy {
    display: flex;
    margin-bottom: 6px;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    color: #7c899a;
    font-size: 8.5px;
}

.assessment-progress-copy strong {
    color: #35465e;
    font-size: 9px;
}

.assessment-progress {
    height: 6px;
    overflow: hidden;
    background: #edf1f6;
    border-radius: 999px;
}

.assessment-progress span {
    display: block;
    height: 100%;
    background:
        linear-gradient(
            90deg,
            #0d4ba8,
            #2c78dc
        );
    border-radius: inherit;
}

.assessment-card-footer {
    display: flex;
    margin-top: 13px;
    align-items: center;
    justify-content: space-between;
    gap: 9px;
}

.assessment-updated {
    color: #8b96a6;
    font-size: 8.2px;
}

.assessment-updated i {
    margin-right: 3px;
}

.assessment-open {
    display: inline-flex;
    min-height: 32px;
    padding: 7px 9px;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #0d4ba8 !important;
    background: #edf4ff;
    border-radius: 9px;
    font-size: 8.7px;
    font-weight: 800;
    text-decoration: none !important;
}

.assessment-open.primary {
    color: #fff !important;
    background:
        linear-gradient(
            135deg,
            #071f61,
            #1768d2
        );
}

.petugas-empty {
    padding: 36px 20px;
    text-align: center;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 17px;
}

.petugas-empty > span {
    display: flex;
    width: 55px;
    height: 55px;
    margin: 0 auto 12px;
    align-items: center;
    justify-content: center;
    color: #0d4ba8;
    background: #edf4ff;
    border-radius: 17px;
    font-size: 19px;
}

.petugas-empty h3 {
    margin: 0 0 5px;
    color: #2c3b51;
    font-size: 14px;
    font-weight: 800;
}

.petugas-empty p {
    max-width: 320px;
    margin: 0 auto 14px;
    color: #7d899a;
    font-size: 10px;
    line-height: 1.55;
}

.petugas-empty a {
    display: inline-flex;
    padding: 9px 12px;
    align-items: center;
    gap: 6px;
    color: #fff !important;
    background: #0d4ba8;
    border-radius: 10px;
    font-size: 9px;
    font-weight: 800;
    text-decoration: none !important;
}

.petugas-pagination {
    text-align: center;
}

.petugas-pagination .pagination {
    margin: 18px 0 0;
}

@media (max-width: 767px) {
    .petugas-welcome {
        padding: 21px 17px;
        border-radius: 18px;
    }

    .petugas-welcome h1 {
        font-size: 21px;
    }

    .petugas-status-grid {
        gap: 7px;
    }

    .petugas-status-card {
        min-height: 96px;
        padding: 11px 5px;
        border-radius: 14px;
    }

    .status-card-icon {
        width: 31px;
        height: 31px;
        margin-bottom: 7px;
    }

    .petugas-status-card strong {
        font-size: 18px;
    }

    .petugas-assessment-list {
        grid-template-columns: 1fr;
        gap: 9px;
    }
}

@media (max-width: 390px) {
    .petugas-status-card > span:last-child {
        font-size: 8px;
    }

    .assessment-card-head {
        flex-direction: column;
    }

    .petugas-status-pill {
        align-self: flex-start;
    }
}
</style>
