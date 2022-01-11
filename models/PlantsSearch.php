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
            [['id', 'data_id', 'height', 'mantaa', 'water_ways', 'plants_types_id', 'mawsem', 'planting_type', 'mazrouat_type', 'soil_type'], 'integer'],
            [['name'], 'safe'],
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
            'data_id' => $this->data_id,
            'height' => $this->height,
            'mantaa' => $this->mantaa,
            'water_ways' => $this->water_ways,
            'plants_types_id' => $this->plants_types_id,
            'mawsem' => $this->mawsem,
            'planting_type' => $this->planting_type,
            'mazrouat_type' => $this->mazrouat_type,
            'soil_type' => $this->soil_type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
