<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $kontenList app\models\KontenEdukasi[] */
/* @var $kontenUnggulan app\models\KontenEdukasi|null */
/* @var $kategoriList app\models\KategoriEdukasi[] */
/* @var $pagination yii\data\Pagination */
/* @var $keyword string */
/* @var $jenisKonten string */
/* @var $kategoriId int|string */
/* @var $jumlahVideo int */
/* @var $jumlahInfografis int */
/* @var $jumlahEbook int */

$this->title = 'Konten Edukasi';

$getDetailUrl = function ($model) {
    return Url::to([
        '/site/detail-edukasi',
        'slug' => $model->slug,
    ]);
};

$getJenisLabel = function ($jenis) {
    if ($jenis === 'video') {
        return 'Video';
    }

    if ($jenis === 'infografis') {
        return 'Infografis';
    }

    if ($jenis === 'ebook') {
        return 'E-Book';
    }

    return 'Edukasi';
};

$getJenisIcon = function ($jenis) {
    if ($jenis === 'video') {
        return 'bi-play-circle-fill';
    }

    if ($jenis === 'infografis') {
        return 'bi-file-earmark-image-fill';
    }

    if ($jenis === 'ebook') {
        return 'bi-book-half';
    }

    return 'bi-lightbulb-fill';
};

$getJenisClass = function ($jenis) {
    if ($jenis === 'video') {
        return 'jenis-video';
    }

    if ($jenis === 'infografis') {
        return 'jenis-infografis';
    }

    if ($jenis === 'ebook') {
        return 'jenis-ebook';
    }

    return 'jenis-edukasi';
};

$getTanggal = function ($tanggal) {
    if (empty($tanggal)) {
        return '-';
    }

    $timestamp = strtotime($tanggal);

    if ($timestamp === false) {
        return '-';
    }

    return date('d-m-Y', $timestamp);
};

