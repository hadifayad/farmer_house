<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlantsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plants-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'height') ?>

    <?= $form->field($model, 'mantaa') ?>

    <?php // echo $form->field($model, 'water_ways') ?>

    <?php // echo $form->field($model, 'plants_types_id') ?>

    <?php // echo $form->field($model, 'mawsem') ?>

    <?php // echo $form->field($model, 'planting_type') ?>

    <?php // echo $form->field($model, 'mazrouat_type') ?>

    <?php // echo $form->field($model, 'soil_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
