<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "farmer_aked".
 *
 * @property int $id
 * @property int $farmerId
 * @property int $mandoubId
 * @property string $place
 * @property string $quantity
 * @property string $type
 * @property string $date
 * @property string $notes
 * @property string $price
 * @property string $tesleem_place
 *
 * @property User $farmer
 * @property User $mandoub
 */
class FarmerAked extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'farmer_aked';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['farmerId', 'mandoubId', 'place', 'quantity', 'type', 'date', 'notes', 'price', 'tesleem_place'], 'required'],
            [['farmerId', 'mandoubId'], 'integer'],
            [['notes'], 'string'],
            [['place', 'quantity', 'type', 'date'], 'string', 'max' => 255],
            [['price', 'tesleem_place'], 'string', 'max' => 200],
//            [['farmerId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['farmerId' => 'id']],
//            [['mandoubId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['mandoubId' => 'id']],
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
            'date' => Yii::t('app', 'Date'),
            'notes' => Yii::t('app', 'Notes'),
            'price' => Yii::t('app', 'Price'),
            'tesleem_place' => Yii::t('app', 'Tesleem Place'),
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
