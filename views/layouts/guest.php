<?php
  use yii\helpers\Url;
  use yii\helpers\Html;
?>
 <?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dinas Pemberdayaan Perempuan dan Perlindungan Anak Provinsi Sumatera Utara</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= Yii::$app->request->baseUrl ?>/web/img/logo.png" rel="icon">
  <link href="<?= Yii::$app->request->baseUrl ?>/web/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/css/main.css" rel="stylesheet">

  <style>
/* =========================================================
   MOBILE HEADER FINAL - TERISOLASI DARI JS/CSS TEMPLATE
========================================================= */
#mobileNavToggle {
    display: none;
    border: 0;
    outline: 0;
}

@media (max-width: 1199px) {
    body.premium-mobile-open {
        overflow: hidden !important;
    }

    #header {
        overflow: visible !important;
    }

    #header .container {
        width: 100% !important;
        max-width: 100% !important;
        padding-left: 16px !important;
        padding-right: 16px !important;
    }

    #header .header-main {
        position: relative !important;
        display: flex !important;
        width: 100% !important;
        min-height: 68px !important;
        padding: 10px 0 !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;
    }

    #header .header-main .logo {
        order: 1 !important;
        position: relative !important;
        z-index: 10003 !important;
        display: flex !important;
        flex: 1 1 auto !important;
        min-width: 0 !important;
        margin: 0 !important;
    }

    #header .header-main .logo img {
        display: block !important;
        width: auto !important;
        max-width: min(285px, calc(100vw - 100px)) !important;
        max-height: 44px !important;
        height: auto !important;
        object-fit: contain !important;
        object-position: left center !important;
    }

    #header #navmenu {
        order: 2 !important;
    }

    #mobileNavToggle {
        order: 3 !important;
        position: relative !important;
        z-index: 10005 !important;
        display: inline-flex !important;
        flex: 0 0 46px !important;
        width: 46px !important;
        height: 46px !important;
        margin: 0 0 0 auto !important;
        padding: 0 !important;
        align-items: center !important;
        justify-content: center !important;

        color: #ffffff !important;
        background: linear-gradient(
            135deg,
            #072585 0%,
            #1648bd 100%
        ) !important;

        border: 1px solid rgba(255,255,255,.25) !important;
        border-radius: 14px !important;
        box-shadow:
            0 10px 24px rgba(7, 37, 133, 0.28),
            inset 0 1px 0 rgba(255,255,255,.18) !important;

        visibility: visible !important;
        opacity: 1 !important;
        cursor: pointer !important;
        -webkit-tap-highlight-color: transparent !important;
    }

    #mobileNavToggle:hover,
    #mobileNavToggle:focus {
        color: #ffffff !important;
        background: linear-gradient(
            135deg,
            #051a5c 0%,
            #123ca0 100%
        ) !important;
    }

    #mobileNavToggle i {
        display: block !important;
        color: #ffffff !important;
        font-size: 29px !important;
        line-height: 1 !important;
    }

    body.premium-mobile-open #mobileNavToggle {
        position: fixed !important;
        top: 16px !important;
        right: 16px !important;
        left: auto !important;
        z-index: 10006 !important;

        color: #ffffff !important;
        background: linear-gradient(
            135deg,
            #f8ab3c 0%,
            #f28b20 100%
        ) !important;
    }

    #navmenu {
        position: fixed !important;
        inset: 0 !important;
        z-index: 10001 !important;
        display: block !important;
        width: 100% !important;
        height: 100dvh !important;
        margin: 0 !important;
        padding: 78px 14px 22px !important;
        overflow-y: auto !important;

        background:
            radial-gradient(
                circle at top right,
                rgba(248, 171, 60, 0.24),
                transparent 34%
            ),
            linear-gradient(
                145deg,
                rgba(4, 18, 66, 0.99),
                rgba(7, 37, 133, 0.98)
            ) !important;

        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
        transform: translateX(100%) !important;
        transition:
            transform .32s ease,
            opacity .25s ease,
            visibility .25s ease !important;
    }

    body.premium-mobile-open #navmenu {
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
        transform: translateX(0) !important;
    }

    #navmenu > ul {
        position: relative !important;
        inset: auto !important;
        display: block !important;
        width: 100% !important;
        max-width: 520px !important;
        max-height: none !important;
        margin: 0 auto !important;
        padding: 12px !important;
        overflow: visible !important;
        list-style: none !important;

        background: rgba(255,255,255,.98) !important;
        border: 1px solid rgba(255,255,255,.72) !important;
        border-radius: 22px !important;
        box-shadow:
            0 28px 80px rgba(0,0,0,.34),
            inset 0 1px 0 rgba(255,255,255,.92) !important;
    }

    #navmenu > ul > li {
        display: block !important;
        width: 100% !important;
        margin: 0 !important;
        border-bottom: 1px solid #edf0f5 !important;
    }

    #navmenu > ul > li:last-child {
        border-bottom: 0 !important;
    }

    #navmenu a,
    #navmenu a:focus {
        position: relative !important;
        display: flex !important;
        width: 100% !important;
        min-height: 50px !important;
        padding: 12px !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;

        color: #1f2b44 !important;
        background: transparent !important;
        border: 0 !important;
        border-radius: 12px !important;

        font-size: 15px !important;
        font-weight: 600 !important;
        line-height: 1.35 !important;
        white-space: normal !important;
        text-decoration: none !important;
    }

    #navmenu a:hover,
    #navmenu a.active {
        color: #072585 !important;
        background: linear-gradient(
            135deg,
            rgba(7,37,133,.08),
            rgba(248,171,60,.12)
        ) !important;
    }

    #navmenu a::before,
    #navmenu a::after {
        display: none !important;
        content: none !important;
    }

    #navmenu .toggle-dropdown {
        display: inline-flex !important;
        flex: 0 0 34px !important;
        width: 34px !important;
        height: 34px !important;
        margin-left: auto !important;
        align-items: center !important;
        justify-content: center !important;

        color: #072585 !important;
        background: rgba(7,37,133,.08) !important;
        border-radius: 10px !important;
        font-size: 13px !important;
        transform: none !important;
    }

    #navmenu .dropdown-trigger[aria-expanded="true"]
    .toggle-dropdown {
        color: #ffffff !important;
        background: #f8ab3c !important;
        transform: rotate(180deg) !important;
    }

    #navmenu .dropdown > ul {
        position: static !important;
        inset: auto !important;
        display: none !important;
        width: 100% !important;
        min-width: 0 !important;
        margin: 0 !important;
        padding: 4px 0 10px 15px !important;
        overflow: visible !important;

        opacity: 1 !important;
        visibility: visible !important;
        background: transparent !important;

        border: 0 !important;
        border-left: 2px solid rgba(248,171,60,.48) !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        transform: none !important;
        animation: none !important;
    }

    #navmenu .dropdown > ul.premium-dropdown-open {
        display: block !important;
    }

    #navmenu .dropdown > ul li {
        display: block !important;
        width: 100% !important;
        min-width: 0 !important;
    }

    #navmenu .dropdown > ul a {
        min-height: 44px !important;
        padding: 9px 10px !important;
        color: #667085 !important;
        font-size: 14px !important;
        font-weight: 500 !important;
    }

    #navmenu .dropdown .dropdown > ul {
        margin-left: 6px !important;
        padding-left: 12px !important;
        border-left-color: rgba(7,37,133,.22) !important;
    }
}

