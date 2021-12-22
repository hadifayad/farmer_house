<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Adweya */

$this->title = Yii::t('app', 'Create Adweya');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adweyas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adweya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