$totalKonten = (int) $pagination->totalCount;
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">

        <div
            class="container d-lg-flex justify-content-between align-items-center"
        >

            <div>

                <h1 class="mb-2 mb-lg-0">
                    Konten Edukasi
                </h1>

                <p class="edukasi-page-subtitle mb-0">
                    Akses video, infografis, dan e-book edukatif
                    untuk perempuan, anak, dan keluarga.
                </p>

            </div>

            <nav class="breadcrumbs">

                <ol>

                    <li>
                        <a href="<?= Yii::$app->homeUrl ?>">
                            Beranda
                        </a>
                    </li>

                    <li class="current">
                        Konten Edukasi
                    </li>

                </ol>

            </nav>

        </div>

    </div>
    <!-- End Page Title -->


    <!-- Hero Edukasi -->
    <?php if ($kontenUnggulan !== null): ?>

        <section
            id="edukasi-hero"
            class="edukasi-hero section"
        >

            <div
                class="container"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <div class="edukasi-featured">

                    <div class="row align-items-center g-0">

                        <div class="col-lg-6">

                            <div class="edukasi-featured-content">

                                <span class="featured-eyebrow">

                                    <i class="bi bi-stars"></i>

                                    Konten Pilihan

                                </span>

                                <div class="featured-meta">

                                    <span
                                        class="jenis-badge <?= Html::encode(
                                            $getJenisClass(
                                                $kontenUnggulan
                                                    ->jenis_konten
                                            )
                                        ) ?>"
                                    >

                                        <i class="bi <?= Html::encode(
                                            $getJenisIcon(
                                                $kontenUnggulan
                                                    ->jenis_konten
                                            )
                                        ) ?>"></i>

                                        <?= Html::encode(
                                            $getJenisLabel(
                                                $kontenUnggulan
                                                    ->jenis_konten
                                            )
                                        ) ?>

                                    </span>

                                    <?php if (
                                        $kontenUnggulan->kategori !== null
                                    ): ?>

                                        <span class="featured-category">

                                            <?= Html::encode(
                                                $kontenUnggulan
                                                    ->kategori
                                                    ->nama_kategori
                                            ) ?>

                                        </span>

                                    <?php endif; ?>

                                </div>

                                <h2>
                                    <?= Html::encode(
                                        $kontenUnggulan->judul
                                    ) ?>
                                </h2>

                                <p>

                                    <?= Html::encode(
                                        StringHelper::truncate(
                                            strip_tags(
                                                (string) $kontenUnggulan
                                                    ->ringkasan
                                            ),
                                            220
                                        )
                                    ) ?>

                                </p>

                                <div class="featured-info">

                                    <span>

                                        <i class="bi bi-calendar3"></i>

                                        <?= Html::encode(
                                            $getTanggal(
                                                $kontenUnggulan
                                                    ->tanggal_publish
                                            )
                                        ) ?>

                                    </span>

                                    <span>

                                        <i class="bi bi-eye"></i>

                                        <?= (int) $kontenUnggulan->hits ?>
                                        kali dilihat

                                    </span>

                                    <?php if (
                                        $kontenUnggulan
                                            ->jenis_konten !== 'video'
                                    ): ?>

                                        <span>

                                            <i class="bi bi-download"></i>

                                            <?= (int) $kontenUnggulan
                                                ->jumlah_download ?>
                                            unduhan

                                        </span>

                                    <?php endif; ?>

                                </div>

                                <?= Html::a(
                                    '<span>Pelajari Sekarang</span>'
                                    . '<i class="bi bi-arrow-right"></i>',
                                    $getDetailUrl(
                                        $kontenUnggulan
                                    ),
                                    [
                                        'class'
                                            => 'btn-edukasi-featured',
                                    ]
                                ) ?>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <a
                                href="<?= Html::encode(
                                    $getDetailUrl(
                                        $kontenUnggulan
                                    )
                                ) ?>"
                                class="featured-image-wrapper"
                            >

                                <?= Html::img(
                                    $kontenUnggulan
                                        ->getThumbnailUrl(),
                                    [
                                        'class'
                                            => 'featured-image',
                                        'alt'
                                            => $kontenUnggulan
                                                ->judul,
                                        'loading'
                                            => 'eager',
                                    ]
                                ) ?>

                                <div class="featured-image-overlay"></div>

                                <div class="featured-action-icon">

                                    <i class="bi <?= Html::encode(
                                        $getJenisIcon(
                                            $kontenUnggulan
                                                ->jenis_konten
                                        )
                                    ) ?>"></i>

                                </div>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>
    <!-- End Hero Edukasi -->


    <!-- Statistik -->
    <section class="edukasi-stat-section">

        <div class="container">

            <div class="row g-3">

                <div class="col-lg-4 col-md-4">

                    <a
                        href="<?= Url::to([
                            '/site/edukasi',
                            'jenis' => 'video',
                        ]) ?>"
                        class="edukasi-stat-card stat-video"
                    >

                        <span class="stat-icon">

                            <i class="bi bi-play-circle-fill"></i>

                        </span>

                        <span class="stat-content">

                            <strong>
                                <?= (int) $jumlahVideo ?>
                            </strong>

                            <small>
                                Video Edukasi
                            </small>

                        </span>

                        <i class="bi bi-arrow-up-right stat-arrow"></i>

                    </a>

                </div>

                <div class="col-lg-4 col-md-4">

                    <a
                        href="<?= Url::to([
                            '/site/edukasi',
                            'jenis' => 'infografis',
                        ]) ?>"
                        class="edukasi-stat-card stat-infografis"
                    >

                        <span class="stat-icon">

                            <i class="bi bi-file-earmark-image-fill"></i>

                        </span>

                        <span class="stat-content">

                            <strong>
                                <?= (int) $jumlahInfografis ?>
                            </strong>

                            <small>
                                Infografis
                            </small>

                        </span>

                        <i class="bi bi-arrow-up-right stat-arrow"></i>

                    </a>

                </div>

                <div class="col-lg-4 col-md-4">

                    <a
                        href="<?= Url::to([
                            '/site/edukasi',
                            'jenis' => 'ebook',
                        ]) ?>"
                        class="edukasi-stat-card stat-ebook"
                    >

                        <span class="stat-icon">

                            <i class="bi bi-book-half"></i>

                        </span>

                        <span class="stat-content">

                            <strong>
                                <?= (int) $jumlahEbook ?>
                            </strong>

                            <small>
                                E-Book
                            </small>

                        </span>

                        <i class="bi bi-arrow-up-right stat-arrow"></i>

                    </a>

                </div>

            </div>

        </div>

    </section>
    <!-- End Statistik -->


    <!-- Daftar Edukasi -->
    <section
        id="daftar-edukasi"
        class="daftar-edukasi section"
    >

        <div
            class="container"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <div class="section-title">

                <h2>
                    Jelajahi Materi Edukasi
                </h2>

                <p>
                    Temukan materi berdasarkan jenis konten,
                    kategori, atau kata kunci yang dibutuhkan.
                </p>

            </div>


            <!-- Filter Form -->
            <div class="edukasi-filter-panel">

                <?= Html::beginForm(
                    ['/site/edukasi'],
                    'get',
                    [
                        'class' => 'edukasi-filter-form',
                    ]
                ) ?>

                <div class="row g-3 align-items-end">

                    <div class="col-lg-5">

                        <label class="filter-label">
                            Cari Materi
                        </label>

                        <div class="edukasi-search-box">

                            <i class="bi bi-search"></i>

                            <?= Html::textInput(
                                'q',
                                $keyword,
                                [
                                    'class'
                                        => 'form-control',
                                    'placeholder'
                                        => 'Cari judul, materi, atau penulis...',
                                    'autocomplete'
                                        => 'off',
                                ]
                            ) ?>

                            <?php if ($keyword !== ''): ?>

                                <a
                                    href="<?= Url::to(
                                        array_filter([
                                            '/site/edukasi',
                                            'jenis'
                                                => $jenisKonten,
                                            'kategori'
                                                => $kategoriId,
                                        ])
                                    ) ?>"
                                    class="search-clear"
                                    title="Hapus kata kunci"
                                >

                                    <i class="bi bi-x-lg"></i>

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <label class="filter-label">
                            Jenis Konten
                        </label>

                        <?= Html::dropDownList(
                            'jenis',
                            $jenisKonten,
                            [
                                '' => 'Semua Jenis',
                                'video' => 'Video',
                                'infografis' => 'Infografis',
                                'ebook' => 'E-Book',
                            ],
                            [
                                'class'
                                    => 'form-select edukasi-select',
                            ]
                        ) ?>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <label class="filter-label">
                            Kategori
                        </label>

                        <?php
                        $kategoriOptions = [
                            '' => 'Semua Kategori',
                        ];

                        foreach ($kategoriList as $kategori) {
                            $kategoriOptions[
                                $kategori->id
                            ] = $kategori->nama_kategori;
                        }
                        ?>

                        <?= Html::dropDownList(
                            'kategori',
                            $kategoriId,
                            $kategoriOptions,
                            [
                                'class'
                                    => 'form-select edukasi-select',
                            ]
                        ) ?>

                    </div>

                    <div class="col-lg-1">

                        <?= Html::submitButton(
                            '<i class="bi bi-search"></i>',
                            [
                                'class'
                                    => 'btn-edukasi-search',
                                'title'
                                    => 'Cari',
                                'aria-label'
                                    => 'Cari konten edukasi',
                            ]
                        ) ?>

                    </div>

                </div>

                <?= Html::endForm() ?>

            </div>
            <!-- End Filter Form -->


            <!-- Filter Cepat -->
            <div class="edukasi-quick-filter">

                <span class="quick-filter-label">
                    Pilih jenis:
                </span>

                <?= Html::a(
                    'Semua',
                    ['/site/edukasi'],
                    [
                        'class' => 'quick-filter-item '
                            . (
                                $jenisKonten === ''
                                && $kategoriId === ''
                                && $keyword === ''
                                    ? 'active'
                                    : ''
                            ),
                    ]
                ) ?>

                <?= Html::a(
                    '<i class="bi bi-play-circle"></i> Video',
                    [
                        '/site/edukasi',
                        'jenis' => 'video',
                    ],
                    [
                        'class' => 'quick-filter-item '
                            . (
                                $jenisKonten === 'video'
                                    ? 'active'
                                    : ''
                            ),
                    ]
                ) ?>

                <?= Html::a(
                    '<i class="bi bi-image"></i> Infografis',
                    [
                        '/site/edukasi',
                        'jenis' => 'infografis',
                    ],
                    [
                        'class' => 'quick-filter-item '
                            . (
                                $jenisKonten === 'infografis'
                                    ? 'active'
                                    : ''
                            ),
                    ]
                ) ?>

                <?= Html::a(
                    '<i class="bi bi-book"></i> E-Book',
                    [
                        '/site/edukasi',
                        'jenis' => 'ebook',
                    ],
                    [
                        'class' => 'quick-filter-item '
                            . (
                                $jenisKonten === 'ebook'
                                    ? 'active'
                                    : ''
                            ),
                    ]
                ) ?>

            </div>
            <!-- End Filter Cepat -->


            <!-- Result Info -->
            <div
                class="edukasi-result-info d-flex flex-wrap justify-content-between align-items-center gap-2"
            >

                <p class="mb-0">

                    Menampilkan

                    <strong>
                        <?= count($kontenList) ?>
                    </strong>

                    dari

                    <strong>
                        <?= $totalKonten ?>
                    </strong>

                    konten edukasi.

                </p>

                <?php if (
                    $keyword !== ''
                    || $jenisKonten !== ''
                    || $kategoriId !== ''
                ): ?>

                    <?= Html::a(
                        '<i class="bi bi-arrow-counterclockwise"></i>'
                        . ' Reset Filter',
                        ['/site/edukasi'],
                        [
                            'class'
                                => 'edukasi-reset-filter',
                        ]
                    ) ?>

                <?php endif; ?>

            </div>


            <!-- Cards -->
            <?php if (!empty($kontenList)): ?>

                <div class="row g-4 edukasi-grid">

                    <?php foreach (
                        $kontenList as $index => $konten
                    ): ?>

                        <?php
                        $detailUrl = $getDetailUrl($konten);
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

                            <?php if (
                                $konten->jenis_konten === 'ebook'
                            ): ?>

                                <!-- Card E-Book -->
                                <article class="edukasi-card ebook-card">

                                    <div class="ebook-visual">

                                        <div class="ebook-shadow-layer"></div>

                                        <a
                                            href="<?= Html::encode(
                                                $detailUrl
                                            ) ?>"
                                            class="ebook-cover"
                                        >

                                            <?= Html::img(
                                                $konten
                                                    ->getThumbnailUrl(),
                                                [
                                                    'alt'
                                                        => $konten
                                                            ->judul,
                                                    'loading'
                                                        => 'lazy',
                                                ]
                                            ) ?>

                                            <div class="ebook-cover-shine"></div>

                                        </a>

                                        <span class="ebook-file-badge">

                                            <i class="bi bi-file-earmark-pdf-fill"></i>

                                            PDF

                                        </span>

                                    </div>

                                    <div class="edukasi-card-body">

                                        <div class="edukasi-card-meta">

                                            <span class="jenis-badge jenis-ebook">

                                                <i class="bi bi-book-half"></i>

                                                E-Book

                                            </span>

                                            <?php if (
                                                (int) $konten
                                                    ->is_utama === 1
                                            ): ?>

                                                <span class="utama-badge">

                                                    <i class="bi bi-star-fill"></i>

                                                    Pilihan

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <h3 class="edukasi-card-title">

                                            <?= Html::a(
                                                Html::encode(
                                                    $konten->judul
                                                ),
                                                $detailUrl
                                            ) ?>

                                        </h3>

                                        <p class="edukasi-card-summary">

                                            <?= Html::encode(
                                                StringHelper::truncate(
                                                    strip_tags(
                                                        (string) $konten
                                                            ->ringkasan
                                                    ),
                                                    125
                                                )
                                            ) ?>

                                        </p>

                                        <div class="ebook-detail-list">

                                            <?php if (
                                                !empty(
                                                    $konten
                                                        ->jumlah_halaman
                                                )
                                            ): ?>

                                                <span>

                                                    <i class="bi bi-files"></i>

                                                    <?= (int) $konten
                                                        ->jumlah_halaman ?>
                                                    halaman

                                                </span>

                                            <?php endif; ?>

                                            <?php if (
                                                !empty(
                                                    $konten
                                                        ->tahun_terbit
                                                )
                                            ): ?>

                                                <span>

                                                    <i class="bi bi-calendar3"></i>

                                                    <?= (int) $konten
                                                        ->tahun_terbit ?>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="edukasi-card-footer">

                                            <span class="edukasi-category">

                                                <i class="bi bi-folder2-open"></i>

                                                <?= $konten->kategori !== null
                                                    ? Html::encode(
                                                        $konten
                                                            ->kategori
                                                            ->nama_kategori
                                                    )
                                                    : 'Edukasi' ?>

                                            </span>

                                            <?= Html::a(
                                                'Lihat Buku '
                                                . '<i class="bi bi-arrow-right"></i>',
                                                $detailUrl,
                                                [
                                                    'class'
                                                        => 'card-detail-link',
                                                ]
                                            ) ?>

                                        </div>

                                    </div>

                                </article>
                                <!-- End Card E-Book -->

                            <?php else: ?>

                                <!-- Card Video/Infografis -->
                                <article class="edukasi-card">

                                    <a
                                        href="<?= Html::encode(
                                            $detailUrl
                                        ) ?>"
                                        class="edukasi-card-image"
                                    >

                                        <?= Html::img(
                                            $konten
                                                ->getThumbnailUrl(),
                                            [
                                                'alt'
                                                    => $konten->judul,
                                                'loading'
                                                    => 'lazy',
                                            ]
                                        ) ?>

                                        <div class="card-image-overlay"></div>

                                        <span
                                            class="card-media-icon <?= Html::encode(
                                                $jenisClass
                                            ) ?>"
                                        >

                                            <i class="bi <?= Html::encode(
                                                $getJenisIcon(
                                                    $konten
                                                        ->jenis_konten
                                                )
                                            ) ?>"></i>

                                        </span>

                                        <?php if (
                                            $konten->jenis_konten
                                            === 'video'
                                            && !empty(
                                                $konten
                                                    ->durasi_video
                                            )
                                        ): ?>

                                            <span class="video-duration">

                                                <?= Html::encode(
                                                    $konten
                                                        ->durasi_video
                                                ) ?>

                                            </span>

                                        <?php endif; ?>

                                    </a>

                                    <div class="edukasi-card-body">

                                        <div class="edukasi-card-meta">

                                            <span
                                                class="jenis-badge <?= Html::encode(
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
                                                (int) $konten
                                                    ->is_utama === 1
                                            ): ?>

                                                <span class="utama-badge">

                                                    <i class="bi bi-star-fill"></i>

                                                    Pilihan

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <h3 class="edukasi-card-title">

                                            <?= Html::a(
                                                Html::encode(
                                                    $konten->judul
                                                ),
                                                $detailUrl
                                            ) ?>

                                        </h3>

                                        <p class="edukasi-card-summary">

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

                                        <div class="edukasi-card-footer">

                                            <span class="edukasi-category">

                                                <i class="bi bi-folder2-open"></i>

                                                <?= $konten->kategori !== null
                                                    ? Html::encode(
                                                        $konten
                                                            ->kategori
                                                            ->nama_kategori
                                                    )
                                                    : 'Edukasi' ?>

                                            </span>

                                            <?= Html::a(
                                                'Lihat '
                                                . '<i class="bi bi-arrow-right"></i>',
                                                $detailUrl,
                                                [
                                                    'class'
                                                        => 'card-detail-link',
                                                ]
                                            ) ?>

                                        </div>

                                    </div>

                                </article>
                                <!-- End Card -->

                            <?php endif; ?>

                        </div>

                    <?php endforeach; ?>

                </div>


                <!-- Pagination -->
                <?php if ($pagination->pageCount > 1): ?>

                    <div class="edukasi-pagination">

                        <?= LinkPager::widget([
                            'pagination' => $pagination,
                            'options' => [
                                'class'
                                    => 'pagination justify-content-center',
                            ],
                            'linkContainerOptions' => [
                                'class' => 'page-item',
                            ],
                            'linkOptions' => [
                                'class' => 'page-link',
                            ],
                            'disabledListItemSubTagOptions' => [
                                'class' => 'page-link',
                            ],
                            'prevPageLabel'
                                => '<i class="bi bi-chevron-left"></i>',
                            'nextPageLabel'
                                => '<i class="bi bi-chevron-right"></i>',
                            'firstPageLabel'
                                => '<i class="bi bi-chevron-double-left"></i>',
                            'lastPageLabel'
                                => '<i class="bi bi-chevron-double-right"></i>',
                        ]) ?>

                    </div>

                <?php endif; ?>

            <?php else: ?>

                <div class="edukasi-empty-result">

                    <div class="empty-icon">

                        <i class="bi bi-search"></i>

                    </div>

                    <h3>
                        Konten Tidak Ditemukan
                    </h3>

                    <p>
                        Belum ada konten edukasi yang sesuai
                        dengan kata kunci atau filter yang dipilih.
                    </p>

                    <?= Html::a(
                        '<i class="bi bi-arrow-counterclockwise"></i>'
                        . ' Tampilkan Semua Konten',
                        ['/site/edukasi'],
                        [
                            'class'
                                => 'btn btn-primary rounded-pill px-4',
                        ]
                    ) ?>

                </div>

            <?php endif; ?>

        </div>

    </section>
    <!-- End Daftar Edukasi -->

