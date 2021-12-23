<?php

use app\models\Data;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Data */
/* @var $form ActiveForm */
?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


               <?php
            echo $form->field($model, 'parent')->widget(Select2::class, [
                'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
                'data' => ArrayHelper::map(Data::find()->all(), 'id', 'title'),
    
                
            ]);
            ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
