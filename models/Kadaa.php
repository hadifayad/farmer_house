<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kadaa".
 *
 * @property int $id
 * @property string $name
 * @property int $mohafaza_id
 *
 * @property Experts[] $experts
 * @property Mohafaza $mohafaza
 * @property Village[] $villages
 */
class Kadaa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kadaa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mohafaza_id'], 'required'],
            [['mohafaza_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['mohafaza_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mohafaza::className(), 'targetAttribute' => ['mohafaza_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'mohafaza_id' => Yii::t('app', 'Mohafaza ID'),
        ];
    }

    /**
     * Gets query for [[Experts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExperts()
    {
        return $this->hasMany(Experts::className(), ['kadaa_id' => 'id']);
    }

    /**
     * Gets query for [[Mohafaza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMohafaza()
    {
        return $this->hasOne(Mohafaza::className(), ['id' => 'mohafaza_id']);
    }

    /**
     * Gets query for [[Villages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVillages()
    {
        return $this->hasMany(Village::className(), ['kadaa_id' => 'id']);
    }
}
