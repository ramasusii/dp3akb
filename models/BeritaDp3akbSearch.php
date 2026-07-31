<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BeritaDp3akbSearch extends BeritaDp3akb
{
    /**
     * Rules pencarian.
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'kategori_id',
                    'hits',
                    'is_utama',
                    'status',
                ],
                'integer',
            ],

            [
                [
                    'judul',
                    'slug',
                    'ringkasan',
                    'isi',
                    'gambar',
                    'tanggal_publish',
                    'created_at',
                    'updated_at',
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
     * Pencarian data berita.
     */
    public function search($params)
    {
        $query = BeritaDp3akb::find()
            ->with('kategori');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 10,
            ],

            'sort' => [
                'defaultOrder' => [
                    'tanggal_publish' => SORT_DESC,
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
            'kategori_id' => $this->kategori_id,
            'hits' => $this->hits,
            'is_utama' => $this->is_utama,
            'status' => $this->status,
            'tanggal_publish' => $this->tanggal_publish,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query
            ->andFilterWhere([
                'like',
                'judul',
                $this->judul,
            ])
            ->andFilterWhere([
                'like',
                'slug',
                $this->slug,
            ])
            ->andFilterWhere([
                'like',
                'ringkasan',
                $this->ringkasan,
            ])
            ->andFilterWhere([
                'like',
                'isi',
                $this->isi,
            ])
            ->andFilterWhere([
                'like',
                'gambar',
                $this->gambar,
            ]);

        return $dataProvider;
    }
}