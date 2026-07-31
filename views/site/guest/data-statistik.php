<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Data Statistik Pegawai</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Statistik Pegawai</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Stats Section (Adapted for Data Pegawai) -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Header Section -->
        <div class="row align-items-center mb-5">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="intro-block">
              <span class="intro-label">Profil SDM</span>
              <h2 class="main-heading">Statistik Pegawai DPPPAKB</h2>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-1" data-aos="fade-left" data-aos-delay="200">
            <div class="intro-description">
              <p>Data kepegawaian Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara yang disusun secara transparan sebagai bentuk akuntabilitas publik.</p>
            </div>
          </div>
        </div>

        <!-- TOTAL PEGAWAI (Main Banner) -->
        <div class="row">
          <div class="col-12">
            <div class="stats-banner" data-aos="zoom-in" data-aos-delay="250">
              <div class="row g-0 text-center">
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="67" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                    <h5>Total Pegawai</h5>
                    <p>ASN Aktif DPPPAKB</p>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="46" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                    <h5>Perempuan</h5>
                    <p>68,7% dari total</p>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="21" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                    <h5>Laki-Laki</h5>
                    <p>31,3% dari total</p>
                  </div>
                </div>
                <div class="col-6 col-lg-3">
                  <div class="stat-block">
                    <div class="stat-number">
                      <span data-purecounter-start="0" data-purecounter-end="2023" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                    <h5>Tahun Data</h5>
                    <p>Periode pencatatan</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Stats Banner -->

        <!-- Detail Breakdown: Education, Golongan, Gender -->
        <div class="row align-items-center mt-5 pt-4">
          
          <!-- BERDASARKAN PENDIDIKAN -->
          <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
            <div class="image-showcase">
              <div class="primary-image bg-light d-flex align-items-center justify-content-center rounded-3" style="min-height: 250px;">
                <div class="text-center">
                  <i class="bi bi-mortarboard-fill text-primary fs-1"></i>
                  <h5 class="mt-3 mb-0">Berdasarkan Pendidikan</h5>
                </div>
              </div>
              <div class="experience-tag">
                <span class="tag-number">S1</span>
                <span class="tag-text">Dominan</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-8" data-aos="fade-left" data-aos-delay="300">
            <div class="detail-content">
              <h3 class="detail-title">Komposisi Jenjang Pendidikan</h3>
              <p class="detail-text">Mayoritas pegawai DPPPAKB memiliki latar belakang pendidikan Sarjana (S1) dan Magister (S2), mencerminkan komitmen terhadap profesionalisme dan kompetensi aparatur dalam melayani masyarakat.</p>
              
              <div class="feature-list">
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="350">
                  <div class="feature-number">S2</div>
                  <div class="feature-detail">
                    <h5>Magister / S2</h5>
                    <p>19 orang — Tenaga ahli dengan kompetensi strategis di bidang kebijakan dan perencanaan.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="400">
                  <div class="feature-number">S1</div>
                  <div class="feature-detail">
                    <h5>Sarjana / S1</h5>
                    <p>39 orang — Pelaksana teknis dengan dasar keilmuan yang kuat di berbagai bidang.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="450">
                  <div class="feature-number">D3</div>
                  <div class="feature-detail">
                    <h5>Diploma III</h5>
                    <p>5 orang — Tenaga terampil pendukung operasional dan administrasi.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="500">
                  <div class="feature-number">SMA</div>
                  <div class="feature-detail">
                    <h5>SMA / Sederajat</h5>
                    <p>4 orang — Tenaga pendukung dengan pengalaman kerja yang mumpuni.</p>
                  </div>
                </div>
              </div><!-- End Feature List -->
            </div>
          </div>
        </div><!-- End Education Row -->

        <!-- GOLONGAN & JENIS KELAMIN -->
        <div class="row align-items-center mt-5 pt-4">
          
          <!-- BERDASARKAN GOLONGAN -->
          <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
            <div class="detail-content">
              <h3 class="detail-title">Distribusi Golongan Ruang</h3>
              <p class="detail-text">Struktur kepangkatan pegawai yang seimbang antara golongan penata (III) dan golongan pembina (IV), mendukung jenjang karir dan distribusi tanggung jawab yang proporsional.</p>
              
              <div class="feature-list">
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="350">
                  <div class="feature-number">IV</div>
                  <div class="feature-detail">
                    <h5>Golongan IV (Pembina)</h5>
                    <p>18 orang — Pejabat struktural dan fungsional dengan kewenangan pengambilan keputusan.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="400">
                  <div class="feature-number">III</div>
                  <div class="feature-detail">
                    <h5>Golongan III (Penata)</h5>
                    <p>42 orang — Pelaksana utama program dan kegiatan teknis di bidang pemberdayaan dan perlindungan.</p>
                  </div>
                </div>
                <div class="feature-entry" data-aos="fade-up" data-aos-delay="450">
                  <div class="feature-number">II</div>
                  <div class="feature-detail">
                    <h5>Golongan II (Pengatur)</h5>
                    <p>7 orang — Tenaga pendukung administrasi dan operasional harian.</p>
                  </div>
                </div>
              </div><!-- End Feature List -->
            </div>
          </div>

          <!-- BERDASARKAN JENIS KELAMIN -->
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="image-showcase">
              <div class="primary-image bg-light d-flex align-items-center justify-content-center rounded-3" style="min-height: 250px;">
                <div class="text-center">
                  <i class="bi bi-people-fill text-success fs-1"></i>
                  <h5 class="mt-3 mb-0">Berdasarkan Jenis Kelamin</h5>
                </div>
              </div>
              <div class="secondary-image position-absolute bottom-0 end-0 m-3 bg-white p-3 rounded-3 shadow-sm" style="width: 180px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="small fw-semibold">Perempuan</span>
                  <span class="badge bg-success">46</span>
                </div>
                <div class="progress" style="height: 8px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 68.7%" aria-valuenow="68.7" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 mb-2">
                  <span class="small fw-semibold">Laki-Laki</span>
                  <span class="badge bg-primary">21</span>
                </div>
                <div class="progress" style="height: 8px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 31.3%" aria-valuenow="31.3" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="small text-muted mb-0 mt-2">Representasi gender yang inklusif</p>
              </div>
            </div>
          </div>
        </div><!-- End Golongan & Gender Row -->

        <!-- Source Attribution -->
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-12">
            <div class="purpose-card p-4 bg-light rounded-3">
              <div class="d-flex align-items-start gap-3">
                <div class="purpose-icon flex-shrink-0">
                  <i class="bi bi-journal-text text-primary fs-4"></i>
                </div>
                <div class="purpose-body">
                  <h5 class="mb-2">Sumber Data</h5>
                  <p class="mb-1 small">
                    <strong>Bagian Kepegawaian</strong><br>
                    Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana<br>
                    Provinsi Sumatera Utara
                  </p>
                  <p class="mb-0 small text-muted">
                    <i class="bi bi-calendar3 me-1"></i> Periode Data: Tahun 2023
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Action / Download -->
        <div class="row mt-4 text-center" data-aos="zoom-in">
          <div class="col-12">
            <p class="text-muted small mb-3">
              Untuk kebutuhan data lebih rinci atau format resmi, silakan hubungi Bagian Kepegawaian DPPPAKB Provinsi Sumatera Utara.
            </p>
            <a href="<?= Url::to(['site/kontak']) ?>" class="btn btn-primary rounded-pill px-4">
              <i class="bi bi-envelope me-2"></i> Hubungi Bagian Kepegawaian
            </a>
          </div>
        </div>

      </div>

    </section><!-- /Stats Pegawai Section -->

  </main>