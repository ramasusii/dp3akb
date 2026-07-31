<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Tata Cara Permohonan</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Tata Cara Permohonan</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section (Strict Template Structure) -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tata Cara Permohonan Informasi</h2>
        <p>Panduan langkah demi langkah untuk mengajukan permohonan informasi publik ke PPID Pembantu DPPPAKB Provinsi Sumatera Utara sesuai UU KIP.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Langkah 1 -->
        <div class="row g-5 align-items-stretch mb-5">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/cara1.jfif" alt="Isi Formulir Permohonan" class="img-fluid">
              <div class="experience-badge">
                <span class="years">Step 1</span>
                <span class="label">Pengajuan</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="250">
            <div class="story-content">
              <span class="subtitle">Langkah Pertama</span>
              <h3>Mengisi Formulir Permohonan</h3>
              <p>Pemohon informasi wajib mengisi <strong>Formulir Permohonan Informasi</strong> yang telah disediakan oleh PPID Pembantu. Formulir dapat diambil langsung di kantor DPPPAKB atau diunduh melalui website resmi.</p>
              <p class="mb-0">Pastikan data yang diisi meliputi: identitas pemohon, rincian informasi yang diminta, tujuan penggunaan informasi, serta cara penyampaian (surat, email, atau diunduh langsung). Pemohon wajib menyertakan identitas diri (KTP/Kartu Identitas) yang masih berlaku.</p>
            </div>
          </div>
        </div>

        <!-- Langkah 2 -->
        <div class="row g-5 align-items-stretch mb-5">
          <div class="col-lg-5 order-lg-2" data-aos="fade-left" data-aos-delay="300">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/cara2.jfif" alt="Verifikasi Data Pemohon" class="img-fluid">
              <div class="experience-badge">
                <span class="years">Step 2</span>
                <span class="label">Verifikasi</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7 order-lg-1" data-aos="fade-right" data-aos-delay="350">
            <div class="story-content">
              <span class="subtitle">Langkah Kedua</span>
              <h3>Verifikasi & Registrasi Permohonan</h3>
              <p>Setelah formulir diterima, petugas PPID akan melakukan <strong>verifikasi kelengkapan data</strong> dan mencocokkan informasi yang diminta dengan kategori publik (Informasi yang Wajib Disediakan & Diumumkan, Informasi yang Wajib Disediakan Setiap Saat, Informasi Setiap Saat, atau Informasi yang Dikecualikan).</p>
              <p class="mb-0">Proses verifikasi dan registrasi memerlukan waktu maksimal <strong>10 hari kerja</strong> sejak permohonan diterima secara lengkap. Pemohon akan menerima nomor registrasi sebagai bukti pencatatan permohonan.</p>
            </div>
          </div>
        </div>

        <!-- Langkah 3 -->
        <div class="row g-5 align-items-stretch">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="400">
            <div class="campus-showcase">
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/cara3.jfif" alt="Pengiriman Informasi Publik" class="img-fluid">
              <div class="experience-badge">
                <span class="years">Step 3</span>
                <span class="label">Penerimaan</span>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="450">
            <div class="story-content">
              <span class="subtitle">Langkah Ketiga</span>
              <h3>Pengiriman atau Penyerahan Informasi</h3>
              <p>Apabila permohonan <strong>dikabulkan</strong>, informasi akan dikirimkan sesuai cara yang diminta pemohon (hardcopy, softcopy, atau pengambilan langsung di kantor). Biaya penggandaan dan pengiriman akan ditanggung oleh pemohon sesuai ketentuan tarif resmi.</p>
              <p>Apabila permohonan <strong>ditolak</strong> atau <strong>sebagian ditolak</strong> (misalnya karena termasuk informasi yang dikecualikan), PPID akan memberikan surat keberatan tertulis beserta alasannya secara jelas. Pemohon berhak mengajukan keberatan ke Komisi Informasi Provinsi dalam waktu 14 hari kerja.</p>
              <div class="mt-4">
                <a href="#" class="btn btn-primary">
                  <i class="bi bi-download me-2"></i>Unduh Formulir Permohonan
                </a>
                <a href="<?= Url::to(['site/profil-ppid']) ?>" class="btn btn-outline-secondary ms-2">
                  <i class="bi bi-info-circle me-2"></i>Pelajari Hak Pemohon
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>