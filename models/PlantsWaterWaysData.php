<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants_water_ways_data".
 *
 * @property int $id
 * @property int $r_water_ways_id
 * @property int $r_plant_id
 *
 * @property Plants $rPlant
 * @property WaterType $rWaterWays
 */
class PlantsWaterWaysData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants_water_ways_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_water_ways_id', 'r_plant_id'], 'required'],
            [['r_water_ways_id', 'r_plant_id'], 'integer'],
            [['r_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plants::className(), 'targetAttribute' => ['r_plant_id' => 'id']],
            [['r_water_ways_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterType::className(), 'targetAttribute' => ['r_water_ways_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'r_water_ways_id' => 'R Water Ways ID',
            'r_plant_id' => 'R Plant ID',
        ];
    }

    /**
     * Gets query for [[RPlant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRPlant()
    {
        return $this->hasOne(Plants::className(), ['id' => 'r_plant_id']);
    }

    /**
     * Gets query for [[RWaterWays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRWaterWays()
    {
        return $this->hasOne(WaterType::className(), ['id' => 'r_water_ways_id']);
    }
}
