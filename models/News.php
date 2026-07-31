<?php

namespace app\models;
use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property int $berita_id
 * @property string|null $judul_berita
 * @property string|null $slug_berita
 * @property string|null $ringkasan
 * @property string|null $isi
 * @property string|null $gambar
 * @property string|null $tgl_berita
 * @property string|null $status
 * @property int|null $kategori_id
 * @property int|null $id
 * @property string|null $jenis_berita
 * @property int|null $hits
 * @property int|null $likepost
 * @property string|null $headline
 * @property string|null $ket_foto
 * @property string|null $filepdf
 * @property string|null $sts_komen
 * @property string|null $pilihan
 *
 * @property Kategori $kategori
 * @property Users2 $id0
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isi'], 'string'],
            [['tgl_berita'], 'safe'],
            [['kategori_id', 'id', 'hits', 'likepost'], 'integer'],
            [['judul_berita'], 'string', 'max' => 200],
            [['slug_berita'], 'string', 'max' => 250],
            [['ringkasan'], 'string', 'max' => 500],
            [['gambar'], 'string', 'max' => 150], // cukup validasi string
            [['status'], 'string', 'max' => 5],
            [['jenis_berita'], 'string', 'max' => 20],
            [['headline', 'sts_komen', 'pilihan'], 'string', 'max' => 1],
            [['ket_foto'], 'string', 'max' => 255],
            [['filepdf'], 'string', 'max' => 100],

            // HAPUS BARIS INI:
            // [['gambar'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024*1024*2, 'skipOnEmpty' => true],

            [['gambar'], 'safe'], // tetap butuh ini agar bisa di-load dari POST

            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategori_id' => 'kategori_id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'berita_id' => 'Berita ID',
            'judul_berita' => 'Judul Berita',
            'slug_berita' => 'Slug Berita',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'gambar' => 'Gambar',
            'tgl_berita' => 'Tgl Berita',
            'status' => 'Status',
            'kategori_id' => 'Kategori',
            'id' => 'ID',
            'jenis_berita' => 'Jenis Berita',
            'hits' => 'Hits',
            'likepost' => 'Likepost',
            'headline' => 'Headline',
            'ket_foto' => 'Keterangan Foto',
            'filepdf' => 'Filepdf',
            'sts_komen' => 'Sts Komen',
            'pilihan' => 'Pilihan',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['kategori_id' => 'kategori_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    public function getImageUrl()
    {
        return Yii::$app->request->baseUrl . '/web/uploads/berita/' . Html::encode($this->gambar);
    }

    public function getFormattedDate()
    {
         if ($this->tgl_berita) {
             $date = new \DateTime($this->tgl_berita);
             // Format tanggal sesuai keinginan, misal: 24 Mar 2025
             return $date->format('d M Y');
         }
         return 'Tanggal Tidak Diketahui';
    }

}
