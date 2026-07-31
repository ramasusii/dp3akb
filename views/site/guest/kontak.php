<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Kontak Kami</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Kontak</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Campus Facilities Section (Strict Template Structure - Adapted for Contact) -->
    <section id="campus-facilities" class="campus-facilities section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Contact Overview Banner (Adapted from Campus Banner) -->
        <div class="campus-banner" data-aos="fade-down" data-aos-delay="100">
          <div class="row align-items-stretch">
            <div class="col-lg-5 order-lg-2" data-aos="fade-left" data-aos-delay="200">
              <div class="banner-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/cv-kadis.jpg" alt="Kepala Dinas DPPPAKB Sumut" class="img-fluid">
                <div class="accent-badge">
                  <i class="bi bi-person-badge"></i>
                  <span>Kepala Dinas</span>
                </div>
              </div>
            </div>
            <div class="col-lg-7 order-lg-1" data-aos="fade-right" data-aos-delay="200">
              <div class="banner-text">
                <span class="tag-label">DPPPAKB Provinsi Sumatera Utara</span>
                <h1>Layanan Terpadu untuk Perempuan dan Anak</h1>
                <p>Kami berkomitmen memberikan perlindungan, pemberdayaan, dan pendampingan yang cepat, aman, dan berpihak pada korban. Hubungi kami untuk konsultasi, pengaduan, atau informasi layanan.</p>
              </div>
            </div>
          </div>
          <div class="row stats-row g-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="col-md-4">
              <div class="stat-pill">
                <i class="bi bi-geo-alt"></i>
                <div class="stat-info">
                  <span class="stat-number">1</span>
                  <span class="stat-label">Kantor Pusat</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-pill">
                <i class="bi bi-telephone"></i>
                <div class="stat-info">
                  <span class="stat-number">24/7</span>
                  <span class="stat-label">Layanan Darurat</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-pill">
                <i class="bi bi-shield-check"></i>
                <div class="stat-info">
                  <span class="stat-number">100%</span>
                  <span class="stat-label">Kerahasiaan</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Info Zigzag Showcase (Adapted from Facilities Showcase) -->
        <div class="facilities-showcase">

          <!-- Alamat Kantor -->
          <div class="row align-items-center gy-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
              <div class="showcase-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/profil.jpeg" alt="Kantor DPPPAKB Sumut" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
              <div class="showcase-content">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <h3>Alamat Kantor</h3>
                <p>Jl. Iskandar Muda No.272, Petisah Tengah, Kec. Medan Petisah, Kota Medan, Sumatera Utara 20112</p>
                <ul class="feature-list">
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Akses transportasi umum mudah</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Parkir luas untuk pengunjung</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Ruang tunggu nyaman & ber-AC</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Fasilitas ramah disabilitas</li>
                </ul>
                <a href="https://maps.google.com/?q=Dinas+Pemberdayaan+Perempuan+dan+Perlindungan+Anak+Provinsi+Sumatera+Utara" target="_blank" class="discover-link">Buka di Google Maps <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Address Row -->

          <!-- Telepon / WhatsApp -->
          <div class="row align-items-center gy-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-delay="200">
              <div class="showcase-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Layanan Telepon" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right" data-aos-delay="200">
              <div class="showcase-content">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <h3>Telepon & WhatsApp</h3>
                <p>Hubungi kami langsung untuk konsultasi cepat, pengaduan darurat, atau informasi layanan.</p>
                <ul class="feature-list">
                  <li><i class="bi bi-arrow-right-circle-fill"></i> <a href="tel:082162836668" class="text-decoration-none">0821-6283-6668</a> (WhatsApp)</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Senin - Jumat, 08.00 - 16.00 WIB</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Layanan pengaduan darurat 24 jam</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Respon cepat maksimal 1x24 jam</li>
                </ul>
                <a href="https://wa.me/6282162836668" target="_blank" class="discover-link">Chat via WhatsApp <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Phone Row -->

          <!-- Email Resmi -->
          <div class="row align-items-center gy-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
              <div class="showcase-image">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Layanan Email" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
              <div class="showcase-content">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <h3>Email Resmi</h3>
                <p>Kirimkan permohonan informasi, surat resmi, atau dokumen pendukung melalui email.</p>
                <ul class="feature-list">
                  <li><i class="bi bi-arrow-right-circle-fill"></i> <a href="mailto:dp3a@sumutprov.go.id" class="text-decoration-none">dp3a@sumutprov.go.id</a></li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Format: Subjek jelas + lampiran PDF</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Respon maksimal 2x24 jam kerja</li>
                  <li><i class="bi bi-arrow-right-circle-fill"></i> Konfirmasi penerimaan otomatis</li>
                </ul>
                <a href="mailto:dp3a@sumutprov.go.id" class="discover-link">Kirim Email <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Email Row -->

        </div>

        <!-- Quick Actions / Contact Form (Adapted from Virtual Tour Block) -->
        <div class="virtual-tour-block" data-aos="fade-up" data-aos-delay="100">
          <div class="tour-video-bg" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
            <!-- Background gradient instead of video -->
          </div>
          <div class="tour-overlay"></div>
          <div class="tour-inner">
            <div class="row justify-content-center">
              <div class="col-lg-8 text-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="tour-info">
                  <h2>Akses Layanan Cepat</h2>
                  <p>Pilih layanan yang Anda butuhkan. Tim kami siap membantu dengan profesional dan menjaga kerahasiaan data Anda.</p>
                  <div class="row tour-perks g-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-md-4">
                      <div class="perk-item">
                        <i class="bi bi-megaphone"></i>
                        <strong>Laporkan Kasus</strong>
                        <p>Formulir pengaduan online terpadu</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="perk-item">
                        <i class="bi bi-info-circle"></i>
                        <strong>Informasi Publik</strong>
                        <p>Panduan permohonan data & dokumen</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="perk-item">
                        <i class="bi bi-headset"></i>
                        <strong>Konsultasi Gratis</strong>
                        <p>Chat langsung dengan petugas ahli</p>
                      </div>
                    </div>
                  </div>
                  <div class="tour-cta d-flex justify-content-center flex-wrap gap-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="<?= Url::to(['site/pengaduan']) ?>" class="btn-tour-start">Laporkan Kasus</a>
                    <a href="<?= Url::to(['site/tata-cara']) ?>" class="btn-tour-visit">Tata Cara Permohonan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Map & Quick Info (Adapted from Campus Navigation) -->
        <div class="campus-navigation" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="200">
              <div class="map-frame">
                <div class="ratio ratio-21x9">
                  <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.005774749917!2d98.65908347522229!3d3.586148296388019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131d67169331d%3A0x6719180f5c8c324a!2sDinas%20Pemberdayaan%20Perempuan%20dan%20Perlindungan%20Anak%20Provinsi%20Sumatera%20Utara!5e0!3m2!1sen!2sid!4v1777961662406!5m2!1sen!2sid" 
                    allowfullscreen="" 
                    loading="lazy"
                    title="Lokasi Kantor DPPPAKB Sumut">
                  </iframe>
                </div>
                <div class="floating-panel">
                  <h3>Temukan Kami</h3>
                  <p>Gunakan peta interaktif untuk melihat lokasi kantor, rute transportasi, dan fasilitas sekitar.</p>
                  <div class="filter-chips">
                    <span class="chip active"><i class="bi bi-grid"></i> Semua</span>
                    <span class="chip"><i class="bi bi-bus-front"></i> Transportasi</span>
                    <span class="chip"><i class="bi bi-parking"></i> Parkir</span>
                    <span class="chip"><i class="bi bi-bank"></i> Layanan Publik</span>
                  </div>
                  <div class="panel-links">
                    <a href="https://maps.google.com/?q=Dinas+Pemberdayaan+Perempuan+dan+Perlindungan+Anak+Provinsi+Sumatera+Utara" target="_blank"><i class="bi bi-download"></i> Buka Peta Lengkap</a>
                    <a href="tel:082162836668"><i class="bi bi-telephone"></i> Hubungi Kami</a>
                    <a href="<?= Url::to(['site/kontak']) ?>"><i class="bi bi-signpost-2"></i> Petunjuk Arah</a>
                  </div>
                  <div class="campus-quick-info">
                    <h5>Kantor DPPPAKB Sumut</h5>
                    <p>Jl. Iskandar Muda No.272, Medan Petisah, Medan</p>
                    <div class="quick-details">
                      <span><i class="bi bi-geo-alt"></i> Sumatera Utara</span>
                      <span><i class="bi bi-clock"></i> 08.00 - 16.00 WIB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Campus Facilities Section -->

  </main>