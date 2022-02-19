<?php

namespace app\controllers;

use app\models\PlantMazrouatTypeData;
use app\models\PlantPlantingTypeData;
use app\models\Plants;
use app\models\PlantsHeightData;
use app\models\PlantsMantaaData;
use app\models\PlantsMawsemData;
use app\models\PlantSoilTypeData;
use app\models\PlantsPlantTypesData;
use app\models\PlantsSearch;
use app\models\PlantsWaterWaysData;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use Exception;

/**
 * PlantsController implements the CRUD actions for Plants model.
 */
class PlantsController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
                ]
        );
    }

    /**
     * Lists all Plants models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PlantsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plants model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plants model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Plants();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {



//                \yii\helpers\VarDumper::dump($model, 3, true);
//                return;
                if ($model->save()) {

                    $id = $model->id;
                    $heights = $model->heights;
                    $mantaas = $model->mantaas;
                    $water_wayss = $model->water_wayss;
                    $plants_types_ids = $model->plants_types_ids;
                    $mawsems = $model->mawsems;
                    $planting_types = $model->planting_types;
                    $mazrouat_types = $model->mazrouat_types;
                    $soil_types = $model->soil_types;

                    $this->updateValues($id, $heights, $mantaas, $water_wayss, $plants_types_ids, $mawsems, $planting_types, $mazrouat_types, $soil_types);
                    return $this->redirect(['index']);
//                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public static function updateValues($id, $heights, $mantaas, $water_wayss, $plants_types_ids, $mawsems, $planting_types, $mazrouat_types, $soil_types) {

        if ($heights) {
            PlantsHeightData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($heights); $i++) {
                $myModel = new PlantsHeightData();
                $myModel->r_plant_id = $id;
                $myModel->r_height_id = $heights[$i];
                $myModel->save();
            }
        }

        if ($mantaas) {
            PlantsMantaaData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($mantaas); $i++) {
                $myModel = new PlantsMantaaData();
                $myModel->r_plant_id = $id;
                $myModel->r_mantaa_id = $mantaas[$i];
                $myModel->save();
            }
        }

        if ($water_wayss) {
            PlantsWaterWaysData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($water_wayss); $i++) {
                $myModel = new PlantsWaterWaysData();
                $myModel->r_plant_id = $id;
                $myModel->r_water_ways_id = $water_wayss[$i];
                $myModel->save();
            }
        }

        if ($plants_types_ids) {
            PlantsPlantTypesData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($plants_types_ids); $i++) {
                $myModel = new PlantsPlantTypesData();
                $myModel->r_plant_id = $id;
                $myModel->r_plants_types_id = $plants_types_ids[$i];
                $myModel->save();
            }
        }

        if ($mawsems) {
            PlantsMawsemData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($mawsems); $i++) {
                $myModel = new PlantsMawsemData();
                $myModel->r_plant_id = $id;
                $myModel->r_mawsem_id = $mawsems[$i];
                $myModel->save();
            }
        }



        if ($planting_types) {
            PlantPlantingTypeData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($planting_types); $i++) {
                $myModel = new PlantPlantingTypeData();
                $myModel->r_plant_id = $id;
                $myModel->r_planting_type_id = $planting_types[$i];
                $myModel->save();
            }
        }

        if ($mazrouat_types) {
            PlantMazrouatTypeData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($mazrouat_types); $i++) {
                $myModel = new PlantMazrouatTypeData();
                $myModel->r_plant_id = $id;
                $myModel->r_mazrouat_type_id = $mazrouat_types[$i];
                $myModel->save();
            }
        }

        if ($soil_types) {
            PlantSoilTypeData::deleteAll(["r_plant_id" => $id]);
            for ($i = 0; $i < sizeof($soil_types); $i++) {
                $myModel = new PlantSoilTypeData();
                $myModel->r_plant_id = $id;
                $myModel->r_soil_type_id = $soil_types[$i];
                $myModel->save();
            }
        }
    }

    /**
     * Updates an existing Plants model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            $heights = $model->heights;
            $mantaas = $model->mantaas;
            $water_wayss = $model->water_wayss;
            $plants_types_ids = $model->plants_types_ids;
            $mawsems = $model->mawsems;
            $planting_types = $model->planting_types;
            $mazrouat_types = $model->mazrouat_types;
            $soil_types = $model->soil_types;

            $this->updateValues($id, $heights, $mantaas, $water_wayss, $plants_types_ids, $mawsems, $planting_types, $mazrouat_types, $soil_types);

//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Plants model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {

        try {

            PlantSoilTypeData::deleteAll(["r_plant_id" => $id]);
            PlantMazrouatTypeData::deleteAll(["r_plant_id" => $id]);
            PlantPlantingTypeData::deleteAll(["r_plant_id" => $id]);
            PlantsMawsemData::deleteAll(["r_plant_id" => $id]);
            PlantsPlantTypesData::deleteAll(["r_plant_id" => $id]);
            PlantsWaterWaysData::deleteAll(["r_plant_id" => $id]);
            PlantsMantaaData::deleteAll(["r_plant_id" => $id]);
            PlantsHeightData::deleteAll(["r_plant_id" => $id]);

            $this->findModel($id)->delete();
        } catch (Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \yii\helpers\VarDumper::dump($msg, 3, true);
            die();
            \Yii::$app->getSession()->addFlash('error', \Yii::t('app', 'لا يمكن الحذف'));
            return $this->redirect(['index']);
//            throw new ForbiddenHttpException('Could not delete this record.' . $e);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Plants model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Plants the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Plants::findOne($id)) !== null) {

            $model->heights = PlantsHeightData::find()->select("r_height_id")->where(["r_plant_id" => $id])->column();
            $model->mantaas = PlantsMantaaData::find()->select("r_mantaa_id")->where(["r_plant_id" => $id])->column();
            $model->water_wayss = PlantsWaterWaysData::find()->select("r_water_ways_id")->where(["r_plant_id" => $id])->column();
            $model->plants_types_ids = PlantsPlantTypesData::find()->select("r_plants_types_id")->where(["r_plant_id" => $id])->column();
            $model->mawsems = PlantsMawsemData::find()->select("r_mawsem_id")->where(["r_plant_id" => $id])->column();
            $model->planting_types = PlantPlantingTypeData::find()->select("r_planting_type_id")->where(["r_plant_id" => $id])->column();
            $model->mazrouat_types = PlantMazrouatTypeData::find()->select("r_mazrouat_type_id")->where(["r_plant_id" => $id])->column();
            $model->soil_types = PlantSoilTypeData::find()->select("r_soil_type_id")->where(["r_plant_id" => $id])->column();

            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
