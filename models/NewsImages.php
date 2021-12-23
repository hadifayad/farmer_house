<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $userId
 * @property string $text
 * @property string $date
 *
 * @property NewsMedia[] $newsMedia
 * @property User $user
 * @property User $imageFile
 */
class NewsImages extends Model {

    public $file;

    public function rules() {
        return [
            [['file'], 'file', 'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxFiles' => 5,
            ]
        ];
    }

    public function attributeLabels() {
        return [
            'file' => Yii::t('app', 'File'),
        ];
    }

    public function uploadFiles($files, $newsId) {
        if ($this->validate()) {
            foreach ($files as $file) {
                $randomString = Yii::$app->security->generateRandomString();
                $imageName = $randomString . '.' . $file->extension;
                $newsMedia = new NewsMedia();
                $newsMedia->file_name = $imageName;
                $newsMedia->new_id = $newsId;
                if ($newsMedia->save()) {
                    
                } else {
                    VarDumper::dump($newsMedia->getErrors(), 3, true);
                    die();
                }
                $file->saveAs('newsUploads/' . $imageName);
            }
            return true;
        } else {
            return false;
        }
    }

}
