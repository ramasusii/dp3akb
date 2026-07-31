<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $edukasiUtama app\models\KontenEdukasi[] */

$getJenisLabel = function ($jenis) {
    switch ($jenis) {
        case 'video':
            return 'Video';

        case 'infografis':
            return 'Infografis';

        case 'ebook':
            return 'E-Book';

        default:
            return 'Edukasi';
    }
};

$getJenisIcon = function ($jenis) {
    switch ($jenis) {
        case 'video':
            return 'bi-play-circle-fill';

        case 'infografis':
            return 'bi-file-earmark-image-fill';

        case 'ebook':
            return 'bi-book-half';

        default:
            return 'bi-lightbulb-fill';
    }
};

$getJenisClass = function ($jenis) {
    switch ($jenis) {
        case 'video':
            return 'edu-video';

        case 'infografis':
            return 'edu-infografis';

        case 'ebook':
            return 'edu-ebook';

        default:
            return 'edu-default';
    }
};
?>

<section
    id="konten-edukasi-premium"
    class="konten-edukasi-premium section"
>

    <div
        class="container"
        data-aos="fade-up"
        data-aos-delay="100"
    >

        <!-- Header Section -->
        <div class="edu-premium-header">

            <div class="edu-header-content">

                <span class="edu-eyebrow">

                    <i class="bi bi-stars"></i>

                    Pusat Pembelajaran Digital

                </span>

                <h2>
                    Konten Edukasi
                </h2>

                <p>
                    Jelajahi video, infografis, dan e-book
                    pilihan untuk mendukung perempuan,
                    anak, dan keluarga yang lebih berkualitas.
                </p>

            </div>

            <div class="edu-header-action">

                <?= Html::a(
                    '<span>Lihat Semua Materi</span>'
                    . '<i class="bi bi-arrow-right"></i>',
                    ['/site/edukasi'],
                    [
                        'class' => 'edu-view-all',
                    ]
                ) ?>

            </div>

        </div>
        <!-- End Header Section -->


        <?php if (!empty($edukasiUtama)): ?>

            <div class="row g-4">

                <?php foreach (
                    $edukasiUtama as $index => $konten
                ): ?>

                    <?php
                    $detailUrl = Url::to([
                        '/site/detail-edukasi',
                        'slug' => $konten->slug,
                    ]);

                    $jenisClass = $getJenisClass(
                        $konten->jenis_konten
                    );
                    ?>

                    <div
                        class="col-xl-4 col-lg-6 col-md-6"
                        data-aos="fade-up"
                        data-aos-delay="<?= (
                            ($index % 3) + 1
                        ) * 100 ?>"
                    >

                        <article
                            class="edu-premium-card <?= Html::encode(
                                $jenisClass
                            ) ?>"
                        >

                            <!-- Media -->
                            <a
                                href="<?= Html::encode(
                                    $detailUrl
                                ) ?>"
                                class="edu-premium-media"
                            >

                                <?= Html::img(
                                    $konten->getThumbnailUrl(),
                                    [
                                        'alt' => $konten->judul,
                                        'loading' => 'lazy',
                                    ]
                                ) ?>

                                <div class="edu-media-overlay"></div>

                                <span class="edu-type-icon">

                                    <i class="bi <?= Html::encode(
                                        $getJenisIcon(
                                            $konten
                                                ->jenis_konten
                                        )
                                    ) ?>"></i>

                                </span>

                                <?php if (
                                    (int) $konten->is_utama === 1
                                ): ?>

                                    <span class="edu-featured-badge">

                                        <i class="bi bi-star-fill"></i>

                                        Pilihan

                                    </span>

                                <?php endif; ?>

                                <?php if (
                                    $konten->jenis_konten === 'video'
                                    && !empty($konten->durasi_video)
                                ): ?>

                                    <span class="edu-duration">

                                        <?= Html::encode(
                                            $konten->durasi_video
                                        ) ?>

                                    </span>

                                <?php endif; ?>

                            </a>
                            <!-- End Media -->


                            <!-- Content -->
                            <div class="edu-premium-body">

                                <div class="edu-premium-meta">

                                    <span
                                        class="edu-type-label <?= Html::encode(
                                            $jenisClass
                                        ) ?>"
                                    >

                                        <i class="bi <?= Html::encode(
                                            $getJenisIcon(
                                                $konten
                                                    ->jenis_konten
                                            )
                                        ) ?>"></i>

                                        <?= Html::encode(
                                            $getJenisLabel(
                                                $konten
                                                    ->jenis_konten
                                            )
                                        ) ?>

                                    </span>

                                    <?php if (
                                        $konten->kategori !== null
                                    ): ?>

                                        <span class="edu-category">

                                            <?= Html::encode(
                                                $konten
                                                    ->kategori
                                                    ->nama_kategori
                                            ) ?>

                                        </span>

                                    <?php endif; ?>

                                </div>

                                <h3>

                                    <?= Html::a(
                                        Html::encode(
                                            StringHelper::truncate(
                                                $konten->judul,
                                                95
                                            )
                                        ),
                                        $detailUrl
                                    ) ?>

                                </h3>

                                <p>

                                    <?= Html::encode(
                                        StringHelper::truncate(
                                            strip_tags(
                                                (string) $konten
                                                    ->ringkasan
                                            ),
                                            135
                                        )
                                    ) ?>

                                </p>

                                <div class="edu-card-footer">

                                    <div class="edu-stats">

                                        <span>

                                            <i class="bi bi-eye"></i>

                                            <?= (int) $konten->hits ?>

                                        </span>

                                        <?php if (
                                            $konten->jenis_konten
                                            !== 'video'
                                        ): ?>

                                            <span>

                                                <i class="bi bi-download"></i>

                                                <?= (int) $konten
                                                    ->jumlah_download ?>

                                            </span>

                                        <?php endif; ?>

                                    </div>

                                    <?= Html::a(
                                        '<span>Pelajari</span>'
                                        . '<i class="bi bi-arrow-right"></i>',
                                        $detailUrl,
                                        [
                                            'class' => 'edu-card-link',
                                        ]
                                    ) ?>

                                </div>

                            </div>
                            <!-- End Content -->

                        </article>

                    </div>

                <?php endforeach; ?>

            </div>


            <!-- Footer CTA -->
            <div
                class="edu-premium-cta"
                data-aos="fade-up"
                data-aos-delay="200"
            >

                <div class="edu-cta-icon">

                    <i class="bi bi-journal-richtext"></i>

                </div>

                <div class="edu-cta-content">

                    <h3>
                        Belajar Lebih Mudah dan Menyenangkan
                    </h3>

                    <p>
                        Temukan berbagai materi edukasi terpercaya
                        yang dapat dibaca, ditonton, dan diunduh
                        kapan saja.
                    </p>

                </div>

                <div class="edu-cta-action">

                    <?= Html::a(
                        'Jelajahi Konten '
                        . '<i class="bi bi-arrow-right"></i>',
                        ['/site/edukasi'],
                        [
                            'class' => 'edu-cta-button',
                        ]
                    ) ?>

                </div>

            </div>

        <?php else: ?>

            <div class="edu-empty-state">

                <div class="edu-empty-icon">

                    <i class="bi bi-journal-x"></i>

                </div>

                <h3>
                    Konten Edukasi Belum Tersedia
                </h3>

                <p>
                    Materi edukasi akan segera ditampilkan
                    pada halaman ini.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>


