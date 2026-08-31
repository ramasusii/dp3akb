<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $berita app\models\BeritaDp3akb */
/* @var $beritaTerbaru app\models\BeritaDp3akb[] */
/* @var $beritaTerkait app\models\BeritaDp3akb[] */
/* @var $kategoriList app\models\KategoriBerita[] */

$this->title = $berita->judul;

/**
 * Format tanggal Indonesia.
 */
$formatTanggal = function ($tanggal) {
    if (empty($tanggal)) {
        return '-';
    }

    $timestamp = strtotime($tanggal);

    if ($timestamp === false) {
        return '-';
    }

    $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    return date('d', $timestamp)
        . ' '
        . $bulan[(int) date('n', $timestamp)]
        . ' '
        . date('Y', $timestamp);
};

/**
 * Nama kategori berita.
 */
$getNamaKategori = function ($itemBerita) {
    if (
        $itemBerita->kategori !== null
        && !empty($itemBerita->kategori->nama_kategori)
    ) {
        return $itemBerita->kategori->nama_kategori;
    }

    return 'Berita';
};

$namaKategori = $getNamaKategori($berita);

/**
 * Estimasi waktu baca.
 */
$jumlahKata = str_word_count(
    strip_tags((string) $berita->isi)
);

$waktuBaca = max(
    1,
    (int) ceil($jumlahKata / 200)
);

/**
 * URL halaman saat ini.
 */
$detailUrl = Url::to([
    'site/detail-berita',
    'slug' => $berita->slug,
], true);

$facebookShareUrl =
    'https://www.facebook.com/sharer/sharer.php?u='
    . rawurlencode($detailUrl);

$whatsappShareUrl =
    'https://wa.me/?text='
    . rawurlencode(
        $berita->judul . ' ' . $detailUrl
    );

$emailShareUrl =
    'mailto:?subject='
    . rawurlencode($berita->judul)
    . '&body='
    . rawurlencode(
        'Baca berita berikut: ' . $detailUrl
    );

/**
 * Isi berita yang telah dibersihkan.
 */
$isiMentah = trim((string) $berita->isi);

/*
 * Jika isi berita berasal dari editor HTML/rich text,
 * pertahankan struktur HTML yang sudah dibuat admin.
 *
 * Jika isi berita berupa teks biasa dari textarea,
 * Enter akan diubah menjadi <br> agar terbaca di website.
 */
