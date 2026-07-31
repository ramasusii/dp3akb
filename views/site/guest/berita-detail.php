<?php
	use yii\helpers\Html;
    use yii\helpers\Url;
?>

<!-- 🔥 WAJIB: Load Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Page Berita</span>
          <h1 class="text-capitalize mb-5 text-lg"><?= Html::encode($data->judul_berita) ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="single-blog-item">
                            <img src="<?= Html::encode($data->getImageUrl()) ?>" alt="" class="img-fluid">
                            <div class="blog-item-content mt-5">
                                <div class="blog-item-meta mb-3">
                                    <span class="text-black text-capitalize mr-3">
                                        <i class="icofont-calendar mr-2"></i> <?= Html::encode($data->getFormattedDate()) ?>
                                    </span>
                                </div> 
                                <h2 class="mb-4 text-md">
                                    <a href="<?= Yii::$app->homeUrl ?>"><?= Html::encode($data->judul_berita) ?></a>
                                </h2>
                                <div class="content">
                                    <?= \yii\helpers\HtmlPurifier::process($data->isi); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mt-5 pt-4 border-top">
                            <h6 class="text-muted mb-3">
                                <i class="bi bi-share me-2"></i>Bagikan berita ini
                            </h6>
                            <div class="d-flex gap-2 flex-wrap">
                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(Url::current([], true)) ?>"
                                   target="_blank"
                                   class="share-btn btn-facebook"
                                   title="Bagikan ke Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <!-- Twitter -->
                                <a href="https://twitter.com/intent/tweet?url=<?= urlencode(Url::current([], true)) ?>&text=<?= urlencode($data->judul_berita) ?>"
                                   target="_blank"
                                   class="share-btn btn-twitter"
                                   title="Bagikan ke Twitter">
                                    <i class="bi bi-twitter"></i> <!-- Gunakan bi-twitter, bukan bi-twitter-x -->
                                </a>
                                <!-- WhatsApp -->
                                <a href="https://api.whatsapp.com/send?text=<?= urlencode($data->judul_berita . ' - ' . Url::current([], true)) ?>"
                                   target="_blank"
                                   class="share-btn btn-whatsapp"
                                   title="Bagikan ke WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-widget latest-post mb-3">
                        <h5>Berita Lainnya</h5>
                        <?php foreach ($beritaTerbaru as $berita): 
                            $url = Url::to(['site/berita-detail', 'title' => $berita->slug_berita]);
                            $imageUrl = $berita->getImageUrl();
                            $formattedDate = $berita->getFormattedDate();
                            $ringkasan = \yii\helpers\StringHelper::truncate(strip_tags($berita->ringkasan ?: $berita->isi), 80);
                        ?>
                            <div class="latest-post-item py-2 d-flex">
                                <div class="flex-shrink-0 me-3" style="width: 70px; height: 70px; overflow: hidden; border-radius: 6px;">
                                    <a href="<?= $url ?>">
                                        <img src="<?= $imageUrl ?>" 
                                             alt="<?= Html::encode($berita->judul_berita) ?>" 
                                             style="width: 100%; height: 100%; object-fit: cover;"
                                             onerror="this.onerror=null;this.src='<?= \Yii::getAlias('@web/img/berita/no-image.jpg') ?>';">
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="text-sm text-muted"><?= Html::encode($formattedDate) ?></span>
                                    <h6 class="my-2">
                                        <a href="<?= $url ?>" class="text-decoration-none text-dark">
                                            <?= Html::encode($berita->judul_berita) ?>
                                        </a>
                                    </h6>
                                    <p class="text-muted mb-0" style="font-size: 0.875rem; line-height: 1.4;">
                                        <?= Html::encode($ringkasan) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>

<style>
/* --- Perbaikan Sidebar Berita Lainnya --- */
.latest-post h5 {
    font-weight: 600 !important;
    margin-bottom: 24px !important;
    padding-bottom: 12px !important;
    border-bottom: 1px solid #eee !important;
    font-size: 1.25rem !important;
    color: #333 !important;
    line-height: 1.2 !important;
}

.latest-post > .d-flex {
    padding: 16px 0 !important;
    margin: 0 !important;
    border-bottom: 1px dashed #f0f0f0 !important;
    align-items: flex-start !important;
}

.latest-post > .d-flex:last-child {
    border-bottom: none !important;
    padding-bottom: 0 !important;
}

.latest-post .flex-shrink-0 {
    width: 72px !important;
    height: 72px !important;
    margin-right: 16px !important; /* ✅ JARAK ANTARA GAMBAR & TEKS */
    flex-shrink: 0 !important;
}

.latest-post .flex-shrink-0 img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    border-radius: 6px !important;
    display: block !important;
}

.latest-post .flex-grow-1 {
    flex-grow: 1 !important;
    min-width: 0 !important;
}

.latest-post .text-sm.text-muted {
    font-size: 0.8125rem !important;
    color: #777 !important;
    display: block !important;
    margin: 0 0 8px 0 !important; /* ✅ JARAK KE JUDUL */
    line-height: 1.3 !important;
}

.latest-post h6 {
    font-size: 1.05rem !important;
    margin: 0 0 10px 0 !important; /* ✅ JARAK KE RINGKASAN */
    line-height: 1.35 !important;
    font-weight: 600 !important;
}

.latest-post h6 a {
    color: #222 !important;
    text-decoration: none !important;
    transition: color 0.2s !important;
}

.latest-post h6 a:hover {
    color: #007bff !important;
}

.latest-post p.text-muted {
    font-size: 0.875rem !important;
    color: #666 !important;
    margin: 0 !important;
    line-height: 1.5 !important;
	text-align: justify!important;
}

/* Hover effect (opsional tapi bagus) */
.latest-post > .d-flex:hover {
    background-color: #fafafa !important;
    border-radius: 8px !important;
    padding-left: 16px !important;
    padding-right: 16px !important;
    margin-left: -16px !important;
    margin-right: -16px !important;
}

/* ================== TOMBOL SHARE SOSMED ================== */
.share-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    transition: all 0.25s ease;
    border: 1px solid #e5e5e5;
    background: #fff;
    color: #666;
    text-decoration: none !important;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
}

.share-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.12);
}

.btn-facebook:hover { color: #1877f2; border-color: #1877f2; }
.btn-twitter:hover { color: #1DA1F2; border-color: #1DA1F2; }
.btn-whatsapp:hover { color: #25D366; border-color: #25D366; }

/* Responsif */
@media (max-width: 576px) {
    .share-btn {
        width: 50px;
        height: 50px;
        font-size: 1.3rem;
    }
}
</style>