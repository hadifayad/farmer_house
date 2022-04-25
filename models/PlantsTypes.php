<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants_types".
 *
 * @property int $id
 * @property string $name
 *
 * @property Plants[] $plants
 * @property UserPlants[] $userPlants
 * @property UserPlants[] $userPlants0
 */
class PlantsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Plants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlants()
    {
        return $this->hasMany(Plants::className(), ['plants_types_id' => 'id']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants()
    {
        return $this->hasMany(UserPlants::className(), ['soilTypeId' => 'id']);
    }

    /**
     * Gets query for [[UserPlants0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants0()
    {
        return $this->hasMany(UserPlants::className(), ['plantsTypeId' => 'id']);
    }
}
