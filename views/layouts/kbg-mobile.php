<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\KbgPetugas;

dmstr\web\AdminLteAsset::register($this);

$isGuest = Yii::$app->user->isGuest;
$identity = $isGuest ? null : Yii::$app->user->identity;
$userName = '';

if ($identity !== null) {
    $petugasIdentity = KbgPetugas::current();

    if ($petugasIdentity !== null) {
        $userName = $petugasIdentity->getDisplayName();
    } else {
        $userName = (string) $identity->username;
    }
}

$actionId = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Html::encode(Yii::$app->language) ?>">
<head>
    <meta charset="<?= Html::encode(Yii::$app->charset) ?>">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover"
    >
    <meta name="theme-color" content="#082b6f">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title ?: 'Kaji Cepat KBG') ?></title>

    <link
        href="<?= Yii::$app->request->baseUrl ?>/web/img/logo.png"
        rel="icon"
    >

    <?php $this->head() ?>

    <style>
        :root {
            --kbg-app-navy: #071f61;
            --kbg-app-blue: #0d4ba8;
            --kbg-app-blue-2: #1768d2;
            --kbg-app-bg: #f4f7fb;
            --kbg-app-text: #25334a;
            --kbg-app-muted: #79869a;
            --kbg-app-border: #e4eaf2;
            --kbg-app-white: #ffffff;
            --kbg-app-gold: #efb84d;
        }

        html,
        body {
            min-height: 100%;
            background: var(--kbg-app-bg);
        }

        body.kbg-mobile-app {
            margin: 0;
            color: var(--kbg-app-text);
            background:
                radial-gradient(
                    circle at 100% 0,
                    rgba(23, 104, 210, .08),
                    transparent 280px
                ),
                var(--kbg-app-bg);
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Arial,
                sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .kbg-mobile-app * {
            box-sizing: border-box;
        }

        .kbg-app-header {
            position: sticky;
            top: 0;
            z-index: 1040;
            background:
                linear-gradient(
                    135deg,
                    var(--kbg-app-navy),
                    var(--kbg-app-blue)
                );
            box-shadow:
                0 7px 24px rgba(7, 31, 97, .16);
        }

        .kbg-app-header-inner {
            display: flex;
            width: min(100%, 980px);
            min-height: 64px;
            margin: 0 auto;
            padding:
                max(9px, env(safe-area-inset-top))
                16px
                9px;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .kbg-app-brand {
            display: flex;
            min-width: 0;
            align-items: center;
            gap: 10px;
            color: #fff !important;
            text-decoration: none !important;
        }

        .kbg-app-logo {
            display: flex;
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            align-items: center;
            justify-content: center;
            padding: 4px;
            overflow: hidden;
            background: rgba(255,255,255,.96);
            border-radius: 13px;
            box-shadow: 0 7px 16px rgba(0,0,0,.13);
        }

        .kbg-app-logo img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .kbg-app-brand-copy {
            min-width: 0;
        }

        .kbg-app-brand-copy strong {
            display: block;
            overflow: hidden;
            color: #fff;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.2;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .kbg-app-brand-copy span {
            display: block;
            margin-top: 2px;
            overflow: hidden;
            color: rgba(255,255,255,.66);
            font-size: 9px;
            font-weight: 650;
            letter-spacing: .25px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .kbg-app-user {
            display: flex;
            min-width: 0;
            align-items: center;
            gap: 8px;
        }

        .kbg-online-dot {
            display: block;
            width: 8px;
            height: 8px;
            flex: 0 0 8px;
            background: #65d58b;
            border: 2px solid rgba(255,255,255,.38);
            border-radius: 50%;
            box-shadow: 0 0 0 3px rgba(101,213,139,.13);
        }

        .kbg-online-dot.offline {
            background: #f0ad4e;
            box-shadow: 0 0 0 3px rgba(240,173,78,.13);
        }

        .kbg-user-copy {
            min-width: 0;
            max-width: 150px;
            text-align: right;
        }

        .kbg-user-copy strong,
        .kbg-user-copy span {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .kbg-user-copy strong {
            color: #fff;
            font-size: 10.5px;
            font-weight: 750;
        }

        .kbg-user-copy span {
            margin-top: 1px;
            color: rgba(255,255,255,.6);
            font-size: 8.5px;
        }

        .kbg-app-content {
            width: min(100%, 980px);
            min-height: calc(100vh - 64px);
            margin: 0 auto;
            padding: 18px 16px 104px;
        }

        .kbg-app-content.kbg-login-content {
            display: flex;
            min-height: calc(100vh - 64px);
            padding-bottom: 35px;
            align-items: center;
            justify-content: center;
        }

        .kbg-app-bottom {
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            padding-bottom: env(safe-area-inset-bottom);
            background: rgba(255,255,255,.97);
            border-top: 1px solid #e1e8f0;
            box-shadow:
                0 -9px 28px rgba(30, 51, 84, .08);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .kbg-app-bottom-inner {
            display: grid;
            width: min(100%, 620px);
            min-height: 65px;
            margin: 0 auto;
            grid-template-columns: repeat(4, 1fr);
            align-items: stretch;
        }

        .kbg-bottom-link,
        .kbg-bottom-form button {
            display: flex;
            width: 100%;
            height: 65px;
            padding: 8px 4px 6px;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 4px;
            color: #8995a6 !important;
            background: transparent;
            border: 0;
            outline: 0;
            font-size: 9px;
            font-weight: 700;
            text-decoration: none !important;
        }

        .kbg-bottom-link i,
        .kbg-bottom-form button i {
            font-size: 19px;
        }

        .kbg-bottom-link.active {
            color: var(--kbg-app-blue) !important;
        }

        .kbg-bottom-main {
            position: relative;
        }

        .kbg-bottom-main i {
            display: flex;
            width: 42px;
            height: 42px;
            margin-top: -22px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background:
                linear-gradient(
                    135deg,
                    var(--kbg-app-navy),
                    var(--kbg-app-blue-2)
                );
            border: 5px solid #fff;
            border-radius: 50%;
            box-shadow: 0 8px 20px rgba(13,75,168,.25);
            font-size: 17px;
        }

        .kbg-bottom-main span {
            margin-top: 1px;
            color: var(--kbg-app-blue);
        }

        .kbg-bottom-form {
            margin: 0;
        }

        /* Override style modul lama ketika dipakai pada portal petugas */
        .kbg-mobile-app .kbg-page {
            width: 100%;
            margin: 0 !important;
            padding: 0 0 24px !important;
        }

        .kbg-mobile-app .kbg-form-shell {
            max-width: 920px;
        }

        .kbg-mobile-app .kbg-topbar {
            margin-bottom: 14px;
        }

        .kbg-mobile-app .kbg-stepper-wrap {
            scrollbar-width: none;
        }

        .kbg-mobile-app .kbg-stepper-wrap::-webkit-scrollbar {
            display: none;
        }

        .kbg-mobile-app .kbg-card,
        .kbg-mobile-app .kbg-form-card,
        .kbg-mobile-app .kbg-filter-card,
        .kbg-mobile-app .kbg-table-card {
            box-shadow:
                0 9px 27px rgba(26, 46, 78, .055);
        }

        @media (max-width: 767px) {
            .kbg-app-header-inner {
                min-height: 60px;
                padding-right: 13px;
                padding-left: 13px;
            }

            .kbg-app-logo {
                width: 38px;
                height: 38px;
                flex-basis: 38px;
                border-radius: 12px;
            }

            .kbg-app-brand-copy strong {
                font-size: 11.5px;
            }

            .kbg-app-brand-copy span {
                font-size: 8px;
            }

            .kbg-user-copy {
                max-width: 95px;
            }

            .kbg-app-content {
                padding: 14px 12px 96px;
            }

            .kbg-mobile-app .kbg-title-block h1 {
                font-size: 21px;
                line-height: 1.3;
            }

            .kbg-mobile-app .kbg-title-block p {
                font-size: 11.5px;
            }

            .kbg-mobile-app .kbg-actions {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 8px;
            }

            .kbg-mobile-app .kbg-actions .kbg-btn {
                width: 100%;
                min-height: 40px;
                padding: 9px 10px;
                font-size: 10px;
            }

            .kbg-mobile-app .kbg-stepper {
                min-width: 690px;
            }

            .kbg-mobile-app .kbg-question {
                margin-bottom: 10px;
                padding: 13px 12px;
                border-radius: 12px;
            }

            .kbg-mobile-app .kbg-question-label {
                font-size: 11.5px;
            }

            .kbg-mobile-app .kbg-control {
                min-height: 42px;
                font-size: 12px;
            }

            .kbg-mobile-app textarea.kbg-control {
                min-height: 96px;
            }

            .kbg-mobile-app .kbg-choice span {
                min-height: 39px;
                padding: 8px 11px;
                font-size: 10.5px;
            }

            .kbg-mobile-app .kbg-form-footer {
                position: sticky;
                bottom: 75px;
                z-index: 10;
                background: rgba(255,255,255,.97);
                box-shadow:
                    0 -7px 20px rgba(26,46,78,.06);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
        }

        @media (max-width: 420px) {
            .kbg-user-copy {
                display: none;
            }

            .kbg-online-dot {
                margin-right: 4px;
            }

            .kbg-app-content {
                padding-right: 10px;
                padding-left: 10px;
            }
        }
    </style>
</head>

<body class="kbg-mobile-app">
<?php $this->beginBody() ?>

<header class="kbg-app-header">
    <div class="kbg-app-header-inner">

        <a
            class="kbg-app-brand"
            href="<?= Url::to($isGuest ? ['/site/kbg-login'] : ['/kbg/index']) ?>"
        >
            <span class="kbg-app-logo">
                <img
                    src="<?= Yii::$app->request->baseUrl ?>/web/img/logo.png"
                    alt="DP3AKB"
                >
            </span>

            <span class="kbg-app-brand-copy">
                <strong>Kaji Cepat KBG</strong>
                <span>DP3AKB Provinsi Sumatera Utara</span>
            </span>
        </a>

        <?php if (!$isGuest): ?>
            <div class="kbg-app-user">
                <span
                    id="kbgOnlineIndicator"
                    class="kbg-online-dot"
                    title="Status jaringan"
                ></span>

                <span class="kbg-user-copy">
                    <strong><?= Html::encode($userName) ?></strong>
                    <span>Petugas lapangan</span>
                </span>
            </div>
        <?php endif; ?>

    </div>
</header>


<main class="kbg-app-content <?= $isGuest ? 'kbg-login-content' : '' ?>">
    <?= $content ?>
</main>


<?php if (!$isGuest): ?>
    <nav
        class="kbg-app-bottom"
        aria-label="Navigasi Petugas KBG"
    >
        <div class="kbg-app-bottom-inner">

            <a
                class="kbg-bottom-link <?= $actionId === 'index' ? 'active' : '' ?>"
                href="<?= Url::to(['/kbg/index']) ?>"
            >
                <i class="fa fa-home"></i>
                <span>Beranda</span>
            </a>

            <a
                class="kbg-bottom-link kbg-bottom-main <?= in_array($actionId, ['create', 'form'], true) ? 'active' : '' ?>"
                href="<?= Url::to(['/kbg/create']) ?>"
            >
                <i class="fa fa-plus"></i>
                <span>Assessment</span>
            </a>

            <a
                class="kbg-bottom-link <?= $actionId === 'map' ? 'active' : '' ?>"
                href="<?= Url::to(['/kbg/map']) ?>"
            >
                <i class="fa fa-map-marker"></i>
                <span>Peta Saya</span>
            </a>

            <?= Html::beginForm(
                ['/site/kbg-logout'],
                'post',
                ['class' => 'kbg-bottom-form']
            ) ?>
                <button type="submit">
                    <i class="fa fa-sign-out"></i>
                    <span>Keluar</span>
                </button>
            <?= Html::endForm() ?>

        </div>
    </nav>
<?php endif; ?>


<script>
(function () {
    var indicator = document.getElementById('kbgOnlineIndicator');

    if (!indicator) {
        return;
    }

    function updateNetworkStatus() {
        if (navigator.onLine) {
            indicator.classList.remove('offline');
            indicator.title = 'Perangkat online';
        } else {
            indicator.classList.add('offline');
            indicator.title = 'Perangkat sedang offline';
        }
    }

    window.addEventListener('online', updateNetworkStatus);
    window.addEventListener('offline', updateNetworkStatus);

    updateNetworkStatus();
})();
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
