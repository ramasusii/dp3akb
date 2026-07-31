<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Banner;

class BannerSearch extends Banner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'urutan', 'status'], 'integer'],

            [
                [
                    'judul',
                    'deskripsi',
                    'gambar',
                    'link',
                    'button_text',
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Pencarian data banner.
     */
    public function search($params)
    {
        $query = Banner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'urutan' => SORT_ASC,
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
            'urutan' => $this->urutan,
            'status' => $this->status,
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
                'deskripsi',
                $this->deskripsi,
            ])
            ->andFilterWhere([
                'like',
                'gambar',
                $this->gambar,
            ])
            ->andFilterWhere([
                'like',
                'link',
                $this->link,
            ])
            ->andFilterWhere([
                'like',
                'button_text',
                $this->button_text,
            ]);

        return $dataProvider;
    }
}