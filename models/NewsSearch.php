<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_id', 'kategori_id', 'id', 'hits', 'likepost'], 'integer'],
            [['judul_berita', 'slug_berita', 'ringkasan', 'isi', 'gambar', 'tgl_berita', 'status', 'jenis_berita', 'headline', 'ket_foto', 'filepdf', 'sts_komen', 'pilihan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find()->orderBy(['berita_id' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'berita_id' => $this->berita_id,
            'tgl_berita' => $this->tgl_berita,
            'kategori_id' => $this->kategori_id,
            'id' => $this->id,
            'hits' => $this->hits,
            'likepost' => $this->likepost,
        ]);

        $query->andFilterWhere(['like', 'judul_berita', $this->judul_berita])
            ->andFilterWhere(['like', 'slug_berita', $this->slug_berita])
            ->andFilterWhere(['like', 'ringkasan', $this->ringkasan])
            ->andFilterWhere(['like', 'isi', $this->isi])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'jenis_berita', $this->jenis_berita])
            ->andFilterWhere(['like', 'headline', $this->headline])
            ->andFilterWhere(['like', 'ket_foto', $this->ket_foto])
            ->andFilterWhere(['like', 'filepdf', $this->filepdf])
            ->andFilterWhere(['like', 'sts_komen', $this->sts_komen])
            ->andFilterWhere(['like', 'pilihan', $this->pilihan]);

        return $dataProvider;
    }
}
