<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class KategoriEdukasiSearch extends KategoriEdukasi
{
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'urutan',
                    'status',
                ],
                'integer',
            ],

            [
                [
                    'nama_kategori',
                    'slug',
                    'deskripsi',
                    'ikon',
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = KategoriEdukasi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 15,
            ],

            'sort' => [
                'defaultOrder' => [
                    'urutan' => SORT_ASC,
                    'nama_kategori' => SORT_ASC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'urutan' => $this->urutan,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
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
            ])
            ->andFilterWhere([
                'like',
                'deskripsi',
                $this->deskripsi,
            ])
            ->andFilterWhere([
                'like',
                'ikon',
                $this->ikon,
            ]);

        return $dataProvider;
    }
}