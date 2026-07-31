<?php
  use yii\helpers\Url;
  use yii\helpers\Html;
  use app\components\MyComponent;
  use yii\helpers\StringHelper;

  if (!function_exists('resolveBannerLink')) {
      function resolveBannerLink($link)
      {
          if (empty($link)) {
              return null;
          }

          $link = trim($link);

          // URL eksternal lengkap.
          if (filter_var($link, FILTER_VALIDATE_URL)) {
              return $link;
          }

          // URL eksternal tanpa http/https, contoh: google.com
          if (
              preg_match(
                  '/^[a-z0-9.-]+\.[a-z]{2,}(\/.*)?$/i',
                  $link
              )
          ) {
              return 'https://' . $link;
          }

          // Route internal Yii2, contoh: site/pengaduan
          return Url::to([$link]);
      }
  }

  $beritaUtamaList = [];

  if (!empty($beritaUtama)) {
      $beritaUtamaList[$beritaUtama->id] = $beritaUtama;
  }

  foreach ($beritaTerbaru as $itemBerita) {
      if ((int) $itemBerita->is_utama === 1) {
          $beritaUtamaList[$itemBerita->id] = $itemBerita;
      }
  }

  $beritaUtamaList = array_slice(
      array_values($beritaUtamaList),
      0,
      4
  );

  /*
  * Data untuk tiga kartu paling atas.
  * Mengambil berita utama dan berita terbaru tanpa duplikat.
  */
  $beritaHighlight = [];

  if (!empty($beritaUtama)) {
      $beritaHighlight[$beritaUtama->id] = $beritaUtama;
  }

  foreach ($beritaTerbaru as $itemBerita) {
      $beritaHighlight[$itemBerita->id] = $itemBerita;
  }

  $beritaHighlight = array_slice(
      array_values($beritaHighlight),
      0,
      3
  );

  /*
  * URL detail berita.
  *
  * Route detail ini nanti menggunakan:
  * site/detail-berita?slug=slug-berita
  */
  $getDetailUrl = function ($berita) {
      return Url::to([
          'site/detail-berita',
          'slug' => $berita->slug,
      ]);
  };

  /*
  * Format tanggal berita.
  */
  $getTanggalBerita = function ($tanggal) {
      if (empty($tanggal)) {
          return '-';
      }

      $timestamp = strtotime($tanggal);

      if ($timestamp === false) {
          return '-';
      }

      return date('d-m-Y', $timestamp);
  };

  /*
  * Nama kategori.
  */
  $getNamaKategori = function ($berita) {
      return $berita->kategori
          ? $berita->kategori->nama_kategori
          : 'Berita';
  };

?>


<style>

   #dp3akb-main-section {
    padding: 3rem 0;
    background: #fff;
  }
  
  /* Sidebar kanan - sticky optional */
  .sidebar-kanan {
    position: sticky;
    top: 20px;
    z-index: 10;
  }
  
  /* Responsive: di HP sidebar turun ke bawah konten */
  @media (max-width: 991px) {
    .sidebar-kanan {
      position: static;
      margin-top: 2rem;
    }
  }

  /* TAMBAHAN */
