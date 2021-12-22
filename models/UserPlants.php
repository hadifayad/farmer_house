<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_plants".
 *
 * @property int $id
 * @property int $user_id
 * @property int $plant_id
 *
 * @property Plants $plant
 * @property User $user
 */
class UserPlants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_plants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'plant_id'], 'required'],
            [['user_id', 'plant_id'], 'integer'],
            [['plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plants::className(), 'targetAttribute' => ['plant_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'plant_id' => Yii::t('app', 'Plant ID'),
        ];
    }

    /**
     * Gets query for [[Plant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlant()
    {
        return $this->hasOne(Plants::className(), ['id' => 'plant_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
