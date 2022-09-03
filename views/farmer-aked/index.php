<?php

use app\models\FarmerAkedSearch;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this View */
/* @var $searchModel FarmerAkedSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'طلبات العقود');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farmer-aked-index">

    <h1  style="    text-align: center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
//        Html::a(Yii::t('app', 'Create Farmer Aked'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= 
       $fullExportMenu = ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'onRenderSheet' => function($sheet, $grid) {
                            $sheet->setRightToLeft(true);
                        },
                        'showColumnSelector' => false,
                        'showConfirmAlert' => false,
                        'asDropdown' => false,
                        'target' => ExportMenu::TARGET_SELF,
                        'exportConfig' => [
                            ExportMenu::FORMAT_CSV => false,
                            ExportMenu::FORMAT_HTML => false,
                            ExportMenu::FORMAT_PDF => false,
                            ExportMenu::FORMAT_TEXT => false,
                            ExportMenu::FORMAT_EXCEL => false,
                            ExportMenu::FORMAT_EXCEL_X => [
                                'label' => Yii::t('app', 'تصدير الجدول'),
                                'options' => ['class' => ' btn  bg-green-seagreen  bg-font-green-seagreen',],
                                'icon' => 'print',
                                'linkOptions' => ['style' => 'color:white;',],
                                'iconOptions' => ['class' => 'text-info', 'style' => 'color:white;'],
                            ],
                        ],
                        'styleOptions' => [
                            ExportMenu::FORMAT_EXCEL_X => [
                                'label' => Yii::t('app', 'Export to Excel'),
                                'font' => [
                                    'bold' => true,
                                    'color' => [
                                        'argb' => 'FF000000',
                                    ],
                                ],
                                'fill' => [
                                    'type' => Fill::FILL_SOLID,
                                    'color' => [
                                        'argb' => 'FF26A69A',
                                    ],
                                ],
                            ],
                        ],
                        'filename' => 'طلبات العقود',
                        'columns' => [
            

//            'id',
            [
                'attribute'=>'اسم المزارع',
                'value'=>'farmer.fullname',
                
            ],
             [
                'attribute'=>'المندوب',
                'value'=> 'mandoub.fullname',
                
            ],
            'place',
            'quantity',
            'type',
            'date',
            'notes:ntext',
            'price',
            'tesleem_place',
                            'area',

            ]
//            'noExportColumns' => [0],
            ]); 
                        
                        ?>
                        <hr>
   
   <?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            
            [
                'attribute'=>'اسم المزارع',
                'value'=>'farmer.fullname',
                
            ],
             [
                'attribute'=>'المندوب',
                'value'=> 'mandoub.fullname',
                
            ],
           
            'place',
            'quantity',
            'type',
            'date',
            'notes:ntext',
            'price',
            'tesleem_place',
              'area',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
