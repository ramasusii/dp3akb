<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<main class="main">

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Maklumat Pelayanan</h1>

            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
                    <li><?= Html::a('PPID', ['site/profil-ppid']) ?></li>
                    <li class="current">Maklumat Pelayanan</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="maklumat-pelayanan" class="maklumat-section section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="maklumat-hero">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
                        <div class="maklumat-intro">

                            <span class="maklumat-eyebrow">
                                Komitmen Pelayanan Publik
                            </span>

                            <h2>
                                Pelayanan yang Profesional,
                                Transparan, dan Bertanggung Jawab
                            </h2>

                            <p class="maklumat-lead">
                                Maklumat Pelayanan merupakan bentuk komitmen
                                Dinas Pemberdayaan Perempuan, Perlindungan Anak
                                dan Keluarga Provinsi Sumatera Utara dalam
                                memberikan pelayanan publik sesuai standar
                                yang telah ditetapkan.
                            </p>

                            <div class="maklumat-meta">
                                <div class="maklumat-meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-calendar3"></i>
                                    </div>

                                    <div>
                                        <span>Ditetapkan</span>
                                        <strong>25 Mei 2026</strong>
                                    </div>
                                </div>

                                <div class="maklumat-meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>

                                    <div>
                                        <span>Lokasi</span>
                                        <strong>Medan</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="maklumat-authority">
                                <div class="authority-icon">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>

                                <div>
                                    <span>Ditetapkan oleh</span>
                                    <strong>
                                        Kepala Dinas Pemberdayaan Perempuan,
                                        Perlindungan Anak dan Keluarga
                                    </strong>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                        <div class="maklumat-visual-card">

                            <div class="visual-topbar">
                                <div>
                                    <span class="visual-kicker">Dokumen Resmi</span>
                                    <h3>Maklumat Pelayanan DP3AKB</h3>
                                </div>

                                <div class="visual-badge">
                                    <i class="bi bi-shield-check"></i>
                                    Resmi
                                </div>
                            </div>

                            <a
                                href="<?= Yii::$app->request->baseUrl ?>/web/img/maklumat-pelayanan.png"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="maklumat-image-link"
                                aria-label="Buka Maklumat Pelayanan ukuran penuh"
                            >
                                <?= Html::img(
                                    Yii::$app->request->baseUrl
                                    . '/web/img/maklumat-pelayanan.png',
                                    [
                                        'class' => 'maklumat-image',
                                        'alt' => 'Maklumat Pelayanan DP3AKB Provinsi Sumatera Utara',
                                        'loading' => 'eager',
                                    ]
                                ) ?>

                                <span class="image-hover-action">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                    Lihat ukuran penuh
                                </span>
                            </a>

                            <div class="visual-footer">
                                <i class="bi bi-info-circle"></i>
                                <span>
                                    Klik dokumen untuk melihat gambar
                                    dalam ukuran penuh.
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="container section-title maklumat-title" data-aos="fade-up">
                <h2>Komitmen Pelayanan</h2>
                <p>
                    Tiga komitmen utama yang menjadi dasar
                    penyelenggaraan pelayanan publik.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="commitment-card">
                        <div class="commitment-number">01</div>

                        <div class="commitment-icon">
                            <i class="bi bi-award"></i>
                        </div>

                        <h3>Sesuai Standar Pelayanan</h3>

                        <p>
                            Memberikan pelayanan sesuai dengan
                            Standar Pelayanan yang telah ditetapkan.
                        </p>

                        <div class="commitment-line"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="commitment-card featured">
                        <div class="commitment-number">02</div>

                        <div class="commitment-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>

                        <h3>Perbaikan Berkelanjutan</h3>

                        <p>
                            Memberikan pelayanan sesuai dengan kewajiban
                            dan melaksanakan perbaikan secara terus menerus.
                        </p>

                        <div class="commitment-line"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="commitment-card">
                        <div class="commitment-number">03</div>

                        <div class="commitment-icon">
                            <i class="bi bi-shield-exclamation"></i>
                        </div>

                        <h3>Tanggung Jawab Pelayanan</h3>

                        <p>
                            Menerima sanksi apabila pelayanan yang
                            diberikan tidak sesuai dengan Standar Pelayanan.
                        </p>

                        <div class="commitment-line"></div>
                    </div>
                </div>

            </div>

            <div class="maklumat-statement" data-aos="fade-up" data-aos-delay="150">

                <div class="statement-decoration decoration-left"></div>
                <div class="statement-decoration decoration-right"></div>

                <div class="statement-icon">
                    <i class="bi bi-quote"></i>
                </div>

                <span class="statement-label">
                    Pernyataan Komitmen
                </span>

                <blockquote>
                    Dengan ini kami segenap jajaran Dinas Pemberdayaan
                    Perempuan, Perlindungan Anak dan Keluarga Provinsi
                    Sumatera Utara menyatakan sanggup memberikan
                    pelayanan sesuai standar, melaksanakan perbaikan
                    berkelanjutan, serta bertanggung jawab terhadap
                    pelayanan yang diberikan.
                </blockquote>

                <div class="statement-signature">
                    <div class="signature-line"></div>

                    <div>
                        <span>Kepala Dinas</span>
                        <strong>Dwi Endah Purwanti, S.S, M.Si</strong>
                        <small>Pembina Utama Muda / IV.c</small>
                    </div>
                </div>

            </div>

            <div class="maklumat-values" data-aos="fade-up">

                <div class="values-heading-wrap">
                    <span class="values-kicker">Prinsip Pelayanan</span>

                    <h3>
                        Pelayanan Publik yang Berorientasi
                        pada Masyarakat
                    </h3>

                    <p>
                        Maklumat pelayanan menjadi pengingat bahwa
                        setiap layanan harus diberikan secara konsisten,
                        terukur, dan dapat dipertanggungjawabkan.
                    </p>
                </div>

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="bi bi-people"></i>
                            </div>

                            <h4>Berorientasi Pelayanan</h4>

                            <p>
                                Mengutamakan kebutuhan masyarakat
                                dalam setiap proses pelayanan.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="bi bi-eye"></i>
                            </div>

                            <h4>Transparan</h4>

                            <p>
                                Standar dan proses pelayanan disampaikan
                                secara jelas dan terbuka.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="bi bi-check2-circle"></i>
                            </div>

                            <h4>Akuntabel</h4>

                            <p>
                                Setiap pelayanan dapat dipertanggungjawabkan
                                sesuai standar yang berlaku.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="maklumat-cta" data-aos="fade-up" data-aos-delay="100">

                <div class="cta-icon">
                    <i class="bi bi-headset"></i>
                </div>

                <div class="cta-content">
                    <span>Informasi dan Pelayanan Publik</span>

                    <h3>Butuh informasi lebih lanjut?</h3>

                    <p>
                        Hubungi layanan DP3AKB atau kunjungi informasi PPID
                        untuk mendapatkan informasi pelayanan publik.
                    </p>
                </div>

                <div class="cta-actions">
                    <?= Html::a(
                        '<i class="bi bi-person-lines-fill"></i> Hubungi Kami',
                        ['site/kontak'],
                        [
                            'class' => 'btn-maklumat-primary',
                        ]
                    ) ?>

                    <?= Html::a(
                        'Profil PPID <i class="bi bi-arrow-right"></i>',
                        ['site/profil-ppid'],
                        [
                            'class' => 'btn-maklumat-secondary',
                        ]
                    ) ?>
                </div>

            </div>

        </div>
    </section>

