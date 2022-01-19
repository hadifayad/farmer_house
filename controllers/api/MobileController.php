<?php

namespace app\controllers\api;

use app\models\Chat;
use app\models\Data;
use app\models\Heights;
use app\models\Mantaa;
use app\models\Mawsem;
use app\models\MazrouatType;
use app\models\Messages;
use app\models\PlantingType;
use app\models\Plants;
use app\models\PlantsTypes;
use app\models\SoilType;
use app\models\Users;
use app\models\Village;
use app\models\WaterType;
use Yii;

class MobileController extends ApiController {
    
    

    public function actionGetVillages() {

        $post = Yii::$app->request->post();


        return Village::find()->all();
    }

    public function actionGetSearchPlants() {

        $post = Yii::$app->request->post();


        return Plants::find()->all();
    }
    
       public function actionGetProfileData() {

        $post = Yii::$app->request->post();
            $userId= $post["userId"];
           $user = Users::find()
                   ->select("user.fullname,user.email,user.phone,user.village,user.second_phone,"
                           . "farmer_file.land_has_pond,farmer_file.land_related_public_water,farmer_file.land_has_well")
                   ->where(['user.id'=>$userId])
                   ->join("join","farmer_file", "user.id = farmer_file.userId")
                   ->asArray()
                   ->one();
                
//           $file = \app\models\FarmerFile::find()
//                   ->where(["userId"=>$userId])
//                   ->one();
//           
           return $user;
    
       }
        public function actionUpdateProfile() {

        $post = Yii::$app->request->post();
         $land_height = $post["land_height"];
         $land_id= $post["land_id"];
         $land_area = $post["land_area"];
         $land_related_public_water = $post["land_related_public_water"];
         $land_has_pond = $post["land_has_pond"];
         $land_has_well = $post["land_has_well"];
         $land_village = $post["land_village"];
         $land_state = $post["land_state"];
         $land_water = $post["land_water"];
         $userId = $post["userId"];
         $file = \app\models\FarmerFile::findOne(["userId"=>$userId]);
         if($file){
             $file->land_area =$land_area;
             $file->land_height =$land_height;
             $file->land_related_public_water =$land_related_public_water;
             $file->land_has_well =$land_has_well;
             $file->land_state =$land_state;
             $file->land_water =$land_water;
             $file->land_has_pond =$land_has_pond;
             $file->land_id =$land_id;
             $file->land_village =$land_village;
             if($file->save()){
                 
                   return     $user = Users::find()
                ->where(['id' => $userId])
         
                ->one();
             }
             
             
         } else {
             
             
             $file = new \app\models\FarmerFile();
             $file->userId = $userId;
             if($file->save()){
                 
                      $file->land_area =$land_area;
             $file->land_height =$land_height;
             $file->land_related_public_water =$land_related_public_water;
             $file->land_has_well =$land_has_well;
             $file->land_state =$land_state;
             $file->land_water =$land_water;
             $file->land_has_pond =$land_has_pond;
             $file->land_id =$land_id;
             $file->land_village =$land_village;
             
             if($file->save()){
             return     $user = Users::find()
                ->where(['id' => $userId])
         
                ->one();
                 
             }}
                 
                 
                 
                 
             }
         
        
        
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
                        ->select("data.*,(SELECT COUNT(*) FROM data d WHERE parent = data.id) as children")
                        ->where(['parent' => $parentId])
                        ->asArray()
                        ->all()
        ;
    }

    public function actionGetChildrenAndSaveMessage() {

        $post = Yii::$app->request->post();
        $parentId = $post["parentId"];
        $chatId = $post["chatId"];
        $withoutSaving = $post["withoutSaving"];
        if ($withoutSaving == "true") {
            
        } else {

            $message = new Messages();
            $message->chatId = $chatId;
            $message->dataId = $parentId;
            $message->save();
        }

        return Data::find()
                        ->select("data.*,(SELECT COUNT(*) FROM data d WHERE parent = data.id) as children")
                        ->where(['parent' => $parentId])
                        ->asArray()
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

    public function actionGetTopParentAfterPickingPlant() {
        $post = Yii::$app->request->post();
        $dataId = $post["dataId"];

        $children = Data::find()
                ->select("data.*,(SELECT COUNT(*) FROM data d WHERE parent = data.id) as children")
                ->where(['parent' => $dataId])
                ->asArray()
                ->all();

        return $children;
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
        $email = $post["email"];
        $secondPhone = $post["secondPhone"];


        $user = new Users();
//        $user->username = $username;
        $user->fullname = $fullname;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->village = $villageId;
        $user->token = $token;
        $user->email = $email;
        $user->second_phone = $secondPhone;






        if ($user->save()) {


            return true;
        } else
            return $user->errors;
    }

    public function actionGetData() {

        $mawsem = Mawsem::find()->all();
        $soil = SoilType::find()->all();
        $heights = Heights::find()->all();
        $mantaa = Mantaa::find()->all();
        $no3Mazro3at = MazrouatType::find()->all();
        $plantsType = PlantsTypes::find()->all();
        $plantingType = PlantingType::find()->all();
        $waterWay = WaterType::find()->all();

        $data = [["name" => "الموسم", "tableName" => "mawsem", "data" => $mawsem], ["name" => "أنواع التربة", "tableName" => "soil_type", "data" => $soil], ["name" => "الارتفاع عن سطح البحر", "tableName" => "heights", "data" => $heights],
            ["name" => "المنطقة", "tableName" => "mantaa", "data" => $mantaa],
            ["name" => "طريقة الري", "tableName" => "water_type", "data" => $waterWay]
            , ["name" => "نوع المزروعات", "tableName" => "mazrouat_type", "data" => $no3Mazro3at],
            ["name" => "طريقة الزراعة", "tableName" => "planting_type", "data" => $plantingType],
            ["name" => "نوع المزروعات", "tableName" => "PlantsTypes", "data" => $plantsType]];
        return $data;
    }

    public function actionLogin() {

        $post = Yii::$app->request->post();
        $phone = $post["phone"];
        $password = $post["password"];
        $token = $post["token"];

        $user = Users::find()
                ->where(['phone' => $phone])
                ->andWhere(['password' => $password])
                ->one();


        if ($user) {
            $user->token = $token;
            if ($user->save()) {
                return $user;
            } else
                return $user->getErrors();
        }
    }

    public function actionGetChatData() {

        $post = Yii::$app->request->post();
        $chatId = $post["chatId"];

        $data = Messages::find()
                ->select("data.*,(SELECT COUNT(*) FROM data d WHERE parent = data.id) as children")
                ->join('join', 'data', 'data.id = messages.dataId')
                ->where(["chatId" => $chatId])
                ->asArray()
                ->orderBy("messages.id ASC")
                ->all();
//        return $data;
        $result = array();
        for ($i = 0; $i < sizeof($data); $i++) {
            $result[$i]["id"] = $data[$i]["id"];
            $result[$i]["text"] = $data[$i]["title"];
            $result[$i]["children"] = $data[$i]["children"];
            $result[$i]["data"] = Data::find()->where(["parent" => $data[$i]["parent"]])->all();
        }


        return $result;
    }

}
