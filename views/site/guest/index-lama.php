<?php
  use yii\helpers\Url;
  use yii\helpers\Html;
  use app\components\MyComponent;

  $slides = [
    [
        'image' => '/web/img/slider/satu.jpeg', // 💡 Note: hapus "/web/" di depan, karena baseUrl sudah mengarah ke folder web/
        'title' => 'Layanan Pengaduan Terpadu DISPPPAKB Sumut',
        'desc'  => 'Laporkan kekerasan terhadap perempuan dan anak secara aman, cepat & rahasia.',
        'link'  => ['site/pengaduan'],
        'btn'   => 'Ajukan Laporan'
    ],
    [
        'image' => '/web/img/slider/dua.jpg',
        'title' => 'Pemberdayaan Ekonomi Perempuan',
        'desc'  => 'Pelatihan keterampilan, pendampingan UMKM, dan akses permodalan untuk kemandirian.',
        'link'  => ['site/program'],
        'btn'   => 'Lihat Program'
    ],
    [
        'image' => '/web/img/slider/tiga.jpg',
        'title' => 'Kabupaten/Kota Layak Anak',
        'desc'  => 'Mewujudkan ruang publik aman, inklusif, dan mendukung tumbuh kembang anak optimal.',
        'link'  => ['site/kla'],
        'btn'   => 'Pelajari Selengkapnya'
    ],
];
?>

<style>
 /* Slider Container */
.hero-slider { padding: 0; margin-bottom: 3rem; }

/* Wrapper dengan tinggi tetap & ratio aman */
.slide-wrapper { 
    position: relative; 
    width: 100%;
    height: 450px; /* 🎯 Tinggi fix untuk desktop */
    min-height: 400px; 
    max-height: 800px;
    overflow: hidden; 
}

/* Gambar otomatis full & ter-crop rapi tanpa gepeng */
.slider-img { 
    width: 100%; 
    height: 100%; 
    object-fit: cover; /* 🛡️ Ini kuncinya! */
    object-position: center center; /* 📍 Fokus crop di tengah */
}

/* Link wrapper agar klikable full area */
.slide-link { 
    display: block; 
    width: 100%; 
    height: 100%; 
    cursor: pointer; 
    text-decoration: none; 
}

.slide-caption {
    position: absolute;
    bottom: 12%;
    left: 4%;
    max-width: 550px;          /* Diperkecil dari 600px */
    background: rgba(196, 196, 196, 0.3); /* Sedikit lebih gelap biar kontras */
    padding: 0.9rem 1.2rem;    /* Padding lebih rapat */
    border-radius: 10px;
    backdrop-filter: blur(8px);
    color: #fff;
    box-shadow: 0 4px 16px rgba(0,0,0,0.25);
}

.slide-title {
    font-size: 1.45rem;        /* Dari 2.2rem → lebih ringkas */
    font-weight: 700;
    margin-bottom: 0.35rem;
    line-height: 1.3;
}

.slide-desc {
    font-size: 0.85rem;        /* Dari 1.1rem → pas untuk deskripsi pendek */
    margin-bottom: 0.7rem;
    opacity: 0.9;
    line-height: 1.4;
}

.btn-slider {
    background-color:#fef5e8;
    padding: 0.45rem 1.1rem;   /* Tombol juga ikut diperkecil */
    font-size: 0.8rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-slider:hover { transform: translateY(-2px); }

/* 📱 Responsif Tablet */
@media (max-width: 991px) {
    .slide-caption { bottom: 8%; left: 4%; right: 4%; max-width: 100%; padding: 0.8rem; }
    .slide-title { font-size: 1.25rem; }
    .slide-desc { font-size: 0.8rem; }
}

/* 📱 Responsif HP */
@media (max-width: 576px) {
    .slide-caption { padding: 0.7rem; bottom: 5%; border-radius: 8px; }
    .slide-title { font-size: 1.1rem; }
    .slide-desc { font-size: 0.75rem; margin-bottom: 0.5rem; }
    .btn-slider { padding: 0.4rem 0.9rem; font-size: 0.75rem; }
}

/* 🚨 Emergency Ticker Styling */
  .emergency-ticker {
    background:  #072585;
    padding: 12px 0;
    overflow: hidden;
    position: relative;
    z-index: 10;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }
  
  .ticker-track {
    display: flex;
    white-space: nowrap;
    animation: tickerScroll 50s linear infinite;
  }
  
  .ticker-track:hover {
    animation-play-state: paused;
  }
  
  .ticker-content {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 60px;
    flex-shrink: 0;
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.6;
  }
  
  .ticker-icon {
    font-size: 1.25rem;
    margin: 0 10px;
    animation: pulseIcon 2s ease-in-out infinite;
  }
  
  .ticker-highlight {
    background: rgba(255,255,255,0.25);
    padding: 3px 10px;
    border-radius: 6px;
    font-weight: 700;
    margin: 0 5px;
  }
  
  .ticker-highlight a {
    color: #fff;
    text-decoration: none;
    transition: all 0.2s;
  }
  
  .ticker-highlight a:hover {
    background: rgba(255,255,255,0.4);
    text-decoration: none;
  }
  
  @keyframes tickerScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  
  @keyframes pulseIcon {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.15); opacity: 0.7; }
  }
  
  /* 📱 Responsive Adjustments */
  @media (max-width: 992px) {
    .ticker-content { font-size: 0.9rem; padding: 0 40px; }
  }
  @media (max-width: 576px) {
    .emergency-ticker { padding: 10px 0; }
    .ticker-content { font-size: 0.8rem; padding: 0 25px; }
    .ticker-icon { font-size: 1rem; margin: 0 6px; }
  }
</style>