</main>

<style>
#maklumat-pelayanan {
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(
            circle at 10% 8%,
            rgba(7, 37, 133, 0.055),
            transparent 28%
        ),
        linear-gradient(
            180deg,
            #ffffff 0%,
            #f8faff 60%,
            #ffffff 100%
        );
}

.maklumat-hero {
    position: relative;
    margin-bottom: 88px;
}

.maklumat-intro {
    position: relative;
}

.maklumat-eyebrow,
.values-kicker,
.visual-kicker {
    display: inline-flex;
    align-items: center;
    margin-bottom: 14px;
    color: #072585;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.35px;
    text-transform: uppercase;
}

.maklumat-eyebrow {
    padding: 8px 14px;
    background: #edf2ff;
    border: 1px solid #dbe5fb;
    border-radius: 999px;
}

.maklumat-intro h2 {
    margin: 0 0 20px;
    color: #182033;
    font-size: clamp(34px, 4vw, 52px);
    font-weight: 800;
    line-height: 1.12;
    letter-spacing: -1.2px;
}

.maklumat-lead {
    margin: 0 0 28px;
    color: #626d80;
    font-size: 16px;
    line-height: 1.9;
}

.maklumat-meta {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 18px;
}

.maklumat-meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 16px;
    background: #ffffff;
    border: 1px solid #e1e7f1;
    border-radius: 14px;
    box-shadow: 0 8px 22px rgba(20, 35, 75, 0.055);
}

