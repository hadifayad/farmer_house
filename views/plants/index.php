<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'انسب مزروعات');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'اضافة مزروعات'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
     
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
     [
                'attribute' => 'الاسم',
                'value' => 'name',
            ],[
                'attribute' => 'الاسم في دليل المزارع',
                'value' =>    'data.title'
            ],[
                'attribute' => 'الارتفاع',
                'value' =>  'height0.name'
            ],[
                'attribute' => 'المنطقة',
                'value' => 'mantaa0.name'
            ],[
                'attribute' => 'طريقة الري',
                'value' =>  'waterWays.name'
            ],[
                'attribute' => 'نوع الزرع',
                'value' =>         'plantsTypes.name'
            ],[
                'attribute' => 'الموسم',
                'value' =>    'mawsem0.name'
            ],[
                'attribute' => 'طريقة الزراعة',
                'value' =>   'plantingType.name'
            ],[
                'attribute' => 'نوع التربة',
                'value' =>   'soilType.name',
            ],
       
                
           [
                'attribute' => 'نوع المزروعات',
                'value' =>   'mazrouatType.name'
            ],
         
         
       
        
           
          

            ['class' => 'yii\grid\ActionColumn',
                   'template'=>'{delete} {update}' ],
        ],
    ]); ?>


</div>
