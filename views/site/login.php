<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MasterTahun;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

// Pastikan Font Awesome dimuat (jika di layout utama belum ada)
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css']);

// Mengubah template input menggunakan Font Awesome
$fieldOptions1 = [
    'options' => ['class' => 'premium-form-group'],
    'inputTemplate' => "<div class='premium-input-wrapper'><span class='premium-input-icon'><i class='fa-solid fa-user'></i></span>{input}</div>"
];

$fieldOptions2 = [
    'options' => ['class' => 'premium-form-group'],
    'inputTemplate' => "<div class='premium-input-wrapper'><span class='premium-input-icon'><i class='fa-solid fa-lock'></i></span>{input}</div>"
];
?>

<style>
    /* === RESET & BACKGROUND === */
    body, html {
        margin: 0;
        padding: 0;
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .premium-login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        position: relative;
        overflow: hidden;
        padding: 20px;
    }

    /* Efek dekoratif background */
    .premium-login-wrapper::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
        top: -200px;
        right: -200px;
        border-radius: 50%;
    }
    .premium-login-wrapper::after {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, transparent 70%);
        bottom: -150px;
        left: -150px;
        border-radius: 50%;
    }

    /* === CARD LOGIN === */
    .premium-login-card {
        background: rgba(255, 255, 255, 0.98);
        width: 100%;
        max-width: 420px;
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        padding: 40px 35px;
        position: relative;
        z-index: 10;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* === HEADER === */
    .premium-header {
        text-align: center;
        margin-bottom: 35px;
    }
    .premium-header .app-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #071f61, #0c4aa6);
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
    }
    .premium-header .app-icon i {
        font-size: 28px;
        color: #fff;
    }
    .premium-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
        letter-spacing: -0.5px;
    }
    .premium-header p {
        font-size: 14px;
        color: #64748b;
        margin: 0;
    }

    /* === FORM INPUTS === */
    .premium-form-group {
        margin-bottom: 20px;
    }
    .premium-input-wrapper {
        position: relative;
    }
    .premium-input-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 16px;
        transition: color 0.3s;
    }
    .premium-form-group .form-control {
        width: 100%;
        padding: 14px 16px 14px 46px;
        font-size: 14px;
        color: #334155;
        background-color: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        transition: all 0.3s ease;
        height: auto;
        box-shadow: none;
    }
    .premium-form-group .form-control:focus {
        background-color: #fff;
        border-color: #071f61;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        outline: none;
    }
    .premium-form-group .form-control:focus + .premium-input-icon,
    .premium-input-wrapper:focus-within .premium-input-icon {
        color: #071f61;
    }
    .premium-form-group .form-control::placeholder {
        color: #94a3b8;
    }

    /* === CHECKBOX === */
    .premium-checkbox-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
    }
    .premium-checkbox-wrapper input[type="checkbox"] {
        width: 18px;
        height: 18px;
        margin-right: 10px;
        accent-color: #071f61;
        cursor: pointer;
    }
    .premium-checkbox-wrapper label {
        font-size: 13px;
        color: #475569;
        margin: 0;
        cursor: pointer;
        font-weight: 500;
    }

    /* === BUTTON === */
    .premium-btn-login {
        width: 100%;
        padding: 14px;
        font-size: 15px;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, #071f61, #0c4aa6);
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.3);
        letter-spacing: 0.3px;
    }
    .premium-btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
        background: linear-gradient(135deg, #071f61, #0c4aa6);
    }
    .premium-btn-login:active {
        transform: translateY(0);
    }

    /* === FOOTER === */
    .premium-footer {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }
    .premium-footer p {
        font-size: 12px;
        color: #94a3b8;
        margin: 0;
    }
    .premium-footer b {
        color: #64748b;
    }

    /* === RESPONSIVE (MOBILE) === */
    @media (max-width: 480px) {
        .premium-login-card {
            padding: 30px 20px;
            border-radius: 16px;
            max-width: 100%;
        }
        .premium-header h1 {
            font-size: 20px;
        }
        .premium-header .app-icon {
            width: 50px;
            height: 50px;
        }
        .premium-header .app-icon i {
            font-size: 22px;
        }
    }
</style>

<div class="premium-login-wrapper">
    <div class="premium-login-card">
        <!-- Header -->
        <div class="premium-header">
            <div class="app-icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <h1>DP3AKB PROVSU</h1>
            <p>Silakan masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- Form -->
        <?php $form = ActiveForm::begin([
            'id' => 'login-form', 
            'enableClientValidation' => false,
            'options' => ['class' => 'premium-form']
        ]); ?>

        <?= $form->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput([
                'placeholder' => 'Masukkan Username / NIP',
                'autocomplete' => 'username'
            ]) ?>

        <?= $form->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput([
                'placeholder' => 'Masukkan Password',
                'autocomplete' => 'current-password'
            ]) ?>

        <div class="premium-checkbox-wrapper">
            <?= $form->field($model, 'rememberMe', [
                'template' => "{input} {label}",
                'options' => ['style' => 'margin:0; display:flex; align-items:center;']
            ])->checkbox(['label' => ' '], false)->label('Ingat saya') ?>
        </div>

        <?= Html::submitButton('<i class="fa-solid fa-right-to-bracket" style="margin-right: 8px;"></i> Masuk ke Dashboard', [
            'class' => 'premium-btn-login', 
            'name' => 'login-button'
        ]) ?>

        <?php ActiveForm::end(); ?>

        <!-- Footer -->
        <div class="premium-footer">
            <p>Copyright &copy; <?=date('Y')?> <b>DP3AKB - PROVSU</b>. All rights reserved.</p>
        </div>
    </div>
</div>