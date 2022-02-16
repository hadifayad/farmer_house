<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants_mawsem_data".
 *
 * @property int $id
 * @property int $r_mawsem_id
 * @property int $r_plant_id
 *
 * @property Mawsem $rMawsem
 * @property Plants $rPlant
 */
class PlantsMawsemData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants_mawsem_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['r_mawsem_id', 'r_plant_id'], 'required'],
            [['r_mawsem_id', 'r_plant_id'], 'integer'],
            [['r_mawsem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mawsem::className(), 'targetAttribute' => ['r_mawsem_id' => 'id']],
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
            'r_mawsem_id' => 'R Mawsem ID',
            'r_plant_id' => 'R Plant ID',
        ];
    }

    /**
     * Gets query for [[RMawsem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRMawsem()
    {
        return $this->hasOne(Mawsem::className(), ['id' => 'r_mawsem_id']);
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
