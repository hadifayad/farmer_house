<?php

namespace app\models;

use yii\base\Model;
use const API_ACCESS_KEY;

/**
 * ContactForm is the model behind the contact form.
 */
class NotificationForm extends Model {

    public $subject;
    public $message;

//    public $token;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['subject', 'message'], 'required'], //token
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'subject' => 'Subject',
            'message' => 'Message',
//            'token' => 'Device Tocken'
        ];
    }

    public function notify() {

        define('API_ACCESS_KEY', 'AAAAnp-SqS8:APA91bG6EtrPwLhwoqnPYckaFwYOJFJPveLlTPUtsp2HVRAB4TS5xECVIQcSGxFbVFb0L1NzB1w4laLHEGX1QjM8yrigBEWF2puhEohjuYVS9wSDDLrBimk_WTIbo4disRHaT7o1cUM0');
        
        $msg = array
            (
            'title' => $this->subject,
            'body' => $this->message,
        );
        $fields = array
            (
//            'registration_ids' => $registrationIds,
            "to" => "/topics/price",
            'notification' => $msg,
            'data' => [
                "name" => $this->subject,
                "text" => $this->message,
            ]
        );

        $headers = array
            (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);


        $msg1 = array
            (
            'title' => $this->subject,
            'body' => $this->message,
        );
        $fields1 = array
            (
//            'registration_ids' => $registrationIds,
            "to" => "/topics/price",
            'notification' => $msg1
        );

        $headers1 = array
            (
            'Authorization: key=AAAAnp-SqS8:APA91bG6EtrPwLhwoqnPYckaFwYOJFJPveLlTPUtsp2HVRAB4TS5xECVIQcSGxFbVFb0L1NzB1w4laLHEGX1QjM8yrigBEWF2puhEohjuYVS9wSDDLrBimk_WTIbo4disRHaT7o1cUM0',
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields1));
        $result = curl_exec($ch);
        curl_close($ch);

        return true;
    }

    public function notifyToUserChat($registrationToken,$chatId) {

        $msg = array
            (
            'title' => $this->subject,
            'body' => $this->message,
        );
        $fields = array
            (
//            'registration_ids' => array("esEMjfzuTgaZ31t0tOLsJ_:APA91bGBTatlpHVlYsHsGTHpZr3EP7-lGimai1dnR9dDccTW2N9BtktxJs3hlUMaCwX8pG72oeTHORkFS2hW11wBtieB9UY1bEcmVhYqJMTkk5-zjA38Plc2pkCzcBH5sqnxUpC7XEYG"),
            'registration_ids' => $registrationToken,
            'notification' => $msg,
            'data' => [
//                "chat" =>  '1',
                "chatId" => $chatId,
                "name" => $this->subject,
                "text" => $this->message,
            ]
        );

        $headers = array
            (
            'Authorization: key=AAAAnp-SqS8:APA91bG6EtrPwLhwoqnPYckaFwYOJFJPveLlTPUtsp2HVRAB4TS5xECVIQcSGxFbVFb0L1NzB1w4laLHEGX1QjM8yrigBEWF2puhEohjuYVS9wSDDLrBimk_WTIbo4disRHaT7o1cUM0',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return true;
    }
    
    
    public function notifyUsers($registrationToken) {
        

        $msg = array
            (
            'title' => $this->subject,
            'body' => $this->message,
        );
        $fields = array
            (
//            'registration_ids' => array("esEMjfzuTgaZ31t0tOLsJ_:APA91bGBTatlpHVlYsHsGTHpZr3EP7-lGimai1dnR9dDccTW2N9BtktxJs3hlUMaCwX8pG72oeTHORkFS2hW11wBtieB9UY1bEcmVhYqJMTkk5-zjA38Plc2pkCzcBH5sqnxUpC7XEYG"),
            'registration_ids' => $registrationToken,
            'notification' => $msg,
//            'data' => [
////                "chat" => "1",
//                "name" => $this->subject,
//                "text" => $this->message,
//            ]
        );

        $headers = array
            (
            'Authorization: key=AAAAnp-SqS8:APA91bG6EtrPwLhwoqnPYckaFwYOJFJPveLlTPUtsp2HVRAB4TS5xECVIQcSGxFbVFb0L1NzB1w4laLHEGX1QjM8yrigBEWF2puhEohjuYVS9wSDDLrBimk_WTIbo4disRHaT7o1cUM0',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return true;
    }

}
