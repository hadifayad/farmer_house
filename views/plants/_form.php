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

<div class="plants-form">

    <?php $form = ActiveForm::begin(); ?>

    
        <?php
    echo $form->field($model, 'data_id')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(Data::find()->all(), 'id', 'title'),
    ])->label(Yii::t('app', 'الاسم في دليل المزارع'));
    ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(Yii::t('app', 'الاسم')) ?>
        <?php
    echo $form->field($model, 'height')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(Heights::find()->all(), 'id', "name"),
    ])->label(Yii::t('app', 'الارتفاع'));
    ?>
        <?php
    echo $form->field($model, 'mantaa')->widget(Select2::class, [
        'name'=>'المنطقة',
        'options' => ['dir' => 'ltr', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(Mantaa::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'المنطقة'));
    ?>
    
        <?php
    echo $form->field($model, 'water_ways')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(WaterType::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'طريقة الري'));
    ?>
    
    
        <?php
    echo $form->field($model, 'plants_types_id')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(PlantsTypes::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'نوع الزرع'));
    ?>
        <?php
    echo $form->field($model, 'mawsem')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(Mawsem::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'الموسم'));
    ?> 
        <?php
    echo $form->field($model, 'planting_type')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(PlantingType::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'طريقة الزراعة'));
    ?>
        <?php
    echo $form->field($model, 'mazrouat_type')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(MazrouatType::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'نوع المزروعات'));
    ?>
        <?php
    echo $form->field($model, 'soil_type')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'Select')],
        'data' => ArrayHelper::map(SoilType::find()->all(), 'id', 'name'),
    ])->label(Yii::t('app', 'نوع التربة'));
    ?>
    
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'حفظ'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
