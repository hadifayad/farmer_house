<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MandoobAked;

/**
 * MandoobAkedSearch represents the model behind the search form of `app\models\MandoobAked`.
 */
class MandoobAkedSearch extends MandoobAked
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'farmerId', 'mandoubId'], 'integer'],
            [['place', 'quantity', 'type', 'price', 'tesleem_place', 'date', 'notes'], 'safe'],
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
        $query = MandoobAked::find();

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
            'farmerId' => $this->farmerId,
            'mandoubId' => $this->mandoubId,
        ]);

        $query->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'tesleem_place', $this->tesleem_place])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
