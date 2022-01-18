<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "farmer_file".
 *
 * @property int $id
 * @property int $userId
 * @property string|null $land_village
 * @property string|null $land_height
 * @property string|null $land_state
 * @property string|null $land_id
 * @property int|null $land_area
 * @property string|null $land_water
 * @property int|null $land_has_well
 * @property int|null $land_related_public_water
 * @property int|null $land_has_pond
 *
 * @property MasaderMozare3[] $masaderMozare3s
 * @property Mo3adatMozare3[] $mo3adatMozare3s
 */
class FarmerFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'farmer_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId'], 'required'],
            [['userId', 'land_area', 'land_has_well', 'land_related_public_water', 'land_has_pond'], 'integer'],
            [['land_village', 'land_height', 'land_state', 'land_water'], 'string', 'max' => 200],
            [['land_id'], 'string', 'max' => 202],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userId' => Yii::t('app', 'User ID'),
            'land_village' => Yii::t('app', 'Land Village'),
            'land_height' => Yii::t('app', 'Land Height'),
            'land_state' => Yii::t('app', 'Land State'),
            'land_id' => Yii::t('app', 'Land ID'),
            'land_area' => Yii::t('app', 'Land Area'),
            'land_water' => Yii::t('app', 'Land Water'),
            'land_has_well' => Yii::t('app', 'Land Has Well'),
            'land_related_public_water' => Yii::t('app', 'Land Related Public Water'),
            'land_has_pond' => Yii::t('app', 'Land Has Pond'),
        ];
    }

    /**
     * Gets query for [[MasaderMozare3s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasaderMozare3s()
    {
        return $this->hasMany(MasaderMozare3::className(), ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Mo3adatMozare3s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMo3adatMozare3s()
    {
        return $this->hasMany(Mo3adatMozare3::className(), ['file_id' => 'id']);
    }
}
