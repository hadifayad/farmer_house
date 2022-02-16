<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants".
 *
 * @property int $id
 * @property int|null $data_id
 * @property string $name
 * @property int $height
 * @property int $mantaa
 * @property int $water_ways
 * @property int $plants_types_id
 * @property int $mawsem
 * @property int $planting_type
 * @property int $mazrouat_type
 * @property int $soil_type
 *
 * @property Data $data
 * @property Heights $height0
 * @property Mantaa $mantaa0
 * @property Mawsem $mawsem0
 * @property MazrouatType $mazrouatType
 * @property PlantMazrouatTypeData[] $plantMazrouatTypeDatas
 * @property PlantPlantingTypeData[] $plantPlantingTypeDatas
 * @property PlantSoilTypeData[] $plantSoilTypeDatas
 * @property PlantingType $plantingType
 * @property PlantsHeightData[] $plantsHeightDatas
 * @property PlantsMantaaData[] $plantsMantaaDatas
 * @property PlantsMawsemData[] $plantsMawsemDatas
 * @property PlantsPlantTypesData[] $plantsPlantTypesDatas
 * @property PlantsTypes $plantsTypes
 * @property PlantsWaterWaysData[] $plantsWaterWaysDatas
 * @property SoilType $soilType
 * @property UserPlants[] $userPlants
 * @property WaterType $waterWays
 */
class Plants extends \yii\db\ActiveRecord {

    public $heights;
    public $mantaas;
    public $water_wayss;
    public $plants_types_ids;
    public $mawsems;
    public $planting_types;
    public $mazrouat_types;
    public $soil_types;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'plants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['data_id', 'height', 'mantaa', 'water_ways', 'plants_types_id', 'mawsem', 'planting_type', 'mazrouat_type', 'soil_type'], 'integer'],
            [['name', 'height', 'mantaa', 'water_ways', 'plants_types_id', 'mawsem', 'planting_type', 'mazrouat_type', 'soil_type',
            'heights', 'mantaas', 'water_wayss', 'plants_types_ids', 'mawsems', 'planting_types', 'mazrouat_types', 'soil_types'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['plants_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlantsTypes::className(), 'targetAttribute' => ['plants_types_id' => 'id']],
            [['mantaa'], 'exist', 'skipOnError' => true, 'targetClass' => Mantaa::className(), 'targetAttribute' => ['mantaa' => 'id']],
            [['mawsem'], 'exist', 'skipOnError' => true, 'targetClass' => Mawsem::className(), 'targetAttribute' => ['mawsem' => 'id']],
            [['planting_type'], 'exist', 'skipOnError' => true, 'targetClass' => PlantingType::className(), 'targetAttribute' => ['planting_type' => 'id']],
            [['mazrouat_type'], 'exist', 'skipOnError' => true, 'targetClass' => MazrouatType::className(), 'targetAttribute' => ['mazrouat_type' => 'id']],
            [['water_ways'], 'exist', 'skipOnError' => true, 'targetClass' => WaterType::className(), 'targetAttribute' => ['water_ways' => 'id']],
            [['soil_type'], 'exist', 'skipOnError' => true, 'targetClass' => SoilType::className(), 'targetAttribute' => ['soil_type' => 'id']],
            [['height'], 'exist', 'skipOnError' => true, 'targetClass' => Heights::className(), 'targetAttribute' => ['height' => 'id']],
            [['data_id'], 'exist', 'skipOnError' => true, 'targetClass' => Data::className(), 'targetAttribute' => ['data_id' => 'id']],
            [['heights', 'mantaas', 'water_wayss', 'plants_types_ids', 'mawsems', 'planting_types', 'mazrouat_types', 'soil_types'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'data_id' => 'Data ID',
            'name' => 'Name',
            'height' => 'Height',
            'mantaa' => 'Mantaa',
            'water_ways' => 'Water Ways',
            'plants_types_id' => 'Plants Types ID',
            'mawsem' => 'Mawsem',
            'planting_type' => 'Planting Type',
            'mazrouat_type' => 'Mazrouat Type',
            'soil_type' => 'Soil Type',
        ];
    }

    /**
     * Gets query for [[Data]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getData() {
        return $this->hasOne(Data::className(), ['id' => 'data_id']);
    }

    /**
     * Gets query for [[Height0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHeight0() {
        return $this->hasOne(Heights::className(), ['id' => 'height']);
    }

    /**
     * Gets query for [[Mantaa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMantaa0() {
        return $this->hasOne(Mantaa::className(), ['id' => 'mantaa']);
    }

    /**
     * Gets query for [[Mawsem0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMawsem0() {
        return $this->hasOne(Mawsem::className(), ['id' => 'mawsem']);
    }

    /**
     * Gets query for [[MazrouatType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMazrouatType() {
        return $this->hasOne(MazrouatType::className(), ['id' => 'mazrouat_type']);
    }

    /**
     * Gets query for [[PlantMazrouatTypeDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantMazrouatTypeDatas() {
        return $this->hasMany(PlantMazrouatTypeData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantPlantingTypeDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantPlantingTypeDatas() {
        return $this->hasMany(PlantPlantingTypeData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantSoilTypeDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantSoilTypeDatas() {
        return $this->hasMany(PlantSoilTypeData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantingType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantingType() {
        return $this->hasOne(PlantingType::className(), ['id' => 'planting_type']);
    }

    /**
     * Gets query for [[PlantsHeightDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsHeightDatas() {
        return $this->hasMany(PlantsHeightData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantsMantaaDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsMantaaDatas() {
        return $this->hasMany(PlantsMantaaData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantsMawsemDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsMawsemDatas() {
        return $this->hasMany(PlantsMawsemData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantsPlantTypesDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsPlantTypesDatas() {
        return $this->hasMany(PlantsPlantTypesData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[PlantsTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsTypes() {
        return $this->hasOne(PlantsTypes::className(), ['id' => 'plants_types_id']);
    }

    /**
     * Gets query for [[PlantsWaterWaysDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsWaterWaysDatas() {
        return $this->hasMany(PlantsWaterWaysData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[SoilType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoilType() {
        return $this->hasOne(SoilType::className(), ['id' => 'soil_type']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants() {
        return $this->hasMany(UserPlants::className(), ['plant_id' => 'id']);
    }

    /**
     * Gets query for [[WaterWays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWaterWays() {
        return $this->hasOne(WaterType::className(), ['id' => 'water_ways']);
    }

}
