<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/** @var app\models\KbgAssessment[] $models */
/** @var bool $isManager */

$this->title = 'Peta Assessment KBG';

echo $this->render('_styles');

$points = [];

foreach ($models as $model) {
    if ($model->latitude === null || $model->longitude === null) {
        continue;
    }

    $points[] = [
        'id' => (int) $model->id,
        'kode' => $model->kode,
        'site' => $model->site_name ?: 'Pos tanpa nama',
        'village' => $model->village,
        'district' => $model->district,
        'regency' => $model->regency,
        'province' => $model->province,
        'lat' => (float) $model->latitude,
        'lng' => (float) $model->longitude,
        'risk' => $model->risk_level,
        'critical' => (int) $model->critical_count,
        'attention' => (int) $model->attention_count,
        'status' => $model->getStatusLabel(),
        'url' => Url::to(['view', 'id' => $model->id]),
    ];
}
?>

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIINfQ3fP8QYgANblh5Q8A0Y4qA0fYbVw0U="
    crossorigin=""
>

<style>
.kbg-map-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 300px;
    gap: 15px;
    align-items: stretch;
}
.kbg-map-side {
    max-height: 626px;
    overflow-y: auto;
    padding: 10px;
}
.kbg-map-item {
    display: block;
    margin-bottom: 8px;
    padding: 11px;
    color: inherit !important;
    background: #fff;
    border: 1px solid #e3e9f1;
    border-radius: 11px;
    text-decoration: none !important;
    transition: .2s ease;
}
.kbg-map-item:hover {
    border-color: #c9d8ed;
    box-shadow: 0 7px 18px rgba(13,75,168,.07);
}
.kbg-map-item:last-child {
    margin-bottom: 0;
}
.kbg-map-item strong {
    display:block;
    color:#29384e;
    font-size:11px;
}
.kbg-map-item small {
    display:block;
    margin-top:3px;
    color:#7f8a9a;
    font-size:9px;
    line-height:1.45;
}
.kbg-map-marker {
    display:flex;
    width:28px;
    height:28px;
    align-items:center;
    justify-content:center;
    color:#fff;
    border:3px solid rgba(255,255,255,.95);
    border-radius:50%;
    box-shadow:0 3px 10px rgba(0,0,0,.25);
}
.kbg-map-marker.critical { background:#c94455; }
.kbg-map-marker.attention { background:#d99321; }
.kbg-map-marker.monitor { background:#377fbf; }
.kbg-map-marker.normal { background:#24936e; }
.kbg-popup h4 {
    margin:0 0 5px;
    color:#26354a;
    font-size:13px;
}
.kbg-popup p {
    margin:0 0 6px;
    color:#6f7b8b;
    font-size:10px;
    line-height:1.45;
}
.kbg-popup a {
    color:#0d4ba8;
    font-size:10px;
    font-weight:700;
}
@media(max-width: 991px) {
    .kbg-map-layout {
        grid-template-columns: 1fr;
    }
    .kbg-map-side {
        max-height:none;
        display:grid;
        grid-template-columns:repeat(2,minmax(0,1fr));
        gap:8px;
    }
    .kbg-map-item {
        margin:0;
    }
}
@media(max-width: 600px) {
    .kbg-map-side {
        grid-template-columns:1fr;
    }
}
</style>

<div class="kbg-page">

    <div class="kbg-topbar">
        <div class="kbg-title-block">
            <div class="eyebrow">
                <i class="fa fa-map-marker"></i>
                Pemetaan Pos Pengungsian
            </div>

            <h1>Peta Assessment KBG</h1>

            <p>
                Menampilkan assessment yang sudah memiliki koordinat.
                Warna marker mengikuti indikator perhatian sistem.
            </p>
        </div>

        <div class="kbg-actions">
            <?= Html::a(
                '<i class="fa fa-list"></i> Daftar Assessment',
                ['index'],
                ['class' => 'kbg-btn kbg-btn-light']
            ) ?>

            <?= Html::a(
                '<i class="fa fa-plus"></i> Assessment Baru',
                ['create'],
                ['class' => 'kbg-btn kbg-btn-primary']
            ) ?>
        </div>
    </div>


    <div class="kbg-map-legend kbg-card">
        <div>
            <strong
                style="display:block;color:#2d3b50;font-size:12px;"
            >
                <?= count($points) ?> titik assessment
            </strong>

            <span
                style="color:#8390a0;font-size:9.5px;"
            >
                Klik marker untuk membuka detail assessment.
            </span>
        </div>

        <div class="kbg-legend-items">
            <span class="kbg-legend-item">
                <i
                    class="kbg-legend-dot"
                    style="background:#c94455;"
                ></i>
                Perlu Tindak Lanjut
            </span>

            <span class="kbg-legend-item">
                <i
                    class="kbg-legend-dot"
                    style="background:#d99321;"
                ></i>
                Perlu Perhatian
            </span>

            <span class="kbg-legend-item">
                <i
                    class="kbg-legend-dot"
                    style="background:#377fbf;"
                ></i>
                Terpantau
            </span>

            <span class="kbg-legend-item">
                <i
                    class="kbg-legend-dot"
                    style="background:#24936e;"
                ></i>
                Belum Ada Flag
            </span>
        </div>
    </div>


    <?php if (empty($points)): ?>

        <div class="kbg-card kbg-empty">
            <div class="kbg-empty-icon">
                <i class="fa fa-map-marker"></i>
            </div>

            <h3>Belum ada titik lokasi</h3>

            <p>
                Koordinat dapat diambil langsung dari perangkat
                pada Tahap 3 formulir assessment.
            </p>
        </div>

    <?php else: ?>

        <div class="kbg-map-layout">

            <div class="kbg-map-card kbg-card">
                <div id="kbgMap"></div>
            </div>

            <div class="kbg-map-side kbg-card">

                <?php foreach ($models as $model): ?>

                    <?php if (
                        $model->latitude === null
                        || $model->longitude === null
                    ) {
                        continue;
                    } ?>

                    <a
                        href="<?= Url::to([
                            'view',
                            'id' => $model->id,
                        ]) ?>"
                        class="kbg-map-item"
                    >
                        <strong>
                            <?= Html::encode(
                                $model->site_name
                                ?: $model->kode
                            ) ?>
                        </strong>

                        <small>
                            <?= Html::encode(
                                trim(
                                    ($model->village ?: '')
                                    . ' · '
                                    . ($model->regency ?: ''),
                                    ' ·'
                                )
                            ) ?>
                        </small>

                        <div
                            style="display:flex;gap:5px;flex-wrap:wrap;margin-top:7px;"
                        >
                            <span
                                class="kbg-badge kbg-badge-<?= Html::encode(
                                    $model->getRiskClass()
                                ) ?>"
                            >
                                <?= Html::encode($model->risk_level) ?>
                            </span>

                            <span
                                class="kbg-badge kbg-badge-<?= Html::encode(
                                    $model->getStatusClass()
                                ) ?>"
                            >
                                <?= Html::encode(
                                    $model->getStatusLabel()
                                ) ?>
                            </span>
                        </div>
                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    <?php endif; ?>


    <div
        class="kbg-card"
        style="margin-top:14px;padding:12px 14px;color:#758195;font-size:9.5px;line-height:1.55;"
    >
        <i
            class="fa fa-info-circle"
            style="color:#0d4ba8;margin-right:5px;"
        ></i>
        Peta digunakan untuk membantu visualisasi lokasi assessment.
        Indikator warna bukan penetapan kasus dan tetap memerlukan
        peninjauan/verifikasi petugas.
    </div>

