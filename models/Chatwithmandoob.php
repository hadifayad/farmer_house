<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "chatwithmandoob".
 *
 * @property int $id
 * @property int $user
 * @property int $mandoob
 * @property string|null $title
 * @property string $creation_date
 *
 * @property Comments[] $comments
 * @property Comments[] $comments0
 */
class Chatwithmandoob extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chatwithmandoob';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'mandoob'], 'required'],
            [['user', 'mandoob'], 'integer'],
            [['creation_date'], 'safe'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user' => Yii::t('app', 'User'),
            'mandoob' => Yii::t('app', 'Mandoob'),
            'title' => Yii::t('app', 'Title'),
            'creation_date' => Yii::t('app', 'Creation Date'),
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['chatId' => 'id']);
    }

    /**
     * Gets query for [[Comments0]].
     *
     * @return ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comments::className(), ['userId' => 'id']);
    }
}
