<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mohafaza".
 *
 * @property int $id
 * @property string $name
 *
 * @property Kadaa[] $kadaas
 */
class Mohafaza extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mohafaza';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
     * Gets query for [[Kadaas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKadaas()
    {
        return $this->hasMany(Kadaa::className(), ['mohafaza_id' => 'id']);
    }
}
