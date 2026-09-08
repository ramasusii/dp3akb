<?php

use yii\helpers\Html;

/*
 * Data profil dipusatkan di bagian ini agar mudah diperbarui.
 * Ketika CV resmi terbaru tersedia, cukup ubah/tambah isi array berikut.
 */
$pimpinan = [
    'nama' => 'Dwi Endah Purwanti, S.S., M.Si.',
    'jabatan' => 'Kepala Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana Provinsi Sumatera Utara',
    'lahir' => 'Tulungagung, Jawa Timur',
    'tanggal_lahir' => '23 Januari 1973',
    'foto' => Yii::$app->request->baseUrl . '/web/img/kepala-dinas.png',
    'ringkasan' => 'Menghadirkan kepemimpinan yang kolaboratif untuk memperkuat pemberdayaan perempuan, pemenuhan hak anak, perlindungan keluarga, dan pelayanan publik yang inklusif di Sumatera Utara.',
];

$biodata = [
    ['label' => 'Nama Lengkap', 'nilai' => 'Dwi Endah Purwanti, S.S., M.Si.'],
    ['label' => 'NIP', 'nilai' => '19730123 199803 2 002'],
    ['label' => 'Tempat/Tanggal Lahir', 'nilai' => 'Tulungagung, 23 Januari 1973'],
    ['label' => 'Pangkat/Golongan Ruang', 'nilai' => 'Pembina Utama Muda (IV/c)'],
    ['label' => 'Jabatan/Eselon', 'nilai' => 'Kepala Dinas DP3AKB Provinsi Sumatera Utara / Eselon II.a'],
    ['label' => 'Jenis Kelamin', 'nilai' => 'Wanita'],
    ['label' => 'Agama', 'nilai' => 'Islam'],
    ['label' => 'Status Perkawinan', 'nilai' => 'Kawin'],
];

$pendidikan = [
    ['jenjang' => 'Sekolah Dasar', 'institusi' => 'SD Negeri Kedungwaru I', 'jurusan' => '—', 'tahun' => '1986'],
    ['jenjang' => 'Sekolah Menengah Pertama', 'institusi' => 'SMP Negeri 2 Tulungagung', 'jurusan' => '—', 'tahun' => '1989'],
    ['jenjang' => 'Sekolah Menengah Atas', 'institusi' => 'SMA Negeri 1 Tulungagung', 'jurusan' => '—', 'tahun' => '1992'],
    ['jenjang' => 'Sarjana (S1)', 'institusi' => 'Universitas Jember (UNEJ)', 'jurusan' => 'Sastra Inggris', 'tahun' => '1997'],
    ['jenjang' => 'Magister (S2)', 'institusi' => 'Universitas Gadjah Mada (UGM)', 'jurusan' => 'Magister Administrasi Publik', 'tahun' => '2006'],
];

$karier = [
    ['jabatan' => 'Kepala Subbagian Kerja Sama Luar Negeri dan Pihak Ketiga', 'instansi' => 'Biro Otonomi Daerah dan Kerja Sama Sekretariat Daerah Provinsi Sumatera Utara', 'periode' => '2010 – 2014'],
    ['jabatan' => 'Kepala Bidang Sosial Budaya', 'instansi' => 'Badan Penelitian dan Pengembangan Provinsi Sumatera Utara', 'periode' => '2014 – 2015'],
    ['jabatan' => 'Kepala Bagian Arsip dan Tata Usaha', 'instansi' => 'Biro Umum dan Perlengkapan Sekretariat Daerah Provinsi Sumatera Utara', 'periode' => '2015 – 2017'],
    ['jabatan' => 'Kepala Bagian Pengadaan dan Perawatan', 'instansi' => 'Biro Umum dan Perlengkapan Sekretariat Daerah Provinsi Sumatera Utara', 'periode' => '2017 – 2020'],
    ['jabatan' => 'Plt. Kepala Biro Umum dan Perlengkapan', 'instansi' => 'Sekretariat Daerah Provinsi Sumatera Utara', 'periode' => '2019'],
    ['jabatan' => 'Sekretaris Dinas Perpustakaan dan Arsip', 'instansi' => 'Provinsi Sumatera Utara', 'periode' => '2020 – 2023'],
    ['jabatan' => 'Plt. Kepala Dinas Perpustakaan dan Arsip', 'instansi' => 'Provinsi Sumatera Utara', 'periode' => '2020'],
    ['jabatan' => 'Kepala Dinas Perpustakaan dan Arsip', 'instansi' => 'Provinsi Sumatera Utara', 'periode' => '2023 – 2025'],
    ['jabatan' => 'Kepala Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana', 'instansi' => 'Provinsi Sumatera Utara', 'periode' => '2025 – Sekarang', 'aktif' => true],
];