@media (max-width: 575px) {
    #header .header-top {
        display: none !important;
    }

    #header .header-main {
        min-height: 64px !important;
    }

    #header .header-main .logo img {
        max-width: calc(100vw - 90px) !important;
        max-height: 40px !important;
    }

    #navmenu {
        padding-top: 72px !important;
    }

    #navmenu > ul {
        padding: 10px !important;
        border-radius: 18px !important;
    }
}

@media (min-width: 1200px) {
    #mobileNavToggle {
        display: none !important;
    }
}
</style>
</head>

<?= Html::csrfMetaTags() ?>
<body class="index-page">
<?php $this->beginBody() ?>


  <header id="header" class="header">

    <div class="container">

        <div class="header-top d-flex align-items-center justify-content-between">

            <div class="contact-info d-none d-lg-flex align-items-center">
                <i class="bi bi-envelope"></i>

                <a href="mailto:dp3akb.provsu@gmail.com">
                    dp3akb.provsu@gmail.com
                </a>

                <!-- <i class="bi bi-phone ms-4"></i>

                <span>
                    +62 821-6845-5787
                </span> -->
            </div>

            <div class="social-links d-flex align-items-center">
                <a href="#">
                    <i class="bi bi-twitter-x"></i>
                </a>

                <a href="#">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="#">
                    <i class="bi bi-instagram"></i>
                </a>

                <a href="#">
                    <i class="bi bi-linkedin"></i>
                </a>

                <a href="#">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>

        </div>

        <div class="header-main d-flex align-items-center">

            <a
                href="<?= Yii::$app->homeUrl ?>"
                class="logo d-flex align-items-center me-auto"
            >
                <img
                    src="<?= Yii::$app->request->baseUrl ?>/web/img/logo-diper.png"
                    alt="DISPPPAKB Provinsi Sumatera Utara"
                >
            </a>

            <nav id="navmenu" class="navmenu">

                <ul>

                    <li>
                        <a href="<?= Yii::$app->homeUrl ?>">
                            Beranda
                        </a>
                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-trigger">
                            <span>Profil</span>

                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>

                        <ul>
                            <li>
                                <a href="<?= Url::to(['site/sejarah']) ?>">
                                    Sejarah
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/sambutan']) ?>">
                                    Sambutan
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/visi-misi']) ?>">
                                    Visi dan Misi
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/tupoksi']) ?>">
                                    Tugas Pokok dan Fungsi
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/struktur']) ?>">
                                    Struktur Organisasi
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/profil-dinas']) ?>">
                                    Profil Dinas
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-trigger">
                            <span>Data &amp; Informasi</span>

                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>

                        <ul>

                            <li>
                                <a href="<?= Url::to(['site/pegawai']) ?>">
                                    Data Pegawai
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/daftar-berita']) ?>">
                                    Berita
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/renja']) ?>">
                                    Renja
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/data-statistik']) ?>">
                                    Data Statistik &amp; Pegawai
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/laporan-keuangan']) ?>">
                                    Laporan Keuangan
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/lakip']) ?>">
                                    Lakip
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/renstra']) ?>">
                                    Renstra
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/profil-kekerasan']) ?>">
                                    Profil Kekerasan Perempuan &amp; Anak
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/perjanjian-kinerja']) ?>">
                                    Perjanjian Kinerja
                                </a>
                            </li>

                            <li class="dropdown">

                                <a href="#" class="dropdown-trigger">
                                    <span>Regulasi</span>

                                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                                </a>

                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['site/uu']) ?>">
                                            Undang-Undang
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['site/pp']) ?>">
                                            Peraturan Pemerintah
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['site/permen']) ?>">
                                            Peraturan Menteri
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['site/perda']) ?>">
                                            Peraturan Daerah
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li>
                                <a href="#">
                                    File Download
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-trigger">
                            <span>Satuan Kerja</span>

                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>

                        <ul>

                            <li>
                                <a href="<?= Url::to(['site/sekretariat']) ?>">
                                    Sekretariat
                                </a>
                            </li>

                            <li class="dropdown">

                                <a href="#" class="dropdown-trigger">
                                    <span>UPTD PPA</span>

                                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                                </a>

                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['site/upt-ppa']) ?>">
                                            UPT PPA
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['site/subbag-tu']) ?>">
                                            Subbagian Tata Usaha
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['site/seksi-pengaduan']) ?>">
                                            Seksi Pengaduan
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['site/seksi-tindak-lanjut']) ?>">
                                            Seksi Tindak Lanjut
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li>
                                <a href="<?= Url::to(['site/pha']) ?>">
                                    PHA dan Kualitas Keluarga
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/perlindungan']) ?>">
                                    Perlindungan Perempuan &amp; Anak
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/pug']) ?>">
                                    PUG &amp; Pemberdayaan Perempuan
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/penduduk']) ?>">
                                    Pengendalian Penduduk
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/kb']) ?>">
                                    Keluarga Berencana &amp; Sejahtera
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-trigger">
                            <span>PPID</span>

                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>

                        <ul>
                            <li>
                                <a href="<?= Url::to(['site/profil-ppid']) ?>">
                                    Profil PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/ppid-sumut']) ?>">
                                    PPID Provinsi Sumatera Utara
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/peraturan-ppid']) ?>">
                                    Peraturan PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/formulir']) ?>">
                                    Formulir Permohonan
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/tugas-ppid']) ?>">
                                    Tugas PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/struktur-ppid']) ?>">
                                    Struktur PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/sk-ppid']) ?>">
                                    SK Tim PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/laporan-ppid']) ?>">
                                    Laporan PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/cara-permohonan']) ?>">
                                    Tata Cara Permohonan Informasi
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/visi-misi-ppid']) ?>">
                                    Visi dan Misi PPID
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::to(['site/maklumat']) ?>">
                                    Maklumat Pelayanan
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="<?= Url::to(['site/edukasi']) ?>">
                            Konten Edukasi
                        </a>
                    </li>

                    <li>
                        <a href="<?= Url::to(['site/kontak']) ?>">
                            Kontak
                        </a>
                    </li>

                </ul>

            </nav>

            <!-- Tombol wajib berada di luar nav -->
            <button
                id="mobileNavToggle"
                class="premium-mobile-toggle"
                type="button"
                aria-label="Buka menu navigasi"
                aria-controls="navmenu"
                aria-expanded="false"
            >
                <i class="bi bi-list"></i>
            </button>

        </div>

    </div>

