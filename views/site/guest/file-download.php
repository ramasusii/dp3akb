<?php

use yii\helpers\Html;
use yii\helpers\Url;

$baseDokumen = Yii::$app->request->baseUrl . '/web/dokumen/';

$kategoriDokumen = [
    'profil-data' => [
        'label' => 'Profil & Data',
        'icon' => 'bi-bar-chart-line',
        'deskripsi' => 'Publikasi profil, data gender dan anak, serta dokumen pembangunan keluarga.',
        'documents' => [
            [
                'title' => 'Profil Bangga Kencana Sumut 2025',
                'year' => '2025',
                'file' => 'profil-bangga-kencana-sumut-2025.pdf',
                'desc' => 'Profil Pembangunan Keluarga, Kependudukan dan Keluarga Berencana Provinsi Sumatera Utara.',
            ],
            [
                'title' => 'Data Gender & Anak 2022',
                'year' => '2022',
                'file' => 'data-gender-anak-sumut-2022.pdf',
                'desc' => 'Publikasi data gender dan anak Provinsi Sumatera Utara Tahun 2022.',
            ],
            [
                'title' => 'Data Gender & Anak 2021',
                'year' => '2021',
                'file' => 'data-gender-anak-sumut-2021.pdf',
                'desc' => 'Publikasi data gender dan anak Provinsi Sumatera Utara Tahun 2021.',
            ],
            [
                'title' => 'Profil Gender Sumut 2022',
                'year' => '2022',
                'file' => 'profil-gender-sumut-2022.pdf',
                'desc' => 'Profil Gender Provinsi Sumatera Utara Tahun 2022.',
            ],
            [
                'title' => 'Profil Anak Sumut 2022',
                'year' => '2022',
                'file' => 'profil-anak-sumut-2022.pdf',
                'desc' => 'Profil Anak Provinsi Sumatera Utara Tahun 2022.',
            ],
            [
                'title' => 'Profil Anak Sumut 2021',
                'year' => '2021',
                'file' => 'profil-anak-sumut-2021.pdf',
                'desc' => 'Profil Anak Provinsi Sumatera Utara Tahun 2021.',
            ],
        ],
    ],

    'kekerasan' => [
        'label' => 'Profil Kekerasan',
        'icon' => 'bi-shield-check',
        'deskripsi' => 'Dokumen profil dan data kekerasan terhadap perempuan dan anak.',
        'documents' => [
            [
                'title' => 'Profil Kekerasan 2025',
                'year' => '2025',
                'file' => 'kekerasan2025.pdf',
                'desc' => 'Profil kekerasan terhadap perempuan dan anak tahun 2025.',
            ],
            [
                'title' => 'Profil Kekerasan 2024',
                'year' => '2024',
                'file' => 'kekerasan2024.pdf',
                'desc' => 'Profil kekerasan terhadap perempuan dan anak tahun 2024.',
            ],
            [
                'title' => 'Profil Kekerasan 2023',
                'year' => '2023',
                'file' => 'kekerasan2023.pdf',
                'desc' => 'Profil kekerasan terhadap perempuan dan anak tahun 2023.',
            ],
        ],
    ],

    'perjanjian-kinerja' => [
        'label' => 'Perjanjian Kinerja',
        'icon' => 'bi-file-earmark-check',
        'deskripsi' => 'Dokumen Perjanjian Kinerja DP3AKB Provinsi Sumatera Utara.',
        'documents' => [
            [
                'title' => 'Perjanjian Kinerja 2026',
                'year' => '2026',
                'file' => 'pk2026.pdf',
                'desc' => 'Dokumen Perjanjian Kinerja Tahun 2026.',
            ],
            [
                'title' => 'Perjanjian Kinerja 2025',
                'year' => '2025',
                'file' => 'pk2025.pdf',
                'desc' => 'Dokumen Perjanjian Kinerja Tahun 2025.',
            ],
            [
                'title' => 'Perjanjian Kinerja 2024',
                'year' => '2024',
                'file' => 'pk2024.pdf',
                'desc' => 'Dokumen Perjanjian Kinerja Tahun 2024.',
            ],
        ],
    ],

    'renstra' => [
        'label' => 'Renstra',
        'icon' => 'bi-diagram-3',
        'deskripsi' => 'Dokumen Rencana Strategis sebagai arah kebijakan dan program dinas.',
        'documents' => [
            [
                'title' => 'Renstra 2025–2029',
                'year' => '2025–2029',
                'file' => 'renstra2025-2029.pdf',
                'desc' => 'Rencana Strategis DP3AKB Provinsi Sumatera Utara periode 2025–2029.',
            ],
            [
                'title' => 'Renstra 2024–2026',
                'year' => '2024–2026',
                'file' => 'renstra2024-2026.pdf',
                'desc' => 'Rencana Strategis DP3AKB Provinsi Sumatera Utara periode 2024–2026.',
            ],
        ],
    ],

    'lakip' => [
        'label' => 'LAKIP',
        'icon' => 'bi-clipboard-data',
        'deskripsi' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah.',
        'documents' => [
            [
                'title' => 'LAKIP 2025',
                'year' => '2025',
                'file' => 'lakip2025.pdf',
                'desc' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah Tahun 2025.',
            ],
            [
                'title' => 'LAKIP 2024',
                'year' => '2024',
                'file' => 'lakip2024.pdf',
                'desc' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah Tahun 2024.',
            ],
        ],
    ],

    'laporan-keuangan' => [
        'label' => 'Laporan Keuangan',
        'icon' => 'bi-cash-coin',
        'deskripsi' => 'Dokumen laporan keuangan dinas yang tersedia untuk publik.',
        'documents' => [
            [
                'title' => 'Laporan Keuangan 2023',
                'year' => '2023',
                'file' => 'lk2023.pdf',
                'desc' => 'Dokumen Laporan Keuangan Tahun 2023.',
            ],
            [
                'title' => 'Laporan Keuangan 2022',
                'year' => '2022',
                'file' => 'lk2022.pdf',
                'desc' => 'Dokumen Laporan Keuangan Tahun 2022.',
            ],
        ],
    ],

    'renja' => [
        'label' => 'Renja',
        'icon' => 'bi-calendar2-check',
        'deskripsi' => 'Dokumen Rencana Kerja tahunan DP3AKB Provinsi Sumatera Utara.',
        'documents' => [
            [
                'title' => 'Renja 2026',
                'year' => '2026',
                'file' => 'renja2026.pdf',
                'desc' => 'Rencana Kerja DP3AKB Provinsi Sumatera Utara Tahun 2026.',
            ],
            [
                'title' => 'Renja 2025',
                'year' => '2025',
                'file' => 'renja2025.pdf',
                'desc' => 'Rencana Kerja DP3AKB Provinsi Sumatera Utara Tahun 2025.',
            ],
            [
                'title' => 'Renja 2024',
                'year' => '2024',
                'file' => 'renja2024.pdf',
                'desc' => 'Rencana Kerja DP3AKB Provinsi Sumatera Utara Tahun 2024.',
            ],
            [
                'title' => 'Renja 2023',
                'year' => '2023',
                'file' => 'renja2023.pdf',
                'desc' => 'Rencana Kerja DP3AKB Provinsi Sumatera Utara Tahun 2023.',
            ],
        ],
    ],
];