</main>


<style>
/* =========================================================
   EDUKASI FRONTEND
========================================================= */

:root {
    --edukasi-primary: #072585;
    --edukasi-secondary: #1e56b7;
    --edukasi-accent: #12a7a7;
    --edukasi-yellow: #f4b942;
    --edukasi-text: #273044;
    --edukasi-muted: #6d7789;
    --edukasi-border: #e3e8f0;
    --edukasi-soft: #f6f8fc;
}

.edukasi-page-subtitle {
    color: #728096;
    font-size: 14px;
}


/* Hero */

.edukasi-hero {
    padding: 55px 0 30px;
}

.edukasi-featured {
    overflow: hidden;
    background:
        linear-gradient(
            135deg,
            #061e70 0%,
            #0a358f 48%,
            #0d65aa 100%
        );
    border-radius: 26px;
    box-shadow:
        0 26px 65px rgba(7, 37, 133, 0.22);
}

.edukasi-featured-content {
    padding: 55px;
    color: #ffffff;
}

.featured-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 18px;
    padding: 8px 15px;
    color: #ffffff;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
}

.featured-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
    margin-bottom: 17px;
}

.featured-category {
    color: rgba(255, 255, 255, 0.78);
    font-size: 13px;
    font-weight: 600;
}

.edukasi-featured-content h2 {
    margin-bottom: 18px;
    color: #ffffff;
    font-size: clamp(29px, 3.2vw, 47px);
    line-height: 1.16;
    font-weight: 800;
}

