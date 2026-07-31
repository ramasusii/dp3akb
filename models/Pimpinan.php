<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_pimpinan".
 *
 * @property int $id
 * @property string $nama
 * @property string $jabatan
 * @property string|null $foto
 * @property string|null $quote
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Pimpinan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pimpinan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jabatan'], 'required'],
            [['quote'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'jabatan', 'foto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
            'foto' => 'Foto',
            'quote' => 'Quote',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
