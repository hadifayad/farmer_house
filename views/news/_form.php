<?php

use app\models\News;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model News */
/* @var $form ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userId')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

     
    
            <?php
            echo $form->field($model, 'imageFile')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => '*',
//                    'multiple' => false
                ],
                'pluginOptions' => [
                    'overwriteInitial' => false,
                    'maxFileSize' => 1000000,
                    'removeClass' => 'btn btn-danger',
                    'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
                ]
            ]);
            ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
