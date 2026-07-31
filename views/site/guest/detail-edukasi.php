<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $konten app\models\KontenEdukasi */
/* @var $kontenTerkait app\models\KontenEdukasi[] */
/* @var $kontenTerbaru app\models\KontenEdukasi[] */
/* @var $kategoriList app\models\KategoriEdukasi[] */

$this->title = $konten->judul;

$getJenisLabel = function ($jenis) {
    if ($jenis === 'video') {
        return 'Video Edukasi';
    }

    if ($jenis === 'infografis') {
        return 'Infografis';
    }

    if ($jenis === 'ebook') {
        return 'E-Book';
    }

    return 'Konten Edukasi';
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
        return 'detail-video';
    }

    if ($jenis === 'infografis') {
        return 'detail-infografis';
    }

    if ($jenis === 'ebook') {
        return 'detail-ebook';
    }

    return 'detail-edukasi';
};

$getTanggal = function ($tanggal) {
    if (empty($tanggal)) {
        return '-';
    }

    $timestamp = strtotime($tanggal);

    return $timestamp !== false
        ? date('d F Y', $timestamp)
        : '-';
};

$detailClass = $getJenisClass(
    $konten->jenis_konten
);

$detailUrl = Url::to([
    '/site/detail-edukasi',
    'slug' => $konten->slug,
], true);

$downloadUrl = Url::to([
    '/site/download-edukasi',
    'slug' => $konten->slug,
]);

