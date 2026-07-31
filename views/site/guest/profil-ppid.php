<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Profil PPID</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Profil PPID</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section (Strict Template Structure) -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil PPID Pembantu</h2>
        <p>Pejabat Pengelola Informasi dan Dokumentasi Pembantu Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Main Intro -->
        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="150">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/profil.jpeg" alt="Profil PPID DPPPAKB" class="img-fluid">
              <div class="experience-badge">
                <span class="years">PPID</span>
                <span class="label">Pembantu</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
            <div class="story-content">
              <span class="subtitle">Tentang PPID</span>
              <h2>Mewujudkan Keterbukaan Informasi Publik</h2>
              <p>Salah satu elemen penting dalam mewujudkan penyelenggaraan Negara yang terbuka adalah hak publik untuk memperoleh informasi sesuai dengan perundang-undangan. Hak atas informasi menjadi sangat penting karena makin terbuka penyelenggaraan Negara untuk diawasi publik, penyelenggaraan negara tersebut makin dapat dipertanggungjawabkan.</p>
              <p>Hak setiap orang untuk memperoleh informasi juga relevan untuk meningkatkan kualitas pelibatan masyarakat dalam proses pengambilan keputusan publik. Partisipasi atau pelibatan masyarakat tidak banyak berarti tanpa jaminan keterbukaan informasi publik.</p>
            </div>
          </div>
        </div><!-- End Story Row -->

        <!-- Landasan Hukum UU KIP (Menggunakan Template Milestones) -->
        <div class="row mt-5 pt-4">
          <div class="col-12">
            <h3 class="values-heading text-center mb-4" data-aos="fade-up">Landasan Hukum UU KIP</h3>
            <div class="milestones" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="milestone-card">
                    <div class="milestone-year">01</div>
                    <h4>Hak Publik</h4>
                    <p>Hak setiap orang untuk memperoleh informasi publik sesuai ketentuan perundang-undangan yang berlaku.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                  <div class="milestone-card">
                    <div class="milestone-year">02</div>
                    <h4>Kewajiban Badan Publik</h4>
                    <p>Menyediakan dan melayani permintaan informasi secara cepat, tepat waktu, biaya ringan, dan cara sederhana.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                  <div class="milestone-card">
                    <div class="milestone-year">03</div>
                    <h4>Pengecualian Ketat</h4>
                    <p>Pengecualian informasi bersifat ketat dan terbatas sesuai dengan ketentuan yang ditetapkan undang-undang.</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="milestone-card">
                    <div class="milestone-year">04</div>
                    <h4>Sistem Dokumentasi</h4>
                    <p>Kewajiban Badan Publik untuk membenahi sistem dokumentasi dan pelayanan informasi publik secara terintegrasi.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Lingkup Badan Publik & Dasar Penetapan (Menggunakan Template Purpose Cards) -->
        <div class="row mt-5 g-4">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-building"></i>
              </div>
              <div class="purpose-body">
                <h3>Lingkup Badan Publik</h3>
                <p>Setiap Badan Publik mempunyai kewajiban untuk membuka akses atas informasi publik yang berkaitan dengan Badan Publik tersebut untuk masyarakat luas.</p>
                <p>Lingkup Badan Publik dalam Undang-Undang ini meliputi lembaga eksekutif, legislatif, yudikatif dan penyelenggara Negara lainnya yang mendapatkan dana dari APBN/APBD, serta mencakup organisasi non pemerintah yang mengelola dana bersumber dari APBN/APBD, sumbangan masyarakat, dan/atau luar negeri.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="purpose-card">
              <div class="purpose-icon">
                <i class="bi bi-file-earmark-text"></i>
              </div>
              <div class="purpose-body">
                <h3>Dasar Penetapan PPID</h3>
                <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) ditetapkan melalui <strong>Surat Keputusan Gubernur Sumatera Utara Nomor 188.44/764/KPTS/2017</strong> tentang Pejabat Pengelola Informasi dan Dokumentasi Provinsi Sumatera Utara.</p>
                <p>Berdasarkan keputusan tersebut, ditetapkan Sekretaris Dinas sebagai PPID Pembantu. Pemohon informasi dapat memperoleh informasi publik di bawah kewenangan DPPPAKB dengan memenuhi persyaratan sesuai ketentuan UU KIP.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Standar Pelayanan (Menggunakan Template Principle Items) -->
        <div class="row mt-5 pt-3 g-4">
          <div class="col-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="values-heading text-center">Standar Pelayanan PPID</h3>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="principle-item">
              <span class="principle-number">01</span>
              <div class="principle-info">
                <h4>Cepat & Tepat Waktu</h4>
                <p>Pelayanan informasi diberikan sesuai standar waktu yang ditetapkan dalam UU KIP tanpa penundaan yang tidak perlu.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="principle-item">
              <span class="principle-number">02</span>
              <div class="principle-info">
                <h4>Biaya Proporsional</h4>
                <p>Biaya penggandaan dan pengiriman informasi bersifat ringan, proporsional, dan sesuai ketentuan yang berlaku.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="principle-item">
              <span class="principle-number">03</span>
              <div class="principle-info">
                <h4>Transparan & Akuntabel</h4>
                <p>Setiap proses pelayanan informasi dapat dilacak, dipertanggungjawabkan, dan sesuai prinsip keterbukaan publik.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>