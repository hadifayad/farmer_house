<?php

use app\models\UserPlantsSearch;
use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this View */
/* @var $searchModel UserPlantsSearch */
/* @var $dataProvider ActiveDataProvider */


$this->title = Yii::t('app', 'نشاطات المزارعين');
//$this->params['breadcrumbs'][] = $this->title;
//?>




<div class="user-plants-index">



   <div class="portlet box  mCard" " style="background-color:#81bb28" >
        <div class="portlet-title" >
            <div class="caption">
                <i class="fa fa-action caption #81bb28"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="actions">
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
                        'filename' => 'نشاطات المزارعين',
                        'columns' => [
            

      [
                                'attribute' => 'اسم المزارع ',
                                'value' => 'user.fullname'
                            ],
          
                [
                                'attribute' => 'اسم المزروع ',
                                'value' => 'plant.name'
                            ],
             [
                                'attribute' => 'الارتفاع ',
                                'value' => 'height.name'
                            ],
               [
                                'attribute' => 'طريقة الزراعة ',
                                'value' => 'plantingType.name'
                            ],
              [
                                'attribute' => 'نوع الزراعة ',
                                'value' => 'plantsType.name'
                            ],
           [
                                'attribute' => 'طريقة الري ',
                                'value' => 'waterType.name'
                            ],
         [
                                'attribute' => 'نوع التربة',
                                'value' => 'soilType.name'
                            ],
         [
                                'attribute' => 'المنطقة',
                                'value' => 'mantaa.name'
                            ],
         [
                                'attribute' => 'نوع المزروع',
                                'value' => 'mazrouatType.name'
                            ],
         [
                                'attribute' => 'الموسم ',
                                'value' => 'mawsem.name'
                            ],
         [
                                'attribute' => 'التاريخ',
                                'value' => 'date'
                            ],
      
       
           
          
//            'mazrouatTypeId',
//            'mawsem_id',
//            'date',
//            'id',
            


            ]
//            'noExportColumns' => [0],
            ]); 
                        
                        ?>
                       
            </div>
        </div>
        <div class="portlet-body" >
      
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//     'id',
         
               [
                                'attribute' => 'اسم المزارع ',
                                'value' => 'user.fullname'
                            ],
          
                [
                                'attribute' => 'اسم المزروع ',
                                'value' => 'plant.name'
                            ],
             [
                                'attribute' => 'الارتفاع ',
                                'value' => 'height.name'
                            ],
               [
                                'attribute' => 'طريقة الزراعة ',
                                'value' => 'plantingType.name'
                            ],
              [
                                'attribute' => 'نوع الزراعة ',
                                'value' => 'plantsType.name'
                            ],
           [
                                'attribute' => 'طريقة الري ',
                                'value' => 'waterType.name'
                            ],
         [
                                'attribute' => 'نوع التربة',
                                'value' => 'soilType.name'
                            ],
         [
                                'attribute' => 'المنطقة',
                                'value' => 'mantaa.name'
                            ],
         [
                                'attribute' => 'نوع المزروع',
                                'value' => 'mazrouatType.name'
                            ],
         [
                                'attribute' => 'الموسم ',
                                'value' => 'mawsem.name'
                            ],
         [
                                'attribute' => 'التاريخ',
                                'value' => 'date'
                            ],
      
       
           
          
//            'mazrouatTypeId',
//            'mawsem_id',
//            'date',
//            'id',
            

         
//            'date',
            //'farmer',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            
        </div>
   </div>

    

</div>