<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity_type".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property MandoobActivities[] $mandoobActivities
 */
class ActivityType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 200],
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
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[MandoobActivities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMandoobActivities()
    {
        return $this->hasMany(MandoobActivities::className(), ['activity_type' => 'id']);
    }
}
