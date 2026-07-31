<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $pegawaiList app\models\Pegawai[] */

$this->title = 'Data Pegawai';

/**
 * Mengubah jenis pegawai menjadi class filter.
 */
$getFilterClass = function ($jenisPegawai) {
    $jenisPegawai = strtoupper(
        trim((string) $jenisPegawai)
    );

    if ($jenisPegawai === 'PPPK') {
        return 'filter-pppk';
    }

    if (
        $jenisPegawai === 'NON-ASN'
        || $jenisPegawai === 'NON ASN'
        || $jenisPegawai === 'NONASN'
    ) {
        return 'filter-nonasn';
    }

    return 'filter-asn';
};

/**
 * Label jenis pegawai.
 */
$getJenisLabel = function ($jenisPegawai) {
    $jenisPegawai = strtoupper(
        trim((string) $jenisPegawai)
    );

    if (
        $jenisPegawai === 'NON-ASN'
        || $jenisPegawai === 'NON ASN'
        || $jenisPegawai === 'NONASN'
    ) {
        return 'Non-ASN';
    }

    if ($jenisPegawai === 'PPPK') {
        return 'PPPK';
    }

    return 'ASN';
};

/**
 * Link WhatsApp.
 */
$getWhatsappUrl = function ($nomor) {
    if (empty($nomor)) {
        return null;
    }

    $nomor = preg_replace(
        '/[^0-9]/',
        '',
        $nomor
    );

    if (empty($nomor)) {
        return null;
    }

    if (substr($nomor, 0, 1) === '0') {
        $nomor = '62' . substr($nomor, 1);
    }

    return 'https://wa.me/' . $nomor;
};
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">

        <div
            class="container d-lg-flex justify-content-between align-items-center"
        >

            <h1 class="mb-2 mb-lg-0">
                Data Pegawai
            </h1>

            <nav class="breadcrumbs">

                <ol>

                    <li>
                        <a href="<?= Yii::$app->homeUrl ?>">
                            Beranda
                        </a>
                    </li>

                    <li class="current">
                        Data Pegawai
                    </li>

                </ol>

            </nav>

        </div>

    </div>
    <!-- End Page Title -->


    <!-- Data Pegawai Section -->
    <section
        id="dummy-indo"
        class="faculty--staff section"
    >

        <div
            class="container"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <div
                class="pegawai-layout"
                data-default-filter="*"
            >

                <!-- Toolbar -->
                <div class="row mb-4">

                    <div class="col-12">

                        <div
                            class="toolbar d-flex flex-wrap align-items-center justify-content-between gap-3"
                        >

                            <!-- Filter Jenis Pegawai -->
                            <ul
                                id="pegawai-filter-tabs"
                                class="category-tabs d-flex flex-wrap"
                                data-aos="fade-right"
                                data-aos-delay="150"
                            >

                                <li
                                    data-filter="*"
                                    class="filter-active"
                                >
                                    Semua
                                </li>

                                <li data-filter=".filter-asn">
                                    ASN
                                </li>

                                <li data-filter=".filter-pppk">
                                    PPPK
                                </li>

                                <li data-filter=".filter-nonasn">
                                    Non-ASN
                                </li>

                            </ul>
                            <!-- End Filter Jenis Pegawai -->


                            <!-- Pencarian -->
                            <div
                                class="search-box"
                                data-aos="fade-left"
                                data-aos-delay="150"
                            >

                                <i class="bi bi-search"></i>

                                <input
                                    type="text"
                                    id="pegawai-search"
                                    placeholder="Cari nama, jabatan, atau NIP..."
                                    autocomplete="off"
                                    aria-label="Cari data pegawai"
                                >

                                <button
                                    type="button"
                                    id="pegawai-search-clear"
                                    class="pegawai-search-clear"
                                    aria-label="Hapus pencarian"
                                    title="Hapus pencarian"
                                    style="display: none;"
                                >
                                    <i class="bi bi-x-lg"></i>
                                </button>

                            </div>
                            <!-- End Pencarian -->

                        </div>

                    </div>

                </div>
                <!-- End Toolbar -->


                <!-- Informasi Hasil -->
                <div class="row mb-4">

                    <div class="col-12">

                        <div
                            class="pegawai-result-info d-flex flex-wrap align-items-center justify-content-between gap-2"
                        >

                            <p class="text-muted mb-0">

                                Menampilkan

                                <strong id="pegawai-visible-count">
                                    <?= count($pegawaiList) ?>
                                </strong>

                                dari

                                <strong id="pegawai-total-count">
                                    <?= count($pegawaiList) ?>
                                </strong>

                                pegawai aktif.

                            </p>

                            <span
                                id="pegawai-active-filter-label"
                                class="pegawai-active-filter-label"
                            >
                                Semua Pegawai
                            </span>

                        </div>

                    </div>

                </div>
                <!-- End Informasi Hasil -->


                <!-- Pegawai Container -->
                <div
                    class="row g-4"
                    id="pegawai-container"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >

                    <?php if (!empty($pegawaiList)): ?>

                        <?php foreach (
                            $pegawaiList
                            as $pegawai
                        ): ?>

                            <?php
                            $filterClass = $getFilterClass(
                                $pegawai->jenis_pegawai
                            );

                            $jenisLabel = $getJenisLabel(
                                $pegawai->jenis_pegawai
                            );

                            $searchText = strtolower(
                                trim(
                                    (string) $pegawai->nama
                                    . ' '
                                    . (string) $pegawai->nip
                                    . ' '
                                    . (string) $pegawai->jabatan
                                    . ' '
                                    . (string) $pegawai
                                        ->pangkat_golongan
                                    . ' '
                                    . (string) $pegawai->unit_kerja
                                    . ' '
                                    . (string) $pegawai
                                        ->jenis_pegawai
                                )
                            );

                            $whatsappUrl = $getWhatsappUrl(
                                $pegawai->whatsapp
                            );
                            ?>

                            <div
                                class="col-lg-6 pegawai-item <?= Html::encode(
                                    $filterClass
                                ) ?>"
                                data-search="<?= Html::encode(
                                    $searchText
                                ) ?>"
                                data-category="<?= Html::encode(
                                    $filterClass
                                ) ?>"
                            >

                                <div class="member-card d-flex">

                                    <!-- Foto Pegawai -->
                                    <div class="member-avatar">

                                        <?= Html::img(
                                            $pegawai->getFotoUrl(),
                                            [
                                                'class' => 'img-fluid',
                                                'alt' => 'Foto '
                                                    . $pegawai->nama,
                                                'loading' => 'lazy',
                                                'style' => '
                                                    width: 100%;
                                                    aspect-ratio: 1 / 1;
                                                    object-fit: cover;
                                                ',
                                            ]
                                        ) ?>

                                    </div>
                                    <!-- End Foto Pegawai -->


                                    <!-- Detail Pegawai -->
                                    <div class="member-details">

                                        <h4>

                                            <?= Html::encode(
                                                $pegawai->nama
                                            ) ?>

                                        </h4>

                                        <span class="role">

                                            <?= !empty(
                                                $pegawai->jabatan
                                            )
                                                ? Html::encode(
                                                    $pegawai->jabatan
                                                )
                                                : 'Jabatan belum tersedia' ?>

                                        </span>

                                        <p class="dept">

                                            <i class="bi bi-id-card"></i>

                                            NIP:

                                            <?= !empty($pegawai->nip)
                                                ? Html::encode(
                                                    $pegawai->nip
                                                )
                                                : '-' ?>

                                        </p>

                                        <div class="expertise">

                                            <span>
                                                <?= Html::encode(
                                                    $jenisLabel
                                                ) ?>
                                            </span>

                                            <?php if (
                                                !empty(
                                                    $pegawai
                                                        ->pangkat_golongan
                                                )
                                            ): ?>

                                                <span>

                                                    <?= Html::encode(
                                                        $pegawai
                                                            ->pangkat_golongan
                                                    ) ?>

                                                </span>

                                            <?php endif; ?>

                                            <?php if (
                                                !empty(
                                                    $pegawai->unit_kerja
                                                )
                                            ): ?>

                                                <span>

                                                    <?= Html::encode(
                                                        $pegawai
                                                            ->unit_kerja
                                                    ) ?>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div
                                            class="member-footer d-flex align-items-center justify-content-between"
                                        >

                                            <div class="socials">

                                                <?php if (
                                                    !empty(
                                                        $pegawai->email
                                                    )
                                                ): ?>

                                                    <a
                                                        href="mailto:<?= Html::encode(
                                                            $pegawai->email
                                                        ) ?>"
                                                        title="Kirim Email"
                                                        aria-label="Email <?= Html::encode(
                                                            $pegawai->nama
                                                        ) ?>"
                                                    >

                                                        <i
                                                            class="bi bi-envelope-fill"
                                                        ></i>

                                                    </a>

                                                <?php endif; ?>

                                                <?php if (
                                                    $whatsappUrl !== null
                                                ): ?>

                                                    <a
                                                        href="<?= Html::encode(
                                                            $whatsappUrl
                                                        ) ?>"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        title="Hubungi WhatsApp"
                                                        aria-label="WhatsApp <?= Html::encode(
                                                            $pegawai->nama
                                                        ) ?>"
                                                    >

                                                        <i
                                                            class="bi bi-whatsapp"
                                                        ></i>

                                                    </a>

                                                <?php endif; ?>

                                            </div>

                                            <a
                                                href="javascript:void(0)"
                                                class="details-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#pegawaiModal<?= (int) $pegawai->id ?>"
                                            >

                                                Detail Profil

                                                <i
                                                    class="bi bi-arrow-right"
                                                ></i>

                                            </a>

                                        </div>

                                    </div>
                                    <!-- End Detail Pegawai -->

                                </div>

                            </div>


                            <!-- Modal Detail Pegawai -->
                            <div
                                class="modal fade"
                                id="pegawaiModal<?= (int) $pegawai->id ?>"
                                tabindex="-1"
                                aria-labelledby="pegawaiModalLabel<?= (int) $pegawai->id ?>"
                                aria-hidden="true"
                            >

                                <div
                                    class="modal-dialog modal-dialog-centered modal-lg"
                                >

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5
                                                class="modal-title"
                                                id="pegawaiModalLabel<?= (int) $pegawai->id ?>"
                                            >
                                                Detail Profil Pegawai
                                            </h5>

                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Tutup"
                                            ></button>

                                        </div>

                                        <div class="modal-body">

                                            <div class="row g-4">

                                                <div
                                                    class="col-md-4 text-center"
                                                >

                                                    <?= Html::img(
                                                        $pegawai
                                                            ->getFotoUrl(),
                                                        [
                                                            'class'
                                                                => 'img-fluid rounded',
                                                            'alt'
                                                                => $pegawai
                                                                    ->nama,
                                                            'style' => '
                                                                width: 100%;
                                                                max-width: 260px;
                                                                aspect-ratio: 1 / 1;
                                                                object-fit: cover;
                                                            ',
                                                        ]
                                                    ) ?>

                                                </div>

                                                <div class="col-md-8">

                                                    <h4>

                                                        <?= Html::encode(
                                                            $pegawai
                                                                ->nama
                                                        ) ?>

                                                    </h4>

                                                    <p class="text-muted">

                                                        <?= !empty(
                                                            $pegawai
                                                                ->jabatan
                                                        )
                                                            ? Html::encode(
                                                                $pegawai
                                                                    ->jabatan
                                                            )
                                                            : '-' ?>

                                                    </p>

                                                    <div
                                                        class="table-responsive"
                                                    >

                                                        <table
                                                            class="table table-bordered"
                                                        >

                                                            <tbody>

                                                                <tr>

                                                                    <th
                                                                        style="width: 35%;"
                                                                    >
                                                                        NIP
                                                                    </th>

                                                                    <td>

                                                                        <?= !empty(
                                                                            $pegawai
                                                                                ->nip
                                                                        )
                                                                            ? Html::encode(
                                                                                $pegawai
                                                                                    ->nip
                                                                            )
                                                                            : '-' ?>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <th>
                                                                        Jenis Pegawai
                                                                    </th>

                                                                    <td>

                                                                        <?= Html::encode(
                                                                            $jenisLabel
                                                                        ) ?>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <th>
                                                                        Jabatan
                                                                    </th>

                                                                    <td>

                                                                        <?= !empty(
                                                                            $pegawai
                                                                                ->jabatan
                                                                        )
                                                                            ? Html::encode(
                                                                                $pegawai
                                                                                    ->jabatan
                                                                            )
                                                                            : '-' ?>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <th>
                                                                        Pangkat/Golongan
                                                                    </th>

                                                                    <td>

                                                                        <?= !empty(
                                                                            $pegawai
                                                                                ->pangkat_golongan
                                                                        )
                                                                            ? Html::encode(
                                                                                $pegawai
                                                                                    ->pangkat_golongan
                                                                            )
                                                                            : '-' ?>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <th>
                                                                        Unit Kerja
                                                                    </th>

                                                                    <td>

                                                                        <?= !empty(
                                                                            $pegawai
                                                                                ->unit_kerja
                                                                        )
                                                                            ? Html::encode(
                                                                                $pegawai
                                                                                    ->unit_kerja
                                                                            )
                                                                            : '-' ?>

                                                                    </td>

                                                                </tr>

                                                                <?php if (
                                                                    !empty(
                                                                        $pegawai
                                                                            ->email
                                                                    )
                                                                ): ?>

                                                                    <tr>

                                                                        <th>
                                                                            Email
                                                                        </th>

                                                                        <td>

                                                                            <a
                                                                                href="mailto:<?= Html::encode(
                                                                                    $pegawai
                                                                                        ->email
                                                                                ) ?>"
                                                                            >

                                                                                <?= Html::encode(
                                                                                    $pegawai
                                                                                        ->email
                                                                                ) ?>

                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                <?php endif; ?>

                                                                <?php if (
                                                                    $whatsappUrl
                                                                    !== null
                                                                ): ?>

                                                                    <tr>

                                                                        <th>
                                                                            WhatsApp
                                                                        </th>

                                                                        <td>

                                                                            <a
                                                                                href="<?= Html::encode(
                                                                                    $whatsappUrl
                                                                                ) ?>"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer"
                                                                            >

                                                                                <?= Html::encode(
                                                                                    $pegawai
                                                                                        ->whatsapp
                                                                                ) ?>

                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                <?php endif; ?>

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                Tutup
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Modal Detail Pegawai -->

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="col-12">

                            <div
                                class="alert alert-info text-center"
                            >
                                Belum ada data pegawai aktif.
                            </div>

                        </div>

                    <?php endif; ?>

                </div>
                <!-- End Pegawai Container -->


                <!-- Hasil Kosong -->
                <div
                    id="pegawai-empty-result"
                    class="pegawai-empty-result"
                    style="display: none;"
                >

                    <div class="pegawai-empty-icon">

                        <i class="bi bi-person-x"></i>

                    </div>

                    <h4>
                        Pegawai Tidak Ditemukan
                    </h4>

                    <p>
                        Tidak ada data pegawai yang sesuai dengan
                        kata kunci atau kategori yang dipilih.
                    </p>

                    <button
                        type="button"
                        id="pegawai-reset-filter"
                        class="btn btn-outline-primary rounded-pill px-4"
                    >
                        <i class="bi bi-arrow-counterclockwise"></i>

                        Reset Pencarian
                    </button>

                </div>
                <!-- End Hasil Kosong -->

            </div>

        </div>

    </section>
    <!-- End Data Pegawai Section -->