if ($isiMentah !== strip_tags($isiMentah)) {
    $isiBerita = HtmlPurifier::process(
        $isiMentah,
        [
            'HTML.Allowed' => '
                p,br,strong,b,em,i,u,
                h1,h2,h3,h4,h5,h6,
                ul,ol,li,
                blockquote,
                a[href|target|rel],
                img[src|alt|title|width|height|class],
                table[class],
                thead,tbody,tr,th,td,
                div[class],
                span[class]
            ',
            'Attr.AllowedFrameTargets' => [
                '_blank',
            ],
        ]
    );
} else {
    $isiBerita = nl2br(
        Html::encode($isiMentah),
        false
    );
}
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">

        <div
            class="container d-lg-flex justify-content-between align-items-center"
        >

            <h1 class="mb-2 mb-lg-0">
                Detail Berita
            </h1>

            <nav class="breadcrumbs">

                <ol>

                    <li>
                        <a href="<?= Yii::$app->homeUrl ?>">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <?= Html::a(
                            'Berita',
                            ['site/daftar-berita']
                        ) ?>
                    </li>

                    <li class="current">
                        Detail Berita
                    </li>

                </ol>

            </nav>

        </div>

    </div>
    <!-- End Page Title -->


    <!-- Blog Details Section -->
    <section
        id="blog-details"
        class="blog-details section"
    >

        <div
            class="container"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <article class="blog-article">

                <!-- Article Header -->
                <div class="row g-4 align-items-center">

                    <div class="col-lg-8">

                        <div
                            class="header-block"
                            data-aos="fade-right"
                        >

                            <div class="category-badges">

                                <?= Html::a(
                                    Html::encode($namaKategori),
                                    [
                                        'site/daftar-berita',
                                        'kategori'
                                            => $berita->kategori_id,
                                    ],
                                    [
                                        'class' => 'badge-link',
                                    ]
                                ) ?>

                                <?php if (
                                    (int) $berita->is_utama === 1
                                ): ?>

                                    <span class="badge-link">
                                        Berita Utama
                                    </span>

                                <?php endif; ?>

                            </div>

                            <h1 class="article-title">

                                <?= Html::encode(
                                    $berita->judul
                                ) ?>

                            </h1>

                            <?php if (
                                !empty(
                                    trim(
                                        (string) $berita->ringkasan
                                    )
                                )
                            ): ?>

                                <p class="article-subtitle">

                                    <?= Html::encode(
                                        $berita->ringkasan
                                    ) ?>

                                </p>

                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div
                            class="author-card"
                            data-aos="fade-left"
                        >

                            <div
                                class="author-avatar d-flex align-items-center justify-content-center"
                            >

                                <i
                                    class="bi bi-building"
                                    style="font-size: 28px;"
                                ></i>

                            </div>

                            <div class="author-details">

                                <h4>
                                    DP3AKB Provsu
                                </h4>

                                <span class="author-role">
                                    Informasi Resmi
                                </span>

                            </div>

                            <div class="publish-details">

                                <span>

                                    <i class="bi bi-calendar3"></i>

                                    <?= Html::encode(
                                        $formatTanggal(
                                            $berita->tanggal_publish
                                        )
                                    ) ?>

                                </span>

                                <span>

                                    <i class="bi bi-stopwatch"></i>

                                    <?= (int) $waktuBaca ?>
                                    menit baca

                                </span>

                                <span>

                                    <i class="bi bi-eye"></i>

                                    <?= number_format(
                                        (int) $berita->hits,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                    dilihat

                                </span>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- End Article Header -->


                <!-- Featured Image -->
                <div
                    class="featured-banner"
                    data-aos="zoom-in"
                    data-aos-delay="150"
                >

                    <?= Html::img(
                        $berita->getImageUrl(),
                        [
                            'alt' => $berita->judul,
                            'class' => 'img-fluid',
                            'loading' => 'eager',
                            'style' => [
                                'width' => '100%',
                                'aspect-ratio' => '1080 / 636',
                                'object-fit' => 'cover',
                            ],
                        ]
                    ) ?>

                    <div class="banner-caption">

                        <i class="bi bi-camera"></i>

                        Dokumentasi berita DP3AKB
                        Provinsi Sumatera Utara

                    </div>

                </div>
                <!-- End Featured Image -->


                <!-- Content Area -->
                <div class="row g-5">

                    <!-- Main Content -->
                    <div class="col-lg-8">

                        <div class="main-content">

                            <div
                                id="isi-berita"
                                class="premium-article-block"
                                data-aos="fade-up"
                            >

                                <!-- Ringkasan -->
                                <?php if (
                                    !empty(
                                        trim(
                                            (string) $berita
                                                ->ringkasan
                                        )
                                    )
                                ): ?>

                                    <div class="premium-summary">

                                        <div
                                            class="premium-summary-icon"
                                        >

                                            <i class="bi bi-quote"></i>

                                        </div>

                                        <div
                                            class="premium-summary-content"
                                        >


                                            <p>

                                                <?= Html::encode(
                                                    $berita
                                                        ->ringkasan
                                                ) ?>

                                            </p>

                                        </div>

                                    </div>

                                <?php endif; ?>
                                <!-- End Ringkasan -->


                                <!-- Pembatas -->
                                <div
                                    class="premium-article-divider"
                                >

                                    <span></span>

                                    <div
                                        class="premium-divider-icon"
                                    >

                                        <i
                                            class="bi bi-newspaper"
                                        ></i>

                                    </div>

                                    <span></span>

                                </div>
                                <!-- End Pembatas -->


                                <!-- Isi Berita -->
                                <div
                                    class="berita-content premium-article-content"
                                >

                                    <?= $isiBerita ?>

                                </div>
                                <!-- End Isi Berita -->


                                <!-- Akhir Berita -->
                                <div
                                    class="premium-article-finish"
                                >

                                    <span></span>

                                    <small>
                                        Akhir Berita
                                    </small>

                                    <span></span>

                                </div>
                                <!-- End Akhir Berita -->

                            </div>

                        </div>

                    </div>
                    <!-- End Main Content -->


                    <!-- Sidebar -->
                    <div class="col-lg-4">

                        <aside class="article-sidebar">

                            <!-- Berita Terbaru -->
                            <div
                                class="sidebar-widget toc-widget"
                                data-aos="fade-left"
                                data-aos-delay="100"
                            >

                                <h3>

                                    <i
                                        class="bi bi-clock-history"
                                    ></i>

                                    Berita Terbaru

                                </h3>

                                <?php if (
                                    !empty($beritaTerbaru)
                                ): ?>

                                    <nav>

                                        <ol>

                                            <?php foreach (
                                                $beritaTerbaru
                                                as $itemTerbaru
                                            ): ?>

                                                <li>

                                                    <?= Html::a(
                                                        Html::encode(
                                                            $itemTerbaru
                                                                ->judul
                                                        ),
                                                        [
                                                            'site/detail-berita',
                                                            'slug'
                                                                => $itemTerbaru
                                                                    ->slug,
                                                        ]
                                                    ) ?>

                                                    <small
                                                        class="d-block text-muted mt-1"
                                                    >

                                                        <?= Html::encode(
                                                            $formatTanggal(
                                                                $itemTerbaru
                                                                    ->tanggal_publish
                                                            )
                                                        ) ?>

                                                    </small>

                                                </li>

                                            <?php endforeach; ?>

                                        </ol>

                                    </nav>

                                <?php else: ?>

                                    <p class="text-muted mb-0">
                                        Belum ada berita terbaru.
                                    </p>

                                <?php endif; ?>

                            </div>
                            <!-- End Berita Terbaru -->


                            <!-- Kategori -->
                            <div
                                class="sidebar-widget categories-widget"
                                data-aos="fade-left"
                                data-aos-delay="200"
                            >

                                <h3>

                                    <i class="bi bi-bookmark"></i>

                                    Kategori Berita

                                </h3>

                                <div class="category-list">

                                    <?= Html::a(
                                        'Semua Berita',
                                        ['site/daftar-berita'],
                                        [
                                            'class' => 'cat-item',
                                        ]
                                    ) ?>

                                    <?php foreach (
                                        $kategoriList
                                        as $kategori
                                    ): ?>

                                        <?= Html::a(
                                            Html::encode(
                                                $kategori
                                                    ->nama_kategori
                                            ),
                                            [
                                                'site/daftar-berita',
                                                'kategori'
                                                    => $kategori->id,
                                            ],
                                            [
                                                'class' => 'cat-item',
                                            ]
                                        ) ?>

                                    <?php endforeach; ?>

                                </div>

                            </div>
                            <!-- End Kategori -->


                            <!-- Share -->
                            <div
                                class="sidebar-widget share-widget"
                                data-aos="fade-left"
                                data-aos-delay="300"
                            >

                                <h3>

                                    <i class="bi bi-share"></i>

                                    Bagikan Berita

                                </h3>

                                <div class="social-icons">

                                    <a
                                        href="<?= Html::encode(
                                            $facebookShareUrl
                                        ) ?>"
                                        class="social-btn s-facebook"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="Bagikan ke Facebook"
                                    >

                                        <i class="bi bi-facebook"></i>

                                    </a>

                                    <a
                                        href="<?= Html::encode(
                                            $whatsappShareUrl
                                        ) ?>"
                                        class="social-btn"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="Bagikan ke WhatsApp"
                                    >

                                        <i class="bi bi-whatsapp"></i>

                                    </a>

                                    <a
                                        href="<?= Html::encode(
                                            $emailShareUrl
                                        ) ?>"
                                        class="social-btn s-envelope"
                                        aria-label="Bagikan melalui email"
                                    >

                                        <i class="bi bi-envelope"></i>

                                    </a>

                                    <button
                                        type="button"
                                        class="social-btn"
                                        id="copy-berita-link"
                                        aria-label="Salin tautan berita"
                                        style="border: 0;"
                                    >

                                        <i
                                            class="bi bi-link-45deg"
                                        ></i>

                                    </button>

                                </div>

                                <small
                                    id="copy-link-message"
                                    class="text-success d-block mt-2"
                                    style="display: none !important;"
                                >
                                    Tautan berhasil disalin.
                                </small>

                            </div>
                            <!-- End Share -->

                        </aside>

                    </div>
                    <!-- End Sidebar -->

                </div>
                <!-- End Content Area -->


                <!-- Berita Terkait -->
                <?php if (!empty($beritaTerkait)): ?>

                    <section
                        class="related-news-section"
                        data-aos="fade-up"
                    >

                        <div class="related-news-header">

                            <div class="related-news-heading">

                                <span class="related-news-label">
                                    Rekomendasi Pilihan
                                </span>

                                <h2>
                                    Berita Terkait
                                </h2>

                                <p>
                                    Informasi lain yang mungkin
                                    menarik untuk Anda baca.
                                </p>

                            </div>

                            <?= Html::a(
                                'Lihat Semua Berita '
                                . '<i class="bi bi-arrow-right"></i>',
                                ['site/daftar-berita'],
                                [
                                    'class' => 'related-news-all',
                                ]
                            ) ?>

                        </div>

                        <div class="row g-4">

                            <?php foreach (
                                $beritaTerkait
                                as $itemTerkait
                            ): ?>

                                <?php
                                $kategoriTerkait =
                                    $getNamaKategori(
                                        $itemTerkait
                                    );

                                $ringkasanTerkait =
                                    !empty(
                                        trim(
                                            (string) $itemTerkait
                                                ->ringkasan
                                        )
                                    )
                                        ? $itemTerkait
                                            ->ringkasan
                                        : strip_tags(
                                            (string) $itemTerkait
                                                ->isi
                                        );

                                $ringkasanTerkait =
                                    StringHelper::truncateWords(
                                        trim(
                                            preg_replace(
                                                '/\s+/',
                                                ' ',
                                                strip_tags(
                                                    $ringkasanTerkait
                                                )
                                            )
                                        ),
                                        18,
                                        '...'
                                    );
                                ?>

                                <div
                                    class="col-md-6 col-lg-3 d-flex"
                                >

                                    <article
                                        class="related-news-card"
                                    >

                                        <div
                                            class="related-news-image"
                                        >

                                            <?= Html::a(
                                                Html::img(
                                                    $itemTerkait
                                                        ->getImageUrl(),
                                                    [
                                                        'alt'
                                                            => $itemTerkait
                                                                ->judul,
                                                        'loading'
                                                            => 'lazy',
                                                    ]
                                                ),
                                                [
                                                    'site/detail-berita',
                                                    'slug'
                                                        => $itemTerkait
                                                            ->slug,
                                                ],
                                                [
                                                    'class'
                                                        => 'related-news-image-link',
                                                ]
                                            ) ?>

                                            <div
                                                class="related-news-overlay"
                                            ></div>

                                            <?= Html::a(
                                                Html::encode(
                                                    $kategoriTerkait
                                                ),
                                                [
                                                    'site/daftar-berita',
                                                    'kategori'
                                                        => $itemTerkait
                                                            ->kategori_id,
                                                ],
                                                [
                                                    'class'
                                                        => 'related-news-category',
                                                ]
                                            ) ?>

                                            <div
                                                class="related-news-date-badge"
                                            >

                                                <i
                                                    class="bi bi-calendar3"
                                                ></i>

                                                <?= Html::encode(
                                                    $formatTanggal(
                                                        $itemTerkait
                                                            ->tanggal_publish
                                                    )
                                                ) ?>

                                            </div>

                                        </div>

                                        <div
                                            class="related-news-body"
                                        >

                                            <div
                                                class="related-news-meta"
                                            >

                                                <span>

                                                    <i
                                                        class="bi bi-eye"
                                                    ></i>

                                                    <?= number_format(
                                                        (int) $itemTerkait
                                                            ->hits,
                                                        0,
                                                        ',',
                                                        '.'
                                                    ) ?>

                                                    dilihat

                                                </span>

                                                <?php if (
                                                    (int) $itemTerkait
                                                        ->is_utama === 1
                                                ): ?>

                                                    <span
                                                        class="related-featured"
                                                    >

                                                        <i
                                                            class="bi bi-star-fill"
                                                        ></i>

                                                        Utama

                                                    </span>

                                                <?php endif; ?>

                                            </div>

                                            <h3
                                                class="related-news-title"
                                            >

                                                <?= Html::a(
                                                    Html::encode(
                                                        $itemTerkait
                                                            ->judul
                                                    ),
                                                    [
                                                        'site/detail-berita',
                                                        'slug'
                                                            => $itemTerkait
                                                                ->slug,
                                                    ]
                                                ) ?>

                                            </h3>

                                            <p
                                                class="related-news-summary"
                                            >

                                                <?= Html::encode(
                                                    $ringkasanTerkait
                                                ) ?>

                                            </p>

                                            <div
                                                class="related-news-footer"
                                            >

                                                <?= Html::a(
                                                    'Baca Berita '
                                                    . '<i class="bi bi-arrow-up-right"></i>',
                                                    [
                                                        'site/detail-berita',
                                                        'slug'
                                                            => $itemTerkait
                                                                ->slug,
                                                    ],
                                                    [
                                                        'class'
                                                            => 'related-news-link',
                                                    ]
                                                ) ?>

                                            </div>

                                        </div>

                                    </article>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </section>

                <?php endif; ?>
                <!-- End Berita Terkait -->


                <!-- Article Footer -->
                <div
                    class="bottom-bar"
                    data-aos="fade-up"
                >

                    <div class="row align-items-center">

                        <div class="col-md-7">

                            <div class="tag-cloud">

                                <span class="tag-label">
                                    Kategori:
                                </span>

                                <?= Html::a(
                                    Html::encode($namaKategori),
                                    [
                                        'site/daftar-berita',
                                        'kategori'
                                            => $berita->kategori_id,
                                    ],
                                    [
                                        'class' => 'topic-tag',
                                    ]
                                ) ?>

                                <?php if (
                                    (int) $berita->is_utama === 1
                                ): ?>

                                    <span class="topic-tag">
                                        Berita Utama
                                    </span>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="col-md-5 text-md-end">

                            <div class="reading-actions">

                                <a
                                    href="javascript:void(0)"
                                    class="action-link"
                                    onclick="window.print();"
                                >

                                    <i class="bi bi-printer"></i>

                                    Cetak Berita

                                </a>

                                <?= Html::a(
                                    '<i class="bi bi-arrow-left"></i> '
                                    . 'Kembali ke Berita',
                                    ['site/daftar-berita'],
                                    [
                                        'class' => 'action-link',
                                    ]
                                ) ?>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- End Article Footer -->

            </article>

        </div>

    </section>
    <!-- End Blog Details Section -->

