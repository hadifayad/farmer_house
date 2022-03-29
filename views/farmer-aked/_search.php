<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FarmerAkededSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farmer-aked-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'farmerId') ?>

    <?= $form->field($model, 'mandoubId') ?>

    <?= $form->field($model, 'place') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'tesleem_place') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
