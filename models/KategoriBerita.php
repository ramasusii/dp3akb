<?php

namespace app\models;

use Yii;
use yii\helpers\Inflector;

/**
 * Model untuk tabel "tbl_kategori_berita".
 *
 * @property int $id
 * @property string $nama_kategori
 * @property string $slug
 * @property int|null $status
 * @property string|null $created_at
 *
 * @property BeritaDp3akb[] $beritas
 */
class KategoriBerita extends \yii\db\ActiveRecord
{
    /**
     * Nama tabel database.
     */
    public static function tableName()
    {
        return 'tbl_kategori_berita';
    }

    /**
     * Rules validasi.
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'required'],

            [['status'], 'integer'],

            [['created_at'], 'safe'],

            [['nama_kategori', 'slug'], 'string', 'max' => 100],

            [['nama_kategori'], 'trim'],

            [['slug'], 'trim'],

            [
                ['nama_kategori'],
                'unique',
                'message' => 'Nama kategori berita sudah digunakan.',
            ],

            [
                ['slug'],
                'unique',
                'message' => 'Slug kategori sudah digunakan.',
            ],

            [
                ['status'],
                'default',
                'value' => 1,
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
            'nama_kategori' => 'Nama Kategori',
            'slug' => 'Slug',
            'status' => 'Status',
            'created_at' => 'Dibuat Pada',
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

        if (!empty($this->nama_kategori)) {
            /*
             * Slug selalu mengikuti nama kategori.
             *
             * Contoh:
             * Perlindungan Anak
             * menjadi:
             * perlindungan-anak
             */
            $baseSlug = Inflector::slug(
                strtolower(trim($this->nama_kategori))
            );

            $this->slug = $this->generateUniqueSlug($baseSlug);
        }

        return true;
    }

    /**
     * Set created_at otomatis saat insert.
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert && empty($this->created_at)) {
            $this->created_at = date('Y-m-d H:i:s');
        }

        return true;
    }

    /**
     * Membuat slug unik.
     *
     * Misalnya:
     * berita
     * berita-2
     * berita-3
     */
    protected function generateUniqueSlug($baseSlug)
    {
        if (empty($baseSlug)) {
            $baseSlug = 'kategori';
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
     * Mengecek apakah slug sudah digunakan.
     */
    protected function slugExists($slug)
    {
        $query = self::find()
            ->where(['slug' => $slug]);

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
     * Relasi kategori ke berita.
     */
    public function getBeritas()
    {
        return $this->hasMany(
            BeritaDp3akb::className(),
            ['kategori_id' => 'id']
        );
    }

    /**
     * Jumlah berita yang memakai kategori.
     */
    public function getJumlahBerita()
    {
        return $this->getBeritas()->count();
    }

    /**
     * Label status kategori.
     */
    public function getStatusLabel()
    {
        return (int) $this->status === 1
            ? 'Aktif'
            : 'Tidak Aktif';
    }
}