<style>
/* =========================================================
   KONTEN EDUKASI PREMIUM - HOME
   Background putih + aksen #f8ab3c
========================================================= */

#konten-edukasi-premium {
    position: relative;
    overflow: hidden;
    padding: 82px 0;
    background: #ffffff;
}

#konten-edukasi-premium::before {
    position: absolute;
    top: -210px;
    right: -155px;
    width: 480px;
    height: 480px;
    background: rgba(248, 171, 60, 0.05);
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

#konten-edukasi-premium::after {
    position: absolute;
    bottom: -210px;
    left: -170px;
    width: 430px;
    height: 430px;
    background: rgba(248, 171, 60, 0.035);
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

#konten-edukasi-premium .container {
    position: relative;
    z-index: 2;
}


/* =========================================================
   HEADER SECTION
========================================================= */

.edu-premium-header {
    display: flex;
    margin-bottom: 40px;
    align-items: flex-end;
    justify-content: space-between;
    gap: 30px;
}

.edu-header-content {
    max-width: 700px;
}

.edu-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 13px;
    padding: 7px 13px;
    color: #8a5200;
    background: #fff7eb;
    border: 1px solid rgba(248, 171, 60, 0.3);
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
}

.edu-eyebrow i {
    color: #f8ab3c;
}

.edu-header-content h2 {
    position: relative;
    margin-bottom: 17px;
    padding-bottom: 15px;
    color: #253047;
    font-size: clamp(31px, 4vw, 45px);
    line-height: 1.15;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.edu-header-content h2::after {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 65px;
    height: 4px;
    background: #f8ab3c;
    border-radius: 999px;
    content: "";
}

.edu-header-content p {
    max-width: 680px;
    margin: 0;
    color: #747f91;
    font-size: 15px;
    line-height: 1.75;
}


/* Tombol lihat semua */

.edu-view-all {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 11px 18px;
    color: #855000;
    background: #fff9ef;
    border: 1px solid rgba(248, 171, 60, 0.35);
    border-radius: 999px;
    box-shadow: 0 8px 22px rgba(31, 45, 80, 0.05);
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    transition:
        color 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        transform 0.25s ease;
}

.edu-view-all:hover {
    color: #ffffff;
    background: #f8ab3c;
    border-color: #f8ab3c;
    box-shadow: 0 11px 25px rgba(248, 171, 60, 0.22);
    transform: translateY(-2px);
}


/* =========================================================
   GRID DAN CARD
========================================================= */

#konten-edukasi-premium .row > div {
    display: flex;
}

