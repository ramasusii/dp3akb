<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProfilList;

/**
 * ProfilListSearch represents the model behind the search form about `app\models\ProfilList`.
 */
class ProfilListSearch extends ProfilList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'list_data', 'tanggal', 'images', 'link', 'field'], 'safe'],
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
        $query = ProfilList::find()->where(['status' => 1])->orderBy(['order' => SORT_ASC]);

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
            'id' => $this->id,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'list_data', $this->list_data])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'field', $this->field]);

        return $dataProvider;
    }
}