$organisasi = [
    ['nama' => 'Pembina Gerakan Turun Tangan Medan', 'periode' => '2014 – 2024'],
    ['nama' => 'Pembina Gerakan Sumut Mengajar', 'periode' => '2020 – Sekarang'],
    ['nama' => 'Wakil Ketua Pengda Keluarga Ikatan Alumni Gadjah Mada Sumatera Utara', 'periode' => '2022 – Sekarang'],
    ['nama' => 'Pembina Perempuan Pemimpin Indonesia (PERPINA) Sumut', 'periode' => '2024 – Sekarang'],
    ['nama' => 'Pembina Wanita Syarikat Islam Sumut', 'periode' => '2025 – Sekarang'],
];

$prestasi = [
    ['nama' => 'Juara I Pemilihan Pustakawan Berprestasi Tingkat Sumatera Utara', 'tahun' => '2007', 'instansi' => 'Pemerintah Provinsi Sumatera Utara'],
    ['nama' => 'Juara Harapan Pemilihan Pustakawan Berprestasi Tingkat Nasional', 'tahun' => '2007', 'instansi' => 'Perpustakaan Nasional Republik Indonesia'],
    ['nama' => 'Satyalancana Karya Satya X Tahun', 'tahun' => '2012', 'instansi' => 'Pemerintah Republik Indonesia'],
    ['nama' => 'Satyalancana Karya Satya XX Tahun', 'tahun' => '2022', 'instansi' => 'Pemerintah Republik Indonesia'],
    ['nama' => 'Peringkat Terbaik II pada Pendidikan Kepemimpinan Nasional', 'tahun' => '2024', 'instansi' => 'Lembaga Administrasi Negara Republik Indonesia'],
    ['nama' => 'Inspiring Women pada Women Leadership Festival Sumut', 'tahun' => '2024', 'instansi' => 'IWAPI'],
];

$kontak = [
    ['ikon' => 'bi-telephone', 'label' => 'Telepon', 'nilai' => '+62 813-7575-2628', 'tautan' => 'tel:+6281375752628'],
    ['ikon' => 'bi-instagram', 'label' => 'Instagram', 'nilai' => '@dwi_endah_purwanti', 'tautan' => 'https://www.instagram.com/dwi_endah_purwanti'],
    ['ikon' => 'bi-envelope', 'label' => 'Email', 'nilai' => 'dwiendahpurwanti@gmail.com', 'tautan' => 'mailto:dwiendahpurwanti@gmail.com'],
];

$e = function ($value) {
    return Html::encode($value);
};
?>

