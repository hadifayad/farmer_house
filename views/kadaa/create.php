<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kadaa */

$this->title = Yii::t('app', 'Create Kadaa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kadaas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kadaa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
