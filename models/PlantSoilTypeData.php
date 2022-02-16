<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plant_soil_type_data".
 *
 * @property int $id
 * @property int $r_soil_type_id
 * @property int $r_plant_id
 *
 * @property Plants $rPlant
 * @property SoilType $rSoilType
 */
class PlantSoilTypeData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plant_soil_type_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_soil_type_id', 'r_plant_id'], 'required'],
            [['r_soil_type_id', 'r_plant_id'], 'integer'],
            [['r_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plants::className(), 'targetAttribute' => ['r_plant_id' => 'id']],
            [['r_soil_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SoilType::className(), 'targetAttribute' => ['r_soil_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'r_soil_type_id' => 'R Soil Type ID',
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
     * Gets query for [[RSoilType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRSoilType()
    {
        return $this->hasOne(SoilType::className(), ['id' => 'r_soil_type_id']);
    }
}