.edukasi-featured-content p {
    margin-bottom: 22px;
    color: rgba(255, 255, 255, 0.81);
    font-size: 16px;
    line-height: 1.75;
}

.featured-info {
    display: flex;
    flex-wrap: wrap;
    gap: 17px;
    margin-bottom: 27px;
}

.featured-info span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: rgba(255, 255, 255, 0.78);
    font-size: 13px;
}

.btn-edukasi-featured {
    display: inline-flex;
    align-items: center;
    gap: 13px;
    padding: 13px 21px;
    color: var(--edukasi-primary);
    background: #ffffff;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 800;
    text-decoration: none;
    transition: all 0.25s ease;
}

.btn-edukasi-featured:hover {
    color: #ffffff;
    background: var(--edukasi-yellow);
    transform: translateY(-2px);
}

.featured-image-wrapper {
    position: relative;
    display: block;
    min-height: 460px;
    overflow: hidden;
}

.featured-image {
    width: 100%;
    height: 100%;
    min-height: 460px;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.featured-image-wrapper:hover .featured-image {
    transform: scale(1.04);
}

.featured-image-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            90deg,
            rgba(7, 37, 133, 0.45),
            transparent 48%
        );
}

.featured-action-icon {
    position: absolute;
    right: 28px;
    bottom: 28px;
    display: inline-flex;
    width: 68px;
    height: 68px;
    align-items: center;
    justify-content: center;
    color: var(--edukasi-primary);
    background: rgba(255, 255, 255, 0.94);
    border-radius: 50%;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18);
    font-size: 28px;
}


