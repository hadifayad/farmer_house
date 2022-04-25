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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(Yii::t('app', 'العنوان')) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6])->label(Yii::t('app', 'الشرح')) ?>

    <?php
//    $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


    <?php
    echo $form->field($model, 'parent')->widget(Select2::class, [
        'options' => ['dir' => 'rtl', 'placeholder' => Yii::t('app', 'العنوان الأب')],
        'data' => ArrayHelper::map(Data::find()->all(), 'id', 'title'),
        
    ])->label(Yii::t('app', 'العنوان الأب'));
    ?>
    
      <?= $form->field($model, 'order')->textInput(['maxlength' => true])->label(Yii::t('app', 'الترتيب')) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label(Yii::t('app', 'الصورة')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'حفظ'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
