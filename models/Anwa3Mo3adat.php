<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anwa3_mo3adat".
 *
 * @property int $id
 * @property string $name
 *
 * @property Mo3adatMozare3[] $mo3adatMozare3s
 */
class Anwa3Mo3adat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anwa3_mo3adat';
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
     * Gets query for [[Mo3adatMozare3s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMo3adatMozare3s()
    {
        return $this->hasMany(Mo3adatMozare3::className(), ['mo3adat_id' => 'id']);
    }
}
