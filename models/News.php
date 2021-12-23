<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
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
class News extends ActiveRecord {

    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['userId', 'text'], 'required'],
            [['userId'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => true,
                'extensions' => 'png, jpg',
                'maxFiles' => 5,
            ]
//            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'userId' => Yii::t('app', 'User ID'),
            'text' => Yii::t('app', 'Text'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * Gets query for [[NewsMedia]].
     *
     * @return ActiveQuery
     */
    public function getNewsMedia() {
        return $this->hasMany(NewsMedia::className(), ['new_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'userId']);
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
//                $file->saveAs('newsUploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
//            VarDumper::dump($this->getErrors(), 3, true);
//            die();
            return false;
        }
    }

}