$bacaUrl = Url::to([
    '/site/baca-ebook',
    'slug' => $konten->slug,
]);
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">

        <div
            class="container d-lg-flex justify-content-between align-items-center"
        >

            <h1 class="mb-2 mb-lg-0">
                Detail Konten Edukasi
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
                            'Konten Edukasi',
                            ['/site/edukasi']
                        ) ?>
                    </li>

                    <li class="current">
                        <?= Html::encode(
                            StringHelper::truncate(
                                $konten->judul,
                                45
                            )
                        ) ?>
                    </li>

                </ol>

            </nav>

        </div>

    </div>
    <!-- End Page Title -->


    <!-- Detail Header -->
    <section class="detail-edukasi-header">

        <div
            class="container"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <div
                class="detail-header-card <?= Html::encode(
                    $detailClass
                ) ?>"
            >

                <span class="detail-type-badge">

                    <i class="bi <?= Html::encode(
                        $getJenisIcon(
                            $konten->jenis_konten
                        )
                    ) ?>"></i>

                    <?= Html::encode(
                        $getJenisLabel(
                            $konten->jenis_konten
                        )
                    ) ?>

                </span>

                <?php if ($konten->kategori !== null): ?>

                    <span class="detail-category-badge">

                        <?= Html::encode(
                            $konten->kategori
                                ->nama_kategori
                        ) ?>

                    </span>

                <?php endif; ?>

                <h1>
                    <?= Html::encode(
                        $konten->judul
                    ) ?>
                </h1>

                <?php if (!empty($konten->ringkasan)): ?>

                    <p class="detail-lead">

                        <?= Html::encode(
                            $konten->ringkasan
                        ) ?>

                    </p>

                <?php endif; ?>

                <div class="detail-meta">

                    <span>

                        <i class="bi bi-calendar3"></i>

                        <?= Html::encode(
                            $getTanggal(
                                $konten->tanggal_publish
                            )
                        ) ?>

                    </span>

                    <span>

                        <i class="bi bi-eye"></i>

                        <?= (int) $konten->hits ?>
                        dilihat

                    </span>

                    <?php if (
                        $konten->jenis_konten !== 'video'
                    ): ?>

                        <span>

                            <i class="bi bi-download"></i>

                            <?= (int) $konten
                                ->jumlah_download ?>
                            unduhan

                        </span>

                    <?php endif; ?>

                    <?php if (!empty($konten->penulis)): ?>

                        <span>

                            <i class="bi bi-person"></i>

                            <?= Html::encode(
                                $konten->penulis
                            ) ?>

                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </section>


    <!-- Detail Content -->
    <section class="detail-edukasi-content section">

        <div class="container">

            <div class="row g-4">

                <div class="col-lg-8">

                    <!-- VIDEO -->
                    <?php if (
                        $konten->jenis_konten === 'video'
                    ): ?>

                        <div
                            class="content-media-card"
                            data-aos="fade-up"
                        >

                            <?php if (
                                $konten->getYoutubeEmbedUrl()
                                !== null
                            ): ?>

                                <div class="video-wrapper">

                                    <iframe
                                        src="<?= Html::encode(
                                            $konten
                                                ->getYoutubeEmbedUrl()
                                        ) ?>"
                                        title="<?= Html::encode(
                                            $konten->judul
                                        ) ?>"
                                        allow="
                                            accelerometer;
                                            autoplay;
                                            clipboard-write;
                                            encrypted-media;
                                            gyroscope;
                                            picture-in-picture;
                                            web-share
                                        "
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        allowfullscreen
                                    ></iframe>

                                </div>

                            <?php else: ?>

                                <div class="media-unavailable">

                                    <i class="bi bi-camera-video-off"></i>

                                    <h4>
                                        Video Belum Tersedia
                                    </h4>

                                    <p>
                                        Tautan video belum dapat diputar.
                                    </p>

                                </div>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>


                    <!-- INFOGRAFIS -->
                    <?php if (
                        $konten->jenis_konten
                        === 'infografis'
                    ): ?>

                        <div
                            class="content-media-card infographic-media-card"
                            data-aos="fade-up"
                        >

                            <div class="infographic-toolbar">

                                <div>

                                    <strong>
                                        Infografis
                                    </strong>

                                    <span>
                                        Klik gambar untuk melihat ukuran penuh.
                                    </span>

                                </div>

                                <?= Html::a(
                                    '<i class="bi bi-download"></i>'
                                    . ' Unduh Infografis',
                                    $downloadUrl,
                                    [
                                        'class'
                                            => 'btn-detail-primary',
                                    ]
                                ) ?>

                            </div>

                            <a
                                href="<?= Html::encode(
                                    $konten->getMediaUrl()
                                ) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="infographic-preview"
                            >

                                <?= Html::img(
                                    $konten->getMediaUrl(),
                                    [
                                        'class'
                                            => 'img-fluid',
                                        'alt'
                                            => $konten->judul,
                                    ]
                                ) ?>

                                <span class="image-zoom-hint">

                                    <i class="bi bi-zoom-in"></i>

                                    Perbesar Gambar

                                </span>

                            </a>

                        </div>

                    <?php endif; ?>


                    <!-- E-BOOK -->
                    <?php if (
                        $konten->jenis_konten === 'ebook'
                    ): ?>

                        <div
                            class="ebook-detail-showcase"
                            data-aos="fade-up"
                        >

                            <div class="row align-items-center g-4">

                                <div class="col-md-5">

                                    <div class="ebook-detail-visual">

                                        <div class="ebook-detail-shadow"></div>

                                        <div class="ebook-detail-cover">

                                            <?= Html::img(
                                                $konten
                                                    ->getThumbnailUrl(),
                                                [
                                                    'alt'
                                                        => $konten
                                                            ->judul,
                                                ]
                                            ) ?>

                                            <span class="ebook-spine"></span>

                                            <span class="ebook-shine"></span>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-7">

                                    <div class="ebook-detail-info">

                                        <span class="ebook-overline">

                                            <i class="bi bi-file-earmark-pdf-fill"></i>

                                            Publikasi Digital

                                        </span>

                                        <h2>
                                            <?= Html::encode(
                                                $konten->judul
                                            ) ?>
                                        </h2>

                                        <div class="ebook-properties">

                                            <?php if (
                                                !empty(
                                                    $konten->penulis
                                                )
                                            ): ?>

                                                <div>

                                                    <span>
                                                        Penulis
                                                    </span>

                                                    <strong>

                                                        <?= Html::encode(
                                                            $konten
                                                                ->penulis
                                                        ) ?>

                                                    </strong>

                                                </div>

                                            <?php endif; ?>

                                            <?php if (
                                                !empty(
                                                    $konten->penerbit
                                                )
                                            ): ?>

                                                <div>

                                                    <span>
                                                        Penerbit
                                                    </span>

                                                    <strong>

                                                        <?= Html::encode(
                                                            $konten
                                                                ->penerbit
                                                        ) ?>

                                                    </strong>

                                                </div>

                                            <?php endif; ?>

                                            <?php if (
                                                !empty(
                                                    $konten
                                                        ->tahun_terbit
                                                )
                                            ): ?>

                                                <div>

                                                    <span>
                                                        Tahun
                                                    </span>

                                                    <strong>

                                                        <?= (int) $konten
                                                            ->tahun_terbit ?>

                                                    </strong>

                                                </div>

                                            <?php endif; ?>

                                            <?php if (
                                                !empty(
                                                    $konten
                                                        ->jumlah_halaman
                                                )
                                            ): ?>

                                                <div>

                                                    <span>
                                                        Halaman
                                                    </span>

                                                    <strong>

                                                        <?= (int) $konten
                                                            ->jumlah_halaman ?>

                                                    </strong>

                                                </div>

                                            <?php endif; ?>

                                            <div>

                                                <span>
                                                    Ukuran
                                                </span>

                                                <strong>

                                                    <?= Html::encode(
                                                        $konten
                                                            ->getUkuranFileLabel()
                                                    ) ?>

                                                </strong>

                                            </div>

                                        </div>

                                        <div class="ebook-actions">

                                            <?= Html::a(
                                                '<i class="bi bi-book"></i>'
                                                . '<span>Baca E-Book</span>',
                                                $bacaUrl,
                                                [
                                                    'class'
                                                        => 'btn-read-ebook',
                                                    'target'
                                                        => '_blank',
                                                    'rel'
                                                        => 'noopener noreferrer',
                                                ]
                                            ) ?>

                                            <?= Html::a(
                                                '<i class="bi bi-download"></i>'
                                                . '<span>Unduh PDF</span>',
                                                $downloadUrl,
                                                [
                                                    'class'
                                                        => 'btn-download-ebook',
                                                ]
                                            ) ?>

                                        </div>

                                        <p class="ebook-note">

                                            <i class="bi bi-info-circle"></i>

                                            E-book dapat dibaca langsung
                                            melalui browser atau diunduh
                                            dalam format PDF.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div
                            class="ebook-preview-panel"
                            data-aos="fade-up"
                            data-aos-delay="100"
                        >

                            <div class="ebook-preview-header">

                                <div>

                                    <span class="preview-icon">

                                        <i class="bi bi-file-earmark-pdf-fill"></i>

                                    </span>

                                    <div>

                                        <h4>
                                            Preview E-Book
                                        </h4>

                                        <p>
                                            Baca dokumen tanpa meninggalkan halaman.
                                        </p>

                                    </div>

                                </div>

                                <?= Html::a(
                                    '<i class="bi bi-arrows-fullscreen"></i>'
                                    . ' Buka Layar Penuh',
                                    $bacaUrl,
                                    [
                                        'class'
                                            => 'preview-fullscreen-link',
                                        'target'
                                            => '_blank',
                                        'rel'
                                            => 'noopener noreferrer',
                                    ]
                                ) ?>

                            </div>

                            <div class="pdf-preview-wrapper">

                                <iframe
                                    src="<?= Html::encode(
                                        $bacaUrl
                                    ) ?>#toolbar=1&navpanes=0"
                                    title="Preview <?= Html::encode(
                                        $konten->judul
                                    ) ?>"
                                ></iframe>

                                <div class="pdf-preview-fallback">

                                    Browser Anda tidak mendukung
                                    preview PDF.

                                    <?= Html::a(
                                        'Buka PDF',
                                        $bacaUrl,
                                        [
                                            'target' => '_blank',
                                        ]
                                    ) ?>

                                </div>

                            </div>

                        </div>

                    <?php endif; ?>


                    <!-- Isi Konten -->
                    <article
                        class="edukasi-article"
                        data-aos="fade-up"
                        data-aos-delay="150"
                    >

                        <div class="article-heading">

                            <span class="article-heading-icon">

                                <i class="bi bi-journal-text"></i>

                            </span>

                            <div>

                                <h3>
                                    Tentang Materi Ini
                                </h3>

                                <p>
                                    Informasi dan penjelasan lengkap konten edukasi.
                                </p>

                            </div>

                        </div>

                        <div class="article-content">

                            <?php if (!empty($konten->isi)): ?>

                                <?= Yii::$app->formatter
                                    ->asNtext($konten->isi) ?>

                            <?php elseif (
                                !empty($konten->ringkasan)
                            ): ?>

                                <?= Yii::$app->formatter
                                    ->asNtext(
                                        $konten->ringkasan
                                    ) ?>

                            <?php else: ?>

                                <p class="text-muted">
                                    Deskripsi lengkap belum tersedia.
                                </p>

                            <?php endif; ?>

                        </div>

                    </article>


                    <!-- Share -->
                    <div class="edukasi-share">

                        <div>

                            <strong>
                                Bagikan Materi
                            </strong>

                            <span>
                                Bantu sebarkan informasi edukatif ini.
                            </span>

                        </div>

                        <div class="share-actions">

                            <a
                                href="https://wa.me/?text=<?= rawurlencode(
                                    $konten->judul
                                    . ' '
                                    . $detailUrl
                                ) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="share-whatsapp"
                                title="Bagikan ke WhatsApp"
                            >

                                <i class="bi bi-whatsapp"></i>

                            </a>

                            <a
                                href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode(
                                    $detailUrl
                                ) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="share-facebook"
                                title="Bagikan ke Facebook"
                            >

                                <i class="bi bi-facebook"></i>

                            </a>

                            <button
                                type="button"
                                class="share-copy"
                                id="copy-edukasi-link"
                                data-url="<?= Html::encode(
                                    $detailUrl
                                ) ?>"
                                title="Salin tautan"
                            >

                                <i class="bi bi-link-45deg"></i>

                            </button>

                        </div>

                    </div>

                </div>


                <!-- Sidebar -->
                <div class="col-lg-4">

                    <aside class="edukasi-sidebar">

                        <!-- Informasi -->
                        <div
                            class="sidebar-card"
                            data-aos="fade-left"
                        >

                            <h4>

                                <i class="bi bi-info-circle"></i>

                                Informasi Konten

                            </h4>

                            <div class="content-info-list">

                                <div>

                                    <span>
                                        Jenis
                                    </span>

                                    <strong>
                                        <?= Html::encode(
                                            $getJenisLabel(
                                                $konten
                                                    ->jenis_konten
                                            )
                                        ) ?>
                                    </strong>

                                </div>

                                <div>

                                    <span>
                                        Kategori
                                    </span>

                                    <strong>

                                        <?= $konten->kategori !== null
                                            ? Html::encode(
                                                $konten
                                                    ->kategori
                                                    ->nama_kategori
                                            )
                                            : '-' ?>

                                    </strong>

                                </div>

                                <?php if (
                                    !empty($konten->sumber)
                                ): ?>

                                    <div>

                                        <span>
                                            Sumber
                                        </span>

                                        <strong>

                                            <?= Html::encode(
                                                $konten->sumber
                                            ) ?>

                                        </strong>

                                    </div>

                                <?php endif; ?>

                                <?php if (
                                    !empty($konten->durasi_video)
                                ): ?>

                                    <div>

                                        <span>
                                            Durasi
                                        </span>

                                        <strong>

                                            <?= Html::encode(
                                                $konten
                                                    ->durasi_video
                                            ) ?>

                                        </strong>

                                    </div>

                                <?php endif; ?>

                                <div>

                                    <span>
                                        Dipublikasikan
                                    </span>

                                    <strong>

                                        <?= Html::encode(
                                            $getTanggal(
                                                $konten
                                                    ->tanggal_publish
                                            )
                                        ) ?>

                                    </strong>

                                </div>

                            </div>

                        </div>


                        <!-- Kategori -->
                        <div
                            class="sidebar-card"
                            data-aos="fade-left"
                            data-aos-delay="100"
                        >

                            <h4>

                                <i class="bi bi-grid"></i>

                                Kategori Edukasi

                            </h4>

                            <div class="sidebar-category-list">

                                <?php foreach (
                                    $kategoriList as $kategori
                                ): ?>

                                    <?= Html::a(
                                        '<span>'
                                        . Html::encode(
                                            $kategori
                                                ->nama_kategori
                                        )
                                        . '</span>'
                                        . '<i class="bi bi-chevron-right"></i>',
                                        [
                                            '/site/edukasi',
                                            'kategori'
                                                => $kategori->id,
                                        ],
                                        [
                                            'class'
                                                => (
                                                    $konten
                                                        ->kategori_id
                                                    == $kategori->id
                                                )
                                                    ? 'active'
                                                    : '',
                                        ]
                                    ) ?>

                                <?php endforeach; ?>

                            </div>

                        </div>


                        <!-- Terbaru -->
                        <div
                            class="sidebar-card"
                            data-aos="fade-left"
                            data-aos-delay="150"
                        >

                            <h4>

                                <i class="bi bi-clock-history"></i>

                                Materi Terbaru

                            </h4>

                            <div class="sidebar-latest-list">

                                <?php foreach (
                                    $kontenTerbaru as $item
                                ): ?>

                                    <a
                                        href="<?= Url::to([
                                            '/site/detail-edukasi',
                                            'slug' => $item->slug,
                                        ]) ?>"
                                        class="sidebar-latest-item"
                                    >

                                        <div class="sidebar-latest-image">

                                            <?= Html::img(
                                                $item
                                                    ->getThumbnailUrl(),
                                                [
                                                    'alt'
                                                        => $item
                                                            ->judul,
                                                    'loading'
                                                        => 'lazy',
                                                ]
                                            ) ?>

                                        </div>

                                        <div>

                                            <span>

                                                <?= Html::encode(
                                                    $getJenisLabel(
                                                        $item
                                                            ->jenis_konten
                                                    )
                                                ) ?>

                                            </span>

                                            <h5>

                                                <?= Html::encode(
                                                    StringHelper::truncate(
                                                        $item->judul,
                                                        70
                                                    )
                                                ) ?>

                                            </h5>

                                        </div>

                                    </a>

                                <?php endforeach; ?>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </div>

    </section>


    <!-- Konten Terkait -->
    <?php if (!empty($kontenTerkait)): ?>

        <section class="related-edukasi section light-background">

            <div class="container">

                <div class="section-title">

                    <h2>
                        Materi Terkait
                    </h2>

                    <p>
                        Materi edukasi lain yang mungkin
                        bermanfaat untuk Anda.
                    </p>

                </div>

                <div class="row g-4">

                    <?php foreach (
                        $kontenTerkait as $index => $item
                    ): ?>

                        <div
                            class="col-lg-3 col-md-6"
                            data-aos="fade-up"
                            data-aos-delay="<?= (
                                $index + 1
                            ) * 100 ?>"
                        >

                            <article class="related-card">

                                <a
                                    href="<?= Url::to([
                                        '/site/detail-edukasi',
                                        'slug' => $item->slug,
                                    ]) ?>"
                                    class="related-image"
                                >

                                    <?= Html::img(
                                        $item
                                            ->getThumbnailUrl(),
                                        [
                                            'alt' => $item->judul,
                                            'loading' => 'lazy',
                                        ]
                                    ) ?>

                                    <span>

                                        <i class="bi <?= Html::encode(
                                            $getJenisIcon(
                                                $item
                                                    ->jenis_konten
                                            )
                                        ) ?>"></i>

                                    </span>

                                </a>

                                <div class="related-body">

                                    <small>

                                        <?= Html::encode(
                                            $getJenisLabel(
                                                $item
                                                    ->jenis_konten
                                            )
                                        ) ?>

                                    </small>

                                    <h4>

                                        <?= Html::a(
                                            Html::encode(
                                                StringHelper::truncate(
                                                    $item->judul,
                                                    80
                                                )
                                            ),
                                            [
                                                '/site/detail-edukasi',
                                                'slug'
                                                    => $item->slug,
                                            ]
                                        ) ?>

                                    </h4>

                                </div>

                            </article>

                        </div>

                    <?php endforeach; ?>

                </div>

                <div class="text-center mt-4">

                    <?= Html::a(
                        'Lihat Semua Konten '
                        . '<i class="bi bi-arrow-right"></i>',
                        ['/site/edukasi'],
                        [
                            'class'
                                => 'btn-all-edukasi',
                        ]
                    ) ?>

                </div>

            </div>

        </section>

    <?php endif; ?>