.edu-premium-card {
    position: relative;
    display: flex;
    width: 100%;
    height: 100%;
    min-width: 0;
    flex-direction: column;
    overflow: hidden;
    background:
        linear-gradient(
            180deg,
            #ffffff 0%,
            #fffefd 100%
        );
    border: 1px solid #e7eaf0;
    border-radius: 21px;
    box-shadow:
        0 9px 28px rgba(31, 45, 80, 0.055),
        0 2px 7px rgba(31, 45, 80, 0.025);
    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}

.edu-premium-card::before {
    position: absolute;
    top: 0;
    left: 25px;
    right: 25px;
    z-index: 5;
    height: 3px;
    background:
        linear-gradient(
            90deg,
            transparent,
            #f8ab3c,
            transparent
        );
    border-radius: 999px;
    content: "";
}

.edu-premium-card:hover {
    border-color: rgba(248, 171, 60, 0.38);
    box-shadow:
        0 19px 45px rgba(31, 45, 80, 0.11),
        0 5px 16px rgba(248, 171, 60, 0.075);
    transform: translateY(-6px);
}


/* =========================================================
   GAMBAR CARD
========================================================= */

.edu-premium-media {
    position: relative;
    display: block;
    flex: 0 0 auto;
    overflow: hidden;
    aspect-ratio: 16 / 9;
    background: #f2f4f8;
}

.edu-premium-media img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition:
        transform 0.65s cubic-bezier(
            0.2,
            0.7,
            0.2,
            1
        ),
        filter 0.35s ease;
}

.edu-premium-card:hover .edu-premium-media img {
    filter: saturate(1.03);
    transform: scale(1.04);
}

.edu-media-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            180deg,
            transparent 46%,
            rgba(14, 24, 49, 0.52) 100%
        );
}


/* Ikon tipe */

.edu-type-icon {
    position: absolute;
    top: 16px;
    left: 16px;
    display: inline-flex;
    width: 45px;
    height: 45px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    border: 2px solid rgba(248, 171, 60, 0.9);
    border-radius: 14px;
    box-shadow: 0 8px 21px rgba(21, 31, 56, 0.16);
    font-size: 20px;
}

.edu-video .edu-type-icon {
    background: #d94a59;
}

.edu-infografis .edu-type-icon {
    background: #f8ab3c;
}

.edu-ebook .edu-type-icon {
    background: #1e56b7;
}


