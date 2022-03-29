<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MandoobActivities */

$this->title = Yii::t('app', 'Create Mandoob Activities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mandoob Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mandoob-activities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