/* Statistik */

.edukasi-stat-section {
    padding: 0 0 25px;
}

.edukasi-stat-card {
    display: flex;
    min-height: 105px;
    align-items: center;
    gap: 15px;
    padding: 19px 21px;
    color: var(--edukasi-text);
    background: #ffffff;
    border: 1px solid var(--edukasi-border);
    border-radius: 17px;
    box-shadow: 0 10px 32px rgba(31, 45, 80, 0.07);
    text-decoration: none;
    transition: all 0.25s ease;
}

.edukasi-stat-card:hover {
    color: var(--edukasi-text);
    border-color: rgba(7, 37, 133, 0.25);
    box-shadow: 0 17px 42px rgba(31, 45, 80, 0.13);
    transform: translateY(-4px);
}

.edukasi-stat-card .stat-icon {
    display: inline-flex;
    width: 55px;
    height: 55px;
    flex: 0 0 55px;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    font-size: 25px;
}

.stat-video .stat-icon {
    color: #dc3545;
    background: rgba(220, 53, 69, 0.1);
}

.stat-infografis .stat-icon {
    color: #e39214;
    background: rgba(244, 185, 66, 0.15);
}

.stat-ebook .stat-icon {
    color: var(--edukasi-primary);
    background: rgba(7, 37, 133, 0.1);
}

.stat-content {
    display: flex;
    flex: 1;
    flex-direction: column;
}

.stat-content strong {
    color: var(--edukasi-primary);
    font-size: 25px;
    line-height: 1;
}

.stat-content small {
    margin-top: 7px;
    color: var(--edukasi-muted);
    font-size: 13px;
    font-weight: 600;
}

.stat-arrow {
    color: #a6aebb;
}


/* Filter */

.daftar-edukasi {
    padding-top: 55px;
}

.edukasi-filter-panel {
    margin-bottom: 19px;
    padding: 22px;
    background: #ffffff;
    border: 1px solid var(--edukasi-border);
    border-radius: 18px;
    box-shadow: 0 10px 34px rgba(27, 39, 69, 0.07);
}

.filter-label {
    display: block;
    margin-bottom: 8px;
    color: var(--edukasi-text);
    font-size: 13px;
    font-weight: 800;
}

.edukasi-search-box {
    position: relative;
}

.edukasi-search-box > i {
    position: absolute;
    top: 50%;
    left: 16px;
    z-index: 2;
    color: #8b95a5;
    transform: translateY(-50%);
}

.edukasi-search-box .form-control {
    min-height: 49px;
    padding: 11px 45px 11px 45px;
    border: 1px solid #dfe5ee;
    border-radius: 12px;
}

