<?php

namespace app\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

/**
 * Model untuk tabel "tbl_konten_edukasi".
 *
 * @property int $id
 * @property int $kategori_id
 * @property string $jenis_konten
 * @property string $judul
 * @property string $slug
 * @property string $ringkasan
 * @property string|null $isi
 * @property string|null $thumbnail
 * @property string|null $youtube_url
 * @property string|null $file_media
 * @property string|null $nama_file_asli
 * @property int|null $ukuran_file
 * @property int|null $jumlah_halaman
 * @property string|null $durasi_video
 * @property string|null $sumber
 * @property string|null $penulis
 * @property string|null $penerbit
 * @property int|null $tahun_terbit
 * @property int $hits
 * @property int $jumlah_download
 * @property int $is_utama
 * @property int $status
 * @property string|null $tanggal_publish
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property KategoriEdukasi $kategori
 */
class KontenEdukasi extends \yii\db\ActiveRecord
{
    /**
     * Upload thumbnail sementara.
     *
     * @var UploadedFile|null
     */
    public $thumbnailFile;

    /**
     * Upload file infografis atau ebook.
     *
     * @var UploadedFile|null
     */
    public $mediaFile;

    public static function tableName()
    {
        return 'tbl_konten_edukasi';
    }

    public function rules()
    {
        return [
            [
                [
                    'kategori_id',
                    'jenis_konten',
                    'judul',
                    'ringkasan',
                ],
                'required',
            ],

            [
                [
                    'kategori_id',
                    'jumlah_halaman',
                    'tahun_terbit',
                    'hits',
                    'jumlah_download',
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
                    'thumbnail',
                    'file_media',
                    'nama_file_asli',
                    'sumber',
                    'penulis',
                    'penerbit',
                ],
                'string',
                'max' => 255,
            ],

            [
                [
                    'slug',
                ],
                'string',
                'max' => 280,
            ],

            [
                [
                    'jenis_konten',
                    'durasi_video',
                ],
                'string',
                'max' => 50,
            ],

            [
                [
                    'youtube_url',
                ],
                'string',
                'max' => 500,
            ],

            [
                [
                    'judul',
                    'jenis_konten',
                    'youtube_url',
                ],
                'trim',
            ],

            [
                [
                    'jenis_konten',
                ],
                'in',
                'range' => [
                    'video',
                    'infografis',
                    'ebook',
                ],
                'message' => 'Jenis konten tidak valid.',
            ],

            [
                [
                    'slug',
                ],
                'unique',
                'message' => 'Slug konten edukasi sudah digunakan.',
            ],

            [
                [
                    'kategori_id',
                ],
                'exist',
                'skipOnError' => true,
                'targetClass' => KategoriEdukasi::className(),
                'targetAttribute' => [
                    'kategori_id' => 'id',
                ],
                'message' => 'Kategori edukasi tidak ditemukan.',
            ],

            [
                [
                    'youtube_url',
                ],
                'url',
                'defaultScheme' => 'https',
                'skipOnEmpty' => true,
                'message' => 'Tautan YouTube tidak valid.',
            ],

            [
                [
                    'youtube_url',
                ],
                'validateYoutubeUrl',
                'skipOnEmpty' => true,
            ],

            [
                [
                    'hits',
                    'jumlah_download',
                    'is_utama',
                ],
                'default',
                'value' => 0,
            ],

            [
                [
                    'status',
                ],
                'default',
                'value' => 1,
            ],

            [
                [
                    'thumbnailFile',
                ],
                'file',
                'skipOnEmpty' => true,
                'extensions' => [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                ],
                'checkExtensionByMimeType' => true,
                'maxSize' => 2 * 1024 * 1024,
                'tooBig' => 'Ukuran thumbnail maksimal 2 MB.',
                'wrongExtension'
                    => 'Thumbnail harus JPG, JPEG, PNG, atau WEBP.',
                'wrongMimeType'
                    => 'File thumbnail bukan gambar yang valid.',
            ],

            [
                [
                    'thumbnailFile',
                ],
                'validateThumbnailDimensions',
                'skipOnEmpty' => true,
            ],

            [
                [
                    'mediaFile',
                ],
                'file',
                'skipOnEmpty' => true,
                'extensions' => [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                    'pdf',
                ],
                'checkExtensionByMimeType' => true,
                'maxSize' => 15 * 1024 * 1024,
                'tooBig' => 'Ukuran file maksimal 15 MB.',
                'wrongExtension'
                    => 'File harus berupa JPG, JPEG, PNG, WEBP, atau PDF.',
                'wrongMimeType'
                    => 'File media tidak valid.',
            ],

            [
                [
                    'mediaFile',
                ],
                'validateMediaFile',
                'skipOnEmpty' => true,
            ],

            [
                [
                    'youtube_url',
                ],
                'required',
                'when' => function ($model) {
                    return $model->jenis_konten === 'video';
                },
                'whenClient' => "
                    function (attribute, value) {
                        return $('#kontenedukasi-jenis_konten').val()
                            === 'video';
                    }
                ",
                'message' => 'Tautan YouTube wajib diisi untuk video.',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_id' => 'Kategori Edukasi',
            'jenis_konten' => 'Jenis Konten',
            'judul' => 'Judul Konten',
            'slug' => 'Slug',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi atau Deskripsi',
            'thumbnail' => 'Thumbnail',
            'thumbnailFile' => 'Upload Thumbnail',
            'youtube_url' => 'Tautan YouTube',
            'file_media' => 'File Media',
            'mediaFile' => 'Upload File',
            'nama_file_asli' => 'Nama File Asli',
            'ukuran_file' => 'Ukuran File',
            'jumlah_halaman' => 'Jumlah Halaman',
            'durasi_video' => 'Durasi Video',
            'sumber' => 'Sumber',
            'penulis' => 'Penulis',
            'penerbit' => 'Penerbit',
            'tahun_terbit' => 'Tahun Terbit',
            'hits' => 'Jumlah Dilihat',
            'jumlah_download' => 'Jumlah Download',
            'is_utama' => 'Konten Utama',
            'status' => 'Status',
            'tanggal_publish' => 'Tanggal Publikasi',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    public function beforeValidate()
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        if (!empty($this->judul)) {
            $baseSlug = Inflector::slug(
                strtolower(
                    trim($this->judul)
                )
            );

            $this->slug = $this->generateUniqueSlug(
                $baseSlug
            );
        }

        return true;
    }

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

            if (empty($this->jumlah_download)) {
                $this->jumlah_download = 0;
            }
        }

        $this->updated_at = $currentDateTime;

        if (
            (int) $this->status === 1
            && empty($this->tanggal_publish)
        ) {
            $this->tanggal_publish = $currentDateTime;
        }

        return true;
    }

