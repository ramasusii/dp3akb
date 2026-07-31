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

</head>

<?= Html::csrfMetaTags() ?>
<body class="index-page">
<?php $this->beginBody() ?>


  <header id="header" class="header position-relative">
    <!-- <header id="header" class="header"> -->
    <div class="container">

      <div class="header-top d-flex align-items-center justify-content-between">
        <div class="contact-info d-none d-lg-flex align-items-center">
          <i class="bi bi-envelope"></i>
          <a href="mailto:contact@example.com">contact@example.com</a>
          <i class="bi bi-phone ms-4"></i>
          <span>+628 12345678</span>
        </div>
        <div class="social-links d-flex align-items-center">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <div class="header-main d-flex align-items-center justify-content-between">
        <a href="<?= Yii::$app->homeUrl?>" class="logo d-flex align-items-center">
          <img src="<?= Yii::$app->request->baseUrl ?>/web/img/logo-diper.png" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
             <!-- <li><a href="<?= Yii::$app->homeUrl?>" class="active">Beranda</a></li> -->
            <li><a href="<?= Yii::$app->homeUrl?>">Beranda</a></li>
            <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="<?= Url::to(['site/sejarah'])?>">Sejarah</a></li>
                <li><a href="<?= Url::to(['site/sambutan'])?>">Sambutan</a></li>
                <li><a href="<?= Url::to(['site/visi-misi'])?>">Visi dan Misi</a></li>
                <li><a href="<?= Url::to(['site/tupoksi'])?>">Tugas Pokok dan Fungsi</a></li>
                <li><a href="<?= Url::to(['site/struktur'])?>">Struktur Organisasi</a></li>
                <li><a href="<?= Url::to(['site/profil-dinas'])?>">Profil Dinas</a></li>
            </ul>
            </li>
        <li class="dropdown"><a href="#"><span>Data & Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>

            <li><a href="<?= Url::to(['site/pegawai'])?>">Data Pegawai</a></li>
            <li><a href="<?= Url::to(['site/daftar-berita'])?>">Berita</a></li>
            <li><a href="<?= Url::to(['site/renja'])?>">Renja</a></li>
            <li><a href="<?= Url::to(['site/data-statistik'])?>">Data Statistik  &amp;Pegawai</a></li>
            <li><a href="<?= Url::to(['site/laporan-keuangan'])?>">Laporan Keuangan </a></li>
            <li><a href="<?= Url::to(['site/lakip'])?>">Lakip</a></li>
            <li><a href="<?= Url::to(['site/renstra'])?>">Renstra</a></li>
            <li><a href="<?= Url::to(['site/profil-kekerasan'])?>">Profil Kekerasan  &amp;Perempuan & Anak</a></li>
            <li><a href="<?= Url::to(['site/perjanjian-kinerja'])?>">Perjanjian Kinerja</a></li>
            <li class="dropdown"><a href="#"><span>Regulasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                  <li><a href="<?= Url::to(['site/uu'])?>">Undang-Undang</a></li>
                  <li><a href="<?= Url::to(['site/pp'])?>">Peraturan Pemerintah</a></li>
                  <li><a href="<?= Url::to(['site/permen'])?>">Peraturan Menteri</a></li>
                  <li><a href="<?= Url::to(['site/perda'])?>">Peraturan Daerah</a></li>
              </ul>
            </li>
            <li><a href="#">File Download</a></li>
          </ul>
        </li>
			  <li class="dropdown"><a href="#"><span>Satuan Kerja</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?= Url::to(['site/sekretariat'])?>">Sekretariat</a></li>
            <li class="dropdown"><a href="#"><span>UPTD PPA</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                  <li><a href="<?= Url::to(['site/upt-ppa'])?>">UPT PPA</a></li>
                  <li><a href="<?= Url::to(['site/subbag-tu'])?>">Subbagian Tata Usaha</a></li>
                  <li><a href="<?= Url::to(['site/seksi-pengaduan'])?>">Seksi Pengaduan</a></li>
                  <li><a href="<?= Url::to(['site/seksi-tindak-lanjut'])?>">Seksi Tindak Lanjut</a></li>
              </ul>
            </li>
            <li><a href="<?= Url::to(['site/pha'])?>">PHA dan Kualitas Keluarga</a></li>
            <li><a href="<?= Url::to(['site/perlindungan'])?>">Perlindungan Perempuan & Anak</a></li>
            <li><a href="<?= Url::to(['site/pug'])?>">PUG & Pemberdayaan Perempuan</a></li>
            <li><a href="<?= Url::to(['site/penduduk'])?>">Pengendalian Penduduk</a></li>
            <li><a href="<?= Url::to(['site/kb'])?>">Keluarga Berencana & Sejahtera</a></li>
          </ul>
        </li>
			  <li class="dropdown"><a href="#"><span>PPID</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?= Url::to(['site/profil-ppid'])?>">Profil PPID</a></li>
            <li><a href="<?= Url::to(['site/ppid-sumut'])?>">PPID Provinsi Sumatera Utara</a></li>
            <li><a href="<?= Url::to(['site/peraturan-ppid'])?>">Peraturan PPID</a></li>
            <li><a href="<?= Url::to(['site/formulir'])?>">Formulir Permohonan</a></li>
            <li><a href="<?= Url::to(['site/tugas-ppid'])?>">Tugas PPID</a></li>
            <li><a href="<?= Url::to(['site/struktur-ppid'])?>">Struktur PPID</a></li>
            <li><a href="<?= Url::to(['site/sk-ppid'])?>">SK Tim PPID</a></li>
            <li><a href="<?= Url::to(['site/laporan-ppid'])?>">Laporan PPID</a></li>
            <li><a href="<?= Url::to(['site/cara-permohonan'])?>">Tata Cara Permohonan Informasi</a></li>
            <li><a href="<?= Url::to(['site/visi-misi-ppid'])?>">Visi dan Misi PPID</a></li>
            <li><a href="<?= Url::to(['site/maklumat'])?>">Maklumat Pelayanan</a></li>
          </ul>
        </li>
        <li><a href="<?= Url::to(['site/edukasi'])?>">Konten Edukasi</a></li>
              <li><a href="<?= Url::to(['site/kontak'])?>">KONTAK</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
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
          <p class="mt-4"><strong>Telepon:</strong> <span>(061) 4566-328</span></p>
          <p><strong>Email:</strong> <span>dp3a@sumutprov.go.id</span></p>
          <p><strong>Hotline:</strong> <span>129 / 0811-633-129</span></p>
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
  <script>
      // === Sticky Header Scroll Effect ===
      window.addEventListener('scroll', function() {
        const header = document.querySelector('#header');
        const body = document.body;
        
        if (window.scrollY > 50) {
          header.classList.add('scrolled');
          body.classList.add('header-scrolled');
        } else {
          header.classList.remove('scrolled');
          body.classList.remove('header-scrolled');
        }
      });

      // === Mobile Menu Toggle ===
      const mobileToggle = document.querySelector('.mobile-nav-toggle');
      const navmenu = document.querySelector('#navmenu');
      
      if (mobileToggle) {
        mobileToggle.addEventListener('click', function(e) {
          e.stopPropagation();
          navmenu.classList.toggle('navmenu-active');
          this.classList.toggle('bi-list');
          this.classList.toggle('bi-x');
        });
      }

      // === Dropdown Toggle untuk Mobile ===
      document.querySelectorAll('.toggle-dropdown').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
          if (window.innerWidth <= 992) {
            e.preventDefault();
            const dropdown = this.closest('.dropdown');
            dropdown.querySelector('ul').classList.toggle('show');
            this.style.transform = dropdown.querySelector('ul').classList.contains('show') 
              ? 'rotate(-90deg)' 
              : 'rotate(90deg)';
          }
        });
      });

      // === Tutup mobile menu saat klik di luar ===
      document.addEventListener('click', function(e) {
        if (window.innerWidth <= 992 && 
            !e.target.closest('#navmenu') && 
            !e.target.closest('.mobile-nav-toggle')) {
          navmenu.classList.remove('navmenu-active');
          mobileToggle.classList.remove('bi-x');
          mobileToggle.classList.add('bi-list');
        }
      });
    </script>

    <script>
    // Auto-update Cuitan (simulasi 3 hari)
    const cuatanData = [
      { text: "Melindungi perempuan dan anak adalah investasi untuk masa depan Sumatera Utara yang lebih baik.", date: "<?= date('d M Y') ?>" },
      { text: "Setiap anak berhak atas perlindungan dan kesempatan yang sama untuk berkembang.", date: "<?= date('d M Y', strtotime('-3 days')) ?>" },
      { text: "Perempuan kuat, Sumatera Utara hebat. Mari bersama wujudkan kesetaraan gender.", date: "<?= date('d M Y', strtotime('-6 days')) ?>" }
    ];

    document.addEventListener('DOMContentLoaded', function() {
      // Set cuitan terbaru
      const latest = cuatanData[0];
      document.getElementById('cuatanText').textContent = `"${latest.text}"`;
      document.getElementById('cuatanDate').textContent = `Update: ${latest.date}`;
      
      // Polling functionality
      const btnVote = document.getElementById('btnVote');
      const pollForm = document.getElementById('pollForm');
      const pollVoted = document.getElementById('pollVotedMessage');
      const btnHasil = document.getElementById('btnLihatHasilWrapper');
      const btnLihatHasil = document.getElementById('btnLihatHasil');
      
      if (btnVote) {
        btnVote.addEventListener('click', function() {
          const selected = document.querySelector('input[name="pollOption"]:checked');
          if (!selected) {
            alert('Silakan pilih salah satu opsi!');
            return;
          }
          // Simpan status vote (localStorage)
          localStorage.setItem('dp3akb_voted', '1');
          // Update UI
          pollForm.classList.add('d-none');
          pollVoted.classList.remove('d-none');
          btnHasil.classList.remove('d-none');
        });
      }
      
      // Cek apakah sudah vote
      if (localStorage.getItem('dp3akb_voted') === '1') {
        pollForm.classList.add('d-none');
        pollVoted.classList.remove('d-none');
        btnHasil.classList.remove('d-none');
      }
      
      // Modal hasil polling
      if (btnLihatHasil) {
        btnLihatHasil.addEventListener('click', function() {
          // Bisa diganti dengan AJAX ke backend nanti
          alert('📊 Hasil:\nSangat Baik: 45%\nBaik: 35%\nCukup: 15%\nKurang: 5%\n\nTotal: 1.234 responden');
        });
      }
    });
    </script>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>