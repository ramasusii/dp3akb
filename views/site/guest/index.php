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
?>
   <?php

$beritaUtamaList = [];

/*
 * Menampung berita utama pilihan.
 */
if (!empty($beritaUtama)) {
    $beritaUtamaList[$beritaUtama->id] = $beritaUtama;
}

/*
 * Menambahkan berita lain yang juga ditandai utama.
 */
if (!empty($beritaTerbaru)) {
    foreach ($beritaTerbaru as $itemBerita) {
        if ((int) $itemBerita->is_utama === 1) {
            $beritaUtamaList[$itemBerita->id] = $itemBerita;
        }
    }
}

$beritaUtamaList = array_slice(
    array_values($beritaUtamaList),
    0,
    4
);

/*
 * Tiga berita untuk kartu horizontal paling atas.
 */
$beritaHighlight = [];

if (!empty($beritaUtama)) {
    $beritaHighlight[$beritaUtama->id] = $beritaUtama;
}

if (!empty($beritaTerbaru)) {
    foreach ($beritaTerbaru as $itemBerita) {
        $beritaHighlight[$itemBerita->id] = $itemBerita;
    }
}

$beritaHighlight = array_slice(
    array_values($beritaHighlight),
    0,
    3
);

/*
 * Link detail berita.
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
<style>
.card-premium-skm {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    border: 2px solid rgba(255,255,255,0.1);
}

.card-premium-skm:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}

.card-skm-image {
    position: relative;
    overflow: hidden;
    background: #fff;
    padding: 20px;
}

.card-skm-image img {
    max-height: 200px;
    object-fit: contain;
    width: 100%;
}

.card-skm-content {
    padding: 20px;
    color: #fff;
    text-align: center;
}

.card-skm-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-skm-desc {
    font-size: 0.9rem;
    margin-bottom: 20px;
    opacity: 0.9;
    line-height: 1.5;
}

.barcode-wrapper {
    background: #fff;
    border-radius: 10px;
    padding: 15px;
    margin: 15px 0;
    display: inline-block;
    width: 100%;
}

.barcode-img {
    width: 100%;
    max-width: 250px;
    height: auto;
    aspect-ratio: 1/1;
    object-fit: contain;
    display: block;
    margin: 0 auto;
}

.card-skm-footer {
    margin-top: 15px;
}

.card-skm-footer .badge {
    font-size: 0.85rem;
    padding: 8px 15px;
    background: rgba(255,255,255,0.2) !important;
    backdrop-filter: blur(10px);
}

.card-premium-skm a {
    color: inherit;
    display: block;
}

/* Responsive */
@media (max-width: 768px) {
    .card-skm-title {
        font-size: 1rem;
    }
    
    .barcode-img {
        max-width: 200px;
    }
}
</style>
<main class="main">
    <section
    id="hero-slider"
    class="hero-slider section"
