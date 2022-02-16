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
 * @property int|null $human
 * @property int|null $animals
 * @property int|null $automatic_energy
 * @property int|null $wind_energy
 * @property int|null $solar_energy
 * @property int|null $electricity
 * @property int|null $jarrar
 * @property int|null $rash
 * @property int|null $maktoura
 * @property int|null $sahreej
 * @property int|null $mdakha
 * @property int|null $shabaket_ray
 * @property int|null $alat
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
            [['userId', 'land_area', 'land_has_well', 'land_related_public_water', 'land_has_pond', 'human', 'animals', 'automatic_energy', 'wind_energy', 'solar_energy', 'electricity', 'jarrar', 'rash', 'maktoura', 'sahreej', 'mdakha', 'shabaket_ray', 'alat'], 'integer'],
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
            'human' => Yii::t('app', 'Human'),
            'animals' => Yii::t('app', 'Animals'),
            'automatic_energy' => Yii::t('app', 'Automatic Energy'),
            'wind_energy' => Yii::t('app', 'Wind Energy'),
            'solar_energy' => Yii::t('app', 'Solar Energy'),
            'electricity' => Yii::t('app', 'Electricity'),
            'jarrar' => Yii::t('app', 'Jarrar'),
            'rash' => Yii::t('app', 'Rash'),
            'maktoura' => Yii::t('app', 'Maktoura'),
            'sahreej' => Yii::t('app', 'Sahreej'),
            'mdakha' => Yii::t('app', 'Mdakha'),
            'shabaket_ray' => Yii::t('app', 'Shabaket Ray'),
            'alat' => Yii::t('app', 'Alat'),
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