</main>


<style>
/* =========================================================
   RINGKASAN DAN ISI BERITA PREMIUM
========================================================= */

#blog-details.blog-details .premium-article-block {
    position: relative !important;
    padding: 38px 40px !important;
    background: #ffffff !important;
    border: 1px solid #e4e9f2 !important;
    border-radius: 22px !important;
    box-shadow:
        0 18px 55px rgba(15, 30, 70, 0.08),
        0 3px 10px rgba(15, 30, 70, 0.03) !important;
}

#blog-details.blog-details .premium-summary {
    position: relative !important;
    display: flex !important;
    align-items: flex-start !important;
    gap: 20px !important;
    margin: 0 0 38px !important;
    padding: 28px 30px !important;
    overflow: hidden !important;
    background:
        radial-gradient(
            circle at top right,
            rgba(7, 37, 133, 0.14),
            transparent 42%
        ),
        linear-gradient(
            135deg,
            #f1f5ff 0%,
            #ffffff 100%
        ) !important;
    border: 1px solid #d8e2f8 !important;
    border-radius: 18px !important;
    box-shadow:
        0 12px 30px rgba(7, 37, 133, 0.08) !important;
}

#blog-details.blog-details .premium-summary::after {
    position: absolute !important;
    top: -55px !important;
    right: -55px !important;
    width: 150px !important;
    height: 150px !important;
    background: rgba(7, 37, 133, 0.05) !important;
    border-radius: 50% !important;
    content: "" !important;
}

