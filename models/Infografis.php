<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_infografis".
 *
 * @property int $id
 * @property string $judul
 * @property string $gambar
 * @property string|null $deskripsi
 * @property int|null $urutan
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Infografis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_infografis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'gambar'], 'required'],
            [['deskripsi'], 'string'],
            [['urutan', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul', 'gambar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'gambar' => 'Gambar',
            'deskripsi' => 'Deskripsi',
            'urutan' => 'Urutan',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