.edukasi-search-box .form-control:focus,
.edukasi-select:focus {
    border-color: var(--edukasi-primary);
    box-shadow: 0 0 0 4px rgba(7, 37, 133, 0.09);
}

.search-clear {
    position: absolute;
    top: 50%;
    right: 12px;
    display: inline-flex;
    width: 28px;
    height: 28px;
    align-items: center;
    justify-content: center;
    color: #768093;
    background: #eff2f6;
    border-radius: 50%;
    transform: translateY(-50%);
}

.edukasi-select {
    min-height: 49px;
    border: 1px solid #dfe5ee;
    border-radius: 12px;
}

.btn-edukasi-search {
    display: inline-flex;
    width: 100%;
    min-height: 49px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: var(--edukasi-primary);
    border: 0;
    border-radius: 12px;
    box-shadow: 0 9px 22px rgba(7, 37, 133, 0.2);
    font-size: 18px;
}

.btn-edukasi-search:hover {
    background: var(--edukasi-secondary);
}

.edukasi-quick-filter {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 9px;
    margin-bottom: 19px;
}

.quick-filter-label {
    margin-right: 4px;
    color: var(--edukasi-muted);
    font-size: 13px;
    font-weight: 700;
}

.quick-filter-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    color: #5f6878;
    background: #f3f5f9;
    border: 1px solid #e0e5ee;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.22s ease;
}

.quick-filter-item:hover,
.quick-filter-item.active {
    color: #ffffff;
    background: var(--edukasi-primary);
    border-color: var(--edukasi-primary);
    box-shadow: 0 7px 18px rgba(7, 37, 133, 0.18);
}

.edukasi-result-info {
    margin-bottom: 23px;
    padding: 13px 17px;
    color: #687286;
    background: #f7f9fd;
    border: 1px solid #e4e9f2;
    border-radius: 12px;
    font-size: 13px;
}

.edukasi-result-info strong {
    color: var(--edukasi-primary);
}

.edukasi-reset-filter {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--edukasi-primary);
    font-weight: 700;
    text-decoration: none;
}


/* Card umum */

.edukasi-card {
    height: 100%;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid var(--edukasi-border);
    border-radius: 19px;
    box-shadow: 0 11px 35px rgba(31, 45, 80, 0.075);
    transition: all 0.28s ease;
}

.edukasi-card:hover {
    border-color: rgba(7, 37, 133, 0.2);
    box-shadow: 0 20px 48px rgba(31, 45, 80, 0.14);
    transform: translateY(-7px);
}

.edukasi-card-image {
    position: relative;
    display: block;
    overflow: hidden;
    aspect-ratio: 16 / 9;
    background: #eef1f6;
}

.edukasi-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.55s ease;
}

.edukasi-card:hover .edukasi-card-image img {
    transform: scale(1.055);
}

.card-image-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            180deg,
            transparent 50%,
            rgba(4, 16, 55, 0.55) 100%
        );
}

.card-media-icon {
    position: absolute;
    top: 15px;
    left: 15px;
    display: inline-flex;
    width: 43px;
    height: 43px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    border-radius: 13px;
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.16);
    font-size: 19px;
}

.card-media-icon.jenis-video {
    background: #d9384c;
}

.card-media-icon.jenis-infografis {
    background: #e79819;
}

.video-duration {
    position: absolute;
    right: 13px;
    bottom: 13px;
    padding: 5px 9px;
    color: #ffffff;
    background: rgba(15, 20, 32, 0.83);
    border-radius: 7px;
    font-size: 11px;
    font-weight: 700;
}

.edukasi-card-body {
    display: flex;
    height: calc(100% - 210px);
    min-height: 250px;
    flex-direction: column;
    padding: 21px;
}

.edukasi-card-meta {
    display: flex;
    min-height: 27px;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 7px;
    margin-bottom: 12px;
}

.jenis-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
}

.jenis-badge.jenis-video {
    color: #b92036;
    background: rgba(220, 53, 69, 0.11);
}

.jenis-badge.jenis-infografis {
    color: #b66d00;
    background: rgba(244, 185, 66, 0.18);
}

.jenis-badge.jenis-ebook {
    color: var(--edukasi-primary);
    background: rgba(7, 37, 133, 0.1);
}

.utama-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #d18300;
    font-size: 11px;
    font-weight: 800;
}

.edukasi-card-title {
    margin-bottom: 11px;
    font-size: 18px;
    line-height: 1.42;
    font-weight: 800;
}

.edukasi-card-title a {
    color: var(--edukasi-text);
    text-decoration: none;
}

.edukasi-card-title a:hover {
    color: var(--edukasi-primary);
}

.edukasi-card-summary {
    margin-bottom: 18px;
    color: var(--edukasi-muted);
    font-size: 13px;
    line-height: 1.72;
}

.edukasi-card-footer {
    display: flex;
    margin-top: auto;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding-top: 15px;
    border-top: 1px solid #edf0f5;
}

.edukasi-category {
    display: inline-flex;
    min-width: 0;
    align-items: center;
    gap: 6px;
    color: #7a8494;
    font-size: 11px;
}

.edukasi-category i {
    color: var(--edukasi-primary);
}

.card-detail-link {
    display: inline-flex;
    flex: 0 0 auto;
    align-items: center;
    gap: 6px;
    color: var(--edukasi-primary);
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
}


/* Kartu E-Book */

.ebook-card {
    overflow: visible;
    padding-top: 25px;
}

.ebook-visual {
    position: relative;
    display: flex;
    height: 245px;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background:
        radial-gradient(
            circle at center,
            #f1f5ff 0%,
            #e8eef9 60%,
            #e2e9f5 100%
        );
}

