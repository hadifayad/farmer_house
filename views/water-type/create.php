<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WaterType */

$this->title = Yii::t('app', 'اضافة ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Water Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="water-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
