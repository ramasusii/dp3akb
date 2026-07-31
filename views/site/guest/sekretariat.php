<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Sekretariat</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Bidang-Bidang</li>
            <li class="current">Sekretariat</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- History Section (Strict Template Structure) -->
    <section id="history" class="history section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sekretariat DPPPAKB</h2>
        <p>Unsur pendukung kepemimpinan yang menyelenggarakan koordinasi, administrasi, dan pengelolaan sumber daya di lingkungan Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-7" data-aos="fade-right" data-aos-delay="200">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/organisasi.jpeg" alt="Sekretariat DPPPAKB" class="img-fluid rounded-3">
              <div class="experience-badge">
                <span class="years">Koordinasi</span>
                <span class="label">Administrasi</span>
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="300">
            <div class="story-content">
              <span class="subtitle">Tugas Pokok</span>
              <h2>Penyelenggaraan Dukungan Administrasi Terpadu</h2>
              <p>Sekretariat mempunyai tugas menyelenggarakan koordinasi pelaksanaan tugas pengendalian, pengawasan, pelaksanaan, pembinaan, monitoring, evaluasi dan pelaporan serta pemberian dukungan administrasi kepada seluruh unit organisasi di lingkungan DPPPAKB Provinsi Sumatera Utara.</p>
              <p>Sebagai unsur pendukung kepemimpinan, Sekretariat berperan strategis dalam memastikan kelancaran operasional dinas melalui tata kelola administrasi yang akuntabel, transparan, dan efisien.</p>
            </div>
          </div>
        </div>

        <!-- Fungsi Sekretariat -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">01</div>
                    <h4>Koordinasi Kebijakan</h4>
                    <p>Penyusunan kebijakan, program, kegiatan, dan anggaran dinas secara terintegrasi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h4>Pengendalian Kinerja</h4>
                    <p>Pelaksanaan monitoring, evaluasi, dan pelaporan kinerja seluruh unit organisasi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h4>Keuangan & Aset</h4>
                    <p>Penatausahaan keuangan, pengelolaan barang milik negara, dan layanan pengadaan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h4>Data & Informasi</h4>
                    <p>Pengelolaan data, informasi, kearsipan, dan dokumentasi dinas secara terpusat.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Uraian Tugas Sekretaris -->
        <div class="row mt-5 g-4">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-person-gear"></i>
              </div>
              <div class="purpose-body">
                <h3>Uraian Tugas Sekretaris</h3>
                <p class="mb-3">Sekretaris sebagai penanggung jawab administratif memiliki uraian tugas sebagai berikut:</p>
                <ul class="list-unstyled small mb-0">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Pembinaan dan bimbingan pegawai lingkup Sekretariat</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Penyusunan norma dan kriteria pelayanan kelembagaan</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Pengelolaan administrasi umum, aset, kepegawaian, dan keuangan</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Koordinasi rencana kerja Sekretariat dan Bidang-Bidang</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Penyusunan kebijakan, perencanaan, anggaran, dan penataan SDM</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-clipboard-check"></i>
              </div>
              <div class="purpose-body">
                <h3>Lanjutan Uraian Tugas</h3>
                <ul class="list-unstyled small mb-0">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Dukungan administrasi kinerja dan pelayanan umum</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Pengawasan rumah tangga, kebersihan, dan keamanan kantor</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Koordinasi target kinerja, laporan, dan evaluasi tahunan</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Pengendalian akuntabilitas kinerja dan anggaran</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Koordinasi reformasi birokrasi dan penilaian kinerja pegawai</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Prinsip Kerja Sekretariat -->
        <div class="row mt-5 pt-3 g-4">
          <div class="col-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="values-heading text-center">Prinsip Kerja Sekretariat</h3>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="principle-item">
              <span class="principle-number">01</span>
              <div class="principle-info">
                <h4>Akuntabel</h4>
                <p>Setiap proses administrasi dapat dipertanggungjawabkan secara transparan dan sesuai ketentuan.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="principle-item">
              <span class="principle-number">02</span>
              <div class="principle-info">
                <h4>Efisien</h4>
                <p>Penggunaan sumber daya yang optimal untuk mendukung kelancaran operasional dinas.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="principle-item">
              <span class="principle-number">03</span>
              <div class="principle-info">
                <h4>Koordinatif</h4>
                <p>Menjalin sinergi antar unit organisasi untuk mencapai target kinerja secara kolektif.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="450">
            <div class="principle-item">
              <span class="principle-number">04</span>
              <div class="principle-info">
                <h4>Responsif</h4>
                <p>Cepat tanggap dalam memberikan dukungan administrasi untuk kebutuhan seluruh bidang.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /History Section -->

  </main>