</main>


<style>
:root {
    --edu-primary: #072585;
    --edu-secondary: #1e56b7;
    --edu-accent: #10a6a6;
    --edu-text: #273044;
    --edu-muted: #717c8e;
    --edu-border: #e2e7ef;
}


/* Header */

.detail-edukasi-header {
    padding: 50px 0 15px;
}

.detail-header-card {
    position: relative;
    overflow: hidden;
    padding: 48px;
    color: #ffffff;
    background:
        linear-gradient(
            135deg,
            #071d68,
            #0c3f99,
            #0d6dad
        );
    border-radius: 25px;
    box-shadow: 0 23px 58px rgba(7, 37, 133, 0.2);
}

.detail-header-card::after {
    position: absolute;
    top: -90px;
    right: -70px;
    width: 280px;
    height: 280px;
    background: rgba(255, 255, 255, 0.07);
    border-radius: 50%;
    content: "";
}

.detail-header-card.detail-video {
    background:
        linear-gradient(
            135deg,
            #6d1222,
            #b7223e,
            #e44e5e
        );
}

.detail-header-card.detail-infografis {
    background:
        linear-gradient(
            135deg,
            #744000,
            #c77a08,
            #f0ae2d
        );
}

.detail-header-card.detail-ebook {
    background:
        linear-gradient(
            135deg,
            #071d68,
            #0b3d95,
            #1671b5
        );
}