</div>


<?php if (!empty($points)): ?>

<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""
></script>

<script>
(function () {
    var points = <?= Json::htmlEncode($points) ?>;

    var map = L.map('kbgMap', {
        scrollWheelZoom: false
    });

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution:
                '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);

    var bounds = [];

    function markerClass(risk) {
        if (risk === 'Perlu Tindak Lanjut') {
            return 'critical';
        }

        if (risk === 'Perlu Perhatian') {
            return 'attention';
        }

        if (risk === 'Terpantau') {
            return 'monitor';
        }

        return 'normal';
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    points.forEach(function (point) {
        var icon = L.divIcon({
            className: '',
            html:
                '<div class="kbg-map-marker '
                + markerClass(point.risk)
                + '"><i class="fa fa-map-marker"></i></div>',
            iconSize: [28, 28],
            iconAnchor: [14, 28]
        });

        var marker = L.marker(
            [point.lat, point.lng],
            {icon: icon}
        ).addTo(map);

        marker.bindPopup(
            '<div class="kbg-popup">'
            + '<h4>' + escapeHtml(point.site) + '</h4>'
            + '<p>'
            + escapeHtml(point.village || '')
            + (point.regency ? ' · ' + escapeHtml(point.regency) : '')
            + '<br>'
            + escapeHtml(point.risk)
            + ' · ' + escapeHtml(point.status)
            + '</p>'
            + '<a href="' + escapeHtml(point.url) + '">'
            + 'Buka detail assessment'
            + '</a>'
            + '</div>'
        );

        bounds.push([point.lat, point.lng]);
    });

    if (bounds.length === 1) {
        map.setView(bounds[0], 14);
    } else {
        map.fitBounds(bounds, {
            padding: [35, 35]
        });
    }
})();
</script>

<?php endif; ?>
