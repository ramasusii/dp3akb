<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Peraturan Menteri</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Peraturan Menteri</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Details Section (Same Layout as Previous) -->
    <section id="blog-details" class="blog-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <article class="blog-article">
          
          <!-- Header Section with Image -->
          <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-8">
              <div class="header-block" data-aos="fade-right">
                <div class="category-badges">
                  <a href="#" class="badge-link">Dasar Hukum</a>
                  <a href="#" class="badge-link">Regulasi</a>
                </div>
                <h1 class="article-title">Peraturan Menteri Terkait DPPPAKB</h1>
                <p class="article-subtitle">Daftar Peraturan Menteri Pemberdayaan Perempuan dan Perlindungan Anak yang menjadi pedoman teknis pelaksanaan program di tingkat nasional dan daerah.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="author-card" data-aos="fade-left">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Dokumen Peraturan Menteri" class="author-avatar" style="object-fit: cover;">
                <div class="author-details text-center">
                  <h4>Dokumen Hukum</h4>
                  <span class="author-role">Peraturan Menteri</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Featured Banner Image -->
          <div class="featured-banner" data-aos="zoom-in" data-aos-delay="150">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Peraturan Menteri" class="img-fluid">
          </div>

          <!-- Content Area -->
          <div class="row g-5">
            <!-- Main Content - List of Ministerial Regulations -->
            <div class="col-lg-12">
              <div class="main-content">

                <div class="text-block" data-aos="fade-up">
                  <h3>Daftar Peraturan Menteri</h3>
                  <p>Berikut adalah Peraturan Menteri Pemberdayaan Perempuan dan Perlindungan Anak yang terkait dengan bidang pemberdayaan perempuan, perlindungan anak, pengendalian penduduk, dan keluarga berencana:</p>

                  <div class="list-group mt-4">
                    
                    <!-- Permen 01/2009 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="100">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.1-Thn-2009.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 01 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Standar Pelayanan Minimal Pelayanan Terpadu bagi Saksi dan/atau Korban Tindak Pidana Perdagangan Orang di Kabupaten/Kota</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.1-Thn-2009.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 01/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="150">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.1-Thn-2010---SPM-Bid-Lynan-Terpadu-Bagi-P-%26-A-Korban-Kekerasan.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 01 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Standar Pelayanan Minimal Bidang Layanan Terpadu bagi Perempuan dan Anak Korban Kekerasan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.1-Thn-2010---SPM-Bid-Lynan-Terpadu-Bagi-P-%26-A-Korban-Kekerasan.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 2/2008 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="200">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permenpppa022008.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 2 Tahun 2008
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Pelaksanaan Perlindungan Perempuan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permenpppa022008.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2008</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 02/2009 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="250">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.2-Thn-2009.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 02 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kebijakan Kabupaten/Kota Layak Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.2-Thn-2009.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 02/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="300">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.2-Thn-2010---RAN-PPKTA.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 02 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Rencana Aksi Nasional Pencegahan dan Penanganan Kekerasan Terhadap Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.2-Thn-2010---RAN-PPKTA.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 02/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="350">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.2-Thn-2011---Pedoman-Penanganan-Anak-Korban-Kekerasan%20(1).pdf" target="_blank" class="text-decoration-none">
                              Permen No. 02 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Penanganan Anak Korban Kekerasan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.2-Thn-2011---Pedoman-Penanganan-Anak-Korban-Kekerasan%20(1).pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 02/2014 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="400">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permenpppa022014.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 02 Tahun 2014
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Penanganan Benturan Kepentingan di Lingkungan Kementerian Pemberdayaan Perempuan dan Perlindungan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permenpppa022014.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2014</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 3/2008 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="450">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permenpppa032008.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 3 Tahun 2008
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Pelaksanaan Perlindungan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permenpppa032008.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2008</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 03/2009 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="500">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.3-Thn-2009.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 03 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Penilaian Kabupaten/Kota Layak Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.3-Thn-2009.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 03/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="550">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No-3-Thn-2010---Penerapan-10-Langkah-Mnju-Kbrhsln-Menyusui.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 03 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Penerapan Sepuluh Langkah Menuju Keberhasilan Menyusui</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No-3-Thn-2010---Penerapan-10-Langkah-Mnju-Kbrhsln-Menyusui.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 03/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="600">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.3-Thn-2011---Kebijakan-Partispasi-Anak.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 03 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kebijakan Partisipasi Anak dalam Pembangunan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.3-Thn-2011---Kebijakan-Partispasi-Anak.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 05/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="650">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.5-Thn-2011---Kebijakan-Pemenuhan-Hak-Pendidikan-Anak.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 05 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kebijakan Pemenuhan Hak Pendidikan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.5-Thn-2011---Kebijakan-Pemenuhan-Hak-Pendidikan-Anak.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 05/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="700">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.5-Thn-2010---Panduan-Pembentukan-%26-Pengembangan-PPT.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 05 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Pembentukan dan Pengembangan Pusat Pelayanan Terpadu</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.5-Thn-2010---Panduan-Pembentukan-%26-Pengembangan-PPT.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 5/2014 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="750">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/e3fff-permen-no-05-tahun-2014-pedoman-penyelenggaraan-sistem-data-gender-dan-anak.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 5 Tahun 2014
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Penyelenggaraan Sistem Data Gender dan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/e3fff-permen-no-05-tahun-2014-pedoman-penyelenggaraan-sistem-data-gender-dan-anak.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2014</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 06/2009 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="800">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/a8c49-permen-no-06-tahun-2009-ttg-penyelenggaraan-data-gender-dan-anak-nspk-data-terpilah.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 06 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Penyelenggaraan Data Gender dan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/a8c49-permen-no-06-tahun-2009-ttg-penyelenggaraan-data-gender-dan-anak-nspk-data-terpilah.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 06/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="850">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/bn66-2011.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 06 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Pencegahan Kekerasan Terhadap Anak di Lingkungan Keluarga, Masyarakat, dan Lembaga Pendidikan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/bn66-2011.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 7/2009 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="900">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.7-Thn-2009.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 7 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Sekretariat Gugus Tugas Pusat Pencegahan dan Penanganan Tindak Pidana Perdagangan Orang</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-No.7-Thn-2009.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 07/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="950">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.7-Thn-2011---Kebijakan-AMPK.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 07 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kebijakan Peningkatan Ketahanan Keluarga Anak yang Membutuhkan Perlindungan Khusus</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.7-Thn-2011---Kebijakan-AMPK.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 09/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1000">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.9-Thn-2011---Kewaspadaan-Dini-TPPO.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 09 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kewaspadaan Dini Tindak Pidana Perdagangan Orang</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.9-Thn-2011---Kewaspadaan-Dini-TPPO.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 10/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1050">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.10-Thn-2011---ABK.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 10 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kebijakan Penanganan Anak Berkebutuhan Khusus</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.10-Thn-2011---ABK.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 14/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1100">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.14-Thn-2010---Pedoman-Pengem-K-K-Layak-Anak-Tingkat-Prov.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 14 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Pengembangan Kabupaten/Kota Layak Anak Tingkat Provinsi</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.14-Thn-2010---Pedoman-Pengem-K-K-Layak-Anak-Tingkat-Prov.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 14/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1150">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-14-Thn-2011-Pand-Eva-KLA.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 14 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Evaluasi Kabupaten/Kota Layak Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permen-14-Thn-2011-Pand-Eva-KLA.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 20/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1200">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permen_20_2010.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 20 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Umum Bina Keluarga Tenaga Kerja Indonesia</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/permen_20_2010.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 19/2011 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1250">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.19-Thn-2011---Pedoman-PP-Anti-Kekerasan.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 19 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Pemberdayaan Perempuan Korban Kekerasan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.19-Thn-2011---Pedoman-PP-Anti-Kekerasan.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 22/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1300">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/bn570-2010.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 22 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Prosedur Standar Operasional Pelayanan Terpadu bagi Saksi dan/atau Korban Tindak Pidana Perdagangan Orang</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/bn570-2010.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 23/2010 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1350">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.23-Thn-2010---Penyandang-Cacat.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 23 Tahun 2010
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Umum Pembentukan Pusat Informasi dan Konsultasi bagi Perempuan Penyandang Cacat</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.23-Thn-2010---Penyandang-Cacat.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2010</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 4/2018 (Google Drive) -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1400">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="https://drive.google.com/file/d/1XVAxZdGUQy5l6O1XZtJMhoFHrxinC7K9/view?usp=drive_link" target="_blank" class="text-decoration-none">
                              Permen No. 4 Tahun 2018
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pedoman Pembentukan Unit Pelaksana Teknis Daerah Perlindungan Perempuan dan Anak</p>
                          <a href="https://drive.google.com/file/d/1XVAxZdGUQy5l6O1XZtJMhoFHrxinC7K9/view?usp=drive_link" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Buka Google Drive
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2018</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 8/2012 -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1450">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.8-Thn-2012---Panduan-Penguatan-Kel-Dasawisma.pdf" target="_blank" class="text-decoration-none">
                              Permen No. 8 Tahun 2012
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Penguatan Kelompok Dasawisma untuk Pencegahan dan Penanganan Dini Tindak Kekerasan Terhadap Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/Peraturan Menteri/Permeneg-PP%26PA-No.8-Thn-2012---Panduan-Penguatan-Kel-Dasawisma.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2012</span>
                        </div>
                      </div>
                    </div>

                    <!-- Permen 10/2012 (Google Drive) -->
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="1500">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="https://drive.google.com/open?id=1wdDyGG7CU3afWjrjbdDnXcHY_bhgtgkK" target="_blank" class="text-decoration-none">
                              Permen No. 10 Tahun 2012
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Panduan Pembentukan dan Penguatan Gugus Tugas Pencegahan dan Penanganan Tindak Pidana Perdagangan Orang</p>
                          <a href="https://drive.google.com/open?id=1wdDyGG7CU3afWjrjbdDnXcHY_bhgtgkK" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Buka Google Drive
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2012</span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>

          </div>

        </article>

      </div>

    </section><!-- /Blog Details Section -->

  </main>