.detail-type-badge,
.detail-category-badge {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin: 0 7px 17px 0;
    padding: 7px 12px;
    color: #ffffff;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.24);
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
}

.detail-header-card h1 {
    position: relative;
    z-index: 2;
    max-width: 960px;
    margin-bottom: 17px;
    color: #ffffff;
    font-size: clamp(30px, 4vw, 49px);
    line-height: 1.18;
    font-weight: 800;
}

.detail-lead {
    position: relative;
    z-index: 2;
    max-width: 860px;
    margin-bottom: 21px;
    color: rgba(255, 255, 255, 0.82);
    font-size: 16px;
    line-height: 1.75;
}

.detail-meta {
    position: relative;
    z-index: 2;
    display: flex;
    flex-wrap: wrap;
    gap: 17px;
}

.detail-meta span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: rgba(255, 255, 255, 0.78);
    font-size: 13px;
}


/* Media */

.content-media-card,
.edukasi-article,
.ebook-detail-showcase,
.ebook-preview-panel {
    margin-bottom: 27px;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid var(--edu-border);
    border-radius: 20px;
    box-shadow: 0 12px 37px rgba(27, 39, 69, 0.08);
}

.video-wrapper {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16 / 9;
    background: #111111;
}

.video-wrapper iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

.media-unavailable {
    padding: 70px 20px;
    text-align: center;
}

