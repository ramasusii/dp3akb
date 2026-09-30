<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $stats */
/** @var array $units */
/** @var array $filters */
/** @var array $credentials */

$this->title = 'Petugas KBG';

$models = $dataProvider->getModels();
?>

<div class="kbg-staff-page">

    <section class="kbg-staff-hero">
        <div>
            <span class="kbg-staff-eyebrow">
                <i class="fa fa-users"></i>
                Manajemen Akses Lapangan
            </span>

            <h1>Petugas KBG</h1>

            <p>
                Semua pegawai aktif dapat disiapkan sebagai akun Petugas KBG.
                Aktifkan hanya petugas yang sedang ditugaskan. Login petugas
                menggunakan <strong>NIP</strong> dan password sementara.
            </p>
        </div>

        <?= Html::beginForm(['sync'], 'post', [
            'class' => 'kbg-sync-form',
        ]) ?>
            <button
                type="submit"
                class="btn-kbg-secondary"
                onclick="return confirm('Sinkronkan master pegawai menjadi calon akun Petugas KBG?')"
            >
                <i class="fa fa-refresh"></i>
                Sinkronkan Pegawai
            </button>
        <?= Html::endForm() ?>
    </section>


    <?php if (!empty($credentials)): ?>
        <section class="kbg-credentials-panel" id="kbgCredentialsPanel">
            <div class="credential-head">
                <div>
                    <span class="credential-icon">
                        <i class="fa fa-key"></i>
                    </span>
                    <div>
                        <strong>Password sementara berhasil dibuat</strong>
                        <small>
                            Salin dan berikan langsung kepada petugas. Password
                            ini hanya ditampilkan sekarang dan wajib diganti saat
                            login pertama.
                        </small>
                    </div>
                </div>

                <button
                    type="button"
                    id="copyAllCredentials"
                    class="credential-copy-all"
                >
                    <i class="fa fa-copy"></i>
                    Salin Semua
                </button>
            </div>

            <div class="credential-list" id="credentialList">
                <?php foreach ($credentials as $credential): ?>
                    <div
                        class="credential-item"
                        data-name="<?= Html::encode($credential['name']) ?>"
                        data-nip="<?= Html::encode($credential['nip']) ?>"
                        data-password="<?= Html::encode($credential['password']) ?>"
                    >
                        <div class="credential-person">
                            <strong><?= Html::encode($credential['name']) ?></strong>
                            <span>NIP <?= Html::encode($credential['nip']) ?></span>
                        </div>

                        <div class="credential-password">
                            <span>Password sementara</span>
                            <code><?= Html::encode($credential['password']) ?></code>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>


    <section class="kbg-staff-stat-grid">
        <div class="kbg-staff-stat">
            <span class="stat-icon all">
                <i class="fa fa-users"></i>
            </span>
            <div>
                <strong><?= number_format($stats['total']) ?></strong>
                <span>Total Pegawai Terdaftar</span>
            </div>
        </div>

        <div class="kbg-staff-stat">
            <span class="stat-icon active">
                <i class="fa fa-check"></i>
            </span>
            <div>
                <strong><?= number_format($stats['active']) ?></strong>
                <span>Petugas Aktif</span>
            </div>
        </div>

        <div class="kbg-staff-stat">
            <span class="stat-icon inactive">
                <i class="fa fa-pause"></i>
            </span>
            <div>
                <strong><?= number_format($stats['inactive']) ?></strong>
                <span>Belum Aktif</span>
            </div>
        </div>
    </section>


    <section class="kbg-staff-toolbar">
        <?= Html::beginForm(['index'], 'get', [
            'class' => 'kbg-staff-filter-form',
        ]) ?>
            <div class="kbg-filter-search">
                <i class="fa fa-search"></i>
                <input
                    type="search"
                    name="q"
                    value="<?= Html::encode($filters['q']) ?>"
                    placeholder="Cari nama, NIP, jabatan..."
                    autocomplete="off"
                >
            </div>

            <select name="status">
                <option value="">Semua Status</option>
                <option value="active" <?= $filters['status'] === 'active' ? 'selected' : '' ?>>Aktif</option>
                <option value="inactive" <?= $filters['status'] === 'inactive' ? 'selected' : '' ?>>Belum Aktif</option>
            </select>

            <select name="unit">
                <option value="">Semua Unit Kerja</option>
                <?php foreach ($units as $unit): ?>
                    <option
                        value="<?= Html::encode($unit) ?>"
                        <?= $filters['unit'] === $unit ? 'selected' : '' ?>
                    >
                        <?= Html::encode($unit) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn-kbg-filter">
                Filter
            </button>

            <?php if ($filters['q'] !== '' || $filters['status'] !== '' || $filters['unit'] !== ''): ?>
                <a href="<?= Url::to(['index']) ?>" class="btn-kbg-reset">
                    Reset
                </a>
            <?php endif; ?>
        <?= Html::endForm() ?>
    </section>


    <?= Html::beginForm(['activate-selected'], 'post', [
        'id' => 'bulkActivateForm',
    ]) ?>

        <section class="kbg-staff-list-card">
            <div class="staff-list-head">
                <div>
                    <h2>Daftar Pegawai</h2>
                    <p>
                        Centang beberapa pegawai lalu pilih
                        <strong>Aktifkan Terpilih</strong>. Misalnya untuk tahap
                        awal cukup pilih 5 orang.
                    </p>
                </div>

                <button
                    type="submit"
                    class="btn-kbg-primary"
                    id="activateSelectedButton"
                    disabled
                >
                    <i class="fa fa-user-plus"></i>
                    Aktifkan Terpilih
                    <span id="selectedCount">0</span>
                </button>
            </div>

            <div class="kbg-staff-table-wrap">
                <table class="kbg-staff-table">
                    <thead>
                        <tr>
                            <th class="check-col">
                                <input
                                    type="checkbox"
                                    id="selectAllInactive"
                                    aria-label="Pilih semua pegawai belum aktif"
                                >
                            </th>
                            <th>Pegawai</th>
                            <th>Jabatan / Unit</th>
                            <th>Akun Login</th>
                            <th>Status</th>
                            <th class="action-col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($models)): ?>
                            <tr>
                                <td colspan="6">
                                    <div class="kbg-empty-table">
                                        <i class="fa fa-search"></i>
                                        <strong>Data tidak ditemukan</strong>
                                        <span>Coba ubah pencarian atau filter.</span>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($models as $model): ?>
                            <?php
                            $pegawai = $model->pegawai;
                            $user = $model->user;
                            $isActive = (int) $model->is_active === 1;
                            $nip = $pegawai !== null ? trim((string) $pegawai->nip) : '';
                            ?>

                            <tr class="<?= $isActive ? 'is-active' : '' ?>">
                                <td class="check-col" data-label="Pilih">
                                    <?php if (!$isActive && $nip !== ''): ?>
                                        <input
                                            type="checkbox"
                                            name="selection[]"
                                            value="<?= (int) $model->id ?>"
                                            class="staff-selection"
                                            aria-label="Pilih <?= Html::encode($pegawai->nama) ?>"
                                        >
                                    <?php else: ?>
                                        <span class="check-placeholder">—</span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="Pegawai">
                                    <div class="staff-person">
                                        <span class="staff-avatar">
                                            <?php if ($pegawai !== null && trim((string) $pegawai->foto) !== ''): ?>
                                                <img
                                                    src="<?= Yii::$app->request->baseUrl ?>/web/uploads/pegawai/<?= Html::encode($pegawai->foto) ?>"
                                                    alt=""
                                                    onerror="this.style.display='none'; this.parentNode.classList.add('fallback');"
                                                >
                                            <?php endif; ?>
                                            <i class="fa fa-user"></i>
                                        </span>

                                        <span class="staff-person-copy">
                                            <strong>
                                                <?= Html::encode($pegawai !== null ? $pegawai->nama : 'Pegawai tidak ditemukan') ?>
                                            </strong>
                                            <small>
                                                NIP <?= Html::encode($nip !== '' ? $nip : 'belum tersedia') ?>
                                            </small>
                                        </span>
                                    </div>
                                </td>

                                <td data-label="Jabatan / Unit">
                                    <div class="staff-job">
                                        <strong><?= Html::encode($pegawai !== null && $pegawai->jabatan ? $pegawai->jabatan : '-') ?></strong>
                                        <span><?= Html::encode($pegawai !== null && $pegawai->unit_kerja ? $pegawai->unit_kerja : '-') ?></span>
                                    </div>
                                </td>

                                <td data-label="Akun Login">
                                    <div class="staff-login-info">
                                        <span class="login-nip">
                                            <i class="fa fa-id-card-o"></i>
                                            <?= Html::encode($user !== null ? $user->username : $nip) ?>
                                        </span>

                                        <?php if ((int) $model->account_owned === 1): ?>
                                            <small>Akun khusus KBG</small>
                                        <?php else: ?>
                                            <small>Akun sistem yang sudah ada</small>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <td data-label="Status">
                                    <?php if ($isActive): ?>
                                        <span class="staff-status active">
                                            <i class="fa fa-circle"></i>
                                            Aktif
                                        </span>
                                    <?php else: ?>
                                        <span class="staff-status inactive">
                                            <i class="fa fa-circle"></i>
                                            Belum Aktif
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($isActive && (int) $model->must_change_password === 1): ?>
                                        <span class="staff-password-note">
                                            Wajib ganti password
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="Aksi" class="action-col">
                                    <div class="staff-actions">
                                        <?php if (!$isActive): ?>
                                            <?= Html::a(
                                                '<i class="fa fa-play"></i> Aktifkan',
                                                ['activate', 'id' => $model->id],
                                                [
                                                    'class' => 'staff-action activate',
                                                    'data-method' => 'post',
                                                    'data-confirm' => 'Aktifkan pegawai ini sebagai Petugas KBG?',
                                                ]
                                            ) ?>
                                        <?php else: ?>
                                            <?php if ((int) $model->account_owned === 1): ?>
                                                <?= Html::a(
                                                    '<i class="fa fa-key"></i> Reset',
                                                    ['reset-password', 'id' => $model->id],
                                                    [
                                                        'class' => 'staff-action reset',
                                                        'data-method' => 'post',
                                                        'data-confirm' => 'Buat password sementara baru untuk petugas ini?',
                                                    ]
                                                ) ?>
                                            <?php endif; ?>

                                            <?= Html::a(
                                                '<i class="fa fa-pause"></i> Nonaktifkan',
                                                ['deactivate', 'id' => $model->id],
                                                [
                                                    'class' => 'staff-action deactivate',
                                                    'data-method' => 'post',
                                                    'data-confirm' => 'Nonaktifkan akses Petugas KBG? Data assessment lama tidak akan dihapus.',
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

            <?php if ($dataProvider->pagination !== false): ?>
                <div class="kbg-staff-pagination">
                    <?= LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                    ]) ?>
                </div>
            <?php endif; ?>
        </section>

    <?= Html::endForm() ?>