</main>


<style>
/* =========================================================
   PENCARIAN PEGAWAI
========================================================= */

#dummy-indo .search-box {
    position: relative !important;
    display: flex !important;
    min-width: 310px !important;
    align-items: center !important;
}

#dummy-indo .search-box > i {
    position: absolute !important;
    left: 16px !important;
    z-index: 2 !important;
    color: #7d8798 !important;
    pointer-events: none !important;
}

#dummy-indo .search-box input {
    width: 100% !important;
    padding: 12px 45px 12px 44px !important;
    color: #273044 !important;
    background: #ffffff !important;
    border: 1px solid #dce2ec !important;
    border-radius: 999px !important;
    box-shadow: 0 7px 22px rgba(27, 39, 69, 0.06) !important;
    font-size: 14px !important;
    outline: none !important;
    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease !important;
}

#dummy-indo .search-box input:focus {
    border-color: #072585 !important;
    box-shadow:
        0 0 0 4px rgba(7, 37, 133, 0.1),
        0 9px 24px rgba(27, 39, 69, 0.08) !important;
}

#dummy-indo .pegawai-search-clear {
    position: absolute !important;
    right: 12px !important;
    z-index: 3 !important;
    display: inline-flex;
    width: 29px !important;
    height: 29px !important;
    align-items: center !important;
    justify-content: center !important;
    color: #687284 !important;
    background: #eef1f6 !important;
    border: 0 !important;
    border-radius: 50% !important;
    cursor: pointer !important;
    font-size: 12px !important;
}

