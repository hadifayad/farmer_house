<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planting_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Plants[] $plants
 * @property UserPlants[] $userPlants
 */
class PlantingType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planting_type';
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
        return $this->hasMany(Plants::className(), ['planting_type' => 'id']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants()
    {
        return $this->hasMany(UserPlants::className(), ['plantingTypeId' => 'id']);
    }
}
