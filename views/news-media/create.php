<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsMedia */

$this->title = Yii::t('app', 'Create News Media');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Media'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
