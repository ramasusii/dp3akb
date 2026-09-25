<?php

use yii\helpers\Html;

/** @var app\models\KbgAssessment $model */
/** @var array $sections */
/** @var array $answerMap */
/** @var array $attention */

$formatAnswer = function ($value) {
    if (is_array($value)) {
        return implode(', ', $value);
    }

    if ($value === null || $value === '') {
        return '-';
    }

    return (string) $value;
};
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>
        <?= Html::encode($model->kode) ?> - Kaji Cepat KBG
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: #26354a;
            background: #fff;
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.5;
        }

        .page {
            max-width: 980px;
            margin: 0 auto;
            padding: 28px;
        }

        .header {
            display: flex;
            padding-bottom: 16px;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            border-bottom: 3px solid #082b6f;
        }

        .header h1 {
            margin: 0 0 5px;
            color: #082b6f;
            font-size: 21px;
        }

        .header p {
            margin: 0;
            color: #69778a;
        }

        .code {
            padding: 8px 10px;
            color: #fff;
            background: #082b6f;
            border-radius: 7px;
            font-weight: bold;
        }

        .meta {
            display: grid;
            margin: 16px 0;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        .meta div {
            padding: 8px;
            background: #f6f8fb;
            border: 1px solid #e4e9f0;
            border-radius: 6px;
        }

        .meta span {
            display: block;
            color: #8893a2;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .meta strong {
            display: block;
            margin-top: 3px;
            font-size: 10px;
        }

        .section {
            margin: 13px 0;
            page-break-inside: avoid;
            border: 1px solid #dfe5ed;
            border-radius: 7px;
            overflow: hidden;
        }

        .section h2 {
            margin: 0;
            padding: 9px 11px;
            color: #082b6f;
            background: #f3f6fb;
            border-bottom: 1px solid #dfe5ed;
            font-size: 12px;
        }

        .row {
            display: grid;
            padding: 7px 10px;
            grid-template-columns: 1.25fr .75fr;
            gap: 12px;
            border-bottom: 1px solid #edf0f4;
        }

        .row:last-child {
            border-bottom: 0;
        }

        .q {
            color: #637084;
        }

        .q b {
            color: #0d4ba8;
        }

        .a {
            font-weight: bold;
            word-break: break-word;
        }

        .flags {
            margin-top: 15px;
            padding: 11px;
            background: #fff9ec;
            border: 1px solid #edddb8;
            border-radius: 7px;
        }

        .flags h3 {
            margin: 0 0 7px;
            color: #7a5719;
            font-size: 11px;
        }

        .flags ul {
            margin: 0;
            padding-left: 18px;
        }

        .flags li {
            margin-bottom: 4px;
        }

        .footer-note {
            margin-top: 18px;
            color: #8a94a3;
            font-size: 8px;
        }

        .print-button {
            position: fixed;
            top: 16px;
            right: 16px;
            padding: 9px 13px;
            color: #fff;
            background: #082b6f;
            border: 0;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        @media print {
            .print-button {
                display: none;
            }

            .page {
                max-width: none;
                padding: 0;
            }

            @page {
                margin: 14mm;
            }
        }

        @media (max-width: 700px) {
            .meta {
                grid-template-columns: repeat(2, 1fr);
            }

            .row {
                grid-template-columns: 1fr;
                gap: 3px;
            }
        }
    </style>
</head>

<body>

<button
    class="print-button"
    onclick="window.print()"
>
    Cetak / Simpan PDF
</button>

<div class="page">

    <div class="header">
        <div>
            <h1>
                Kaji Cepat Bersama Risiko Kekerasan Berbasis Gender
                dan Audit Keselamatan
            </h1>

            <p>
                Dinas Pemberdayaan Perempuan, Perlindungan Anak
                dan Keluarga Berencana Provinsi Sumatera Utara
            </p>
        </div>

        <div class="code">
            <?= Html::encode($model->kode) ?>
        </div>
    </div>


    <div class="meta">

        <div>
            <span>Nama Pos</span>
            <strong>
                <?= Html::encode($model->site_name ?: '-') ?>
            </strong>
        </div>

        <div>
            <span>Kabupaten</span>
            <strong>
                <?= Html::encode($model->regency ?: '-') ?>
            </strong>
        </div>

        <div>
            <span>Petugas</span>
            <strong>
                <?= Html::encode($model->enumerator_name ?: '-') ?>
            </strong>
        </div>

        <div>
            <span>Status</span>
            <strong>
                <?= Html::encode($model->getStatusLabel()) ?>
            </strong>
        </div>

        <div>
            <span>Waktu Pendataan</span>
            <strong>
                <?= Html::encode(
                    $model->assessment_datetime ?: '-'
                ) ?>
            </strong>
        </div>

        <div>
            <span>Progress</span>
            <strong>
                <?= (int) $model->progress_percent ?>%
            </strong>
        </div>

        <div>
            <span>Indikator Sistem</span>
            <strong>
                <?= Html::encode($model->risk_level) ?>
            </strong>
        </div>

        <div>
            <span>Koordinat</span>
            <strong>
                <?= Html::encode(
                    $model->latitude !== null
                    && $model->longitude !== null
                        ? $model->latitude . ', ' . $model->longitude
                        : '-'
                ) ?>
            </strong>
        </div>

    </div>


    <?php foreach ($sections as $section): ?>

        <?php
        $rows = [];

        foreach ($section['questions'] as $question) {
            $key = $question['key'];

            if (!array_key_exists($key, $answerMap)) {
                continue;
            }

            $value = $answerMap[$key];

            if (!app\models\KbgQuestionnaire::isAnswered(
                $value
            )) {
                continue;
            }

            $rows[] = [
                'question' => $question,
                'value' => $value,
            ];
        }

        if (empty($rows)) {
            continue;
        }
        ?>

        <div class="section">

            <h2>
                Tahap <?= (int) $section['step'] ?> —
                <?= Html::encode($section['title']) ?>
            </h2>

            <?php foreach ($rows as $item): ?>

                <div class="row">

                    <div class="q">
                        <b>
                            <?= Html::encode(
                                $item['question']['code']
                            ) ?>
                        </b>
                        <?= Html::encode(
                            $item['question']['label']
                        ) ?>
                    </div>

                    <div class="a">
                        <?= nl2br(Html::encode(
                            $formatAnswer($item['value'])
                        )) ?>

                        <?php if (!empty(
                            $item['question']['suffix']
                        )): ?>
                            <?= ' ' . Html::encode(
                                $item['question']['suffix']
                            ) ?>
                        <?php endif; ?>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>


    <?php if (!empty($attention['flags'])): ?>

        <div class="flags">
            <h3>
                Indikator Perhatian Sistem
            </h3>

            <ul>
                <?php foreach ($attention['flags'] as $flag): ?>
                    <li>
                        <strong>
                            <?= $flag['level'] === 'critical'
                                ? 'Kritis'
                                : 'Perhatian' ?>:
                        </strong>
                        <?= Html::encode($flag['label']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php endif; ?>


    <div class="footer-note">
        Dokumen ini dihasilkan dari sistem internal DP3AKB.
        Indikator sistem adalah alat bantu peninjauan berdasarkan
        jawaban instrumen dan bukan penetapan kasus atau pengganti
        verifikasi petugas yang berwenang.
    </div>

</div>

</body>
</html>
