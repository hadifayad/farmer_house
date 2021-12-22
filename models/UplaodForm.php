<?php

use yii\base\Model;
use yii\web\UploadedFile;

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class UploadForm extends Model
{
       /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules() {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxFiles' => 1],
        ];
    }

    public function attributeLabels() {
        return [
            'imageFiles' => Yii::t('models', 'الملفات'),
        ];
    }

    public function upload($user) {
        if ($this->validate()) {
            $file = $this->imageFile;
            $filename = Yii::$app->security->generateRandomString() . '.' . $file->extension;
            if ($user->c_profile_picture != null) {
                if (is_file("profilePicturesUploads/" . $user->c_profile_picture)) {
                    unlink('profilePicturesUploads/' . $user->c_profile_picture);
                }
            }
            $file->saveAs('profilePicturesUploads/' . $filename);
            $user->c_profile_picture = $filename;
            $user->save();
            return true;
        } else {
            return false;
        }
    }

}