<main class="main">
    <section id="hero-slider" class="hero-slider section" style="margin-bottom: 0!important;">
      <div id="dp3aSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          
          <div class="carousel-indicators">
              <?php foreach ($slides as $i => $s): ?>
                  <button type="button" data-bs-target="#dp3aSlider" data-bs-slide-to="<?= $i ?>" 
                          class="<?= $i === 0 ? 'active' : '' ?>" 
                          aria-current="<?= $i === 0 ? 'true' : 'false' ?>" 
                          aria-label="Slide <?= $i + 1 ?>"></button>
              <?php endforeach; ?>
          </div>

          <div class="carousel-inner">
              <?php foreach ($slides as $i => $s): ?>
                  <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                      <div class="slide-wrapper">
                          <?= Html::a(
                              Html::img(Yii::$app->request->baseUrl . $s['image'], [
                                  'class' => 'd-block w-100 slider-img',
                                  'alt'   => Html::encode($s['title'])
                              ]),
                              Url::to($s['link']),
                              ['class' => 'slide-link']
                          ) ?>
                          
                          <div class="slide-caption">
                              <h2 class="slide-title"><?= Html::encode($s['title']) ?></h2>
                              <p class="slide-desc"><?= Html::encode($s['desc']) ?></p>
                              <?= Html::a($s['btn'], Url::to($s['link']), ['class' => 'btn-slider']) ?>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#dp3aSlider" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#dp3aSlider" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>
  </section>

<!-- 🚨 Emergency Hotline Ticker -->
<div class="emergency-ticker" role="alert" aria-live="polite">
  <div class="ticker-track">
    <!-- Konten Asli -->
    <div class="ticker-content">
      <i class="bi bi-exclamation-triangle-fill ticker-icon"></i>
      <span>
        Jika anda mengalami, melihat, mendengar dan mengetahui tindak kekerasan pada perempuan dan anak hubungi hotline 
        <span class="ticker-highlight">SAPA 129</span> atau melalui whatsapp 
        <span class="ticker-highlight"><a href="https://wa.me/628111129129" target="_blank">08111-129-129</a></span>
      </span>
    </div>
    <!-- Duplikat untuk Loop Seamless -->
    <div class="ticker-content">
      <i class="bi bi-exclamation-triangle-fill ticker-icon"></i>
      <span>
        Jika anda mengalami, melihat, mendengar dan mengetahui tindak kekerasan pada perempuan dan anak hubungi hotline 
        <span class="ticker-highlight">SAPA 129</span> atau melalui whatsapp 
        <span class="ticker-highlight"><a href="https://wa.me/628111129129" target="_blank">08111-129-129</a></span>
      </span>
    </div>
  </div>