$totalDokumen = 0;

foreach ($kategoriDokumen as $kategori) {
    $totalDokumen += count($kategori['documents']);
}

?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">File Download</h1>

            <nav class="breadcrumbs">
                <ol>
                    <li>
                        <a href="<?= Yii::$app->homeUrl ?>">
                            Beranda
                        </a>
                    </li>
                    <li class="current">
                        File Download
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->


    <!-- Document Center -->
    <section
        id="document-center"
        class="document-center section"
    >
        <div class="container">

            <!-- Hero -->
            <div
                class="document-hero"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <div class="document-hero-content">

                    <span class="document-eyebrow">
                        <i class="bi bi-folder2-open"></i>
                        Pusat Dokumen Publik
                    </span>

                    <h2>
                        Dokumen &amp; Publikasi
                        <span>DP3AKB Sumatera Utara</span>
                    </h2>

                    <p>
                        Temukan dan unduh dokumen resmi DP3AKB Provinsi
                        Sumatera Utara dalam satu halaman. Dokumen telah
                        dikelompokkan berdasarkan jenis agar lebih cepat
                        dan mudah ditemukan.
                    </p>

                    <div class="document-summary">

                        <div class="summary-item">
                            <strong><?= (int) $totalDokumen ?></strong>
                            <span>Dokumen</span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-item">
                            <strong><?= count($kategoriDokumen) ?></strong>
                            <span>Kategori</span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-item">
                            <strong>PDF</strong>
                            <span>Format Utama</span>
                        </div>

                    </div>

                </div>


                <div class="document-hero-art" aria-hidden="true">

                    <div class="hero-art-circle circle-one"></div>
                    <div class="hero-art-circle circle-two"></div>

                    <div class="hero-folder-card">
                        <div class="folder-icon">
                            <i class="bi bi-folder-fill"></i>
                        </div>

                        <div class="folder-lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="pdf-mini-badge">
                            PDF
                        </div>
                    </div>

                </div>

            </div>


            <!-- Toolbar -->
            <div
                class="document-toolbar"
                data-aos="fade-up"
                data-aos-delay="150"
            >

                <div class="document-search">
                    <i class="bi bi-search"></i>

                    <input
                        type="search"
                        id="documentSearch"
                        placeholder="Cari dokumen, tahun, atau kategori..."
                        autocomplete="off"
                        aria-label="Cari dokumen"
                    >

                    <button
                        type="button"
                        id="clearDocumentSearch"
                        class="clear-search"
                        aria-label="Hapus pencarian"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>


                <div class="document-filter">

                    <button
                        type="button"
                        class="filter-chip active"
                        data-filter="all"
                    >
                        Semua
                    </button>

                    <?php foreach ($kategoriDokumen as $slug => $kategori): ?>

                        <button
                            type="button"
                            class="filter-chip"
                            data-filter="<?= Html::encode($slug) ?>"
                        >
                            <?= Html::encode($kategori['label']) ?>
                        </button>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- Empty Search -->
            <div
                id="documentEmptyState"
                class="document-empty-state"
                hidden
            >
                <div class="empty-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>Dokumen tidak ditemukan</h3>

                <p>
                    Coba gunakan kata kunci atau kategori yang berbeda.
                </p>
            </div>


            <!-- Categories -->
            <div id="documentCategoryContainer">

                <?php foreach (
                    $kategoriDokumen as $slug => $kategori
                ): ?>

                    <section
                        class="document-category"
                        data-category="<?= Html::encode($slug) ?>"
                        data-category-label="<?= Html::encode(
                            $kategori['label']
                        ) ?>"
                    >

                        <div
                            class="category-heading"
                            data-aos="fade-up"
                        >

                            <div class="category-heading-icon">
                                <i class="bi <?= Html::encode(
                                    $kategori['icon']
                                ) ?>"></i>
                            </div>

                            <div class="category-heading-copy">
                                <span>
                                    Kategori Dokumen
                                </span>

                                <h3>
                                    <?= Html::encode(
                                        $kategori['label']
                                    ) ?>
                                </h3>

                                <p>
                                    <?= Html::encode(
                                        $kategori['deskripsi']
                                    ) ?>
                                </p>
                            </div>

                            <div class="category-count">
                                <?= count($kategori['documents']) ?>
                                <span>file</span>
                            </div>

                        </div>


                        <div class="row g-4">

                            <?php foreach (
                                $kategori['documents'] as $index => $dokumen
                            ): ?>

                                <?php
                                $searchText = strtolower(
                                    implode(' ', [
                                        $dokumen['title'],
                                        $dokumen['year'],
                                        $dokumen['desc'],
                                        $kategori['label'],
                                    ])
                                );
                                ?>

                                <div
                                    class="col-xl-3 col-lg-4 col-md-6 document-card-column"
                                    data-search="<?= Html::encode(
                                        $searchText
                                    ) ?>"
                                >
                                    <article
                                        class="document-card"
                                        data-aos="fade-up"
                                        data-aos-delay="<?= 80 + ($index * 40) ?>"
                                    >

                                        <div class="document-card-top">

                                            <div class="document-file-icon">
                                                <i class="bi bi-file-earmark-pdf-fill"></i>
                                            </div>

                                            <span class="document-year">
                                                <?= Html::encode(
                                                    $dokumen['year']
                                                ) ?>
                                            </span>

                                        </div>


                                        <div class="document-card-body">

                                            <span class="document-type">
                                                <?= Html::encode(
                                                    $kategori['label']
                                                ) ?>
                                            </span>

                                            <h4>
                                                <?= Html::encode(
                                                    $dokumen['title']
                                                ) ?>
                                            </h4>

                                            <p>
                                                <?= Html::encode(
                                                    $dokumen['desc']
                                                ) ?>
                                            </p>

                                        </div>


                                        <div class="document-card-footer">

                                            <span class="format-label">
                                                <i class="bi bi-filetype-pdf"></i>
                                                PDF
                                            </span>

                                            <a
                                                href="<?= Html::encode(
                                                    $baseDokumen
                                                    . $dokumen['file']
                                                ) ?>"
                                                class="document-download"
                                                download
                                                aria-label="Download <?= Html::encode(
                                                    $dokumen['title']
                                                ) ?>"
                                            >
                                                <span>Download</span>
                                                <i class="bi bi-arrow-down-circle"></i>
                                            </a>

                                        </div>

                                    </article>
                                </div>

                            <?php endforeach; ?>

                        </div>

                    </section>

                <?php endforeach; ?>

            </div>


            <!-- Bottom Note -->
            <div
                class="document-note"
                data-aos="fade-up"
            >
                <div class="document-note-icon">
                    <i class="bi bi-info-lg"></i>
                </div>

                <div>
                    <strong>
                        Informasi Dokumen
                    </strong>

                    <p>
                        Seluruh dokumen pada halaman ini merupakan
                        dokumen publik DP3AKB Provinsi Sumatera Utara.
                        Klik tombol Download untuk menyimpan file
                        langsung ke perangkat Anda.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- /Document Center -->