</div>

<style>
.kbg-staff-page {
    --navy: #072765;
    --blue: #0d4fa8;
    --blue2: #1769d3;
    --bg: #f4f7fb;
    --border: #e1e7f0;
    --text: #26364b;
    --muted: #748195;
    --green: #198754;
    --red: #c53a46;
    padding-bottom: 30px;
    color: var(--text);
}
.kbg-staff-hero {
    display: flex;
    margin-bottom: 18px;
    padding: 28px 30px;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    color: #fff;
    background: linear-gradient(135deg, #061c55, #0b3e91 68%, #1768d2);
    border-radius: 20px;
    box-shadow: 0 18px 42px rgba(7,39,101,.17);
}
.kbg-staff-eyebrow {
    display: inline-flex;
    margin-bottom: 8px;
    align-items: center;
    gap: 7px;
    color: rgba(255,255,255,.72);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .8px;
    text-transform: uppercase;
}
.kbg-staff-hero h1 {
    margin: 0 0 8px;
    color: #fff;
    font-size: 29px;
    font-weight: 800;
}
.kbg-staff-hero p {
    max-width: 720px;
    margin: 0;
    color: rgba(255,255,255,.74);
    font-size: 12.5px;
    line-height: 1.7;
}
.kbg-sync-form { margin: 0; }
.btn-kbg-secondary,
.btn-kbg-primary,
.btn-kbg-filter,
.btn-kbg-reset {
    display: inline-flex;
    min-height: 40px;
    padding: 9px 14px;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border: 0;
    border-radius: 10px;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none !important;
}
.btn-kbg-secondary {
    color: #0b377d;
    background: #fff;
    white-space: nowrap;
}
.btn-kbg-primary {
    color: #fff;
    background: linear-gradient(135deg, var(--navy), var(--blue2));
    box-shadow: 0 8px 18px rgba(7,39,101,.16);
}
.btn-kbg-primary:disabled {
    opacity: .45;
    cursor: not-allowed;
}
.btn-kbg-primary span {
    display: inline-flex;
    min-width: 19px;
    height: 19px;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.16);
    border-radius: 50%;
    font-size: 9px;
}
.kbg-credentials-panel {
    margin-bottom: 18px;
    padding: 18px;
    background: #fffaf0;
    border: 1px solid #f2d698;
    border-radius: 16px;
}
.credential-head,
.credential-head > div {
    display: flex;
    align-items: center;
    gap: 12px;
}
.credential-head {
    justify-content: space-between;
    margin-bottom: 13px;
}
.credential-icon {
    display: flex;
    width: 40px;
    height: 40px;
    flex: 0 0 40px;
    align-items: center;
    justify-content: center;
    color: #8a5b00;
    background: #ffe8b1;
    border-radius: 12px;
}
.credential-head strong,
.credential-head small { display: block; }
.credential-head strong { font-size: 12.5px; }
.credential-head small {
    max-width: 650px;
    margin-top: 3px;
    color: #7e6b43;
    font-size: 10.5px;
    line-height: 1.55;
}
.credential-copy-all {
    padding: 8px 11px;
    color: #765100;
    background: transparent;
    border: 1px solid #e4c375;
    border-radius: 9px;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}
