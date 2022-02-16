<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants_plant_types_data".
 *
 * @property int $id
 * @property int $r_plants_types_id
 * @property int $r_plant_id
 *
 * @property Plants $rPlant
 * @property PlantingType $rPlantsTypes
 */
class PlantsPlantTypesData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants_plant_types_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_plants_types_id', 'r_plant_id'], 'required'],
            [['r_plants_types_id', 'r_plant_id'], 'integer'],
            [['r_plants_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlantingType::className(), 'targetAttribute' => ['r_plants_types_id' => 'id']],
            [['r_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plants::className(), 'targetAttribute' => ['r_plant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'r_plants_types_id' => 'R Plants Types ID',
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
     * Gets query for [[RPlantsTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRPlantsTypes()
    {
        return $this->hasOne(PlantingType::className(), ['id' => 'r_plants_types_id']);
    }
}
