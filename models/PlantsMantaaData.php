<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants_mantaa_data".
 *
 * @property int $id
 * @property int $r_mantaa_id
 * @property int $r_plant_id
 *
 * @property Mantaa $rMantaa
 * @property Plants $rPlant
 */
class PlantsMantaaData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants_mantaa_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_mantaa_id', 'r_plant_id'], 'required'],
            [['r_mantaa_id', 'r_plant_id'], 'integer'],
            [['r_mantaa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mantaa::className(), 'targetAttribute' => ['r_mantaa_id' => 'id']],
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
            'r_mantaa_id' => 'R Mantaa ID',
            'r_plant_id' => 'R Plant ID',
        ];
    }

    /**
     * Gets query for [[RMantaa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRMantaa()
    {
        return $this->hasOne(Mantaa::className(), ['id' => 'r_mantaa_id']);
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
