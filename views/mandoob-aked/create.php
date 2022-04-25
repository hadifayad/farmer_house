<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MandoobAked */

$this->title = Yii::t('app', 'Create Mandoob Aked');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mandoob Akeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mandoob-aked-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