/* Badge pilihan */

.edu-featured-badge {
    position: absolute;
    top: 17px;
    right: 16px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 10px;
    color: #704400;
    background: #f8ab3c;
    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 999px;
    box-shadow: 0 7px 17px rgba(248, 171, 60, 0.22);
    font-size: 10px;
    font-weight: 800;
}


/* Durasi video */

.edu-duration {
    position: absolute;
    right: 14px;
    bottom: 13px;
    padding: 5px 9px;
    color: #ffffff;
    background: rgba(9, 16, 33, 0.82);
    border-radius: 7px;
    font-size: 10px;
    font-weight: 700;
}


/* =========================================================
   BODY CARD
========================================================= */

.edu-premium-body {
    display: flex;
    width: 100%;
    min-width: 0;
    min-height: 275px;
    flex: 1;
    flex-direction: column;
    padding: 22px;
    overflow: hidden;
}

.edu-premium-meta {
    display: flex;
    width: 100%;
    min-width: 0;
    min-height: 29px;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 13px;
}


/* Label jenis */

.edu-type-label {
    display: inline-flex;
    flex: 0 0 auto;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border: 1px solid transparent;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
}

.edu-type-label.edu-video {
    color: #a83b49;
    background: #fff1f3;
    border-color: #f5dadd;
}

.edu-type-label.edu-infografis {
    color: #965a00;
    background: #fff6e6;
    border-color: rgba(248, 171, 60, 0.36);
}

.edu-type-label.edu-ebook {
    color: #174b99;
    background: #eef4ff;
    border-color: #dbe6fa;
}


/* Kategori */

.edu-category {
    display: block;
    min-width: 0;
    max-width: 52%;
    overflow: hidden;
    color: #818b9b;
    font-size: 10px;
    font-weight: 600;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* Judul */

.edu-premium-body h3 {
    display: -webkit-box;
    min-height: 52px;
    max-height: 52px;
    margin-bottom: 11px;
    overflow: hidden;
    color: #273044;
    font-size: 18px;
    line-height: 1.45;
    font-weight: 800;
    overflow-wrap: anywhere;
    word-break: break-word;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

.edu-premium-body h3 a {
    color: #273044;
    text-decoration: none;
    transition: color 0.25s ease;
}

.edu-premium-body h3 a:hover {
    color: #b66d00;
}


/* Ringkasan */

.edu-premium-body p {
    display: -webkit-box;
    min-height: 67px;
    max-height: 67px;
    margin-bottom: 18px;
    overflow: hidden;
    color: #747f91;
    font-size: 13px;
    line-height: 1.72;
    overflow-wrap: anywhere;
    word-break: break-word;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}


/* =========================================================
   FOOTER CARD
========================================================= */

.edu-card-footer {
    display: flex;
    width: 100%;
    min-width: 0;
    margin-top: auto;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-top: 15px;
    border-top: 1px solid rgba(229, 233, 240, 0.9);
}

.edu-stats {
    display: flex;
    min-width: 0;
    flex-wrap: wrap;
    gap: 12px;
}

.edu-stats span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #8993a3;
    font-size: 10px;
}

.edu-stats i {
    color: #f8ab3c;
}


/* Tombol pelajari */

.edu-card-link {
    display: inline-flex;
    flex: 0 0 auto;
    align-items: center;
    gap: 7px;
    padding: 7px 11px;
    color: #895200;
    background: #fff6e8;
    border: 1px solid rgba(248, 171, 60, 0.2);
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
    white-space: nowrap;
    transition:
        color 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease,
        transform 0.25s ease;
}

.edu-card-link:hover {
    color: #ffffff;
    background: #f8ab3c;
    border-color: #f8ab3c;
    transform: translateX(2px);
}


/* =========================================================
   CTA BAWAH
========================================================= */

.edu-premium-cta {
    display: flex;
    margin-top: 42px;
    align-items: center;
    gap: 20px;
    padding: 24px 27px;
    color: #273044;
    background:
        linear-gradient(
            135deg,
            #fff9ef 0%,
            #ffffff 68%
        );
    border: 1px solid rgba(248, 171, 60, 0.3);
    border-radius: 20px;
    box-shadow: 0 13px 35px rgba(31, 45, 80, 0.065);
}

.edu-cta-icon {
    display: inline-flex;
    width: 62px;
    height: 62px;
    flex: 0 0 62px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: #f8ab3c;
    border-radius: 17px;
    box-shadow: 0 9px 22px rgba(248, 171, 60, 0.22);
    font-size: 26px;
}

.edu-cta-content {
    min-width: 0;
    flex: 1;
}

.edu-cta-content h3 {
    margin: 0 0 5px;
    color: #273044;
    font-size: 20px;
    font-weight: 800;
}

.edu-cta-content p {
    margin: 0;
    color: #737e90;
    font-size: 13px;
    line-height: 1.65;
}

.edu-cta-action {
    flex: 0 0 auto;
}

.edu-cta-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 17px;
    color: #ffffff;
    background: #f8ab3c;
    border-radius: 999px;
    box-shadow: 0 8px 20px rgba(248, 171, 60, 0.2);
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
    white-space: nowrap;
    transition:
        background 0.25s ease,
        box-shadow 0.25s ease,
        transform 0.25s ease;
}