.ebook-shadow-layer {
    position: absolute;
    bottom: 17px;
    width: 165px;
    height: 26px;
    background: rgba(20, 35, 75, 0.23);
    border-radius: 50%;
    filter: blur(10px);
}

.ebook-cover {
    position: relative;
    z-index: 2;
    display: block;
    width: 145px;
    height: 205px;
    overflow: hidden;
    background: #ffffff;
    border-radius: 4px 9px 9px 4px;
    box-shadow:
        -8px 8px 0 #d1d9e9,
        0 18px 38px rgba(19, 32, 72, 0.3);
    transform:
        perspective(900px)
        rotateY(-7deg)
        rotateZ(-1deg);
    transition: all 0.3s ease;
}

.ebook-cover::before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 7px;
    z-index: 3;
    width: 4px;
    background: rgba(0, 0, 0, 0.13);
    content: "";
}

.ebook-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.ebook-card:hover .ebook-cover {
    transform:
        perspective(900px)
        rotateY(0deg)
        rotateZ(0deg)
        translateY(-7px);
}

.ebook-cover-shine {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            115deg,
            rgba(255, 255, 255, 0.24),
            transparent 38%
        );
}

.ebook-file-badge {
    position: absolute;
    right: 17px;
    bottom: 15px;
    z-index: 4;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 9px;
    color: #ffffff;
    background: #dc3545;
    border-radius: 7px;
    box-shadow: 0 7px 18px rgba(220, 53, 69, 0.22);
    font-size: 10px;
    font-weight: 800;
}

.ebook-detail-list {
    display: flex;
    flex-wrap: wrap;
    gap: 13px;
    margin-bottom: 16px;
}

.ebook-detail-list span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #737e90;
    font-size: 11px;
}

.ebook-detail-list i {
    color: var(--edukasi-primary);
}


/* Empty & Pagination */

.edukasi-empty-result {
    padding: 55px 20px;
    text-align: center;
    background: #f8faff;
    border: 1px dashed #ccd6e6;
    border-radius: 20px;
}

.edukasi-empty-result .empty-icon {
    display: inline-flex;
    width: 78px;
    height: 78px;
    margin-bottom: 18px;
    align-items: center;
    justify-content: center;
    color: var(--edukasi-primary);
    background: #e9efff;
    border-radius: 50%;
    font-size: 31px;
}

.edukasi-empty-result h3 {
    margin-bottom: 9px;
    color: var(--edukasi-text);
}

.edukasi-empty-result p {
    max-width: 520px;
    margin: 0 auto 20px;
    color: var(--edukasi-muted);
}

.edukasi-pagination {
    margin-top: 45px;
}

.edukasi-pagination .pagination {
    gap: 6px;
}

.edukasi-pagination .page-link {
    display: inline-flex;
    min-width: 42px;
    height: 42px;
    align-items: center;
    justify-content: center;
    color: var(--edukasi-primary);
    background: #ffffff;
    border: 1px solid #e0e6ef;
    border-radius: 10px !important;
    font-weight: 700;
}

.edukasi-pagination .active .page-link {
    color: #ffffff;
    background: var(--edukasi-primary);
    border-color: var(--edukasi-primary);
}


/* Responsive */

@media (max-width: 991px) {
    .edukasi-featured-content {
        padding: 38px 31px;
    }

    .featured-image-wrapper,
    .featured-image {
        min-height: 370px;
    }

    .featured-image-overlay {
        background:
            linear-gradient(
                180deg,
                rgba(7, 37, 133, 0.16),
                transparent
            );
    }
}

@media (max-width: 767px) {
    .edukasi-hero {
        padding-top: 28px;
    }

    .edukasi-featured {
        border-radius: 19px;
    }

    .edukasi-featured-content {
        padding: 29px 23px;
    }

    .featured-image-wrapper,
    .featured-image {
        min-height: 260px;
    }

    .featured-info {
        gap: 10px 14px;
    }

    .edukasi-stat-card {
        min-height: 88px;
    }

    .edukasi-filter-panel {
        padding: 17px;
    }

    .btn-edukasi-search {
        min-height: 47px;
    }

    .quick-filter-label {
        width: 100%;
    }

    .edukasi-card-body {
        min-height: auto;
    }

    .ebook-visual {
        height: 265px;
    }
}

/* =========================================================
   FIX CARD EDUKASI AGAR RAPI DAN SAMA TINGGI
========================================================= */

.edukasi-grid > div {
    display: flex;
}

.edukasi-grid .edukasi-card {
    display: flex;
    width: 100%;
    height: 100%;
    min-width: 0;
    flex-direction: column;
    overflow: hidden;
}

.edukasi-grid .edukasi-card-body {
    display: flex;
    width: 100%;
    height: auto;
    min-width: 0;
    min-height: 285px;
    flex: 1;
    flex-direction: column;
    overflow: hidden;
}