#blog-details.blog-details .premium-summary-icon {
    position: relative !important;
    z-index: 2 !important;
    display: flex !important;
    flex: 0 0 55px !important;
    width: 55px !important;
    height: 55px !important;
    align-items: center !important;
    justify-content: center !important;
    color: #ffffff !important;
    background: linear-gradient(
        135deg,
        #072585,
        #194bc4
    ) !important;
    border-radius: 16px !important;
    box-shadow:
        0 10px 25px rgba(7, 37, 133, 0.25) !important;
    font-size: 26px !important;
}

#blog-details.blog-details .premium-summary-content {
    position: relative !important;
    z-index: 2 !important;
}

#blog-details.blog-details .premium-summary-label {
    display: block !important;
    margin-bottom: 8px !important;
    color: #072585 !important;
    font-size: 12px !important;
    font-weight: 800 !important;
    letter-spacing: 1.2px !important;
    text-transform: uppercase !important;
}

#blog-details.blog-details
.premium-summary-content p {
    margin: 0 !important;
    color: #354052 !important;
    font-size: 18px !important;
    font-weight: 500 !important;
    line-height: 1.85 !important;
    text-align: left !important;
}

#blog-details.blog-details .premium-article-divider {
    display: flex !important;
    align-items: center !important;
    gap: 14px !important;
    margin: 0 0 36px !important;
}

