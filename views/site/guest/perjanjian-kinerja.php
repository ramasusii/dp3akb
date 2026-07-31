<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Perjanjian Kinerja</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Perjanjian Kinerja</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Programs Section -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Perjanjian Kinerja Kepala Dinas DPPPAKB</h2>
        <p>Dokumen komitmen, target, dan indikator kinerja Kepala Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Featured Document (PK 2026) -->
        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="assets/img/education/campus-7.webp" alt="PK 2026" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-file-earmark-pdf"></i> Dokumen Terbaru
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Komitmen Kinerja</div>
                <h3>Perjanjian Kinerja Kepala Dinas Tahun 2026</h3>
                <p>Dokumen formal yang memuat sasaran strategis, indikator kinerja utama (IKU), target capaian, serta komitmen Kepala Dinas DPPPAKB Provinsi Sumatera Utara dalam melaksanakan tugas dan fungsi tahun 2026.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-calendar3"></i>
                    <span>Tahun 2026</span>
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
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/pk2026.pdf" target="_blank" class="explore-link">Preview Dokumen <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <!-- Grid Dokumen Lainnya -->
        <div class="row g-4 mt-2">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card">
              <div class="card-thumb">
                <img src="assets/img/education/education-3.webp" alt="PK 2025" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2025</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Komitmen Kinerja</span>
                <h4>Perjanjian Kinerja 2025</h4>
                <p>Target dan indikator kinerja Kepala Dinas DPPPAKB untuk tahun anggaran 2025.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/pk2025.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="program-card">
              <div class="card-thumb">
                <img src="assets/img/education/education-7.webp" alt="PK 2024" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2024</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Komitmen Kinerja</span>
                <h4>Perjanjian Kinerja 2024</h4>
                <p>Dokumen komitmen pelaksanaan program dan evaluasi capaian kinerja tahun 2024.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/pk2024.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

  </main>