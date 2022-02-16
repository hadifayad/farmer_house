<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plant_planting_type_data".
 *
 * @property int $id
 * @property int $r_planting_type_id
 * @property int $r_plant_id
 *
 * @property Plants $rPlant
 * @property PlantingType $rPlantingType
 */
class PlantPlantingTypeData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plant_planting_type_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_planting_type_id', 'r_plant_id'], 'required'],
            [['r_planting_type_id', 'r_plant_id'], 'integer'],
            [['r_planting_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlantingType::className(), 'targetAttribute' => ['r_planting_type_id' => 'id']],
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
            'r_planting_type_id' => 'R Planting Type ID',
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
     * Gets query for [[RPlantingType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRPlantingType()
    {
        return $this->hasOne(PlantingType::className(), ['id' => 'r_planting_type_id']);
    }
}