#blog-details.blog-details
.premium-article-divider > span {
    height: 1px !important;
    flex: 1 !important;
    background: linear-gradient(
        90deg,
        transparent,
        #d7deec
    ) !important;
}

#blog-details.blog-details
.premium-article-divider > span:last-child {
    background: linear-gradient(
        90deg,
        #d7deec,
        transparent
    ) !important;
}

#blog-details.blog-details .premium-divider-icon {
    display: flex !important;
    width: 44px !important;
    height: 44px !important;
    align-items: center !important;
    justify-content: center !important;
    color: #072585 !important;
    background: #edf2ff !important;
    border: 1px solid #d9e3f9 !important;
    border-radius: 50% !important;
    font-size: 18px !important;
}


/* Isi artikel */

#blog-details.blog-details .premium-article-content {
    color: #3b4557 !important;
    font-size: 17px !important;
    line-height: 1.95 !important;
    letter-spacing: 0.01em !important;
}

#blog-details.blog-details
.premium-article-content > *:first-child {
    margin-top: 0 !important;
}

#blog-details.blog-details
.premium-article-content > *:last-child {
    margin-bottom: 0 !important;
}

#blog-details.blog-details
.premium-article-content p {
    margin: 0 0 27px !important;
    color: #3b4557 !important;
    font-size: 17px !important;
    font-weight: 400 !important;
    line-height: 1.95 !important;
    text-align: justify !important;
    text-justify: inter-word !important;
    overflow-wrap: break-word !important;
    hyphens: auto !important;
}

/* Teks biasa dari textarea yang memakai Enter */
#blog-details.blog-details
.premium-article-content {
    text-align: justify !important;
    text-justify: inter-word !important;
    overflow-wrap: break-word !important;
}

#blog-details.blog-details
.premium-article-content p:first-child::first-letter {
    float: left !important;
    margin: 8px 11px 0 0 !important;
    color: #072585 !important;
    font-family: Georgia, serif !important;
    font-size: 60px !important;
    font-weight: 700 !important;
    line-height: 0.78 !important;
}

#blog-details.blog-details
.premium-article-content h1,
#blog-details.blog-details
.premium-article-content h2,
#blog-details.blog-details
.premium-article-content h3,
#blog-details.blog-details
.premium-article-content h4,
#blog-details.blog-details
.premium-article-content h5,
#blog-details.blog-details
.premium-article-content h6 {
    margin: 42px 0 18px !important;
    color: #182033 !important;
    font-weight: 750 !important;
    line-height: 1.35 !important;
}

#blog-details.blog-details
.premium-article-content h2 {
    position: relative !important;
    padding: 14px 18px 14px 23px !important;
    background: linear-gradient(
        90deg,
        #eef3ff,
        rgba(238, 243, 255, 0)
    ) !important;
    border-left: 5px solid #072585 !important;
    border-radius: 0 12px 12px 0 !important;
    font-size: 27px !important;
}

#blog-details.blog-details
.premium-article-content h3 {
    position: relative !important;
    padding-bottom: 11px !important;
    font-size: 23px !important;
}

