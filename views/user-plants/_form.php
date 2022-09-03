<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPlants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-plants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'plant_id')->textInput() ?>

    <?= $form->field($model, 'heightId')->textInput() ?>

    <?= $form->field($model, 'plantingTypeId')->textInput() ?>

    <?= $form->field($model, 'plantsTypeId')->textInput() ?>

    <?= $form->field($model, 'waterTypeId')->textInput() ?>

    <?= $form->field($model, 'soilTypeId')->textInput() ?>

    <?= $form->field($model, 'mantaaId')->textInput() ?>

    <?= $form->field($model, 'mazrouatTypeId')->textInput() ?>

    <?= $form->field($model, 'mawsem_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
