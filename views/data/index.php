<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'دليل المزارع');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">

    <h1 ><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'اضافة معلومات'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
          'options' => ['style' => 'width:100%'],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'title',
              [
                'attribute' => 'العنوان',
                'value' => 'title'
            ],
                [
                'attribute' => 'الشرح',
                'value' => 'text',
                    'headerOptions' => ['style' => 'width:30%'],
            ],
//            'text:ntext',//
//            'image',
//            'description',//
            [
                'attribute' => 'العنوان الأب',
                'value' => 'parent0.title'
            ],
           
            ['class' => 'yii\grid\ActionColumn',
                   'template'=>'{delete} {update}' ],
        ],
    ]);
    ?>


</div>