#blog-details.blog-details
.premium-article-content h3::after {
    position: absolute !important;
    bottom: 0 !important;
    left: 0 !important;
    width: 58px !important;
    height: 3px !important;
    background: #072585 !important;
    border-radius: 10px !important;
    content: "" !important;
}

#blog-details.blog-details
.premium-article-content strong,
#blog-details.blog-details
.premium-article-content b {
    color: #1e2738 !important;
    font-weight: 750 !important;
}

#blog-details.blog-details
.premium-article-content ul,
#blog-details.blog-details
.premium-article-content ol {
    margin: 8px 0 30px !important;
    padding: 23px 26px 19px 49px !important;
    background: #f7f9fe !important;
    border: 1px solid #e2e8f3 !important;
    border-radius: 15px !important;
    box-shadow:
        0 7px 20px rgba(25, 39, 75, 0.04) !important;
}

#blog-details.blog-details
.premium-article-content li {
    margin-bottom: 12px !important;
    padding-left: 5px !important;
    color: #3d4759 !important;
    line-height: 1.8 !important;
}

#blog-details.blog-details
.premium-article-content li:last-child {
    margin-bottom: 0 !important;
}

#blog-details.blog-details
.premium-article-content li::marker {
    color: #072585 !important;
    font-weight: 800 !important;
}

#blog-details.blog-details
.premium-article-content blockquote {
    position: relative !important;
    margin: 38px 0 !important;
    padding: 30px 32px 30px 74px !important;
    color: #303a4d !important;
    background: linear-gradient(
        135deg,
        #f5f8ff,
        #ffffff
    ) !important;
    border: 1px solid #dce4f4 !important;
    border-left: 0 !important;
    border-radius: 17px !important;
    box-shadow:
        0 13px 30px rgba(20, 35, 75, 0.08) !important;
    font-family: Georgia, serif !important;
    font-size: 19px !important;
    font-style: italic !important;
    line-height: 1.8 !important;
}

#blog-details.blog-details
.premium-article-content blockquote::before {
    position: absolute !important;
    top: 22px !important;
    left: 24px !important;
    color: #072585 !important;
    font-family: Georgia, serif !important;
    font-size: 56px !important;
    font-weight: 700 !important;
    line-height: 1 !important;
    content: "“" !important;
}

#blog-details.blog-details
.premium-article-content a {
    color: #072585 !important;
    font-weight: 700 !important;
    text-decoration: underline !important;
    text-decoration-color:
        rgba(7, 37, 133, 0.35) !important;
    text-decoration-thickness: 2px !important;
    text-underline-offset: 4px !important;
}

#blog-details.blog-details
.premium-article-content a:hover {
    color: #051a5c !important;
}

#blog-details.blog-details
.premium-article-content img {
    display: block !important;
    width: auto !important;
    max-width: 100% !important;
    height: auto !important;
    margin: 38px auto !important;
    padding: 6px !important;
    background: #ffffff !important;
    border: 1px solid #e0e6ef !important;
    border-radius: 18px !important;
    box-shadow:
        0 16px 42px rgba(18, 32, 68, 0.13) !important;
}

#blog-details.blog-details
.premium-article-content table {
    display: table !important;
    width: 100% !important;
    margin: 35px 0 !important;
    overflow: hidden !important;
    background: #ffffff !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    border: 1px solid #dce3ed !important;
    border-radius: 14px !important;
    box-shadow:
        0 10px 28px rgba(21, 34, 66, 0.08) !important;
}

#blog-details.blog-details
.premium-article-content th {
    padding: 15px 17px !important;
    color: #ffffff !important;
    background: linear-gradient(
        135deg,
        #072585,
        #1749be
    ) !important;
    border: 0 !important;
    font-weight: 700 !important;
}

#blog-details.blog-details
.premium-article-content td {
    padding: 14px 17px !important;
    color: #40495a !important;
    border: 0 !important;
    border-bottom: 1px solid #e5e8ef !important;
}

#blog-details.blog-details
.premium-article-content tr:last-child td {
    border-bottom: 0 !important;
}

#blog-details.blog-details
.premium-article-content tr:nth-child(even) td {
    background: #f8faff !important;
}

#blog-details.blog-details .premium-article-finish {
    display: flex !important;
    align-items: center !important;
    gap: 15px !important;
    margin-top: 48px !important;
}

#blog-details.blog-details
.premium-article-finish span {
    height: 1px !important;
    flex: 1 !important;
    background: #dce2ec !important;
}

#blog-details.blog-details
.premium-article-finish small {
    color: #929aa9 !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    letter-spacing: 1.1px !important;
    text-transform: uppercase !important;
}


/* =========================================================
   BERITA TERKAIT PREMIUM
========================================================= */

#blog-details.blog-details .related-news-section {
    position: relative !important;
    margin-top: 80px !important;
    padding: 48px 42px !important;
    overflow: hidden !important;
    background:
        radial-gradient(
            circle at top right,
            rgba(7, 37, 133, 0.1),
            transparent 34%
        ),
        linear-gradient(
            135deg,
            #f6f9ff 0%,
            #ffffff 65%
        ) !important;
    border: 1px solid #dfe6f2 !important;
    border-radius: 25px !important;
    box-shadow:
        0 20px 55px rgba(18, 33, 72, 0.08) !important;
}

