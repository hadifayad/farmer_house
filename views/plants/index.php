<?php

use app\models\PlantsHeightData;
use app\models\PlantsMantaaData;
use app\models\PlantsSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel PlantsSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'انسب مزروعات');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'اضافة مزروعات'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'attribute' => 'الاسم',
                'value' => 'name',
            ]
            , [
                'attribute' => 'الاسم في دليل المزارع',
                'value' => 'data.title'
            ], [
                'attribute' => 'الارتفاع',
                'value' => function($model) {
                    $data = PlantsHeightData::find()
                            ->select("heights.name")
                            ->join('join', "heights", "heights.id = plants_height_data.r_height_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ], [
                'attribute' => 'المنطقة',
                'value' => function($model) {
                    $data = PlantsMantaaData::find()
                            ->select("mantaa.name")
                            ->join('join', "mantaa", "mantaa.id = plants_mantaa_data.r_mantaa_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ], [
                'attribute' => 'طريقة الري',
                'value' => function($model) {
                    $data = app\models\PlantsWaterWaysData::find()
                            ->select("water_type.name")
                            ->join('join', "water_type", "water_type.id = plants_water_ways_data.r_water_ways_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ], [
                'attribute' => 'نوع الزرع',
                'value' => function($model) {
                    $data = \app\models\PlantsPlantTypesData::find()
                            ->select("plants_types.name")
                            ->join('join', "plants_types", "plants_types.id = plants_plant_types_data.r_plants_types_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ], [
                'attribute' => 'الموسم',
                'value' => function($model) {
                    $data = app\models\PlantsMawsemData::find()
                            ->select("mawsem.name")
                            ->join('join', "mawsem", "mawsem.id = plants_mawsem_data.r_mawsem_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ], [
                'attribute' => 'طريقة الزراعة',
                'value' => function($model) {
                    $data = app\models\PlantPlantingTypeData::find()
                            ->select("planting_type.name")
                            ->join('join', "planting_type", "planting_type.id = plant_planting_type_data.r_planting_type_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ], [
                'attribute' => 'نوع التربة',
                'value' => function($model) {
                    $data = app\models\PlantSoilTypeData::find()
                            ->select("soil_type.name")
                            ->join('join', "soil_type", "soil_type.id = plant_soil_type_data.r_soil_type_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ],
            [
                'attribute' => 'نوع المزروعات',
                'value' => function($model) {
                    $data = \app\models\PlantMazrouatTypeData::find()
                            ->select("mazrouat_type.name")
                            ->join('join', "mazrouat_type", "mazrouat_type.id = plant_mazrouat_type_data.r_mazrouat_type_id")
                            ->where(['r_plant_id' => $model->id])
                            ->asArray()
                            ->column();
                    return implode(",", $data);
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {update}'],
        ],
    ]);
    ?>


</div>