.edukasi-card-title {
    display: -webkit-box;
    min-height: 51px;
    max-height: 51px;
    overflow: hidden;
    line-height: 1.42;
    overflow-wrap: anywhere;
    word-break: break-word;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

.edukasi-card-title a {
    display: block;
    overflow-wrap: anywhere;
    word-break: break-word;
}

.edukasi-card-summary {
    display: -webkit-box;
    min-height: 67px;
    max-height: 67px;
    overflow: hidden;
    line-height: 1.7;
    overflow-wrap: anywhere;
    word-break: break-word;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

.edukasi-card-meta {
    width: 100%;
    min-width: 0;
}

.edukasi-card-footer {
    width: 100%;
    min-width: 0;
    margin-top: auto;
}

.edukasi-category {
    display: flex;
    min-width: 0;
    max-width: 65%;
}

.edukasi-category {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.edukasi-category i {
    flex: 0 0 auto;
}

.card-detail-link {
    flex: 0 0 auto;
    white-space: nowrap;
}

.ebook-card {
    padding-top: 0;
    overflow: hidden;
}

.ebook-card .edukasi-card-body {
    min-height: 310px;
}

.ebook-detail-list {
    min-height: 21px;
}

@media (max-width: 767px) {
    .edukasi-grid .edukasi-card-body,
    .ebook-card .edukasi-card-body {
        min-height: 0;
    }

    .edukasi-card-title {
        min-height: auto;
        max-height: none;
    }

    .edukasi-card-summary {
        min-height: auto;
        max-height: none;
    }
}

.edukasi-grid .edukasi-card {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            180deg,
            #ffffff 0%,
            #fbfcff 100%
        );
    border: 1px solid rgba(223, 229, 239, 0.85);
    border-radius: 22px;
    box-shadow:
        0 8px 26px rgba(31, 45, 80, 0.055),
        0 2px 8px rgba(31, 45, 80, 0.025);
    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}

.edukasi-grid .edukasi-card::before {
    position: absolute;
    top: 0;
    left: 28px;
    right: 28px;
    z-index: 3;
    height: 2px;
    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(30, 86, 183, 0.24),
            transparent
        );
    content: "";
}

.edukasi-grid .edukasi-card:hover {
    border-color: rgba(30, 86, 183, 0.16);
    box-shadow:
        0 18px 48px rgba(31, 45, 80, 0.11),
        0 5px 14px rgba(31, 45, 80, 0.04);
    transform: translateY(-5px);
}


/* Gambar lebih halus */

.edukasi-card-image,
.ebook-visual {
    overflow: hidden;
    background: #f3f6fb;
}

.edukasi-card-image img {
    transform: scale(1);
    transition:
        transform 0.7s cubic-bezier(
            0.2,
            0.7,
            0.2,
            1
        ),
        filter 0.35s ease;
}

.edukasi-card:hover .edukasi-card-image img {
    filter: saturate(1.03);
    transform: scale(1.035);
}

.card-image-overlay {
    background:
        linear-gradient(
            180deg,
            transparent 55%,
            rgba(18, 30, 61, 0.32) 100%
        );
}


/* Isi card */

.edukasi-grid .edukasi-card-body {
    padding: 23px;
}

.edukasi-card-title {
    margin-bottom: 12px;
    color: #273044;
    font-size: 18px;
    font-weight: 750;
    letter-spacing: -0.15px;
}

.edukasi-card-title a {
    color: #273044;
    transition: color 0.25s ease;
}

.edukasi-card-title a:hover {
    color: #1e56b7;
}

.edukasi-card-summary {
    color: #778194;
    font-size: 13px;
    line-height: 1.75;
}


/* Badge lebih lembut */

.jenis-badge {
    border: 1px solid transparent;
    box-shadow: none;
    font-weight: 750;
}

.jenis-badge.jenis-video {
    color: #b72f43;
    background: #fff1f3;
    border-color: #f8dadd;
}

.jenis-badge.jenis-infografis {
    color: #a86a0b;
    background: #fff8e9;
    border-color: #f4e5bf;
}

.jenis-badge.jenis-ebook {
    color: #174999;
    background: #edf3ff;
    border-color: #d9e5fb;
}

.utama-badge {
    padding: 5px 9px;
    color: #9a690b;
    background: #fff7df;
    border: 1px solid #f5e3a9;
    border-radius: 999px;
}


/* Footer lebih ringan */

.edukasi-card-footer {
    padding-top: 16px;
    border-top: 1px solid rgba(228, 233, 241, 0.8);
}

.edukasi-category {
    color: #8992a2;
}

.edukasi-category i {
    color: #6c83ab;
}

.card-detail-link {
    padding: 7px 11px;
    color: #1e56b7;
    background: #f2f6fd;
    border-radius: 999px;
    transition:
        color 0.25s ease,
        background 0.25s ease,
        transform 0.25s ease;
}

.card-detail-link:hover {
    color: #ffffff;
    background: #1e56b7;
    transform: translateX(2px);
}


/* Ikon media */

.card-media-icon {
    width: 42px;
    height: 42px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow:
        0 8px 20px rgba(25, 34, 59, 0.13);
    backdrop-filter: blur(4px);
}


/* Khusus e-book */

.ebook-visual {
    background:
        radial-gradient(
            circle at 50% 42%,
            #ffffff 0%,
            #f3f6fb 48%,
            #e9eef7 100%
        );
}

.ebook-cover {
    box-shadow:
        -7px 8px 0 #dbe2ee,
        0 18px 34px rgba(26, 40, 78, 0.2);
}

.ebook-card:hover .ebook-cover {
    transform:
        perspective(900px)
        rotateY(-2deg)
        translateY(-5px);
}

.ebook-file-badge {
    background: rgba(205, 49, 67, 0.92);
    box-shadow:
        0 7px 17px rgba(205, 49, 67, 0.16);
}


/* Responsif */

@media (max-width: 767px) {
    .edukasi-grid .edukasi-card {
        border-radius: 18px;
    }

    .edukasi-grid .edukasi-card:hover {
        transform: none;
    }

    .edukasi-grid .edukasi-card-body {
        padding: 20px;
    }
}
</style>