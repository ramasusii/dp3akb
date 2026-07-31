<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Rencana Strategis</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Rencana Strategis</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Programs Section -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Rencana Strategis (Renstra) DPPPAKB</h2>
        <p>Dokumen perencanaan jangka menengah Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Featured Document (Renstra 2025-2029) -->
        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Renstra 2025-2029" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-file-earmark-pdf"></i> Dokumen Terbaru
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Perencanaan Jangka Menengah</div>
                <h3>Renstra DPPPAKB Tahun 2025-2029</h3>
                <p>Dokumen strategis yang memuat visi, misi, tujuan, sasaran, kebijakan, program, dan kegiatan DPPPAKB Provinsi Sumatera Utara untuk periode 2025-2029 sebagai pedoman penyelenggaraan pemerintahan dan pembangunan daerah.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-calendar3"></i>
                    <span>Periode 2025-2029</span>
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
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/renstra2025-2029.pdf" target="_blank" class="explore-link">Preview Dokumen <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <!-- Grid Dokumen Lainnya -->
        <div class="row g-4 mt-2">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Renstra 2024-2026" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2024-2026</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Perencanaan</span>
                <h4>Renstra 2024-2026</h4>
                <p>Rencana strategis periode sebelumnya yang menjadi dasar penyusunan program dan kegiatan tahunan.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/renstra2024-2026.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

  </main>