.meta-icon {
    display: flex;
    flex: 0 0 40px;
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: #edf2ff;
    border-radius: 11px;
    font-size: 17px;
}

.maklumat-meta-item span,
.maklumat-authority span {
    display: block;
    margin-bottom: 2px;
    color: #8b94a4;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.maklumat-meta-item strong {
    color: #232d40;
    font-size: 14px;
    font-weight: 750;
}

.maklumat-authority {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 18px;
    color: #ffffff;
    background: linear-gradient(135deg, #072585, #164bc6);
    border-radius: 15px;
    box-shadow: 0 14px 30px rgba(7, 37, 133, 0.22);
}

.authority-icon {
    display: flex;
    flex: 0 0 45px;
    width: 45px;
    height: 45px;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 13px;
    font-size: 20px;
}

.maklumat-authority span {
    color: rgba(255, 255, 255, 0.7);
}

.maklumat-authority strong {
    display: block;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.5;
}

.maklumat-visual-card {
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #dfe5ef;
    border-radius: 24px;
    box-shadow:
        0 28px 70px rgba(18, 31, 68, 0.12),
        0 5px 15px rgba(18, 31, 68, 0.04);
}

.visual-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 22px 24px;
    border-bottom: 1px solid #e7ebf2;
}

.visual-kicker {
    margin-bottom: 3px;
    font-size: 10px;
}

.visual-topbar h3 {
    margin: 0;
    color: #1f293b;
    font-size: 18px;
    font-weight: 760;
}

.visual-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 11px;
    color: #0b6b43;
    background: #e9f8f0;
    border: 1px solid #caeedb;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 750;
}

.maklumat-image-link {
    position: relative;
    display: block;
    overflow: hidden;
    background: #eef2f8;
}

.maklumat-image {
    display: block;
    width: 100%;
    height: auto;
    transition: transform 0.45s ease, filter 0.45s ease;
}

.maklumat-image-link:hover .maklumat-image {
    filter: brightness(0.93);
    transform: scale(1.015);
}

