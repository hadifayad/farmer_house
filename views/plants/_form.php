<?php

use app\models\Data;
use app\models\Heights;
use app\models\Mantaa;
use app\models\Mawsem;
use app\models\MazrouatType;
use app\models\PlantingType;
use app\models\Plants;
use app\models\PlantsTypes;
use app\models\SoilType;
use app\models\WaterType;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Plants */
/* @var $form ActiveForm */
?>

<div class="plants-form" style="direction: rtl">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'heights')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(Heights::find()->all(), 'id', "name"),
    ]);
    ?>
    <?php
    echo $form->field($model, 'mantaas')->widget(Select2::class, [
        'name' => 'المنطقة',
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(Mantaa::find()->all(), 'id', 'name'),
    ]);
    ?>
    <?php
    echo $form->field($model, 'water_wayss')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(WaterType::find()->all(), 'id', 'name'),
    ]);
    ?>
    <?php
    echo $form->field($model, 'plants_types_ids')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(PlantsTypes::find()->all(), 'id', 'name'),
    ]);
    ?>
    <?php
    echo $form->field($model, 'mawsems')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(Mawsem::find()->all(), 'id', 'name'),
    ]);
    ?> 
    <?php
    echo $form->field($model, 'planting_types')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(PlantingType::find()->all(), 'id', 'name'),
    ]);
    ?>
    <?php
    echo $form->field($model, 'mazrouat_types')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(MazrouatType::find()->all(), 'id', 'name'),
    ]);
    ?>
    <?php
    echo $form->field($model, 'soil_types')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر'), 'multiple' => true],
        'data' => ArrayHelper::map(SoilType::find()->all(), 'id', 'name'),
    ]);
    ?>

    <?php
    echo $form->field($model, 'data_id')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'اختر')],
        'data' => ArrayHelper::map(Data::find()->all(), 'id', 'title'),
    ])->label(Yii::t('app', 'الاسم في دليل المزارع'));
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(Yii::t('app', 'الاسم')) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'حفظ'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