</div>

      <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center mb-5">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="intro-block">
              <span class="intro-label">Data & Kinerja</span>
              <h2 class="main-heading">Dampak Nyata Perlindungan & Pemberdayaan</h2>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-1" data-aos="fade-left" data-aos-delay="200">
            <div class="intro-description">
              <p>DISPPPAKB Provinsi Sumatera Utara terus meningkatkan capaian kinerja melalui program terukur, transparan, dan berkelanjutan untuk kesejahteraan perempuan dan anak di seluruh wilayah.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="stats-banner" data-aos="zoom-in" data-aos-delay="250">
              <div class="row g-0 text-center">
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="95" data-purecounter-duration="1" class="purecounter"></span>%
                    </div>
                    <h5>Penanganan Kasus</h5>
                    <p>Kasus kekerasan yang berhasil diselesaikan</p>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                    <h5>Pusat Layanan</h5>
                    <p>UPTD P2TP2A & posko terpadu aktif</p>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="1" class="purecounter"></span>+
                    </div>
                    <h5>Regulasi Didukung</h5>
                    <p>Advokasi kebijakan daerah responsif gender</p>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="33" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                    <h5>Kab/Kota Terjangkau</h5>
                    <p>Jangkauan program hingga tingkat terbawah</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Stats Banner -->

        <div class="row align-items-center mt-5 pt-4">
          <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
            <div class="image-showcase">
              <div class="primary-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/campus-8.webp" alt="University Campus" class="img-fluid" loading="lazy">
              </div>
              <div class="secondary-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/students-3.webp" alt="Student Activities" class="img-fluid" loading="lazy">
              </div>
              <div class="experience-tag">
                <span class="tag-number">50+</span>
                <span class="tag-text">Mitra & Relawan Aktif</span>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="detail-content">
              <h3 class="detail-title">Membangun Ekosistem Perlindungan yang Inklusif</h3>
              <p class="detail-text">Melalui kolaborasi lintas sektor, kami memastikan setiap perempuan dan anak mendapatkan akses terhadap perlindungan hukum, layanan kesehatan, pendidikan, dan pemberdayaan ekonomi yang merata.</p>
              <div class="feature-list">
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="350">
                  <div class="feature-number">01</div>
                  <div class="feature-detail">
                    <h5>Layanan Pengaduan Terintegrasi</h5>
                    <p>Sistem pelaporan online dan hotline 24 jam untuk respons cepat penanganan kasus.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="400">
                  <div class="feature-number">02</div>
                  <div class="feature-detail">
                    <h5>Kader & Relawan Terlatih</h5>
                    <p>Jaringan pendukung di tingkat desa/kelurahan yang siap membantu pencegahan dini.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="450">
                  <div class="feature-number">03</div>
                  <div class="feature-detail">
                    <h5>Pendekatan Holistik</h5>
                    <p>Penanganan kasus mencakup aspek hukum, psikologis, sosial, dan reintegrasi ekonomi.</p>
                  </div>
                </div>
              </div><!-- End Feature List -->
              <div class="action-buttons mt-4">
                <a href="#" class="btn-discover">Lihat Layanan <i class="bi bi-arrow-right"></i></a>
                <a href="#" class="btn-info">Hubungi Kami</a>
              </div>
            </div>
          </div>
        </div><!-- End Highlights Row -->

      </div>

    </section><!-- /Stats Section -->

    <section id="campus-facilities" class="campus-facilities section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Featured Campus Locations Carousel -->
        <div class="campus-highlights" data-aos="fade-up" data-aos-delay="100">
      <div class="row mb-4 align-items-end">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
          <h2 class="highlights-title">Konten Edukasi DPPPAKB</h2>
        </div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
          <p class="highlights-desc">Temukan informasi penting seputar perlindungan perempuan, anak, dan keluarga berencana melalui konten edukasi kami.</p>
        </div>
      </div>

      <div class="highlights-slider swiper init-swiper" data-aos="fade-up" data-aos-delay="300">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 700,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 1,
            "spaceBetween": 24,
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "576": {
                "slidesPerView": 2
              },
              "992": {
                "slidesPerView": 3
              },
              "1200": {
                "slidesPerView": 4
              }
            }
          }
        </script>
        <div class="swiper-wrapper">
          
          <!-- Poster 1: Perlindungan Anak -->
          <div class="swiper-slide">
            <div class="location-card">
              <div class="location-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster1.jpeg" alt="Perlindungan Anak" class="img-fluid" loading="lazy">
                <span class="location-tag">Perlindungan Anak</span>
              </div>
              <div class="location-details">
                <p>Layanan Hotline Lapor SAPA 129</p>
              
              </div>
            </div>
          </div><!-- End Slide -->

          <!-- Poster 2: Pemberdayaan Perempuan -->
          <div class="swiper-slide">
            <div class="location-card">
              <div class="location-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster2.jpeg" alt="Pemberdayaan Perempuan" class="img-fluid" loading="lazy">
                <span class="location-tag">Perlindungan</span>
              </div>
              <div class="location-details">
                <p>Stop Bulying</p>
                
              </div>
            </div>
          </div><!-- End Slide -->

          <!-- Poster 3: KB dan Keluarga Berencana -->
          <div class="swiper-slide">
            <div class="location-card">
              <div class="location-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster3.jpeg" alt="Keluarga Berencana" class="img-fluid" loading="lazy">
                <span class="location-tag">Perlindungan</span>
              </div>
              <div class="location-details">
                <p>Stop pernikahan dini!</p>
                
              </div>
            </div>
          </div><!-- End Slide -->

          <div class="swiper-slide">
            <div class="location-card">
              <div class="location-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster4.jpeg" alt="Keluarga Berencana" class="img-fluid" loading="lazy">
                <span class="location-tag">Perlindungan</span>
              </div>
              <div class="location-details">
                <p>Stop perdagangan orang!</p>
                
              </div>
            </div>
          </div><!-- End Slide -->

          <!-- Poster 5: Pencegahan Stunting -->
          <div class="swiper-slide">
            <div class="location-card">
              <div class="location-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster5.jpeg" alt="Pencegahan Stunting" class="img-fluid" loading="lazy">
                <span class="location-tag">Pemberdayaan</span>
              </div>
              <div class="location-details">
                <p>Program Permata</p>
              
              </div>
            </div>

          </div><!-- End Slide -->
           <div class="swiper-slide">
            <div class="location-card">
              <div class="location-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster4.jpeg" alt="Keluarga Berencana" class="img-fluid" loading="lazy">
                <span class="location-tag">Perlindungan</span>
              </div>
              <div class="location-details">
                <p>Stop perdagangan orang!</p>
                
              </div>
            </div>
          </div><!-- End Slide -->

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
      </div>

    </section><!-- /Campus Facilities Section -->

    


    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-block">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <div class="hero-copy">
                <div class="top-badge"><i class="bi bi-building"></i><span>Layanan Publik Terpadu</span></div>
                <h1>Memberdayakan Perempuan, Melindungi Anak Sumatera Utara</h1>
                <p>DISPPPAKB Provinsi Sumatera Utara hadir untuk memastikan hak-hak perempuan dan anak terpenuhi, memberikan perlindungan dari kekerasan, serta mendorong kesetaraan gender dan tumbuh kembang anak yang optimal.</p>
                <div class="stats-strip">
                  <div class="s-item"><strong>95%</strong><span>Kasus Terselesaikan</span></div>
                  <div class="s-divider"></div>
                  <div class="s-item"><strong>33</strong><span>Kab/Kota Terjangkau</span></div>
                  <div class="s-divider"></div>
                  <div class="s-item"><strong>120+</strong><span>Program Aktif</span></div>
                </div>
                <div class="hero-btns">
                  <a href="#" class="btn-apply">Ajukan Layanan</a>
                  <a href="#" class="btn-tour"><i class="bi bi-play-circle-fill"></i> Profil & Layanan</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
              <div class="hero-visual">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/showcase-1.webp" alt="University Campus" class="img-fluid campus-photo">
                <div class="accred-card">
                  <i class="bi bi-shield-check"></i>
                  <div><strong>Terakreditasi A</strong><span>Pelayanan Publik</span></div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Hero Block -->

        <div class="features-block" data-aos="fade-up" data-aos-delay="150">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article class="feat-card">
                <span class="feat-number">01</span>
                <div class="feat-icon"><i class="bi bi-shield-fill"></i></div>
                <h3>Pendampingan Hukum</h3>
                <p>Layanan konsultasi dan pendampingan bagi korban kekerasan perempuan dan anak secara profesional dan terintegrasi.</p>
                <a href="#" class="feat-link">Pelajari Layanan <i class="bi bi-arrow-right"></i></a>
              </article>
            </div><!-- End Feature Card -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <article class="feat-card featured">
                <span class="feat-number">02</span>
                <div class="feat-icon"><i class="bi bi-people-fill"></i></div>
                <h3>Pemberdayaan Ekonomi</h3>
                <p>Program pelatihan keterampilan dan kewirausahaan untuk meningkatkan kemandirian dan kesejahteraan perempuan.</p>
                <a href="#" class="feat-link">Lihat Program <i class="bi bi-arrow-right"></i></a>
              </article>
            </div><!-- End Feature Card -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <article class="feat-card">
                <span class="feat-number">03</span>
                <div class="feat-icon"><i class="bi bi-mortarboard-fill"></i></div>
                <h3>Edukasi & Sosialisasi</h3>
                <p>Kampanye pencegahan kekerasan, pengasuhan positif, dan perlindungan anak hingga ke tingkat desa/kelurahan.</p>
                <a href="#" class="feat-link">Jadwal Kegiatan <i class="bi bi-arrow-right"></i></a>
              </article>
            </div><!-- End Feature Card -->
          </div>
        </div><!-- End Features Block -->

        <div class="event-block" data-aos="fade-up" data-aos-delay="200">
          <div class="row align-items-center gy-4">
            <div class="col-auto">
              <div class="event-cal">
                <span class="ec-month">NOV</span>
                <span class="ec-day">15</span>
              </div>
            </div>
            <div class="col">
              <div class="event-info">
                <span class="event-tag">Agenda Terdekat</span>
                <h3>Rapat Koordinasi Perlindungan Anak & Perempuan Se-Sumut</h3>
                <p>Bergabunglah bersama kami untuk memperkuat jejaring perlindungan, evaluasi program prioritas, dan sinergi lintas OPD di seluruh kabupaten/kota.</p>
              </div>
            </div>
            <div class="col-xl-auto col-12">
              <div class="event-actions">
                <a href="#" class="btn-rsvp">Daftar Hadir</a>
                <span class="event-timer"><i class="bi bi-clock-fill"></i> 3 Minggu lagi</span>
              </div>
            </div>
          </div>
        </div><!-- End Event Block -->

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/campus-8.webp" alt="University Campus" class="img-fluid">
              <div class="experience-badge">
                <span class="years">15+</span>
                <span class="label">Tahun Melayani</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="story-content">
              <span class="subtitle">Tentang Kami</span>
              <h2>Mewujudkan Sumatera Utara Ramah Perempuan & Layak Anak</h2>
              <p>Dinas Pemberdayaan Perempuan dan Perlindungan Anak (DISPPPAKB) Provinsi Sumatera Utara berkomitmen menjadi garda terdepan dalam menjamin perlindungan, pemenuhan hak, dan peningkatan kesejahteraan perempuan serta anak di seluruh wilayah provinsi.</p>

              <div class="row g-4 mt-2">
                <div class="col-sm-6">
                  <div class="purpose-block">
                    <i class="bi bi-bullseye"></i>
                    <h4>Misi Kami</h4>
                    <p>Melindungi perempuan dan anak dari segala bentuk kekerasan, diskriminasi, dan perlakuan salah, serta meningkatkan partisipasi perempuan dalam pembangunan daerah.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="purpose-block">
                    <i class="bi bi-eye"></i>
                    <h4>Visi Kami</h4>
                    <p>Terwujudnya masyarakat Sumatera Utara yang adil, setara, dan aman bagi perempuan dan anak menuju generasi unggul dan berdaya saing.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Story Row -->

        <div class="milestones-section" data-aos="fade-up" data-aos-delay="250">
          <h3 class="text-center">Tonggak Pencapaian</h3>
          <div class="milestones-track">
            <div class="row g-0">
              <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="milestone-card">
                  <div class="milestone-year">2008</div>
                  <h5>Pembentukan Dinas DISPPPAKB</h5>
                  <p>Resmi dibentuk sebagai OPD provinsi untuk fokus pada isu perempuan dan anak.</p>
                </div>
              </div><!-- End Milestone -->

              <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="270">
                <div class="milestone-card">
                  <div class="milestone-year">2014</div>
                  <h5>Launch UPTD P2TP2A</h5>
                  <p>Pusat layanan terpadu untuk penanganan kasus kekerasan terhadap perempuan dan anak.</p>
                </div>
              </div><!-- End Milestone -->

              <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="340">
                <div class="milestone-card">
                  <div class="milestone-year">2019</div>
                  <h5>Penghargaan KLA</h5>
                  <p>Provinsi dan beberapa kabupaten/kota meraih predikat Layak Anak dari Kemenpppa.</p>
                </div>
              </div><!-- End Milestone -->

              <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="410">
                <div class="milestone-card">
                  <div class="milestone-year">2023</div>
                  <h5>Integrasi Digital</h5>
                  <p>Peluncuran sistem pengaduan online terpadu untuk respons penanganan kasus yang lebih cepat.</p>
                </div>
              </div><!-- End Milestone -->
            </div>
          </div>
        </div><!-- End Milestones Section -->

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
          <div class="col" data-aos="fade-up" data-aos-delay="200">
            <div class="principle-item">
              <span class="principle-num">01</span>
              <div class="principle-body">
                <h4>Perlindungan Optimal</h4>
                <p>Menjamin keamanan dan pemenuhan hak dasar bagi setiap perempuan dan anak di wilayah hukum.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->

          <div class="col" data-aos="fade-up" data-aos-delay="270">
            <div class="principle-item">
              <span class="principle-num">02</span>
              <div class="principle-body">
                <h4>Kesetaraan Gender</h4>
                <p>Mendorong partisipasi adil dan peluang setara dalam segala sektor pembangunan daerah.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->

          <div class="col" data-aos="fade-up" data-aos-delay="340">
            <div class="principle-item">
              <span class="principle-num">03</span>
              <div class="principle-body">
                <h4>Partisipasi Masyarakat</h4>
                <p>Melibatkan komunitas, relawan, dan lembaga sosial dalam ekosistem perlindungan terpadu.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->

          <div class="col" data-aos="fade-up" data-aos-delay="410">
            <div class="principle-item">
              <span class="principle-num">04</span>
              <div class="principle-body">
                <h4>Pelayanan Terintegrasi</h4>
                <p>Koordinasi lintas sektor untuk penanganan holistik mulai dari pengaduan hingga pemulihan.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->
        </div><!-- End Principles Row -->

      </div>

    </section><!-- /About Section -->

    <!-- Featured Programs Section -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Program & Layanan Unggulan</h2>
        <p>Layanan terpadu untuk perlindungan, pemberdayaan, dan pemenuhan hak perempuan dan anak di Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/campus-7.webp" alt="Featured Program" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-star-fill"></i> Prioritas
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Program Unggulan</div>
                <h3>P2TP2A & Pusat Krisis Terpadu</h3>
                <p>Layanan terintegrasi mulai dari pengaduan, pendampingan psikologis, bantuan hukum, hingga reintegrasi sosial bagi korban kekerasan perempuan dan anak.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-people-fill"></i>
                    <span>1.200+ Kasus Ditangani</span>
                  </div>
                  <div class="stat-chip">
                    <i class="bi bi-trophy-fill"></i>
                    <span>98% Respons Cepat</span>
                  </div>
                  <div class="stat-chip">
                    <i class="bi bi-clock-fill"></i>
                    <span>24/7 Layanan</span>
                  </div>
                </div>
                <a href="#" class="explore-link">Pelajari Program <i class="bi bi-arrow-right-circle-fill"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <div class="row g-4 mt-2">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/education-3.webp" alt="Program" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">3 Bulan</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Program UMKM</span>
                <h4>Pelatihan Kewirausahaan Perempuan</h4>
                <p>Peningkatan kapasitas ekonomi melalui pelatihan keterampilan, pendampingan usaha, dan akses permodalan.</p>
                <a href="#" class="card-link">Lihat Detail <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/education-7.webp" alt="Program" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2 Bulan</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Edukasi Keluarga</span>
                <h4>Kelas Parenting & Pengasuhan Positif</h4>
                <p>Panduan pengasuhan anak berbasis ilmu psikologi untuk mencegah kekerasan dalam rumah tangga.</p>
                <a href="#" class="card-link">Lihat Detail <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/education-9.webp" alt="Program" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">5 Tahun</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Inisiatif Daerah</span>
                <h4>Kabupaten/Kota Layak Anak</h4>
                <p>Mendorong pemenuhan hak anak di sektor pendidikan, kesehatan, dan ruang publik yang aman.</p>
                <a href="#" class="card-link">Lihat Detail <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/education-2.webp" alt="Program" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">3 Bulan</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Layanan Psikologis</span>
                <h4>Konseling & Pemulihan Trauma</h4>
                <p>Pendampingan profesional oleh psikolog klinis untuk pemulihan kesehatan mental korban kekerasan.</p>
                <a href="#" class="card-link">Lihat Detail <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

    <!-- Students Life Block Section -->
    <section id="students-life-block" class="students-life-block section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan & Pemberdayaan Masyarakat</h2>
        <p>Komitmen kami dalam membangun ekosistem perlindungan dan pemberdayaan yang inklusif dan berkelanjutan.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5 align-items-stretch">
          <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-delay="200">
            <div class="campus-visual">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/students-3.webp" alt="Campus Life" class="img-fluid primary-visual">
              <div class="accent-shape"></div>
            </div>
          </div>

          <div class="col-lg-6 order-lg-1 d-flex align-items-center" data-aos="fade-right" data-aos-delay="200">
            <div class="intro-content">
              <div class="label-tag" data-aos="fade-up" data-aos-delay="250">
                <i class="bi bi-heart-fill"></i>
                <span>Aksi Nyata DISPPPAKB</span>
              </div>
              <h2 data-aos="fade-up" data-aos-delay="300">Kolaborasi untuk Perempuan & Anak yang Lebih Berdaya</h2>
              <p class="description" data-aos="fade-up" data-aos-delay="350">Melalui program terstruktur dan pendekatan partisipatif, kami memastikan setiap lapisan masyarakat mendapatkan akses terhadap perlindungan, edukasi, dan pemberdayaan yang berkelanjutan.</p>

              <div class="highlights-row" data-aos="fade-up" data-aos-delay="400">
                <div class="highlight-box">
                  <div class="highlight-icon">
                    <i class="bi bi-calendar2-check"></i>
                  </div>
                  <div class="highlight-text">
                    <strong>Pelatihan & Workshop</strong>
                    <span>Peningkatan kapasitas kader dan relawan perlindungan anak di 33 kabupaten/kota.</span>
                  </div>
                </div><!-- End Highlight Box -->

                <div class="highlight-box">
                  <div class="highlight-icon">
                    <i class="bi bi-trophy"></i>
                  </div>
                  <div class="highlight-text">
                    <strong>Penghargaan & Apresiasi</strong>
                    <span>Program apresiasi bagi daerah, sekolah, dan komunitas yang aktif mendukung perlindungan anak.</span>
                  </div>
                </div><!-- End Highlight Box -->
              </div>

              <div class="action-buttons" data-aos="fade-up" data-aos-delay="450">
                <a href="#" class="btn-explore">Jelajahi Kegiatan</a>
                <a href="#" class="btn-tour">
                  <i class="bi bi-camera-video"></i>
                  <span>Galeri Dokumentasi</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="stats-strip" data-aos="fade-up" data-aos-delay="200">
          <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="250">
              <div class="stat-block">
                <i class="bi bi-people-fill"></i>
                <span class="stat-value">3.500+</span>
                <span class="stat-desc">Kader Terlatih</span>
              </div>
            </div><!-- End Stat Block -->

            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="300">
              <div class="stat-block">
                <i class="bi bi-journal-richtext"></i>
                <span class="stat-value">250+</span>
                <span class="stat-desc">Desa Binaan</span>
              </div>
            </div><!-- End Stat Block -->

            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="350">
              <div class="stat-block">
                <i class="bi bi-globe2"></i>
                <span class="stat-value">40+</span>
                <span class="stat-desc">Mitra Strategis</span>
              </div>
            </div><!-- End Stat Block -->

            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="400">
              <div class="stat-block">
                <i class="bi bi-star-fill"></i>
                <span class="stat-value">96%</span>
                <span class="stat-desc">Kepuasan Masyarakat</span>
              </div>
            </div><!-- End Stat Block -->
          </div>
        </div>

        <div class="campus-activities">
          <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
              <div class="activity-card">
                <div class="card-media">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/activities-8.webp" alt="Academic Clubs" class="img-fluid" loading="lazy">
                </div>
                <div class="card-body">
                  <h5>Sosialisasi Desa</h5>
                  <p>Edukasi pencegahan kekerasan, stunting, dan perlindungan anak hingga ke tingkat grassroots.</p>
                  <a href="#" class="card-link">
                    Pelajari Lebih <i class="bi bi-arrow-right-short"></i>
                  </a>
                </div>
              </div>
            </div><!-- End Activity Card -->

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
              <div class="activity-card">
                <div class="card-media">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/activities-3.webp" alt="Research Initiatives" class="img-fluid" loading="lazy">
                </div>
                <div class="card-body">
                  <h5>Advokasi Kebijakan</h5>
                  <p>Pendampingan penyusunan regulasi daerah yang responsif gender dan ramah anak.</p>
                  <a href="#" class="card-link">
                    Pelajari Lebih <i class="bi bi-arrow-right-short"></i>
                  </a>
                </div>
              </div>
            </div><!-- End Activity Card -->

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
              <div class="activity-card">
                <div class="card-media">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/activities-5.webp" alt="Volunteer Work" class="img-fluid" loading="lazy">
                </div>
                <div class="card-body">
                  <h5>Kampanye Publik</h5>
                  <p>Gerakan sosial dan media awareness untuk menghapus stigma dan mendorong pelaporan kasus.</p>
                  <a href="#" class="card-link">
                    Pelajari Lebih <i class="bi bi-arrow-right-short"></i>
                  </a>
                </div>
              </div>
            </div><!-- End Activity Card -->

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
              <div class="activity-card">
                <div class="card-media">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/activities-9.webp" alt="Creative Studios" class="img-fluid" loading="lazy">
                </div>
                <div class="card-body">
                  <h5>Pendampingan Hukum</h5>
                  <p>Layanan prodeo dan pendampingan korban dalam proses hukum hingga putusan pengadilan.</p>
                  <a href="#" class="card-link">
                    Pelajari Lebih <i class="bi bi-arrow-right-short"></i>
                  </a>
                </div>
              </div>
            </div><!-- End Activity Card -->
          </div>
        </div>

      </div>

    </section><!-- /Students Life Block Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Suara Masyarakat & Mitra</h2>
        <p>Testimoni dari penerima manfaat, mitra kerja, dan pemangku kepentingan yang merasakan dampak program DISPPPAKB Sumut.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="review-carousel swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 700,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "992": {
                  "slidesPerView": 2
                }
              }
            }
          </script>

          <div class="swiper-wrapper">

            <!-- Review Slide 1 -->
            <div class="swiper-slide">
              <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                <div class="accent-bar"></div>
                <div class="watermark-quote">
                  <i class="bi bi-quote"></i>
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-sm-4">
                    <div class="reviewer-photo">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-f-3.webp" alt="Reviewer" class="img-fluid" loading="lazy">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="review-body">
                      <p>Layanan P2TP2A sangat membantu saya bangkit dari situasi sulit. Pendampingan psikologis dan bantuan hukum yang diberikan benar-benar profesional dan penuh empati.</p>
                      <div class="reviewer-details">
                        <h5>Ibu Sari Wulandari</h5>
                        <span>Penerima Manfaat Layanan</span>
                      </div>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Review Slide -->

            <!-- Review Slide 2 -->
            <div class="swiper-slide">
              <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                <div class="accent-bar"></div>
                <div class="watermark-quote">
                  <i class="bi bi-quote"></i>
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-sm-4">
                    <div class="reviewer-photo">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-m-5.webp" alt="Reviewer" class="img-fluid" loading="lazy">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="review-body">
                      <p>DISPPPAKB Sumut telah menjadi mitra strategis dalam penelitian dan advokasi kebijakan perlindungan anak di tingkat daerah. Data dan programnya sangat terukur.</p>
                      <div class="reviewer-details">
                        <h5>Dr. Ahmad Fauzi, M.Si</h5>
                        <span>Dosen & Peneliti UNIMED</span>
                      </div>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Review Slide -->

            <!-- Review Slide 3 -->
            <div class="swiper-slide">
              <div class="review-card" data-aos="fade-up" data-aos-delay="300">
                <div class="accent-bar"></div>
                <div class="watermark-quote">
                  <i class="bi bi-quote"></i>
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-sm-4">
                    <div class="reviewer-photo">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-f-9.webp" alt="Reviewer" class="img-fluid" loading="lazy">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="review-body">
                      <p>Pelatihan yang diberikan DISPPPAKB sangat aplikatif. Kini sebagai kader desa, kami bisa mendeteksi dini dan mencegah kekerasan terhadap anak di lingkungan kami.</p>
                      <div class="reviewer-details">
                        <h5>Rina Marpaung</h5>
                        <span>Kader Pemberdayaan Desa</span>
                      </div>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Review Slide -->

            <!-- Review Slide 4 -->
            <div class="swiper-slide">
              <div class="review-card" data-aos="fade-up" data-aos-delay="400">
                <div class="accent-bar"></div>
                <div class="watermark-quote">
                  <i class="bi bi-quote"></i>
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-sm-4">
                    <div class="reviewer-photo">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-m-14.webp" alt="Reviewer" class="img-fluid" loading="lazy">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="review-body">
                      <p>Integrasi sistem pengaduan online DISPPPAKB mempercepat respons dan transparansi penanganan kasus di wilayah kami. Kolaborasi lintas OPD berjalan sangat solid.</p>
                      <div class="reviewer-details">
                        <h5>Hendra Siregar, S.IP</h5>
                        <span>Kepala Bidang Kominfo Kab.</span>
                      </div>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Review Slide -->

            <!-- Review Slide 5 -->
            <div class="swiper-slide">
              <div class="review-card" data-aos="fade-up" data-aos-delay="500">
                <div class="accent-bar"></div>
                <div class="watermark-quote">
                  <i class="bi bi-quote"></i>
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-sm-4">
                    <div class="reviewer-photo">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-f-7.webp" alt="Reviewer" class="img-fluid" loading="lazy">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="review-body">
                      <p>Program UMKM dan pelatihan kewirausahaan benar-benar mengubah hidup kami. Kini saya bisa mandiri secara ekonomi dan menghidupi keluarga dengan layak.</p>
                      <div class="reviewer-details">
                        <h5>Priya Simanjuntak</h4>
                        <span>Peserta Pelatihan UMKM</span>
                      </div>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Review Slide -->

          </div>

          <div class="swiper-pagination"></div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->


    <!-- Recent News Section -->
    <section id="recent-news" class="recent-news section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
            <article class="featured-post">
              <figure class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/blog/blog-post-7.webp" alt="" class="img-fluid" loading="lazy">
                <a href="#" class="featured-tag">Koordinasi</a>
              </figure>
              <div class="featured-body">
                <h3 class="featured-title">
                  <a href="#">Rakor Perlindungan Anak Se-Sumut 2025: Sinergi Lintas Sektor Diperkuat</a>
                </h3>
                <p class="featured-excerpt">Penguatan koordinasi antar OPD dan kabupaten/kota dalam menekan angka kekerasan terhadap anak serta optimalisasi program KLA di tingkat daerah.</p>
                <div class="featured-meta">
                  <div class="meta-author">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-m-7.webp" alt="">
                    <span>Admin DISPPPAKB</span>
                  </div>
                  <span class="meta-date"><i class="bi bi-clock"></i> 14 Okt 2025</span>
                </div>
              </div>
            </article>
          </div><!-- End Featured Post -->

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="side-posts">

              <article class="side-post-item" data-aos="fade-up" data-aos-delay="200">
                <div class="side-post-img">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/blog/blog-post-5.webp" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="side-post-content">
                  <a href="#" class="side-tag">Sosialisasi</a>
                  <h4 class="side-post-title">
                    <a href="#">Peluncuran Kampanye Penghapusan Kekerasan Seksual di Kampus</a>
                  </h4>
                  <div class="side-post-meta">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-f-8.webp" alt="">
                    <span class="side-author">Tim Humas DISPPPAKB</span>
                    <span class="dot">·</span>
                    <span class="side-date">3 Nov 2025</span>
                  </div>
                </div>
              </article><!-- End Side Post -->

              <article class="side-post-item" data-aos="fade-up" data-aos-delay="300">
                <div class="side-post-img">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/blog/blog-post-9.webp" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="side-post-content">
                  <a href="#" class="side-tag">Pelatihan</a>
                  <h4 class="side-post-title">
                    <a href="#">Workshop Kewirausahaan Perempuan: Dari Pelatihan Hingga Mandiri</a>
                  </h4>
                  <div class="side-post-meta">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-m-3.webp" alt="">
                    <span class="side-author">Bidang Pemberdayaan</span>
                    <span class="dot">·</span>
                    <span class="side-date">18 Nov 2025</span>
                  </div>
                </div>
              </article><!-- End Side Post -->

              <article class="side-post-item" data-aos="fade-up" data-aos-delay="400">
                <div class="side-post-img">
                  <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/blog/blog-post-6.webp" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="side-post-content">
                  <a href="#" class="side-tag">Inovasi</a>
                  <h4 class="side-post-title">
                    <a href="#">Integrasi Sistem Pengaduan Online Terpadu DISPPPAKB Sumut</a>
                  </h4>
                  <div class="side-post-meta">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/person/person-f-5.webp" alt="">
                    <span class="side-author">Unit IT & Data</span>
                    <span class="dot">·</span>
                    <span class="side-date">7 Des 2025</span>
                  </div>
                </div>
              </article><!-- End Side Post -->

            </div>
          </div><!-- End Side Posts -->

        </div>

      </div>

    </section><!-- /Recent News Section -->

    <!-- Events Section -->
    <section id="events" class="events section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan & Agenda</h2>
        <p>Jadwal sosialisasi, pelatihan, advokasi, dan rapat koordinasi DISPPPAKB Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="category-tabs" data-aos="fade-down" data-aos-delay="150">
          <ul class="nav">
            <li><button class="tab-link active" data-filter="all">Semua Kegiatan</button></li>
            <li><button class="tab-link" data-filter="lecture">Sosialisasi</button></li>
            <li><button class="tab-link" data-filter="athletic">Pelatihan</button></li>
            <li><button class="tab-link" data-filter="cultural">Advokasi</button></li>
            <li><button class="tab-link" data-filter="outreach">Rakor</button></li>
          </ul>
        </div>

        <!-- Featured Event -->
        <div class="featured-event" data-aos="fade-up" data-aos-delay="200">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="featured-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/events-4.webp" alt="Featured Event" class="img-fluid">
                <div class="featured-label">
                  <i class="bi bi-star-fill"></i> Unggulan
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="featured-content">
                <div class="event-meta">
                  <span class="tag lecture">Rakor</span>
                  <span class="event-datetime"><i class="bi bi-clock"></i> 10:00 WIB</span>
                </div>
                <div class="date-block">
                  <span class="month">NOV</span>
                  <span class="day">22</span>
                </div>
                <h3>Rapat Koordinasi Perlindungan Anak & Perempuan Se-Sumut</h3>
                <p>Evaluasi program prioritas, sinkronisasi data kasus, dan penguatan sinergi lintas OPD serta kabupaten/kota dalam penanganan perlindungan anak.</p>
                <div class="event-details-row">
                  <span><i class="bi bi-pin-map"></i> Aula DISPPPAKB Provinsi Sumut</span>
                  <span><i class="bi bi-people-fill"></i> 200 Peserta</span>
                </div>
                <a href="#" class="enroll-btn">Daftar Kehadiran <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Event -->

        <!-- Event List -->
        <div class="event-list">

          <div class="row g-4">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
              <div class="event-card">
                <div class="row g-0">
                  <div class="col-auto">
                    <div class="date-sidebar">
                      <span class="month">OKT</span>
                      <span class="day">28</span>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="card-thumb">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/events-1.webp" alt="Tournament" class="img-fluid">
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-content">
                      <div class="card-meta">
                        <span class="tag athletic">Pelatihan</span>
                        <span class="time"><i class="bi bi-clock"></i> 08:30 WIB</span>
                      </div>
                      <h4>Pelatihan Kader Posyandu & Perlindungan Anak</h4>
                      <div class="card-info">
                        <span><i class="bi bi-pin-map"></i> Hotel Aryaduta Medan</span>
                        <span><i class="bi bi-people-fill"></i> 50 Kader</span>
                      </div>
                      <a href="#" class="enroll-link">Daftar <i class="bi bi-chevron-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Event Card -->

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
              <div class="event-card">
                <div class="row g-0">
                  <div class="col-auto">
                    <div class="date-sidebar">
                      <span class="month">NOV</span>
                      <span class="day">10</span>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="card-thumb">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/events-9.webp" alt="Cultural Festival" class="img-fluid">
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-content">
                      <div class="card-meta">
                        <span class="tag cultural">Sosialisasi</span>
                        <span class="time"><i class="bi bi-clock"></i> 17:00 WIB</span>
                      </div>
                      <h4>Kampanye Hari Anak Nasional & Stop Kekerasan</h4>
                      <div class="card-info">
                        <span><i class="bi bi-pin-map"></i> Taman Bukit Barisan</span>
                        <span><i class="bi bi-people-fill"></i> Terbuka Umum</span>
                      </div>
                      <a href="#" class="enroll-link">Daftar <i class="bi bi-chevron-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Event Card -->

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
              <div class="event-card">
                <div class="row g-0">
                  <div class="col-auto">
                    <div class="date-sidebar">
                      <span class="month">DES</span>
                      <span class="day">07</span>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="card-thumb">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/events-10.webp" alt="Research Showcase" class="img-fluid">
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-content">
                      <div class="card-meta">
                        <span class="tag lecture">Advokasi</span>
                        <span class="time"><i class="bi bi-clock"></i> 13:30 WIB</span>
                      </div>
                      <h4>Workshop Penyusunan Perda Responsif Gender</h4>
                      <div class="card-info">
                        <span><i class="bi bi-pin-map"></i> Ruang Rapat DISPPPAKB</span>
                        <span><i class="bi bi-people-fill"></i> 30 Pejabat</span>
                      </div>
                      <a href="#" class="enroll-link">Daftar <i class="bi bi-chevron-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Event Card -->

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
              <div class="event-card">
                <div class="row g-0">
                  <div class="col-auto">
                    <div class="date-sidebar">
                      <span class="month">DES</span>
                      <span class="day">20</span>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="card-thumb">
                      <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/education/events-6.webp" alt="Outreach Program" class="img-fluid">
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-content">
                      <div class="card-meta">
                        <span class="tag outreach">Rakor</span>
                        <span class="time"><i class="bi bi-clock"></i> 09:00 WIB</span>
                      </div>
                      <h4>Bakti Sosial & Cek Kesehatan Gratis Ibu & Anak</h4>
                      <div class="card-info">
                        <span><i class="bi bi-pin-map"></i> Desa Binaan Deliserdang</span>
                        <span><i class="bi bi-people-fill"></i> Terbuka</span>
                      </div>
                      <a href="#" class="enroll-link">Daftar <i class="bi bi-chevron-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Event Card -->

          </div>

        </div><!-- End Event List -->

        <div class="calendar-link-wrapper text-center" data-aos="zoom-in" data-aos-delay="400">
          <a href="#" class="calendar-link">
            <i class="bi bi-calendar-week"></i>
            Lihat Kalender Kegiatan Lengkap
          </a>
        </div>

      </div>

    </section><!-- /Events Section -->

  </main>