<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experts".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $kadaa_id
 *
 * @property Kadaa $kadaa
 */
class Experts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'kadaa_id'], 'required'],
            [['kadaa_id'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['kadaa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kadaa::className(), 'targetAttribute' => ['kadaa_id' => 'id']],
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
            'phone' => Yii::t('app', 'Phone'),
            'kadaa_id' => Yii::t('app', 'Kadaa ID'),
        ];
    }

    /**
     * Gets query for [[Kadaa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKadaa()
    {
        return $this->hasOne(Kadaa::className(), ['id' => 'kadaa_id']);
    }
}
