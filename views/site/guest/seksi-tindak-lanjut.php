<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Seksi Tindak Lanjut</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">UPT PPA</li>
            <li class="current">Seksi Tindak Lanjut</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section (Strict Template Structure) -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Seksi Tindak Lanjut UPTD PPA</h2>
        <p>Unit pelaksana teknis yang menangani pendampingan hukum, mediasi litigasi, dan pemulihan menyeluruh bagi korban kekerasan perempuan dan anak.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Main Intro -->
        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/profil.jpeg" alt="Seksi Tindak Lanjut" class="img-fluid">
              <div class="experience-badge">
                <span class="years">Tindak Lanjut</span>
                <span class="label">Pemulihan</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="story-content">
              <span class="subtitle">Peran Strategis</span>
              <h3>Pendampingan Hukum & Pemulihan Korban</h3>
              <p>Seksi Tindak Lanjut bertanggung jawab melaksanakan mediasi yang berkaitan dengan proses hukum (litigasi), pendampingan korban saat proses diversi, restitusi, dan persidangan, serta memberikan bantuan hukum komprehensif.</p>
              <p>Selain aspek hukum, Seksi ini juga fokus pada pendampingan korban dalam upaya pemulihan fisik, psikologis, dan sosial, memastikan setiap korban mendapatkan keadilan serta kesempatan untuk kembali berintegrasi ke masyarakat dengan aman dan bermartabat.</p>
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
                    <p>Mengumpulkan bahan, referensi, dan dokumen pendukung untuk kebutuhan pelaksanaan tugas dan fungsi UPTD.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="150">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h4>Mediasi Litigasi</h4>
                    <p>Menyelenggarakan mediasi yang berkaitan langsung dengan proses hukum untuk mempercepat penyelesaian kasus.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h4>Pendampingan Hukum</h4>
                    <p>Mendampingi korban selama proses diversi, tuntutan restitusi, dan persidangan, termasuk penyediaan bantuan hukum.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="250">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h4>Pendampingan Pemulihan</h4>
                    <p>Memberikan dukungan psikososial dan pendampingan berkelanjutan untuk pemulihan korban pasca kekerasan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">05</div>
                    <h4>Evaluasi Kinerja</h4>
                    <p>Melakukan evaluasi berkala terhadap hasil kerja Seksi Tindak Lanjut untuk peningkatan kualitas layanan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="350">
                  <div class="milestone-card">
                    <div class="milestone-year">06</div>
                    <h4>Telaahan Staf</h4>
                    <p>Menyelenggarakan telaahan strategis sebagai bahan pertimbangan Kepala UPTD dalam pengambilan kebijakan.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">07</div>
                    <h4>Tugas Tambahan</h4>
                    <p>Melaksanakan tugas lain yang diberikan oleh Kepala UPTD sesuai dengan lingkup tugas dan fungsi seksi.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="milestone-card">
                    <div class="milestone-year">08</div>
                    <h4>Pemberian Masukan</h4>
                    <p>Memberikan rekomendasi dan masukan strategis kepada Kepala UPTD untuk optimalisasi penanganan kasus.</p>
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
                <i class="bi bi-briefcase"></i>
              </div>
              <div class="purpose-body">
                <h3>Pendampingan Berkeadilan</h3>
                <p>Setiap proses hukum didampingi oleh pendamping profesional yang memahami prosedur peradilan anak dan perlindungan korban, memastikan hak-hak korban terpenuhi tanpa menimbulkan trauma berulang.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <div class="purpose-body">
                <h3>Pemulihan Holistik</h3>
                <p>Pendampingan tidak berhenti di ruang sidang. Seksi Tindak Lanjut memastikan korban mendapatkan akses rehabilitasi, pelatihan keterampilan, dan reintegrasi sosial untuk kembali produktif.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>