.credential-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 9px;
}
.credential-item {
    display: flex;
    padding: 12px 13px;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    background: rgba(255,255,255,.75);
    border: 1px solid #efddb1;
    border-radius: 11px;
}
.credential-person strong,
.credential-person span,
.credential-password span,
.credential-password code { display: block; }
.credential-person strong { font-size: 11px; }
.credential-person span,
.credential-password span {
    margin-top: 2px;
    color: #7f7560;
    font-size: 9px;
}
.credential-password { text-align: right; }
.credential-password code {
    margin-top: 3px;
    color: #173258;
    background: #eef3fa;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 800;
}
.kbg-staff-stat-grid {
    display: grid;
    margin-bottom: 18px;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 12px;
}
.kbg-staff-stat {
    display: flex;
    padding: 17px;
    align-items: center;
    gap: 12px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 15px;
    box-shadow: 0 8px 23px rgba(24,43,74,.05);
}
.stat-icon {
    display: flex;
    width: 43px;
    height: 43px;
    flex: 0 0 43px;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
}
.stat-icon.all { color: #0e4da0; background: #ebf2ff; }
.stat-icon.active { color: #137646; background: #e9f8f0; }
.stat-icon.inactive { color: #876820; background: #fff7df; }
.kbg-staff-stat strong,
.kbg-staff-stat span { display: block; }
.kbg-staff-stat strong { font-size: 23px; line-height: 1; }
.kbg-staff-stat span { margin-top: 4px; color: var(--muted); font-size: 10px; }
.kbg-staff-toolbar {
    margin-bottom: 13px;
    padding: 13px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
}
.kbg-staff-filter-form {
    display: grid;
    grid-template-columns: minmax(220px, 1fr) 160px minmax(180px, 260px) auto auto;
    gap: 9px;
}
.kbg-filter-search { position: relative; }
.kbg-filter-search i {
    position: absolute;
    top: 13px;
    left: 13px;
    color: #8d98a8;
}
.kbg-filter-search input,
.kbg-staff-filter-form select {
    width: 100%;
    height: 40px;
    color: #34445a;
    background: #f8fafc;
    border: 1px solid #dce4ee;
    border-radius: 10px;
    outline: none;
    font-size: 11px;
}
.kbg-filter-search input { padding: 0 12px 0 36px; }
.kbg-staff-filter-form select { padding: 0 10px; }
.btn-kbg-filter { color: #fff; background: var(--navy); }
.btn-kbg-reset { color: #637187; background: #eef2f7; }
.kbg-staff-list-card {
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 17px;
    box-shadow: 0 10px 30px rgba(24,43,74,.055);
}
.staff-list-head {
    display: flex;
    padding: 17px 19px;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    border-bottom: 1px solid #e9edf3;
}
.staff-list-head h2 { margin: 0 0 3px; font-size: 16px; font-weight: 800; }
.staff-list-head p { margin: 0; color: var(--muted); font-size: 10.5px; }
.kbg-staff-table-wrap { overflow-x: auto; }
.kbg-staff-table { width: 100%; border-collapse: collapse; }
.kbg-staff-table th {
    padding: 11px 12px;
    color: #7a8699;
    background: #f8fafc;
    border-bottom: 1px solid #e7ecf2;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .55px;
    text-align: left;
    text-transform: uppercase;
}
.kbg-staff-table td {
    padding: 13px 12px;
    border-bottom: 1px solid #edf0f4;
    vertical-align: middle;
    font-size: 11px;
}
.kbg-staff-table tr:last-child td { border-bottom: 0; }
.kbg-staff-table tr.is-active { background: #fbfffd; }
.check-col { width: 42px; text-align: center !important; }
.action-col { width: 190px; }
.staff-person { display: flex; min-width: 220px; align-items: center; gap: 10px; }
.staff-avatar {
    position: relative;
    display: flex;
    width: 39px;
    height: 39px;
    flex: 0 0 39px;
    overflow: hidden;
    align-items: center;
    justify-content: center;
    color: #7e8b9e;
    background: #edf2f8;
    border-radius: 11px;
}
.staff-avatar img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 2; }
.staff-person-copy strong,
.staff-person-copy small { display: block; }
.staff-person-copy strong { max-width: 260px; font-size: 11px; line-height: 1.35; }
.staff-person-copy small { margin-top: 3px; color: #8190a3; font-size: 9px; }
.staff-job { min-width: 210px; }
.staff-job strong,
.staff-job span { display: block; }
.staff-job strong { font-size: 10.5px; font-weight: 650; line-height: 1.4; }
.staff-job span { margin-top: 4px; color: #7d899b; font-size: 9.5px; }
.staff-login-info { min-width: 155px; }
.login-nip { display: flex; align-items: center; gap: 6px; color: #183d73; font-weight: 700; }
.staff-login-info small { display: block; margin-top: 4px; color: #8a95a5; font-size: 8.5px; }
.staff-status {
    display: inline-flex;
    padding: 6px 9px;
    align-items: center;
    gap: 6px;
    border-radius: 999px;
    font-size: 9px;
    font-weight: 750;
}
.staff-status i { font-size: 6px; }
.staff-status.active { color: #137646; background: #e9f8f0; }
.staff-status.inactive { color: #80691d; background: #fff7de; }
.staff-password-note { display: block; margin-top: 5px; color: #b17310; font-size: 8px; }
.staff-actions { display: flex; justify-content: flex-end; gap: 5px; flex-wrap: wrap; }
.staff-action {
    display: inline-flex;
    padding: 7px 9px;
    align-items: center;
    gap: 5px;
    border-radius: 8px;
    font-size: 9px;
    font-weight: 700;
    text-decoration: none !important;
}
.staff-action.activate { color: #fff; background: #0d4fa8; }
.staff-action.reset { color: #73530f; background: #fff2c9; }
.staff-action.deactivate { color: #a72d39; background: #fff0f1; }
.kbg-staff-pagination { padding: 13px 18px; text-align: center; border-top: 1px solid #edf0f4; }
.kbg-staff-pagination .pagination { margin: 0; }
.kbg-empty-table { padding: 35px 15px; color: #7b8798; text-align: center; }
.kbg-empty-table i,
.kbg-empty-table strong,
.kbg-empty-table span { display: block; }
.kbg-empty-table i { margin-bottom: 8px; font-size: 24px; }
.kbg-empty-table strong { color: #425168; }
.kbg-empty-table span { margin-top: 4px; font-size: 10px; }
@media (max-width: 980px) {
    .kbg-staff-filter-form { grid-template-columns: 1fr 1fr; }
    .kbg-filter-search { grid-column: 1 / -1; }
    .credential-list { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
    .kbg-staff-hero { padding: 22px 18px; align-items: flex-start; flex-direction: column; border-radius: 16px; }
    .kbg-staff-hero h1 { font-size: 24px; }
    .kbg-staff-stat-grid { grid-template-columns: 1fr; }
    .kbg-staff-filter-form { grid-template-columns: 1fr; }
    .kbg-filter-search { grid-column: auto; }
    .staff-list-head { align-items: stretch; flex-direction: column; }
    .btn-kbg-primary { width: 100%; }
    .credential-head { align-items: flex-start; flex-direction: column; }
    .credential-item { align-items: flex-start; flex-direction: column; }
    .credential-password { text-align: left; }
    .kbg-staff-table,
    .kbg-staff-table tbody,
    .kbg-staff-table tr,
    .kbg-staff-table td { display: block; width: 100%; }
    .kbg-staff-table thead { display: none; }
    .kbg-staff-table tr { padding: 13px; border-bottom: 1px solid #e7ecf2; }
    .kbg-staff-table td { display: flex; padding: 7px 0; align-items: flex-start; justify-content: space-between; gap: 12px; border: 0; }
    .kbg-staff-table td::before { content: attr(data-label); flex: 0 0 92px; color: #8a95a5; font-size: 8.5px; font-weight: 800; text-transform: uppercase; }
    .kbg-staff-table td.check-col { display: none; }
    .staff-person { min-width: 0; flex: 1; justify-content: flex-end; text-align: right; }
    .staff-person-copy strong { max-width: 210px; }
    .staff-job,
    .staff-login-info { min-width: 0; max-width: 220px; text-align: right; }
    .login-nip { justify-content: flex-end; }
    .staff-actions { max-width: 230px; }
    .action-col { width: 100%; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var all = document.getElementById('selectAllInactive');
    var checks = Array.prototype.slice.call(
        document.querySelectorAll('.staff-selection')
    );
    var button = document.getElementById('activateSelectedButton');
    var count = document.getElementById('selectedCount');

    function updateSelected() {
        var selected = checks.filter(function (item) {
            return item.checked;
        }).length;

        if (count) {
            count.textContent = selected;
        }

        if (button) {
            button.disabled = selected === 0;
        }

        if (all) {
            all.checked = checks.length > 0 && selected === checks.length;
            all.indeterminate = selected > 0 && selected < checks.length;
        }
    }

    if (all) {
        all.addEventListener('change', function () {
            checks.forEach(function (item) {
                item.checked = all.checked;
            });
            updateSelected();
        });
    }

    checks.forEach(function (item) {
        item.addEventListener('change', updateSelected);
    });

    updateSelected();

    var copyButton = document.getElementById('copyAllCredentials');

    if (copyButton) {
        copyButton.addEventListener('click', function () {
            var rows = Array.prototype.slice.call(
                document.querySelectorAll('.credential-item')
            );

            var text = rows.map(function (row) {
                return [
                    row.dataset.name,
                    'NIP: ' + row.dataset.nip,
                    'Password sementara: ' + row.dataset.password,
                    'Login: <?= Url::to(['/site/kbg-login'], true) ?>'
                ].join('\n');
            }).join('\n\n');

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function () {
                    copyButton.innerHTML = '<i class="fa fa-check"></i> Tersalin';
                    setTimeout(function () {
                        copyButton.innerHTML = '<i class="fa fa-copy"></i> Salin Semua';
                    }, 1800);
                });
            }
        });
    }
});
</script>
