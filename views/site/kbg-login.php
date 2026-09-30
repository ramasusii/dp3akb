<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/** @var app\models\LoginForm $model */

$this->title = 'Login Petugas KBG';
?>

<div class="kbg-mobile-login">

    <div class="kbg-login-card">

        <div class="kbg-login-hero">
            <div class="kbg-login-icon">
                <i class="fa fa-shield"></i>
            </div>

            <span class="kbg-login-eyebrow">
                Portal Internal Petugas
            </span>

            <h1>
                Kaji Cepat KBG
                <small>&amp; Audit Keselamatan</small>
            </h1>

            <p>
                Masuk menggunakan NIP dan password Petugas KBG yang telah
                diaktifkan oleh Admin Provinsi DP3AKB Sumatera Utara.
            </p>
        </div>


        <div class="kbg-login-body">

            <?php $form = ActiveForm::begin([
                'id' => 'kbg-login-form',
                'enableClientValidation' => true,
            ]); ?>

            <div class="kbg-login-field">
                <label>NIP</label>

                <div class="kbg-login-input">
                    <i class="fa fa-user"></i>

                    <?= $form
                        ->field($model, 'username')
                        ->label(false)
                        ->textInput([
                            'placeholder' => 'Masukkan NIP',
                            'autocomplete' => 'username',
                            'inputmode' => 'numeric',
                            'autocapitalize' => 'none',
                        ]) ?>
                </div>
            </div>


            <div class="kbg-login-field">
                <label>Password</label>

                <div class="kbg-login-input">
                    <i class="fa fa-lock"></i>

                    <?= $form
                        ->field($model, 'password')
                        ->label(false)
                        ->passwordInput([
                            'id' => 'kbgLoginPassword',
                            'placeholder' => 'Masukkan password',
                            'autocomplete' => 'current-password',
                        ]) ?>

                    <button
                        type="button"
                        class="kbg-password-toggle"
                        id="kbgPasswordToggle"
                        aria-label="Tampilkan password"
                    >
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>


            <div class="kbg-remember-row">
                <?= $form
                    ->field($model, 'rememberMe')
                    ->checkbox([
                        'label' => 'Tetap masuk di perangkat ini',
                    ]) ?>
            </div>


            <?= Html::submitButton(
                '<span>Masuk sebagai Petugas</span><i class="fa fa-arrow-right"></i>',
                [
                    'class' => 'kbg-login-submit',
                    'name' => 'login-button',
                ]
            ) ?>

            <?php ActiveForm::end(); ?>


            <div class="kbg-login-security">
                <i class="fa fa-lock"></i>

                <span>
                    Akses ini hanya untuk petugas berwenang.
                    Jangan membagikan akun atau data responden.
                </span>
            </div>

        </div>

    </div>

</div>


<style>
.kbg-mobile-login {
    width: 100%;
    max-width: 430px;
    margin: 0 auto;
}

.kbg-login-card {
    overflow: hidden;
    background: #fff;
    border: 1px solid #e1e8f0;
    border-radius: 25px;
    box-shadow:
        0 22px 55px rgba(28, 48, 79, .11);
}

.kbg-login-hero {
    position: relative;
    padding: 31px 27px 28px;
    overflow: hidden;
    color: #fff;
    background:
        radial-gradient(
            circle at 88% 12%,
            rgba(255,255,255,.14),
            transparent 25%
        ),
        linear-gradient(
            135deg,
            #071f61,
            #0d4ba8
        );
}

.kbg-login-hero::after {
    position: absolute;
    right: -45px;
    bottom: -78px;
    width: 180px;
    height: 180px;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 50%;
    content: "";
}

.kbg-login-icon {
    display: flex;
    width: 51px;
    height: 51px;
    margin-bottom: 18px;
    align-items: center;
    justify-content: center;
    color: #0b3f93;
    background: #fff;
    border-radius: 16px;
    box-shadow:
        0 10px 24px rgba(0,0,0,.16);
    font-size: 21px;
}

.kbg-login-eyebrow {
    display: block;
    margin-bottom: 8px;
    color: #f1c96d;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.15px;
    text-transform: uppercase;
}