.image-hover-action {
    position: absolute;
    left: 50%;
    bottom: 24px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 15px;
    color: #ffffff;
    background: rgba(7, 37, 133, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 999px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 25px rgba(7, 37, 133, 0.25);
    font-size: 12px;
    font-weight: 700;
    opacity: 0;
    transform: translate(-50%, 15px);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.maklumat-image-link:hover .image-hover-action {
    opacity: 1;
    transform: translate(-50%, 0);
}

.visual-footer {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 14px 22px;
    color: #7c8798;
    background: #fbfcfe;
    border-top: 1px solid #e8ecf2;
    font-size: 12px;
}

.visual-footer i {
    color: #072585;
}

.maklumat-title {
    padding-bottom: 42px;
}

.maklumat-title h2 {
    color: #1b2538;
}

.commitment-card {
    position: relative;
    height: 100%;
    padding: 34px 30px 29px;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e0e6ef;
    border-radius: 20px;
    box-shadow: 0 14px 38px rgba(20, 35, 75, 0.07);
    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}

.commitment-card:hover,
.commitment-card.featured {
    border-color: #cdd9f5;
    box-shadow: 0 22px 48px rgba(7, 37, 133, 0.13);
    transform: translateY(-8px);
}

.commitment-card.featured {
    background: linear-gradient(145deg, #f4f7ff 0%, #ffffff 72%);
}

.commitment-number {
    position: absolute;
    top: 18px;
    right: 23px;
    color: rgba(7, 37, 133, 0.06);
    font-family: var(--heading-font);
    font-size: 62px;
    font-weight: 900;
    line-height: 1;
}

.commitment-icon {
    display: flex;
    width: 62px;
    height: 62px;
    margin-bottom: 24px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: linear-gradient(135deg, #edf2ff, #f8faff);
    border: 1px solid #dce6fc;
    border-radius: 17px;
    box-shadow: 0 10px 24px rgba(7, 37, 133, 0.08);
    font-size: 25px;
}

.commitment-card.featured .commitment-icon {
    color: #ffffff;
    background: linear-gradient(135deg, #072585, #194bc4);
}

.commitment-card h3 {
    position: relative;
    z-index: 2;
    margin: 0 0 13px;
    color: #202a3c;
    font-size: 20px;
    font-weight: 760;
    line-height: 1.35;
}

.commitment-card p {
    position: relative;
    z-index: 2;
    margin: 0;
    color: #6a7485;
    font-size: 14px;
    line-height: 1.8;
}

.commitment-line {
    width: 52px;
    height: 4px;
    margin-top: 25px;
    background: linear-gradient(90deg, #072585, #f8ab3c);
    border-radius: 999px;
}

.maklumat-statement {
    position: relative;
    margin-top: 72px;
    padding: 58px 70px;
    overflow: hidden;
    text-align: center;
    background:
        radial-gradient(
            circle at 15% 15%,
            rgba(248, 171, 60, 0.14),
            transparent 25%
        ),
        linear-gradient(135deg, #071f70, #0c359a);
    border-radius: 26px;
    box-shadow: 0 28px 65px rgba(7, 37, 133, 0.23);
}

.statement-decoration {
    position: absolute;
    width: 210px;
    height: 210px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 50%;
}

.decoration-left {
    bottom: -120px;
    left: -100px;
}

.decoration-right {
    top: -130px;
    right: -90px;
}

.statement-icon {
    position: relative;
    z-index: 2;
    display: flex;
    width: 54px;
    height: 54px;
    margin: 0 auto 16px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: #ffffff;
    border-radius: 50%;
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.14);
    font-size: 25px;
}

.statement-label {
    position: relative;
    z-index: 2;
    display: block;
    margin-bottom: 14px;
    color: #f8c768;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.6px;
    text-transform: uppercase;
}

.maklumat-statement blockquote {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
    color: #ffffff;
    font-family: Georgia, serif;
    font-size: clamp(20px, 2.4vw, 30px);
    font-style: italic;
    line-height: 1.65;
}

.statement-signature {
    position: relative;
    z-index: 2;
    display: inline-flex;
    margin-top: 30px;
    align-items: center;
    gap: 16px;
    text-align: left;
}

.signature-line {
    width: 44px;
    height: 2px;
    background: #f8ab3c;
}

.statement-signature span,
.statement-signature small {
    display: block;
    color: rgba(255, 255, 255, 0.68);
    font-size: 11px;
}

.statement-signature strong {
    display: block;
    margin: 2px 0;
    color: #ffffff;
    font-size: 14px;
    font-weight: 750;
}

.maklumat-values {
    margin-top: 82px;
}

.values-heading-wrap {
    max-width: 760px;
    margin: 0 auto 36px;
    text-align: center;
}

.values-kicker {
    margin-bottom: 8px;
}

.values-heading-wrap h3 {
    margin: 0 0 12px;
    color: #1e283a;
    font-size: 32px;
    font-weight: 780;
}

.values-heading-wrap p {
    margin: 0;
    color: #768092;
    font-size: 14px;
    line-height: 1.8;
}

.value-item {
    height: 100%;
    padding: 28px 25px;
    text-align: center;
    background: #ffffff;
    border: 1px solid #e3e8f0;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(21, 35, 70, 0.06);
}

.value-icon {
    display: flex;
    width: 54px;
    height: 54px;
    margin: 0 auto 17px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: linear-gradient(135deg, #072585, #194bc4);
    border-radius: 15px;
    box-shadow: 0 9px 20px rgba(7, 37, 133, 0.19);
    font-size: 22px;
}

.value-item h4 {
    margin: 0 0 9px;
    color: #222c3e;
    font-size: 18px;
    font-weight: 750;
}

.value-item p {
    margin: 0;
    color: #737e8f;
    font-size: 13px;
    line-height: 1.75;
}

.maklumat-cta {
    display: flex;
    margin-top: 78px;
    padding: 30px 32px;
    align-items: center;
    gap: 22px;
    background: linear-gradient(135deg, #f0f4ff, #ffffff);
    border: 1px solid #dbe4f7;
    border-radius: 21px;
    box-shadow: 0 15px 38px rgba(7, 37, 133, 0.08);
}

.cta-icon {
    display: flex;
    flex: 0 0 64px;
    width: 64px;
    height: 64px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: linear-gradient(135deg, #072585, #164bc6);
    border-radius: 18px;
    font-size: 27px;
    box-shadow: 0 12px 25px rgba(7, 37, 133, 0.2);
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
    line-height: 1.65;
}

.cta-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-maklumat-primary,
.btn-maklumat-secondary {
    display: inline-flex;
    min-height: 44px;
    padding: 10px 16px;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 750;
    text-decoration: none !important;
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.btn-maklumat-primary {
    color: #ffffff !important;
    background: linear-gradient(135deg, #072585, #164bc6);
    box-shadow: 0 9px 20px rgba(7, 37, 133, 0.18);
}

.btn-maklumat-primary:hover {
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 13px 26px rgba(7, 37, 133, 0.25);
}

.btn-maklumat-secondary {
    color: #072585 !important;
    background: #ffffff;
    border: 1px solid #cfdbf4;
}

.btn-maklumat-secondary:hover {
    color: #ffffff !important;
    background: #072585;
    transform: translateY(-2px);
}

@media (max-width: 991px) {
    .maklumat-hero {
        margin-bottom: 68px;
    }

    .maklumat-intro h2 {
        font-size: 40px;
    }

    .maklumat-statement {
        padding: 48px 40px;
    }

    .maklumat-cta {
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
    #maklumat-pelayanan {
        padding-top: 42px;
        padding-bottom: 52px;
    }

    .maklumat-hero {
        margin-bottom: 56px;
    }

    .maklumat-intro h2 {
        font-size: 31px;
        letter-spacing: -0.5px;
    }

    .maklumat-lead {
        font-size: 15px;
        line-height: 1.8;
    }

    .maklumat-meta {
        grid-template-columns: 1fr;
    }

    .visual-topbar {
        padding: 17px 16px;
    }

    .visual-topbar h3 {
        font-size: 15px;
    }

    .visual-badge {
        padding: 7px 9px;
        font-size: 10px;
    }

    .maklumat-visual-card {
        border-radius: 18px;
    }

    .image-hover-action {
        display: none;
    }

    .commitment-card {
        padding: 28px 24px 24px;
        border-radius: 17px;
    }

    .maklumat-statement {
        margin-top: 55px;
        padding: 40px 23px;
        border-radius: 20px;
    }

    .maklumat-statement blockquote {
        font-size: 20px;
    }

    .statement-signature {
        align-items: flex-start;
    }

    .maklumat-values {
        margin-top: 60px;
    }

    .values-heading-wrap h3 {
        font-size: 26px;
    }

    .maklumat-cta {
        margin-top: 58px;
        padding: 24px 20px;
        gap: 16px;
        border-radius: 17px;
    }

    .cta-icon {
        flex-basis: 52px;
        width: 52px;
        height: 52px;
        border-radius: 15px;
        font-size: 22px;
    }

    .cta-content {
        flex-basis: calc(100% - 70px);
    }

    .cta-actions {
        padding-left: 0;
        flex-wrap: wrap;
    }

    .btn-maklumat-primary,
    .btn-maklumat-secondary {
        flex: 1 1 100%;
    }
}
</style>
