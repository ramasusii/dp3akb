<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tbl_banner".
 *
 * @property int $id
 * @property string $judul
 * @property string|null $deskripsi
 * @property string $gambar
 * @property string|null $link
 * @property string|null $button_text
 * @property int|null $urutan
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * File upload sementara.
     *
     * @var UploadedFile|null
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul'], 'required'],

            [['deskripsi'], 'string'],

            [['urutan', 'status'], 'integer'],

            [['created_at', 'updated_at'], 'safe'],

            [['judul', 'gambar', 'link'], 'string', 'max' => 255],

            [['button_text'], 'string', 'max' => 100],

            [['urutan'], 'default', 'value' => 0],

            [['status'], 'default', 'value' => 1],

            [
                ['imageFile'],
                'file',
                'skipOnEmpty' => !$this->isNewRecord,
                'extensions' => ['jpg', 'jpeg', 'png', 'webp'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 1024 * 1024,
                'tooBig' => 'Ukuran gambar maksimal 1 MB.',
                'wrongExtension' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'wrongMimeType' => 'File yang dipilih bukan gambar yang valid.',
                'uploadRequired' => 'Gambar banner wajib diunggah.',
            ],

            [
                ['imageFile'],
                'validateImageDimensions',
                'skipOnEmpty' => true,
            ],
        ];
    }

    /**
     * Validasi ukuran gambar harus tepat 1600 x 686 piksel.
     */
    public function validateImageDimensions($attribute, $params)
    {
        if ($this->hasErrors($attribute) || empty($this->$attribute)) {
            return;
        }

        $imageInfo = @getimagesize($this->$attribute->tempName);

        if ($imageInfo === false) {
            $this->addError(
                $attribute,
                'File yang diunggah bukan gambar yang valid.'
            );

            return;
        }

        $width = (int) $imageInfo[0];
        $height = (int) $imageInfo[1];

        if ($width !== 1600 || $height !== 686) {
            $this->addError(
                $attribute,
                'Ukuran gambar wajib tepat 1600 x 686 piksel. '
                . 'Ukuran gambar yang dipilih adalah '
                . $width . ' x ' . $height . ' piksel.'
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul Banner',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'Gambar',
            'imageFile' => 'Upload Gambar Banner',
            'link' => 'Tautan',
            'button_text' => 'Teks Tombol',
            'urutan' => 'Urutan',
            'status' => 'Status',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    /**
     * URL gambar banner.
     */
    public function getImageUrl()
    {
        if (empty($this->gambar)) {
            return Yii::$app->request->baseUrl
                . '/web/images/no-image.png';
        }

        return Yii::$app->request->baseUrl
            . '/web/uploads/banner/'
            . $this->gambar;
    }
    /**
     * Label status.
     */
    public function getStatusLabel()
    {
        return (int) $this->status === 1
            ? 'Aktif'
            : 'Tidak Aktif';
    }
}