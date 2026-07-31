<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Struktur Organisasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Struktur Organisasi</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Leadership Section (Struktur Organisasi) -->
    <section id="leadership" class="leadership section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Struktur Organisasi</h2>
        <p>Susunan perangkat dan tata kelola organisasi DPPPAKB Provinsi Sumatera Utara yang profesional, terstruktur, dan akuntabel.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="overview-block">
          <div class="row g-5 align-items-center">
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
              <div class="visual-frame">
                <!-- ✅ Path gambar sesuai request -->
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/struktur.jpg" alt="Struktur Organisasi DPPPAKB" class="img-fluid">
              </div>
              <div class="row g-3 mt-3 stat-counters">
                <div class="col-4" data-aos="zoom-in" data-aos-delay="250">
                  <div class="stat-box">
                    <span class="number">1</span>
                    <span class="label">Kepala Dinas</span>
                  </div>
                </div>
                <div class="col-4" data-aos="zoom-in" data-aos-delay="350">
                  <div class="stat-box">
                    <span class="number">6</span>
                    <span class="label">Bidang Utama</span>
                  </div>
                </div>
                <div class="col-4" data-aos="zoom-in" data-aos-delay="450">
                  <div class="stat-box">
                    <span class="number">33</span>
                    <span class="label">Kab/Kota Binaan</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
              <div class="overview-content">
                <span class="tag-label">Tata Kelola Organisasi</span>
                <h2 class="heading">Susunan Organisasi DPPPAKB Provinsi Sumatera Utara</h2>
                <p class="blurb">DPPPAKB Provinsi Sumatera Utara dipimpin oleh seorang Kepala Dinas yang bertanggung jawab langsung kepada Gubernur melalui Sekretaris Daerah. Organisasi ini terdiri atas unsur pimpinan, sekretariat, bidang-bidang fungsional, serta unit pelaksana teknis daerah (UPTD) yang mendukung pelaksanaan tugas dan fungsi di wilayah provinsi.</p>
                <div class="row g-4 key-points">
                  <div class="col-sm-6">
                    <div class="point-card">
                      <i class="bi bi-diagram-3-fill"></i>
                      <h4>Struktur Hierarkis</h4>
                      <p>Tata kerja yang jelas dan berjenjang untuk menjamin koordinasi, sinergi, dan akuntabilitas kinerja.</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="point-card">
                      <i class="bi bi-people-fill"></i>
                      <h4>Tim Profesional</h4>
                      <p>Didukung oleh ASN berkompeten di bidang pemberdayaan, perlindungan anak, pengendalian penduduk, dan KB.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

    </section><!-- /Struktur Section -->

  </main>