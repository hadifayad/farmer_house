<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mantaa */

$this->title = Yii::t('app', 'Create Mantaa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mantaas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantaa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
