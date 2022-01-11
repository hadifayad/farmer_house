<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "heights".
 *
 * @property int $id
 * @property int $c_from
 * @property int $c_to
 */
class Heights extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'heights';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_from', 'c_to'], 'required'],
            [['c_from', 'c_to'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'c_from' => Yii::t('app', 'C From'),
            'c_to' => Yii::t('app', 'C To'),
        ];
    }
}
