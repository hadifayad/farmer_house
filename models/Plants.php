<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants".
 *
 * @property int $id
 * @property string $name
 * @property int $height
 * @property string $temp
 * @property string $water
 * @property string $pic
 * @property string $info
 * @property string $tools
 * @property string $water_ways
 * @property int $plants_types_id
 *
 * @property PlantsTypes $plantsTypes
 * @property UserPlants[] $userPlants
 */
class Plants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'height', 'temp', 'water', 'pic', 'info', 'tools', 'water_ways', 'plants_types_id'], 'required'],
            [['height', 'plants_types_id'], 'integer'],
            [['info'], 'string'],
            [['name', 'temp', 'water', 'pic', 'tools', 'water_ways'], 'string', 'max' => 255],
            [['plants_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlantsTypes::className(), 'targetAttribute' => ['plants_types_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'height' => Yii::t('app', 'Height'),
            'temp' => Yii::t('app', 'Temp'),
            'water' => Yii::t('app', 'Water'),
            'pic' => Yii::t('app', 'Pic'),
            'info' => Yii::t('app', 'Info'),
            'tools' => Yii::t('app', 'Tools'),
            'water_ways' => Yii::t('app', 'Water Ways'),
            'plants_types_id' => Yii::t('app', 'Plants Types ID'),
        ];
    }

    /**
     * Gets query for [[PlantsTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsTypes()
    {
        return $this->hasOne(PlantsTypes::className(), ['id' => 'plants_types_id']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants()
    {
        return $this->hasMany(UserPlants::className(), ['plant_id' => 'id']);
    }
}
