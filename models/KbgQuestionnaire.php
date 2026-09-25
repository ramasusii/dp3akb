<?php

namespace app\models;

/**
 * Struktur instrumen Kaji Cepat Bersama Risiko Kekerasan Berbasis Gender
 * dan Audit Keselamatan.
 *
 * Isi pertanyaan mengikuti instrumen yang diberikan DP3AKB.
 * Class ini juga menyediakan helper untuk progress, required field,
 * conditional question, dan indikator perhatian operasional.
 */
class KbgQuestionnaire
{
    const TOTAL_STEPS = 7;

    public static function sections()
    {
        return [
            [
                'step' => 1,
                'title' => 'Informasi Dasar',
                'short' => 'Responden',
                'icon' => 'fa-user-circle',
                'description' => 'Identitas pendataan dan informasi dasar responden.',
                'questions' => [
                    [
                        'key' => 'q1_0',
                        'code' => '1.0',
                        'label' => 'Kategori Responden',
                        'type' => 'radio',
                        'options' => [
                            'Koordinator pos pengungsian',
                            'Pengelola pos pengungsian',
                            'Perempuan dewasa/remaja',
                            'Lembaga pemberi layanan',
                            'Ibu hamil dan menyusui',
                            'Perempuan lanjut usia',
                            'Penyandang disabilitas',
                        ],
                        'required' => true,
                    ],
                    [
                        'key' => 'q1_1',
                        'code' => '1.1',
                        'label' => 'Waktu pendataan',
                        'type' => 'datetime-local',
                        'required' => true,
                    ],
                    [
                        'key' => 'q1_2',
                        'code' => '1.2',
                        'label' => 'Didata oleh',
                        'type' => 'text',
                        'required' => true,
                        'placeholder' => 'Nama petugas/enumerator',
                    ],
                    [
                        'key' => 'q1_3',
                        'code' => '1.3',
                        'label' => 'Nama responden',
                        'type' => 'text',
                        'placeholder' => 'Nama responden',
                    ],
                    [
                        'key' => 'q1_4',
                        'code' => '1.4',
                        'label' => 'Jenis kelamin',
                        'type' => 'radio',
                        'options' => [
                            'Laki-laki',
                            'Perempuan',
                            'Lainnya',
                        ],
                        'required' => true,
                    ],
                    [
                        'key' => 'q1_5',
                        'code' => '1.5',
                        'label' => 'Usia responden',
                        'type' => 'number',
                        'suffix' => 'tahun',
                    ],
                    [
                        'key' => 'q1_6',
                        'code' => '1.6',
                        'label' => 'Peran/posisi di pos pengungsian',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'q1_6c',
                        'code' => '1.6c',
                        'label' => 'Jenis disabilitas',
                        'type' => 'checkbox',
                        'options' => [
                            'Disabilitas tuli',
                            'Disabilitas netra',
                            'Disabilitas wicara',
                            'Disabilitas fisik',
                            'Disabilitas mental',
                            'Disabilitas intelektual',
                            'Tidak',
                        ],
                        'help' => 'Dapat memilih lebih dari satu jenis jika relevan.',
                    ],
                ],
            ],
            [
                'step' => 2,
                'title' => 'Data Demografi Pengungsi',
                'short' => 'Demografi',
                'icon' => 'fa-users',
                'description' => 'Komposisi pengungsi menurut jenis kelamin, usia, kehamilan, kepala keluarga, dan disabilitas.',
                'questions' => [
                    [
                        'key' => 'q6_1',
                        'code' => '6.1',
                        'label' => 'Jumlah total pengungsi',
                        'type' => 'number',
                        'required' => true,
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1a',
                        'code' => '6.1a',
                        'label' => 'Jumlah pengungsi perempuan usia 0–5 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1b',
                        'code' => '6.1b',
                        'label' => 'Jumlah pengungsi perempuan usia 6–9 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1c',
                        'code' => '6.1c',
                        'label' => 'Jumlah pengungsi perempuan usia 10–14 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1d',
                        'code' => '6.1d',
                        'label' => 'Jumlah pengungsi perempuan usia 15–24 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1e',
                        'code' => '6.1e',
                        'label' => 'Jumlah pengungsi perempuan usia 25–49 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1f',
                        'code' => '6.1f',
                        'label' => 'Jumlah pengungsi perempuan usia 50–59 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1g',
                        'code' => '6.1g',
                        'label' => 'Jumlah pengungsi perempuan usia 60 tahun dan lebih',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1h',
                        'code' => '6.1h',
                        'label' => 'Jumlah pengungsi laki-laki usia 0–5 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1i',
                        'code' => '6.1i',
                        'label' => 'Jumlah pengungsi laki-laki usia 6–9 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1j',
                        'code' => '6.1j',
                        'label' => 'Jumlah pengungsi laki-laki usia 10–14 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1k',
                        'code' => '6.1k',
                        'label' => 'Jumlah pengungsi laki-laki usia 15–24 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1l',
                        'code' => '6.1l',
                        'label' => 'Jumlah pengungsi laki-laki usia 25–49 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1m',
                        'code' => '6.1m',
                        'label' => 'Jumlah pengungsi laki-laki usia 50–59 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_1n',
                        'code' => '6.1n',
                        'label' => 'Jumlah pengungsi laki-laki usia 60 tahun dan lebih',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_2',
                        'code' => '6.2',
                        'label' => 'Jumlah kepala keluarga',
                        'type' => 'number',
                        'suffix' => 'KK',
                    ],
                    [
                        'key' => 'q6_3',
                        'code' => '6.3',
                        'label' => 'Jumlah perempuan kepala keluarga',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_4',
                        'code' => '6.4',
                        'label' => 'Jumlah perempuan hamil',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_5a',
                        'code' => '6.5a',
                        'label' => 'Jumlah penyandang disabilitas tuli',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_5b',
                        'code' => '6.5b',
                        'label' => 'Jumlah penyandang disabilitas netra',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_5c',
                        'code' => '6.5c',
                        'label' => 'Jumlah penyandang disabilitas wicara',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_5d',
                        'code' => '6.5d',
                        'label' => 'Jumlah penyandang disabilitas fisik',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_5e',
                        'code' => '6.5e',
                        'label' => 'Jumlah penyandang disabilitas mental',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_5f',
                        'code' => '6.5f',
                        'label' => 'Jumlah penyandang disabilitas intelektual',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6a',
                        'code' => '6.6a',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 0–5 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6b',
                        'code' => '6.6b',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 6–9 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6c',
                        'code' => '6.6c',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 10–14 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6d',
                        'code' => '6.6d',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 15–24 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6e',
                        'code' => '6.6e',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 24–49 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6f',
                        'code' => '6.6f',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 50–59 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6g',
                        'code' => '6.6g',
                        'label' => 'Jumlah pengungsi perempuan disabilitas usia 60 tahun dan lebih',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6h',
                        'code' => '6.6h',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 0–5 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6i',
                        'code' => '6.6i',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 6–9 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6j',
                        'code' => '6.6j',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 10–14 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6k',
                        'code' => '6.6k',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 15–24 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6l',
                        'code' => '6.6l',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 25–49 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6m',
                        'code' => '6.6m',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 50–59 tahun',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q6_6n',
                        'code' => '6.6n',
                        'label' => 'Jumlah pengungsi laki-laki disabilitas usia 60 tahun dan lebih',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                ],
            ],
            [
                'step' => 3,
                'title' => 'Pos Pengungsian',
                'short' => 'Lokasi Pos',
                'icon' => 'fa-map-marker',
                'description' => 'Identitas pos pengungsian dan titik lokasi lapangan.',
                'questions' => [
                    [
                        'key' => 'q2_1',
                        'code' => '2.1',
                        'label' => 'Nama pos pengungsian',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'q2_2',
                        'code' => '2.2',
                        'label' => 'Desa/Kelurahan',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'q2_3',
                        'code' => '2.3',
                        'label' => 'Kecamatan',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'q2_4',
                        'code' => '2.4',
                        'label' => 'Kabupaten',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'q2_5',
                        'code' => '2.5',
                        'label' => 'Provinsi',
                        'type' => 'radio',
                        'options' => [
                            'Aceh',
                            'Sumatera Utara',
                            'Sumatera Barat',
                        ],
                        'required' => true,
                    ],
                    [
                        'key' => 'q2_6_lat',
                        'code' => '2.6',
                        'label' => 'Latitude',
                        'type' => 'number',
                        'help' => 'Gunakan tombol Ambil Lokasi untuk mengisi otomatis.',
                    ],
                    [
                        'key' => 'q2_6_lng',
                        'code' => '2.6',
                        'label' => 'Longitude',
                        'type' => 'number',
                    ],
                    [
                        'key' => 'q2_6_alt',
                        'code' => '2.6',
                        'label' => 'Altitude',
                        'type' => 'number',
                        'suffix' => 'm',
                    ],
                    [
                        'key' => 'q2_6_acc',
                        'code' => '2.6',
                        'label' => 'Accuracy',
                        'type' => 'number',
                        'suffix' => 'm',
                    ],
                    [
                        'key' => 'q2_7',
                        'code' => '2.7',
                        'label' => 'Jenis pengungsian',
                        'type' => 'radio',
                        'options' => [
                            'Terpusat',
                            'Mandiri',
                        ],
                        'required' => true,
                    ],
                    [
                        'key' => 'q2_8',
                        'code' => '2.8',
                        'label' => 'Skala pengungsian',
                        'type' => 'radio',
                        'options' => [
                            'Besar',
                            'Kecil',
                        ],
                        'required' => true,
                    ],
                ],
            ],
            [
                'step' => 4,
                'title' => 'Kondisi & Keamanan Pos',
                'short' => 'Keamanan',
                'icon' => 'fa-shield',
                'description' => 'Pengelolaan pos, bantuan, keamanan, aktivitas, kekhawatiran, jarak dan keamanan akses.',
                'questions' => [
                    [
                        'key' => 'q3_1',
                        'code' => '3.1',
                        'label' => 'Apakah ada pengurus/pengelola tempat pengungsian di sini?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_1a',
                        'code' => '3.1a',
                        'label' => 'Berapa jumlahnya?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q3_1',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_2',
                        'code' => '3.2',
                        'label' => 'Apakah ada perempuan yang menjadi pengurus/pengelola tempat pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_3',
                        'code' => '3.3',
                        'label' => 'Apakah ada bantuan yang diterima di posko pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_3a',
                        'code' => '3.3a',
                        'label' => 'Jenis bantuan apa saja yang sudah diterima?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_3',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_3b',
                        'code' => '3.3b',
                        'label' => 'Jenis bantuan apa saja yang sudah diterima dan dirasakan sangat bermanfaat?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_3',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_3c',
                        'code' => '3.3c',
                        'label' => 'Jenis bantuan apa saja yang sudah diterima dan dirasakan kurang bermanfaat?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_3',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_3d',
                        'code' => '3.3d',
                        'label' => 'Jenis bantuan yang diperlukan tapi belum ada yang memberikan?',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'q3_4',
                        'code' => '3.4',
                        'label' => 'Apakah distribusi bantuan melibatkan perempuan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_4a',
                        'code' => '3.4a',
                        'label' => 'Berapa jumlah perempuan yang terlibat dalam pengaturan bantuan?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q3_4',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_4b',
                        'code' => '3.4b',
                        'label' => 'Apa peran perempuan dalam distribusi bantuan tersebut?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_4',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'help' => 'Misalnya sebagai pengurus, pembuat keputusan, atau lainnya.',
                    ],
                    [
                        'key' => 'q3_4c',
                        'code' => '3.4c',
                        'label' => 'Berapa jumlah laki-laki yang terlibat dalam pengaturan bantuan?',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_4d',
                        'code' => '3.4d',
                        'label' => 'Apakah ada remaja yang terlibat dalam distribusi bantuan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_4e',
                        'code' => '3.4e',
                        'label' => 'Apakah ada pengaturan bantuan khusus untuk lansia dan penyandang disabilitas?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_4f',
                        'code' => '3.4f',
                        'label' => 'Jelaskan seperti apa pengaturan khusus tersebut',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_4e',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_5',
                        'code' => '3.5',
                        'label' => 'Apakah dalam satu tenda pengungsi tinggal bersama orang-orang yang bukan anggota keluarga inti/keluarga besar?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_6',
                        'code' => '3.6',
                        'label' => 'Berapa jumlah orang per tenda/posko?',
                        'type' => 'number',
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_7',
                        'code' => '3.7',
                        'label' => 'Apakah tempat pengungsian memiliki petugas/sistem keamanan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'help' => 'Misalnya ronda atau petugas keamanan keliling.',
                    ],
                    [
                        'key' => 'q3_7a',
                        'code' => '3.7a',
                        'label' => 'Siapa saja yang bertugas menjaga keamanan?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_7b',
                        'code' => '3.7b',
                        'label' => 'Berapa orang yang bertugas menjaga keamanan?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q3_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_7c',
                        'code' => '3.7c',
                        'label' => 'Berapa orang laki-laki yang terlibat dalam sistem keamanan tersebut?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q3_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_7d',
                        'code' => '3.7d',
                        'label' => 'Berapa orang perempuan yang terlibat dalam sistem keamanan tersebut?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q3_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'orang',
                    ],
                    [
                        'key' => 'q3_7e',
                        'code' => '3.7e',
                        'label' => 'Apakah ada situasi yang mengancam keamanan selama ini di tempat pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_7f',
                        'code' => '3.7f',
                        'label' => 'Sebutkan situasi yang mengancam keamanan',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_7e',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_7g',
                        'code' => '3.7g',
                        'label' => 'Apa saja yang sudah dilakukan masyarakat untuk mengatasi masalah keamanan tersebut?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_7e',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_7h',
                        'code' => '3.7h',
                        'label' => 'Apakah Anda merasa aman di tempat tinggal sekarang?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_8',
                        'code' => '3.8',
                        'label' => 'Apakah ada aktivitas yang dilakukan oleh laki-laki dan perempuan dewasa maupun anak, termasuk remaja selama di pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_8a',
                        'code' => '3.8a',
                        'label' => 'Sebutkan aktivitas untuk perempuan',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8b',
                        'code' => '3.8b',
                        'label' => 'Sebutkan aktivitas untuk laki-laki',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8c',
                        'code' => '3.8c',
                        'label' => 'Sebutkan aktivitas untuk remaja',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8d',
                        'code' => '3.8d',
                        'label' => 'Sebutkan aktivitas untuk anak',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8e',
                        'code' => '3.8e',
                        'label' => 'Sebutkan aktivitas untuk lansia dan disabilitas',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8f',
                        'code' => '3.8f',
                        'label' => 'Siapa yang mengadakan kegiatan tersebut?',
                        'type' => 'text',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8g',
                        'code' => '3.8g',
                        'label' => 'Kapan saja kegiatan tersebut berlangsung?',
                        'type' => 'text',
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8h',
                        'code' => '3.8h',
                        'label' => 'Apakah kegiatan tersebut dirasakan membantu dan bermanfaat?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8i',
                        'code' => '3.8i',
                        'label' => 'Seperti apa contoh manfaatnya?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8h',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8j',
                        'code' => '3.8j',
                        'label' => 'Apakah kegiatan tersebut menimbulkan masalah atau konflik baru?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q3_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_8k',
                        'code' => '3.8k',
                        'label' => 'Seperti apa masalah atau konflik yang timbul?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_8j',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_9',
                        'code' => '3.9',
                        'label' => 'Apakah selama di pengungsian perempuan dan anak mengalami kebosanan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_9a',
                        'code' => '3.9a',
                        'label' => 'Sebutkan alasannya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_9',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_10',
                        'code' => '3.10',
                        'label' => 'Apakah perempuan dan anak merasa khawatir selama di pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_10a',
                        'code' => '3.10a',
                        'label' => 'Sebutkan penyebab kekhawatirannya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q3_10',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q3_11a',
                        'code' => '3.11a',
                        'label' => 'Berapa jarak lokasi pengungsian ke sekolah?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_11b',
                        'code' => '3.11b',
                        'label' => 'Berapa jarak lokasi pengungsian ke pasar?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_11c',
                        'code' => '3.11c',
                        'label' => 'Berapa jarak lokasi pengungsian ke rumah ibadah?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_11d',
                        'code' => '3.11d',
                        'label' => 'Berapa jarak lokasi pengungsian ke Puskesmas?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_11e',
                        'code' => '3.11e',
                        'label' => 'Berapa jarak lokasi pengungsian ke rumah sakit?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_11f',
                        'code' => '3.11f',
                        'label' => 'Berapa jarak lokasi pengungsian ke kamar mandi, cuci, kakus?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_11g',
                        'code' => '3.11g',
                        'label' => 'Berapa jarak lokasi pengungsian ke tempat hunian lainnya?',
                        'type' => 'number',
                        'suffix' => 'menit',
                    ],
                    [
                        'key' => 'q3_12a',
                        'code' => '3.12a',
                        'label' => 'Apakah aman untuk menuju ke sekolah?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_12b',
                        'code' => '3.12b',
                        'label' => 'Apakah aman untuk menuju ke pasar?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_12c',
                        'code' => '3.12c',
                        'label' => 'Apakah aman untuk menuju ke rumah ibadah?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_12d',
                        'code' => '3.12d',
                        'label' => 'Apakah aman untuk menuju ke Puskesmas?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_12e',
                        'code' => '3.12e',
                        'label' => 'Apakah aman untuk menuju ke rumah sakit?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_12f',
                        'code' => '3.12f',
                        'label' => 'Apakah aman untuk menuju ke kamar mandi, cuci, kakus?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q3_12g',
                        'code' => '3.12g',
                        'label' => 'Apakah aman untuk menuju ke tempat hunian lainnya?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                ],
            ],
            [
                'step' => 5,
                'title' => 'Fasilitas Pengungsian',
                'short' => 'Fasilitas',
                'icon' => 'fa-building',
                'description' => 'Ruang aman, air bersih, sanitasi, aksesibilitas, dan penerangan.',
                'questions' => [
                    [
                        'key' => 'q4_1',
                        'code' => '4.1',
                        'label' => 'Apakah terdapat ruang gerak yang cukup di dalam pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_2',
                        'code' => '4.2',
                        'label' => 'Apakah terdapat ruang untuk memasak di pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_2a',
                        'code' => '4.2a',
                        'label' => 'Apakah ada peralatan untuk memasak?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q4_2',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_3',
                        'code' => '4.3',
                        'label' => 'Apakah ada ruang pertemuan yang dapat digunakan oleh kelompok perempuan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_4',
                        'code' => '4.4',
                        'label' => 'Apakah terdapat ruang untuk menyusui?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_5',
                        'code' => '4.5',
                        'label' => 'Apakah ada ruang privasi untuk perempuan dan pasangan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'help' => 'Misalnya untuk berganti pakaian atau untuk pasangan.',
                    ],
                    [
                        'key' => 'q4_6',
                        'code' => '4.6',
                        'label' => 'Apakah terdapat ruang ramah anak?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_7',
                        'code' => '4.7',
                        'label' => 'Apakah terdapat akses ke sumber air bersih?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_7a',
                        'code' => '4.7a',
                        'label' => 'Di manakah akses air bersih tersedia?',
                        'type' => 'radio',
                        'options' => [
                            'Di lingkungan pengungsian',
                            'Di luar pengungsian',
                        ],
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_7b',
                        'code' => '4.7b',
                        'label' => 'Seberapa jauh akses air bersih?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'meter',
                    ],
                    [
                        'key' => 'q4_8a',
                        'code' => '4.8a',
                        'label' => 'Apakah lokasi air bersih aman dan mudah diakses oleh remaja perempuan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_8b',
                        'code' => '4.8b',
                        'label' => 'Apakah lokasi air bersih aman dan mudah diakses oleh perempuan dewasa?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_8c',
                        'code' => '4.8c',
                        'label' => 'Apakah lokasi air bersih aman dan mudah diakses oleh penyandang disabilitas?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_8d',
                        'code' => '4.8d',
                        'label' => 'Apakah lokasi air bersih aman dan mudah diakses oleh lansia?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_9',
                        'code' => '4.9',
                        'label' => 'Apakah untuk mendapatkan air bersih harus mengantri terlebih dahulu?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'show_if' => [
                            'key' => 'q4_7',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_10',
                        'code' => '4.10',
                        'label' => 'Apakah ada kamar mandi dan jamban/WC di lokasi pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_10a',
                        'code' => '4.10a',
                        'label' => 'Berapa jaraknya dari tempat pengungsian?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q4_10',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'meter',
                    ],
                    [
                        'key' => 'q4_10b',
                        'code' => '4.10b',
                        'label' => 'Jika tidak ada, ke mana akses kamar mandi/jamban/WC?',
                        'type' => 'text',
                        'show_if' => [
                            'key' => 'q4_10',
                            'values' => [
                                'Tidak',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q4_10c',
                        'code' => '4.10c',
                        'label' => 'Berapa jarak akses tersebut dari tempat pengungsian?',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q4_10',
                            'values' => [
                                'Tidak',
                            ],
                        ],
                        'suffix' => 'meter',
                    ],
                    [
                        'key' => 'q4_10d',
                        'code' => '4.10d',
                        'label' => 'Apakah kamar mandi dan jamban/WC dapat diakses oleh penyandang disabilitas dan lansia?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_11',
                        'code' => '4.11',
                        'label' => 'Apakah kamar mandi dan jamban/WC yang digunakan aman?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'help' => 'Terkunci, tertutup dan memiliki penerangan cukup.',
                    ],
                    [
                        'key' => 'q4_12a',
                        'code' => '4.12a',
                        'label' => 'Berapa jumlah kamar mandi dan jamban/WC di pengungsian?',
                        'type' => 'number',
                        'suffix' => 'unit',
                    ],
                    [
                        'key' => 'q4_12b',
                        'code' => '4.12b',
                        'label' => 'Jumlah jamban/WC perempuan lebih banyak daripada jamban/WC laki-laki?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_12c',
                        'code' => '4.12c',
                        'label' => 'Kamar mandi dan jamban/WC perempuan dan laki-laki terpisah?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_12d',
                        'code' => '4.12d',
                        'label' => 'Kamar mandi dan jamban/WC perempuan dan laki-laki memiliki tanda yang jelas?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_12e',
                        'code' => '4.12e',
                        'label' => 'Apakah kamar mandi dan jamban/WC mudah diakses (jarak < 200 m) oleh perempuan?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_12f',
                        'code' => '4.12f',
                        'label' => 'Apakah ada jamban dengan kloset duduk?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_12g',
                        'code' => '4.12g',
                        'label' => 'Apakah ada jamban yang portable?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_13a',
                        'code' => '4.13a',
                        'label' => 'Apakah penerangan di tempat pengungsian mencukupi?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_13b',
                        'code' => '4.13b',
                        'label' => 'Apakah penerangan di jalan menuju kamar mandi/jamban/sumber air mencukupi?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q4_13c',
                        'code' => '4.13c',
                        'label' => 'Apakah penerangan di jalur/akses ke tempat pengungsian mencukupi?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                ],
            ],
            [
                'step' => 6,
                'title' => 'Risiko & Layanan KBG',
                'short' => 'Risiko KBG',
                'icon' => 'fa-exclamation-triangle',
                'description' => 'Kondisi rasa aman, kejadian/potensi KBG, pencegahan, perkawinan anak, dan ketersediaan layanan.',
                'questions' => [
                    [
                        'key' => 'q5_1',
                        'code' => '5.1',
                        'label' => 'Apakah terdapat kejadian yang membuat pengungsi merasa tidak aman di lokasi pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'help' => 'Misalnya pencurian, diintip ketika di toilet/posko, premanisme, dan lainnya.',
                    ],
                    [
                        'key' => 'q5_1a',
                        'code' => '5.1a',
                        'label' => 'Sebutkan kejadiannya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_1',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_2',
                        'code' => '5.2',
                        'label' => 'Apakah terdapat kejadian yang membuat perempuan dan anak khususnya merasa tidak aman di tempat pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_2a',
                        'code' => '5.2a',
                        'label' => 'Sebutkan kejadiannya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_2',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_3',
                        'code' => '5.3',
                        'label' => 'Apakah ada tempat yang bisa didatangi remaja perempuan dan perempuan dewasa apabila merasa tidak aman?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                        'help' => 'Misalnya ruang ramah perempuan, rumah aman, atau ruang ramah anak.',
                    ],
                    [
                        'key' => 'q5_4',
                        'code' => '5.4',
                        'label' => 'Apakah Anda mengetahui tentang kekerasan berbasis gender?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_4a',
                        'code' => '5.4a',
                        'label' => 'Apa saja yang Anda ketahui tentang KBG?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_4',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_5',
                        'code' => '5.5',
                        'label' => 'Apakah ada atau pernah terjadi kasus pelecehan/kekerasan seksual, KDRT, atau perdagangan terhadap perempuan dan anak di dekat/dalam lokasi pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                            'Tidak tahu',
                        ],
                    ],
                    [
                        'key' => 'q5_5a',
                        'code' => '5.5a',
                        'label' => 'Sebutkan apa yang terjadi',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_5',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_6',
                        'code' => '5.6',
                        'label' => 'Bagaimana respon keluarga pada umumnya jika ada kasus kekerasan pada anak dan perempuan di lokasi pengungsian?',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'q5_7',
                        'code' => '5.7',
                        'label' => 'Bagaimana respon masyarakat pada umumnya jika ada kasus kekerasan pada anak dan perempuan di lokasi pengungsian?',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'q5_8',
                        'code' => '5.8',
                        'label' => 'Apakah ada upaya untuk pencegahan kekerasan di tempat pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_8a',
                        'code' => '5.8a',
                        'label' => 'Sebutkan upaya yang dapat dilakukan kelompok laki-laki',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_8b',
                        'code' => '5.8b',
                        'label' => 'Sebutkan upaya yang dapat dilakukan kelompok perempuan',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_8c',
                        'code' => '5.8c',
                        'label' => 'Sebutkan upaya yang dapat dilakukan kelompok remaja',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_8',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_9',
                        'code' => '5.9',
                        'label' => 'Apakah ada potensi terjadinya kasus kekerasan terhadap perempuan dan anak, termasuk lansia dan disabilitas, yang dapat diidentifikasi di pengungsian ini?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_9a',
                        'code' => '5.9a',
                        'label' => 'Sebutkan potensi yang teridentifikasi',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_9',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_10_pre',
                        'code' => '5.10',
                        'label' => 'Apakah terdapat perkawinan anak yang berumur <19 tahun sebelum bencana?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_10b',
                        'code' => '5.10b',
                        'label' => 'Tuliskan jumlah kasus tersebut',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q5_10_pre',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'kasus',
                    ],
                    [
                        'key' => 'q5_10c',
                        'code' => '5.10c',
                        'label' => 'Apa alasan khusus adanya perkawinan tersebut?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_10_pre',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_10_post',
                        'code' => '5.10a',
                        'label' => 'Apakah terdapat perkawinan anak yang berumur <19 tahun sejak tinggal di posko pengungsian?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_10d',
                        'code' => '5.10d',
                        'label' => 'Tuliskan jumlah kasus tersebut',
                        'type' => 'number',
                        'show_if' => [
                            'key' => 'q5_10_post',
                            'values' => [
                                'Ya',
                            ],
                        ],
                        'suffix' => 'kasus',
                    ],
                    [
                        'key' => 'q5_10e',
                        'code' => '5.10e',
                        'label' => 'Apa alasan khusus adanya perkawinan tersebut?',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_10_post',
                            'values' => [
                                'Ya',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_11a',
                        'code' => '5.11a',
                        'label' => 'Apakah layanan pengaduan kekerasan/KBG tersedia di sekitar/dekat lokasi dan mudah diakses remaja/perempuan?',
                        'type' => 'radio',
                        'options' => [
                            'Tersedia',
                            'Tidak tersedia',
                        ],
                    ],
                    [
                        'key' => 'q5_11b',
                        'code' => '5.11b',
                        'label' => 'Nama pemberi layanan pengaduan dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_11a',
                            'values' => [
                                'Tersedia',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_11c',
                        'code' => '5.11c',
                        'label' => 'Apakah layanan pendampingan dan dukungan psikososial tersedia dan mudah diakses?',
                        'type' => 'radio',
                        'options' => [
                            'Tersedia',
                            'Tidak tersedia',
                        ],
                    ],
                    [
                        'key' => 'q5_11d',
                        'code' => '5.11d',
                        'label' => 'Nama pemberi layanan psikososial dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_11c',
                            'values' => [
                                'Tersedia',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_11e',
                        'code' => '5.11e',
                        'label' => 'Apakah layanan kesehatan untuk korban kekerasan tersedia dan mudah diakses?',
                        'type' => 'radio',
                        'options' => [
                            'Tersedia',
                            'Tidak tersedia',
                        ],
                        'help' => 'Puskesmas/pos kesehatan/pos kesehatan reproduksi.',
                    ],
                    [
                        'key' => 'q5_11f',
                        'code' => '5.11f',
                        'label' => 'Nama pemberi layanan kesehatan dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_11e',
                            'values' => [
                                'Tersedia',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_11g',
                        'code' => '5.11g',
                        'label' => 'Apakah layanan rumah aman tersedia dan mudah diakses?',
                        'type' => 'radio',
                        'options' => [
                            'Tersedia',
                            'Tidak tersedia',
                        ],
                    ],
                    [
                        'key' => 'q5_11h',
                        'code' => '5.11h',
                        'label' => 'Nama pemberi layanan rumah aman dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_11g',
                            'values' => [
                                'Tersedia',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_11i',
                        'code' => '5.11i',
                        'label' => 'Apakah layanan bantuan hukum tersedia dan mudah diakses?',
                        'type' => 'radio',
                        'options' => [
                            'Tersedia',
                            'Tidak tersedia',
                        ],
                        'help' => 'Lembaga bantuan hukum, paralegal, dan polisi.',
                    ],
                    [
                        'key' => 'q5_11j',
                        'code' => '5.11j',
                        'label' => 'Nama pemberi layanan bantuan hukum dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_11i',
                            'values' => [
                                'Tersedia',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_11k',
                        'code' => '5.11k',
                        'label' => 'Apakah layanan yang disebutkan sebelumnya dapat diakses oleh penyandang disabilitas?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_11l',
                        'code' => '5.11l',
                        'label' => 'Apakah layanan untuk kelompok disabilitas tersedia di sekitar/dekat lokasi dan mudah diakses?',
                        'type' => 'radio',
                        'options' => [
                            'Tersedia',
                            'Tidak tersedia',
                        ],
                    ],
                    [
                        'key' => 'q5_11m',
                        'code' => '5.11m',
                        'label' => 'Nama pemberi layanan disabilitas dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_11l',
                            'values' => [
                                'Tersedia',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'step' => 7,
                'title' => 'Status Layanan & Catatan',
                'short' => 'Pascabencana',
                'icon' => 'fa-check-circle',
                'description' => 'Keberfungsian layanan pascabencana dan catatan tambahan responden.',
                'questions' => [
                    [
                        'key' => 'q5_12a',
                        'code' => '5.12a',
                        'label' => 'Apakah layanan pengaduan kekerasan/KBG masih berjalan/berfungsi pascabencana?',
                        'type' => 'radio',
                        'options' => [
                            'Masih berfungsi',
                            'Tidak berfungsi',
                        ],
                    ],
                    [
                        'key' => 'q5_12b',
                        'code' => '5.12b',
                        'label' => 'Nama lembaga layanan pengaduan dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_12a',
                            'values' => [
                                'Masih berfungsi',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_12c',
                        'code' => '5.12c',
                        'label' => 'Apakah layanan pendampingan dan dukungan psikososial masih berjalan/berfungsi pascabencana?',
                        'type' => 'radio',
                        'options' => [
                            'Masih berfungsi',
                            'Tidak berfungsi',
                        ],
                    ],
                    [
                        'key' => 'q5_12d',
                        'code' => '5.12d',
                        'label' => 'Nama lembaga layanan psikososial dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_12c',
                            'values' => [
                                'Masih berfungsi',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_12e',
                        'code' => '5.12e',
                        'label' => 'Apakah layanan kesehatan masih berjalan/berfungsi pascabencana?',
                        'type' => 'radio',
                        'options' => [
                            'Masih berfungsi',
                            'Tidak berfungsi',
                        ],
                        'help' => 'Puskesmas/pos kesehatan/pos kesehatan reproduksi.',
                    ],
                    [
                        'key' => 'q5_12f',
                        'code' => '5.12f',
                        'label' => 'Nama lembaga layanan kesehatan dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_12e',
                            'values' => [
                                'Masih berfungsi',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_12g',
                        'code' => '5.12g',
                        'label' => 'Apakah layanan rumah aman masih berjalan/berfungsi pascabencana?',
                        'type' => 'radio',
                        'options' => [
                            'Masih berfungsi',
                            'Tidak berfungsi',
                        ],
                    ],
                    [
                        'key' => 'q5_12h',
                        'code' => '5.12h',
                        'label' => 'Nama lembaga layanan rumah aman dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_12g',
                            'values' => [
                                'Masih berfungsi',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_12i',
                        'code' => '5.12i',
                        'label' => 'Apakah layanan bantuan hukum masih berjalan/berfungsi pascabencana?',
                        'type' => 'radio',
                        'options' => [
                            'Masih berfungsi',
                            'Tidak berfungsi',
                        ],
                        'help' => 'Lembaga bantuan hukum, paralegal, dan polisi.',
                    ],
                    [
                        'key' => 'q5_12j',
                        'code' => '5.12j',
                        'label' => 'Nama lembaga layanan bantuan hukum dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_12i',
                            'values' => [
                                'Masih berfungsi',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_12k',
                        'code' => '5.12k',
                        'label' => 'Apakah layanan yang disebutkan sebelumnya tetap memberikan layanan khusus bagi penyandang disabilitas?',
                        'type' => 'radio',
                        'options' => [
                            'Ya',
                            'Tidak',
                        ],
                    ],
                    [
                        'key' => 'q5_12l',
                        'code' => '5.12l',
                        'label' => 'Apakah layanan disabilitas masih berjalan/berfungsi pascabencana?',
                        'type' => 'radio',
                        'options' => [
                            'Masih berfungsi',
                            'Tidak berfungsi',
                        ],
                    ],
                    [
                        'key' => 'q5_12m',
                        'code' => '5.12m',
                        'label' => 'Nama lembaga layanan disabilitas dan kontaknya',
                        'type' => 'textarea',
                        'show_if' => [
                            'key' => 'q5_12l',
                            'values' => [
                                'Masih berfungsi',
                            ],
                        ],
                    ],
                    [
                        'key' => 'q5_13',
                        'code' => '5.13',
                        'label' => 'Jelaskan hal-hal lainnya yang ingin disampaikan responden terkait KBG',
                        'type' => 'textarea',
                    ],
                ],
            ],
        ];
    }

    public static function getSection($step)
    {
        $step = (int) $step;

        foreach (self::sections() as $section) {
            if ((int) $section['step'] === $step) {
                return $section;
            }
        }

        return null;
    }

    public static function allQuestions()
    {
        $questions = [];

        foreach (self::sections() as $section) {
            foreach ($section['questions'] as $question) {
                $question['step'] = (int) $section['step'];
                $question['section_title'] = $section['title'];
                $questions[$question['key']] = $question;
            }
        }

        return $questions;
    }

    public static function getQuestion($key)
    {
        $questions = self::allQuestions();

        return isset($questions[$key])
            ? $questions[$key]
            : null;
    }

    public static function totalQuestions()
    {
        return count(self::allQuestions());
    }

    public static function isApplicable(array $question, array $answers)
    {
        if (empty($question['show_if'])) {
            return true;
        }

        $condition = $question['show_if'];
        $parentKey = isset($condition['key']) ? $condition['key'] : null;
        $allowed = isset($condition['values']) ? (array) $condition['values'] : [];

        if ($parentKey === null || !array_key_exists($parentKey, $answers)) {
            return false;
        }

        $value = $answers[$parentKey];

        if (is_array($value)) {
            foreach ($value as $item) {
                if (in_array((string) $item, $allowed, true)) {
                    return true;
                }
            }

            return false;
        }

        return in_array((string) $value, $allowed, true);
    }

    public static function isAnswered($value)
    {
        if (is_array($value)) {
            return count(array_filter($value, function ($item) {
                return $item !== null && $item !== '';
            })) > 0;
        }

        return $value !== null
            && $value !== ''
            && $value !== [];
    }

    public static function progress(array $answers)
    {
        $applicable = 0;
        $answered = 0;

        foreach (self::allQuestions() as $question) {
            if (!self::isApplicable($question, $answers)) {
                continue;
            }

            $applicable++;

            $key = $question['key'];

            if (array_key_exists($key, $answers)
                && self::isAnswered($answers[$key])) {
                $answered++;
            }
        }

        if ($applicable < 1) {
            return 0;
        }

        return (int) round(($answered / $applicable) * 100);
    }

    public static function requiredMissing(array $answers)
    {
        $missing = [];

        foreach (self::allQuestions() as $question) {
            if (empty($question['required'])) {
                continue;
            }

            if (!self::isApplicable($question, $answers)) {
                continue;
            }

            $key = $question['key'];
            $value = array_key_exists($key, $answers)
                ? $answers[$key]
                : null;

            if (!self::isAnswered($value)) {
                $missing[] = $question;
            }
        }

        return $missing;
    }

    /**
     * Flag ini adalah indikator perhatian operasional sistem, bukan
     * penetapan kasus, diagnosis, atau pengganti penilaian petugas.
     */
    public static function attentionFlags(array $answers)
    {
        $flags = [];

        $add = function ($key, $level, $label) use (&$flags, $answers) {
            if (!array_key_exists($key, $answers)) {
                return;
            }

            $flags[] = [
                'key' => $key,
                'level' => $level,
                'label' => $label,
            ];
        };

        $equals = function ($key, $expected) use ($answers) {
            return array_key_exists($key, $answers)
                && (string) $answers[$key] === (string) $expected;
        };

        // Indikator kritis langsung dari jawaban instrumen.
        if ($equals('q5_1', 'Ya')) {
            $add('q5_1', 'critical', 'Ada kejadian yang membuat pengungsi merasa tidak aman.');
        }

        if ($equals('q5_2', 'Ya')) {
            $add('q5_2', 'critical', 'Ada kejadian yang membuat perempuan/anak merasa tidak aman.');
        }

        if ($equals('q5_5', 'Ya')) {
            $add('q5_5', 'critical', 'Dilaporkan pernah terjadi pelecehan/kekerasan/KDRT/TPPO di sekitar lokasi.');
        }

        if ($equals('q5_9', 'Ya')) {
            $add('q5_9', 'critical', 'Ada potensi kekerasan yang teridentifikasi.');
        }

        if ($equals('q5_10_post', 'Ya')) {
            $add('q5_10_post', 'critical', 'Terdapat perkawinan anak sejak tinggal di posko.');
        }

        // Kondisi keamanan/fasilitas yang perlu perhatian.
        $attentionRules = [
            ['q3_7', 'Tidak', 'Belum ada petugas/sistem keamanan di lokasi.'],
            ['q3_7e', 'Ya', 'Ada situasi yang mengancam keamanan di lokasi.'],
            ['q3_7h', 'Tidak', 'Responden menyatakan belum merasa aman.'],
            ['q3_10', 'Ya', 'Perempuan/anak merasa khawatir selama di pengungsian.'],
            ['q3_12f', 'Tidak', 'Akses menuju kamar mandi/cuci/kakus dinilai tidak aman.'],
            ['q4_4', 'Tidak', 'Belum tersedia ruang menyusui.'],
            ['q4_6', 'Tidak', 'Belum tersedia ruang ramah anak.'],
            ['q4_8c', 'Tidak', 'Akses air bersih belum aman/mudah bagi penyandang disabilitas.'],
            ['q4_10d', 'Tidak', 'MCK belum dapat diakses penyandang disabilitas/lansia.'],
            ['q4_11', 'Tidak', 'MCK dinilai belum aman.'],
            ['q4_13a', 'Tidak', 'Penerangan di tempat pengungsian belum mencukupi.'],
            ['q4_13b', 'Tidak', 'Penerangan menuju MCK/sumber air belum mencukupi.'],
            ['q4_13c', 'Tidak', 'Penerangan akses menuju pengungsian belum mencukupi.'],
            ['q5_11a', 'Tidak tersedia', 'Layanan pengaduan KBG belum tersedia/mudah diakses.'],
            ['q5_11c', 'Tidak tersedia', 'Layanan psikososial belum tersedia/mudah diakses.'],
            ['q5_11e', 'Tidak tersedia', 'Layanan kesehatan korban belum tersedia/mudah diakses.'],
            ['q5_11g', 'Tidak tersedia', 'Layanan rumah aman belum tersedia/mudah diakses.'],
            ['q5_11i', 'Tidak tersedia', 'Layanan bantuan hukum belum tersedia/mudah diakses.'],
            ['q5_11l', 'Tidak tersedia', 'Layanan bagi penyandang disabilitas belum tersedia/mudah diakses.'],
            ['q5_12a', 'Tidak berfungsi', 'Layanan pengaduan KBG pascabencana tidak berfungsi.'],
            ['q5_12c', 'Tidak berfungsi', 'Layanan psikososial pascabencana tidak berfungsi.'],
            ['q5_12e', 'Tidak berfungsi', 'Layanan kesehatan pascabencana tidak berfungsi.'],
            ['q5_12g', 'Tidak berfungsi', 'Layanan rumah aman pascabencana tidak berfungsi.'],
            ['q5_12i', 'Tidak berfungsi', 'Layanan bantuan hukum pascabencana tidak berfungsi.'],
            ['q5_12l', 'Tidak berfungsi', 'Layanan disabilitas pascabencana tidak berfungsi.'],
        ];

        foreach ($attentionRules as $rule) {
            if ($equals($rule[0], $rule[1])) {
                $add($rule[0], 'attention', $rule[2]);
            }
        }

        return $flags;
    }

    public static function attentionSummary(array $answers)
    {
        $flags = self::attentionFlags($answers);
        $critical = 0;
        $attention = 0;

        foreach ($flags as $flag) {
            if ($flag['level'] === 'critical') {
                $critical++;
            } else {
                $attention++;
            }
        }

        if ($critical > 0) {
            $level = 'Perlu Tindak Lanjut';
        } elseif ($attention >= 3) {
            $level = 'Perlu Perhatian';
        } elseif ($attention > 0) {
            $level = 'Terpantau';
        } else {
            $level = 'Belum Ada Flag';
        }

        return [
            'critical' => $critical,
            'attention' => $attention,
            'level' => $level,
            'flags' => $flags,
        ];
    }

    public static function firstMissingRequiredStep(array $answers)
    {
        $missing = self::requiredMissing($answers);

        if (empty($missing)) {
            return null;
        }

        return isset($missing[0]['step'])
            ? (int) $missing[0]['step']
            : 1;
    }
}
