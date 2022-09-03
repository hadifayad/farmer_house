<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $chatId
 * @property string $type
 * @property string $text
 * @property string $image
 * @property string $creation_date
 * @property int $userId
 *
 * @property Chatwithmandoob $chat
 * @property Chatwithmandoob $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chatId',  'text', 'userId'], 'required'],
            [['chatId', 'userId'], 'integer'],
            [['creation_date'], 'safe'],
            [['type', 'text', 'image'], 'string', 'max' => 200],
            [['chatId'], 'exist', 'skipOnError' => true, 'targetClass' => Chatwithmandoob::className(), 'targetAttribute' => ['chatId' => 'id']],
//            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Chatwithmandoob::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'chatId' => Yii::t('app', 'Chat ID'),
            'type' => Yii::t('app', 'Type'),
            'text' => Yii::t('app', 'Text'),
            'image' => Yii::t('app', 'Image'),
            'creation_date' => Yii::t('app', 'Creation Date'),
            'userId' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[Chat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChat()
    {
        return $this->hasOne(Chatwithmandoob::className(), ['id' => 'chatId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Chatwithmandoob::className(), ['id' => 'userId']);
    }
}
