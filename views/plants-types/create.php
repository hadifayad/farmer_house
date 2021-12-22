<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlantsTypes */

$this->title = Yii::t('app', 'Create Plants Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plants Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
