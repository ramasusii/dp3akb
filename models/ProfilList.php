<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_profil_list".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $list_data
 * @property string|null $tanggal
 * @property string|null $images
 * @property string|null $link
 * @property string|null $field
 */
class ProfilList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_profil_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['list_data', 'images', 'link','link2', 'data','data2','data3','data4'], 'string'],
            [['tanggal'], 'safe'],
            [['name', 'field'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'list_data' => 'List Data',
            'tanggal' => 'Tanggal',
            'images' => 'Images',
            'link' => 'Link',
            'field' => 'Field',
        ];
    }
}
