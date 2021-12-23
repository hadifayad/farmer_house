<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_media".
 *
 * @property int $id
 * @property string $file_name
 * @property int $new_id
 *
 * @property News $new
 */
class NewsMedia extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'news_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['file_name', 'new_id'], 'required'],
            [['new_id'], 'integer'],
            [['file_name'], 'string', 'max' => 256],
//              [['file_name'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['new_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['new_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'file_name' => Yii::t('app', 'File Name'),
            'new_id' => Yii::t('app', 'New ID'),
        ];
    }

    /**
     * Gets query for [[New]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNew() {
        return $this->hasOne(News::className(), ['id' => 'new_id']);
    }

}
