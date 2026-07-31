<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Profil Kekerasan</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Profil Kekerasan</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Programs Section -->
    <section id="featured-programs" class="featured-programs section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil Kekerasan terhadap Perempuan dan Anak di Sumut</h2>
        <p>Data dan analisis komprehensif mengenai kasus kekerasan terhadap perempuan dan anak di Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Featured Document (2024) -->
        <div class="featured-program" data-aos="zoom-in" data-aos-delay="150">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
              <div class="featured-img">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Profil Kekerasan 2024" class="img-fluid">
                <div class="featured-tag">
                  <i class="bi bi-file-earmark-pdf"></i> Data Terbaru
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="featured-content">
                <div class="category-label">Data & Analisis Kasus</div>
                <h3>Profil Kekerasan Tahun 2024</h3>
                <p>Data terkini mengenai tren, jenis, persebaran wilayah, dan penanganan kasus kekerasan terhadap perempuan dan anak di Provinsi Sumatera Utara tahun 2024.</p>
                <div class="stats-row">
                  <div class="stat-chip">
                    <i class="bi bi-calendar3"></i>
                    <span>Tahun 2024</span>
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
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/kekerasan2024.pdf" target="_blank" class="explore-link">Preview Dokumen <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Featured Program -->

        <!-- Grid Dokumen Lainnya -->
        <div class="row g-4 mt-2">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="program-card">
              <div class="card-thumb">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Profil Kekerasan 2023" class="img-fluid">
                <div class="card-overlay">
                  <span class="duration-badge">2023</span>
                </div>
              </div>
              <div class="card-body-content">
                <span class="degree-type">Data Tahunan</span>
                <h4>Profil Kekerasan 2023</h4>
                <p>Rekapitulasi data kasus dan analisis tren kekerasan tahun 2023 sebagai bahan evaluasi program perlindungan.</p>
                <a href="<?= Yii::$app->request->baseUrl ?>/web/dokumen/kekerasan2023.pdf" target="_blank" class="card-link">Preview PDF <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Program Card -->

        </div>

      </div>

    </section><!-- /Featured Programs Section -->

  </main>