.media-unavailable i {
    color: #9aa3b2;
    font-size: 50px;
}

.infographic-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 18px 21px;
    border-bottom: 1px solid #e8ecf2;
}

.infographic-toolbar > div {
    display: flex;
    flex-direction: column;
}

.infographic-toolbar strong {
    color: var(--edu-text);
}

.infographic-toolbar span {
    margin-top: 2px;
    color: var(--edu-muted);
    font-size: 12px;
}

.btn-detail-primary {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 15px;
    color: #ffffff;
    background: var(--edu-primary);
    border-radius: 9px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
}

.btn-detail-primary:hover {
    color: #ffffff;
    background: var(--edu-secondary);
}

.infographic-preview {
    position: relative;
    display: block;
    padding: 25px;
    text-align: center;
    background: #f3f6fa;
}

.infographic-preview img {
    max-height: 1250px;
    border-radius: 8px;
    box-shadow: 0 16px 43px rgba(25, 38, 74, 0.16);
}

.image-zoom-hint {
    position: absolute;
    right: 37px;
    bottom: 37px;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 12px;
    color: #ffffff;
    background: rgba(5, 18, 58, 0.82);
    border-radius: 9px;
    font-size: 11px;
    font-weight: 700;
}


/* E-book */

.ebook-detail-showcase {
    padding: 38px;
    background:
        linear-gradient(
            135deg,
            #ffffff 0%,
            #f5f8ff 100%
        );
}