</main>


<style>
/* =========================================================
   DOCUMENT CENTER
========================================================= */

#document-center {
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(
            circle at 92% 5%,
            rgba(7, 37, 133, 0.055),
            transparent 24%
        ),
        linear-gradient(
            180deg,
            #ffffff 0%,
            #f8faff 45%,
            #ffffff 100%
        );
}


/* =========================================================
   HERO
========================================================= */

.document-hero {
    position: relative;
    display: grid;
    min-height: 330px;
    margin-bottom: 32px;
    padding: 46px 48px;
    grid-template-columns:
        minmax(0, 1.35fr)
        minmax(260px, 0.65fr);
    gap: 38px;
    align-items: center;
    overflow: hidden;
    color: #ffffff;
    background:
        radial-gradient(
            circle at 78% 20%,
            rgba(255, 255, 255, 0.12),
            transparent 20%
        ),
        linear-gradient(
            135deg,
            #061d69 0%,
            #0b3498 65%,
            #174bc8 100%
        );
    border-radius: 30px;
    box-shadow:
        0 28px 70px rgba(7, 37, 133, 0.23);
}

.document-hero::after {
    position: absolute;
    bottom: -115px;
    left: -80px;
    width: 260px;
    height: 260px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    content: "";
}

.document-hero-content {
    position: relative;
    z-index: 3;
}

