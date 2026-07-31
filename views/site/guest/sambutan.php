<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Sambutan Kepala Dinas</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl?>">Beranda</a></li>
            <li class="current">Sambutan Kepala Dinas</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Sambutan Section -->
    <section id="sambutan" class="sambutan section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sambutan Kepala Dinas</h2>
        <p>Dinas Pemberdayaan Perempuan dan Perlindungan Anak Provinsi Sumatera Utara</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5 align-items-start">
          
          <!-- Kolom Foto & Identitas -->
          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="200">
            <div class="campus-showcase">
              <!-- ✅ Path gambar sesuai template. Ganti file-nya saja dengan foto resmi Kepala Dinas -->
              <img src="<?= Yii::$app->request->baseUrl ?>/web/img/kepala-dinas.png" alt="Kepala Dinas Pemberdayaan Perempuan dan Perlindungan Anak Sumut" class="img-fluid rounded-3">
              
            </div>
            <div class="text-center mt-4">
              <h5 class="mb-1"><?= Html::encode('Dwi Endah Purwanti, SS, M.Si') ?></h5>
              <p class="text-muted small">Kepala Dinas Pemberdayaan Perempuan dan Perlindungan Anak Provinsi Sumatera Utara</p>
            </div>
          </div>

          <!-- Kolom Teks Sambutan -->
          <div class="col-lg-8" data-aos="fade-left" data-aos-delay="300">
            <div class="story-content">
              <p class="lead mb-4">Assalamu’alaikum Warahmatullahi Wabarakatuh,</p>

              <p>Puji dan syukur kita panjatkan ke hadirat Allah SWT, Tuhan Yang Maha Esa, atas limpahan rahmat dan karunia-Nya sehingga website resmi Dinas Pemberdayaan Perempuan dan Perlindungan Anak (DP3A) Provinsi Sumatera Utara dapat hadir di tengah masyarakat.</p>

              <p>Di era transformasi digital ini, kehadiran website ini bukan sekadar sebagai sarana informasi, melainkan wujud komitmen kami dalam mewujudkan tata kelola pemerintahan yang terbuka, akuntabel, dan berorientasi pada pelayanan publik. Melalui platform ini, kami berharap seluruh program perlindungan perempuan, pemenuhan hak anak, serta pemberdayaan masyarakat dapat diakses dengan mudah, transparan, dan responsif.</p>

              <p>Kami menyadari bahwa perlindungan perempuan dan anak merupakan tanggung jawab bersama. Oleh karena itu, kami mengajak seluruh pemangku kepentingan, lembaga masyarakat, akademisi, serta masyarakat umum untuk bersinergi dalam mencegah segala bentuk kekerasan, mendorong kesetaraan gender, dan menciptakan lingkungan yang aman serta layak bagi tumbuh kembang anak di Sumatera Utara.</p>

              <p>Kritik, saran, dan masukan dari Anda sangat kami harapkan sebagai bahan evaluasi untuk terus meningkatkan kualitas layanan dan program kami. Mari bersama-sama wujudkan Sumatera Utara yang ramah perempuan, layak anak, dan berkeadilan.</p>

              <p class="mt-4 mb-0">Wassalamu’alaikum Warahmatullahi Wabarakatuh.</p>

              <div class="mt-5">
                <strong class="fs-5"><?= Html::encode('Dwi Endah Purwanti, SS, M.Si') ?></strong><br>
                <span class="text-muted">Kepala Dinas Pemberdayaan Perempuan dan Perlindungan Anak Provinsi Sumatera Utara</span>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Sambutan Section -->

</main>