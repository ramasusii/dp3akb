<?php

use yii\helpers\Html;
use yii\helpers\Url;

$layananList = [
    [
        'no' => '01',
        'icon' => 'bi-person-video3',
        'judul' => 'Layanan Permintaan Narasumber',
        'deskripsi' => 'Layanan untuk permohonan narasumber dari DP3AKB Provinsi Sumatera Utara pada kegiatan rapat, seminar, sosialisasi, diskusi, maupun forum lainnya.',
        'badge' => 'Infografis Menyusul',
    ],
    [
        'no' => '02',
        'icon' => 'bi-megaphone',
        'judul' => 'Layanan Permintaan Sosialisasi',
        'deskripsi' => 'Layanan untuk pengajuan kegiatan sosialisasi terkait pemberdayaan perempuan, perlindungan anak, keluarga, dan isu strategis lainnya sesuai tugas dan fungsi dinas.',
        'badge' => 'Infografis Menyusul',
    ],
    [
        'no' => '03',
        'icon' => 'bi-bar-chart-line',
        'judul' => 'Layanan Permintaan Data',
        'deskripsi' => 'Layanan untuk permintaan data dan informasi yang berada di lingkup DP3AKB Provinsi Sumatera Utara sesuai ketentuan pelayanan informasi dan ketersediaan data.',
        'badge' => 'Infografis Menyusul',
    ],
];

?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">SK Pelayanan Dinas</h1>

            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
                    <li class="current">SK Pelayanan Dinas</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->


    <section id="sk-pelayanan-dinas" class="sk-pelayanan-section section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Hero -->
            <div class="sk-hero">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
                        <div class="sk-intro">
                            <span class="sk-eyebrow">
                                Standar Pelayanan
                            </span>

                            <h2>
                                SK Pelayanan Dinas DP3AKB
                                Provinsi Sumatera Utara
                            </h2>

                            <p class="sk-lead">
                                Halaman ini memuat layanan utama pada
                                SK Pelayanan Dinas yang akan disebarluaskan
                                kepada masyarakat. Konten visual berupa
                                infografis layanan akan ditambahkan
                                setelah finalisasi desain.
                            </p>

                            <div class="sk-meta">
                                <div class="sk-meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-grid-1x2"></i>
                                    </div>
                                    <div>
                                        <span>Jumlah Layanan</span>
                                        <strong>3 Layanan Utama</strong>
                                    </div>
                                </div>

                                <div class="sk-meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div>
                                        <span>Unit</span>
                                        <strong>Dinas DP3AKB</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="sk-note">
                                <i class="bi bi-info-circle-fill"></i>
                                <span>
                                    Gambar/infografis tiap layanan sedang
                                    dipersiapkan dan akan ditambahkan
                                    menyusul.
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                        <div class="sk-highlight-card">
                            <div class="highlight-badge">
                                <i class="bi bi-shield-check"></i>
                                Pelayanan Resmi
                            </div>

                            <h3>
                                Layanan yang Ditampilkan
                            </h3>

                            <p>
                                Fokus halaman ini adalah tiga layanan utama
                                dinas yang siap dipublikasikan terlebih dahulu.
                                Halaman UPT akan dibuat terpisah agar struktur
                                informasi tetap rapi dan mudah dipahami.
                            </p>

                            <ul class="highlight-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Permintaan Narasumber
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Permintaan Sosialisasi
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Permintaan Data
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Section Title -->
            <div class="container section-title sk-section-title" data-aos="fade-up">
                <h2>Daftar Layanan</h2>
                <p>
                    Tiga layanan utama dalam SK Pelayanan Dinas yang
                    ditampilkan pada halaman ini.
                </p>
            </div>


            <!-- Cards -->
            <div class="row g-4">
                <?php foreach ($layananList as $index => $item): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= 100 + ($index * 100) ?>">
                        <div class="service-card">

                            <div class="service-card-top">
                                <span class="service-number">
                                    <?= Html::encode($item['no']) ?>
                                </span>

                                <span class="service-badge">
                                    <?= Html::encode($item['badge']) ?>
                                </span>
                            </div>

                            <div class="service-icon">
                                <i class="bi <?= Html::encode($item['icon']) ?>"></i>
                            </div>

                            <h3>
                                <?= Html::encode($item['judul']) ?>
                            </h3>

                            <p>
                                <?= Html::encode($item['deskripsi']) ?>
                            </p>

                            <div class="service-placeholder">
                                <div class="placeholder-icon">
                                    <i class="bi bi-image"></i>
                                </div>
                                <strong>Area Infografis</strong>
                                <span>
                                    Nanti gambar layanan akan ditempatkan di sini.
                                </span>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- CTA -->
            <div class="sk-cta" data-aos="fade-up" data-aos-delay="100">
                <div class="cta-icon">
                    <i class="bi bi-diagram-3"></i>
                </div>

                <div class="cta-content">
                    <span>Halaman Terkait</span>
                    <h3>Butuh layanan UPT juga?</h3>
                    <p>
                        Halaman layanan UPT dipisahkan agar informasi
                        pelayanan lebih tertata dan mudah diakses.
                    </p>
                </div>

                <div class="cta-actions">
                    <?= Html::a(
                        '<i class="bi bi-arrow-right-circle"></i> Lihat Layanan UPT',
                        ['site/sk-pelayanan-upt'],
                        ['class' => 'btn-sk-secondary']
                    ) ?>

                    <?= Html::a(
                        '<i class="bi bi-house-door"></i> Kembali ke Beranda',
                        ['site/index'],
                        ['class' => 'btn-sk-primary']
                    ) ?>
                </div>
            </div>

        </div>
    </section>

