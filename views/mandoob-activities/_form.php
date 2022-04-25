<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MandoobActivities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mandoob-activities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mandoobId')->textInput() ?>

    <?= $form->field($model, 'activity_type')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'farmer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