.ebook-detail-visual {
    position: relative;
    display: flex;
    min-height: 410px;
    align-items: center;
    justify-content: center;
}

.ebook-detail-shadow {
    position: absolute;
    bottom: 35px;
    width: 210px;
    height: 34px;
    background: rgba(17, 34, 79, 0.27);
    border-radius: 50%;
    filter: blur(12px);
}

.ebook-detail-cover {
    position: relative;
    z-index: 2;
    width: 245px;
    height: 345px;
    overflow: hidden;
    background: #ffffff;
    border-radius: 6px 13px 13px 6px;
    box-shadow:
        -13px 11px 0 #d0d9ea,
        0 30px 55px rgba(17, 34, 79, 0.31);
    transform:
        perspective(1000px)
        rotateY(-8deg);
}

.ebook-detail-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.ebook-spine {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 9px;
    width: 5px;
    background: rgba(0, 0, 0, 0.17);
}

.ebook-shine {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            115deg,
            rgba(255, 255, 255, 0.27),
            transparent 36%
        );
}

.ebook-overline {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 13px;
    color: #dc3545;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.7px;
}

.ebook-detail-info h2 {
    margin-bottom: 22px;
    color: var(--edu-text);
    font-size: 30px;
    line-height: 1.3;
    font-weight: 800;
}

.ebook-properties {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 13px;
    margin-bottom: 24px;
}

.ebook-properties div {
    padding: 12px 13px;
    background: #ffffff;
    border: 1px solid #e0e6f0;
    border-radius: 11px;
}

.ebook-properties span {
    display: block;
    margin-bottom: 3px;
    color: var(--edu-muted);
    font-size: 10px;
    text-transform: uppercase;
}

