<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string $title
 * @property string|null $text
 * @property string|null $image
 * @property string|null $description
 * @property int|null $parent
 *
 * @property Data[] $datas
 * @property Messages[] $messages
 * @property Data $parent0
 */
class Data extends ActiveRecord {

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['parent'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 100],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Data::className(), 'targetAttribute' => ['parent' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'image' => 'Image',
            'description' => 'Description',
            'parent' => 'Parent',
        ];
    }

    /**
     * Gets query for [[Datas]].
     *
     * @return ActiveQuery
     */
    public function getDatas() {
        return $this->hasMany(Data::className(), ['parent' => 'id']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return ActiveQuery
     */
    public function getMessages() {
        return $this->hasMany(Messages::className(), ['dataId' => 'id']);
    }

    /**
     * Gets query for [[Parent0]].
     *
     * @return ActiveQuery
     */
    public function getParent0() {
        return $this->hasOne(Data::className(), ['id' => 'parent']);
    }

    public function upload() {

        if ($this->imageFile) {
            $filePath = $this->uploadPath() . $this->image;
            if (is_file($filePath) && file_exists($filePath)) {
                unlink($filePath);
            }

            $path = $this->uploadPath() . $this->id . "." . $this->imageFile->extension;
            $this->image = $this->id . "." . $this->imageFile->extension;
            if ($this->save()) {
                $this->imageFile->saveAs($path);
            } else {
                
            }
            return true;
        } else {
            return false;
        }
    }

    public function uploadPath() {
        return Url::to('dataImages/');
    }

}
