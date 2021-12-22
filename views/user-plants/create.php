<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPlants */

$this->title = Yii::t('app', 'Create User Plants');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Plants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-plants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
