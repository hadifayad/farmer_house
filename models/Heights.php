<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "heights".
 *
 * @property int $id
 * @property string $name
 *
 * @property Plants[] $plants
 * @property UserPlants[] $userPlants
 */
class Heights extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'heights';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
        return $this->hasMany(Plants::className(), ['height' => 'id']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants()
    {
        return $this->hasMany(UserPlants::className(), ['heightId' => 'id']);
    }
}
