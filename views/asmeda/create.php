<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asmeda */

$this->title = Yii::t('app', 'Create Asmeda');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asmedas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asmeda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