.document-eyebrow {
    display: inline-flex;
    margin-bottom: 16px;
    padding: 8px 13px;
    align-items: center;
    gap: 8px;
    color: #ffffff;
    background: rgba(255, 255, 255, 0.10);
    border: 1px solid rgba(255, 255, 255, 0.16);
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.25px;
    text-transform: uppercase;
    backdrop-filter: blur(10px);
}

.document-hero h2 {
    max-width: 700px;
    margin: 0 0 17px;
    color: #ffffff;
    font-size: clamp(34px, 4vw, 50px);
    font-weight: 820;
    line-height: 1.1;
    letter-spacing: -1px;
}

.document-hero h2 span {
    display: block;
    color: #f7c762;
}

.document-hero p {
    max-width: 690px;
    margin: 0;
    color: rgba(255, 255, 255, 0.75);
    font-size: 14px;
    line-height: 1.85;
}

.document-summary {
    display: flex;
    margin-top: 27px;
    align-items: center;
    gap: 20px;
}

.summary-item strong,
.summary-item span {
    display: block;
}

.summary-item strong {
    margin-bottom: 2px;
    color: #ffffff;
    font-size: 22px;
    font-weight: 820;
}

.summary-item span {
    color: rgba(255, 255, 255, 0.61);
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 0.75px;
    text-transform: uppercase;
}

