<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Subbagian Tata Usaha</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">UPT PPA</li>
            <li class="current">Subbagian Tata Usaha</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section (Strict Template Structure) -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Subbagian Tata Usaha UPTD PPA</h2>
        <p>Unsur pendukung operasional yang menyelenggarakan administrasi umum, keuangan, kepegawaian, ketatausahaan, dan pengelolaan data korban di lingkungan UPTD Perlindungan Perempuan dan Anak.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Main Intro -->
        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/profil.jpeg" alt="Subbagian Tata Usaha" class="img-fluid">
              <div class="experience-badge">
                <span class="years">Administrasi</span>
                <span class="label">Pendukung</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="story-content">
              <span class="subtitle">Peran Strategis</span>
              <h3>Dukungan Administratif Terpadu</h3>
              <p>Subbagian Tata Usaha bertanggung jawab melaksanakan pengumpulan data/bahan, penyiapan rencana program dan anggaran, serta mengelola administrasi keuangan, kepegawaian, ketatausahaan, dan kerumahtanggaan untuk memastikan kelancaran operasional UPTD PPA.</p>
              <p>Selain fungsi administratif, Subbagian juga mencatat data korban, mengelola arsip dan aset, serta menyusun laporan kinerja sebagai bahan pertimbangan pengambilan kebijakan Kepala UPTD.</p>
            </div>
          </div>
        </div><!-- End Story Row -->

        <!-- Fungsi Utama (Menggunakan Template Milestones Grid) -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <h3 class="values-heading text-center mb-4" data-aos="fade-up">Fungsi & Tugas Pokok</h3>
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">01</div>
                    <h4>Perencanaan & Anggaran</h4>
                    <p>Penyiapan penyusunan rencana program, kegiatan, dan anggaran UPTD berdasarkan kebutuhan operasional.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="150">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h4>Keuangan & Akuntansi</h4>
                    <p>Pelaksanaan akuntansi, penatausahaan, dan pelaporan keuangan sesuai standar akuntansi pemerintahan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h4>SDM & Kepegawaian</h4>
                    <p>Pengolahan data kepegawaian, administrasi pegawai, dan dukungan pengembangan kompetensi aparatur.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="250">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h4>Ketatausahaan & Arsip</h4>
                    <p>Penerimaan, pendistribusian surat, naskah dinas, serta pengelolaan arsip dan barang bergerak/tidak bergerak.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">05</div>
                    <h4>Data Korban</h4>
                    <p>Pencatatan, pendataan, dan penyimpanan informasi korban secara terstruktur dan terlindungi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                  <div class="milestone-card">
                    <div class="milestone-year">06</div>
                    <h4>Kerumahtanggaan</h4>
                    <p>Pengelolaan sarana/prasarana, perawatan lingkungan kantor, kendaraan dinas, serta keamanan dan ketertiban.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">07</div>
                    <h4>Evaluasi Kinerja</h4>
                    <p>Pelaksanaan evaluasi hasil kerja Subbagian dan penyusunan telaahan staf sebagai bahan pertimbangan kebijakan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="milestone-card">
                    <div class="milestone-year">08</div>
                    <h4>Tugas Tambahan</h4>
                    <p>Pelaksanakan tugas lain yang diberikan oleh Kepala UPTD dan memberikan masukan strategis sesuai bidang tugas.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Context Cards (Menggunakan Template Purpose Cards) -->
        <div class="row mt-5 g-4">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-diagram-3"></i>
              </div>
              <div class="purpose-body">
                <h3>Koordinasi Internal</h3>
                <p>Bekerja sama erat dengan seluruh unit layanan UPTD untuk memastikan ketersediaan data, dukungan logistik, dan kelancaran administrasi kasus korban.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
              <div class="purpose-body">
                <h3>Kerahasiaan & Keamanan Data</h3>
                <p>Setiap dokumen keuangan, kepegawaian, dan data korban dikelola dengan sistem pengamanan ketat sesuai prinsip akuntabilitas dan privasi.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>