<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Profil Dinas</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Profil Dinas</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- History Section (Adapted for Profil Dinas) -->
    <section id="history" class="history section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil DPPPAKB Provinsi Sumatera Utara</h2>
        <p>Mengenal lebih dekat identitas, legalitas, dan komitmen Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana dalam melayani masyarakat Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Logo & Overview -->
        <div class="row align-items-center g-5">
          <div class="col-lg-7" data-aos="fade-right" data-aos-delay="200">
            <div class="campus-showcase">
              <!-- 🖼️ SPACE UNTUK LOGO / FOTO KANTOR -->
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/logo-diper.png" alt="Logo DPPPAKB Sumut" class="img-fluid rounded-3">
              <div class="experience-badge">
                <span class="years">Provinsi</span>
                <span class="label">Sumatera Utara</span>
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="300">
            <div class="story-content">
              <span class="subtitle">Identitas Resmi</span>
              <h2>DPPPAKB Provinsi Sumatera Utara</h2>
              <p>Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana merupakan unsur pelaksana urusan pemerintahan di bidang pemberdayaan perempuan, perlindungan anak, serta pengendalian penduduk dan keluarga berencana yang menjadi kewenangan daerah provinsi.</p>
              <p>Dinas ini dipimpin oleh seorang Kepala Dinas yang berkedudukan di bawah dan bertanggung jawab kepada Gubernur melalui Sekretaris Daerah, dengan tugas pokok melaksanakan perumusan dan pelaksanaan kebijakan daerah sesuai ketentuan perundang-undangan yang berlaku.</p>
            </div>
          </div>
        </div>

        <!-- Legal Basis / Timeline -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">UU 23/2014</div>
                    <h4>Dasar Hukum Nasional</h4>
                    <p>Mengatur kewenangan daerah dalam penyelenggaraan urusan pemberdayaan perempuan, anak, dan pengendalian penduduk.</p>
                  </div>
                </div><!-- End Milestone Card -->

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">Perda 8/2022</div>
                    <h4>Pembentukan Daerah</h4>
                    <p>Peraturan Daerah tentang Pembentukan dan Susunan Perangkat Daerah Provinsi Sumatera Utara yang mengintegrasikan layanan.</p>
                  </div>
                </div><!-- End Milestone Card -->

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">Integrasi</div>
                    <h4>Merger Layanan</h4>
                    <p>Penggabungan DP3A dan DPPKB menjadi DPPPAKB untuk efisiensi, sinergi program, dan pelayanan terpadu satu pintu.</p>
                  </div>
                </div><!-- End Milestone Card -->

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">Komitmen</div>
                    <h4>Pelayanan Publik</h4>
                    <p>Berfokus pada transparansi, akuntabilitas, dan responsivitas dalam memenuhi hak serta melindungi perempuan dan anak.</p>
                  </div>
                </div><!-- End Milestone Card -->
              </div>
            </div>
          </div>
        </div>

        <!-- Profile Highlights -->
        <div class="row mt-5 g-4">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-building"></i>
              </div>
              <div class="purpose-body">
                <h3>Kedudukan & Wilayah Kerja</h3>
                <p>Berkedudukan di Kota Medan dan memiliki wilayah kerja meliputi seluruh 33 Kabupaten/Kota di Provinsi Sumatera Utara. Dinas berkoordinasi langsung dengan pemerintah kabupaten/kota, UPTD wilayah, serta kementerian/lembaga terkait.</p>
              </div>
            </div>
          </div><!-- End Purpose Card -->

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-diagram-3"></i>
              </div>
              <div class="purpose-body">
                <h3>Unsur Organisasi</h3>
                <p>Terdiri atas Kepala Dinas, Sekretariat (meliputi Sub Bagian Perencanaan, Keuangan, Umum & Kepegawaian), serta bidang-bidang fungsional: PHA & Kualitas Keluarga, Perlindungan Perempuan & Anak, PUG & Pemberdayaan, Pengendalian Penduduk, dan KB & Keluarga Sejahtera.</p>
              </div>
            </div>
          </div><!-- End Purpose Card -->
        </div>

        <!-- Core Values -->
        <div class="row mt-5 pt-3 g-4">
          <div class="col-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="values-heading text-center">Nilai Dasar Pelayanan</h3>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="principle-item">
              <span class="principle-number">01</span>
              <div class="principle-info">
                <h4>Transparansi</h4>
                <p>Setiap kebijakan, program, dan penggunaan anggaran diinformasikan secara terbuka dan dapat diakses publik.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="principle-item">
              <span class="principle-number">02</span>
              <div class="principle-info">
                <h4>Akuntabilitas</h4>
                <p>Pelaksanaan tugas diukur dengan indikator kinerja yang jelas, terukur, dan dapat dipertanggungjawabkan.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="principle-item">
              <span class="principle-number">03</span>
              <div class="principle-info">
                <h4>Inklusivitas</h4>
                <p>Melayani seluruh lapisan masyarakat tanpa diskriminasi, dengan pendekatan yang ramah dan responsif gender.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="450">
            <div class="principle-item">
              <span class="principle-number">04</span>
              <div class="principle-info">
                <h4>Profesionalisme</h4>
                <p>Dikerjakan oleh aparatur yang kompeten, berintegritas, dan terus mengembangkan kapasitas melalui pelatihan berkelanjutan.</p>
              </div>
            </div>
          </div><!-- End Principle Item -->
        </div>

      </div>

    </section><!-- /Profil Section -->

  </main>