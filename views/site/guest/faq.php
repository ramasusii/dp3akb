<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tentang Kami</span>
          <h1 class="text-capitalize mb-5 text-lg">FAQ</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="title-color">Pertanyaan Umum</h2>
            </div>
            <div class="col-lg-8">
                <?php if (!empty($faq)): ?>
                    <?php foreach ($faq as $index => $item): ?>
                        <div class="mb-4">
                            <h4><strong><?= ($index + 1) ?>. <?= Html::encode($item->pertanyaan) ?></strong></h4>
                            <p>
                                <?= $item->jawaban ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="mb-4">
                        <p class="text-muted">Belum ada pertanyaan umum.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>