<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Heights */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="heights-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_from')->textInput() ?>

    <?= $form->field($model, 'c_to')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
