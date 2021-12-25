<?php

namespace app\controllers\api;

use app\models\Messages;
use app\models\Users;
use app\models\Village;
use Yii;

class MobileController extends ApiController {

    public function actionGetVillages() {

        $post = Yii::$app->request->post();


        return Village::find()->all();
    }

    public function actionGetUserMessages() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];

        return Messages::find()
                        ->where(['userId' => $userId])
                        ->all()
        ;
    }

    public function actionGetChildren() {

        $post = Yii::$app->request->post();
        $parentId = $post["parentId"];

        return \app\models\Data::find()
                        ->where(['parent' => $parentId])
                        ->all()
        ;
    }

    public function actionGetTopParent() {

        $post = Yii::$app->request->post();


        return \app\models\Data::find()
                        ->where(['parent' => null])
                        ->all()
        ;
    }

    public function actionGetNews() {

        $post = Yii::$app->request->post();

        $sql = "SELECT news.*,user.fullname,user.profile_picture,
            (SELECT GROUP_CONCAT(file_name SEPARATOR ',') FROM news_media WHERE new_id = news.id) as files
             FROM news
             JOIN user ON news.userId = user.id
            
            
             ORDER BY news.date DESC;";
        $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
// WHERE rooms.creation_date >= CURDATE()

        return $arrayList;
    }

    public function actionSignup() {


        $post = Yii::$app->request->post();

        $fullname = $post["fullname"];

        $password = $post["password"];
        $phone = $post["phone"];
        $villageId = $post["villageId"];
        $address = $post["address"];


        $user = new Users();
//        $user->username = $username;
        $user->fullname = $fullname;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->village = $villageId;






        if ($user->save()) {


            return true;
        } else
            return $user->errors;
    }

}
