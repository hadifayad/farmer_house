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
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'height') ?>

    <?= $form->field($model, 'temp') ?>

    <?= $form->field($model, 'water') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'tools') ?>

    <?php // echo $form->field($model, 'water_ways') ?>

    <?php // echo $form->field($model, 'plants_types_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