.summary-divider {
    width: 1px;
    height: 37px;
    background: rgba(255, 255, 255, 0.15);
}


/* Hero illustration */

.document-hero-art {
    position: relative;
    z-index: 2;
    display: flex;
    min-height: 220px;
    align-items: center;
    justify-content: center;
}

.hero-art-circle {
    position: absolute;
    border-radius: 50%;
}

.circle-one {
    width: 235px;
    height: 235px;
    background: rgba(255, 255, 255, 0.055);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.circle-two {
    width: 168px;
    height: 168px;
    background: rgba(255, 255, 255, 0.055);
    border: 1px solid rgba(255, 255, 255, 0.12);
}

.hero-folder-card {
    position: relative;
    z-index: 3;
    width: 175px;
    padding: 23px;
    background: rgba(255, 255, 255, 0.96);
    border-radius: 24px;
    box-shadow:
        0 22px 45px rgba(0, 0, 0, 0.22);
    transform: rotate(-4deg);
}

.folder-icon {
    display: flex;
    width: 58px;
    height: 58px;
    margin-bottom: 19px;
    align-items: center;
    justify-content: center;
    color: #f4a52d;
    background: #fff6e7;
    border-radius: 16px;
    font-size: 29px;
}

.folder-lines {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.folder-lines span {
    display: block;
    height: 7px;
    background: #e7ebf3;
    border-radius: 999px;
}

.folder-lines span:nth-child(1) {
    width: 88%;
}

.folder-lines span:nth-child(2) {
    width: 68%;
}

.folder-lines span:nth-child(3) {
    width: 76%;
}

.pdf-mini-badge {
    position: absolute;
    top: -12px;
    right: -12px;
    display: flex;
    width: 48px;
    height: 48px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: #b4232f;
    border: 5px solid #0b3498;
    border-radius: 50%;
    font-size: 10px;
    font-weight: 850;
    letter-spacing: 0.5px;
}


/* =========================================================
   TOOLBAR
========================================================= */

.document-toolbar {
    position: relative;
    z-index: 5;
    margin-bottom: 52px;
    padding: 18px;
    background: #ffffff;
    border: 1px solid #e0e6f0;
    border-radius: 20px;
    box-shadow:
        0 14px 38px rgba(19, 34, 75, 0.07);
}

.document-search {
    position: relative;
    display: flex;
    max-width: 650px;
    margin: 0 auto 17px;
    align-items: center;
}

.document-search > i {
    position: absolute;
    left: 17px;
    z-index: 3;
    color: #788396;
    font-size: 15px;
}

.document-search input {
    width: 100%;
    height: 50px;
    padding:
        0 50px
        0 45px;
    color: #253047;
    background: #f7f9fc;
    border: 1px solid #dfe5ef;
    border-radius: 14px;
    outline: none;
    font-size: 13px;
    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.document-search input:focus {
    background: #ffffff;
    border-color: rgba(7, 37, 133, 0.35);
    box-shadow:
        0 0 0 4px rgba(7, 37, 133, 0.07);
}

.clear-search {
    position: absolute;
    right: 8px;
    display: flex;
    width: 35px;
    height: 35px;
    align-items: center;
    justify-content: center;
    color: #8a94a5;
    background: transparent;
    border: 0;
    border-radius: 9px;
    font-size: 12px;
}

.clear-search:hover {
    color: #072585;
    background: #edf2ff;
}

.document-filter {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
}

.filter-chip {
    padding: 8px 13px;
    color: #6a7587;
    background: #ffffff;
    border: 1px solid #dde4ef;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 750;
    transition:
        color 0.2s ease,
        background 0.2s ease,
        border-color 0.2s ease,
        transform 0.2s ease;
}

.filter-chip:hover,
.filter-chip.active {
    color: #ffffff;
    background: #072585;
    border-color: #072585;
}

.filter-chip:hover {
    transform: translateY(-1px);
}


/* =========================================================
   CATEGORY
========================================================= */

.document-category {
    margin-bottom: 72px;
}

.document-category:last-child {
    margin-bottom: 35px;
}

.category-heading {
    display: flex;
    margin-bottom: 23px;
    padding-bottom: 18px;
    align-items: center;
    gap: 16px;
    border-bottom: 1px solid #e6eaf1;
}

.category-heading-icon {
    display: flex;
    width: 54px;
    height: 54px;
    flex: 0 0 54px;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background:
        linear-gradient(
            135deg,
            #072585,
            #174bc8
        );
    border-radius: 16px;
    box-shadow:
        0 10px 22px rgba(7, 37, 133, 0.18);
    font-size: 21px;
}

.category-heading-copy {
    flex: 1;
}

.category-heading-copy > span {
    display: block;
    margin-bottom: 2px;
    color: #8791a2;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.category-heading h3 {
    margin: 0 0 3px;
    color: #202b40;
    font-size: 23px;
    font-weight: 800;
}

.category-heading p {
    margin: 0;
    color: #737e90;
    font-size: 12px;
    line-height: 1.6;
}

.category-count {
    display: flex;
    min-width: 58px;
    height: 58px;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: #072585;
    background: #eef3ff;
    border: 1px solid #dae4fa;
    border-radius: 15px;
    font-size: 18px;
    font-weight: 850;
    line-height: 1;
}

.category-count span {
    margin-top: 4px;
    color: #758096;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 0.7px;
    text-transform: uppercase;
}


/* =========================================================
   DOCUMENT CARD
========================================================= */

.document-card {
    display: flex;
    height: 100%;
    min-height: 218px;
    padding: 18px;
    flex-direction: column;
    overflow: hidden;
    background:
        radial-gradient(
            circle at 94% 5%,
            rgba(7, 37, 133, 0.045),
            transparent 25%
        ),
        #ffffff;
    border: 1px solid #e0e6ef;
    border-radius: 20px;
    box-shadow:
        0 12px 32px rgba(19, 34, 75, 0.06);
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
}

.document-card:hover {
    border-color: #ccd9f2;
    box-shadow:
        0 21px 46px rgba(7, 37, 133, 0.12);
    transform: translateY(-6px);
}

.document-card-top {
    display: flex;
    margin-bottom: 13px;
    align-items: center;
    justify-content: space-between;
}

.document-file-icon {
    display: flex;
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    color: #b4232f;
    background: #fff1f2;
    border: 1px solid #f5d8db;
    border-radius: 12px;
    font-size: 18px;
}

.document-year {
    display: inline-flex;
    padding: 6px 9px;
    color: #072585;
    background: #edf2ff;
    border: 1px solid #dbe5fb;
    border-radius: 999px;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 0.5px;
}

.document-card-body {
    flex: 1;
}

.document-type {
    display: block;
    margin-bottom: 5px;
    color: #8a94a5;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.document-card h4 {
    margin: 0 0 7px;
    color: #202a3e;
    font-size: 15px;
    font-weight: 780;
    line-height: 1.42;
}

.document-card p {
    margin: 0;
    color: #737e90;
    font-size: 11px;
    line-height: 1.6;
}

.document-card-footer {
    display: flex;
    margin-top: 15px;
    padding-top: 12px;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    border-top: 1px solid #edf0f5;
}

.format-label {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #8a94a5;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

.document-download {
    display: inline-flex;
    min-height: 34px;
    padding: 7px 10px;
    align-items: center;
    justify-content: center;
    gap: 7px;
    color: #ffffff !important;
    background:
        linear-gradient(
            135deg,
            #072585,
            #174bc8
        );
    border-radius: 10px;
    box-shadow:
        0 8px 18px rgba(7, 37, 133, 0.16);
    font-size: 10px;
    font-weight: 760;
    text-decoration: none !important;
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.document-download:hover {
    color: #ffffff !important;
    box-shadow:
        0 12px 24px rgba(7, 37, 133, 0.23);
    transform: translateY(-2px);
}


/* =========================================================
   NOTE & EMPTY STATE
========================================================= */

.document-note {
    display: flex;
    max-width: 860px;
    margin: 0 auto;
    padding: 22px 24px;
    align-items: flex-start;
    gap: 14px;
    background: #f3f6fd;
    border: 1px solid #dce5f5;
    border-radius: 18px;
}

.document-note-icon {
    display: flex;
    width: 40px;
    height: 40px;
    flex: 0 0 40px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: #ffffff;
    border-radius: 12px;
    box-shadow:
        0 6px 14px rgba(7, 37, 133, 0.08);
}

.document-note strong {
    display: block;
    margin-bottom: 3px;
    color: #263147;
    font-size: 12px;
}

.document-note p {
    margin: 0;
    color: #717c8e;
    font-size: 11.5px;
    line-height: 1.7;
}

.document-empty-state {
    padding: 60px 20px;
    text-align: center;
}

.empty-icon {
    display: flex;
    width: 64px;
    height: 64px;
    margin: 0 auto 15px;
    align-items: center;
    justify-content: center;
    color: #072585;
    background: #edf2ff;
    border-radius: 50%;
    font-size: 23px;
}

.document-empty-state h3 {
    margin-bottom: 5px;
    color: #263147;
    font-size: 20px;
}

.document-empty-state p {
    color: #788396;
    font-size: 13px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .document-hero {
        padding: 38px 32px;
        grid-template-columns: 1fr;
    }

    .document-hero-art {
        display: none;
    }

    .document-toolbar {
        margin-bottom: 42px;
    }
}

@media (max-width: 767px) {

    #document-center {
        padding-top: 42px;
    }

    .document-hero {
        min-height: 0;
        margin-bottom: 23px;
        padding: 30px 22px;
        border-radius: 22px;
    }

    .document-hero h2 {
        font-size: 31px;
    }

    .document-hero p {
        font-size: 13px;
        line-height: 1.75;
    }

    .document-summary {
        gap: 13px;
    }

    .summary-item strong {
        font-size: 18px;
    }

    .document-toolbar {
        padding: 14px;
        border-radius: 17px;
    }

    .document-filter {
        justify-content: flex-start;
    }

    .category-heading {
        align-items: flex-start;
    }

    .category-heading-icon {
        width: 47px;
        height: 47px;
        flex-basis: 47px;
        border-radius: 14px;
        font-size: 18px;
    }

    .category-heading h3 {
        font-size: 20px;
    }

    .category-count {
        display: none;
    }

    .document-category {
        margin-bottom: 55px;
    }

    .document-card {
        min-height: 0;
        padding: 20px;
        border-radius: 18px;
    }
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('documentSearch');
    const clearButton = document.getElementById('clearDocumentSearch');
    const filterButtons = Array.from(
        document.querySelectorAll('.filter-chip')
    );

    const categories = Array.from(
        document.querySelectorAll('.document-category')
    );

    const emptyState = document.getElementById(
        'documentEmptyState'
    );

    let activeFilter = 'all';


    function normalizeText(value) {
        return (value || '')
            .toString()
            .toLowerCase()
            .trim();
    }


    function updateDocuments() {

        const query = normalizeText(searchInput.value);
        let totalVisible = 0;

        categories.forEach(function (category) {

            const categorySlug =
                category.dataset.category;

            const categoryMatches =
                activeFilter === 'all'
                || activeFilter === categorySlug;

            const cards = Array.from(
                category.querySelectorAll(
                    '.document-card-column'
                )
            );

            let visibleInCategory = 0;

            cards.forEach(function (column) {

                const searchText =
                    normalizeText(
                        column.dataset.search
                    );

                const searchMatches =
                    query === ''
                    || searchText.includes(query);

                const visible =
                    categoryMatches
                    && searchMatches;

                column.hidden = !visible;

                if (visible) {
                    visibleInCategory++;
                    totalVisible++;
                }
            });

            category.hidden =
                visibleInCategory === 0;
        });

        emptyState.hidden =
            totalVisible !== 0;
    }


    filterButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            function () {

                activeFilter =
                    this.dataset.filter;

                filterButtons.forEach(
                    function (item) {
                        item.classList.remove(
                            'active'
                        );
                    }
                );

                this.classList.add('active');

                updateDocuments();
            }
        );
    });


    searchInput.addEventListener(
        'input',
        updateDocuments
    );


    clearButton.addEventListener(
        'click',
        function () {

            searchInput.value = '';
            searchInput.focus();

            updateDocuments();
        }
    );

});
</script>