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

        <div class="staff-showcase" data-aos="fade-up">
          <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center" data-aos="zoom-in" data-aos-delay="200">
              <span class="tag-label centered">Unsur Pelaksana</span>
              <h2 class="heading">Bidang-Bidang Pelaksana Teknis</h2>
              <p class="blurb mb-0">Berikut adalah susunan bidang beserta fokus tugas masing-masing dalam mendukung terwujudnya kesetaraan gender, perlindungan anak, dan keluarga sejahtera di Sumatera Utara.</p>
            </div>
          </div>

          <div class="row g-4">
            <!-- Bidang 1: Sekretariat -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="staff-card">
                <div class="card-image">
                  <img src="assets/img/person/person-m-2.webp" alt="Sekretariat" class="img-fluid" loading="lazy">
                  <div class="card-overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h4>Sekretariat</h4>
                  <span class="role">Koordinator Administrasi</span>
                  <p class="excerpt">Menyelenggarakan urusan perencanaan, keuangan, kepegawaian, hukum, organisasi, tata laksana, dan umum sebagai penopang operasional dinas.</p>
                </div>
              </div>
            </div><!-- End Staff Card -->

            <!-- Bidang 2: PHA dan Kualitas Keluarga -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="staff-card">
                <div class="card-image">
                  <img src="assets/img/person/person-f-3.webp" alt="PHA dan Kualitas Keluarga" class="img-fluid" loading="lazy">
                  <div class="card-overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h4>PHA dan Kualitas Keluarga</h4>
                  <span class="role">Perempuan, Anak & Keluarga</span>
                  <p class="excerpt">Melaksanakan pengembangan dan penerapan kebijakan peningkatan kualitas keluarga serta pemenuhan hak dasar perempuan dan anak.</p>
                </div>
              </div>
            </div><!-- End Staff Card -->

            <!-- Bidang 3: Perlindungan Perempuan dan Perlindungan Khusus Anak -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="staff-card">
                <div class="card-image">
                  <img src="assets/img/person/person-m-7.webp" alt="Perlindungan Perempuan & Anak" class="img-fluid" loading="lazy">
                  <div class="card-overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h4>Perlindungan Perempuan & Perlindungan Khusus Anak</h4>
                  <span class="role">Penanganan Kasus & Advokasi</span>
                  <p class="excerpt">Menangani pengaduan, pendampingan korban, koordinasi rujukan, serta advokasi kebijakan perlindungan khusus bagi perempuan dan anak.</p>
                </div>
              </div>
            </div><!-- End Staff Card -->

            <!-- Bidang 4: PUG dan Pemberdayaan Perempuan -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="staff-card">
                <div class="card-image">
                  <img src="assets/img/person/person-f-9.webp" alt="PUG dan Pemberdayaan Perempuan" class="img-fluid" loading="lazy">
                  <div class="card-overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h4>PUG dan Pemberdayaan Perempuan</h4>
                  <span class="role">Kesetaraan Gender & Ekonomi</span>
                  <p class="excerpt">Melaksanakan pengarusutamaan gender, pemberdayaan ekonomi perempuan, serta pendampingan organisasi perempuan di tingkat provinsi.</p>
                </div>
              </div>
            </div><!-- End Staff Card -->

            <!-- Bidang 5: Pengendalian Penduduk -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="staff-card">
                <div class="card-image">
                  <img src="assets/img/person/person-m-11.webp" alt="Pengendalian Penduduk" class="img-fluid" loading="lazy">
                  <div class="card-overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h4>Pengendalian Penduduk</h4>
                  <span class="role">Data & Kebijakan Kependudukan</span>
                  <p class="excerpt">Menyelenggarakan pengendalian penduduk, analisis data kependudukan, serta koordinasi program terkait distribusi dan kualitas penduduk.</p>
                </div>
              </div>
            </div><!-- End Staff Card -->

            <!-- Bidang 6: Keluarga Berencana dan Keluarga Sejahtera -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="staff-card">
                <div class="card-image">
                  <img src="assets/img/person/person-f-12.webp" alt="KB dan Keluarga Sejahtera" class="img-fluid" loading="lazy">
                  <div class="card-overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h4>Keluarga Berencana dan Keluarga Sejahtera</h4>
                  <span class="role">Program KB & Ketahanan Keluarga</span>
                  <p class="excerpt">Melaksanakan penyelenggaraan keluarga berencana, peningkatan akses layanan kontrasepsi, serta pembinaan ketahanan dan kesejahteraan keluarga.</p>
                </div>
              </div>
            </div><!-- End Staff Card -->

          </div>
        </div>

      </div>

    </section><!-- /Struktur Section -->

  </main>