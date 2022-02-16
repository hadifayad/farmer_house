<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plant_mazrouat_type_data".
 *
 * @property int $id
 * @property int $r_mazrouat_type_id
 * @property int $r_plant_id
 *
 * @property MazrouatType $rMazrouatType
 * @property Plants $rPlant
 */
class PlantMazrouatTypeData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plant_mazrouat_type_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_mazrouat_type_id', 'r_plant_id'], 'required'],
            [['r_mazrouat_type_id', 'r_plant_id'], 'integer'],
            [['r_mazrouat_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MazrouatType::className(), 'targetAttribute' => ['r_mazrouat_type_id' => 'id']],
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
            'r_mazrouat_type_id' => 'R Mazrouat Type ID',
            'r_plant_id' => 'R Plant ID',
        ];
    }

    /**
     * Gets query for [[RMazrouatType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRMazrouatType()
    {
        return $this->hasOne(MazrouatType::className(), ['id' => 'r_mazrouat_type_id']);
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
}