>
    <div class="container-fluid p-0">

        <div
            id="dp3aSlider"
            class="carousel slide"
            data-bs-interval="5000"
            data-bs-pause="hover"
            data-bs-touch="true"
        >

            <?php if (!empty($slides)): ?>

                <!-- Indicators -->
                <?php if (count($slides) > 1): ?>
                    <div class="carousel-indicators">

                        <?php foreach ($slides as $i => $slide): ?>

                            <button
                                type="button"
                                data-bs-target="#dp3aSlider"
                                data-bs-slide-to="<?= (int) $i ?>"
                                class="<?= $i === 0 ? 'active' : '' ?>"
                                aria-current="<?= $i === 0 ? 'true' : 'false' ?>"
                                aria-label="Slide <?= (int) $i + 1 ?>"
                            ></button>

                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
                <!-- End Indicators -->


                <!-- Slides -->
                <div class="carousel-inner">

                    <?php foreach ($slides as $i => $slide): ?>

                        <?php
                        $bannerLink = resolveBannerLink($slide->link);

                        $isExternalLink = $bannerLink !== null
                            && preg_match(
                                '/^https?:\/\//i',
                                $bannerLink
                            );

                        $bannerImageUrl = $slide->getImageUrl();

                        $fallbackImageUrl =
                            Yii::$app->request->baseUrl
                            . '/web/images/no-image.png';
                        ?>

                        <div
                            class="carousel-item <?= $i === 0 ? 'active' : '' ?>"
                            data-slide-index="<?= (int) $i ?>"
                        >
                            <div class="slide-wrapper">

                                <?php
                                $bannerImage = Html::img(
                                    $bannerImageUrl,
                                    [
                                        'class' => 'd-block w-100 slider-img',
                                        'alt' => !empty($slide->judul)
                                            ? Html::encode($slide->judul)
                                            : 'Banner DP3AKB',
                                        'loading' => 'eager',
                                        'decoding' => 'async',
                                        'fetchpriority' => $i === 0
                                            ? 'high'
                                            : 'auto',
                                        'onerror' => "
                                            console.error(
                                                'Banner gagal dimuat:',
                                                this.src
                                            );
                                            this.onerror = null;
                                            this.src = '"
                                                . $fallbackImageUrl
                                                . "';
                                        ",
                                    ]
                                );
                                ?>

                                <?php if ($bannerLink !== null): ?>

                                    <?= Html::a(
                                        $bannerImage,
                                        $bannerLink,
                                        [
                                            'class' => 'slide-link',
                                            'target' => $isExternalLink
                                                ? '_blank'
                                                : null,
                                            'rel' => $isExternalLink
                                                ? 'noopener noreferrer'
                                                : null,
                                            'aria-label' => !empty($slide->judul)
                                                ? Html::encode($slide->judul)
                                                : 'Buka informasi banner',
                                        ]
                                    ) ?>

                                <?php else: ?>

                                    <?= $bannerImage ?>

                                <?php endif; ?>


                                <?php if (
                                    !empty($slide->judul)
                                    || !empty($slide->deskripsi)
                                    || (
                                        !empty($slide->button_text)
                                        && $bannerLink !== null
                                    )
                                ): ?>

                                    <div class="slide-caption">

                                        <?php if (!empty($slide->judul)): ?>
                                            <h2 class="slide-title">
                                                <?= Html::encode($slide->judul) ?>
                                            </h2>
                                        <?php endif; ?>

                                        <?php if (!empty($slide->deskripsi)): ?>
                                            <p class="slide-desc">
                                                <?= Html::encode($slide->deskripsi) ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (
                                            !empty($slide->button_text)
                                            && $bannerLink !== null
                                        ): ?>

                                            <?= Html::a(
                                                Html::encode(
                                                    $slide->button_text
                                                ),
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

                                <?php endif; ?>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <!-- End Slides -->


                <!-- Controls -->
                <?php if (count($slides) > 1): ?>

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#dp3aSlider"
                        data-bs-slide="prev"
                        aria-label="Banner sebelumnya"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>

                        <span class="visually-hidden">
                            Sebelumnya
                        </span>
                    </button>

                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#dp3aSlider"
                        data-bs-slide="next"
                        aria-label="Banner berikutnya"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>

                        <span class="visually-hidden">
                            Berikutnya
                        </span>
                    </button>

                <?php endif; ?>
                <!-- End Controls -->


            <?php else: ?>

                <!-- Banner Kosong -->
                <div class="carousel-inner">

                    <div class="carousel-item active">

                        <div class="slide-wrapper">

                            <?= Html::img(
                                Yii::$app->request->baseUrl
                                . '/web/images/no-image.png',
                                [
                                    'class' => 'd-block w-100 slider-img',
                                    'alt' => 'Banner belum tersedia',
                                    'loading' => 'eager',
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
                <!-- End Banner Kosong -->

            <?php endif; ?>

        </div>
        <!-- End Carousel -->

    </div>
    <!-- End Container Fluid -->

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sliderElement = document.getElementById('dp3aSlider');

    if (!sliderElement || typeof bootstrap === 'undefined') {
        return;
    }

    const images = Array.from(
        sliderElement.querySelectorAll('.slider-img')
    );

    const waitImages = images.map(function (image) {
        return new Promise(function (resolve) {
            if (image.complete) {
                resolve();
                return;
            }

            image.addEventListener('load', resolve, {
                once: true
            });

            image.addEventListener('error', resolve, {
                once: true
            });
        });
    });

    Promise.all(waitImages).then(function () {
        const carousel = bootstrap.Carousel.getOrCreateInstance(
            sliderElement,
            {
                interval: 5000,
                pause: 'hover',
                ride: false,
                touch: true,
                wrap: true
            }
        );

        carousel.cycle();
    });
});
</script>

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
        <section
          id="news-hero"
          class="news-hero section"
          style="padding-top: 0 !important;"
      >
          <div
              class="container"
              data-aos="fade-up"
              data-aos-delay="100"
          >

              <!-- Judul section -->
              <div
                  class="section-title"
                  data-aos="fade-up"
              >
                  <h2>Berita &amp; Kegiatan</h2>

                  <p>
                      Informasi terkini seputar pemberdayaan perempuan
                      dan perlindungan anak di Sumatera Utara
                  </p>
              </div>

              <!-- Tiga kartu berita teratas -->
              <?php if (!empty($beritaHighlight)): ?>

                  <div class="row g-4 mt-2">

                      <?php foreach (
                          $beritaHighlight as $index => $berita
                      ): ?>

                          <div
                              class="col-lg-4 col-md-6"
                              data-aos="fade-up"
                              data-aos-delay="<?= ($index + 1) * 100 ?>"
                          >
                              <article class="article-card">

                                  <div class="card-img-wrapper">

                                      <?= Html::a(
                                          Html::img(
                                              $berita->getImageUrl(),
                                              [
                                                  'alt' => Html::encode(
                                                      $berita->judul
                                                  ),
                                                  'class' => 'img-fluid',
                                                  'loading' => 'lazy',
                                                  'style' => '
                                                      width: 100%;
                                                      height: 100%;
                                                      aspect-ratio: 1080 / 636;
                                                      object-fit: cover;
                                                  ',
                                              ]
                                          ),
                                          $getDetailUrl($berita),
                                          [
                                              'title' => Html::encode(
                                                  $berita->judul
                                              ),
                                          ]
                                      ) ?>

                                      <span class="card-number">
                                          <?= str_pad(
                                              $index + 1,
                                              2,
                                              '0',
                                              STR_PAD_LEFT
                                          ) ?>
                                      </span>

                                  </div>

                                  <div class="card-body-content">

                                      <span class="topic-badge">
                                          <?= Html::encode(
                                              $getNamaKategori($berita)
                                          ) ?>
                                      </span>

                                      <h3 class="card-heading">

                                          <?= Html::a(
                                              Html::encode(
                                                  StringHelper::truncate(
                                                      $berita->judul,
                                                      100
                                                  )
                                              ),
                                              $getDetailUrl($berita),
                                              [
                                                  'title' => Html::encode(
                                                      $berita->judul
                                                  ),
                                              ]
                                          ) ?>

                                      </h3>

                                      <div class="writer-info compact">

                                          <span class="publish-date">

                                              <i class="bi bi-calendar3"></i>

                                              <?= Html::encode(
                                                  $getTanggalBerita(
                                                      $berita->tanggal_publish
                                                  )
                                              ) ?>

                                          </span>

                                      </div>

                                  </div>

                              </article>
                          </div>

                      <?php endforeach; ?>

                  </div>

              <?php else: ?>

                  <div class="alert alert-info text-center">
                      Belum ada berita yang dipublikasikan.
                  </div>

              <?php endif; ?>

              <!-- Section berita tabs -->
              <div
                  class="stories-tabs mt-5"
                  data-aos="fade-up"
                  data-aos-delay="200"
              >

                  <div class="tabs-header">

                      <ul class="nav nav-tabs" role="tablist">

                          <li class="nav-item" role="presentation">

                              <button
                                  class="nav-link active"
                                  data-bs-toggle="tab"
                                  data-bs-target="#berita-utama"
                                  type="button"
                              >
                                  <i class="bi bi-star-fill me-2"></i>
                                  Berita Utama
                              </button>

                          </li>

                          <li class="nav-item" role="presentation">

                              <button
                                  class="nav-link"
                                  data-bs-toggle="tab"
                                  data-bs-target="#berita-populer"
                                  type="button"
                              >
                                  <i class="bi bi-fire me-2"></i>
                                  Berita Populer
                              </button>

                          </li>

                          <li class="nav-item" role="presentation">

                              <button
                                  class="nav-link"
                                  data-bs-toggle="tab"
                                  data-bs-target="#berita-terbaru"
                                  type="button"
                              >
                                  <i class="bi bi-clock-history me-2"></i>
                                  Berita Terbaru
                              </button>

                          </li>

                      </ul>

                  </div>

                  <div class="tab-content">

                      <!-- Tab Berita Utama -->
                      <div
                          class="tab-pane fade show active"
                          id="berita-utama"
                      >

                          <?php if (!empty($beritaUtamaList)): ?>

                              <div class="row g-4">

                                  <?php foreach (
                                      $beritaUtamaList as $index => $berita
                                  ): ?>

                                      <div class="col-lg-6">

                                          <article class="list-article">

                                              <span class="list-num">
                                                  <?= str_pad(
                                                      $index + 1,
                                                      2,
                                                      '0',
                                                      STR_PAD_LEFT
                                                  ) ?>
                                              </span>

                                              <div class="list-img">

                                                  <?= Html::a(
                                                      Html::img(
                                                          $berita->getImageUrl(),
                                                          [
                                                              'alt' => Html::encode(
                                                                  $berita->judul
                                                              ),
                                                              'class' => 'img-fluid',
                                                              'loading' => 'lazy',
                                                          ]
                                                      ),
                                                      $getDetailUrl($berita)
                                                  ) ?>

                                              </div>

                                              <div class="list-body">

                                                  <span class="topic-badge sm">
                                                      <?= Html::encode(
                                                          $getNamaKategori($berita)
                                                      ) ?>
                                                  </span>

                                                  <h4 class="list-title">

                                                      <?= Html::a(
                                                          Html::encode(
                                                              StringHelper::truncate(
                                                                  $berita->judul,
                                                                  105
                                                              )
                                                          ),
                                                          $getDetailUrl($berita)
                                                      ) ?>

                                                  </h4>

                                                  <div class="writer-info compact">

                                                      <span class="publish-date">
                                                          <?= Html::encode(
                                                              $getTanggalBerita(
                                                                  $berita->tanggal_publish
                                                              )
                                                          ) ?>
                                                      </span>

                                                  </div>

                                              </div>

                                          </article>

                                      </div>

                                  <?php endforeach; ?>

                              </div>

                          <?php else: ?>

                              <div class="alert alert-info text-center">
                                  Belum ada berita utama.
                              </div>

                          <?php endif; ?>

                      </div>
                      <!-- End Tab Berita Utama -->


                      <!-- Tab Berita Populer -->
                      <div
                          class="tab-pane fade"
                          id="berita-populer"
                      >

                          <?php if (!empty($beritaPopuler)): ?>

                              <div class="row g-4">

                                  <?php foreach (
                                      $beritaPopuler as $index => $berita
                                  ): ?>

                                      <div class="col-lg-6">

                                          <article class="list-article">

                                              <span class="list-num">
                                                  <?= str_pad(
                                                      $index + 1,
                                                      2,
                                                      '0',
                                                      STR_PAD_LEFT
                                                  ) ?>
                                              </span>

                                              <div class="list-img">

                                                  <?= Html::a(
                                                      Html::img(
                                                          $berita->getImageUrl(),
                                                          [
                                                              'alt' => Html::encode(
                                                                  $berita->judul
                                                              ),
                                                              'class' => 'img-fluid',
                                                              'loading' => 'lazy',
                                                          ]
                                                      ),
                                                      $getDetailUrl($berita)
                                                  ) ?>

                                              </div>

                                              <div class="list-body">

                                                  <span class="topic-badge sm">
                                                      <?= Html::encode(
                                                          $getNamaKategori($berita)
                                                      ) ?>
                                                  </span>

                                                  <h4 class="list-title">

                                                      <?= Html::a(
                                                          Html::encode(
                                                              StringHelper::truncate(
                                                                  $berita->judul,
                                                                  105
                                                              )
                                                          ),
                                                          $getDetailUrl($berita)
                                                      ) ?>

                                                  </h4>

                                                  <div class="writer-info compact">

                                                      <span class="publish-date">

                                                          <?= Html::encode(
                                                              $getTanggalBerita(
                                                                  $berita->tanggal_publish
                                                              )
                                                          ) ?>

                                                          &nbsp;·&nbsp;

                                                          <i class="bi bi-eye"></i>

                                                          <?= (int) $berita->hits ?>

                                                      </span>

                                                  </div>

                                              </div>

                                          </article>

                                      </div>

                                  <?php endforeach; ?>

                              </div>

                          <?php else: ?>

                              <div class="alert alert-info text-center">
                                  Belum ada berita populer.
                              </div>

                          <?php endif; ?>

                      </div>
                      <!-- End Tab Berita Populer -->


                      <!-- Tab Berita Terbaru -->
                      <div
                          class="tab-pane fade"
                          id="berita-terbaru"
                      >

                          <?php if (!empty($beritaTerbaru)): ?>

                              <div class="row g-4">

                                  <?php foreach (
                                      $beritaTerbaru as $index => $berita
                                  ): ?>

                                      <div class="col-lg-6">

                                          <article class="list-article">

                                              <span class="list-num">
                                                  <?= str_pad(
                                                      $index + 1,
                                                      2,
                                                      '0',
                                                      STR_PAD_LEFT
                                                  ) ?>
                                              </span>

                                              <div class="list-img">

                                                  <?= Html::a(
                                                      Html::img(
                                                          $berita->getImageUrl(),
                                                          [
                                                              'alt' => Html::encode(
                                                                  $berita->judul
                                                              ),
                                                              'class' => 'img-fluid',
                                                              'loading' => 'lazy',
                                                          ]
                                                      ),
                                                      $getDetailUrl($berita)
                                                  ) ?>

                                              </div>

                                              <div class="list-body">

                                                  <span class="topic-badge sm">
                                                      <?= Html::encode(
                                                          $getNamaKategori($berita)
                                                      ) ?>
                                                  </span>

                                                  <h4 class="list-title">

                                                      <?= Html::a(
                                                          Html::encode(
                                                              StringHelper::truncate(
                                                                  $berita->judul,
                                                                  105
                                                              )
                                                          ),
                                                          $getDetailUrl($berita)
                                                      ) ?>

                                                  </h4>

                                                  <div class="writer-info compact">

                                                      <span class="publish-date">
                                                          <?= Html::encode(
                                                              $getTanggalBerita(
                                                                  $berita->tanggal_publish
                                                              )
                                                          ) ?>
                                                      </span>

                                                  </div>

                                              </div>

                                          </article>

                                      </div>

                                  <?php endforeach; ?>

                              </div>

                          <?php else: ?>

                              <div class="alert alert-info text-center">
                                  Belum ada berita terbaru.
                              </div>

                          <?php endif; ?>

                      </div>
                      <!-- End Tab Berita Terbaru -->

                  </div>

                  <!-- Tombol Lihat Semua Berita -->
                 <div class="text-center mt-4">

                  <?= Html::a(
                      '<span class="premium-news-btn-icon">'
                          . '<i class="bi bi-newspaper"></i>'
                          . '</span>'
                          . '<span class="premium-news-btn-text">'
                          . 'Lihat Semua Berita'
                          . '</span>'
                          . '<span class="premium-news-btn-arrow">'
                          . '<i class="bi bi-arrow-right"></i>'
                          . '</span>',
                      [
                          'site/daftar-berita',
                      ],
                      [
                          'class' => 'premium-news-btn',
                      ]
                  ) ?>

              </div>

              </div>
              <!-- End Section Berita dengan Tabs -->

          </div>
      </section>

      <?= $this->render('_edukasi-home', [
            'edukasiUtama' => $edukasiUtama,
        ]) ?>

            

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
                <h5 class="mb-1 fw-bold">Dwi Endah Purwanti, SS, M.Si</h5>
                <p class="text-muted small mb-2">Kepala Dinas PPPAKB Provinsi Sumatera Utara</p>
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
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="5" aria-label="Slide 7"></button>
                </div>
                
                <!-- Inner Slides -->
                <div class="carousel-inner rounded">
                   <div class="carousel-item active">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/poster/poster-index.jpeg" class="d-block w-100" alt="Infografis DP3AKB 1">
                  </div>
                  <div class="carousel-item">
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

            <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="150">
                <h3><i class="bi bi-clipboard-check"></i> Survei Kepuasan Masyarakat</h3>
                
                <div class="card-premium-skm">
                    <a href="https://bit.ly/SurveyUPTPPA2026" target="_blank" class="text-decoration-none">
                        
                        <div class="card-skm-content">
                            <h4 class="card-skm-title">SURVEI KEPUASAN MASYARAKAT (SKM)</h4>
                            <p class="card-skm-desc">Bantu kami meningkatkan kualitas pelayanan dengan mengisi survei ini</p>
                            
                            <div class="barcode-wrapper">
                                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/survey.png" 
                                    alt="Barcode SKM" 
                                    class="barcode-img">
                                <small class="d-block mt-2 text-muted">Scan atau klik untuk akses survei</small>
                            </div>
                            
                            <div class="card-skm-footer">
                                <span class="badge bg-primary">
                                    <i class="bi bi-link-45deg"></i> bit.ly/SurveyUPTPPA2026
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


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
            <!-- <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="250">
              <h3><i class="bi bi-poll"></i> Jajak Pendapat</h3>
              
              <div class="poll-question mb-3">
                <p class="small mb-2">Bagaimanakah menurut Anda dengan Pelayanan dan Kinerja DP3AKB Provsu?</p>
              </div>
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
            </div> -->
            <!-- End Widget Polling -->

          </div>
            </aside>
            <!-- End Sidebar Kanan -->
          </div>
          <!-- /Sidebar Kanan -->

      </div>
    </div>
  </section>


<style>
  .premium-news-btn {
    position: relative !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 12px !important;
    min-width: 235px !important;
    padding: 10px 12px !important;
    color: #ffffff !important;
    background: linear-gradient(
        135deg,
        #072585 0%,
        #1648bd 100%
    ) !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 999px !important;
    box-shadow:
        0 12px 28px rgba(7, 37, 133, 0.22),
        inset 0 1px 0 rgba(255, 255, 255, 0.18) !important;
    overflow: hidden !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        background 0.3s ease !important;
}

.premium-news-btn::before {
    position: absolute !important;
    top: 0 !important;
    left: -120% !important;
    width: 90% !important;
    height: 100% !important;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.25),
        transparent
    ) !important;
    transform: skewX(-20deg) !important;
    transition: left 0.6s ease !important;
    content: "" !important;
}

