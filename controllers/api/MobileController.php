<?php

namespace app\controllers\api;

use app\models\ActivityType;
use app\models\Chat;
use app\models\Chatwithmandoob;
use app\models\Comments;
use app\models\Data;
use app\models\FarmerAked;
use app\models\FarmerFile;
use app\models\Heights;
use app\models\Kadaa;
use app\models\MandoobActivities;
use app\models\MandoobAked;
use app\models\Mantaa;
use app\models\Mawsem;
use app\models\MazrouatType;
use app\models\Messages;
use app\models\NotificationForm;
use app\models\PlantingType;
use app\models\Plants;
use app\models\PlantsTypes;
use app\models\SoilType;
use app\models\UserPlants;
use app\models\Users;
use app\models\Village;
use app\models\WaterType;
use Yii;
use yii\db\Query;

class MobileController extends ApiController {

    public function actionGetVillages() {

        $post = Yii::$app->request->post();


        return Village::find()->all();
    }
    
    
       public function actionGetActivitiesTypes() {

        $post = Yii::$app->request->post();


        return ActivityType::find()->all();
    }
    
      public function actionCreateMandoubActivity() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
        $activity_type = $post["activity_type"];
        $date = $post["date"];
        $farmer = $post["farmer"];
        $notes = $post["notes"];
        
        $activity = new MandoobActivities();
        $activity->mandoobId=$mandoobId;
        $activity->activity_type=$activity_type;
        $activity->date=$date;
        $activity->farmer=$farmer;
        $activity->notes = $notes;
        if($activity->save()){
            return "true";
        }
        else return $activity->errors;
     
        
        
        
        
      }
         public function actionGetDataPercentage() {

        $post = Yii::$app->request->post();

        $userId = $post["userId"];
        $data = FarmerFile::find()->where(['userId'=>$userId])
                ->one();
        for($i=0;$i<23;$i++){
           
        }
        return $data;
         
        
         }
      
       public function actionCreateMandoubAked() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
        $quantity = $post["quantity"];
        $date = $post["date"];
        $farmer = $post["farmer"];
        $notes = $post["notes"];
        $price = $post["price"];
        $place_tesleem = $post["place_tesleem"];
        $place = $post["place"];
        $type = $post["type"];
        
        $aked = new MandoobAked();
        $aked->mandoubId=$mandoobId;
        $aked->quantity=$quantity;
        $aked->date=$date;
        $aked->farmerId=$farmer;
        $aked->notes = $notes;
        $aked->price =$price;
        $aked->tesleem_place =$place_tesleem;
        $aked->place = $place;
        $aked->type =$type;
        if($aked->save()){
            return "true";  
        }
        else return $aked->errors;
     
        
        
        
        
      }
      
         public function actionCreateFarmerAked() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
        $quantity = $post["quantity"];
        $date = $post["date"];
        $farmer = $post["farmer"];
        $notes = $post["notes"];
        $price = $post["price"];
        $place_tesleem = $post["place_tesleem"];
        $place = $post["place"];
        $type = $post["type"];
        $duration = $post["duration"];
        $area = $post["area"];
        
        $aked = new FarmerAked();
        $aked->mandoubId=$mandoobId;
        $aked->quantity=$quantity;
        $aked->date=$date;
        $aked->farmerId=$farmer;
        $aked->notes = $notes;
        $aked->type = $type;
        $aked->price =$price;
        $aked->tesleem_place =$place_tesleem;
        $aked->place = $place;
        $aked->area =$area;
        $aked->duration =$duration;
        if($aked->save()){
            return "true";  
        }
        else return $aked->errors;
     
        
        
        
        
      }
      
       public function actionGetMandoobActivities() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
//     return MandoobActivities::find()
//          
//       
//             ->where(["mandoobId"=>$mandoobId])
//             ->asArray()
//             ->all();
     
     
        $sql = "SELECT man.id as id , man.notes as notes , man.date as date , u.fullname as farmer , m.fullname as mandoobId , a.name as activity_type 
