<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Laporan Kinerja</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Laporan Kinerja</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Programs Section (Strict Template Structure) -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Laporan Akuntabilitas Kinerja (LAKIP)</h2>
        <p>Dokumen pertanggungjawaban kinerja dan capaian program DPPPAKB Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Featured Document (LAKIP 2025) -->
        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="LAKIP 2025" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-file-earmark-pdf"></i> Dokumen Terbaru
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Akuntabilitas Kinerja</div>
                <h3>LAKIP DPPPAKB Tahun 2025</h3>
                <p>Laporan pertanggungjawaban pelaksanaan kinerja, capaian indikator, dan realisasi anggaran DPPPAKB Provinsi Sumatera Utara Tahun Anggaran 2025 sebagai wujud transparansi dan akuntabilitas publik.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-calendar3"></i>
                    <span>Tahun Anggaran 2025</span>
                  </div>
                  <div class="stat-chip">
                    <i class="bi bi-shield-check"></i>
                    <span>Status: Final</span>
                  </div>
                  <div class="stat-chip">
                    <i class="bi bi-file-earmark-pdf"></i>
                    <span>Format: PDF</span>
                  </div>
                </div>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/lakip2025.pdf" target="_blank" class="explore-link">Preview Dokumen <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <!-- Grid Dokumen Lainnya -->
        <div class="row g-4 mt-2">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="LAKIP 2024" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2024</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Akuntabilitas</span>
                <h4>LAKIP 2024</h4>
                <p>Laporan akuntabilitas kinerja instansi pemerintah periode tahun anggaran 2024.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/lakip2024.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

  </main>