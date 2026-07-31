<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * Model untuk tabel "tbl_pegawai".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $nip
 * @property string $jenis_pegawai
 * @property string|null $jabatan
 * @property string|null $pangkat_golongan
 * @property string|null $unit_kerja
 * @property string|null $email
 * @property string|null $whatsapp
 * @property string|null $foto
 * @property int|null $urutan
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * File foto sementara.
     *
     * @var UploadedFile|null
     */
    public $fotoFile;

    public static function tableName()
    {
        return 'tbl_pegawai';
    }

    public function rules()
    {
        return [
            [
                [
                    'nama',
                    'jenis_pegawai',
                ],
                'required',
            ],

            [
                [
                    'urutan',
                    'status',
                ],
                'integer',
            ],

            [
                [
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],

            [
                [
                    'nama',
                    'email',
                ],
                'string',
                'max' => 150,
            ],

            [
                ['nip'],
                'string',
                'max' => 50,
            ],

            [
                ['jenis_pegawai'],
                'string',
                'max' => 20,
            ],

            [
                [
                    'jabatan',
                    'unit_kerja',
                ],
                'string',
                'max' => 200,
            ],

            [
                ['pangkat_golongan'],
                'string',
                'max' => 100,
            ],

            [
                ['whatsapp'],
                'string',
                'max' => 30,
            ],

            [
                ['foto'],
                'string',
                'max' => 255,
            ],

            [
                ['nama'],
                'trim',
            ],

            [
                ['nip'],
                'trim',
            ],

            [
                ['email'],
                'trim',
            ],

            [
                ['whatsapp'],
                'trim',
            ],

            [
                ['email'],
                'email',
                'skipOnEmpty' => true,
                'message' => 'Format email tidak valid.',
            ],

            [
                ['nip'],
                'unique',
                'skipOnEmpty' => true,
                'message' => 'NIP sudah digunakan oleh pegawai lain.',
            ],

            [
                ['jenis_pegawai'],
                'in',
                'range' => [
                    'ASN',
                    'PPPK',
                    'NON-ASN',
                ],
                'message' => 'Jenis pegawai tidak valid.',
            ],

            [
                ['status'],
                'default',
                'value' => 1,
            ],

            [
                ['urutan'],
                'default',
                'value' => 0,
            ],

            [
                ['fotoFile'],
                'file',
                'skipOnEmpty' => true,
                'extensions' => [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                ],
                'checkExtensionByMimeType' => true,
                'maxSize' => 1024 * 1024,
                'tooBig' => 'Ukuran foto maksimal 1 MB.',
                'wrongExtension' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
                'wrongMimeType' => 'File yang dipilih bukan gambar yang valid.',
            ],

            [
                ['fotoFile'],
                'validateFotoDimensions',
                'skipOnEmpty' => true,
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama Pegawai',
            'nip' => 'NIP',
            'jenis_pegawai' => 'Jenis Pegawai',
            'jabatan' => 'Jabatan',
            'pangkat_golongan' => 'Pangkat/Golongan',
            'unit_kerja' => 'Unit Kerja/Bidang',
            'email' => 'Email',
            'whatsapp' => 'WhatsApp',
            'foto' => 'Foto',
            'fotoFile' => 'Upload Foto Pegawai',
            'urutan' => 'Urutan Tampil',
            'status' => 'Status',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    /**
     * Timestamp otomatis.
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $now = date('Y-m-d H:i:s');

        if ($insert && empty($this->created_at)) {
            $this->created_at = $now;
        }

        $this->updated_at = $now;

        /*
         * Simpan NIP kosong sebagai NULL agar tidak bentrok
         * dengan unique index.
         */
        if ($this->nip === '') {
            $this->nip = null;
        }

        if ($this->email === '') {
            $this->email = null;
        }

        if ($this->whatsapp === '') {
            $this->whatsapp = null;
        }

        return true;
    }

    /**
     * Validasi ukuran foto 600 × 800 piksel.
     */
   public function validateFotoDimensions($attribute, $params)
    {
        if (
            $this->hasErrors($attribute)
            || empty($this->$attribute)
        ) {
            return;
        }

        $imageInfo = @getimagesize(
            $this->$attribute->tempName
        );

        if ($imageInfo === false) {
            $this->addError(
                $attribute,
                'File yang dipilih bukan gambar yang valid.'
            );

            return;
        }

        $width = (int) $imageInfo[0];
        $height = (int) $imageInfo[1];

        if ($width !== 600 || $height !== 600) {
            $this->addError(
                $attribute,
                'Ukuran foto wajib tepat 600 × 600 piksel. '
                . 'Ukuran foto yang dipilih adalah '
                . $width . ' × ' . $height . ' piksel.'
            );
        }
    }

    /**
     * URL foto pegawai.
     */
    public function getFotoUrl()
    {
        if (empty($this->foto)) {
            return Yii::$app->request->baseUrl
                . '/web/images/default-pegawai.png';
        }

        return Yii::$app->request->baseUrl
            . '/web/uploads/pegawai/'
            . $this->foto;
    }

    public function getStatusLabel()
    {
        return (int) $this->status === 1
            ? 'Aktif'
            : 'Tidak Aktif';
    }

    public function getJenisLabel()
    {
        return !empty($this->jenis_pegawai)
            ? $this->jenis_pegawai
            : '-';
    }
}