#dummy-indo .pegawai-search-clear:hover {
    color: #ffffff !important;
    background: #072585 !important;
}


/* Filter */

#dummy-indo #pegawai-filter-tabs {
    margin: 0 !important;
    padding: 0 !important;
    gap: 8px !important;
    list-style: none !important;
}

#dummy-indo #pegawai-filter-tabs li {
    padding: 9px 17px !important;
    color: #5f6878 !important;
    background: #f4f6fa !important;
    border: 1px solid #e1e6ef !important;
    border-radius: 999px !important;
    cursor: pointer !important;
    font-size: 13px !important;
    font-weight: 700 !important;
    transition: all 0.25s ease !important;
}

#dummy-indo #pegawai-filter-tabs li:hover,
#dummy-indo #pegawai-filter-tabs li.filter-active {
    color: #ffffff !important;
    background: #072585 !important;
    border-color: #072585 !important;
    box-shadow: 0 8px 19px rgba(7, 37, 133, 0.19) !important;
}


/* Informasi Hasil */

#dummy-indo .pegawai-result-info {
    padding: 14px 18px !important;
    background: #f8faff !important;
    border: 1px solid #e3e9f4 !important;
    border-radius: 12px !important;
}

#dummy-indo .pegawai-active-filter-label {
    display: inline-flex !important;
    align-items: center !important;
    padding: 6px 12px !important;
    color: #072585 !important;
    background: #eaf0ff !important;
    border-radius: 999px !important;
    font-size: 12px !important;
    font-weight: 700 !important;
}