.ebook-properties strong {
    display: block;
    overflow: hidden;
    color: var(--edu-text);
    font-size: 12px;
    text-overflow: ellipsis;
}

.ebook-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.btn-read-ebook,
.btn-download-ebook {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 17px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
}

.btn-read-ebook {
    color: #ffffff;
    background: var(--edu-primary);
    box-shadow: 0 9px 22px rgba(7, 37, 133, 0.2);
}

.btn-download-ebook {
    color: var(--edu-primary);
    background: #ffffff;
    border: 1px solid #cfd8e8;
}

.btn-read-ebook:hover {
    color: #ffffff;
    background: var(--edu-secondary);
}

.btn-download-ebook:hover {
    color: #ffffff;
    background: var(--edu-primary);
}

.ebook-note {
    display: flex;
    gap: 7px;
    margin: 17px 0 0;
    color: var(--edu-muted);
    font-size: 11px;
    line-height: 1.6;
}

.ebook-preview-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 17px 20px;
    border-bottom: 1px solid #e4e9f1;
}

.ebook-preview-header > div:first-child {
    display: flex;
    align-items: center;
    gap: 12px;
}

.preview-icon {
    display: inline-flex;
    width: 43px;
    height: 43px;
    align-items: center;
    justify-content: center;
    color: #dc3545;
    background: rgba(220, 53, 69, 0.1);
    border-radius: 11px;
    font-size: 20px;
}

.ebook-preview-header h4 {
    margin: 0 0 2px;
    font-size: 15px;
}

.ebook-preview-header p {
    margin: 0;
    color: var(--edu-muted);
    font-size: 11px;
}

.preview-fullscreen-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--edu-primary);
    font-size: 11px;
    font-weight: 800;
    text-decoration: none;
}

.pdf-preview-wrapper {
    position: relative;
    height: 740px;
    background: #525659;
}

.pdf-preview-wrapper iframe {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 100%;
    border: 0;
}

.pdf-preview-fallback {
    position: absolute;
    inset: 0;
    display: flex;
    z-index: 1;
    align-items: center;
    justify-content: center;
    color: #ffffff;
}


/* Article */

.edukasi-article {
    padding: 30px;
}

.article-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 25px;
    padding-bottom: 18px;
    border-bottom: 1px solid #e5e9f0;
}

.article-heading-icon {
    display: inline-flex;
    width: 47px;
    height: 47px;
    align-items: center;
    justify-content: center;
    color: var(--edu-primary);
    background: #eaf0ff;
    border-radius: 13px;
    font-size: 20px;
}

.article-heading h3 {
    margin: 0 0 3px;
    color: var(--edu-text);
    font-size: 19px;
}

.article-heading p {
    margin: 0;
    color: var(--edu-muted);
    font-size: 12px;
}

.article-content {
    color: #4f596a;
    font-size: 15px;
    line-height: 1.85;
}


/* Share */

.edukasi-share {
    display: flex;
    margin-bottom: 28px;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 19px 21px;
    background: #f7f9fd;
    border: 1px solid #e2e7ef;
    border-radius: 16px;
}

.edukasi-share > div:first-child {
    display: flex;
    flex-direction: column;
}

.edukasi-share strong {
    color: var(--edu-text);
}

.edukasi-share span {
    margin-top: 2px;
    color: var(--edu-muted);
    font-size: 11px;
}

.share-actions {
    display: flex;
    gap: 8px;
}

.share-actions a,
.share-actions button {
    display: inline-flex;
    width: 39px;
    height: 39px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    border: 0;
    border-radius: 10px;
    font-size: 17px;
}

.share-whatsapp {
    background: #25d366;
}

.share-facebook {
    background: #1877f2;
}

.share-copy {
    background: var(--edu-primary);
}


/* Sidebar */

.edukasi-sidebar {
    position: sticky;
    top: 110px;
}

.sidebar-card {
    margin-bottom: 20px;
    padding: 21px;
    background: #ffffff;
    border: 1px solid var(--edu-border);
    border-radius: 17px;
    box-shadow: 0 10px 31px rgba(27, 39, 69, 0.065);
}

.sidebar-card h4 {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 18px;
    padding-bottom: 13px;
    color: var(--edu-text);
    border-bottom: 1px solid #e9edf3;
    font-size: 15px;
}

.sidebar-card h4 i {
    color: var(--edu-primary);
}