    public function validateYoutubeUrl($attribute, $params)
    {
        if (
            $this->hasErrors($attribute)
            || empty($this->$attribute)
        ) {
            return;
        }

        $videoId = $this->extractYoutubeId(
            $this->$attribute
        );

        if ($videoId === null) {
            $this->addError(
                $attribute,
                'Tautan YouTube tidak dapat dikenali.'
            );
        }
    }

    public function validateThumbnailDimensions(
        $attribute,
        $params
    ) {
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
                'File thumbnail bukan gambar yang valid.'
            );

            return;
        }

        $width = (int) $imageInfo[0];
        $height = (int) $imageInfo[1];

        if ($width < 800 || $height < 450) {
            $this->addError(
                $attribute,
                'Ukuran thumbnail minimal 800 × 450 piksel. '
                . 'Ukuran file saat ini '
                . $width . ' × ' . $height . ' piksel.'
            );
        }

        $ratio = $width / $height;
        $targetRatio = 16 / 9;

        if (abs($ratio - $targetRatio) > 0.08) {
            $this->addError(
                $attribute,
                'Thumbnail disarankan menggunakan rasio 16:9.'
            );
        }
    }

    public function validateMediaFile(
        $attribute,
        $params
    ) {
        if (
            $this->hasErrors($attribute)
            || empty($this->$attribute)
        ) {
            return;
        }

        $extension = strtolower(
            $this->$attribute->extension
        );

        if (
            $this->jenis_konten === 'ebook'
            && $extension !== 'pdf'
        ) {
            $this->addError(
                $attribute,
                'File e-book wajib berupa PDF.'
            );
        }

        if (
            $this->jenis_konten === 'infografis'
            && !in_array(
                $extension,
                [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                ],
                true
            )
        ) {
            $this->addError(
                $attribute,
                'Infografis wajib berupa gambar JPG, PNG, atau WEBP.'
            );
        }

        if (
            $this->jenis_konten === 'video'
            && !empty($this->$attribute)
        ) {
            $this->addError(
                $attribute,
                'Video menggunakan tautan YouTube, bukan upload file.'
            );
        }
    }

    protected function generateUniqueSlug($baseSlug)
    {
        if (empty($baseSlug)) {
            $baseSlug = 'konten-edukasi';
        }

        $slug = $baseSlug;
        $counter = 2;

        while ($this->slugExists($slug)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function slugExists($slug)
    {
        $query = self::find()->where([
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

    public function getKategori()
    {
        return $this->hasOne(
            KategoriEdukasi::className(),
            [
                'id' => 'kategori_id',
            ]
        );
    }

    public function getJenisLabel()
    {
        $labels = [
            'video' => 'Video Edukasi',
            'infografis' => 'Infografis',
            'ebook' => 'E-Book',
        ];

        return $labels[$this->jenis_konten]
            ?? 'Konten Edukasi';
    }

    public function getJenisIcon()
    {
        $icons = [
            'video' => 'bi-play-circle',
            'infografis' => 'bi-image',
            'ebook' => 'bi-book',
        ];

        return $icons[$this->jenis_konten]
            ?? 'bi-journal-text';
    }

    public function getStatusLabel()
    {
        return (int) $this->status === 1
            ? 'Publik'
            : 'Draft';
    }

    public function getUtamaLabel()
    {
        return (int) $this->is_utama === 1
            ? 'Konten Utama'
            : 'Konten Biasa';
    }

    public function getThumbnailUrl()
    {
        if (!empty($this->thumbnail)) {
            return Yii::$app->request->baseUrl
                . '/web/uploads/edukasi/thumbnail/'
                . $this->thumbnail;
        }

        if ($this->jenis_konten === 'video') {
            $youtubeThumbnail =
                $this->getYoutubeThumbnailUrl();

            if ($youtubeThumbnail !== null) {
                return $youtubeThumbnail;
            }
        }

        if (
            $this->jenis_konten === 'infografis'
            && !empty($this->file_media)
        ) {
            return Yii::$app->request->baseUrl
                . '/web/uploads/edukasi/infografis/'
                . $this->file_media;
        }

        return Yii::$app->request->baseUrl
            . '/web/images/no-image.png';
    }

    public function getMediaUrl()
    {
        if (empty($this->file_media)) {
            return null;
        }

        $folder = $this->jenis_konten === 'ebook'
            ? 'ebook'
            : 'infografis';

        return Yii::$app->request->baseUrl
            . '/web/uploads/edukasi/'
            . $folder
            . '/'
            . $this->file_media;
    }

    public function getYoutubeEmbedUrl()
    {
        $videoId = $this->extractYoutubeId(
            $this->youtube_url
        );

        if ($videoId === null) {
            return null;
        }

        return 'https://www.youtube.com/embed/'
            . $videoId;
    }

    public function getYoutubeThumbnailUrl()
    {
        $videoId = $this->extractYoutubeId(
            $this->youtube_url
        );

        if ($videoId === null) {
            return null;
        }

        return 'https://img.youtube.com/vi/'
            . $videoId
            . '/hqdefault.jpg';
    }

    public function extractYoutubeId($url)
    {
        if (empty($url)) {
            return null;
        }

        $patterns = [
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{6,})/',
            '/youtu\.be\/([a-zA-Z0-9_-]{6,})/',
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]{6,})/',
            '/youtube\.com\/shorts\/([a-zA-Z0-9_-]{6,})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    public function getUkuranFileLabel()
    {
        if (empty($this->ukuran_file)) {
            return '-';
        }

        $bytes = (int) $this->ukuran_file;

        if ($bytes >= 1024 * 1024) {
            return number_format(
                $bytes / (1024 * 1024),
                2,
                ',',
                '.'
            ) . ' MB';
        }

        return number_format(
            $bytes / 1024,
            2,
            ',',
            '.'
        ) . ' KB';
    }
}