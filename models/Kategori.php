<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property int $kategori_id
 * @property string|null $nama_kategori
 * @property string|null $slug_kategori
 *
 * @property Berita[] $beritas
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kategori', 'slug_kategori'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategori_id' => 'Kategori ID',
            'nama_kategori' => 'Nama Kategori',
            'slug_kategori' => 'Slug Kategori',
        ];
    }

    /**
     * Gets query for [[Beritas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['kategori_id' => 'kategori_id']);
    }
}
