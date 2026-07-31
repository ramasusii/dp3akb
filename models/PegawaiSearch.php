<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PegawaiSearch extends Pegawai
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
                    'nama',
                    'nip',
                    'jenis_pegawai',
                    'jabatan',
                    'pangkat_golongan',
                    'unit_kerja',
                    'email',
                    'whatsapp',
                    'foto',
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
        $query = Pegawai::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 15,
            ],

            'sort' => [
                'defaultOrder' => [
                    'urutan' => SORT_ASC,
                    'nama' => SORT_ASC,
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
                'nama',
                $this->nama,
            ])
            ->andFilterWhere([
                'like',
                'nip',
                $this->nip,
            ])
            ->andFilterWhere([
                'jenis_pegawai' => $this->jenis_pegawai,
            ])
            ->andFilterWhere([
                'like',
                'jabatan',
                $this->jabatan,
            ])
            ->andFilterWhere([
                'like',
                'pangkat_golongan',
                $this->pangkat_golongan,
            ])
            ->andFilterWhere([
                'like',
                'unit_kerja',
                $this->unit_kerja,
            ])
            ->andFilterWhere([
                'like',
                'email',
                $this->email,
            ])
            ->andFilterWhere([
                'like',
                'whatsapp',
                $this->whatsapp,
            ]);

        return $dataProvider;
    }
}