#blog-details.blog-details
.related-news-section::before {
    position: absolute !important;
    top: -90px !important;
    right: -90px !important;
    width: 240px !important;
    height: 240px !important;
    background: rgba(7, 37, 133, 0.045) !important;
    border-radius: 50% !important;
    content: "" !important;
}

#blog-details.blog-details .related-news-header {
    position: relative !important;
    z-index: 2 !important;
    display: flex !important;
    align-items: flex-end !important;
    justify-content: space-between !important;
    gap: 25px !important;
    margin-bottom: 34px !important;
}

#blog-details.blog-details .related-news-label {
    display: inline-flex !important;
    margin-bottom: 8px !important;
    color: #072585 !important;
    font-size: 11px !important;
    font-weight: 800 !important;
    letter-spacing: 1.4px !important;
    text-transform: uppercase !important;
}

#blog-details.blog-details
.related-news-heading h2 {
    margin: 0 0 7px !important;
    color: #182033 !important;
    font-size: 33px !important;
    font-weight: 780 !important;
    line-height: 1.2 !important;
}

#blog-details.blog-details
.related-news-heading p {
    margin: 0 !important;
    color: #747e90 !important;
    font-size: 14px !important;
}

#blog-details.blog-details .related-news-all {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    padding: 11px 17px !important;
    color: #072585 !important;
    background: #ffffff !important;
    border: 1px solid #d9e2f3 !important;
    border-radius: 999px !important;
    box-shadow:
        0 8px 20px rgba(7, 37, 133, 0.08) !important;
    font-size: 13px !important;
    font-weight: 750 !important;
    text-decoration: none !important;
}

#blog-details.blog-details
.related-news-all:hover {
    color: #ffffff !important;
    background: #072585 !important;
}

#blog-details.blog-details .related-news-card {
    position: relative !important;
    display: flex !important;
    width: 100% !important;
    height: 100% !important;
    flex-direction: column !important;
    overflow: hidden !important;
    background: #ffffff !important;
    border: 1px solid #dee4ee !important;
    border-radius: 19px !important;
    box-shadow:
        0 12px 32px rgba(23, 36, 68, 0.09),
        0 2px 7px rgba(23, 36, 68, 0.03) !important;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease !important;
}

#blog-details.blog-details
.related-news-card:hover {
    transform: translateY(-8px) !important;
    box-shadow:
        0 23px 48px rgba(23, 36, 68, 0.16),
        0 5px 12px rgba(23, 36, 68, 0.05) !important;
}

#blog-details.blog-details .related-news-image {
    position: relative !important;
    overflow: hidden !important;
    background: #e9edf5 !important;
}

#blog-details.blog-details
.related-news-image-link {
    display: block !important;
}

#blog-details.blog-details
.related-news-image img {
    display: block !important;
    width: 100% !important;
    height: 190px !important;
    object-fit: cover !important;
    transition:
        transform 0.45s ease,
        filter 0.45s ease !important;
}

#blog-details.blog-details
.related-news-card:hover
.related-news-image img {
    filter: brightness(0.9) !important;
    transform: scale(1.07) !important;
}

#blog-details.blog-details
.related-news-overlay {
    position: absolute !important;
    inset: 0 !important;
    pointer-events: none !important;
    background: linear-gradient(
        180deg,
        transparent 38%,
        rgba(10, 20, 45, 0.72) 100%
    ) !important;
}

#blog-details.blog-details
.related-news-category {
    position: absolute !important;
    top: 14px !important;
    left: 14px !important;
    z-index: 3 !important;
    max-width: calc(100% - 28px) !important;
    padding: 7px 12px !important;
    overflow: hidden !important;
    color: #ffffff !important;
    background: rgba(7, 37, 133, 0.95) !important;
    border: 1px solid rgba(255, 255, 255, 0.22) !important;
    border-radius: 999px !important;
    backdrop-filter: blur(8px) !important;
    font-size: 10px !important;
    font-weight: 800 !important;
    letter-spacing: 0.4px !important;
    text-decoration: none !important;
    text-overflow: ellipsis !important;
    text-transform: uppercase !important;
    white-space: nowrap !important;
}

#blog-details.blog-details
.related-news-date-badge {
    position: absolute !important;
    right: 13px !important;
    bottom: 12px !important;
    z-index: 3 !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 6px !important;
    padding: 7px 10px !important;
    color: #ffffff !important;
    background: rgba(15, 24, 45, 0.76) !important;
    border-radius: 9px !important;
    backdrop-filter: blur(8px) !important;
    font-size: 10px !important;
    font-weight: 600 !important;
}

#blog-details.blog-details .related-news-body {
    display: flex !important;
    flex: 1 !important;
    flex-direction: column !important;
    padding: 20px !important;
}

