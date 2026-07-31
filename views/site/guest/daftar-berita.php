<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $beritaList app\models\BeritaDp3akb[] */
/* @var $kategoriList app\models\KategoriBerita[] */
/* @var $beritaUtama app\models\BeritaDp3akb|null */
/* @var $beritaTerbaru app\models\BeritaDp3akb[] */
/* @var $pagination yii\data\Pagination */
/* @var $keyword string */
/* @var $kategoriId int|string|null */

$this->title = 'Daftar Berita';

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
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'Mei',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Agu',
        9 => 'Sep',
        10 => 'Okt',
        11 => 'Nov',
        12 => 'Des',
    ];

    return [
        'tanggal' => date('d', $timestamp),
        'bulan' => $bulan[(int) date('n', $timestamp)],
        'lengkap' => date('d', $timestamp)
            . ' '
            . $bulan[(int) date('n', $timestamp)]
            . ' '
            . date('Y', $timestamp),
    ];
};

/**
 * Nama kategori berita.
 */
$getNamaKategori = function ($berita) {
    if (
        $berita->kategori !== null
        && !empty($berita->kategori->nama_kategori)
    ) {
        return $berita->kategori->nama_kategori;
    }

    return 'Berita';
};

/**
 * Ringkasan berita.
 */
$getRingkasan = function ($berita) {
    $ringkasan = !empty($berita->ringkasan)
        ? $berita->ringkasan
        : strip_tags((string) $berita->isi);

    return StringHelper::truncateWords(
        trim(strip_tags($ringkasan)),
        24,
        '...'
    );
};
?>
<style>
    .events-extended .event-card .card-body h3 a,
    .events-extended .event-card .card-body .read-more {
        color: #072585 !important;
    }

    .events-extended .event-card .card-body a {
        color: #072585 !important;
    }
    </style>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">

        <div
            class="container d-lg-flex justify-content-between align-items-center"
        >

            <h1 class="mb-2 mb-lg-0">
                Daftar Berita
            </h1>

            <nav class="breadcrumbs">

                <ol>

                    <li>
                        <a href="<?= Yii::$app->homeUrl ?>">
                            Beranda
                        </a>
                    </li>

                    <li class="current">
                        Berita
                    </li>

                </ol>

            </nav>

        </div>

    </div>
    <!-- End Page Title -->


    <!-- Berita Section -->
    <section
        id="events-extended"
        class="events-extended section"
    >

        <div
            class="container"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-3 order-lg-1 order-2">

                    <aside
                        class="filter-panel"
                        data-aos="fade-right"
                        data-aos-delay="100"
                    >

                        <!-- Search -->
                        <div class="search-box">

                            <?= Html::beginForm(
                                ['site/daftar-berita'],
                                'get'
                            ) ?>

                                <?php if (
                                    $kategoriId !== null
                                    && $kategoriId !== ''
                                ): ?>

                                    <?= Html::hiddenInput(
                                        'kategori',
                                        $kategoriId
                                    ) ?>

                                <?php endif; ?>

                                <?= Html::textInput(
                                    'q',
                                    $keyword,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Cari berita...',
                                        'autocomplete' => 'off',
                                    ]
                                ) ?>

                                <button
                                    type="submit"
                                    aria-label="Cari berita"
                                >
                                    <i class="bi bi-search"></i>
                                </button>

                            <?= Html::endForm() ?>

                        </div>
                        <!-- End Search -->


                        <!-- Category Tags -->
                        <div class="category-tags">

                            <h5>
                                Kategori Berita
                            </h5>

                            <div class="tags-wrap">

                                <?= Html::a(
                                    'Semua Berita',
                                    [
                                        'site/daftar-berita',
                                        'q' => $keyword !== ''
                                            ? $keyword
                                            : null,
                                    ],
                                    [
                                        'class' => 'tag '
                                            . (
                                                $kategoriId === null
                                                || $kategoriId === ''
                                                    ? 'active'
                                                    : ''
                                            ),
                                    ]
                                ) ?>

                                <?php foreach (
                                    $kategoriList
                                    as $kategori
                                ): ?>

                                    <?= Html::a(
                                        Html::encode(
                                            $kategori->nama_kategori
                                        ),
                                        [
                                            'site/daftar-berita',
                                            'kategori' => $kategori->id,
                                            'q' => $keyword !== ''
                                                ? $keyword
                                                : null,
                                        ],
                                        [
                                            'class' => 'tag '
                                                . (
                                                    (string) $kategoriId
                                                    === (string) $kategori->id
                                                        ? 'active'
                                                        : ''
                                                ),
                                        ]
                                    ) ?>

                                <?php endforeach; ?>

                            </div>

                        </div>
                        <!-- End Category Tags -->


                        <!-- Berita Terbaru -->
                        <div class="mini-calendar">

                            <div class="cal-header">

                                <h5>
                                    Berita Terbaru
                                </h5>

                            </div>

                            <?php if (
                                !empty($beritaTerbaru)
                            ): ?>

                                <div class="latest-news-list">

                                    <?php foreach (
                                        $beritaTerbaru
                                        as $itemTerbaru
                                    ): ?>

                                        <?php
                                        $tanggalTerbaru = $formatTanggal(
                                            $itemTerbaru->tanggal_publish
                                        );
                                        ?>

                                        <div
                                            class="d-flex gap-3 mb-3 pb-3 border-bottom"
                                        >

                                            <div
                                                class="flex-shrink-0 text-center"
                                                style="min-width: 42px;"
                                            >

                                                <strong
                                                    class="d-block"
                                                    style="font-size: 18px;"
                                                >
                                                    <?= Html::encode(
                                                        $tanggalTerbaru['tanggal']
                                                    ) ?>
                                                </strong>

                                                <small class="text-muted">
                                                    <?= Html::encode(
                                                        $tanggalTerbaru['bulan']
                                                    ) ?>
                                                </small>

                                            </div>

                                            <div>

                                                <?= Html::a(
                                                    Html::encode(
                                                        StringHelper::truncate(
                                                            $itemTerbaru->judul,
                                                            65,
                                                            '...'
                                                        )
                                                    ),
                                                    [
                                                        'site/detail-berita',
                                                        'slug' => $itemTerbaru
                                                            ->slug,
                                                    ],
                                                    [
                                                        'class' => 'fw-semibold',
                                                    ]
                                                ) ?>

                                                <small
                                                    class="d-block text-muted mt-1"
                                                >
                                                    <i class="bi bi-eye"></i>

                                                    <?= number_format(
                                                        (int) $itemTerbaru
                                                            ->hits,
                                                        0,
                                                        ',',
                                                        '.'
                                                    ) ?>
                                                    dilihat
                                                </small>

                                            </div>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            <?php else: ?>

                                <p class="text-muted">
                                    Belum ada berita terbaru.
                                </p>

                            <?php endif; ?>

                        </div>
                        <!-- End Berita Terbaru -->


                        <!-- Berita Utama -->
                        <?php if ($beritaUtama !== null): ?>

                            <?php
                            $tanggalUtama = $formatTanggal(
                                $beritaUtama->tanggal_publish
                            );
                            ?>

                            <div class="highlighted-event">

                                <?= Html::img(
                                    $beritaUtama->getImageUrl(),
                                    [
                                        'alt' => $beritaUtama->judul,
                                        'class' => 'img-fluid',
                                        'loading' => 'lazy',
                                        'style' => [
                                            'width' => '100%',
                                            'aspect-ratio' => '1080 / 636',
                                            'object-fit' => 'cover',
                                        ],
                                    ]
                                ) ?>

                                <div class="highlight-overlay">

                                    <span class="highlight-badge">
                                        Berita Utama
                                    </span>

                                    <h5>
                                        <?= Html::encode(
                                            StringHelper::truncate(
                                                $beritaUtama->judul,
                                                75,
                                                '...'
                                            )
                                        ) ?>
                                    </h5>

                                    <span class="highlight-date">

                                        <i class="bi bi-calendar3"></i>

                                        <?= Html::encode(
                                            $tanggalUtama['lengkap']
                                        ) ?>

                                    </span>

                                    <?= Html::a(
                                        'Baca Berita',
                                        [
                                            'site/detail-berita',
                                            'slug' => $beritaUtama->slug,
                                        ],
                                        [
                                            'class' => 'btn-highlight',
                                        ]
                                    ) ?>

                                </div>

                            </div>

                        <?php endif; ?>
                        <!-- End Berita Utama -->

                    </aside>

                </div>
                <!-- End Sidebar -->


                <!-- Berita Grid -->
                <div class="col-lg-9 order-lg-2 order-1">

                    <?php if (
                        $keyword !== ''
                        || (
                            $kategoriId !== null
                            && $kategoriId !== ''
                        )
                    ): ?>

                        <div
                            class="alert alert-light border mb-4"
                            data-aos="fade-up"
                        >

                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center gap-2"
                            >

                                <div>

                                    Menampilkan hasil berita

                                    <?php if ($keyword !== ''): ?>

                                        untuk kata kunci:

                                        <strong>
                                            “<?= Html::encode($keyword) ?>”
                                        </strong>

                                    <?php endif; ?>

                                </div>

                                <?= Html::a(
                                    'Reset Filter',
                                    ['site/daftar-berita'],
                                    [
                                        'class' => 'btn btn-sm btn-outline-secondary',
                                    ]
                                ) ?>

                            </div>

                        </div>

                    <?php endif; ?>


                    <?php if (!empty($beritaList)): ?>

                        <div class="row g-4">

                            <?php foreach (
                                $beritaList
                                as $index => $berita
                            ): ?>

                                <?php
                                $tanggalBerita = $formatTanggal(
                                    $berita->tanggal_publish
                                );

                                $namaKategori = $getNamaKategori(
                                    $berita
                                );

                                $ringkasan = $getRingkasan(
                                    $berita
                                );

                                $delay = (
                                    $index % 2 === 0
                                )
                                    ? 100
                                    : 200;
                                ?>

                                <div
                                    class="col-md-6"
                                    data-aos="zoom-in"
                                    data-aos-delay="<?= $delay ?>"
                                >

                                    <article class="event-card h-100">

                                        <div class="card-image">

                                            <?= Html::a(
                                                Html::img(
                                                    $berita->getImageUrl(),
                                                    [
                                                        'alt' => $berita
                                                            ->judul,
                                                        'class' => 'img-fluid',
                                                        'loading' => 'lazy',
                                                        'style' => [
                                                            'width' => '100%',
                                                            'aspect-ratio'
                                                                => '1080 / 636',
                                                            'object-fit'
                                                                => 'cover',
                                                        ],
                                                    ]
                                                ),
                                                [
                                                    'site/detail-berita',
                                                    'slug' => $berita->slug,
                                                ]
                                            ) ?>

                                            <div class="date-badge">

                                                <span class="day">
                                                    <?= Html::encode(
                                                        $tanggalBerita['tanggal']
                                                    ) ?>
                                                </span>

                                                <span class="month">
                                                    <?= Html::encode(
                                                        $tanggalBerita['bulan']
                                                    ) ?>
                                                </span>

                                            </div>

                                            <?= Html::a(
                                                Html::encode(
                                                    $namaKategori
                                                ),
                                                [
                                                    'site/daftar-berita',
                                                    'kategori' => $berita
                                                        ->kategori_id,
                                                ],
                                                [
                                                    'class' => 'card-category',
                                                ]
                                            ) ?>

                                        </div>

                                        <div class="card-body">

                                            <h3>

                                                <?= Html::a(
                                                    Html::encode(
                                                        $berita->judul
                                                    ),
                                                    [
                                                        'site/detail-berita',
                                                        'slug' => $berita
                                                            ->slug,
                                                    ]
                                                ) ?>

                                            </h3>

                                            <ul class="card-meta">

                                                <li>

                                                    <i class="bi bi-calendar3"></i>

                                                    <?= Html::encode(
                                                        $tanggalBerita['lengkap']
                                                    ) ?>

                                                </li>

                                                <li>

                                                    <i class="bi bi-eye"></i>

                                                    <?= number_format(
                                                        (int) $berita->hits,
                                                        0,
                                                        ',',
                                                        '.'
                                                    ) ?>

                                                    dilihat

                                                </li>

                                            </ul>

                                            <p>
                                                <?= Html::encode(
                                                    $ringkasan
                                                ) ?>
                                            </p>

                                            <?= Html::a(
                                                'Baca Selengkapnya '
                                                . '<i class="bi bi-chevron-right"></i>',
                                                [
                                                    'site/detail-berita',
                                                    'slug' => $berita->slug,
                                                ],
                                                [
                                                    'class' => 'read-more',
                                                ]
                                            ) ?>

                                        </div>

                                    </article>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    <?php else: ?>

                        <div
                            class="alert alert-info text-center"
                            data-aos="fade-up"
                        >

                            <i
                                class="bi bi-newspaper"
                                style="font-size: 42px;"
                            ></i>

                            <h4 class="mt-3">
                                Berita Tidak Ditemukan
                            </h4>

                            <p class="mb-3">
                                Belum ada berita yang sesuai dengan pencarian
                                atau kategori yang dipilih.
                            </p>

                            <?= Html::a(
                                'Lihat Semua Berita',
                                ['site/daftar-berita'],
                                [
                                    'class' => 'btn btn-primary',
                                ]
                            ) ?>

                        </div>

                    <?php endif; ?>


                    <!-- Pagination -->
                    <?php if (
                        $pagination->pageCount > 1
                    ): ?>

                        <nav
                            class="page-nav"
                            data-aos="fade-up"
                            data-aos-delay="100"
                            aria-label="Navigasi halaman berita"
                        >

                            <?= LinkPager::widget([
                                'pagination' => $pagination,

                                'options' => [
                                    'class' => 'pagination justify-content-center',
                                ],

                                'linkContainerOptions' => [
                                    'class' => 'page-item',
                                ],

                                'linkOptions' => [
                                    'class' => 'page-link',
                                ],

                                'activePageCssClass' => 'active',
                                'disabledPageCssClass' => 'disabled',

                                'prevPageLabel'
                                    => '<i class="bi bi-arrow-left"></i>',

                                'nextPageLabel'
                                    => '<i class="bi bi-arrow-right"></i>',

                                'firstPageLabel' => false,
                                'lastPageLabel' => false,

                                'maxButtonCount' => 5,

                                'disableCurrentPageButton' => true,
                            ]) ?>

                        </nav>

                    <?php endif; ?>
                    <!-- End Pagination -->

                </div>
                <!-- End Berita Grid -->

            </div>

        </div>

    </section>
    <!-- /Berita Section -->

</main>