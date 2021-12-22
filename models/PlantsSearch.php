<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plants;

/**
 * PlantsSearch represents the model behind the search form of `app\models\Plants`.
 */
class PlantsSearch extends Plants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'height', 'plants_types_id'], 'integer'],
            [['name', 'temp', 'water', 'pic', 'info', 'tools', 'water_ways'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Plants::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'height' => $this->height,
            'plants_types_id' => $this->plants_types_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'temp', $this->temp])
            ->andFilterWhere(['like', 'water', $this->water])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'tools', $this->tools])
            ->andFilterWhere(['like', 'water_ways', $this->water_ways]);

        return $dataProvider;
    }
}
