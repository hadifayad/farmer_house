<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mandoob_aked".
 *
 * @property int $id
 * @property int $farmerId
 * @property int $mandoubId
 * @property string $place
 * @property string $quantity
 * @property string $type
 * @property string $price
 * @property string $tesleem_place
 * @property string $date
 * @property string $notes
 *
 * @property User $farmer
 * @property User $mandoub
 */
class MandoobAked extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mandoob_aked';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['farmerId', 'mandoubId', 'place', 'quantity', 'type', 'price', 'tesleem_place', 'date', 'notes'], 'required'],
            [['farmerId', 'mandoubId'], 'integer'],
            [['notes'], 'string'],
            [['place', 'quantity', 'type', 'price', 'tesleem_place', 'date'], 'string', 'max' => 255],
//            [['farmerId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['farmerId' => 'id']],
//            [['mandoubId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['mandoubId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'farmerId' => Yii::t('app', 'Farmer ID'),
            'mandoubId' => Yii::t('app', 'Mandoub ID'),
            'place' => Yii::t('app', 'Place'),
            'quantity' => Yii::t('app', 'Quantity'),
            'type' => Yii::t('app', 'Type'),
            'price' => Yii::t('app', 'Price'),
            'tesleem_place' => Yii::t('app', 'Tesleem Place'),
            'date' => Yii::t('app', 'Date'),
            'notes' => Yii::t('app', 'Notes'),
        ];
    }

    /**
     * Gets query for [[Farmer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFarmer()
    {
        return $this->hasOne(User::className(), ['id' => 'farmerId']);
    }

    /**
     * Gets query for [[Mandoub]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMandoub()
    {
        return $this->hasOne(User::className(), ['id' => 'mandoubId']);
    }
}
