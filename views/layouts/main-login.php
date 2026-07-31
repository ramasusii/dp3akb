<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

    use app\models\ProfilList;
    $colorThemes = ProfilList::find()->where(['id'=>11])->one()->list_data;

    if ($colorThemes == null) {
        $colorTheme = '<?= $colorTheme ?>'; 
    }elseif($colorThemes == ''){
      $colorTheme = '<?= $colorTheme ?>';
    }elseif(empty($colorThemes)){
      $colorTheme = '<?= $colorTheme ?>';
    }else {
        $colorTheme = $colorThemes; 
    }

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/favicon.png" rel="icon">
    <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
    .login-page, .register-page {
        background-color: <?= $colorTheme ?> !important;
    }
    .login-box-body, .register-box-body {
        background: rgba(255,255,255,0.7);
        border-radius: 7px;
    }

    .btn-loginblack {
        background-color: <?= $colorTheme ?> !important;
        border-color: <?= $colorTheme ?> !important;
        color:white;
    }
    
    .btn-loginblack:hover, .btn-loginblack:focus, .btn-loginblack.focus {
        color:white!important;
    }

    .login-logo, .register-logo {
        font-size: 35px;
        margin-bottom: 49px;
        text-shadow: 4px 4px 6px black;
        color : white;
    }

    
    @font-face {
    font-family: 'Audiowide';
    font-style: normal;
    font-weight: normal;
    src: url('../web/fonts/audiowide-regular.woff');
    }

    @font-face {
    font-family: 'Orbitron';
    font-style: normal;
    font-weight: normal;
    src: url('../web/fonts/orbitron-regular.woff');
    }

    .judul{
        font-size: 42px;
        font-weight: bold;
        color: #FFF;
        font-family: 'Audiowide', sans-serif;
    }
    .kepanjangan{
        font-size: 30px;
    }

    .copy {
        width: 100%;
        position: fixed;
        bottom: 0;
        box-sizing: border-box;
        padding: 5px;
        z-index: 9999;
        text-align: center;
        color: #fff;
        background: rgba(0, 0, 0, 0.61);
    }

    .main-header .navbar-custom-menu a, .main-header .navbar-right a {
        background: #32005b!important;
		border-color:  #32005b!important;
	}

    .jumbotron {
        color: inherit;
        background-color: transparent!important;
    }

    
    </style>
</head>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
