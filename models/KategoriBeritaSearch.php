<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class KategoriBeritaSearch extends KategoriBerita
{
    /**
     * Rules pencarian.
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],

            [
                [
                    'nama_kategori',
                    'slug',
                    'created_at',
                ],
                'safe',
            ],
        ];
    }

    /**
     * Skenario pencarian.
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Pencarian kategori berita.
     */
    public function search($params)
    {
        $query = KategoriBerita::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 10,
            ],

            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query
            ->andFilterWhere([
                'like',
                'nama_kategori',
                $this->nama_kategori,
            ])
            ->andFilterWhere([
                'like',
                'slug',
                $this->slug,
            ]);

        return $dataProvider;
    }
}