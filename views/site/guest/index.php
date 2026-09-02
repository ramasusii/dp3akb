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


      <!-- STANDAR PELAYANAN DP3AKB -->
      <section id="standar-pelayanan-home" class="standar-pelayanan-home section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="layanan-editorial-intro" data-aos="fade-up">

            <div class="layanan-editorial-accent" aria-hidden="true">
              <span>03</span>
              <small>Layanan Dinas</small>
            </div>

            <div class="layanan-editorial-main">

              <div class="layanan-editorial-kicker">
                <span class="kicker-line"></span>

                <span class="kicker-text">
                  Pelayanan Publik · Informasi Resmi
                </span>
              </div>

              <h2>
                Tiga Layanan Dinas,
                <span>
                  satu informasi yang lebih mudah dipahami.
                </span>
              </h2>

              <p class="layanan-editorial-lead">
                Sebelum mengajukan layanan, kenali terlebih dahulu
                ketentuan dan alur pelayanan DP3AKB Provinsi Sumatera Utara.
                Video ini merangkum informasi penting secara ringkas dan
                mudah diikuti oleh masyarakat.
              </p>

            </div>

            <div class="layanan-editorial-panel">

              <span class="panel-label">
                Tercakup dalam video
              </span>

              <div class="panel-services">

                <a
                  href="<?= Yii::$app->request->baseUrl ?>/web/uploads/sk-pelayanan/standar-pelayanan-permintaan-narasumber.pdf"
                  class="panel-service-item panel-service-download"
                  download
                  aria-label="Download Standar Pelayanan Permintaan Narasumber"
                >
                  <span class="service-download-icon">
                    <i class="bi bi-mic-fill"></i>
                  </span>

                  <span class="service-download-copy">
                    <small>Layanan 01</small>
                    <strong>Permintaan Narasumber</strong>
                  </span>

                  <span class="service-download-action">
                    <i class="bi bi-file-earmark-arrow-down"></i>
                  </span>
                </a>

                <a
                  href="<?= Yii::$app->request->baseUrl ?>/web/uploads/sk-pelayanan/standar-pelayanan-permintaan-sosialisasi.pdf"
                  class="panel-service-item panel-service-download"
                  download
                  aria-label="Download Standar Pelayanan Permintaan Sosialisasi"
                >
                  <span class="service-download-icon">
                    <i class="bi bi-megaphone-fill"></i>
                  </span>

                  <span class="service-download-copy">
                    <small>Layanan 02</small>
                    <strong>Permintaan Sosialisasi</strong>
                  </span>

                  <span class="service-download-action">
                    <i class="bi bi-file-earmark-arrow-down"></i>
                  </span>
                </a>

                <a
                  href="<?= Yii::$app->request->baseUrl ?>/web/uploads/sk-pelayanan/standar-pelayanan-permintaan-data.pdf"
                  class="panel-service-item panel-service-download"
                  download
                  aria-label="Download Standar Pelayanan Permintaan Data"
                >
                  <span class="service-download-icon">
                    <i class="bi bi-database-fill"></i>
                  </span>

                  <span class="service-download-copy">
                    <small>Layanan 03</small>
                    <strong>Permintaan Data</strong>
                  </span>

                  <span class="service-download-action">
                    <i class="bi bi-file-earmark-arrow-down"></i>
                  </span>
                </a>

              </div>

              <div class="panel-footnote">
                <i class="bi bi-file-earmark-pdf"></i>
                <span>
                  Pilih layanan untuk mengunduh dokumen standarnya,
                  atau tonton rangkumannya pada video di bawah.
                </span>
              </div>

            </div>

          </div>

          <div class="layanan-video-card" data-aos="fade-up" data-aos-delay="150">
            <div class="layanan-video-top">
              <div class="layanan-video-title">
                <div class="layanan-video-icon">
                  <i class="bi bi-play-btn-fill"></i>
                </div>

                <div>
                  <span>Video Standar Pelayanan Dinas</span>
                  <h3>Standar Pelayanan Dinas DP3AKB Provinsi Sumatera Utara</h3>
                </div>
              </div>

              <div class="layanan-video-badge">
                <i class="bi bi-patch-check-fill"></i>
                Informasi Resmi
              </div>
            </div>

            <div class="layanan-video-frame">
              <iframe
                src="https://www.youtube.com/embed/iZ_Zm4wkETo?rel=0"
                title="Standar Pelayanan DP3AKB Provinsi Sumatera Utara"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
              ></iframe>
            </div>

            <div class="layanan-video-footer">
              <div class="video-footer-note">
                <span class="video-note-icon">
                  <i class="bi bi-info-lg"></i>
                </span>

                <div>
                  <strong>Informasi Pelayanan Dinas</strong>
                  <span>
                    Video ini membahas Permintaan Narasumber,
                    Permintaan Sosialisasi, dan Permintaan Data.
                  </span>
                </div>
              </div>

              <div class="layanan-video-actions">
                <a
                  href="<?= Yii::$app->request->baseUrl ?>/web/uploads/sk-pelayanan/standar-pelayanan-dinas-p3akb-provsu.pdf"
                  class="layanan-pdf-download"
                  download
                  aria-label="Download PDF Standar Pelayanan Dinas DP3AKB 2026"
                >
                  <span class="pdf-download-icon">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                  </span>

                  <span class="pdf-download-copy">
                    <small>Dokumen Lengkap</small>
                    <strong>Download Semua</strong>
                  </span>

                  <i class="bi bi-arrow-down-circle pdf-download-arrow"></i>
                </a>

                <div class="video-official-mark">
                  <i class="bi bi-shield-fill-check"></i>
                  <span>DP3AKB Provsu</span>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="layanan-page-heading" data-aos="fade-up" data-aos-delay="180">
            <span>Informasi Selengkapnya</span>
            <h3>Akses Halaman Standar Pelayanan</h3>
            <p>
              Video di atas khusus untuk Pelayanan Dinas. Informasi Pelayanan Dinas
              dan Pelayanan UPT tetap tersedia pada halaman terpisah berikut.
            </p>
          </div>

          <div class="layanan-home-grid" data-aos="fade-up" data-aos-delay="200">

            <a
              href="<?= Url::to(['site/sk-pelayanan-dinas']) ?>"
              class="layanan-home-card"
            >
              <div class="layanan-card-number">01</div>

              <div class="layanan-card-icon">
                <i class="bi bi-building"></i>
              </div>

              <div class="layanan-card-content">
                <span class="layanan-card-label">Pelayanan Dinas</span>
                <h3>Standar Pelayanan Dinas</h3>
                <p>
                  Permintaan Narasumber, Permintaan Sosialisasi,
                  dan Permintaan Data.
                </p>

                <div class="layanan-card-link">
                  Lihat informasi
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
            </a>

            <a
              href="<?= Url::to(['site/sk-pelayanan-upt']) ?>"
              class="layanan-home-card layanan-home-card-alt"
            >
              <div class="layanan-card-number">02</div>

              <div class="layanan-card-icon">
                <i class="bi bi-people"></i>
              </div>

              <div class="layanan-card-content">
                <span class="layanan-card-label">Pelayanan UPT</span>
                <h3>Standar Pelayanan UPT</h3>
                <p>
                  Informasi layanan UPT terkait perlindungan
                  perempuan dan anak.
                </p>

                <div class="layanan-card-link">
                  Lihat informasi
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
            </a>

          </div> -->
        </div>
      </section>

      <style>
      #standar-pelayanan-home {
        position: relative;
        margin: 12px 0 8px !important;
        padding: 64px 0 !important;
        overflow: hidden;
        background:
          radial-gradient(circle at 92% 8%, rgba(7,37,133,.08), transparent 28%),
          radial-gradient(circle at 8% 92%, rgba(248,171,60,.09), transparent 24%),
          linear-gradient(180deg,#f8faff 0%,#fff 48%,#f7f9fe 100%) !important;
        border-top: 1px solid #edf1f7;
        border-bottom: 1px solid #edf1f7;
      }

      /* Editorial intro */
      .layanan-editorial-intro {
        position: relative;
        display: grid;
        max-width: 980px;
        margin: 0 auto 38px;
        padding: 34px 34px 32px;
        grid-template-columns: 78px minmax(0, 1.35fr) minmax(260px, .8fr);
        gap: 28px;
        align-items: stretch;

        overflow: hidden;

        background:
          radial-gradient(
            circle at 92% 2%,
            rgba(248,171,60,.11),
            transparent 24%
          ),
          linear-gradient(
            145deg,
            rgba(255,255,255,.98),
            rgba(246,249,255,.98)
          );

        border: 1px solid #dce5f3;
        border-radius: 28px;

        box-shadow:
          0 24px 65px rgba(13,31,76,.09),
          inset 0 1px 0 rgba(255,255,255,.95);
      }

      .layanan-editorial-intro::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background:
          linear-gradient(
            90deg,
            #072585 0%,
            #174bc8 72%,
            #f8ab3c 100%
          );
        content: "";
      }

      .layanan-editorial-accent {
        display: flex;
        min-height: 185px;
        padding: 15px 8px;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        color: #ffffff;

        background:
          linear-gradient(
            160deg,
            #061c68,
            #0b3ca7
          );

        border-radius: 20px;

        box-shadow:
          0 15px 30px rgba(7,37,133,.18);
      }

      .layanan-editorial-accent span {
        display: block;
        font-size: 32px;
        font-weight: 850;
        line-height: 1;
        letter-spacing: -1px;
      }

      .layanan-editorial-accent small {
        display: block;
        margin-top: 12px;
        color: rgba(255,255,255,.72);
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1.15px;
        text-align: center;
        text-transform: uppercase;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
      }

      .layanan-editorial-main {
        align-self: center;
      }

      .layanan-editorial-kicker {
        display: flex;
        margin-bottom: 13px;
        align-items: center;
        gap: 11px;
      }

      .kicker-line {
        display: block;
        width: 34px;
        height: 2px;
        flex: 0 0 34px;
        background: #f8ab3c;
        border-radius: 99px;
      }

      .kicker-text {
        color: #072585;
        font-size: 10px;
        font-weight: 850;
        letter-spacing: 1.4px;
        text-transform: uppercase;
      }

      .layanan-editorial-main h2 {
        margin: 0 0 17px;
        color: #1d293e;
        font-size: clamp(31px,3.4vw,45px);
        font-weight: 820;
        line-height: 1.12;
        letter-spacing: -1px;
      }

      .layanan-editorial-main h2 span {
        display: block;
        color: #072585;
      }

      .layanan-editorial-lead {
        max-width: 610px;
        margin: 0;
        color: #6d788b;
        font-size: 14.5px;
        line-height: 1.85;
      }

      .layanan-editorial-panel {
        position: relative;
        align-self: center;
        padding: 22px 20px;

        background:
          linear-gradient(
            145deg,
            rgba(7,37,133,.045),
            rgba(255,255,255,.72)
          );

        border: 1px solid rgba(7,37,133,.09);
        border-radius: 19px;
      }

      .panel-label {
        display: block;
        margin-bottom: 13px;
        color: #7a8496;
        font-size: 9px;
        font-weight: 850;
        letter-spacing: 1.25px;
        text-transform: uppercase;
      }

      .panel-services {
        display: flex;
        flex-direction: column;
        gap: 11px;
      }

      .panel-service-item {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #263147;
        font-size: 12px;
        font-weight: 720;
        line-height: 1.4;
      }

      .panel-service-download {
        position: relative;
        min-height: 58px;
        padding: 8px 9px 8px 8px;
        gap: 10px;
        overflow: hidden;

        color: #263147 !important;
        background:
          linear-gradient(
            135deg,
            rgba(255,255,255,.95),
            rgba(246,249,255,.92)
          );

        border: 1px solid rgba(7,37,133,.10);
        border-radius: 14px;

        box-shadow:
          0 7px 18px rgba(20,35,75,.045);

        text-decoration: none !important;

        transition:
          transform .25s ease,
          border-color .25s ease,
          box-shadow .25s ease,
          background .25s ease;
      }

      .panel-service-download::before {
        position: absolute;
        top: 0;
        left: -100%;
        width: 52%;
        height: 100%;
        pointer-events: none;

        background:
          linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.8),
            transparent
          );

        transform: skewX(-20deg);
        transition: left .55s ease;
        content: "";
      }

      .panel-service-download:hover {
        color: #263147 !important;
        background:
          linear-gradient(
            135deg,
            #ffffff,
            #f2f6ff
          );

        border-color: rgba(7,37,133,.20);

        box-shadow:
          0 12px 26px rgba(7,37,133,.10);

        transform: translateY(-2px);
      }

      .panel-service-download:hover::before {
        left: 135%;
      }

      .service-download-icon {
        position: relative;
        z-index: 2;
        display: inline-flex;
        width: 40px;
        height: 40px;
        flex: 0 0 40px;
        align-items: center;
        justify-content: center;

        color: #ffffff;
        background:
          linear-gradient(
            135deg,
            #072585,
            #174bc8
          );

        border-radius: 11px;

        box-shadow:
          0 7px 16px rgba(7,37,133,.17);

        font-size: 15px;
      }

      .service-download-copy {
        position: relative;
        z-index: 2;
        display: flex;
        min-width: 0;
        flex: 1;
        flex-direction: column;
        gap: 2px;
      }

      .service-download-copy small {
        color: #8993a4;
        font-size: 8px;
        font-weight: 800;
        letter-spacing: .8px;
        text-transform: uppercase;
      }

      .service-download-copy strong {
        overflow: hidden;
        color: #263147;
        font-size: 11.5px;
        font-weight: 780;
        line-height: 1.3;
        text-overflow: ellipsis;
      }

      .service-download-action {
        position: relative;
        z-index: 2;
        display: inline-flex;
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        align-items: center;
        justify-content: center;

        color: #072585;
        background: #edf2ff;
        border: 1px solid #dbe5fb;
        border-radius: 10px;

        font-size: 14px;

        transition:
          color .25s ease,
          background .25s ease,
          transform .25s ease;
      }

      .panel-service-download:hover .service-download-action {
        color: #ffffff;
        background: #072585;
        transform: translateY(2px);
      }

      .panel-footnote {
        display: flex;
        margin-top: 18px;
        padding-top: 14px;
        align-items: center;
        gap: 8px;

        color: #8a94a5;
        border-top: 1px solid rgba(7,37,133,.09);

        font-size: 10.5px;
        line-height: 1.5;
      }

      .panel-footnote i {
        color: #f8ab3c;
        font-size: 14px;
      }

      .layanan-video-card {
        position: relative;
        max-width: 980px;
        margin: 0 auto;
        overflow: hidden;
        background: rgba(255,255,255,.96);
        border: 1px solid rgba(213,223,241,.9);
        border-radius: 28px;
        box-shadow:
          0 34px 90px rgba(9,28,76,.14),
          0 8px 26px rgba(9,28,76,.05),
          inset 0 1px 0 rgba(255,255,255,.95);
      }

      .layanan-video-card::before {
        position: absolute;
        top: -90px;
        right: -70px;
        z-index: 0;
        width: 220px;
        height: 220px;
        pointer-events: none;
        background: radial-gradient(
          circle,
          rgba(248,171,60,.16),
          rgba(248,171,60,0) 68%
        );
        border-radius: 50%;
        content: "";
      }

      .layanan-video-top {
        position: relative;
        z-index: 2;
        display: flex;
        padding: 23px 24px;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        background:
          linear-gradient(
            135deg,
            rgba(255,255,255,.98),
            rgba(244,248,255,.96)
          );
        border-bottom: 1px solid #e3e9f3;
      }

      .layanan-video-title {
        display: flex;
        align-items: center;
        gap: 13px;
      }

      .layanan-video-icon {
        display: flex;
        width: 48px;
        height: 48px;
        flex: 0 0 48px;
        align-items: center;
        justify-content: center;
        color: #fff;
        background: linear-gradient(135deg,#072585,#174bc8);
        border-radius: 14px;
        box-shadow: 0 9px 20px rgba(7,37,133,.2);
        font-size: 21px;
      }

      .layanan-video-title span {
        display: block;
        margin-bottom: 3px;
        color: #7c8799;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.1px;
        text-transform: uppercase;
      }

      .layanan-video-title h3 {
        margin: 0;
        color: #212c41;
        font-size: 18px;
        font-weight: 760;
        line-height: 1.35;
      }

      .layanan-video-badge {
        display: inline-flex;
        padding: 8px 12px;
        align-items: center;
        gap: 7px;
        color: #0b7149;
        background: #ebf8f1;
        border: 1px solid #ccecdc;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 750;
        white-space: nowrap;
      }

      .layanan-video-frame {
        position: relative;
        z-index: 1;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
        background:
          linear-gradient(
            135deg,
            #071f70,
            #0b3598
          );
        box-shadow:
          inset 0 1px 0 rgba(255,255,255,.04),
          inset 0 -1px 0 rgba(255,255,255,.04);
      }

      .layanan-video-frame iframe {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        border: 0;
      }

      .layanan-video-footer {
        display: flex;
        padding: 18px 22px;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        background:
          linear-gradient(
            135deg,
            rgba(247,250,255,.98),
            rgba(255,255,255,.98)
          );
        border-top: 1px solid #e7ebf2;
      }

      .video-footer-note {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #6f7a8d;
      }

      .video-note-icon {
        display: inline-flex;
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        align-items: center;
        justify-content: center;
        color: #072585;
        background: #edf2ff;
        border: 1px solid #dae4fa;
        border-radius: 12px;
        font-size: 15px;
      }

      .video-footer-note > div {
        display: flex;
        flex-direction: column;
        gap: 2px;
      }

      .video-footer-note strong {
        color: #263147;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .15px;
      }

      .video-footer-note > div > span {
        color: #7a8496;
        font-size: 11.5px;
        line-height: 1.55;
      }

      .layanan-video-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
      }

      .layanan-pdf-download {
        position: relative;
        display: inline-flex;
        min-height: 46px;
        padding: 7px 11px 7px 8px;
        align-items: center;
        gap: 10px;
        overflow: hidden;

        color: #ffffff !important;
        background:
          linear-gradient(
            135deg,
            #071f70 0%,
            #0b3ca7 100%
          );

        border: 1px solid rgba(255,255,255,.16);
        border-radius: 14px;

        box-shadow:
          0 10px 24px rgba(7,37,133,.18),
          inset 0 1px 0 rgba(255,255,255,.15);

        text-decoration: none !important;

        transition:
          transform .25s ease,
          box-shadow .25s ease;
      }

      .layanan-pdf-download::before {
        position: absolute;
        top: 0;
        left: -90%;
        width: 60%;
        height: 100%;
        background:
          linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.18),
            transparent
          );
        transform: skewX(-18deg);
        transition: left .55s ease;
        content: "";
      }

      .layanan-pdf-download:hover {
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow:
          0 14px 30px rgba(7,37,133,.24),
          inset 0 1px 0 rgba(255,255,255,.18);
      }

      .layanan-pdf-download:hover::before {
        left: 130%;
      }

      .pdf-download-icon {
        position: relative;
        z-index: 2;
        display: inline-flex;
        width: 34px;
        height: 34px;
        flex: 0 0 34px;
        align-items: center;
        justify-content: center;

        color: #b4232f;
        background: #ffffff;
        border-radius: 10px;

        font-size: 17px;
        box-shadow: 0 5px 12px rgba(0,0,0,.12);
      }

      .pdf-download-copy {
        position: relative;
        z-index: 2;
        display: flex;
        min-width: 92px;
        flex-direction: column;
        line-height: 1.15;
      }

      .pdf-download-copy small {
        margin-bottom: 2px;
        color: rgba(255,255,255,.66);
        font-size: 8px;
        font-weight: 800;
        letter-spacing: .8px;
        text-transform: uppercase;
      }

      .pdf-download-copy strong {
        color: #ffffff;
        font-size: 11.5px;
        font-weight: 800;
      }

      .pdf-download-arrow {
        position: relative;
        z-index: 2;
        color: rgba(255,255,255,.82);
        font-size: 16px;
      }

      .video-official-mark {
        display: inline-flex;
        padding: 8px 11px;
        align-items: center;
        gap: 7px;
        color: #072585;
        background: rgba(7,37,133,.055);
        border: 1px solid rgba(7,37,133,.12);
        border-radius: 999px;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .25px;
        white-space: nowrap;
      }

      .layanan-page-heading {
        max-width: 760px;
        margin: 34px auto 18px;
        text-align: center;
      }

      .layanan-page-heading span {
        display: block;
        margin-bottom: 5px;
        color: #072585;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.1px;
        text-transform: uppercase;
      }

      .layanan-page-heading h3 {
        margin: 0 0 8px;
        color: #202b40;
        font-size: 22px;
        font-weight: 780;
      }

      .layanan-page-heading p {
        margin: 0 auto;
        color: #747f91;
        font-size: 13px;
        line-height: 1.75;
      }

      .layanan-home-grid {
        display: grid;
        max-width: 980px;
        margin: 28px auto 0;
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 18px;
      }

      .layanan-home-card {
        position: relative;
        display: flex;
        min-height: 175px;
        padding: 26px;
        align-items: flex-start;
        gap: 18px;
        overflow: hidden;
        color: inherit !important;
        background:
          radial-gradient(
            circle at 92% 10%,
            rgba(7,37,133,.07),
            transparent 26%
          ),
          linear-gradient(
            145deg,
            #ffffff 0%,
            #f8faff 100%
          );
        border: 1px solid #dce5f3;
        border-radius: 22px;
        box-shadow:
          0 16px 38px rgba(20,35,75,.075),
          inset 0 1px 0 rgba(255,255,255,.9);
        text-decoration: none !important;
        transition:
          transform .3s ease,
          box-shadow .3s ease,
          border-color .3s ease;
      }

      .layanan-home-card:hover {
        border-color: #ccd8f2;
        box-shadow: 0 20px 42px rgba(7,37,133,.13);
        transform: translateY(-6px);
      }

      .layanan-home-card-alt {
        background:
          radial-gradient(
            circle at 92% 10%,
            rgba(248,171,60,.13),
            transparent 27%
          ),
          linear-gradient(
            145deg,
            #fffaf3 0%,
            #ffffff 72%
          );
      }

      .layanan-card-number {
        position: absolute;
        top: 10px;
        right: 19px;
        color: rgba(7,37,133,.055);
        font-size: 62px;
        font-weight: 900;
        line-height: 1;
      }

      .layanan-card-icon {
        position: relative;
        z-index: 2;
        display: flex;
        width: 58px;
        height: 58px;
        flex: 0 0 58px;
        align-items: center;
        justify-content: center;
        color: #fff;
        background: linear-gradient(135deg,#072585,#174bc8);
        border-radius: 17px;
        box-shadow: 0 10px 22px rgba(7,37,133,.2);
        font-size: 23px;
      }

      .layanan-home-card-alt .layanan-card-icon {
        background: linear-gradient(135deg,#f8ab3c,#ee8f19);
        box-shadow: 0 10px 22px rgba(248,171,60,.22);
      }

      .layanan-card-content {
        position: relative;
        z-index: 2;
      }

      .layanan-card-label {
        display: block;
        margin-bottom: 5px;
        color: #072585;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
      }

      .layanan-home-card-alt .layanan-card-label {
        color: #a46705;
      }

      .layanan-card-content h3 {
        margin: 0 0 7px;
        color: #202b40;
        font-size: 18px;
        font-weight: 760;
        line-height: 1.4;
      }

      .layanan-card-content p {
        margin: 0 0 12px;
        color: #707b8e;
        font-size: 12.5px;
        line-height: 1.7;
      }

      .layanan-card-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #072585;
        font-size: 12px;
        font-weight: 750;
      }

      .layanan-card-link i {
        transition: transform .25s ease;
      }

      .layanan-home-card:hover .layanan-card-link i {
        transform: translateX(4px);
      }

      @media (max-width: 991px) {
        #standar-pelayanan-home {
          padding: 55px 0 !important;
        }

        .layanan-editorial-intro {
          grid-template-columns: 68px minmax(0, 1fr);
        }

        .layanan-editorial-panel {
          grid-column: 1 / -1;
        }

        .layanan-home-grid {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 767px) {
        #standar-pelayanan-home {
          padding: 45px 0 !important;
        }

        .layanan-editorial-intro {
          margin-bottom: 29px;
          padding: 22px 18px;
          grid-template-columns: 1fr;
          gap: 20px;
          border-radius: 21px;
        }

        .layanan-editorial-accent {
          min-height: 0;
          padding: 13px 16px;
          align-items: center;
          justify-content: flex-start;
          flex-direction: row;
          gap: 10px;
          border-radius: 14px;
        }

        .layanan-editorial-accent span {
          font-size: 23px;
        }

        .layanan-editorial-accent small {
          margin-top: 0;
          font-size: 9px;
          writing-mode: initial;
          transform: none;
        }

        .layanan-editorial-main h2 {
          font-size: 29px;
          letter-spacing: -.6px;
        }

        .layanan-editorial-lead {
          font-size: 14px;
          line-height: 1.8;
        }

        .layanan-editorial-panel {
          padding: 18px 16px;
          border-radius: 16px;
        }

        .layanan-video-card {
          border-radius: 18px;
        }

        .layanan-video-top {
          padding: 16px;
          align-items: flex-start;
          flex-direction: column;
        }

        .layanan-video-title h3 {
          font-size: 15px;
        }

        .layanan-video-footer {
          padding: 15px;
          align-items: flex-start;
          flex-direction: column;
        }

        .layanan-video-actions {
          width: 100%;
          align-items: stretch;
          flex-direction: column;
        }

        .layanan-pdf-download {
          width: 100%;
          justify-content: flex-start;
        }

        .video-official-mark {
          align-self: flex-start;
        }

        .layanan-home-grid {
          margin-top: 20px;
        }

        .layanan-home-card {
          min-height: 0;
          padding: 21px 18px;
          gap: 14px;
          border-radius: 17px;
        }

        .layanan-card-icon {
          width: 50px;
          height: 50px;
          flex-basis: 50px;
          border-radius: 15px;
          font-size: 20px;
        }

        .layanan-card-content h3 {
          font-size: 16px;
        }
      }
      </style>

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
              <h3><i class="bi bi-graph-up"></i> Laporan Layanan Kekerasan</h3>
              
              <div id="infografisCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                
                <!-- Indicators (6 tombol navigasi bawah) -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#infografisCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  
                </div>
                
                <!-- Inner Slides -->
                <div class="carousel-inner rounded">
                   <div class="carousel-item active">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/infografis/april.jpeg" class="d-block w-100" alt="Infografis DP3AKB 1">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= Yii::$app->request->baseUrl ?>/web/img/infografis/feb.jpeg" class="d-block w-100" alt="Infografis DP3AKB 1">
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

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/profil-anak-sumut-2022.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Anak Sumut 2022
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/data-gender-anak-sumut-2021.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Data Gender & Anak 2021
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/profil-gender-sumut-2022.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Gender 2022
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/profil-anak-sumut-2021.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Anak Sumut 2021
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/data-gender-anak-sumut-2022.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Data Gender & Anak 2022
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/profil-bangga-kencana-sumut-2025.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Bangga Kencana Sumut 2025
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/kekerasan2023.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Kekerasan 2023
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/kekerasan2024.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Kekerasan 2024
                </a>

                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/kekerasan2025.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                Profil Kekerasan 2025
                </a>

                <!--
                <a href="http://dispppakb.sumutprov.go.id/public/storage/files/9/LHE%20AKIP%202023.pdf"
                target="_blank"
                class="cat-item">
                <i class="bi bi-file-pdf text-danger me-1"></i>
                LHE AKIP 2023
                </a>
                -->

            </div>
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
