<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_ebook".
 *
 * @property int $id
 * @property string $judul
 * @property string $file_path
 * @property string|null $tahun
 * @property string|null $deskripsi
 * @property int|null $urutan
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Ebook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ebook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'file_path'], 'required'],
            [['tahun', 'created_at', 'updated_at'], 'safe'],
            [['deskripsi'], 'string'],
            [['urutan', 'status'], 'integer'],
            [['judul', 'file_path'], 'string', 'max' => 255],
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
            'file_path' => 'File Path',
            'tahun' => 'Tahun',
            'deskripsi' => 'Deskripsi',
            'urutan' => 'Urutan',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
