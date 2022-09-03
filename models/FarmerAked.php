<?php

namespace app\models;


use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 * @property string $area
 * @property string $duration
 * @property string $price
 * @property string $tesleem_place
 *
 * @property User $farmer
 * @property User $mandoub
 */
class FarmerAked extends ActiveRecord
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
            [['farmerId', 'mandoubId', 'place' , 'price'], 'required'],
            [['farmerId', 'mandoubId','area'], 'integer'],
            [['notes'], 'string'],
            [['place', 'quantity', 'type', 'date'], 'string', 'max' => 255],
            [['price', 'tesleem_place','area','duration'], 'string', 'max' => 200],
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
            'farmerId' => Yii::t('app', 'المزارع'),
            'mandoubId' => Yii::t('app', 'المندوب المسؤول'),
            'place' => Yii::t('app', 'المكان'),
            'quantity' => Yii::t('app', 'الكمية'),
            'type' => Yii::t('app', 'نوع المنتج'),
            'date' => Yii::t('app', 'التاريخ'),
            'notes' => Yii::t('app', 'ملاحظات'),
            'price' => Yii::t('app', 'السعر'),
            'tesleem_place' => Yii::t('app', 'مكان التسليم'),
            'area' => Yii::t('app', 'المساحة'),
            'duration' => Yii::t('app', 'المدة'),
        ];
    }

    /**
     * Gets query for [[Farmer]].
     *
     * @return ActiveQuery
     */
    public function getFarmer()
    {
        return $this->hasOne(Users::className(), ['id' => 'farmerId']);
    }

    /**
     * Gets query for [[Mandoub]].
     *
     * @return ActiveQuery
     */
    public function getMandoub()
    {
        return $this->hasOne(Users::className(), ['id' => 'mandoubId']);
    }
}