#blog-details.blog-details .related-news-meta {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 10px !important;
    margin-bottom: 12px !important;
    color: #7d8798 !important;
    font-size: 11px !important;
}

#blog-details.blog-details
.related-news-meta span {
    display: inline-flex !important;
    align-items: center !important;
    gap: 5px !important;
}

#blog-details.blog-details
.related-news-meta i {
    color: #072585 !important;
}

#blog-details.blog-details .related-featured {
    padding: 4px 8px !important;
    color: #876100 !important;
    background: #fff3c5 !important;
    border-radius: 999px !important;
    font-weight: 700 !important;
}

#blog-details.blog-details .related-news-title {
    margin: 0 0 12px !important;
    font-size: 18px !important;
    font-weight: 750 !important;
    line-height: 1.45 !important;
}

#blog-details.blog-details
.related-news-title a {
    display: -webkit-box !important;
    overflow: hidden !important;
    color: #20283a !important;
    text-decoration: none !important;
    -webkit-box-orient: vertical !important;
    -webkit-line-clamp: 3 !important;
}

#blog-details.blog-details
.related-news-title a:hover {
    color: #072585 !important;
}

#blog-details.blog-details
.related-news-summary {
    display: -webkit-box !important;
    overflow: hidden !important;
    margin: 0 0 18px !important;
    color: #687284 !important;
    font-size: 13px !important;
    line-height: 1.72 !important;
    -webkit-box-orient: vertical !important;
    -webkit-line-clamp: 3 !important;
}

#blog-details.blog-details
.related-news-footer {
    margin-top: auto !important;
    padding-top: 15px !important;
    border-top: 1px solid #edf0f5 !important;
}

#blog-details.blog-details
.related-news-link {
    display: inline-flex !important;
    align-items: center !important;
    gap: 7px !important;
    color: #072585 !important;
    font-size: 13px !important;
    font-weight: 800 !important;
    text-decoration: none !important;
}

#blog-details.blog-details
.related-news-link i {
    transition: transform 0.25s ease !important;
}

#blog-details.blog-details
.related-news-link:hover i {
    transform: translate(3px, -3px) !important;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {
    #blog-details.blog-details
    .related-news-section {
        padding: 38px 28px !important;
    }
}

@media (max-width: 767px) {
    #blog-details.blog-details
    .premium-article-block {
        padding: 24px 20px !important;
        border-radius: 17px !important;
    }

    #blog-details.blog-details
    .premium-summary {
        gap: 14px !important;
        padding: 22px 20px !important;
    }

    #blog-details.blog-details
    .premium-summary-icon {
        flex-basis: 46px !important;
        width: 46px !important;
        height: 46px !important;
        font-size: 20px !important;
    }

    #blog-details.blog-details
    .premium-summary-content p {
        font-size: 16px !important;
    }

    #blog-details.blog-details
    .premium-article-content {
        font-size: 16px !important;
    }

    #blog-details.blog-details
    .premium-article-content p {
        font-size: 16px !important;
        line-height: 1.85 !important;
    }

    #blog-details.blog-details
    .premium-article-content
    p:first-child::first-letter {
        font-size: 48px !important;
    }

    #blog-details.blog-details
    .premium-article-content h2 {
        font-size: 23px !important;
    }

    #blog-details.blog-details
    .premium-article-content h3 {
        font-size: 21px !important;
    }

    #blog-details.blog-details
    .related-news-section {
        margin-top: 55px !important;
        padding: 30px 20px !important;
        border-radius: 19px !important;
    }

    #blog-details.blog-details
    .related-news-header {
        align-items: flex-start !important;
        flex-direction: column !important;
    }

    #blog-details.blog-details
    .related-news-heading h2 {
        font-size: 27px !important;
    }

    #blog-details.blog-details
    .related-news-image img {
        height: 220px !important;
    }
}
</style>


<?php

$detailUrlJs = json_encode($detailUrl);

$this->registerJs(<<<JS
(function () {
    var copyButton = document.getElementById(
        'copy-berita-link'
    );

    var copyMessage = document.getElementById(
        'copy-link-message'
    );

    if (!copyButton) {
        return;
    }

    copyButton.addEventListener('click', function () {
        var url = {$detailUrlJs};

        if (
            navigator.clipboard
            && navigator.clipboard.writeText
        ) {
            navigator.clipboard
                .writeText(url)
                .then(function () {
                    showCopyMessage();
                });

            return;
        }

        var temporaryInput = document.createElement(
            'textarea'
        );

        temporaryInput.value = url;
        temporaryInput.style.position = 'fixed';
        temporaryInput.style.opacity = '0';

        document.body.appendChild(
            temporaryInput
        );

        temporaryInput.select();

        document.execCommand('copy');

        document.body.removeChild(
            temporaryInput
        );

        showCopyMessage();
    });

    function showCopyMessage() {
        if (!copyMessage) {
            return;
        }

        copyMessage.style.setProperty(
            'display',
            'block',
            'important'
        );

        setTimeout(function () {
            copyMessage.style.setProperty(
                'display',
                'none',
                'important'
            );
        }, 2500);
    }
})();
JS);
?>