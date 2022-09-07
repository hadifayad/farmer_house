<?php

use app\models\MandoobActivitiesSearch;
use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
/* @var $this View */
/* @var $searchModel MandoobActivitiesSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'نشاطات المندوب');
//$this->params['breadcrumbs'][] = $this->title;
//?>
<div class="mandoob-activities-index">



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
                        'filename' => 'نشاطات المندوبون',
                        'columns' => [
            

//            'id',
             [
                                'attribute' => 'المندوب ',
                                'value' => 'mandoob.fullname'
                            ],
//            'mandoobId',
             [
                                'attribute' => 'نوع النشاط ',
                                'value' => 'activity.name'
                            ],
            
                 [
                                'attribute' => 'المزارع',
                                'value' => 'farmer0.fullname'
                            ],
             [
                                'attribute' => 'الملاحظات',
                                'value' => 'notes'
                            ],
           [
                                'attribute' => 'تاريخ النشاط',
                                'value' => 'date'
                            ],

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

//            'id',
             [
                                'attribute' => 'المندوب ',
                                'value' => 'mandoob.fullname'
                            ],
//            'mandoobId',
             [
                                'attribute' => 'نوع النشاط ',
                                'value' => 'activity.name'
                            ],
            
                 [
                                'attribute' => 'المزارع',
                                'value' => 'farmer0.fullname'
                            ],
             [
                                'attribute' => 'الملاحظات',
                                'value' => 'notes'
                            ],
           [
                                'attribute' => 'تاريخ النشاط',
                                'value' => 'date'
                            ],
         
//            'date',
            //'farmer',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            
        </div>
   </div>

    

</div>
