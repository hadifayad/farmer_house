<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string $title
 * @property string|null $text
 * @property int|null $image
 * @property string|null $description
 * @property int|null $parent
 *
 * @property Data[] $datas
 * @property Data $parent0
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['image', 'parent'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Data::className(), 'targetAttribute' => ['parent' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'image' => Yii::t('app', 'Image'),
            'description' => Yii::t('app', 'Description'),
            'parent' => Yii::t('app', 'Parent'),
        ];
    }

    /**
     * Gets query for [[Datas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['parent' => 'id']);
    }

    /**
     * Gets query for [[Parent0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Data::className(), ['id' => 'parent']);
    }
}
