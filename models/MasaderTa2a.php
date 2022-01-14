<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masader_ta2a".
 *
 * @property int $id
 * @property string $name
 *
 * @property MasaderMozare3[] $masaderMozare3s
 */
class MasaderTa2a extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'masader_ta2a';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
        ];
    }

    /**
     * Gets query for [[MasaderMozare3s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasaderMozare3s()
    {
        return $this->hasMany(MasaderMozare3::className(), ['masdar_id' => 'id']);
    }
}
