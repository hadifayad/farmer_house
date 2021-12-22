<?php

namespace app\models;

use Yii;

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
class News extends \yii\db\ActiveRecord
{
   public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'text'], 'required'],
            [['userId'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            ['imageFile'], 'file', 'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxFiles' => 1,
//            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
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
     * @return \yii\db\ActiveQuery
     */
    public function getNewsMedia()
    {
        return $this->hasMany(NewsMedia::className(), ['new_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