</main>

<style>
#sk-pelayanan-dinas {
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(circle at 10% 10%, rgba(7, 37, 133, 0.05), transparent 28%),
        linear-gradient(180deg, #ffffff 0%, #f8faff 60%, #ffffff 100%);
}

.sk-hero {
    margin-bottom: 80px;
}

.sk-eyebrow {
    display: inline-flex;
    align-items: center;
    margin-bottom: 14px;
    padding: 8px 14px;
    color: #072585;
    background: #edf2ff;
    border: 1px solid #dbe5fb;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
}

.sk-intro h2 {
    margin: 0 0 18px;
    color: #1d2840;
    font-size: clamp(34px, 4vw, 50px);
    font-weight: 800;
    line-height: 1.12;
    letter-spacing: -1px;
}

.sk-lead {
    margin: 0 0 28px;
    color: #667186;
    font-size: 16px;
    line-height: 1.9;
}

.sk-meta {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 18px;
}

.sk-meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 16px;
    background: #ffffff;
    border: 1px solid #e2e8f1;
    border-radius: 14px;
    box-shadow: 0 10px 22px rgba(18, 31, 68, 0.05);
}

.meta-icon {
    display: flex;
    width: 42px;
    height: 42px;
    flex: 0 0 42px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: #edf2ff;
    border-radius: 12px;
    font-size: 18px;
}

.sk-meta-item span {
    display: block;
    margin-bottom: 2px;
    color: #8c95a5;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.sk-meta-item strong {
    color: #253047;
    font-size: 14px;
    font-weight: 750;
}

.sk-note {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 16px 18px;
    color: #6b7588;
    background: #fff9ef;
    border: 1px solid #f7dfb0;
    border-radius: 15px;
    font-size: 14px;
    line-height: 1.7;
}

.sk-note i {
    margin-top: 2px;
    color: #f8ab3c;
}

.sk-highlight-card {
    height: 100%;
    padding: 30px;
    background: #ffffff;
    border: 1px solid #dfe6f1;
    border-radius: 24px;
    box-shadow:
        0 24px 60px rgba(18, 31, 68, 0.10),
        0 5px 15px rgba(18, 31, 68, 0.04);
}

.highlight-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
    padding: 8px 14px;
    color: #0c6e46;
    background: #ebf8f1;
    border: 1px solid #ccecdc;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.sk-highlight-card h3 {
    margin: 0 0 12px;
    color: #1e2a40;
    font-size: 24px;
    font-weight: 780;
}

.sk-highlight-card p {
    margin: 0 0 18px;
    color: #697486;
    font-size: 14px;
    line-height: 1.9;
}

.highlight-list {
    margin: 0;
    padding: 0;
    list-style: none;
}

.highlight-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 0;
    color: #243147;
    font-size: 14px;
    font-weight: 600;
    border-bottom: 1px dashed #e4e9f1;
}

.highlight-list li:last-child {
    border-bottom: 0;
}

.highlight-list i {
    color: #072585;
}

.sk-section-title {
    padding-bottom: 36px;
}

.sk-section-title h2 {
    color: #1d2840;
}

.service-card {
    height: 100%;
    padding: 30px 26px;
    background: #ffffff;
    border: 1px solid #e2e8f1;
    border-radius: 22px;
    box-shadow: 0 14px 35px rgba(20, 35, 75, 0.07);
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
}

.service-card:hover {
    transform: translateY(-8px);
    border-color: #d3def5;
    box-shadow: 0 20px 46px rgba(7, 37, 133, 0.12);
}

.service-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 18px;
}

.service-number {
    color: rgba(7, 37, 133, 0.18);
    font-size: 26px;
    font-weight: 900;
    line-height: 1;
}

.service-badge {
    display: inline-flex;
    align-items: center;
    padding: 7px 12px;
    color: #9a6a00;
    background: #fff6e6;
    border: 1px solid #f6deb0;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
}