<main class="main women-leader-page">
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Profil Pimpinan</h1>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <ol>
          <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
          <li>Profil</li>
          <li class="current" aria-current="page">Profil Pimpinan</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="women-leader-section section" aria-labelledby="women-leader-name">
    <div class="women-leader-decoration women-leader-decoration--one" aria-hidden="true"></div>
    <div class="women-leader-decoration women-leader-decoration--two" aria-hidden="true"></div>

    <div class="container position-relative">
      <article class="women-leader-cover" data-aos="fade-up">
        <div class="women-leader-portrait-area">
          <div class="women-leader-portrait-shape" aria-hidden="true"></div>
          <div class="women-leader-portrait-ring">
            <img src="<?= $e($pimpinan['foto']) ?>"
                 alt="Foto <?= $e($pimpinan['nama']) ?>"
                 class="women-leader-portrait"
                 loading="eager">
          </div>
          <span class="women-leader-active"><i class="bi bi-patch-check-fill"></i> Pimpinan Aktif</span>
        </div>

        <div class="women-leader-cover-content">
          <span class="women-leader-kicker">Profil Kepala Dinas</span>
          <h2 id="women-leader-name"><?= $e($pimpinan['nama']) ?></h2>
          <p class="women-leader-role"><?= $e($pimpinan['jabatan']) ?></p>
          <blockquote>
            <span class="women-leader-quote-mark" aria-hidden="true">“</span>
            <?= $e($pimpinan['ringkasan']) ?>
          </blockquote>

          <div class="women-leader-birth">
            <div class="women-leader-birth-icon"><i class="bi bi-geo-alt"></i></div>
            <div>
              <small>Tempat, Tanggal Lahir</small>
              <strong><?= $e($pimpinan['lahir']) ?> · <?= $e($pimpinan['tanggal_lahir']) ?></strong>
            </div>
          </div>
        </div>
      </article>

      <div class="women-leader-layout">
        <aside class="women-leader-sidebar">
          <section class="women-leader-panel women-leader-biodata" data-aos="fade-up" data-aos-delay="80">
            <div class="women-leader-panel-heading">
              <span>01</span>
              <div>
                <small>Informasi Pimpinan</small>
                <h3>Biodata</h3>
              </div>
            </div>

            <dl class="women-leader-biodata-list">
              <?php foreach ($biodata as $item): ?>
                <div>
                  <dt><?= $e($item['label']) ?></dt>
                  <dd><?= $e($item['nilai']) ?></dd>
                </div>
              <?php endforeach; ?>
            </dl>
          </section>

          <section class="women-leader-panel women-leader-education" data-aos="fade-up" data-aos-delay="100">
            <div class="women-leader-panel-heading">
              <span>02</span>
              <div>
                <small>Latar Belakang</small>
                <h3>Pendidikan</h3>
              </div>
            </div>

            <?php foreach ($pendidikan as $item): ?>
              <article class="women-leader-degree">
                <div class="women-leader-degree-symbol"><i class="bi bi-mortarboard-fill"></i></div>
                <div>
                  <span><?= $e($item['tahun']) ?></span>
                  <h4><?= $e($item['jenjang']) ?></h4>
                  <p><?= $e($item['institusi']) ?></p>
                  <?php if ($item['jurusan'] !== '—'): ?>
                    <small><?= $e($item['jurusan']) ?></small>
                  <?php endif; ?>
                </div>
              </article>
            <?php endforeach; ?>
          </section>

          <section class="women-leader-panel women-leader-contact" data-aos="fade-up" data-aos-delay="150">
            <div class="women-leader-panel-heading women-leader-panel-heading--light">
              <span>03</span>
              <div>
                <small>Terhubung</small>
                <h3>Kontak</h3>
              </div>
            </div>

            <div class="women-leader-contact-list">
              <?php foreach ($kontak as $item): ?>
                <a href="<?= $e($item['tautan']) ?>"
                   <?= strpos($item['tautan'], 'http') === 0 ? 'target="_blank" rel="noopener noreferrer"' : '' ?>>
                  <i class="bi <?= $e($item['ikon']) ?>" aria-hidden="true"></i>
                  <span>
                    <small><?= $e($item['label']) ?></small>
                    <strong><?= $e($item['nilai']) ?></strong>
                  </span>
                </a>
              <?php endforeach; ?>
            </div>
          </section>
        </aside>

        <div class="women-leader-main-content">
          <section class="women-leader-panel women-leader-career" data-aos="fade-up" data-aos-delay="120">
            <div class="women-leader-panel-heading">
              <span>04</span>
              <div>
                <small>Perjalanan Profesional</small>
                <h3>Riwayat Karier</h3>
              </div>
            </div>

            <div class="women-leader-career-list">
              <?php foreach ($karier as $index => $item): ?>
                <article class="women-leader-career-row<?= !empty($item['aktif']) ? ' is-active' : '' ?>">
                  <div class="women-leader-career-year">
                    <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                  </div>
                  <div class="women-leader-career-copy">
                    <div class="women-leader-career-meta">
                      <span><i class="bi bi-calendar3"></i> <?= $e($item['periode']) ?></span>
                      <?php if (!empty($item['aktif'])): ?>
                        <em>Jabatan Saat Ini</em>
                      <?php endif; ?>
                    </div>
                    <h4><?= $e($item['jabatan']) ?></h4>
                    <p><i class="bi bi-building"></i> <?= $e($item['instansi']) ?></p>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          </section>

          <section class="women-leader-panel women-leader-organization" data-aos="fade-up" data-aos-delay="160">
            <div class="women-leader-panel-heading">
              <span>05</span>
              <div>
                <small>Kontribusi Sosial</small>
                <h3>Pengalaman Organisasi</h3>
              </div>
            </div>

            <div class="women-leader-organization-grid">
              <?php foreach ($organisasi as $index => $item): ?>
                <article>
                  <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                  <h4><?= $e($item['nama']) ?></h4>
                  <p><i class="bi bi-calendar3"></i> <?= $e($item['periode']) ?></p>
                </article>
              <?php endforeach; ?>
            </div>
          </section>

          <section class="women-leader-panel women-leader-achievements" data-aos="fade-up" data-aos-delay="180">
            <div class="women-leader-panel-heading">
              <span>06</span>
              <div>
                <small>Dedikasi & Pengakuan</small>
                <h3>Tanda Jasa dan Penghargaan</h3>
              </div>
            </div>

            <div class="women-leader-achievement-grid">
              <?php foreach ($prestasi as $item): ?>
                <article class="women-leader-achievement-card">
                  <div class="women-leader-award-icon"><i class="bi bi-award-fill"></i></div>
                  <div>
                    <span><?= $e($item['tahun']) ?></span>
                    <h4><?= $e($item['nama']) ?></h4>
                    <p><?= $e($item['instansi']) ?></p>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          </section>
        </div>
      </div>

    </div>
  </section>