.edu-cta-button:hover {
    color: #ffffff;
    background: #e99a26;
    box-shadow: 0 11px 24px rgba(233, 154, 38, 0.24);
    transform: translateY(-2px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.edu-empty-state {
    padding: 55px 20px;
    text-align: center;
    background: #fffaf2;
    border: 1px dashed rgba(248, 171, 60, 0.45);
    border-radius: 20px;
}

.edu-empty-icon {
    display: inline-flex;
    width: 75px;
    height: 75px;
    margin-bottom: 17px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: #f8ab3c;
    border-radius: 50%;
    box-shadow: 0 9px 22px rgba(248, 171, 60, 0.22);
    font-size: 30px;
}

.edu-empty-state h3 {
    margin-bottom: 8px;
    color: #273044;
}

.edu-empty-state p {
    margin: 0;
    color: #758093;
}


/* =========================================================
   RESPONSIVE TABLET
========================================================= */

@media (max-width: 991px) {
    #konten-edukasi-premium {
        padding: 70px 0;
    }

    .edu-premium-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .edu-premium-cta {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .edu-cta-action {
        width: 100%;
        padding-left: 82px;
    }
}


/* =========================================================
   RESPONSIVE MOBILE
========================================================= */

@media (max-width: 767px) {
    #konten-edukasi-premium {
        padding: 58px 0;
    }

    .edu-premium-header {
        margin-bottom: 30px;
        gap: 20px;
    }

    .edu-header-content h2 {
        font-size: 32px;
    }

    .edu-header-action {
        width: 100%;
    }

    .edu-view-all {
        width: 100%;
    }

    .edu-premium-card {
        border-radius: 18px;
    }

    .edu-premium-card:hover {
        transform: none;
    }

    .edu-premium-body {
        min-height: 0;
        padding: 20px;
    }

    .edu-premium-body h3 {
        min-height: auto;
        max-height: none;
    }

    .edu-premium-body p {
        min-height: auto;
        max-height: none;
    }

    .edu-category {
        max-width: 48%;
    }

    .edu-premium-cta {
        padding: 21px 18px;
    }

    .edu-cta-icon {
        width: 52px;
        height: 52px;
        flex-basis: 52px;
        border-radius: 14px;
        font-size: 23px;
    }

    .edu-cta-content h3 {
        font-size: 18px;
    }

    .edu-cta-action {
        padding-left: 0;
    }

    .edu-cta-button {
        width: 100%;
    }
}


/* =========================================================
   LAYAR SANGAT KECIL
========================================================= */

@media (max-width: 420px) {
    .edu-premium-body {
        padding: 18px;
    }

    .edu-premium-meta {
        align-items: flex-start;
        flex-direction: column;
    }

    .edu-category {
        max-width: 100%;
    }

    .edu-card-footer {
        align-items: flex-start;
        flex-direction: column;
    }

    .edu-card-link {
        justify-content: center;
        width: 100%;
    }
}
</style>