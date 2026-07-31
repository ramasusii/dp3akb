<?php

namespace app\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

/**
 * Model untuk tabel "tbl_berita".
 *
 * @property int $id
 * @property int|null $kategori_id
 * @property string $judul
 * @property string $slug
 * @property string|null $ringkasan
 * @property string|null $isi
 * @property string|null $gambar
 * @property int|null $hits
 * @property int|null $is_utama
 * @property int|null $status
 * @property string|null $tanggal_publish
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property KategoriBerita $kategori
 */
class BeritaDp3akb extends \yii\db\ActiveRecord
{
    /**
     * File upload sementara.
     *
     * @var UploadedFile|null
     */
    public $imageFile;

    /**
     * Nama tabel database.
     */
    public static function tableName()
    {
        return 'tbl_berita';
    }

    /**
     * Rules validasi.
     */
    public function rules()
    {
        return [
            [
                [
                    'kategori_id',
                    'judul',
                    'ringkasan',
                    'isi',
                ],
                'required',
            ],

            [
                [
                    'kategori_id',
                    'hits',
                    'is_utama',
                    'status',
                ],
                'integer',
            ],

            [
                [
                    'ringkasan',
                    'isi',
                ],
                'string',
            ],

            [
                [
                    'tanggal_publish',
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],

            [
                [
                    'judul',
                    'slug',
                    'gambar',
                ],
                'string',
                'max' => 255,
            ],

            [
                ['judul'],
                'trim',
            ],

            [
                ['slug'],
                'trim',
            ],

            [
                ['slug'],
                'unique',
                'message' => 'Slug berita sudah digunakan.',
            ],

            [
                ['kategori_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => KategoriBerita::className(),
                'targetAttribute' => [
                    'kategori_id' => 'id',
                ],
                'message' => 'Kategori berita tidak ditemukan.',
            ],

            [
                ['hits'],
                'default',
                'value' => 0,
            ],

            [
                ['is_utama'],
                'default',
                'value' => 0,
            ],

            [
                ['status'],
                'default',
                'value' => 1,
            ],

            [
                ['imageFile'],
                'file',
                'skipOnEmpty' => !$this->isNewRecord,
                'extensions' => [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                ],
                'checkExtensionByMimeType' => true,
                'maxSize' => 1024 * 1024,
                'tooBig' => 'Ukuran gambar maksimal 1 MB.',
                'wrongExtension' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'wrongMimeType' => 'File yang dipilih bukan gambar yang valid.',
                'uploadRequired' => 'Gambar berita wajib diunggah.',
            ],

            [
                ['imageFile'],
                'validateImageDimensions',
                'skipOnEmpty' => true,
            ],
        ];
    }

    /**
     * Label atribut.
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_id' => 'Kategori Berita',
            'judul' => 'Judul Berita',
            'slug' => 'Slug',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi Berita',
            'gambar' => 'Gambar',
            'imageFile' => 'Upload Gambar Berita',
            'hits' => 'Jumlah Dilihat',
            'is_utama' => 'Berita Utama',
            'status' => 'Status',
            'tanggal_publish' => 'Tanggal Publikasi',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    /**
     * Membuat slug otomatis sebelum validasi.
     */
    public function beforeValidate()
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        if (!empty($this->judul)) {
            $baseSlug = Inflector::slug(
                strtolower(trim($this->judul))
            );

            $this->slug = $this->generateUniqueSlug($baseSlug);
        }

        return true;
    }

    /**
     * Timestamp otomatis.
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $currentDateTime = date('Y-m-d H:i:s');

        if ($insert) {
            if (empty($this->created_at)) {
                $this->created_at = $currentDateTime;
            }

            if (empty($this->hits)) {
                $this->hits = 0;
            }
        }

        $this->updated_at = $currentDateTime;

        /*
         * Jika status publik tetapi tanggal publikasi kosong,
         * gunakan tanggal saat data disimpan.
         */
        if (
            (int) $this->status === 1
            && empty($this->tanggal_publish)
        ) {
            $this->tanggal_publish = $currentDateTime;
        }

        return true;
    }

    /**
     * Validasi gambar tepat 470 × 277 piksel.
     */
    public function validateImageDimensions($attribute, $params)
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
                'File yang diunggah bukan gambar yang valid.'
            );

            return;
        }

        $width = (int) $imageInfo[0];
        $height = (int) $imageInfo[1];

        if ($width !== 1080 || $height !== 636) {
            $this->addError(
                $attribute,
                'Ukuran gambar wajib tepat 1080 × 636 piksel. '
                . 'Ukuran gambar yang dipilih adalah '
                . $width . ' × ' . $height . ' piksel.'
            );
        }
    }

    /**
     * Membuat slug unik.
     */
    protected function generateUniqueSlug($baseSlug)
    {
        if (empty($baseSlug)) {
            $baseSlug = 'berita';
        }

        $slug = $baseSlug;
        $counter = 2;

        while ($this->slugExists($slug)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Mengecek penggunaan slug.
     */
    protected function slugExists($slug)
    {
        $query = self::find()
            ->where([
                'slug' => $slug,
            ]);

        if (!$this->isNewRecord) {
            $query->andWhere([
                '<>',
                'id',
                $this->id,
            ]);
        }

        return $query->exists();
    }

    /**
     * Relasi kategori berita.
     */
    public function getKategori()
    {
        return $this->hasOne(
            KategoriBerita::className(),
            [
                'id' => 'kategori_id',
            ]
        );
    }

    /**
     * URL gambar berita.
     */
    public function getImageUrl()
    {
        if (empty($this->gambar)) {
            return Yii::$app->request->baseUrl
                . '/web/images/no-image.png';
        }

        return Yii::$app->request->baseUrl
            . '/web/uploads/berita/'
            . $this->gambar;
    }

    /**
     * Label status publikasi.
     */
    public function getStatusLabel()
    {
        return (int) $this->status === 1
            ? 'Publik'
            : 'Draft';
    }

    /**
     * Label berita utama.
     */
    public function getUtamaLabel()
    {
        return (int) $this->is_utama === 1
            ? 'Berita Utama'
            : 'Berita Biasa';
    }
}