FROM mandoob_activities man 
JOIN user m ON man.mandoobId = m.id 
JOIN user u ON man.farmer = u.id 
JOIN activity_type  a ON man.activity_type  = a.id 
WHERE man.mandoobId= $mandoobId
";
                
                $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
        return $arrayList;
     
     
     
       }
       
         public function actionGetMandoobAkeds() {

        $post = Yii::$app->request->post();
        
        $mandoobId = $post["mandoobId"];
//     return MandoobActivities::find()
//          
//       
//             ->where(["mandoobId"=>$mandoobId])
//             ->asArray()
//             ->all();
     
     
        $sql = "SELECT man.id as id , man.notes as notes , man.date as date ,man.place as place, man.price as price ,man.tesleem_place as tesleem_place,  u.fullname as farmerId  , m.fullname as mandoobId , man.type as type 
            , u.phone as phone , u.email as email , u.address as address , v.name as village ,man.quantity as quantity
FROM mandoob_aked man 
JOIN user m ON man.mandoubId  = m.id 
JOIN user u ON man.farmerId  = u.id 
JOIN village v ON u.village  = v.id 

WHERE man.mandoubId = $mandoobId
";
                
                $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
        return $arrayList;
     
     
     
       }
        public function actionGetFarmerOfficialAkeds() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
//     return MandoobActivities::find()
//          
//       
//             ->where(["mandoobId"=>$mandoobId])
//             ->asArray()
//             ->all();
     
     
        $sql = "SELECT man.id as id , man.notes as notes , man.date as date ,man.place as place, man.price as price ,man.tesleem_place as tesleem_place,  u.fullname as farmerId  , m.fullname as mandoobId , man.type as type 
             , u.phone as phone , u.email as email , u.address as address , v.name as village ,man.quantity as quantity
FROM mandoob_aked man 
JOIN user m ON man.mandoubId  = m.id 
JOIN user u ON man.farmerId  = u.id 
JOIN village v ON u.village  = v.id 

WHERE man.farmerId = $mandoobId
";
                
                $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
        return $arrayList;
     
     
     
       }
       
        public function actionGetFarmerAkeds() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
//     return MandoobActivities::find()
//          
//       
//             ->where(["mandoobId"=>$mandoobId])
//             ->asArray()
//             ->all();
     
     
        $sql = "SELECT man.id as id , man.notes as notes , man.date as date ,man.place as place, man.price as price ,man.tesleem_place as tesleem_place,  u.fullname as farmerId  , m.fullname as mandoobId , man.type as type
             , u.phone as phone , u.email as email , u.address as address , v.name as village ,man.quantity as quantity
FROM farmer_aked man 
JOIN user m ON man.mandoubId  = m.id 
JOIN user u ON man.farmerId  = u.id 
JOIN village v ON u.village  = v.id 

