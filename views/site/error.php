<?php
use yii\helpers\Html;

$this->title = $name;
?>
<section id="blog" class="section">
    <div class="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
              <div class="blog-wrapper">
                   <div class="container">
                        <div class="row content">
                            <div class="col-md-12 order-2 order-md-1" data-aos="fade-up">
                                <img src="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/icon/error.png"  class="img-fluid" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 40%;">
                            </div>
                        </div>
                    <div class="row content">
                        <div class="col-md-12 order-2 order-md-1" data-aos="fade-up">
                            <h3 style="margin: 0 0 20px 0;
                            font-size: 30px;
                            font-weight: 700;"><?= $name ?></h3>
                            
                            <p>
                                The above error occurred while the Web server was processing your request.
                                Please contact us if you think this is a server error. Thank you.
                                Meanwhile, you may <b><a href='<?= Yii::$app->homeUrl ?>'>return to Home</a></b> or try using the search
                                form.
                            </p>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>