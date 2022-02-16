<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_plants".
 *
 * @property int $id
 * @property int $user_id
 * @property int $plant_id
 * @property int $heightId
 * @property int $plantingTypeId
 * @property int $plantsTypeId
 * @property int $waterTypeId
 * @property int $soilTypeId
 * @property int $mantaaId
 * @property int $mazrouatTypeId
 * @property int $mawsem_id
 * @property string $date
 *
 * @property Heights $height
 * @property Mantaa $mantaa
 * @property Mawsem $mawsem
 * @property MazrouatType $mazrouatType
 * @property Plants $plant
 * @property PlantingType $plantingType
 * @property PlantsTypes $plantsType
 * @property PlantsTypes $soilType
 * @property User $user
 * @property WaterType $waterType
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
            [['user_id', 'plant_id', 'heightId', 'plantingTypeId', 'plantsTypeId', 'waterTypeId', 'soilTypeId', 'mantaaId', 'mazrouatTypeId', 'mawsem_id'], 'required'],
            [['user_id', 'plant_id', 'heightId', 'plantingTypeId', 'plantsTypeId', 'waterTypeId', 'soilTypeId', 'mantaaId', 'mazrouatTypeId', 'mawsem_id'], 'integer'],
            [['date'], 'safe'],
            [['plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plants::className(), 'targetAttribute' => ['plant_id' => 'id']],
            [['mawsem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mawsem::className(), 'targetAttribute' => ['mawsem_id' => 'id']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['heightId'], 'exist', 'skipOnError' => true, 'targetClass' => Heights::className(), 'targetAttribute' => ['heightId' => 'id']],
            [['mantaaId'], 'exist', 'skipOnError' => true, 'targetClass' => Mantaa::className(), 'targetAttribute' => ['mantaaId' => 'id']],
            [['mazrouatTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => MazrouatType::className(), 'targetAttribute' => ['mazrouatTypeId' => 'id']],
            [['plantingTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => PlantingType::className(), 'targetAttribute' => ['plantingTypeId' => 'id']],
            [['soilTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => PlantsTypes::className(), 'targetAttribute' => ['soilTypeId' => 'id']],
            [['plantsTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => PlantsTypes::className(), 'targetAttribute' => ['plantsTypeId' => 'id']],
            [['waterTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => WaterType::className(), 'targetAttribute' => ['waterTypeId' => 'id']],
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
            'heightId' => Yii::t('app', 'Height ID'),
            'plantingTypeId' => Yii::t('app', 'Planting Type ID'),
            'plantsTypeId' => Yii::t('app', 'Plants Type ID'),
            'waterTypeId' => Yii::t('app', 'Water Type ID'),
            'soilTypeId' => Yii::t('app', 'Soil Type ID'),
            'mantaaId' => Yii::t('app', 'Mantaa ID'),
            'mazrouatTypeId' => Yii::t('app', 'Mazrouat Type ID'),
            'mawsem_id' => Yii::t('app', 'Mawsem ID'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * Gets query for [[Height]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHeight()
    {
        return $this->hasOne(Heights::className(), ['id' => 'heightId']);
    }

    /**
     * Gets query for [[Mantaa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMantaa()
    {
        return $this->hasOne(Mantaa::className(), ['id' => 'mantaaId']);
    }

    /**
     * Gets query for [[Mawsem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMawsem()
    {
        return $this->hasOne(Mawsem::className(), ['id' => 'mawsem_id']);
    }

    /**
     * Gets query for [[MazrouatType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMazrouatType()
    {
        return $this->hasOne(MazrouatType::className(), ['id' => 'mazrouatTypeId']);
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
     * Gets query for [[PlantingType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantingType()
    {
        return $this->hasOne(PlantingType::className(), ['id' => 'plantingTypeId']);
    }

    /**
     * Gets query for [[PlantsType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsType()
    {
        return $this->hasOne(PlantsTypes::className(), ['id' => 'plantsTypeId']);
    }

    /**
     * Gets query for [[SoilType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoilType()
    {
        return $this->hasOne(PlantsTypes::className(), ['id' => 'soilTypeId']);
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

    /**
     * Gets query for [[WaterType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWaterType()
    {
        return $this->hasOne(WaterType::className(), ['id' => 'waterTypeId']);
    }
}