.content-info-list > div {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 13px;
    padding: 11px 0;
    border-bottom: 1px dashed #e4e8ef;
}

.content-info-list > div:last-child {
    border-bottom: 0;
}

.content-info-list span {
    color: var(--edu-muted);
    font-size: 11px;
}

.content-info-list strong {
    max-width: 62%;
    color: var(--edu-text);
    font-size: 11px;
    text-align: right;
}

.sidebar-category-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.sidebar-category-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 11px;
    color: #646f81;
    background: #f6f8fb;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
}

.sidebar-category-list a:hover,
.sidebar-category-list a.active {
    color: #ffffff;
    background: var(--edu-primary);
}

.sidebar-latest-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.sidebar-latest-item {
    display: flex;
    align-items: center;
    gap: 11px;
    text-decoration: none;
}

.sidebar-latest-image {
    width: 78px;
    height: 58px;
    flex: 0 0 78px;
    overflow: hidden;
    border-radius: 8px;
}

.sidebar-latest-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sidebar-latest-item span {
    color: var(--edu-primary);
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
}

.sidebar-latest-item h5 {
    margin: 3px 0 0;
    color: var(--edu-text);
    font-size: 11px;
    line-height: 1.45;
}


/* Related */

.related-card {
    height: 100%;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid var(--edu-border);
    border-radius: 15px;
    box-shadow: 0 9px 28px rgba(27, 39, 69, 0.07);
}

.related-image {
    position: relative;
    display: block;
    overflow: hidden;
    aspect-ratio: 16 / 9;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-image span {
    position: absolute;
    top: 12px;
    left: 12px;
    display: inline-flex;
    width: 38px;
    height: 38px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: var(--edu-primary);
    border-radius: 10px;
}

.related-body {
    padding: 16px;
}

.related-body small {
    color: var(--edu-primary);
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
}

.related-body h4 {
    margin: 7px 0 0;
    font-size: 14px;
    line-height: 1.45;
}

.related-body h4 a {
    color: var(--edu-text);
    text-decoration: none;
}

.btn-all-edukasi {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 18px;
    color: #ffffff;
    background: var(--edu-primary);
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
}

.btn-all-edukasi:hover {
    color: #ffffff;
    background: var(--edu-secondary);
}


/* Responsive */

@media (max-width: 991px) {
    .edukasi-sidebar {
        position: static;
    }

    .pdf-preview-wrapper {
        height: 600px;
    }
}

@media (max-width: 767px) {
    .detail-edukasi-header {
        padding-top: 28px;
    }

    .detail-header-card {
        padding: 30px 23px;
        border-radius: 19px;
    }

    .detail-header-card h1 {
        font-size: 29px;
    }

    .detail-meta {
        gap: 10px 14px;
    }

    .ebook-detail-showcase {
        padding: 24px 17px;
    }

    .ebook-detail-visual {
        min-height: 350px;
    }

    .ebook-detail-cover {
        width: 210px;
        height: 296px;
    }

    .ebook-detail-info h2 {
        font-size: 24px;
    }

    .ebook-properties {
        grid-template-columns: 1fr 1fr;
    }

    .ebook-preview-header,
    .infographic-toolbar,
    .edukasi-share {
        align-items: flex-start;
        flex-direction: column;
    }

    .pdf-preview-wrapper {
        height: 520px;
    }

    .edukasi-article {
        padding: 22px;
    }

    .infographic-preview {
        padding: 12px;
    }

    .image-zoom-hint {
        right: 22px;
        bottom: 22px;
    }
}
</style>


<?php
$this->registerJs("
    $('#copy-edukasi-link').on('click', function () {
        var button = $(this);
        var url = button.data('url');

        if (
            navigator.clipboard
            && navigator.clipboard.writeText
        ) {
            navigator.clipboard.writeText(url)
                .then(function () {
                    button.html(
                        '<i class=\"bi bi-check-lg\"></i>'
                    );

                    setTimeout(function () {
                        button.html(
                            '<i class=\"bi bi-link-45deg\"></i>'
                        );
                    }, 1800);
                });

            return;
        }

        var temporaryInput = $('<input>');

        $('body').append(temporaryInput);

        temporaryInput.val(url).select();

        document.execCommand('copy');

        temporaryInput.remove();

        button.html(
            '<i class=\"bi bi-check-lg\"></i>'
        );

        setTimeout(function () {
            button.html(
                '<i class=\"bi bi-link-45deg\"></i>'
            );
        }, 1800);
    });
");
?>