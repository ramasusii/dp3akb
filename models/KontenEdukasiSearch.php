<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class KontenEdukasiSearch extends KontenEdukasi
{
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'kategori_id',
                    'hits',
                    'jumlah_download',
                    'is_utama',
                    'status',
                    'jumlah_halaman',
                    'tahun_terbit',
                ],
                'integer',
            ],

            [
                [
                    'jenis_konten',
                    'judul',
                    'slug',
                    'ringkasan',
                    'penulis',
                    'penerbit',
                    'tanggal_publish',
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
        $query = KontenEdukasi::find()
            ->with('kategori');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 15,
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
            'jenis_konten' => $this->jenis_konten,
            'status' => $this->status,
            'is_utama' => $this->is_utama,
            'tahun_terbit' => $this->tahun_terbit,
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
                'penulis',
                $this->penulis,
            ])
            ->andFilterWhere([
                'like',
                'penerbit',
                $this->penerbit,
            ]);

        return $dataProvider;
    }
}