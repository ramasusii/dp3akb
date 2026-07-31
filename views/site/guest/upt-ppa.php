<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">UPT PPA</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">UPT PPA</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section (Strict Template Structure) -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>UPTD Perlindungan Perempuan dan Anak</h2>
        <p>Unit Pelaksana Teknis Daerah yang bertugas memberikan layanan perlindungan dan pendampingan terpadu bagi perempuan dan anak korban kekerasan di wilayah kerja DPPPAKB Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Main Intro -->
        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/profil.jpeg" alt="UPT PPA" class="img-fluid">
              <div class="experience-badge">
                <span class="years">UPTD</span>
                <span class="label">Layanan Terpadu</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="story-content">
              <span class="subtitle">Tugas Pokok</span>
              <h3>Penanganan Teknis Operasional Wilayah</h3>
              <p>UPTD Perlindungan Perempuan dan Anak mempunyai tugas melaksanakan kegiatan teknis operasional di wilayah kerjanya dalam memberikan layanan bagi perempuan dan anak yang mengalami masalah kekerasan, diskriminasi, perlindungan khusus, dan masalah lainnya.</p>
              <p>Sebagai ujung tombak penanganan kasus, UPTD PPA memastikan korban mendapatkan akses layanan yang cepat, aman, dan berpihak pada korban melalui koordinasi terpadu dengan aparat penegak hukum, tenaga medis, psikolog, dan pekerja sosial.</p>
            </div>
          </div>
        </div><!-- End Story Row -->

        <!-- Fungsi UPT PPA (Menggunakan Template Milestones Grid) -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <h3 class="values-heading text-center mb-4" data-aos="fade-up">Fungsi & Layanan Utama</h3>
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">01</div>
                    <h5>Pengaduan Masyarakat</h5>
                    <p>Menerima, mencatat, dan menindaklanjuti laporan masyarakat terkait kasus kekerasan terhadap perempuan dan anak.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="150">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h5>Penjangkauan Korban</h5>
                    <p>Tim turun langsung untuk mengidentifikasi, mendekatkan, dan mengamankan korban dari lingkungan berisiko.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h5>Pengelolaan Kasus</h5>
                    <p>Pendataan, asesmen awal, dan manajemen alur penanganan kasus secara sistematis dan terdokumentasi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="250">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h5>Penampungan Sementara</h5>
                    <p>Penyediaan shelter aman bagi korban yang membutuhkan perlindungan fisik dan psikologis segera.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">05</div>
                    <h5>Mediasi</h5>
                    <p>Fasilitasi penyelesaian sengketa secara restoratif apabila memungkinkan, aman, dan disepakati korban.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                  <div class="milestone-card">
                    <div class="milestone-year">06</div>
                    <h5>Pendampingan Korban</h5>
                    <p>Pendampingan hukum, psikologis, medis, dan sosial selama proses pemulihan hingga reintegrasi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">07</div>
                    <h5>Monitoring & Evaluasi</h5>
                    <p>Pengawasan, pengendalian, dan evaluasi kinerja program serta kegiatan perlindungan secara berkala.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="milestone-card">
                    <div class="milestone-year">08</div>
                    <h5>Pelaporan Kinerja</h5>
                    <p>Penyelenggaraan pelaporan akuntabilitas kinerja dan capaian layanan kepada pimpinan dinas.</p>
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
                <i class="bi bi-shield-fill-check"></i>
              </div>
              <div class="purpose-body">
                <h3>Prinsip Victim-Centered</h3>
                <p>Setiap layanan mengutamakan kepentingan, keamanan, dan pemulihan korban. Kerahasiaan identitas dilindungi ketat sesuai standar pelayanan terpadu dan etika profesi.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="purpose-body">
                <h3>Koordinasi Lintas Sektor</h3>
                <p>Bersinergi dengan kepolisian, kejaksaan, pengadilan, dinas kesehatan, dinas sosial, dan lembaga masyarakat untuk menjamin penanganan komprehensif dan berkelanjutan.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>