<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Rencana Kerja (Renja)</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Rencana Kerja</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Programs Section -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Rencana Kerja (Renja) DPPPAKB</h2>
        <p>Dokumen perencanaan tahunan Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Featured Document (Renja 2026) -->
        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Renja 2026" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-file-earmark-pdf"></i> Dokumen Terbaru
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Perencanaan Strategis</div>
                <h3>Renja DPPPAKB Tahun 2026</h3>
                <p>Dokumen perencanaan terkini yang memuat target, indikator kinerja, dan alokasi anggaran program pemberdayaan perempuan, perlindungan anak, serta pengendalian penduduk dan keluarga berencana.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-calendar3"></i>
                    <span>Tahun Anggaran 2026</span>
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
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/renja2026.pdf" target="_blank" class="explore-link">Preview Dokumen <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <!-- Other Years Grid -->
        <div class="row g-4 mt-2">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Renja 2025" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2025</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Perencanaan</span>
                <h4>Renja 2025</h4>
                <p>Rencana pelaksanaan kegiatan dan alokasi anggaran tahun 2025.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/renja2025.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Renja 2024" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2024</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Perencanaan</span>
                <h4>Renja 2024</h4>
                <p>Program strategis dan indikator kinerja DPPPAKB tahun 2024.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/renja2024.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Renja 2023" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2023</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Perencanaan</span>
                <h4>Renja 2023</h4>
                <p>Rencana kerja program pemberdayaan, perlindungan, dan KB tahun 2023.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/renja2023.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

  </main>