WHERE man.farmerId = $mandoobId
";
                
                $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
        return $arrayList;
     
     
     
       }
       
        public function actionGetMandoubFarmerAkeds() {

        $post = Yii::$app->request->post();

        $mandoobId = $post["mandoobId"];
//     return MandoobActivities::find()
//          
//       
//             ->where(["mandoobId"=>$mandoobId])
//             ->asArray()
//             ->all();
     
     
        $sql = "SELECT man.id as id , man.notes as notes , man.date as date ,man.place as place, man.price as price ,man.tesleem_place as tesleem_place,  u.fullname as farmerId  , m.fullname as mandoobId , man.type as type 
             , u.phone as phone , u.email as email , u.address as address , v.name as village ,man.quantity as quantity
FROM farmer_aked man 
JOIN user m ON man.mandoubId  = m.id 
JOIN user u ON man.farmerId  = u.id 
JOIN village v ON u.village  = v.id 

WHERE man.mandoubId = $mandoobId
";
                
                $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
        return $arrayList;
     
     
     
       }
       
           public function actionChangePassword() {

        $post = Yii::$app->request->post();

        $username = $post["username"];
        $password = $post["password"];

        $user = Users::findOne(["phone" => $username]);
        if ($user) {
            $user->password = $password;
            if ($user->save()) {
                return [
                    "status" => "1",
                    "message" => "Success",
                ];
            } else {
                return [
                    "status" => "0",
                    "message" => "something went wrong when saving",
                ];
            }
        } else {
            return [
                "status" => "0",
                "message" => "user does not exist",
            ];
        }
    }


    public function actionGetSearchPlants() {

        $post = Yii::$app->request->post();

        $heightId = $post["heightId"];
        $plantingTypeId = $post["plantingTypeId"];
        $plantsTypeId = $post["plantsTypeId"];
        $waterTypeId = $post["waterTypeId"];
        $soilTypeId = $post["soilTypeId"];
        $mantaaId = $post["mantaaId"];
        $mazrouatTypeId = $post["mazrouatTypeId"];
        $mawsem_id = $post["mawsem_id"];

        $plants = Plants::find()
                ->join('join', 'plants_height_data', 'plants.id = plants_height_data.r_plant_id && plants_height_data.r_height_id = ' . $heightId)
                ->join('join', 'plants_mantaa_data', 'plants.id = plants_mantaa_data.r_plant_id && plants_mantaa_data.r_mantaa_id = ' . $mantaaId)
                ->join('join', 'plants_mawsem_data', 'plants.id = plants_mawsem_data.r_plant_id && plants_mawsem_data.r_mawsem_id = ' . $mawsem_id)
                ->join('join', 'plants_plant_types_data', 'plants.id = plants_plant_types_data.r_plant_id && plants_plant_types_data.r_plants_types_id =' . $plantsTypeId)
                ->join('join', 'plants_water_ways_data', 'plants.id = plants_water_ways_data.r_plant_id && plants_water_ways_data.r_water_ways_id = ' . $waterTypeId)
                ->join('join', 'plant_mazrouat_type_data', 'plants.id = plant_mazrouat_type_data.r_plant_id && plant_mazrouat_type_data.r_mazrouat_type_id = ' . $mazrouatTypeId)
                ->join('join', 'plant_planting_type_data', 'plants.id = plant_planting_type_data.r_plant_id && plant_planting_type_data.r_planting_type_id = ' . $plantingTypeId)
                ->join('join', 'plant_soil_type_data', 'plants.id = plant_soil_type_data.r_plant_id && plant_soil_type_data.r_soil_type_id = ' . $soilTypeId)
                ->all();

        return $plants;

//        return Plants::find()
//                        ->where(['height' => $heightId])
//                        ->andWhere(['mantaa' => $mantaaId])
//                        ->andWhere(['water_ways' => $waterTypeId])
//                        ->andWhere(['plants_types_id' => $plantsTypeId])
//                        ->andWhere(['mawsem' => $mawsem_id])
//                        ->andWhere(['planting_type' => $plantingTypeId])
//                        ->andWhere(['mazrouat_type' => $mazrouatTypeId])
//                        ->andWhere(['soil_type' => $soilTypeId])
//                        ->all();
    }

    public function actionGetProfileData() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];
        $user = Users::find()
                ->select("user.fullname,user.email,user.phone,village.id as village_id ,village.name as village,user.second_phone,user.address ,"
                        . "farmer_file.*,admin.fullname as mandoob")
                ->where(['user.id' => $userId])
                ->join("left join", "farmer_file", "user.id = farmer_file.userId")
                ->join("left join ", "user admin", "  admin.id = user.mandoobId")
                ->join("left join", "village", "user.village = village.id")
                ->asArray()
                ->one();

