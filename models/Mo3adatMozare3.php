<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mo3adat_mozare3".
 *
 * @property int $id
 * @property int $file_id
 * @property int $mo3adat_id
 *
 * @property FarmerFile $file
 * @property Anwa3Mo3adat $mo3adat
 */
class Mo3adatMozare3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mo3adat_mozare3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'mo3adat_id'], 'required'],
            [['file_id', 'mo3adat_id'], 'integer'],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => FarmerFile::className(), 'targetAttribute' => ['file_id' => 'id']],
            [['mo3adat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anwa3Mo3adat::className(), 'targetAttribute' => ['mo3adat_id' => 'id']],
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
            'mo3adat_id' => Yii::t('app', 'Mo3adat ID'),
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
     * Gets query for [[Mo3adat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMo3adat()
    {
        return $this->hasOne(Anwa3Mo3adat::className(), ['id' => 'mo3adat_id']);
    }
}
