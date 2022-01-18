<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masader_mozare3".
 *
 * @property int $id
 * @property int $file_id
 * @property int $masdar_id
 *
 * @property FarmerFile $file
 * @property MasaderTa2a $masdar
 */
class MasaderMozare3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'masader_mozare3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'masdar_id'], 'required'],
            [['file_id', 'masdar_id'], 'integer'],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => FarmerFile::className(), 'targetAttribute' => ['file_id' => 'id']],
            [['masdar_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasaderTa2a::className(), 'targetAttribute' => ['masdar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file_id' => Yii::t('app', 'File ID'),
            'masdar_id' => Yii::t('app', 'Masdar ID'),
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(FarmerFile::className(), ['id' => 'file_id']);
    }

    /**
     * Gets query for [[Masdar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasdar()
    {
        return $this->hasOne(MasaderTa2a::className(), ['id' => 'masdar_id']);
    }
}