.service-icon {
    display: flex;
    width: 60px;
    height: 60px;
    margin-bottom: 20px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: linear-gradient(135deg, #edf2ff, #f8faff);
    border: 1px solid #dce6fc;
    border-radius: 18px;
    font-size: 24px;
    box-shadow: 0 10px 24px rgba(7, 37, 133, 0.08);
}

.service-card h3 {
    margin: 0 0 12px;
    color: #1f2b41;
    font-size: 20px;
    font-weight: 760;
    line-height: 1.4;
}

.service-card p {
    margin: 0 0 20px;
    color: #6b7588;
    font-size: 14px;
    line-height: 1.85;
}

.service-placeholder {
    display: flex;
    min-height: 180px;
    padding: 24px;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    background:
        linear-gradient(135deg, #f8faff, #f1f5fd);
    border: 2px dashed #d5dff1;
    border-radius: 18px;
}

.placeholder-icon {
    display: flex;
    width: 58px;
    height: 58px;
    margin-bottom: 12px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: #ffffff;
    border-radius: 50%;
    box-shadow: 0 8px 18px rgba(7, 37, 133, 0.08);
    font-size: 24px;
}

.service-placeholder strong {
    display: block;
    margin-bottom: 6px;
    color: #233046;
    font-size: 15px;
    font-weight: 700;
}

.service-placeholder span {
    color: #7b8596;
    font-size: 13px;
    line-height: 1.7;
}

.sk-cta {
    display: flex;
    margin-top: 70px;
    padding: 30px 32px;
    align-items: center;
    gap: 22px;
    background: linear-gradient(135deg, #f0f4ff, #ffffff);
    border: 1px solid #dbe4f7;
    border-radius: 22px;
    box-shadow: 0 15px 38px rgba(7, 37, 133, 0.08);
}

.cta-icon {
    display: flex;
    width: 64px;
    height: 64px;
    flex: 0 0 64px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: linear-gradient(135deg, #072585, #164bc6);
    border-radius: 18px;
    font-size: 26px;
    box-shadow: 0 12px 25px rgba(7, 37, 133, 0.18);
}

.cta-content {
    flex: 1;
}

.cta-content span {
    display: block;
    margin-bottom: 3px;
    color: #072585;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.1px;
    text-transform: uppercase;
}

.cta-content h3 {
    margin: 0 0 5px;
    color: #202a3c;
    font-size: 21px;
    font-weight: 780;
}

.cta-content p {
    margin: 0;
    color: #727d8f;
    font-size: 13px;
    line-height: 1.7;
}

.cta-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-sk-primary,
.btn-sk-secondary {
    display: inline-flex;
    min-height: 44px;
    padding: 10px 16px;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border-radius: 12px;
    text-decoration: none !important;
    font-size: 12px;
    font-weight: 750;
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.btn-sk-primary {
    color: #ffffff !important;
    background: linear-gradient(135deg, #072585, #164bc6);
    box-shadow: 0 9px 20px rgba(7, 37, 133, 0.18);
}

.btn-sk-primary:hover {
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 13px 26px rgba(7, 37, 133, 0.25);
}

.btn-sk-secondary {
    color: #072585 !important;
    background: #ffffff;
    border: 1px solid #cfdbf4;
}

.btn-sk-secondary:hover {
    color: #ffffff !important;
    background: #072585;
    transform: translateY(-2px);
}

@media (max-width: 991px) {
    .sk-hero {
        margin-bottom: 60px;
    }

    .sk-intro h2 {
        font-size: 40px;
    }

    .sk-cta {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .cta-content {
        flex: 1 1 calc(100% - 95px);
    }

    .cta-actions {
        width: 100%;
        padding-left: 86px;
    }
}

@media (max-width: 767px) {
    #sk-pelayanan-dinas {
        padding-top: 42px;
        padding-bottom: 52px;
    }

    .sk-intro h2 {
        font-size: 30px;
        letter-spacing: -0.4px;
    }

    .sk-lead {
        font-size: 15px;
        line-height: 1.8;
    }

    .sk-meta {
        grid-template-columns: 1fr;
    }

    .sk-highlight-card,
    .service-card {
        padding: 24px 20px;
        border-radius: 18px;
    }

    .service-placeholder {
        min-height: 150px;
        padding: 20px;
    }

    .sk-cta {
        margin-top: 56px;
        padding: 24px 20px;
        gap: 16px;
        border-radius: 18px;
    }

    .cta-icon {
        width: 52px;
        height: 52px;
        flex-basis: 52px;
        border-radius: 15px;
        font-size: 22px;
    }

    .cta-content {
        flex-basis: calc(100% - 70px);
    }

    .cta-actions {
        width: 100%;
        padding-left: 0;
    }

    .btn-sk-primary,
    .btn-sk-secondary {
        flex: 1 1 100%;
    }
}
</style>