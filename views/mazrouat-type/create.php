<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MazrouatType */

$this->title = Yii::t('app', 'اضافة نوع مزروع');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mazrouat Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mazrouat-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
