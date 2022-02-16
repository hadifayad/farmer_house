<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants_height_data".
 *
 * @property int $id
 * @property int $r_plant_id
 * @property int $r_height_id
 *
 * @property Heights $rHeight
 * @property Plants $rPlant
 */
class PlantsHeightData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants_height_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_plant_id', 'r_height_id'], 'required'],
            [['r_plant_id', 'r_height_id'], 'integer'],
            [['r_height_id'], 'exist', 'skipOnError' => true, 'targetClass' => Heights::className(), 'targetAttribute' => ['r_height_id' => 'id']],
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
            'r_plant_id' => 'R Plant ID',
            'r_height_id' => 'R Height ID',
        ];
    }

    /**
     * Gets query for [[RHeight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRHeight()
    {
        return $this->hasOne(Heights::className(), ['id' => 'r_height_id']);
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
