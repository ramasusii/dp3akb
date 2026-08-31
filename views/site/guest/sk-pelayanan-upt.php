<?php

use yii\helpers\Html;

?>

<main class="main">

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">SK Pelayanan UPT</h1>

            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= Yii::$app->homeUrl ?>">Beranda</a></li>
                    <li class="current">SK Pelayanan UPT</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section" style="background: #f8faff;">
        <div class="container" data-aos="fade-up">
            <div style="
                background:#fff;
                border:1px solid #e1e8f2;
                border-radius:22px;
                padding:40px 30px;
                box-shadow:0 15px 35px rgba(7,37,133,.08);
                text-align:center;
            ">
                <span style="
                    display:inline-block;
                    padding:8px 14px;
                    border-radius:999px;
                    background:#edf2ff;
                    color:#072585;
                    font-size:12px;
                    font-weight:700;
                    margin-bottom:16px;
                ">
                    Pelayanan UPT
                </span>

                <h2 style="font-weight:800; color:#1e2a40; margin-bottom:12px;">
                    Layanan Pengaduan Masyarakat
                </h2>

                <p style="max-width:720px; margin:0 auto 24px; color:#6c7688; line-height:1.8;">
                    Halaman ini disiapkan untuk layanan UPT. Saat ini konten
                    yang ditampilkan adalah Layanan Pengaduan Masyarakat.
                    Layanan UPT lainnya dapat ditambahkan menyusul.
                </p>

                <div style="
                    max-width:520px;
                    margin:0 auto;
                    padding:28px 20px;
                    background:linear-gradient(135deg,#f8faff,#f2f6fd);
                    border:2px dashed #d4deef;
                    border-radius:18px;
                ">
                    <div style="
                        width:58px;
                        height:58px;
                        margin:0 auto 14px;
                        border-radius:50%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        background:#fff;
                        color:#072585;
                        font-size:24px;
                        box-shadow:0 8px 18px rgba(7,37,133,.08);
                    ">
                        <i class="bi bi-megaphone"></i>
                    </div>

                    <h4 style="margin-bottom:8px; color:#243147; font-weight:700;">
                        Infografis Menyusul
                    </h4>

                    <p style="margin:0; color:#7a8495; font-size:14px;">
                        Area ini nantinya akan diisi gambar/infografis layanan UPT.
                    </p>
                </div>

                <div style="margin-top:24px;">
                    <?= Html::a(
                        '<i class="bi bi-arrow-left"></i> Kembali ke SK Pelayanan Dinas',
                        ['site/sk-pelayanan-dinas'],
                        [
                            'class' => 'btn',
                            'style' => '
                                background: linear-gradient(135deg,#072585,#164bc6);
                                color:#fff;
                                border:none;
                                border-radius:12px;
                                padding:10px 18px;
                                font-weight:700;
                                text-decoration:none;
                            '
                        ]
                    ) ?>
                </div>
            </div>
        </div>
    </section>

</main>