/* Animasi Hasil */

#pegawai-container .pegawai-item {
    opacity: 1;
    transform: translateY(0);
    transition:
        opacity 0.25s ease,
        transform 0.25s ease !important;
}

#pegawai-container .pegawai-item.pegawai-hidden {
    display: none !important;
}


/* Hasil Kosong */

#dummy-indo .pegawai-empty-result {
    margin-top: 35px !important;
    padding: 45px 25px !important;
    text-align: center !important;
    background: linear-gradient(
        135deg,
        #f5f8ff,
        #ffffff
    ) !important;
    border: 1px solid #dfe6f2 !important;
    border-radius: 18px !important;
    box-shadow: 0 12px 35px rgba(22, 35, 69, 0.07) !important;
}

#dummy-indo .pegawai-empty-icon {
    display: flex !important;
    width: 70px !important;
    height: 70px !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 auto 18px !important;
    color: #072585 !important;
    background: #eaf0ff !important;
    border-radius: 50% !important;
    font-size: 31px !important;
}

#dummy-indo .pegawai-empty-result h4 {
    margin-bottom: 8px !important;
    color: #222b3c !important;
    font-size: 22px !important;
    font-weight: 700 !important;
}

#dummy-indo .pegawai-empty-result p {
    max-width: 520px !important;
    margin: 0 auto 20px !important;
    color: #717b8d !important;
    font-size: 14px !important;
    line-height: 1.7 !important;
}


