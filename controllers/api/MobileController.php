<?php

namespace app\controllers\api;

use app\models\Chat;
use app\models\Data;
use app\models\Messages;
use app\models\Users;
use app\models\Village;
use Yii;

class MobileController extends ApiController {

    public function actionGetVillages() {

        $post = Yii::$app->request->post();


        return Village::find()->all();
    }

    public function actionCreateChat() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];
        $chat = new Chat();
        $chat->userId = $userId;
        if ($chat->save()) {
            return $chat->id;
        }
    }

    public function actionGetUserChats() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];

        return Chat::find()
                        ->where(['userId' => $userId])
                        ->all()
        ;
    }

    public function actionGetChildren() {

        $post = Yii::$app->request->post();
        $parentId = $post["parentId"];

        return Data::find()
                        ->where(['parent' => $parentId])
                        ->all()
        ;
    }

    public function actionGetChildrenAndSaveMessage() {

        $post = Yii::$app->request->post();
        $parentId = $post["parentId"];
        $chatId = $post["chatId"];

        $message = new Messages();
        $message->chatId = $chatId;
        $message->dataId = $parentId;
        $message->save();

        return Data::find()
                        ->where(['parent' => $parentId])
                        ->all()
        ;
    }

    public function actionGetTopParent() {

        $post = Yii::$app->request->post();


        return Data::find()
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
        $token = $post["token"];


        $user = new Users();
//        $user->username = $username;
        $user->fullname = $fullname;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->village = $villageId;
        $user->token = $token;






        if ($user->save()) {


            return true;
        } else
            return $user->errors;
    }
    
    public function actionLogin(){
        
        $post = Yii::$app->request->post();
        $phone = $post["phone"];
        $password = $post["password"];
        $token = $post["token"];
        
        $user = Users::find()
                ->where(['phone'=>$phone])
                ->andWhere(['password'=>$password])
                ->one();
        
        
        if($user)
        {
            $user->token = $token;
          if($user->save()){
               return $user;
             
          }
          
                 else return $user->errors ;
                   
        }
   
                
                
    }

    public function actionGetChatData() {

        $post = Yii::$app->request->post();
        $chatId = $post["chatId"];

        $data = Messages::find()
                ->select("data.*")
                ->join('join', 'data', 'data.id = messages.dataId')
                ->where(["chatId" => $chatId])
                ->asArray()
                ->orderBy("messages.id ASC")
                ->all();

        $result = array();
        for ($i = 0; $i < sizeof($data); $i++) {
            $result[$i]["id"] = $data[$i]["id"];
            $result[$i]["text"] = $data[$i]["title"];
            $result[$i]["data"] = Data::find()->where(["parent" => $data[$i]["parent"]])->all();
        }


        return $result;
    }

}
