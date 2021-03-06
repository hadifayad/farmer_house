<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SoilType */

$this->title = Yii::t('app', 'اضافة نوع تربة');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Soil Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soil-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