/* Responsive */

@media (max-width: 767px) {
    #dummy-indo .toolbar {
        align-items: stretch !important;
        flex-direction: column !important;
    }

    #dummy-indo .search-box {
        width: 100% !important;
        min-width: 0 !important;
    }

    #dummy-indo #pegawai-filter-tabs {
        width: 100% !important;
    }

    #dummy-indo #pegawai-filter-tabs li {
        flex: 1 !important;
        padding: 9px 10px !important;
        text-align: center !important;
    }

    #dummy-indo .pegawai-result-info {
        align-items: flex-start !important;
        flex-direction: column !important;
    }
}
</style>


<?php

$this->registerJs(<<<JS
(function () {
    var searchInput = document.getElementById(
        'pegawai-search'
    );

    var clearButton = document.getElementById(
        'pegawai-search-clear'
    );

    var container = document.getElementById(
        'pegawai-container'
    );

    var emptyResult = document.getElementById(
        'pegawai-empty-result'
    );

    var visibleCount = document.getElementById(
        'pegawai-visible-count'
    );

    var resetButton = document.getElementById(
        'pegawai-reset-filter'
    );

    var activeFilterLabel = document.getElementById(
        'pegawai-active-filter-label'
    );

    var filterButtons = document.querySelectorAll(
        '#pegawai-filter-tabs li'
    );

    if (!searchInput || !container) {
        return;
    }

    var items = Array.prototype.slice.call(
        container.querySelectorAll(
            '.pegawai-item'
        )
    );

    var activeFilter = '*';

    /**
     * Normalisasi teks pencarian.
     */
    function normalizeText(value) {
        return String(value || '')
            .toLowerCase()
            .replace(/\\s+/g, ' ')
            .trim();
    }

    /**
     * Cek kecocokan kategori.
     */
    function matchesActiveCategory(item) {
        if (activeFilter === '*') {
            return true;
        }

        return item.matches(activeFilter);
    }

    /**
     * Cek kecocokan kata kunci.
     */
    function matchesKeyword(item, keyword) {
        if (keyword === '') {
            return true;
        }

        var searchableText = normalizeText(
            item.getAttribute('data-search')
        );

        return searchableText.indexOf(keyword) !== -1;
    }

    /**
     * Perbarui label filter aktif.
     */
    function updateFilterLabel() {
        if (!activeFilterLabel) {
            return;
        }

        var label = 'Semua Pegawai';

        if (activeFilter === '.filter-asn') {
            label = 'Pegawai ASN';
        } else if (
            activeFilter === '.filter-pppk'
        ) {
            label = 'Pegawai PPPK';
        } else if (
            activeFilter === '.filter-nonasn'
        ) {
            label = 'Pegawai Non-ASN';
        }

        activeFilterLabel.textContent = label;
    }

    /**
     * Jalankan pencarian dan filter.
     */
    function applyPegawaiFilter() {
        var keyword = normalizeText(
            searchInput.value
        );

        var totalVisible = 0;

        items.forEach(function (item) {
            var visible =
                matchesKeyword(item, keyword)
                && matchesActiveCategory(item);

            if (visible) {
                item.classList.remove(
                    'pegawai-hidden'
                );

                totalVisible++;
            } else {
                item.classList.add(
                    'pegawai-hidden'
                );
            }
        });

        if (visibleCount) {
            visibleCount.textContent =
                totalVisible;
        }

        if (emptyResult) {
            emptyResult.style.display =
                totalVisible === 0
                    ? 'block'
                    : 'none';
        }

        if (clearButton) {
            clearButton.style.display =
                keyword !== ''
                    ? 'inline-flex'
                    : 'none';
        }

        updateFilterLabel();
    }

    /**
     * Pencarian saat mengetik.
     */
    searchInput.addEventListener(
        'input',
        applyPegawaiFilter
    );

    /**
     * Tombol hapus pencarian.
     */
    if (clearButton) {
        clearButton.addEventListener(
            'click',
            function () {
                searchInput.value = '';
                searchInput.focus();

                applyPegawaiFilter();
            }
        );
    }

    /**
     * Filter jenis pegawai.
     */
    filterButtons.forEach(function (button) {
        button.addEventListener(
            'click',
            function (event) {
                event.preventDefault();

                activeFilter =
                    this.getAttribute(
                        'data-filter'
                    )
                    || '*';

                filterButtons.forEach(
                    function (filterButton) {
                        filterButton.classList.remove(
                            'filter-active'
                        );
                    }
                );

                this.classList.add(
                    'filter-active'
                );

                applyPegawaiFilter();
            }
        );
    });

    /**
     * Reset pencarian dan filter.
     */
    if (resetButton) {
        resetButton.addEventListener(
            'click',
            function () {
                searchInput.value = '';
                activeFilter = '*';

                filterButtons.forEach(
                    function (filterButton) {
                        filterButton.classList.remove(
                            'filter-active'
                        );

                        if (
                            filterButton.getAttribute(
                                'data-filter'
                            ) === '*'
                        ) {
                            filterButton.classList.add(
                                'filter-active'
                            );
                        }
                    }
                );

                applyPegawaiFilter();

                searchInput.focus();
            }
        );
    }

    /**
     * Jalankan saat halaman selesai dimuat.
     */
    applyPegawaiFilter();
})();
JS);
?>