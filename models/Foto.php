<?php

namespace app\models;
use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "tbl_foto".
 *
 * @property int $id
 * @property string $judul
 * @property string|null $foto
 * @property string|null $tanggal
 * @property string|null $tanggal_publish
 * @property int|null $status
 * @property string|null $deskripsi
 * @property float|null $foto_ukuran
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul'], 'required'],
            [['judul', 'foto', 'deskripsi'], 'string'],
            [['tanggal', 'tanggal_publish'], 'safe'],
            [['status'], 'integer'],
            [['foto_ukuran'], 'number'],
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
            'foto' => 'Foto',
            'tanggal' => 'Tanggal',
            'tanggal_publish' => 'Tanggal Publish',
            'status' => 'Status',
            'deskripsi' => 'Deskripsi',
            'foto_ukuran' => 'Foto Ukuran',
        ];
    }

    
    public function getImageUrl()
    {
        return Yii::$app->request->baseUrl . '/web/uploads/foto/' . Html::encode($this->foto);
    }
}
