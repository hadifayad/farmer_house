<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPlantsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-plants-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'plant_id') ?>

    <?= $form->field($model, 'heightId') ?>

    <?= $form->field($model, 'plantingTypeId') ?>

    <?php // echo $form->field($model, 'plantsTypeId') ?>

    <?php // echo $form->field($model, 'waterTypeId') ?>

    <?php // echo $form->field($model, 'soilTypeId') ?>

    <?php // echo $form->field($model, 'mantaaId') ?>

    <?php // echo $form->field($model, 'mazrouatTypeId') ?>

    <?php // echo $form->field($model, 'mawsem_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