//           $file = \app\models\FarmerFile::find()
//                   ->where(["userId"=>$userId])
//                   ->one();
//                   
//                    ->select("user.fullname,user.email,user.phone,user.village,user.second_phone,"
//                           . "farmer_file.land_has_pond,farmer_file.land_related_public_water,farmer_file.land_has_well")
//           
if($user){
   return $user;  
}

   
    }

    public function actionGetUserActivities() {

        $post = Yii::$app->request->post();
        $user_id = $post["user_id"];

        $user = UserPlants::find()
                ->select("user_plants.id as id ,user_plants.date as date,mawsem.name as mawsem,plants.name as plant ,heights.name as height ,mantaa.name as mantaa ,mazrouat_type.name as mazrouat_type ,soil_type.name as soil ,water_type.name as water_type,plants_types.name as plants_type ,planting_type.name as planting_type")
                ->join("join", "plants", "user_plants.plant_id = plants.id")
                ->join("join", "mawsem", "user_plants.mawsem_id = mawsem.id")
                ->join("join", "mazrouat_type", "user_plants.mazrouatTypeId = mazrouat_type.id")
                ->join("join", "mantaa", "user_plants.mantaaId = mantaa.id")
                ->join("join", "soil_type", "user_plants.soilTypeId = soil_type.id")
                ->join("join", "water_type", "user_plants.waterTypeId = water_type.id")
                ->join("join", "plants_types", "user_plants.plantsTypeId = plants_types.id")
                ->join("join", "planting_type", "user_plants.plantingTypeId = planting_type.id")
                ->join("join", "heights", "user_plants.heightId =heights.id")
                ->where(['user_plants.user_id' => $user_id])
                ->asArray()
                ->all();

        return $user;
    }

    public function actionAddActivity() {

        $post = Yii::$app->request->post();
        $user_id = $post["user_id"];

        $plant_id = $post["plant_id"];
        $heightId = $post["heightId"];
        $plantingTypeId = $post["plantingTypeId"];
        $plantsTypeId = $post["plantsTypeId"];
        $waterTypeId = $post["waterTypeId"];
        $soilTypeId = $post["soilTypeId"];
        $mantaaId = $post["mantaaId"];
        $mazrouatTypeId = $post["mazrouatTypeId"];
        $mawsem_id = $post["mawsem_id"];


        $userPlant = new UserPlants();
        $userPlant->user_id = $user_id;
        $userPlant->plant_id = $plant_id;
        $userPlant->heightId = $heightId;
        $userPlant->plantingTypeId = $plantingTypeId;
        $userPlant->plantsTypeId = $plantsTypeId;
        $userPlant->mawsem_id = $mawsem_id;
        $userPlant->mazrouatTypeId = $mazrouatTypeId;
        $userPlant->soilTypeId = $soilTypeId;
        $userPlant->waterTypeId = $waterTypeId;
        $userPlant->mantaaId = $mantaaId;
        if ($userPlant->save()) {

            $thisUser = Users::findOne(["id" => $user_id]);
            return $thisUser;
        } else {

            return $userPlant->errors;
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
    
     public function actionUpdateToken() {
        $post = Yii::$app->request->post();
//        return $post;
        $userId  = $post["userId"];
        $token  = $post["token"];
        $user = Users::findOne(["id" => $userId]);
        if($user){
            
            $user->token = $token;
            if($user->save()){
                return $user->user_role;
            }
        }
        
        
     }
    
     public function actionAddComment() {
        $post = Yii::$app->request->post();
//        return $post;
        $chatId  = $post["chatId"];
        $text = $post["text"];
        $userId = $post["userId"];
         $chat = Chatwithmandoob::findOne(["id" => $chatId]);
 $chat->creation_date = date("Y-m-d h:i:s");
        $comment = new Comments();
        $comment->chatId  = $chatId ;
        $comment->userId  = $userId;
        $comment->text = $text;
       
        if ($comment->save()) {
            $userThatMakeComment = Users::findOne(["id" => $userId]);
            $notification = new NotificationForm();
            $notification->subject = $userThatMakeComment->fullname;
            $notification->message = $text;

            $chat = Chatwithmandoob::findOne(["id" => $chatId]);
            $userMandoub = Users::find()->select("DISTINCT(user.token)")->where(["id" => $chat->mandoob])->asArray()->column();
            $userfarmer = Users::find()->select("DISTINCT(user.token)")->where(["id" => $chat->user])->asArray()->column();
//            return [
//                'usermandoub'=>$userMandoub,
//                'farmer'=>$userfarmer,
//                'sendertoken'=>$userThatMakeComment->token 
//                
//            ];
            
            if($userThatMakeComment->token == $userfarmer[0]){
                 
            
                  $notification->notifyToUserChat($userMandoub,$chatId);
                
            }
            else if($userThatMakeComment->token == $userMandoub[0]){
                 
           
                $notification->notifyToUserChat($userfarmer,$chatId);
            }
            
//           $user = Users::findOne(["id" => $userId]);
//
//            $firebaseTokenOfRoomOwner = $userRoomOwner->token;
//            $commentsUsers = Comments::find()
//                    ->select("DISTINCT(user.token)")
//                    ->where([
//                        "chatId" => $chatId,
//                    ])
//                    ->andWhere("comments.userId  != $userId")
//                    ->join("join", "user", "user.id = comments.userId ")
//                    ->asArray()
//                    ->column();
////            array_push($commentsUsers, $firebaseTokenOfRoomOwner);
////            return $commentsUsers;
//            if($commentsUsers){
//                
//            }
//            $notification->notifyToUserChat($commentsUsers,$chatId);
//            
            
            
            return "true";
        } else {
            return $comment->errors;
            return "false";
        }
    }

    
     public function actionCreateChatWithMandoub() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];
//        $mandoob = $post["mandoob"];
        
         $post = Yii::$app->request->post();
        $user = Users::findOne(["id" => $userId]);
        $chatAvailable = Chatwithmandoob::find()
                ->where(['user'=>$userId])
                ->andWhere(['mandoob'=>$user->mandoobId])
                ->one();
        if($chatAvailable){
               
     $sql = "SELECT chatwithmandoob.* FROM chatwithmandoob WHERE id = ".$chatAvailable->id." ;";
        $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();

        return $arrayList;
        }
        else{
                $chat = new Chatwithmandoob();
        $chat->user = $userId;
        $chat->mandoob = $user->mandoobId;
        if ($chat->save()) {
            
             $sql = "SELECT chatwithmandoob.* FROM chatwithmandoob WHERE id = ".$chat->id." ;";
        $command = Yii::$app->db->createCommand($sql);
        $arrayList = $command->queryAll();
// WHERE rooms.creation_date >= CURDATE()

        return $arrayList;
        }

          else return $chat->getErrors ();
        
        
    
//            return (new Query())->select("*")->from("chatwithmandoob")->where(["id"=>$chat->id])->one();
//            return Chatwithmandoob::findOne(["id"=>$chat->id]) ;
//            return    $thisUser = Chatwithmandoob::find()->where(["id" => $chat->id])->asArray()->all();
        
        }
     
    }

    public function actionGetUserChats() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];

        return Chat::find()
                        ->where(['userId' => $userId])
                        ->orderBy("created_at DESC")
                        ->all()
        ;
    }
    public function actionSend(){
        
              $notification = new NotificationForm();
            $notification->subject = "hadi";
            $notification->message = "test";
            
           
            $notification->notifyToUserChat(["f_L17GjrSjixXqdNlqJwVN:APA91bFlUlyeQLhXDP2Bcu09IZUW_Xf9BhmrMqFCBbstxvWwpYN4YzSmzdBymfo3ErkgSRMV73A2WLmcQmtFZc2ManNbHNnRROsECrdoy0mBZuAowKl_bZkabqMuSVzCGJKS5RU1tIPv"]);
            
   
            
        
    }
    
     public function actionGetCommentsByPost() {
        $post = Yii::$app->request->post();
        $chatId = $post["chatId"];

        $commentsByPost = (new Query)
                ->select("*")
                ->from("comments")
                ->where([
                    "chatId" => $chatId
                ])
//                ->join("join", "users", Comment::tableName() . ".r_user = users.id")
                ->orderBy("creation_date Asc")
                ->all();

        return $commentsByPost;
    }
    
    
        public function actionGetUserChatsWithMandoub() {
        $post = Yii::$app->request->post();
        $userId = $post["user"];

        return Chatwithmandoob::find()
                     
                        ->where(['user' => $userId])
                 ->orderBy("creation_date Desc")
                        ->asArray()
                        ->all();
     
    }
        public function actionGetAdminChats() {
        $post = Yii::$app->request->post();
      

            
        return Chatwithmandoob::find()
                     ->select( "chatwithmandoob.*,m.fullname as mandoub ,f.fullname as fullname")
                         ->join("join", "user f",  "chatwithmandoob.user = f.id")
                         ->join("join", "user m",  "chatwithmandoob.mandoob = m.id")
                 ->orderBy("creation_date Desc")
                        ->asArray()
                        ->all();
     
    }
    
    
  public function actionGetMandoubChatsWithUsers() {
        $post = Yii::$app->request->post();
        $userId = $post["user"];

//        return Chatwithmandoob::find()
//                     
//                        ->where(['mandoob' => $userId])
//                
//                        ->asArray()
//                        ->all();
        
          $commentsByPost = (new Query) 
                ->select( "chatwithmandoob.*,user.fullname")
                ->from("chatwithmandoob")
                ->where([
                    "mandoob" => $userId
                ])
                ->join("join", "user",  "chatwithmandoob.user = user.id")
                   ->orderBy("creation_date Desc")
                ->all();
          return $commentsByPost;

     
    }
    
    

    public function actionGetChildren() {

        $post = Yii::$app->request->post();
        $parentId = $post["parentId"];

        return Data::find()
                        ->select("data.*,(SELECT COUNT(*) FROM data d WHERE parent = data.id) as children")
                        ->where(['parent' => $parentId])
                ->orderBy("order")
                
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

            $chat = Chat::findOne(["id" => $chatId]);
            if ($chat) {
                $data = Data::findOne(["id" => $parentId]);
                if ($data) {
                    $chat->title = $data->title;
                    $chat->save();
                }
            }
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
    
      public function actionCheckPhone() {


        $post = Yii::$app->request->post();

        $phone= $post["phone"];
        $user = Users::findOne(["phone"=>$phone]);
        if($user){
            
        }
        else{
            return "true";
        }

        

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
        $user->user_role = 0;
        $user->second_phone = $secondPhone;
        
        $village = Village::find()
                ->where(['id'=>$villageId])
                ->one();
        if($village){
            
             $mohafaza = Kadaa::find()
                ->where(['id'=>$village->kadaa_id])
                ->one();
             
             if($mohafaza){
                 
                 $mandoub = Users::find()
                         ->where(['mandoobmohafaza'=>$mohafaza->mohafaza])
                         ->one();
                 if($mandoub){
                     
                     $user->mandoobId = $mandoub->id;
                     
                                  
                            if ($user->save()) {
            
            $farmer = new FarmerFile();
            $farmer->userId = $user->id;
            if($farmer->save()){
                 return $user; 
            }
            


          
        } else
             return "false";
                     
                     
                 }
                 else {
                      $user->mandoobId = "4";
                     
                         if ($user->save()) {
            
            $farmer = new FarmerFile();
            $farmer->userId = $user->id;
            if($farmer->save()){
                 return $user; 
            }


          
        } else
            return "false";
                 }
                         
            
                         
                         
             }
        }
        
        






     
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
    
        public function actionGetMandoubFarmers() {

        $post = Yii::$app->request->post();
        $mandoubId = $post["mandoobId"];
       

       return $user = Users::find()
             ->where(['mandoobId' => $mandoubId])
               
                ->all();


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

    public function actionUpdateProfile() {


        $post = Yii::$app->request->post();



        $land_height = $post["land_height"];
        $land_id = $post["land_id"];
        $land_area = $post["land_area"];
        $land_related_public_water = $post["land_related_public_water"];
        $land_has_pond = $post["land_has_pond"];
        $land_has_well = $post["land_has_well"];
        $land_village = $post["land_village"];
        $land_state = $post["land_state"];
        $land_water = $post["land_water"];
        $human = $post["human"];
        $animals = $post["animals"];
        $automatic_energy = $post["automatic_energy"];
        $wind_energy = $post["wind_energy"];
        $solar_energy = $post["solar_energy"];
        $electricity = $post["electricity"];
        $jarrar = $post["jarrar"];
        $rash = $post["rash"];
        $maktoura = $post["maktoura"];
        $sahreej = $post["sahreej"];
        $mdakha = $post["mdakha"];
        $shabaket_ray = $post["shabaket_ray"];
        $alat = $post["alat"];
        $userId = $post["userId"];
        $file = FarmerFile::findOne(["userId" => $userId]);
        if ($file) {
            $file->land_area = $land_area;
            $file->land_height = $land_height;
            $file->land_related_public_water = $land_related_public_water;
            $file->land_has_well = $land_has_well;
            $file->land_state = $land_state;
            $file->land_water = $land_water;
            $file->land_has_pond = $land_has_pond;
            $file->land_id = $land_id;
            $file->land_village = $land_village;
            $file->human = $human;
            $file->animals = $animals;
            $file->automatic_energy = $automatic_energy;
            $file->wind_energy = $wind_energy;
            $file->solar_energy = $solar_energy;
            $file->electricity = $electricity;
            $file->jarrar = $jarrar;
            $file->rash = $rash;
            $file->maktoura = $maktoura;
            $file->sahreej = $sahreej;
            $file->mdakha = $mdakha;
            $file->shabaket_ray = $shabaket_ray;
            $file->alat = $alat;
            if ($file->save()) {

                return $user = Users::find()
                        ->where(['id' => $userId])
                        ->one();
            }
        } else {


            $file = new FarmerFile();
            $file->userId = $userId;
            if ($file->save()) {

                $file->land_area = $land_area;
                $file->land_height = $land_height;
                $file->land_related_public_water = $land_related_public_water;
                $file->land_has_well = $land_has_well;
                $file->land_state = $land_state;
                $file->land_water = $land_water;
                $file->land_has_pond = $land_has_pond;
                $file->land_id = $land_id;
                $file->land_village = $land_village;
                $file->human = $human;
                $file->animals = $animals;
                $file->automatic_energy = $automatic_energy;
                $file->wind_energy = $wind_energy;
                $file->solar_energy = $solar_energy;
                $file->electricity = $electricity;
                $file->jarrar = $jarrar;
                $file->rash = $rash;
                $file->maktoura = $maktoura;
                $file->sahreej = $sahreej;
                $file->mdakha = $mdakha;
                $file->shabaket_ray = $shabaket_ray;
                $file->alat = $alat;

                if ($file->save()) {
                    return $user = Users::find()
                            ->where(['id' => $userId])
                            ->one();
                }
            }
        }
    }

}

//        
//=======
//        $land_height = $post["land_height"];
//        $land_id = $post["land_id"];
//        $land_area = $post["land_area"];
//        $land_related_public_water = $post["land_related_public_water"];
//        $land_has_pond = $post["land_has_pond"];
//        $land_has_well = $post["land_has_well"];
//        $land_village = $post["land_village"];
//        $land_state = $post["land_state"];
//        $land_water = $post["land_water"];
//        $userId = $post["userId"];
//        $file = \app\models\FarmerFile::findOne(["userId" => $userId]);
//        if ($file) {
//            $file->land_area = $land_area;
//            $file->land_height = $land_height;
//            $file->land_related_public_water = $land_related_public_water;
//            $file->land_has_well = $land_has_well;
//            $file->land_state = $land_state;
//            $file->land_water = $land_water;
//            $file->land_has_pond = $land_has_pond;
//            $file->land_id = $land_id;
//            $file->land_village = $land_village;
//            if ($file->save()) {
//
//                return $user = Users::find()
//                        ->where(['id' => $userId])
//                        ->one();
//            }
//        } else {
//
//
//            $file = new \app\models\FarmerFile();
//            $file->userId = $userId;
//            if ($file->save()) {
//
//                $file->land_area = $land_area;
//                $file->land_height = $land_height;
//                $file->land_related_public_water = $land_related_public_water;
//                $file->land_has_well = $land_has_well;
//                $file->land_state = $land_state;
//                $file->land_water = $land_water;
//                $file->land_has_pond = $land_has_pond;
//                $file->land_id = $land_id;
//                $file->land_village = $land_village;
//
//                if ($file->save()) {
//                    return $user = Users::find()
//                            ->where(['id' => $userId])
//                            ->one();
//                }
//            }
//>>>>>>> origin/main
