<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\models\Treatment;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Layanan - LandingPage';
?>

<style>
    .boxwhite{
        background: white;
        border-radius: 20px;
        box-shadow: rgb(0 0 0 / 21%) 0px 2px 4px, rgb(23 136 161 / 12%) 0px 7px 13px -3px, rgb(0 0 0 / 10%) 0px -3px 0px inset;
        -webkit-transition: all 0.3s ease-out 0s;
    }

    .small-box>.small-box-footer{
        background: transparent!important;
        color: #54595d!important
    }
</style>

<div class="site-index">
    <div class="content-update">
        <a class="btn btn-primary pull-right" href="https://dashboard.ghoclass.id/type" target="_blank"><i class="fa fa-edit"></i> Edit Sekarang</a>
    <br>

    <div class="row" style="padding-top:30px">
        <?php 
                foreach($models as $mdl)
                {
                        echo '
                            <div class="col-lg-3 col-xs-6">
                            <div class="small-box boxwhite">
                                <div class="inner text-center">
                                    <img src="https://api.ghoclass.id/'.$mdl->cover.'" alt="Icons" style="height: 100px;                     ">
                                </div>
                                <a href="#" class="small-box-footer">'.$mdl->title.'
                                </a>
                            </div>
                        </div>
                            
                        ';
                    }
            ?>

        

    </div>
    
</div>