<?php

namespace app\controllers;

use app\models\News;
use app\models\NewsImages;
use app\models\NewsMedia;
use app\models\NewsSearch;
use app\models\NotificationForm;
use app\models\Users;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller {

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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        $newsMedia = NewsMedia::find()
                ->where(["new_id" => $id])
                ->all();


        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'newsMedia' => $newsMedia
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new News();

        $model->userId = Yii::$app->getUser()->getId();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->userId = Yii::$app->getUser()->getId();
                $model->file = UploadedFile::getInstances($model, 'file');
                $files = $model->file;

                if ($model->save()) {
                    if ($model->uploadFiles($files, $model->primaryKey)) {
                        
                               $notification = new NotificationForm();
            $notification->subject = "معلومات جديدة";
            $notification->message = "ادخل لمتابعة آخر الأخبار"  ;
                        
                            $tokens = Users::find()
                    ->select("user.token")
                 
                    ->asArray()
                    ->column();
//            array_push($commentsUsers, $firebaseTokenOfRoomOwner);
//            return $commentsUsers;
            $notification->notifyUsers($tokens);
                        
                        
                        return $this->redirect(['index']);
//                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionAddImages($id) {
        $model = new NewsImages();

        if ($model->load($this->request->post())) {
            $model->file = UploadedFile::getInstances($model, 'file');
            $files = $model->file;
            if ($model->uploadFiles($files, $id)) {
                return $this->redirect(['view', 'id' => $id]);
            } else {
                
            }
        }
        return $this->render('add-images', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {

        $model = $this->findModel($id);
        $path = \Yii::getAlias('@webroot/newsUploads/');
        $newsMedia = $model->getNewsMedia()->all();


        for ($i = 0; $i < sizeof($newsMedia); $i++) {
            $filePath = $path . $newsMedia[$i]["file_name"];

            $myModel = NewsMedia::findOne(["id" => $newsMedia[$i]["id"]]);
            if ($myModel) {
                $myModel->delete();
            }
            if (is_file($filePath) && file_exists($filePath)) {
                unlink($filePath);
            } else {
//                echo 'not directory';
            }
        }

        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionDeleteFile() {

        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $newsMediaId = $request->post('newsMediaId');
        $filename = $request->post('filename');

        $path = \Yii::getAlias('@webroot/newsUploads/');
        $filePath = $path . $filename;
        $myModel = NewsMedia::findOne(["id" => $newsMediaId]);
        if ($myModel) {
            $myModel->delete();
        }
        if (is_file($filePath) && file_exists($filePath)) {
            unlink($filePath);
        } else {
//                echo 'not directory';
        }

        return [
            'success' => true,
        ];
    }

}
