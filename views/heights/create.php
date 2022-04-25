<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Heights */

$this->title = Yii::t('app', 'اضافة ارتفاع');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Heights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heights-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