.kbg-login-hero h1 {
    margin: 0 0 10px;
    color: #fff;
    font-size: 27px;
    font-weight: 820;
    line-height: 1.15;
}

.kbg-login-hero h1 small {
    display: block;
    margin-top: 4px;
    color: rgba(255,255,255,.82);
    font-size: 15px;
    font-weight: 650;
}

.kbg-login-hero p {
    max-width: 330px;
    margin: 0;
    color: rgba(255,255,255,.68);
    font-size: 11.5px;
    line-height: 1.7;
}

.kbg-login-body {
    padding: 25px 25px 22px;
}

.kbg-login-field {
    margin-bottom: 15px;
}

.kbg-login-field > label {
    display: block;
    margin-bottom: 7px;
    color: #34445b;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .25px;
}

.kbg-login-input {
    position: relative;
}

.kbg-login-input > i {
    position: absolute;
    top: 14px;
    left: 14px;
    z-index: 3;
    color: #8290a3;
    font-size: 13px;
}

.kbg-login-input .form-group {
    margin: 0;
}

.kbg-login-input .form-control {
    width: 100%;
    height: 44px;
    padding: 0 43px 0 39px;
    color: #2b3a4f;
    background: #f7f9fc;
    border: 1px solid #dfe6ef;
    border-radius: 12px;
    box-shadow: none;
    font-size: 12px;
}

.kbg-login-input .form-control:focus {
    background: #fff;
    border-color: #9bb9e5;
    box-shadow:
        0 0 0 4px rgba(13,75,168,.065);
}

.kbg-login-input .help-block {
    margin: 6px 0 0;
    color: #b53c4a;
    font-size: 9.5px;
}

.kbg-password-toggle {
    position: absolute;
    top: 5px;
    right: 6px;
    z-index: 5;
    display: flex;
    width: 34px;
    height: 34px;
    align-items: center;
    justify-content: center;
    color: #7e8b9e;
    background: transparent;
    border: 0;
    border-radius: 9px;
}

.kbg-password-toggle:hover {
    color: #0d4ba8;
    background: #edf4ff;
}

.kbg-remember-row {
    margin-top: 4px;
    margin-bottom: 16px;
}

.kbg-remember-row .form-group {
    margin: 0;
}

.kbg-remember-row label {
    color: #68768a;
    font-size: 10px;
    font-weight: 600;
}

.kbg-login-submit {
    display: flex;
    width: 100%;
    min-height: 46px;
    padding: 10px 14px;
    align-items: center;
    justify-content: center;
    gap: 10px;
    color: #fff;
    background:
        linear-gradient(
            135deg,
            #071f61,
            #1768d2
        );
    border: 0;
    border-radius: 13px;
    box-shadow:
        0 10px 22px rgba(13,75,168,.22);
    font-size: 11px;
    font-weight: 800;
    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.kbg-login-submit:hover,
.kbg-login-submit:focus {
    color: #fff;
    box-shadow:
        0 13px 28px rgba(13,75,168,.28);
    transform: translateY(-1px);
}

.kbg-login-security {
    display: flex;
    margin-top: 19px;
    padding: 12px;
    align-items: flex-start;
    gap: 9px;
    color: #738095;
    background: #f6f8fb;
    border: 1px solid #e8edf3;
    border-radius: 11px;
    font-size: 9.5px;
    line-height: 1.55;
}

.kbg-login-security i {
    margin-top: 2px;
    color: #0d4ba8;
}

@media (max-width: 480px) {
    .kbg-login-card {
        border-radius: 20px;
    }

    .kbg-login-hero {
        padding: 27px 22px 24px;
    }

    .kbg-login-body {
        padding: 22px 19px 19px;
    }
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var button = document.getElementById('kbgPasswordToggle');
    var input = document.getElementById('kbgLoginPassword');

    if (!button || !input) {
        return;
    }

    button.addEventListener('click', function () {
        var icon = button.querySelector('i');
        var isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';

        if (icon) {
            icon.className = isPassword
                ? 'fa fa-eye-slash'
                : 'fa fa-eye';
        }
    });
});
</script>
