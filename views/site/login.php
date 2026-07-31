<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MasterTahun;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="login-logo">
        <b><br><a href="<?= Yii::$app->homeUrl?>"><h1 class="judul"><b>Dashboard Landing Page</b></h1></a></b>
    </div>
<div class="login-box">
    <style>
        .checkbox {
            margin-top: 0;
        }
    </style>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <br>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username') ]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="pull-left">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-12 ">
                <?= Html::submitButton('Masuk', ['class' => 'btn btn-block btn-loginblack', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
    </div>
</div>
<!-- /.login-box -->
<div class="copy"> Copyright &copy; <?=date('Y')?> <b>DP3AKB - PROVSU</b></div>
