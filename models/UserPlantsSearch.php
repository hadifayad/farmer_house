<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserPlants;

/**
 * UserPlantsSearch represents the model behind the search form of `app\models\UserPlants`.
 */
class UserPlantsSearch extends UserPlants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'plant_id', 'heightId', 'plantingTypeId', 'plantsTypeId', 'waterTypeId', 'soilTypeId', 'mantaaId', 'mazrouatTypeId', 'mawsem_id'], 'integer'],
            [['date'], 'safe'],
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
        $query = UserPlants::find();

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
            'user_id' => $this->user_id,
            'plant_id' => $this->plant_id,
            'heightId' => $this->heightId,
            'plantingTypeId' => $this->plantingTypeId,
            'plantsTypeId' => $this->plantsTypeId,
            'waterTypeId' => $this->waterTypeId,
            'soilTypeId' => $this->soilTypeId,
            'mantaaId' => $this->mantaaId,
            'mazrouatTypeId' => $this->mazrouatTypeId,
            'mawsem_id' => $this->mawsem_id,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
