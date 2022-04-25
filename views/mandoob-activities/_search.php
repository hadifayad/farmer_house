<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MandoobActivitiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mandoob-activities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mandoobId') ?>

    <?= $form->field($model, 'activity_type') ?>

    <?= $form->field($model, 'notes') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'farmer') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
