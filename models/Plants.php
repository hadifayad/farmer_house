<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plants".
 *
 * @property int $id
 * @property int|null $data_id
 * @property string $name
 *
 * @property Data $data
 * @property PlantMazrouatTypeData[] $plantMazrouatTypeDatas
 * @property PlantPlantingTypeData[] $plantPlantingTypeDatas
 * @property PlantSoilTypeData[] $plantSoilTypeDatas
 * @property PlantsHeightData[] $plantsHeightDatas
 * @property PlantsMantaaData[] $plantsMantaaDatas
 * @property PlantsMawsemData[] $plantsMawsemDatas
 * @property PlantsPlantTypesData[] $plantsPlantTypesDatas
 * @property PlantsWaterWaysData[] $plantsWaterWaysDatas
 * @property UserPlants[] $userPlants
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
            [['data_id'], 'integer'],
            [['name', 'heights', 'mantaas', 'water_wayss', 'plants_types_ids', 'mawsems', 'planting_types', 'mazrouat_types', 'soil_types'], 'required'],
            [['name'], 'string', 'max' => 255],
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
            'heights' => 'الارتفاع',
            'mantaas' => 'المنطقة',
            'water_wayss' => 'طريقة الري',
            'plants_types_ids' => 'نوع الزرع',
            'mawsems' => 'الموسم',
            'planting_types' => 'طريقة الزراعة',
            'mazrouat_types' => 'نوع التربة',
            'soil_types' => 'نوع المزروعات',
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
     * Gets query for [[PlantsWaterWaysDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantsWaterWaysDatas() {
        return $this->hasMany(PlantsWaterWaysData::className(), ['r_plant_id' => 'id']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants() {
        return $this->hasMany(UserPlants::className(), ['plant_id' => 'id']);
    }

}
