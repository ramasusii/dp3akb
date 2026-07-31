<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Undang-Undang</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
            <li class="current">Undang-Undang</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Details Section (Adapted for Undang-Undang List) -->
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
                <h1 class="article-title">Undang-Undang Terkait Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana</h1>
                <p class="article-subtitle">Daftar peraturan perundang-undangan yang menjadi landasan hukum pelaksanaan tugas dan fungsi DPPPAKB Provinsi Sumatera Utara.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="author-card" data-aos="fade-left">
                <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Dokumen Undang-Undang" class="author-avatar" style="object-fit: cover;">
                <div class="author-details text-center">
                  <h4>Dokumen Hukum</h4>
                  <span class="author-role">Peraturan Perundang-undangan</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Featured Banner Image -->
          <div class="featured-banner" data-aos="zoom-in" data-aos-delay="150">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/img/file.jpeg" alt="Undang-Undang" class="img-fluid">
          </div>

          <!-- Content Area -->
          <div class="row g-5">
            <!-- Main Content - List of Laws -->
            <div class="col-lg-12">
              <div class="main-content">

                <div class="text-block" data-aos="fade-up">
                  <h3>Daftar Undang-Undang</h3>
                  <p>Berikut adalah daftar undang-undang yang terkait dengan bidang pemberdayaan perempuan, perlindungan anak, pengendalian penduduk, dan keluarga berencana:</p>

                  <div class="list-group mt-4">
                    
                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="100">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 35 Tahun 2014.pdf" target="_blank" class="text-decoration-none">
                              UU No. 35 Tahun 2014
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Perubahan Atas Undang-Undang Nomor 23 Tahun 2002 Tentang Perlindungan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 35 Tahun 2014.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2014</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="150">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 23 Tahun 2014.pdf" target="_blank" class="text-decoration-none">
                              UU No. 23 Tahun 2014
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pemerintahan Daerah</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 23 Tahun 2014.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2014</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="200">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 8 Tahun 2016.pdf" target="_blank" class="text-decoration-none">
                              UU No. 8 Tahun 2016
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Penyandang Disabilitas</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 8 Tahun 2016.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2016</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="250">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 1 Tahun 1974.pdf" target="_blank" class="text-decoration-none">
                              UU No. 1 Tahun 1974
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Perkawinan</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 1 Tahun 1974.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">1974</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="300">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 3 Tahun 1997.pdf" target="_blank" class="text-decoration-none">
                              UU No. 3 Tahun 1997
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pengadilan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 3 Tahun 1997.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">1997</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="350">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 4 Tahun 1979.pdf" target="_blank" class="text-decoration-none">
                              UU No. 4 Tahun 1979
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kesejahteraan Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 4 Tahun 1979.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">1979</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="400">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 4 Tahun 1997.pdf" target="_blank" class="text-decoration-none">
                              UU No. 4 Tahun 1997
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Penyandang Cacat</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 4 Tahun 1997.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">1997</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="450">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 7 Tahun 1984.pdf" target="_blank" class="text-decoration-none">
                              UU No. 7 Tahun 1984
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pengesahan Konvensi Mengenai Penghapusan Segala Bentuk Diskriminasi Terhadap Wanita (CEDAW)</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 7 Tahun 1984.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">1984</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="500">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 9 Tahun 2012.pdf" target="_blank" class="text-decoration-none">
                              UU No. 9 Tahun 2012
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pengesahan Protokol Opsional Konvensi Hak-Hak Anak Mengenai Keterlibatan Anak dalam Konflik Bersenjata</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 9 Tahun 2012.pdf" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/Lampiran UU 009 2012.pdf" target="_blank" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-paperclip me-1"></i> Lampiran
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2012</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="550">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 10 Tahun 2012.pdf" target="_blank" class="text-decoration-none">
                              UU No. 10 Tahun 2012
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pengesahan Protokol Opsional Konvensi Hak-Hak Anak Mengenai Penjualan Anak, Prostitusi Anak, dan Pornografi Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 10 Tahun 2012.pdf" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/Lampiran UU 010 2012.pdf" target="_blank" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-paperclip me-1"></i> Lampiran
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2012</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="600">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 10 Tahun 1992.pdf" target="_blank" class="text-decoration-none">
                              UU No. 10 Tahun 1992
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Perkembangan Kependudukan dan Pembangunan Keluarga Sejahtera</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 10 Tahun 1992.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">1992</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="650">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 11 Tahun 2009.pdf" target="_blank" class="text-decoration-none">
                              UU No. 11 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Kesejahteraan Sosial</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 11 Tahun 2009.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="700">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 11 Tahun 2012.pdf" target="_blank" class="text-decoration-none">
                              UU No. 11 Tahun 2012
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Sistem Peradilan Pidana Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 11 Tahun 2012.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2012</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="750">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 14 Tahun 2009.pdf" target="_blank" class="text-decoration-none">
                              UU No. 14 Tahun 2009
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pengesahan Protokol untuk Mencegah, Menindak, dan Menghukum Perdagangan Orang, Terutama Perempuan dan Anak-Anak</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU Nomor 14 Tahun 2009.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2009</span>
                        </div>
                      </div>
                    </div>

                    <div class="list-group-item p-3 mb-3 border rounded-3" data-aos="fade-up" data-aos-delay="800">
                      <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="me-3">
                          <i class="bi bi-file-earmark-pdf text-danger fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="mb-2 fw-semibold">
                            <a href="http://202.52.58.6/public/storage/files/9/UUD/UU 19 Tahun 2011.pdf" target="_blank" class="text-decoration-none">
                              UU No. 19 Tahun 2011
                            </a>
                          </h5>
                          <p class="mb-1 text-muted small">Tentang Pengesahan Konvensi Mengenai Hak-Hak Penyandang Disabilitas</p>
                          <a href="http://202.52.58.6/public/storage/files/9/UUD/UU 19 Tahun 2011.pdf" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Unduh PDF
                          </a>
                        </div>
                        <div class="text-end">
                          <span class="badge bg-primary">2011</span>
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