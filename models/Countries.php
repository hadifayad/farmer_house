<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property string $country_code
 * @property string $country_enName
 * @property string $country_arName
 * @property string $country_enNationality
 * @property string $country_arNationality
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'required'],
            [['country_code'], 'string', 'max' => 2],
            [['country_enName', 'country_arName', 'country_enNationality', 'country_arNationality'], 'string', 'max' => 100],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => Yii::t('app', 'Country Code'),
            'country_enName' => Yii::t('app', 'Country En Name'),
            'country_arName' => Yii::t('app', 'Country Ar Name'),
            'country_enNationality' => Yii::t('app', 'Country En Nationality'),
            'country_arNationality' => Yii::t('app', 'Country Ar Nationality'),
        ];
    }
}
