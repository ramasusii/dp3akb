<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

/** @var app\models\KbgAssessment $model */
/** @var int $step */
/** @var array $section */
/** @var array $sections */
/** @var array $answerMap */

$this->title = 'Kaji Cepat KBG - ' . $section['title'];

echo $this->render('_styles');

$subheadings = [
    2 => [
        'q6_1' => 'Komposisi Pengungsi menurut Jenis Kelamin & Usia',
        'q6_2' => 'Kepala Keluarga & Kehamilan',
        'q6_5a' => 'Jumlah Penyandang Disabilitas menurut Jenis',
        'q6_6a' => 'Penyandang Disabilitas menurut Jenis Kelamin & Usia',
    ],
    4 => [
        'q3_1' => 'Pengelolaan Pos & Bantuan',
        'q3_7' => 'Sistem Keamanan',
        'q3_8' => 'Aktivitas, Kebosanan & Kekhawatiran',
        'q3_11a' => 'Jarak Akses Layanan',
        'q3_12a' => 'Keamanan Akses Layanan',
    ],
    5 => [
        'q4_1' => 'Ruang & Fasilitas Dasar',
        'q4_7' => 'Akses Air Bersih',
        'q4_10' => 'Kamar Mandi & Jamban/WC',
        'q4_13a' => 'Penerangan',
    ],
    6 => [
        'q5_1' => 'Rasa Aman & Kejadian KBG',
        'q5_8' => 'Pencegahan & Potensi Risiko',
        'q5_10_pre' => 'Perkawinan Anak',
        'q5_11a' => 'Ketersediaan Layanan KBG',
    ],
    7 => [
        'q5_12a' => 'Keberfungsian Layanan Pascabencana',
        'q5_13' => 'Catatan Tambahan',
    ],
];
?>