</header>

  <?= $content ?>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        
        <!-- Kolom 1: Logo & Tentang -->
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="<?= Yii::$app->homeUrl ?>" class="logo d-flex align-items-center">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/logo-diper.png" alt="">
          </a>
          <p>Dinas Pemberdayaan Perempuan dan Perlindungan Anak Provinsi Sumatera Utara berkomitmen mewujudkan perlindungan, pemenuhan hak, dan pemberdayaan perempuan serta anak yang inklusif dan berkelanjutan.</p>
          <div class="social-links d-flex mt-4">
            <a href="https://instagram.com/dp3asumut" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://facebook.com/dp3asumut" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://youtube.com/@dp3asumut" target="_blank"><i class="bi bi-youtube"></i></a>
            <a href="https://wa.me/6281234567890" target="_blank"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <!-- Kolom 2: Navigasi Utama -->
        <div class="col-lg-2 col-6 footer-links">
          <h4>Menu Utama</h4>
          <ul>
            <li><a href="<?= Url::to(['site/index']) ?>">Beranda</a></li>
            <li><a href="<?= Url::to(['site/profil']) ?>">Profil Dinas</a></li>
            <li><a href="<?= Url::to(['site/layanan']) ?>">Layanan</a></li>
            <li><a href="<?= Url::to(['site/program']) ?>">Program</a></li>
            <li><a href="<?= Url::to(['site/kontak']) ?>">Kontak</a></li>
          </ul>
        </div>

        <!-- Kolom 3: Layanan & Program -->
        <div class="col-lg-2 col-6 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="<?= Url::to(['site/pengaduan']) ?>">Pengaduan Online</a></li>
            <li><a href="<?= Url::to(['site/pendampingan']) ?>">Pendampingan Hukum</a></li>
            <li><a href="<?= Url::to(['site/konseling']) ?>">Konseling & Psikologis</a></li>
            <li><a href="<?= Url::to(['site/pemberdayaan']) ?>">Pemberdayaan Ekonomi</a></li>
            <li><a href="<?= Url::to(['site/kla']) ?>">Kota Layak Anak</a></li>
          </ul>
        </div>

        <!-- Kolom 4: Kontak -->
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Hubungi Kami</h4>
          <p>Jl. Iskandar Muda No.272,</p>
          <p>Petisah Tengah, Kec. Medan Petisah,</p>
          <p>Medan, Sumatera Utara 20112</p>
          <!-- <p class="mt-4"><strong>Telepon:</strong> <span>(061) 4566-328</span></p> -->
          <p><strong>Email:</strong> <span>dp3akb.provsu@gmail.com</span></p>
          <!-- <p><strong>Hotline:</strong> <span>129 / 0811-633-129</span></p> -->
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">DISPPPAKB Provinsi Sumatera Utara</strong> <span>All Rights Reserved</span> <span><?= date('Y') ?></span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/aos/aos.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/js/main.js"></script>

  <!-- Sticky Header + Isolated Premium Mobile Navigation -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
      const body = document.body;
      const header = document.getElementById('header');
      const navMenu = document.getElementById('navmenu');
      const mobileToggle = document.getElementById('mobileNavToggle');
      const toggleIcon = mobileToggle
          ? mobileToggle.querySelector('i')
          : null;

      function updateStickyHeader() {
          if (!header) {
              return;
          }

          if (window.scrollY > 50) {
              header.classList.add('scrolled');
              body.classList.add('header-scrolled');
          } else {
              header.classList.remove('scrolled');
              body.classList.remove('header-scrolled');
          }
      }

      updateStickyHeader();

      window.addEventListener('scroll', updateStickyHeader, {
          passive: true
      });

      if (!navMenu || !mobileToggle || !toggleIcon) {
          console.warn('Elemen menu mobile tidak ditemukan.');
          return;
      }

      function closeAllDropdowns() {
          navMenu
              .querySelectorAll('.premium-dropdown-open')
              .forEach(function (submenu) {
                  submenu.classList.remove(
                      'premium-dropdown-open'
                  );
              });

          navMenu
              .querySelectorAll('.dropdown-trigger')
              .forEach(function (trigger) {
                  trigger.setAttribute(
                      'aria-expanded',
                      'false'
                  );
              });
      }

      function openMobileMenu() {
          body.classList.add('premium-mobile-open');

          mobileToggle.setAttribute(
              'aria-expanded',
              'true'
          );

          mobileToggle.setAttribute(
              'aria-label',
              'Tutup menu navigasi'
          );

          toggleIcon.classList.remove('bi-list');
          toggleIcon.classList.add('bi-x');
      }

      function closeMobileMenu() {
          body.classList.remove('premium-mobile-open');

          mobileToggle.setAttribute(
              'aria-expanded',
              'false'
          );

          mobileToggle.setAttribute(
              'aria-label',
              'Buka menu navigasi'
          );

          toggleIcon.classList.remove('bi-x');
          toggleIcon.classList.add('bi-list');

          closeAllDropdowns();
      }

      mobileToggle.addEventListener('click', function (event) {
          event.preventDefault();
          event.stopPropagation();

          if (body.classList.contains('premium-mobile-open')) {
              closeMobileMenu();
          } else {
              openMobileMenu();
          }
      });

      navMenu
          .querySelectorAll('.dropdown-trigger')
          .forEach(function (trigger) {
              trigger.setAttribute('aria-expanded', 'false');

              trigger.addEventListener('click', function (event) {
                  if (window.innerWidth >= 1200) {
                      return;
                  }

                  event.preventDefault();
                  event.stopPropagation();

                  const parentDropdown = trigger.parentElement;

                  const submenu = Array.from(
                      parentDropdown.children
                  ).find(function (element) {
                      return element.tagName === 'UL';
                  });

                  if (!submenu) {
                      return;
                  }

                  const isOpen = submenu.classList.toggle(
                      'premium-dropdown-open'
                  );

                  trigger.setAttribute(
                      'aria-expanded',
                      isOpen ? 'true' : 'false'
                  );
              });
          });

      navMenu
          .querySelectorAll('a:not(.dropdown-trigger)')
          .forEach(function (link) {
              link.addEventListener('click', function () {
                  if (window.innerWidth < 1200) {
                      closeMobileMenu();
                  }
              });
          });

      document.addEventListener('click', function (event) {
          if (
              window.innerWidth < 1200
              && body.classList.contains('premium-mobile-open')
              && !navMenu.contains(event.target)
              && !mobileToggle.contains(event.target)
          ) {
              closeMobileMenu();
          }
      });

      document.addEventListener('keydown', function (event) {
          if (
              event.key === 'Escape'
              && body.classList.contains('premium-mobile-open')
          ) {
              closeMobileMenu();
          }
      });

      window.addEventListener('resize', function () {
          if (window.innerWidth >= 1200) {
              closeMobileMenu();
          }
      });
  });
  </script>

  <!-- Cuitan dan Polling -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
      const cuatanData = [
          {
              text: "Melindungi perempuan dan anak adalah investasi untuk masa depan Sumatera Utara yang lebih baik.",
              date: "<?= date('d M Y') ?>"
          },
          {
              text: "Setiap anak berhak atas perlindungan dan kesempatan yang sama untuk berkembang.",
              date: "<?= date('d M Y', strtotime('-3 days')) ?>"
          },
          {
              text: "Perempuan kuat, Sumatera Utara hebat. Mari bersama wujudkan kesetaraan gender.",
              date: "<?= date('d M Y', strtotime('-6 days')) ?>"
          }
      ];

      const cuatanText = document.getElementById('cuatanText');
      const cuatanDate = document.getElementById('cuatanDate');

      if (cuatanText && cuatanDate && cuatanData.length > 0) {
          const latest = cuatanData[0];

          cuatanText.textContent = '"' + latest.text + '"';
          cuatanDate.textContent = 'Update: ' + latest.date;
      }

      const btnVote = document.getElementById('btnVote');
      const pollForm = document.getElementById('pollForm');
      const pollVoted = document.getElementById(
          'pollVotedMessage'
      );
      const btnHasil = document.getElementById(
          'btnLihatHasilWrapper'
      );
      const btnLihatHasil = document.getElementById(
          'btnLihatHasil'
      );

      function showVotedState() {
          if (pollForm) {
              pollForm.classList.add('d-none');
          }

          if (pollVoted) {
              pollVoted.classList.remove('d-none');
          }

          if (btnHasil) {
              btnHasil.classList.remove('d-none');
          }
      }

      if (btnVote) {
          btnVote.addEventListener('click', function () {
              const selected = document.querySelector(
                  'input[name="pollOption"]:checked'
              );

              if (!selected) {
                  alert('Silakan pilih salah satu opsi!');
                  return;
              }

              localStorage.setItem('dp3akb_voted', '1');
              showVotedState();
          });
      }

      if (localStorage.getItem('dp3akb_voted') === '1') {
          showVotedState();
      }

      if (btnLihatHasil) {
          btnLihatHasil.addEventListener('click', function () {
              alert(
                  '📊 Hasil:\n'
                  + 'Sangat Baik: 45%\n'
                  + 'Baik: 35%\n'
                  + 'Cukup: 15%\n'
                  + 'Kurang: 5%\n\n'
                  + 'Total: 1.234 responden'
              );
          });
      }
  });
  </script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