/* Sesuaikan widget sidebar dengan template */
.filter-panel .sidebar-widget {
  background: var(--surface-color);
  border-radius: 12px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 12px color-mix(in srgb, var(--default-color), transparent 93%);
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.filter-panel .sidebar-widget h3 {
  font-size: 1rem;
  color: var(--heading-color);
  margin-bottom: 1.25rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid color-mix(in srgb, var(--accent-color), transparent 75%);
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.filter-panel .sidebar-widget h3 i {
  color: var(--accent-color);
  font-size: 1.1rem;
}

/* Callout info untuk cuitan & polling */
.callout-info {
  display: flex;
  gap: 1rem;
  padding: 1rem;
  background: color-mix(in srgb, var(--accent-color), transparent 92%);
  border-left: 4px solid var(--accent-color);
  border-radius: 0 8px 8px 0;
}

.callout-info .callout-icon {
  flex-shrink: 0;
}

.callout-info .callout-icon i {
  font-size: 1.3rem;
  color: var(--accent-color);
}

/* Category list untuk download */
.categories-widget .category-list {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.categories-widget .category-list .cat-item {
  display: flex;
  align-items: center;
  padding: 0.5rem 0.85rem;
  font-size: 0.85rem;
  background: color-mix(in srgb, var(--accent-color), transparent 90%);
  color: var(--accent-color);
  border-radius: 6px;
  transition: all 0.3s ease;
  text-decoration: none;
}

.categories-widget .category-list .cat-item:hover {
  background: var(--accent-color);
  color: var(--contrast-color);
  padding-left: 1.1rem;
}

/* Tags wrap untuk polling options */
.tags-wrap .tag {
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  padding: 0.4rem 0.8rem;
  margin: 0.2rem;
  border-radius: 6px;
  font-size: 0.8rem;
  background: color-mix(in srgb, var(--default-color), transparent 92%);
  color: var(--default-color);
  transition: all 0.3s ease;
}

.tags-wrap .tag:hover,
.tags-wrap .tag:has(input:checked) {
  background: var(--accent-color);
  color: var(--contrast-color);
}

.tags-wrap .tag input {
  cursor: pointer;
}
/* Sidebar lebih sempit - sesuaikan widget */
@media (min-width: 992px) {
  .col-lg-3 .sidebar-widget {
    padding: 1.25rem;
  }
  
  .col-lg-3 .sidebar-widget h3 {
    font-size: 0.95rem;
  }
  
  .col-lg-3 #infografisCarousel .carousel-item img {
    height: 220px; /* Lebih pendek biar muat */
    object-fit: cover;
  }
  
  .col-lg-3 .category-list .cat-item {
    font-size: 0.8rem;
    padding: 0.4rem 0.7rem;
  }
}
/* Responsive */
@media (max-width: 992px) {
  .filter-panel {
    position: static !important;
    margin-top: 2rem;
  }
}
</style>

<main class="main">
    <section
      id="hero-slider"
      class="hero-slider section"
      style="margin-bottom: 0 !important;"
  >
      <div
          id="dp3aSlider"
          class="carousel slide"
          data-bs-ride="carousel"
          data-bs-interval="5000"
      >

          <?php if (!empty($slides)): ?>

              <div class="carousel-indicators">
                  <?php foreach ($slides as $i => $s): ?>
                      <button
                          type="button"
                          data-bs-target="#dp3aSlider"
                          data-bs-slide-to="<?= $i ?>"
                          class="<?= $i === 0 ? 'active' : '' ?>"
                          aria-current="<?= $i === 0 ? 'true' : 'false' ?>"
                          aria-label="Slide <?= $i + 1 ?>"
                      ></button>
                  <?php endforeach; ?>
              </div>

              <div class="carousel-inner">

                  <?php foreach ($slides as $i => $s): ?>

                      <?php
                      $bannerLink = resolveBannerLink($s->link);

                      $isExternalLink = $bannerLink !== null
                          && preg_match(
                              '/^https?:\/\//i',
                              $bannerLink
                          );
                      ?>

                      <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                          <div class="slide-wrapper">

                              <?php if ($bannerLink !== null): ?>

                                  <?= Html::a(
                                      Html::img(
                                          $s->getImageUrl(),
                                          [
                                              'class' => 'd-block w-100 slider-img',
                                              'alt' => Html::encode($s->judul),
                                          ]
                                      ),
                                      $bannerLink,
                                      [
                                          'class' => 'slide-link',
                                          'target' => $isExternalLink
                                              ? '_blank'
                                              : null,
                                          'rel' => $isExternalLink
                                              ? 'noopener noreferrer'
                                              : null,
                                      ]
                                  ) ?>

                              <?php else: ?>

                                  <?= Html::img(
                                      $s->getImageUrl(),
                                      [
                                          'class' => 'd-block w-100 slider-img',
                                          'alt' => Html::encode($s->judul),
                                      ]
                                  ) ?>

                              <?php endif; ?>

                              <div class="slide-caption">

                                  <?php if (!empty($s->judul)): ?>
                                      <h2 class="slide-title">
                                          <?= Html::encode($s->judul) ?>
                                      </h2>
                                  <?php endif; ?>

                                  <?php if (!empty($s->deskripsi)): ?>
                                      <p class="slide-desc">
                                          <?= Html::encode($s->deskripsi) ?>
                                      </p>
                                  <?php endif; ?>

                                  <?php if (
                                      !empty($s->button_text)
                                      && $bannerLink !== null
                                  ): ?>

                                      <?= Html::a(
                                          Html::encode($s->button_text),
                                          $bannerLink,
                                          [
                                              'class' => 'btn-slider',
                                              'target' => $isExternalLink
                                                  ? '_blank'
                                                  : null,
                                              'rel' => $isExternalLink
                                                  ? 'noopener noreferrer'
                                                  : null,
                                          ]
                                      ) ?>

                                  <?php endif; ?>

                              </div>
                          </div>
                      </div>

                  <?php endforeach; ?>

              </div>

              <?php if (count($slides) > 1): ?>

                  <button
                      class="carousel-control-prev"
                      type="button"
                      data-bs-target="#dp3aSlider"
                      data-bs-slide="prev"
                  >
                      <span
                          class="carousel-control-prev-icon"
                          aria-hidden="true"
                      ></span>

                      <span class="visually-hidden">
                          Previous
                      </span>
                  </button>

                  <button
                      class="carousel-control-next"
                      type="button"
                      data-bs-target="#dp3aSlider"
                      data-bs-slide="next"
                  >
                      <span
                          class="carousel-control-next-icon"
                          aria-hidden="true"
                      ></span>

                      <span class="visually-hidden">
                          Next
                      </span>
                  </button>

              <?php endif; ?>

          <?php else: ?>

              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="slide-wrapper">

                          <?= Html::img(
                              Yii::$app->request->baseUrl
                              . '/web/images/no-image.png',
                              [
                                  'class' => 'd-block w-100 slider-img',
                                  'alt' => 'Banner belum tersedia',
                              ]
                          ) ?>

                          <div class="slide-caption">
                              <h2 class="slide-title">
                                  Banner Belum Tersedia
                              </h2>

                              <p class="slide-desc">
                                  Silakan tambahkan banner melalui halaman administrator.
                              </p>
                          </div>

                      </div>
                  </div>
              </div>

          <?php endif; ?>

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

  <section id="dp3akb-main-section">
    <div class="container">
      
      <div class="row g-4">
        
        <!-- 📌 KOLOM KONTEN (KIRI) -->
        <!-- Kakak bisa copy-paste HTML dari template ke dalam div ini nanti -->
         <div class="col-lg-9 col-md-12 order-1">
          
          <!-- 👇 AREA KONTEN UTAMA 👇 -->

        <!-- ✅ Wrapper Section dari Template (WAJIB ada biar CSS masuk) -->
        <section id="news-hero" class="news-hero section" style="padding-top:0!important">
          <div class="container" data-aos="fade-up" data-aos-delay="100">
            
            <!-- Section Title (opsional, biar rapi) -->
            <div class="section-title" data-aos="fade-up">
              <h2>Berita & Kegiatan</h2>
              <p>Informasi terkini seputar pemberdayaan perempuan dan perlindungan anak di Sumatera Utara</p>
            </div>

            <!-- 🔹 Secondary Articles Row (3 Card Horizontal) -->
            <div class="row g-4 mt-2">
              
              <!-- Article 1 -->
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <article class="article-card">
                  <div class="card-img-wrapper">
                    <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-24 at 18.08.43.jpeg" 
                        alt="Cegah TPPO" class="img-fluid" loading="lazy">
                    <span class="card-number">01</span>
                  </div>
                  <div class="card-body-content">
                    <span class="topic-badge">Program</span>
                    <h3 class="card-heading">
                      <a href="#">P3AKB Sumut Tegaskan Pentingnya Kolaborasi Cegah TPPO dan Pekerja Migran Ilegal</a>
                    </h3>
                    <div class="writer-info compact">
                      <span class="publish-date"><i class="bi bi-calendar3"></i> 25-09-2025</span>
                    </div>
                  </div>
                </article>
              </div>

              <!-- Article 2 -->
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <article class="article-card">
                  <div class="card-img-wrapper">
                    <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-24 at 14.58.08.jpeg" 
                        alt="Forum Anak" class="img-fluid" loading="lazy">
                    <span class="card-number">02</span>
                  </div>
                  <div class="card-body-content">
                    <span class="topic-badge">Anak</span>
                    <h3 class="card-heading">
                      <a href="#">P3AKB Sumut Kukuhkan dan Tingkatkan Kapasitas Forum Anak Daerah Sumut Periode 2025–2027</a>
                    </h3>
                    <div class="writer-info compact">
                      <span class="publish-date"><i class="bi bi-calendar3"></i> 24-09-2025</span>
                    </div>
                  </div>
                </article>
              </div>

              <!-- Article 3 -->
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <article class="article-card">
                  <div class="card-img-wrapper">
                    <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-19 at 19.37.09.jpeg" 
                        alt="Rakor Informasi" class="img-fluid" loading="lazy">
                    <span class="card-number">03</span>
                  </div>
                  <div class="card-body-content">
                    <span class="topic-badge">Kegiatan</span>
                    <h3 class="card-heading">
                      <a href="#">Kadis P3AKB Sumut Hadiri Rakor Arah Kebijakan Penyebaran Informasi Program Pemprov Sumut</a>
                    </h3>
                    <div class="writer-info compact">
                      <span class="publish-date"><i class="bi bi-calendar3"></i> 24-09-2025</span>
                    </div>
                  </div>
                </article>
              </div>

            </div>
            <!-- End Secondary Articles Row -->


            <!-- 🔹 List Articles (4 Item Vertical) -->
            <!-- 🔹 Section Berita dengan Tabs -->
          <div class="stories-tabs mt-5" data-aos="fade-up" data-aos-delay="200">
            
            <div class="tabs-header">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#berita-utama" type="button">
                    <i class="bi bi-star-fill me-2"></i>Berita Utama
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#berita-populer" type="button">
                    <i class="bi bi-fire me-2"></i>Berita Populer
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#berita-terbaru" type="button">
                    <i class="bi bi-clock-history me-2"></i>Berita Terbaru
                  </button>
                </li>
              </ul>
            </div>

            <div class="tab-content">
              
              <!-- Tab 1: Berita Utama -->
              <div class="tab-pane fade show active" id="berita-utama">
                <div class="row g-4">
                  
                  <!-- Berita Utama 1 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">01</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-26 at 10.55.14.jpeg" 
                            alt="Raker Komisi E" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Kegiatan</span>
                        <h4 class="list-title">
                          <a href="#">Kepala Dinas P3AKB Sumut Hadiri Raker Bersama Komisi E DPRD, Bahas Perubahan APBD 2025</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">26-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Utama 2 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">02</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-24 at 18.08.43.jpeg" 
                            alt="Cegah TPPO" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Program</span>
                        <h4 class="list-title">
                          <a href="#">P3AKB Sumut Tegaskan Pentingnya Kolaborasi Cegah TPPO dan Pekerja Migran Ilegal</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">25-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Utama 3 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">03</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-24 at 14.58.08.jpeg" 
                            alt="Forum Anak" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Anak</span>
                        <h4 class="list-title">
                          <a href="#">P3AKB Sumut Kukuhkan dan Tingkatkan Kapasitas Forum Anak Daerah Sumut Periode 2025–2027</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">24-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Utama 4 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">04</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-19 at 19.37.09.jpeg" 
                            alt="Rakor Informasi" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Pemerintahan</span>
                        <h4 class="list-title">
                          <a href="#">Kadis P3AKB Sumut Hadiri Rakor Arah Kebijakan Penyebaran Informasi Program Pemprov Sumut</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">24-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                </div>
              </div>
              <!-- End Tab Berita Utama -->


              <!-- Tab 2: Berita Populer -->
              <div class="tab-pane fade" id="berita-populer">
                <div class="row g-4">
                  
                  <!-- Berita Populer 1 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">01</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-17 at 11.52.30.jpeg" 
                            alt="Audiensi FK PUSPA" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Kemitraan</span>
                        <h4 class="list-title">
                          <a href="#">Dinas P3AKB Sumut Terima Audiensi FK PUSPA, Bahas Sinergi Program Perempuan dan Anak</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">17-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Populer 2 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">02</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-10 at 10.26.43.jpeg" 
                            alt="Audiensi Kombur DS" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Disabilitas</span>
                        <h4 class="list-title">
                          <a href="#">Dinas P3AKB Sumut Terima Audiensi Kombur DS dan Yayasan Pejuang Cerebral Palsy Medan</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">10-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Populer 3 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">03</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-09 at 09.13.49.jpeg" 
                            alt="Belanja Daerah" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Pemerintahan</span>
                        <h4 class="list-title">
                          <a href="#">Pemerintah Provinsi Sumatera Utara Dorong Percepatan Belanja Daerah dan Penguatan Ketahanan Pangan</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">09-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Populer 4 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">04</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/WhatsApp Image 2025-09-02 at 15.40.14.jpeg" 
                            alt="Entry Meeting BPK" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Audit</span>
                        <h4 class="list-title">
                          <a href="#">Kadis P3AKB Sumut Hadiri Entry Meeting Pemeriksaan Kepatuhan Pendahuluan Bersama Gubernur Sumut dan BPK RI</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">04-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                </div>
              </div>
              <!-- End Tab Berita Populer -->


              <!-- Tab 3: Berita Terbaru -->
              <div class="tab-pane fade" id="berita-terbaru">
                <div class="row g-4">
                  
                  <!-- Berita Terbaru 1 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">01</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/September/IMG_4054 (1).jpg" 
                            alt="Duta Siswa" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Pemberdayaan</span>
                        <h4 class="list-title">
                          <a href="#">Dinas P3AKB Provsu Terima Audiensi Duta Siswa Sumut 2025: Dorong Kolaborasi untuk Perlindungan Anak dan Pemberdayaan Perempuan</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">02-09-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Terbaru 2 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">02</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/11111111/WhatsApp Image 2025-08-28 at 09.43.47.jpeg" 
                            alt="Perubahan APBD" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Anggaran</span>
                        <h4 class="list-title">
                          <a href="#">Kadis P3AKB Sumut Hadiri Rapat Arah Kebijakan Pembangunan Perubahan APBD TA 2025</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">28-08-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Terbaru 3 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">03</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/2024/Final Leaflet 2024 - KDRT _page-0002.jpg" 
                            alt="SAPA 129" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">Layanan</span>
                        <h4 class="list-title">
                          <a href="#">SAPA 129: Hotline Pengaduan Korban Kekerasan Terhadap Perempuan dan Anak</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">15-08-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                  <!-- Berita Terbaru 4 -->
                  <div class="col-lg-6">
                    <article class="list-article">
                      <span class="list-num">04</span>
                      <div class="list-img">
                        <img src="http://dispppakb.sumutprov.go.id/public/storage/photos/9/KIE/Stop Pekerja Anak.jpeg" 
                            alt="Stop Pekerja Anak" class="img-fluid" loading="lazy">
                      </div>
                      <div class="list-body">
                        <span class="topic-badge sm">KIE</span>
                        <h4 class="list-title">
                          <a href="#">Kampanye Stop Pekerja Anak: Lindungi Masa Depan Generasi Penerus Bangsa</a>
                        </h4>
                        <div class="writer-info compact">
                          <span class="publish-date">10-08-2025</span>
                        </div>
                      </div>
                    </article>
                  </div>

                </div>
              </div>
              <!-- End Tab Berita Terbaru -->

            </div>

            <!-- Tombol Lihat Semua Berita -->
            <div class="text-center mt-4">
              <a href="#" class="btn btn-outline-primary px-4 py-2 rounded-pill">
                <i class="bi bi-newspaper"></i> Lihat Semua Berita
              </a>
            </div>

          </div>
<!-- End Section Berita dengan Tabs -->
            <!-- End List Articles -->

          </div>
        </section>

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
        <!-- ✅ End Wrapper Section -->
          <!-- 👆 AREA KONTEN UTAMA 👆 -->

        </div>
        <!-- /Kolom Konten -->


        <!-- 📌 SIDEBAR (KANAN) -->
         <div class="col-lg-3 col-md-12 order-2">
        <!-- Sidebar Kanan -->
        <aside >
          <div class="filter-panel" data-aos="fade-left" data-aos-delay="100">
            
            <!-- 🔹 Widget 1: Profil Kepala Dinas + Cuitan -->
            <!-- Widget 1: Profil Kepala Dinas + Cuitan -->
            <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="100">
              <h3><i class="bi bi-person-badge"></i> Kepala Dinas</h3>
              
              <!-- Foto Full Width -->
              <div class="mb-3 overflow-hidden rounded">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/ai-kadis.png" 
                    class="w-100" 
                    alt="Dwi Endar Purwanti"
                    style="height: 260px; object-fit: cover; object-position: top center;">
              </div>
              
              <!-- Nama & Jabatan -->
              <div class="text-center mb-3">
                <h5 class="mb-1 fw-bold">Dwi Endar Purwanti, SS, M.Si</h5>
                <p class="text-muted small mb-2">Kepala Dinas DP3AKB Provinsi Sumatera Utara</p>
              </div>
              
              <!-- Cuitan Box -->
              <div class="callout-info mb-3">
                <div class="callout-icon"><i class="bi bi-chat-quote"></i></div>
                <div class="callout-content">
                  <p class="mb-0 small" id="cuatanText">"Melindungi perempuan dan anak adalah investasi untuk masa depan Sumatera Utara yang lebih baik."</p>
                  <small class="text-muted d-block mt-2" id="cuatanDate">Update: <?= date('d M Y') ?></small>
                </div>
              </div>
              
            </div>
            <!-- End Widget Kepala Dinas -->


            <!-- 🔹 Widget 2: Infografis Carousel (Updated 6 Poster) -->
            <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="150">
              <h3><i class="bi bi-graph-up"></i> Infografis</h3>
              
              <div id="infografisCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                
                <!-- Indicators (6 tombol navigasi bawah) -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                
                <!-- Inner Slides -->
                <div class="carousel-inner rounded">
                  <div class="carousel-item active">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster.jpg" class="d-block w-100" alt="Infografis DP3AKB 1">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster1.jpeg" class="d-block w-100" alt="Infografis DP3AKB 2">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster2.jpeg"  class="d-block w-100" alt="Infografis DP3AKB 3">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster3.jpeg" class="d-block w-100" alt="Infografis DP3AKB 4">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster4.jpeg"  class="d-block w-100" alt="Infografis DP3AKB 5">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster5.jpeg"  class="d-block w-100" alt="Infografis DP3AKB 6">
                  </div>
                </div>
                
                <!-- Controls (Panah Kiri/Kanan) -->
                <button class="carousel-control-prev" type="button" data-bs-target="#infografisCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#infografisCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <!-- End Widget Infografis -->


            <!-- 🔹 Widget 3: File Download (pakai style category-list) -->
            <div class="sidebar-widget categories-widget" data-aos="fade-left" data-aos-delay="200">
              <h3><i class="bi bi-download"></i> File Download</h3>
              
              <div class="category-list">
                <a href="#" target="_blank" class="cat-item">
                  <i class="bi bi-file-pdf text-danger me-1"></i> Profil Anak Sumut 2022
                </a>
                <a href="#" target="_blank" class="cat-item">
                  <i class="bi bi-file-pdf text-danger me-1"></i> Data Gender & Anak 2021
                </a>
                <a href="#" target="_blank" class="cat-item">
                  <i class="bi bi-file-pdf text-danger me-1"></i> Profil Gender 2022
                </a>
                <a href="http://dispppakb.sumutprov.go.id/public/storage/files/9/USUL%20PENETAPAN%20ASET%20DP3A%20DPPKB.pdf" target="_blank" class="cat-item">
                  <i class="bi bi-file-pdf text-danger me-1"></i> Profil Kekerasan 2023
                </a>
                <a href="#" target="_blank" class="cat-item">
                  <i class="bi bi-file-pdf text-danger me-1"></i> Profil Kekerasan 2024
                </a>
                <a href="http://dispppakb.sumutprov.go.id/public/storage/files/9/LHE%20AKIP%202023.pdf" target="_blank" class="cat-item">
                  <i class="bi bi-file-pdf text-danger me-1"></i> LHE AKIP 2023
                </a>
              </div>
              
              <!-- <div class="text-center mt-3">
                <a href="#" class="cat-item" style="background: var(--accent-color); color: #fff;">
                  <i class="bi bi-folder"></i> Lihat Semua File
                </a>
              </div> -->
            </div>
            <!-- End Widget File Download -->


            <!-- 🔹 Widget 4: Polling Kinerja (pakai style callout) -->
            <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="250">
              <h3><i class="bi bi-poll"></i> Jajak Pendapat</h3>
              
              <div class="poll-question mb-3">
                <p class="small mb-2">Bagaimanakah menurut Anda dengan Pelayanan dan Kinerja DP3AKB Provsu?</p>
              </div>

              <!-- Form Polling -->
              <div id="pollForm">
                <div class="category-tags mb-3">
                  <div class="tags-wrap">
                    <label class="tag">
                      <input type="radio" name="pollOption" value="sangat_baik" class="me-1"> Sangat Baik
                    </label>
                    <label class="tag">
                      <input type="radio" name="pollOption" value="baik" class="me-1"> Baik
                    </label>
                    <label class="tag">
                      <input type="radio" name="pollOption" value="cukup" class="me-1"> Cukup
                    </label>
                    <label class="tag">
                      <input type="radio" name="pollOption" value="kurang" class="me-1"> Kurang
                    </label>
                  </div>
                </div>
                
                <button type="button" class="btn btn-sm w-100" id="btnVote" 
                        style="background: var(--accent-color); color: var(--contrast-color);">
                  <i class="bi bi-check-circle"></i> Kirim Suara
                </button>
              </div>

              <!-- Pesan Sudah Vote -->
              <div id="pollVotedMessage" class="callout-info d-none">
                <div class="callout-icon">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
                <p class="mb-0 small">Terima kasih! Anda sudah memberikan suara.</p>
              </div>
              
              <div class="mt-3 d-none" id="btnLihatHasilWrapper">
                <button type="button" class="btn btn-sm btn-outline-info w-100" id="btnLihatHasil">
                  <i class="bi bi-bar-chart"></i> Lihat Hasil
                </button>
              </div>
            </div>
            <!-- End Widget Polling -->

          </div>
            </aside>
            <!-- End Sidebar Kanan -->
          </div>
          <!-- /Sidebar Kanan -->

      </div>
    </div>
  </section>



  </main>