<div class="kbg-page">
    <div class="kbg-form-shell">

        <div class="kbg-topbar">
            <div class="kbg-title-block">
                <div class="eyebrow">
                    <i class="fa fa-shield"></i>
                    Kaji Cepat KBG & Audit Keselamatan
                </div>

                <h1><?= Html::encode($section['title']) ?></h1>

                <p>
                    Isi data sesuai hasil wawancara dan observasi lapangan.
                    Draft tersimpan otomatis selama perangkat terhubung ke jaringan.
                </p>
            </div>

            <div class="kbg-actions">
                <?= Html::a(
                    '<i class="fa fa-eye"></i> Tinjau',
                    ['view', 'id' => $model->id],
                    ['class' => 'kbg-btn kbg-btn-light']
                ) ?>

                <?= Html::a(
                    '<i class="fa fa-list"></i> Daftar',
                    ['index'],
                    ['class' => 'kbg-btn kbg-btn-light']
                ) ?>
            </div>
        </div>


        <div class="kbg-form-hero">
            <h2>
                <?= Html::encode($model->kode) ?>
            </h2>

            <p>
                <?= Html::encode($section['description']) ?>
            </p>

            <div class="kbg-form-meta">
                <span>
                    <i class="fa fa-user"></i>
                    <?= Html::encode($model->enumerator_name ?: '-') ?>
                </span>

                <span>
                    <i class="fa fa-map-marker"></i>
                    <?= Html::encode($model->site_name ?: 'Lokasi belum diisi') ?>
                </span>

                <span>
                    <i class="fa fa-clock-o"></i>
                    Status: <?= Html::encode($model->getStatusLabel()) ?>
                </span>
            </div>
        </div>


        <div class="kbg-progress-card kbg-card">
            <div class="kbg-progress-card-head">
                <span>Progress keseluruhan instrumen</span>
                <strong id="kbgProgressText">
                    <?= (int) $model->progress_percent ?>%
                </strong>
            </div>

            <div class="kbg-progress-track">
                <div
                    id="kbgProgressFill"
                    class="kbg-progress-fill"
                    style="width: <?= (int) $model->progress_percent ?>%;"
                ></div>
            </div>
        </div>


        <div class="kbg-stepper-wrap">
            <div class="kbg-stepper">

                <?php foreach ($sections as $item): ?>

                    <?php
                    $itemStep = (int) $item['step'];
                    $state = '';

                    if ($itemStep === $step) {
                        $state = 'active';
                    } elseif ($itemStep < $step) {
                        $state = 'done';
                    }
                    ?>

                    <div class="kbg-step-item <?= $state ?>">
                        <a
                            class="kbg-step-link"
                            href="<?= Url::to([
                                'form',
                                'id' => $model->id,
                                'step' => $itemStep,
                            ]) ?>"
                        >
                            <span class="kbg-step-number">
                                <?php if ($itemStep < $step): ?>
                                    <i class="fa fa-check"></i>
                                <?php else: ?>
                                    <?= $itemStep ?>
                                <?php endif; ?>
                            </span>

                            <span class="kbg-step-copy">
                                <strong>
                                    <?= Html::encode($item['short']) ?>
                                </strong>

                                <small>
                                    Tahap <?= $itemStep ?>
                                </small>
                            </span>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>


        <div class="kbg-privacy-note">
            <i class="fa fa-lock"></i>

            <div>
                <strong>Data internal dan terbatas.</strong>
                Nama responden dan jawaban terkait kejadian kekerasan
                hanya digunakan untuk kebutuhan pendataan dan tindak lanjut
                yang berwenang. Jangan membagikan tangkapan layar atau detail
                responden melalui kanal publik.
            </div>
        </div>


        <div class="kbg-form-card kbg-card">

            <div class="kbg-form-card-head">

                <div class="kbg-section-title">
                    <div class="kbg-section-icon">
                        <i class="fa <?= Html::encode($section['icon']) ?>"></i>
                    </div>

                    <div>
                        <span>
                            Tahap <?= (int) $step ?>
                            dari <?= app\models\KbgQuestionnaire::TOTAL_STEPS ?>
                        </span>

                        <h3>
                            <?= Html::encode($section['title']) ?>
                        </h3>
                    </div>
                </div>

                <div
                    id="kbgAutosaveStatus"
                    class="kbg-autosave"
                >
                    <i class="fa fa-cloud"></i>
                    <span>Siap menyimpan</span>
                </div>

            </div>


            <?= Html::beginForm(
                ['save', 'id' => $model->id, 'step' => $step],
                'post',
                [
                    'id' => 'kbgAssessmentForm',
                    'autocomplete' => 'off',
                ]
            ) ?>

            <?= Html::hiddenInput(
                Yii::$app->request->csrfParam,
                Yii::$app->request->csrfToken
            ) ?>


            <div class="kbg-form-body">

                <?php if ($step === 3): ?>

                    <div class="kbg-location-tools">
                        <div>
                            <strong>
                                <i class="fa fa-crosshairs"></i>
                                Titik Lokasi Pos Pengungsian
                            </strong>

                            <p>
                                Izinkan browser mengakses lokasi perangkat
                                untuk mengisi koordinat secara otomatis.
                            </p>

                            <span
                                id="kbgLocationStatus"
                                class="kbg-location-status"
                            >
                                Koordinat juga dapat diisi manual.
                            </span>
                        </div>

                        <button
                            type="button"
                            id="kbgGetLocation"
                            class="kbg-btn kbg-btn-primary"
                        >
                            <i class="fa fa-location-arrow"></i>
                            Ambil Lokasi
                        </button>
                    </div>

                <?php endif; ?>


                <div class="row">

                    <?php foreach ($section['questions'] as $question): ?>

                        <?php
                        if (isset(
                            $subheadings[$step][$question['key']]
                        )):
                        ?>

                            <div class="col-md-12">
                                <div class="kbg-subheading">
                                    <i class="fa fa-angle-right"></i>
                                    <?= Html::encode(
                                        $subheadings[$step][$question['key']]
                                    ) ?>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?= $this->render('_question', [
                            'question' => $question,
                            'answerMap' => $answerMap,
                        ]) ?>

                    <?php endforeach; ?>

                </div>

            </div>


            <div class="kbg-form-footer">

                <div class="kbg-footer-group">

                    <?php if ($step > 1): ?>
                        <button
                            type="submit"
                            name="nav_action"
                            value="previous"
                            class="kbg-btn kbg-btn-light"
                        >
                            <i class="fa fa-arrow-left"></i>
                            Sebelumnya
                        </button>
                    <?php endif; ?>

                </div>


                <div class="kbg-footer-group">

                    <button
                        type="submit"
                        name="nav_action"
                        value="<?= $step >= app\models\KbgQuestionnaire::TOTAL_STEPS
                            ? 'review'
                            : 'next' ?>"
                        class="kbg-btn kbg-btn-primary"
                    >
                        <?php if (
                            $step >= app\models\KbgQuestionnaire::TOTAL_STEPS
                        ): ?>
                            Simpan & Tinjau
                            <i class="fa fa-check-circle"></i>
                        <?php else: ?>
                            Simpan & Lanjutkan
                            <i class="fa fa-arrow-right"></i>
                        <?php endif; ?>
                    </button>

                </div>

            </div>

            <?= Html::endForm() ?>

        </div>

    </div>
