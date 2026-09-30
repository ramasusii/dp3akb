<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/** @var yii\base\DynamicModel $model */
/** @var app\models\KbgPetugas $petugas */

$this->title = 'Buat Password Baru';
?>

<div class="kbg-password-page">
    <div class="kbg-password-card">
        <div class="kbg-password-icon">
            <i class="fa fa-lock"></i>
        </div>

        <span class="kbg-password-kicker">
            Login Pertama
        </span>

        <h1>Buat password pribadi</h1>

        <p class="kbg-password-intro">
            Halo <strong><?= Html::encode($petugas->getDisplayName()) ?></strong>.
            Sebelum mulai melakukan pendataan, ganti password sementara
            dengan password yang hanya Anda ketahui.
        </p>

        <div class="kbg-password-identity">
            <span>
                <i class="fa fa-id-card-o"></i>
                NIP
            </span>
            <strong><?= Html::encode($petugas->getNip()) ?></strong>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'kbg-change-password-form',
        ]); ?>

            <div class="kbg-password-field">
                <label>Password Baru</label>
                <div class="kbg-password-input">
                    <i class="fa fa-key"></i>
                    <?= $form
                        ->field($model, 'password')
                        ->label(false)
                        ->passwordInput([
                            'id' => 'newPassword',
                            'placeholder' => 'Minimal 8 karakter',
                            'autocomplete' => 'new-password',
                        ]) ?>
                    <button type="button" class="toggle-password" data-target="newPassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="kbg-password-field">
                <label>Ulangi Password Baru</label>
                <div class="kbg-password-input">
                    <i class="fa fa-check-circle"></i>
                    <?= $form
                        ->field($model, 'password_repeat')
                        ->label(false)
                        ->passwordInput([
                            'id' => 'repeatPassword',
                            'placeholder' => 'Ketik ulang password',
                            'autocomplete' => 'new-password',
                        ]) ?>
                    <button type="button" class="toggle-password" data-target="repeatPassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="kbg-password-note">
                <i class="fa fa-shield"></i>
                <span>
                    Gunakan minimal 8 karakter dan jangan bagikan password
                    kepada orang lain.
                </span>
            </div>

            <button type="submit" class="kbg-password-submit">
                Simpan Password &amp; Masuk
                <i class="fa fa-arrow-right"></i>
            </button>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
.kbg-password-page {
    display: flex;
    min-height: calc(100vh - 170px);
    padding: 18px 0;
    align-items: center;
    justify-content: center;
}
.kbg-password-card {
    width: min(100%, 440px);
    padding: 28px 24px;
    background: #fff;
    border: 1px solid #e1e8f1;
    border-radius: 22px;
    box-shadow: 0 18px 50px rgba(18,42,83,.09);
}
.kbg-password-icon {
    display: flex;
    width: 52px;
    height: 52px;
    margin-bottom: 16px;
    align-items: center;
    justify-content: center;
    color: #fff;
    background: linear-gradient(135deg, #071f61, #1768d2);
    border-radius: 16px;
    box-shadow: 0 10px 22px rgba(7,31,97,.19);
    font-size: 20px;
}
.kbg-password-kicker {
    display: block;
    margin-bottom: 6px;
    color: #0c4c9e;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.kbg-password-card h1 {
    margin: 0 0 9px;
    color: #23344b;
    font-size: 24px;
    font-weight: 800;
    line-height: 1.2;
}
.kbg-password-intro {
    margin: 0 0 17px;
    color: #748195;
    font-size: 11.5px;
    line-height: 1.7;
}
.kbg-password-identity {
    display: flex;
    margin-bottom: 20px;
    padding: 11px 13px;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    background: #f3f7fd;
    border: 1px solid #dce7f6;
    border-radius: 12px;
}
.kbg-password-identity span {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #77869a;
    font-size: 9.5px;
    font-weight: 700;
}
.kbg-password-identity strong {
    color: #183d73;
    font-size: 11px;
}
.kbg-password-field { margin-bottom: 14px; }
.kbg-password-field > label {
    display: block;
    margin-bottom: 6px;
    color: #42526a;
    font-size: 10px;
    font-weight: 800;
}
.kbg-password-input { position: relative; }
.kbg-password-input > i {
    position: absolute;
    top: 14px;
    left: 14px;
    z-index: 3;
    color: #8492a5;
    font-size: 12px;
}
.kbg-password-input .form-group { margin: 0; }
.kbg-password-input .form-control {
    height: 44px;
    padding: 0 43px 0 39px;
    background: #f8fafc;
    border: 1px solid #dce4ed;
    border-radius: 12px;
    box-shadow: none;
    font-size: 12px;
}
.kbg-password-input .form-control:focus {
    background: #fff;
    border-color: #8fb0df;
    box-shadow: 0 0 0 3px rgba(13,79,168,.07);
}
.toggle-password {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 4;
    width: 34px;
    height: 34px;
    color: #718096;
    background: transparent;
    border: 0;
    border-radius: 9px;
}
.kbg-password-note {
    display: flex;
    margin: 5px 0 18px;
    padding: 11px 12px;
    align-items: flex-start;
    gap: 8px;
    color: #5f6f84;
    background: #f7f9fc;
    border-radius: 11px;
    font-size: 9.5px;
    line-height: 1.55;
}
.kbg-password-note i { margin-top: 2px; color: #0d4fa8; }
.kbg-password-submit {
    display: flex;
    width: 100%;
    min-height: 46px;
    padding: 10px 16px;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: #fff;
    background: linear-gradient(135deg, #071f61, #1768d2);
    border: 0;
    border-radius: 12px;
    box-shadow: 0 10px 22px rgba(7,31,97,.18);
    font-size: 11px;
    font-weight: 800;
}
.kbg-password-field .help-block {
    margin: 5px 2px 0;
    font-size: 9px;
}
@media (max-width: 480px) {
    .kbg-password-page { min-height: calc(100vh - 145px); padding: 8px 0; align-items: flex-start; }
    .kbg-password-card { padding: 23px 17px; border-radius: 18px; }
    .kbg-password-card h1 { font-size: 21px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-password').forEach(function (button) {
        button.addEventListener('click', function () {
            var input = document.getElementById(this.dataset.target);
            var icon = this.querySelector('i');

            if (!input) {
                return;
            }

            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fa fa-eye';
            }
        });
    });
});
</script>