.premium-news-btn:hover::before {
    left: 140% !important;
}

.premium-news-btn:hover {
    color: #ffffff !important;
    background: linear-gradient(
        135deg,
        #051a5c 0%,
        #123ca0 100%
    ) !important;
    box-shadow:
        0 17px 34px rgba(7, 37, 133, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2) !important;
    transform: translateY(-3px) !important;
}

.premium-news-btn:focus {
    color: #ffffff !important;
    outline: none !important;
    box-shadow:
        0 0 0 4px rgba(7, 37, 133, 0.14),
        0 14px 30px rgba(7, 37, 133, 0.24) !important;
}

.premium-news-btn-icon {
    position: relative !important;
    z-index: 2 !important;
    display: inline-flex !important;
    width: 38px !important;
    height: 38px !important;
    align-items: center !important;
    justify-content: center !important;
    color: #072585 !important;
    background: #ffffff !important;
    border-radius: 50% !important;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.12) !important;
    font-size: 17px !important;
}

.premium-news-btn-text {
    position: relative !important;
    z-index: 2 !important;
    letter-spacing: 0.15px !important;
}

.premium-news-btn-arrow {
    position: relative !important;
    z-index: 2 !important;
    display: inline-flex !important;
    align-items: center !important;
    color: rgba(255, 255, 255, 0.92) !important;
    font-size: 16px !important;
    transition: transform 0.3s ease !important;
}

.premium-news-btn:hover .premium-news-btn-arrow {
    transform: translateX(5px) !important;
}

@media (max-width: 576px) {
    .premium-news-btn {
        width: 100% !important;
        max-width: 290px !important;
        min-width: 0 !important;
    }
}

</style>
  </main>