</div>


<script>
(function () {
    var form = document.getElementById('kbgAssessmentForm');
    var autosaveStatus = document.getElementById('kbgAutosaveStatus');
    var autosaveUrl = <?= Json::htmlEncode(Url::to([
        'autosave',
        'id' => $model->id,
        'step' => $step,
    ])) ?>;
    var saveTimer = null;
    var saving = false;
    var pendingSave = false;

    if (!form) {
        return;
    }

    function getValues(key) {
        // Seluruh key instrumen menggunakan huruf/angka/underscore,
        // jadi aman dipakai langsung pada selector atribut.
        var fields = form.querySelectorAll(
            '[name="answers[' + key + ']"],'
            + '[name="answers[' + key + '][]"]'
        );
        var values = [];

        fields.forEach(function (field) {
            if (field.type === 'radio' || field.type === 'checkbox') {
                if (field.checked) {
                    values.push(field.value);
                }
            } else if (field.value !== '') {
                values.push(field.value);
            }
        });

        return values;
    }

    function refreshConditionalFields() {
        var wrappers = form.querySelectorAll('[data-show-key]');

        wrappers.forEach(function (wrapper) {
            var key = wrapper.getAttribute('data-show-key');
            var allowed = [];

            try {
                allowed = JSON.parse(
                    wrapper.getAttribute('data-show-values') || '[]'
                );
            } catch (e) {
                allowed = [];
            }

            var current = getValues(key);
            var show = current.some(function (value) {
                return allowed.indexOf(value) !== -1;
            });

            wrapper.classList.toggle(
                'hidden-by-condition',
                !show
            );

            wrapper.querySelectorAll('input, textarea, select')
                .forEach(function (field) {
                    field.disabled = !show;
                });
        });
    }

    function setSaveStatus(state, text) {
        autosaveStatus.classList.remove(
            'saving',
            'saved',
            'error'
        );

        if (state) {
            autosaveStatus.classList.add(state);
        }

        var icon = autosaveStatus.querySelector('i');
        var copy = autosaveStatus.querySelector('span');

        if (state === 'saving') {
            icon.className = 'fa fa-refresh fa-spin';
        } else if (state === 'saved') {
            icon.className = 'fa fa-check-circle';
        } else if (state === 'error') {
            icon.className = 'fa fa-exclamation-circle';
        } else {
            icon.className = 'fa fa-cloud';
        }

        copy.textContent = text;
    }

    function doAutosave() {
        if (saving) {
            pendingSave = true;
            return;
        }

        saving = true;
        pendingSave = false;

        setSaveStatus('saving', 'Menyimpan draft...');

        var payload = new FormData(form);

        fetch(autosaveUrl, {
            method: 'POST',
            body: payload,
            credentials: 'same-origin',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(function (response) {
            if (!response.ok) {
                throw new Error('HTTP ' + response.status);
            }

            return response.json();
        })
        .then(function (data) {
            if (!data.success) {
                throw new Error(data.message || 'Autosave gagal');
            }

            setSaveStatus(
                'saved',
                'Tersimpan ' + data.savedAt
            );

            var progressText = document.getElementById(
                'kbgProgressText'
            );

            var progressFill = document.getElementById(
                'kbgProgressFill'
            );

            if (progressText) {
                progressText.textContent = data.progress + '%';
            }

            if (progressFill) {
                progressFill.style.width = data.progress + '%';
            }
        })
        .catch(function () {
            setSaveStatus(
                'error',
                'Belum tersimpan — cek koneksi'
            );
        })
        .finally(function () {
            saving = false;

            if (pendingSave) {
                doAutosave();
            }
        });
    }

    function scheduleAutosave() {
        window.clearTimeout(saveTimer);

        saveTimer = window.setTimeout(
            doAutosave,
            1100
        );
    }

    form.addEventListener('input', function (event) {
        if (event.target.matches(
            'input, textarea, select'
        )) {
            scheduleAutosave();
        }
    });

    form.addEventListener('change', function (event) {
        if (!event.target.matches(
            'input, textarea, select'
        )) {
            return;
        }

        if (event.target.type === 'checkbox') {
            var group = event.target.closest(
                '[data-checkbox-group]'
            );

            if (group) {
                var exclusive = group.querySelector(
                    'input[data-exclusive="1"]'
                );

                if (event.target.hasAttribute(
                    'data-exclusive'
                ) && event.target.checked) {
                    group.querySelectorAll(
                        'input[type="checkbox"]'
                    ).forEach(function (item) {
                        if (item !== event.target) {
                            item.checked = false;
                        }
                    });
                } else if (
                    event.target.checked
                    && exclusive
                ) {
                    exclusive.checked = false;
                }
            }
        }

        refreshConditionalFields();
        scheduleAutosave();
    });

    form.addEventListener('submit', function () {
        window.clearTimeout(saveTimer);
        setSaveStatus('saving', 'Menyimpan...');
    });

    refreshConditionalFields();


    var locationButton = document.getElementById(
        'kbgGetLocation'
    );

    if (locationButton) {
        locationButton.addEventListener(
            'click',
            function () {
                var status = document.getElementById(
                    'kbgLocationStatus'
                );

                if (!navigator.geolocation) {
                    status.textContent =
                        'Browser tidak mendukung geolocation.';
                    return;
                }

                locationButton.disabled = true;
                status.textContent =
                    'Mengambil lokasi perangkat...';

                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        var coords = position.coords;

                        var values = {
                            q2_6_lat: coords.latitude,
                            q2_6_lng: coords.longitude,
                            q2_6_alt: coords.altitude,
                            q2_6_acc: coords.accuracy
                        };

                        Object.keys(values).forEach(
                            function (key) {
                                var field = form.querySelector(
                                    '[name="answers['
                                    + key
                                    + ']"]'
                                );

                                if (field
                                    && values[key] !== null) {
                                    field.value = Number(
                                        values[key]
                                    ).toFixed(
                                        key === 'q2_6_lat'
                                        || key === 'q2_6_lng'
                                            ? 7
                                            : 2
                                    );
                                }
                            }
                        );

                        status.textContent =
                            'Lokasi berhasil diambil'
                            + ' (akurasi ±'
                            + Math.round(coords.accuracy)
                            + ' m).';

                        locationButton.disabled = false;
                        scheduleAutosave();
                    },
                    function (error) {
                        var messages = {
                            1: 'Izin lokasi ditolak.',
                            2: 'Lokasi tidak tersedia.',
                            3: 'Pengambilan lokasi terlalu lama.'
                        };

                        status.textContent =
                            messages[error.code]
                            || 'Gagal mengambil lokasi.';

                        locationButton.disabled = false;
                    },
                    {
                        enableHighAccuracy: true,
                        timeout: 15000,
                        maximumAge: 30000
                    }
                );
            }
        );
    }
})();
</script>
