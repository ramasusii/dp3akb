<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Sejarah</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl?>">Beranda</a></li>
            <li class="current">Sejarah</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- History Section -->
    <section id="history" class="history section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sejarah DP3A Provinsi Sumatera Utara</h2>
        <p>Menelusuri perjalanan kelembagaan dalam mewujudkan perlindungan dan pemberdayaan perempuan, anak, dan keluarga berencana di Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-7" data-aos="fade-right" data-aos-delay="200">
            <div class="campus-showcase">
              <!-- ✅ Path gambar tetap sesuai template, ganti file-nya saja jika perlu -->
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/dinas.webp" alt="Kantor DP3A Sumut" class="img-fluid rounded-3">
              <div class="experience-badge">
                <span class="years">2008</span>
                <span class="label">Tahun Berdiri</span>
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="300">
            <div class="story-content">
              <span class="subtitle">Tentang Kami</span>
              <h2>Perjalanan Menuju Layanan Terpadu</h2>
              <p>Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana (DP3AKB) Provinsi Sumatera Utara merupakan hasil penggabungan dua dinas sebelumnya, yang dibentuk untuk memberikan layanan yang lebih holistik dan terintegrasi.</p>
              <p>Kami berkomitmen untuk terus meningkatkan kualitas perlindungan, pemenuhan hak, dan pemberdayaan bagi perempuan, anak, dan keluarga di seluruh wilayah Sumatera Utara.</p>
            </div>
          </div>
        </div>

        <!-- Timeline / Milestones -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <h3 class="values-heading text-center mb-4" data-aos="fade-up">Milestones Kelembagaan</h3>
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">2008</div>
                    <h4>Pembentukan Awal</h4>
                    <p>Biro Pemberdayaan Perempuan, Anak dan KB Sekretariat Daerah Prov. Sumut (Perda No. 7/2008).</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">2016</div>
                    <h4>Transformasi Dinas</h4>
                    <p>Berkembang menjadi 2 dinas terpisah: DP3A dan DPPKB (Perda No. 6/2016).</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">2022</div>
                    <h4>Merger & Integrasi</h4>
                    <p>Penggabungan kembali menjadi DP3AKB untuk layanan terpadu (Perda No. 8/2022).</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">Kini</div>
                    <h4>Layanan Terpadu</h4>
                    <p>Fokus pada perlindungan perempuan, anak, dan penguatan keluarga sejahtera.</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Detail Content -->
        <div class="row mt-5 g-4">
          <div class="col-12" data-aos="fade-up">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-journal-text"></i>
              </div>
              <div class="purpose-body">
                <h3>Dasar Hukum & Latar Belakang</h3>
                <p class="mb-3">
                  Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara terbentuk berdasarkan 
                  <strong>Peraturan Daerah Provinsi Sumatera Utara Nomor 8 Tahun 2022</strong> tentang Pembentukan dan Susunan Perangkat Daerah.
                </p>
                <p class="mb-3">
                  Penggabungan ini merupakan implementasi dari <strong>UU Nomor 23 Tahun 2014</strong> tentang Pemerintahan Daerah, 
                  yang mengatur kewenangan daerah dalam menata perangkat daerah agar lebih efisien, efektif, dan responsif terhadap kebutuhan masyarakat.
                </p>
                <p>
                  Dengan struktur yang terintegrasi, DP3AKB Sumut dapat memberikan layanan yang lebih komprehensif: 
                  mulai dari pencegahan kekerasan, pendampingan hukum, pemberdayaan ekonomi perempuan, hingga pengendalian penduduk dan pembangunan keluarga.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Prinsip / Values (Opsional, bisa dihapus jika tidak diperlukan) -->
        <div class="row mt-5 pt-3 g-4">
          <div class="col-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="values-heading text-center">Nilai yang Kami Junjung</h3>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="principle-item">
              <span class="principle-number">01</span>
              <div class="principle-info">
                <h4>Perlindungan</h4>
                <p>Menjamin keamanan dan hak dasar perempuan dan anak dari segala bentuk kekerasan.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="principle-item">
              <span class="principle-number">02</span>
              <div class="principle-info">
                <h4>Pemberdayaan</h4>
                <p>Meningkatkan kapasitas dan kemandirian ekonomi perempuan melalui pelatihan dan akses sumber daya.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="principle-item">
              <span class="principle-number">03</span>
              <div class="principle-info">
                <h4>Kolaborasi</h4>
                <p>Bersinergi dengan pemerintah daerah, LSM, dan masyarakat untuk dampak yang berkelanjutan.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="450">
            <div class="principle-item">
              <span class="principle-number">04</span>
              <div class="principle-info">
                <h4>Inovasi</h4>
                <p>Mengadopsi teknologi dan pendekatan baru untuk layanan yang lebih cepat dan terjangkau.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /History Section -->

  </main>