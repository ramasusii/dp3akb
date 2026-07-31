<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Laporan Keuangan</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Laporan Keuangan</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Programs Section (Strict Template Structure) -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Laporan Realisasi Anggaran</h2>
        <p>Dokumen Laporan Kinerja dan Realisasi Pendapatan serta Belanja Daerah DPPPAKB Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Main Featured Document (LK 2023) -->
        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Laporan Keuangan 2023" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-file-earmark-pdf"></i> Dokumen Terbaru
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Laporan Pertanggungjawaban</div>
                <h3>Laporan Realisasi Anggaran Pendapatan dan Belanja Daerah Tahun 2023</h3>
                <p>Dokumen resmi pertanggungjawaban pelaksanaan APBD DPPPAKB Provinsi Sumatera Utara Tahun Anggaran 2023, mencakup realisasi pendapatan, belanja, serta capaian indikator kinerja program secara transparan dan akuntabel.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-calendar3"></i>
                    <span>Tahun Anggaran 2023</span>
                  </div>
                  <div class="stat-chip">
                    <i class="bi bi-shield-check"></i>
                    <span>Status: Final & Terverifikasi</span>
                  </div>
                  <div class="stat-chip">
                    <i class="bi bi-file-earmark-pdf"></i>
                    <span>Format: PDF</span>
                  </div>
                </div>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/lk2023.pdf" target="_blank" class="explore-link">Preview Dokumen PDF <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <!-- Grid Dokumen Lainnya (2 Tahun) -->
        <div class="row g-4 mt-2">

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card h-100">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="LK 2023" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">Tahun 2023</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Laporan Keuangan</span>
                <h4>Realisasi Anggaran 2023</h4>
                <p>Rincian lengkap realisasi pendapatan, belanja, dan capaian kinerja program tahun 2023.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/lk2023.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="program-card h-100">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="LK 2022" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">Tahun 2022</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Laporan Keuangan</span>
                <h4>Realisasi Anggaran 2022</h4>
                <p>Laporan pertanggungjawaban pelaksanaan APBD dan evaluasi kinerja tahun 2022.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/lk2022.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

  </main>