<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mandoob_activities".
 *
 * @property int $id
 * @property int $mandoobId
 * @property int $activity_type
 * @property string|null $notes
 * @property string $date
 * @property int|null $farmer
 *
 * @property ActivityType $activityType
 * @property User $farmer0
 * @property User $mandoob
 */
class MandoobActivities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mandoob_activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mandoobId', 'activity_type', 'date'], 'required'],
            [['mandoobId', 'activity_type', 'farmer'], 'integer'],
            [['notes'], 'string'],
            [['date'], 'safe'],
            [['farmer'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['farmer' => 'id']],
            [['mandoobId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['mandoobId' => 'id']],
            [['activity_type'], 'exist', 'skipOnError' => true, 'targetClass' => ActivityType::className(), 'targetAttribute' => ['activity_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mandoobId' => Yii::t('app', 'Mandoob ID'),
            'activity_type' => Yii::t('app', 'Activity Type'),
            'notes' => Yii::t('app', 'Notes'),
            'date' => Yii::t('app', 'Date'),
            'farmer' => Yii::t('app', 'Farmer'),
        ];
    }

    /**
     * Gets query for [[ActivityType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivityType()
    {
        return $this->hasOne(ActivityType::className(), ['id' => 'activity_type']);
    }

    /**
     * Gets query for [[Farmer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFarmer0()
    {
        return $this->hasOne(User::className(), ['id' => 'farmer']);
    }

    /**
     * Gets query for [[Mandoob]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMandoob()
    {
        return $this->hasOne(User::className(), ['id' => 'mandoobId']);
    }
}
