<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "village".
 *
 * @property int $id
 * @property string $name
 * @property int $kadaa_id
 *
 * @property Kadaa $kadaa
 * @property User[] $users
 */
class Village extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'village';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'kadaa_id'], 'required'],
            [['kadaa_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['village' => 'id']);
    }
}