</main>

<style>
  .women-leader-page {
    --wl-blue: #123597;
    --wl-blue-dark: #08236f;
    --wl-cyan: #08b9eb;
    --wl-orange: #ffb43c;
    --wl-orange-soft: #fff5df;
    --wl-cyan-soft: #f1f9ff;
    --wl-ink: #10213f;
    --wl-muted: #66738a;
    --wl-border: #dce8f5;
  }

  .women-leader-section {
    position: relative;
    overflow: hidden;
    padding: 72px 0 84px;
    background:
      radial-gradient(circle at 5% 24%, rgba(8,185,235,.09), transparent 22%),
      radial-gradient(circle at 96% 72%, rgba(255,180,60,.08), transparent 24%),
      #f8fbff;
  }

  .women-leader-decoration { position: absolute; border-radius: 50%; pointer-events: none; }
  .women-leader-decoration--one { top: 350px; left: -110px; width: 230px; height: 230px; border: 45px solid rgba(8,185,235,.045); }
  .women-leader-decoration--two { right: -70px; bottom: 260px; width: 170px; height: 170px; background: rgba(255,180,60,.07); }

  .women-leader-cover {
    display: grid;
    grid-template-columns: minmax(280px, 39%) minmax(0, 61%);
    min-height: 500px;
    margin-bottom: 32px;
    overflow: hidden;
    border-radius: 12px 70px 12px 70px;
    background: #fff;
    box-shadow: 0 28px 70px rgba(8,35,111,.12);
  }

  .women-leader-portrait-area {
    position: relative;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    min-height: 500px;
    overflow: hidden;
    background: linear-gradient(145deg, var(--wl-blue-dark), var(--wl-blue) 58%, #1749bb);
  }

  .women-leader-portrait-shape {
    position: absolute;
    top: -80px;
    left: -95px;
    width: 300px;
    height: 300px;
    border: 55px solid rgba(255,255,255,.07);
    border-radius: 50%;
  }

  .women-leader-portrait-area::after {
    position: absolute;
    right: -55px;
    bottom: 60px;
    width: 150px;
    height: 150px;
    border: 26px solid rgba(255,180,60,.48);
    border-radius: 50%;
    content: '';
  }

  .women-leader-portrait-ring {
    position: relative;
    z-index: 2;
    width: min(82%, 350px);
    padding: 10px 10px 0;
    border: 2px solid rgba(255,255,255,.28);
    border-bottom: 0;
    border-radius: 180px 180px 0 0;
    background: rgba(255,255,255,.07);
  }

  .women-leader-portrait { display: block; width: 100%; height: 430px; object-fit: contain; object-position: center bottom; filter: drop-shadow(0 15px 20px rgba(4,24,79,.28)); }

  .women-leader-active {
    position: absolute;
    z-index: 4;
    right: 22px;
    bottom: 24px;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 14px;
    border-radius: 4px 13px 4px 13px;
    background: var(--wl-orange);
    color: #10213f;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .06em;
    text-transform: uppercase;
  }

  .women-leader-cover-content { position: relative; display: flex; flex-direction: column; justify-content: center; padding: clamp(38px, 6vw, 78px); background: linear-gradient(130deg, #fff 0%, #fff 62%, #eef9ff 100%); }
  .women-leader-cover-content::before { position: absolute; top: 42px; right: 45px; width: 46px; height: 7px; border-radius: 10px; background: var(--wl-orange); box-shadow: 18px 16px 0 -1px var(--wl-cyan); content: ''; }
  .women-leader-kicker { margin-bottom: 16px; color: var(--wl-cyan); font-size: 12px; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; }
  .women-leader-cover h2 { max-width: 720px; margin: 0; color: var(--wl-ink); font-size: clamp(34px, 4.8vw, 62px); font-weight: 800; letter-spacing: -.045em; line-height: 1.05; }
  .women-leader-role { max-width: 740px; margin: 18px 0 0; color: var(--wl-blue); font-size: clamp(16px, 1.8vw, 20px); font-weight: 700; line-height: 1.55; }
  .women-leader-cover blockquote { position: relative; max-width: 760px; margin: 31px 0 0; padding: 22px 25px 22px 35px; border-left: 3px solid var(--wl-orange); background: var(--wl-cyan-soft); color: var(--wl-muted); font-size: 15px; font-style: normal; line-height: 1.75; }
  .women-leader-quote-mark { position: absolute; top: -4px; left: 9px; color: rgba(8,185,235,.18); font-family: Georgia,serif; font-size: 56px; line-height: 1; }

  .women-leader-birth { display: flex; align-items: center; gap: 13px; margin-top: 29px; }
  .women-leader-birth-icon { display: grid; flex: 0 0 43px; width: 43px; height: 43px; place-items: center; border-radius: 50%; background: var(--wl-orange-soft); color: var(--wl-orange); font-size: 18px; }
  .women-leader-birth small { display: block; margin-bottom: 3px; color: #91858f; font-size: 11px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; }
  .women-leader-birth strong { color: var(--wl-ink); font-size: 14px; line-height: 1.5; }

  .women-leader-layout { display: grid; grid-template-columns: minmax(260px, .72fr) minmax(0, 1.55fr); gap: 30px; align-items: start; }
  .women-leader-sidebar, .women-leader-main-content { display: grid; gap: 30px; }
  .women-leader-panel { padding: 34px; border: 1px solid var(--wl-border); border-radius: 9px 30px 9px 30px; background: #fff; box-shadow: 0 13px 35px rgba(8,35,111,.06); }
  .women-leader-panel-heading { display: flex; align-items: center; gap: 14px; margin-bottom: 27px; padding-bottom: 19px; border-bottom: 1px solid var(--wl-border); }
  .women-leader-panel-heading > span { display: grid; flex: 0 0 44px; width: 44px; height: 44px; place-items: center; border-radius: 50% 50% 8px 50%; background: var(--wl-blue); color: #fff; font-size: 12px; font-weight: 800; }
  .women-leader-panel-heading small { display: block; margin-bottom: 2px; color: var(--wl-cyan); font-size: 10px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
  .women-leader-panel-heading h3 { margin: 0; color: var(--wl-ink); font-size: 23px; font-weight: 800; }

  .women-leader-biodata-list { margin: 0; }
  .women-leader-biodata-list > div { padding: 14px 0; border-bottom: 1px solid var(--wl-border); }
  .women-leader-biodata-list > div:first-child { padding-top: 0; }
  .women-leader-biodata-list > div:last-child { padding-bottom: 0; border-bottom: 0; }
  .women-leader-biodata-list dt { margin-bottom: 4px; color: var(--wl-cyan); font-size: 10px; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; }
  .women-leader-biodata-list dd { margin: 0; color: var(--wl-ink); font-size: 13px; font-weight: 700; line-height: 1.55; }

  .women-leader-degree { display: flex; gap: 15px; align-items: flex-start; padding: 17px 0; border-bottom: 1px solid var(--wl-border); }
  .women-leader-degree:first-of-type { padding-top: 0; }
  .women-leader-degree:last-child { padding-bottom: 0; border-bottom: 0; }
  .women-leader-degree-symbol { display: grid; flex: 0 0 45px; width: 45px; height: 45px; place-items: center; border-radius: 6px 16px 6px 16px; background: var(--wl-orange-soft); color: var(--wl-orange); font-size: 19px; }
  .women-leader-degree span { color: var(--wl-orange); font-size: 11px; font-weight: 900; letter-spacing: .1em; }
  .women-leader-degree h4 { margin: 4px 0; color: var(--wl-ink); font-size: 16px; font-weight: 800; line-height: 1.45; }
  .women-leader-degree p { margin: 0; color: var(--wl-muted); font-size: 13px; }
  .women-leader-degree small { display: inline-block; margin-top: 6px; padding: 3px 8px; border-radius: 20px; background: var(--wl-cyan-soft); color: var(--wl-blue); font-size: 10px; font-weight: 750; }

  .women-leader-contact { border: 0; background: linear-gradient(155deg, var(--wl-blue-dark), var(--wl-blue)); color: #fff; }
  .women-leader-panel-heading--light { border-bottom-color: rgba(255,255,255,.16); }
  .women-leader-panel-heading--light > span { background: var(--wl-orange); color: var(--wl-blue-dark); }
  .women-leader-panel-heading--light small { color: #f6cfdc; }
  .women-leader-panel-heading--light h3 { color: #fff; }
  .women-leader-contact-list { display: grid; gap: 10px; }
  .women-leader-contact-list a { display: flex; gap: 13px; align-items: center; padding: 12px 10px; border-radius: 10px; color: #fff; transition: .25s ease; }
  .women-leader-contact-list a:hover { background: rgba(255,255,255,.09); transform: translateX(3px); }
  .women-leader-contact-list > a > i { display: grid; flex: 0 0 38px; width: 38px; height: 38px; place-items: center; border: 1px solid rgba(255,255,255,.17); border-radius: 50%; color: #ffc36a; }
  .women-leader-contact-list small { display: block; margin-bottom: 2px; color: #bcd5ff; font-size: 10px; text-transform: uppercase; }
  .women-leader-contact-list strong { display: block; overflow-wrap: anywhere; font-size: 12px; font-weight: 700; }

  .women-leader-career-list { display: grid; }
  .women-leader-career-row { display: grid; grid-template-columns: 54px minmax(0,1fr); gap: 18px; padding: 22px 0; border-bottom: 1px solid var(--wl-border); }
  .women-leader-career-row:first-child { padding-top: 0; }
  .women-leader-career-row:last-child { padding-bottom: 0; border-bottom: 0; }
  .women-leader-career-year { position: relative; display: flex; justify-content: center; }
  .women-leader-career-year::after { position: absolute; top: 42px; bottom: -23px; width: 1px; background: var(--wl-border); content: ''; }
  .women-leader-career-row:last-child .women-leader-career-year::after { display: none; }
  .women-leader-career-year span { display: grid; z-index: 1; width: 42px; height: 42px; place-items: center; border: 1px solid #d6e7f7; border-radius: 50%; background: #fff; color: var(--wl-cyan); font-size: 12px; font-weight: 900; }
  .women-leader-career-row.is-active .women-leader-career-year span { border-color: var(--wl-orange); background: var(--wl-orange); color: var(--wl-blue-dark); }
  .women-leader-career-meta { display: flex; flex-wrap: wrap; align-items: center; gap: 9px; margin-bottom: 8px; }
  .women-leader-career-meta span { color: var(--wl-cyan); font-size: 11px; font-weight: 750; }
  .women-leader-career-meta em { padding: 4px 8px; border-radius: 20px; background: #e8f6ec; color: #267749; font-size: 9px; font-style: normal; font-weight: 850; letter-spacing: .05em; text-transform: uppercase; }
  .women-leader-career-copy h4 { margin: 0; color: var(--wl-ink); font-size: 17px; font-weight: 800; line-height: 1.48; }
  .women-leader-career-copy p { margin: 7px 0 0; color: var(--wl-muted); font-size: 13px; }

  .women-leader-organization-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 12px; }
  .women-leader-organization-grid article { position: relative; min-height: 128px; padding: 21px; overflow: hidden; border: 1px solid var(--wl-border); border-radius: 6px 19px 6px 19px; background: linear-gradient(140deg,#fff,#f2f9ff); }
  .women-leader-organization-grid article > span { position: absolute; top: 10px; right: 13px; color: rgba(18,53,151,.09); font-size: 36px; font-weight: 900; }
  .women-leader-organization-grid article::before { display: block; width: 28px; height: 4px; margin-bottom: 18px; border-radius: 4px; background: var(--wl-orange); content: ''; }
  .women-leader-organization-grid h4 { position: relative; z-index: 1; margin: 0; color: var(--wl-ink); font-size: 14px; font-weight: 750; line-height: 1.55; }
  .women-leader-organization-grid p { position: relative; z-index: 1; margin: 10px 0 0; color: var(--wl-cyan); font-size: 11px; font-weight: 750; }

  .women-leader-achievement-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 13px; }
  .women-leader-achievement-card { display: grid; grid-template-columns: 45px minmax(0,1fr); gap: 13px; align-items: start; min-height: 148px; padding: 20px; border: 1px solid #f3dcae; border-radius: 7px 20px 7px 20px; background: linear-gradient(140deg,#fffaf0,#fff); }
  .women-leader-award-icon { display: grid; width: 43px; height: 43px; place-items: center; border-radius: 50% 50% 7px 50%; background: var(--wl-orange); color: var(--wl-blue-dark); font-size: 19px; }
  .women-leader-achievement-card span { display: inline-block; margin-bottom: 6px; padding: 3px 8px; border-radius: 20px; background: var(--wl-blue); color: #fff; font-size: 9px; font-weight: 850; letter-spacing: .06em; }
  .women-leader-achievement-card h4 { margin: 0; color: var(--wl-ink); font-size: 13px; font-weight: 800; line-height: 1.5; }
  .women-leader-achievement-card p { margin: 7px 0 0; color: var(--wl-muted); font-size: 10px; font-weight: 650; line-height: 1.5; }

  .women-leader-public-info { display: flex; align-items: flex-start; gap: 12px; margin-top: 30px; padding: 18px 22px; border-left: 3px solid var(--wl-cyan); background: #fff; color: var(--wl-muted); box-shadow: 0 8px 25px rgba(8,35,111,.045); }
  .women-leader-public-info > i { margin-top: 2px; color: var(--wl-cyan); }
  .women-leader-public-info p { margin: 0; font-size: 12px; line-height: 1.65; }
  .women-leader-public-info strong { color: var(--wl-ink); }

  @media (max-width: 991.98px) {
    .women-leader-cover { grid-template-columns: 40% 60%; }
    .women-leader-portrait, .women-leader-portrait-area { min-height: 440px; }
    .women-leader-portrait { height: 390px; }
    .women-leader-layout { grid-template-columns: 1fr; }
    .women-leader-sidebar { grid-template-columns: repeat(2,minmax(0,1fr)); }
  }

  @media (max-width: 767.98px) {
    .women-leader-section { padding: 48px 0 60px; }
    .women-leader-cover { grid-template-columns: 1fr; border-radius: 9px 36px 9px 36px; }
    .women-leader-portrait-area { min-height: 410px; }
    .women-leader-portrait { height: 370px; }
    .women-leader-cover-content { padding: 38px 25px 42px; }
    .women-leader-cover-content::before { top: 25px; right: 25px; }
    .women-leader-cover h2 { font-size: 37px; }
    .women-leader-sidebar { grid-template-columns: 1fr; }
    .women-leader-panel { padding: 27px 22px; }
    .women-leader-organization-grid, .women-leader-achievement-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 420px) {
    .women-leader-portrait-area { min-height: 370px; }
    .women-leader-portrait { height: 335px; }
    .women-leader-active { right: 13px; bottom: 15px; }
    .women-leader-birth { align-items: flex-start; }
    .women-leader-achievement-card { min-height: 0; }
  }

  @media (prefers-reduced-motion: reduce) {
    .women-leader-page *, .women-leader-page *::before, .women-leader-page *::after { animation: none !important; transition: none !important; }
  }
</style>
