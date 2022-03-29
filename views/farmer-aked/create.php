<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FarmerAked */

$this->title = Yii::t('app', 'Create Farmer Aked');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Farmer Akeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farmer-aked-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
