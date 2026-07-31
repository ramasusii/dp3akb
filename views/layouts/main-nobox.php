<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use app\models\ProfilList;

$colorThemes = ProfilList::find()->where(['id'=>11])->one()->list_data;

    if ($colorThemes == null) {
        $colorTheme = '#a93824'; 
    }elseif($colorThemes == ''){
      $colorTheme = '#a93824';
    }elseif(empty($colorThemes)){
      $colorTheme = '#a93824';
    }else {
        $colorTheme = $colorThemes; 
    }
    
if (Yii::$app->controller->action->id === 'login') { 
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
        
        <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/favicon.png" rel="icon">
        <link href="<?= Yii::$app->request->baseUrl ?>/web/assets-guest/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        
        <!-- Add this to your layout file or view -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
        
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            @media screen and (max-width: 480px){
                .kv-table-wrap tr > td:first-child {
                    border-top: 1px solid #f4f4f4;
                    margin-top: 0px;
                    font-size: 1em;
                }
                .kv-table-wrap th, .kv-table-wrap td {
                    display: table-cell;
                    width: 100% !important;
                    text-align: inherit;
                    font-size: 1em;
                }
            }

            .jumbotron {
                color: inherit;
                background-color: transparent!important;
            }

            .jumbotron p{
                font-size:15px!important;
            }

            .table-responsive > .table > thead > tr > th, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tfoot > tr > td {
                white-space: nowrap;
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                padding-top: 4px;
            }
            .select2-container--krajee .select2-selection--single .select2-selection__rendered {   
                padding-top: 4px;
            };
           
            .alert, .brand, .btn-simple, .h1, .h2, .h3, .h4, .h5, .h6, .navbar, .td-name, a, body, button.close, h1, h2, h3, h4, h5, h6, p, td {
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                font-family: Lato,sans-serif;
            }

            .skin-blue-light .main-header .navbar {
                background-color: <?= $colorTheme ?> !important;
                box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,0.03), 0 0.9375rem 1.40625rem rgba(4,9,20,0.03), 0 0.25rem 0.53125rem rgba(4,9,20,0.05), 0 0.125rem 0.1875rem rgba(4,9,20,0.03);
                padding-top: 5px;
                padding-right: 8px;
            }
            .sidebar-mini.sidebar-collapse .main-sidebar {
                width: 68px !important;
            }
            .sidebar-mini.sidebar-collapse .main-header .navbar {
                margin-left: 68px!important;
            }
            .sidebar-mini.sidebar-collapse .main-header .logo {
                width: 68px!important;
            }
            .sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .right-side, .sidebar-mini.sidebar-collapse .main-footer {
                margin-left: 68px !important;
            }
            .skin-blue-light .main-header .logo {
                background-color: <?= $colorTheme ?> !important;
                box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,0.03), 0 0.9375rem 1.40625rem rgba(4,9,20,0.03), 0 0.25rem 0.53125rem rgba(4,9,20,0.05), 0 0.125rem 0.1875rem rgba(4,9,20,0.03);
                height: 57px;
                padding-top: 5px;
            }
            
            .skin-blue-light .main-sidebar {
                background-color: #ffffff !important;
                border-right: 0px !important;
                box-shadow: 7px 0 60px rgba(0,0,0,0.05)!important;
            }
            
            .content {
                padding-top: 18px;
                padding-left: 28px;
                padding-right: 18px;
            }
            
            .content-header>.breadcrumb {
  
                padding-top: 25px;
                padding-right: 18px;
                padding-left: 28px;
            }

            .main-header .logo .logo-lg {
                font-weight: bold;
            }

            .skin-blue-light .content-header {
                background:  #f1f3f5 !important;
            }

            .content-header {
                padding: 32px 14px 0 28px;
            }
            .content-wrapper {
                min-height: 100%;
                background-color: #f1f3f5!important;
                z-index: 800;
            }
            .btn:focus, .btn:hover {
                opacity: .9;
                transition: all .3s;
            }

            .btn-success {
                background: #31ce36!important;
                border-color: #31ce36!important;
            }

            .btn-success:disabled, .btn-success:focus, .btn-success:hover {
                background: #31ce36!important;
                border-color: #31ce36!important;
            }

            .btn-primary {
                background: #1f516e!important;
                border-color: #1f516e!important;
            }

            .btn-primary:disabled, .btn-primary:focus, .btn-primary:hover {
                background: #1f516e!important;
                border-color: #1f516e!important;
            }

            .btn-secondary {
                background: #6861ce!important;
                border-color: #6861ce!important;
            }

            .btn-secondary:disabled, .btn-secondary:focus, .btn-secondary:hover {
                background: #6861ce!important;
                border-color: #6861ce!important;
            }

            .btn-info {
                background: #48abf7!important;
                border-color: #48abf7!important;
            }

            .btn-info:disabled, .btn-info:focus, .btn-info:hover {
                background: #48abf7!important;
                border-color: #48abf7!important;
            }

            .btn-warning {
                background: #ffad46!important;
                border-color: #ffad46!important;
                color: #fff!important;
            }

            .btn-warning:disabled, .btn-warning:focus, .btn-warning:hover {
                background: #ffad46!important;
                border-color: #ffad46!important;
                color: #fff!important;
            }

            .btn-danger {
                background: #f25961!important;
                border-color: #f25961!important;
            }

            .btn-danger:disabled, .btn-danger:focus, .btn-danger:hover {
                background: #f25961!important;
                border-color: #f25961!important;
            }
            .box {
                border-radius: 6px;
                border-top-color: #ffffff!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42)
            }
            
            .box.box-solid.box-primary>.box-header {
                color:#444444!important;
                background: #fff!important;
                background-color: #fff!important;
            }
            .box.box-solid.box-primary {
                border: 1px solid #ffffff!important;
            }    

            .box.box-primary {
                border-top-color: #ffffff!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42)
                
            }

            .box.box-solid.box-danger>.box-header {
                color:#444444!important;
                background: #fff!important;
                background-color: #fff!important;
            }
            .box.box-solid.box-danger {
                border: 1px solid #ffffff!important;
            }    

            .box.box-danger {
                border-top-color: #ffffff!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42)
            }

            .box.box-solid.box-success>.box-header {
                color:#444444!important;
                background: #fff!important;
                background-color: #fff!important;
            }
            .box.box-solid.box-success {
                border: 1px solid #ffffff!important;
            }    
            
            .box.box-success {
                border-top-color: #ffffff!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42)
            }

            .box.box-solid.box-info>.box-header {
                color:#444444!important;
                background: #fff!important;
                background-color: #fff!important;
            }
            .box.box-solid.box-info {
                border: 1px solid #ffffff!important;
            }    

             .box.box-info {
                border-top-color: #ffffff!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42)
            }
            
            .skin-blue-light .sidebar-menu>li>a {
                margin: 6px 12px 6px 12px;
                padding: 12px 9px 12px 9px;
                border-radius: 5px;
                
            }
            .skin-blue-light .sidebar a:hover {
                color: #212123!important;
                background-color: #f4f4f4!important;
                margin: 6px 12px 6px 12px;
                padding: 12px 9px 12px 9px;
                border-radius: 5px;
            }
            .skin-blue-light .sidebar-menu>li.active>a {
                color: #ffffff!important;
                background-color:  <?= $colorTheme ?> !important;
                background: rgba(199,199,199,.2);
                margin: 6px 12px 6px 12px;
                padding: 12px 9px 12px 9px;
                border-radius: 5px;
                box-shadow: 4px 5px 3px rgba(0, 0, 0, 0.14);
                font-weight:bold;
            }
            .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
                background-color: <?= $colorTheme ?>!important;
                border-color:   #FDEDCB!important;
            }
            .box-body {
                padding: 15px;
            }

            .sidebar-menu>li>a>.fa, .sidebar-menu>li>a>.glyphicon, .sidebar-menu>li>a>.ion {
                width: 30px;
                font-size: 21px;
            }
            .inihr{
                    margin-top:3px;
                    margin-bottom:8px;
            }

            .skin-blue-light .sidebar-menu>li.header {
                color: #28282f!important;
                padding-top : 0px;
                font-size: 15px;
                background: #ffffff!important;
                padding: 0px 0px 5px 28px;
                text-shadow: 2px 2px 5px #d2d6de;
            }
            .skin-blue-light .sidebar-menu>li>.treeview-menu {
                background: #ffffff!important;
            }

            .skin-blue-light .sidebar-menu .treeview-menu>li>a {
                margin: 3px 13px 3px 8px;
                padding: 12px 9px 12px 9px;
                border-radius: 5px;
                padding-left: 28px;
                font-size: 14px;
            }
            .skin-blue-light .sidebar-menu .treeview-menu>li.active>a{
                color: #212123!important;
                background-color: #f4f4f4!important;
                background: rgba(199,199,199,.2);
                margin: 3px 13px 3px 8px;
                padding: 12px 9px 12px 9px;
                border-radius: 5px;
                padding-left: 28px;
            }
            .skin-blue-light .sidebar-menu .treeview-menu>li>a:hover {
                margin: 8px 18px 8px 15px;
                padding: 12px 9px 12px 9px;
                border-radius: 5px;
                padding-left: 28px;
            }
            .skin-blue-light .sidebar a {
                color: #54595d!important;
            }
            
            .skin-blue-light .main-header .navbar .sidebar-toggle:hover {
                background-color: #1f6cce00!important;
            }

            .skin-blue-light .main-header .navbar .nav>li>a:hover, .skin-blue-light .main-header .navbar .nav>li>a:active, .skin-blue-light .main-header .navbar .nav>li>a:focus, .skin-blue-light .main-header .navbar .nav .open>a, .skin-blue-light .main-header .navbar .nav .open>a:hover, .skin-blue-light .main-header .navbar .nav .open>a:focus, .skin-blue-light .main-header .navbar .nav>.active>a {
                padding-bottom: 12px;
                border-radius: 5px;
                margin-left: 6px;
                font-size: 14px;
            }

            .navbar-nav > li > a {
                border-radius: 5px;
                margin-left: 6px;
                font-size: 14px;
            }

            .navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
                right: -8px;
                margin-top: 5px;
            }
            .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
                background-color:  <?= $colorTheme ?> !important;
            }

            .navbar-nav>.user-menu>.dropdown-menu>.user-footer {
                background-color: #f9fbfd!important;
            }

            .navbar-nav>.user-menu>.dropdown-menu>.user-footer .btn-default {
                color: #404040!important;
                background-color: white!important;
                box-shadow: 2px 2px 7px rgba(152, 152, 152, 0.42);
            }
            .user-panel {
                padding-top: 20px;
            }
            .sidebar-menu{
                padding-top: 5px;
            }
                .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
                background-color: #0f69db;
                border-color: #4c8ad8;
            }
            .panel-default {
                border-color: #ffffff!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42);
            }

            .panel-default > .panel-heading {
                color: #444444!important;
                background-color: #ffffff!important;
                border-bottom: 1px solid #f4f4f4!important;
            }

            .panel-success {
                border-color:  <?= $colorTheme ?> !important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42);
                
            }

            .panel-success > .panel-heading {
                background:  <?= $colorTheme ?> !important;
                border-color:  <?= $colorTheme ?> !important;
                border-bottom: 1px solid #f4f4f4!important;
                color: white!important;
            }

            .panel-primary {
                border-color: #1f516e!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42);
            }

            .panel-primary > .panel-heading {
                background: #1f516e!important;
                border-color: #1f516e!important;
                border-bottom: 1px solid #f4f4f4!important;
                color: white!important;
            }

            .panel-danger {
                border-color:#f25961!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42);
            }

            .panel-danger > .panel-heading {
                background: #f25961!important;
                border-color: #f25961!important;
                border-bottom: 1px solid #f4f4f4!important;
                color: white!important;
            }
            .panel-info {
                border-color:#48abf7!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42);
            }

            .panel-info > .panel-heading {
                background: #48abf7!important;
                border-color: #48abf7!important;
                border-bottom: 1px solid #f4f4f4!important;
                color: white!important;
            }
            .panel-warning {
                border-color:#ffad46!important;
                box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42);
            }

            .panel-warning > .panel-heading {
                background: #ffad46!important;
                border-color: #ffad46!important;
                border-bottom: 1px solid #f4f4f4!important;
                color: white!important;
            }
            .kv-panel-before {
                padding: 9px 13px 9px 13px;
                border-bottom: 1px solid #fff!important;
            }

            .panel-title {
                font-size: 17px;
            }

            .panel > .table-responsive {
                padding: 0px 13px 13px 13px;
            }

            .panel > .table-bordered, .panel > .table-responsive > .table-bordered {
                border: 1px solid #f4f4f4!important;
            }

            .panel-footer {
                background-color: #ffffff;
                border-top: 1px solid #fff;
                text-align: center;
            }

            .panel-heading {
                padding: 12px 15px;
            }
            .panel-footer {
                border-top: 1px solid #f4f4f4;
                padding: 15px 15px;
            }
            .kv-panel-after {
                padding: 0px;
                border-top: 1px solid #fff;
            }
            .info-box {
				border-top-color: #ffffff!important;
				box-shadow: 2px 2px 17px rgba(152, 152, 152, 0.42)!important;
				border-radius: 6px!important;
			}
            .modal-content {
				border-radius: 5px;
			}

            hr {
                border-top: 1px solid #ddd;
            }

            .panel {
                margin-bottom: 0;
            }

            .panel-default {
                border-color: #f0f0f0 !important;
                box-shadow: none;
            }

            .btn-blue {
                background-color: <?= $colorTheme ?>; /* Green */
                color: white!important;
                /* font-weight : bold; */
            }
        </style>
    </head>
    <body class="hold-transition skin-blue-light sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

         <!-- start  content -->
         <div class="content-wrapper">
            <section class="content-header">
                <?php if (isset($this->blocks['content-header'])) { ?>
                    <h1><?= $this->blocks['content-header'] ?></h1>
                <?php } else { ?>
                    <h1>
                        <?php
                        if ($this->title !== null) {
                            echo \yii\helpers\Html::encode($this->title);
                            echo '<div class="clearfix"></div>';
                            // echo "&nbsp;";
                            // echo "<br>";
                        } else {
                            echo \yii\helpers\Inflector::camel2words(
                                \yii\helpers\Inflector::id2camel($this->context->module->id)
                            );
                            echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                        } ?>
                    </h1>
                <?php } ?>

                <?=
                Breadcrumbs::widget(
                    [
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]
                ) ?>
            </section>
            <section class="content">
                
                <?= Alert::widget() ?>
                <?= $content ?>
                
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0
            </div>
            <strong>Copyright &copy; 2022 <a href="#">DP3AKB - PROVSU</a>.</strong> All rights
            reserved.
        </footer>


        <!-- end  content -->

    </div>

    <?php $this->endBody() ?>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script>
    $.fn.modal.Constructor.prototype.enforceFocus = $.noop;

    
    $(document).ready(function(){
        $("#color-picker").spectrum({
            preferredFormat: "rgba", // You can customize the preferred color format
            showInput: true,        // Display the color input
            showPalette: true,      // Display a color palette
            showAlpha: true,
            palette: [
                ['<?= $colorTheme ?>', '#4f194c', '#1d5320'],  // Example palette colors
                // Add more colors as needed
            ],
        });
    });

    </script>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
