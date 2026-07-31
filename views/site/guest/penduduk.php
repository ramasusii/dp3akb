<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Pengendalian Penduduk</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Bidang-Bidang</li>
            <li class="current">Pengendalian Penduduk</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- History Section (Strict Template Structure) -->
    <section id="history" class="history section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Bidang Pengendalian Penduduk</h2>
        <p>Unsur pelaksana teknis yang menyelenggarakan kebijakan pengendalian penduduk untuk mewujudkan pembangunan berkelanjutan di Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-7" data-aos="fade-right" data-aos-delay="200">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/organisasi.jpeg" alt="Pengendalian Penduduk" class="img-fluid rounded-3">
              <div class="experience-badge">
                <span class="years">Dinamika Penduduk</span>
                <span class="label">Kualitas SDM</span>
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="300">
            <div class="story-content">
              <span class="subtitle">Tugas Pokok</span>
              <h2>Pelaksanaan Kebijakan Teknis Pengendalian Penduduk</h2>
              <p>Bidang Pengendalian Penduduk mempunyai tugas melaksanakan kebijakan teknis di bidang pengendalian penduduk sebagai upaya strategis untuk menyeimbangkan pertumbuhan, persebaran, dan kualitas penduduk dalam mendukung pembangunan daerah.</p>
              <p>Bidang ini berperan penting dalam mengelola data kependudukan, mengoptimalkan bonus demografi, serta memastikan pembangunan infrastruktur dan layanan publik selaras dengan dinamika penduduk di Sumatera Utara.</p>
            </div>
          </div>
        </div>

        <!-- Fungsi Bidang -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">01</div>
                    <h4>Koordinasi Kebijakan</h4>
                    <p>Penyusunan, pelaksanaan, penguatan, dan evaluasi kebijakan pengendalian penduduk yang terintegrasi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h4>Upaya Pengendalian</h4>
                    <p>Koordinasi strategis untuk mengoptimalkan pertumbuhan, persebaran, dan kualitas penduduk.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h4>Penguatan Lembaga</h4>
                    <p>Pengembangan kapasitas lembaga penyedia layanan pengendalian penduduk di tingkat daerah.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h4>Monitoring Kinerja</h4>
                    <p>Pengendalian, pengawasan, pembinaan, monitoring, evaluasi, serta pelaporan akuntabilitas kinerja.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Program Fokus -->
        <div class="row mt-5 g-4">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-bar-chart-line-fill"></i>
              </div>
              <div class="purpose-body">
                <h3>Kebijakan Teknis & Data Kependudukan</h3>
                <p class="mb-3">Fokus pada pengelolaan data dan perencanaan berbasis dinamika penduduk:</p>
                <ul class="list-unstyled small mb-0">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Analisis dampak penduduk terhadap pembangunan daerah</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Penyusunan peta jalan pengendalian penduduk provinsi</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Pemanfaatan data kependudukan untuk perencanaan tata ruang</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Optimalisasi bonus demografi melalui peningkatan kualitas SDM</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Koordinasi lintas sektor dalam pengelolaan migrasi & urbanisasi</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="purpose-body">
                <h3>Pelaksanaan & Akuntabilitas</h3>
                <ul class="list-unstyled small mb-0">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Implementasi kebijakan teknis pengendalian penduduk di lapangan</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Sinkronisasi program dengan BKKBN dan OPD terkait</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Penyusunan Laporan Kinerja dan evaluasi capaian indikator</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Penguatan sistem pelaporan yang transparan & akuntabel</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Pembinaan teknis kepada kabupaten/kota dalam pengelolaan penduduk</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Prinsip Kerja Bidang -->
        <div class="row mt-5 pt-3 g-4">
          <div class="col-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="values-heading text-center">Prinsip Pengendalian Penduduk</h3>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="principle-item">
              <span class="principle-number">01</span>
              <div class="principle-info">
                <h4>Berbasis Data</h4>
                <p>Setiap kebijakan dan program mengacu pada data kependudukan yang akurat, terkini, dan terintegrasi.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="principle-item">
              <span class="principle-number">02</span>
              <div class="principle-info">
                <h4>Berkelanjutan</h4>
                <p>Pengendalian penduduk dirancang untuk mendukung pembangunan jangka panjang dan kelestarian lingkungan.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="principle-item">
              <span class="principle-number">03</span>
              <div class="principle-info">
                <h4>Sinergis</h4>
                <p>Koordinasi aktif dengan BKKBN, BPS, Dinas Kependudukan, dan lintas OPD untuk menghindari tumpang tindih.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="450">
            <div class="principle-item">
              <span class="principle-number">04</span>
              <div class="principle-info">
                <h4>Inklusif</h4>
                <p>Mempertimbangkan keragaman daerah, karakteristik demografi, dan kebutuhan spesifik tiap kabupaten/kota.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /History Section -->

  </main>