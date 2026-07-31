<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Seksi Pengaduan</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">UPT PPA</li>
            <li class="current">Seksi Pengaduan</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section (Strict Template Structure) -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Seksi Pengaduan UPTD PPA</h2>
        <p>Unit pelaksana teknis yang menangani penerimaan, klarifikasi, penjangkauan korban, dan pengelolaan kasus perlindungan perempuan dan anak di wilayah kerja UPTD.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Main Intro -->
        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/profil.jpeg" alt="Seksi Pengaduan" class="img-fluid">
              <div class="experience-badge">
                <span class="years">Pengaduan</span>
                <span class="label">Penjangkauan</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="story-content">
              <span class="subtitle">Fungsi Utama</span>
              <h3>Garis Depan Penanganan Kasus</h3>
              <p>Seksi Pengaduan bertanggung jawab melaksanakan penerimaan dan klarifikasi pengaduan masyarakat, penjangkauan korban yang dilaporkan secara tidak langsung, serta pengelolaan kasus secara terpadu.</p>
              <p>Bertindak sebagai pintu masuk layanan, Seksi Pengaduan memastikan setiap laporan diverifikasi, korban segera dijangkau, dan langkah perlindungan serta penampungan sementara di Rumah Perlindungan dapat dilaksanakan dengan cepat, aman, dan berpihak pada korban.</p>
            </div>
          </div>
        </div><!-- End Story Row -->

        <!-- Fungsi & Tugas (Menggunakan Template Milestones Grid) -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <h3 class="values-heading text-center mb-4" data-aos="fade-up">Tugas & Tanggung Jawab</h3>
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">01</div>
                    <h4>Pengumpulan Data</h4>
                    <p>Pengumpulan bahan dan referensi untuk mendukung pelaksanaan tugas dan fungsi UPTD secara akurat dan terdokumentasi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="150">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h4>Penerimaan Pengaduan</h4>
                    <p>Menerima, mencatat, dan mengklarifikasi laporan pengaduan masyarakat terkait kasus kekerasan terhadap perempuan dan anak.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h4>Penjangkauan Korban</h4>
                    <p>Menjangkau korban yang dilaporkan secara tidak langsung untuk memastikan keselamatan, keamanan, dan kebutuhan mendesak.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="250">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h4>Pengelolaan Kasus</h4>
                    <p>Mengelola alur kasus secara sistematis mulai dari asesmen awal, pendampingan, hingga tindak lanjut penanganan terpadu.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">05</div>
                    <h4>Perlindungan & Shelter</h4>
                    <p>Menyediakan layanan perlindungan fisik/psikologis dan penampungan sementara di Rumah Perlindungan yang aman dan nyaman.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                  <div class="milestone-card">
                    <div class="milestone-year">06</div>
                    <h4>Mediasi Non-Litigasi</h4>
                    <p>Menyelenggarakan layanan mediasi sebelum proses hukum sebagai upaya penyelesaian restoratif yang mengutamakan pemulihan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">07</div>
                    <h4>Evaluasi & Telaahan</h4>
                    <p>Mengevaluasi hasil kerja seksi dan menyusun telaahan staf sebagai bahan pertimbangan pengambilan kebijakan strategis.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="milestone-card">
                    <div class="milestone-year">08</div>
                    <h4>Tugas Tambahan</h4>
                    <p>Melaksanakan tugas lain dan memberikan masukan yang diperlukan kepada Kepala UPTD sesuai dengan bidang tugas.</p>
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
                <i class="bi bi-headset"></i>
              </div>
              <div class="purpose-body">
                <h3>Respon Cepat & Akurat</h3>
                <p>Setiap pengaduan ditindaklanjuti dengan verifikasi cepat, klarifikasi mendalam, dan koordinasi langsung dengan tim penjangkauan untuk memastikan tidak ada korban yang terlewat atau terlambat mendapat bantuan.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-house-heart"></i>
              </div>
              <div class="purpose-body">
                <h3>Ruang Aman & Pendekatan Humanis</h3>
                <p>Menjamin korban mendapatkan tempat tinggal sementara yang terlindungi, serta menawarkan opsi mediasi non-litigasi yang mengutamakan pemulihan trauma, keamanan, dan kepentingan terbaik korban.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>