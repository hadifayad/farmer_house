<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mawsem */

$this->title = Yii::t('app', 'اضافة موسم');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mawsems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mawsem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
