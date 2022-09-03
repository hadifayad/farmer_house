
<?php

use lo\widgets\modal\ModalAjax;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel ActivitiesSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'المستخدمون';

echo ModalAjax::widget([
    'id' => 'my-ajax',
    'selector' => '.my-ajax', // all buttons in grid view with href attribute
    'options' => ['class' => 'header-green', 'tabindex' => false],
    'pjaxContainer' => '#grid-pjax',
    'autoClose' => true,
]);
?>
<?php
Pjax::begin([
    'id' => 'grid-pjax',
    'timeout' => 5000,
]);
?>
<div>
    <div class="portlet box  mCard" " style="background-color:#81bb28" >
        <div class="portlet-title" >
            <div class="caption">
                <i class="fa fa-book caption #81bb28"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="actions">
                <div class="btn-group btn-group-xs btn-group-solid caption-subject actions ">
<?=
Html::a('إضافة مستخدم', ['my-create'], ['class' => 'pull-right  btn btn-default btn-sm',
    'style' => 'margin-top:5px',
    'title' => 'إضافة مستخدم'
])
?>



                </div>
            </div>
        </div>
        <div class="portlet-body" >


<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' =>
    //                Html::activeDropDownList($searchModel, 'myPageSize', [20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize']) .
    '{items}{summary}{pager}',
    'filterSelector' => '#myPageSize',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //                  'id',
                          'username',
        'fullname',
        'phone',
        
//                            [
//                                'attribute' => 'r_party',
//                                'value' => 'rParty.c_name'
//                            ],
    
//       [
//                                'attribute' => 'اسم المستخدم',
//                                'value' => 'username'
//                            ],
//                [
//                                'attribute' => 'الاسم الكامل',
//                                'value' => 'fullname'
//                            ],
//          [
//                                'attribute' => 'رقم الهاتف',
//                                'value' => 'phone'
//                            ],
          [
                                'attribute' => 'القرية',
                                'value' => 'village0.name'
                            ], 
                                'value' => 'address',
                          
         [
                                'attribute' => 'المندوب المسؤول',
                                'value' => 'mandoob.fullname'
                            ],
         [
                                'attribute' => 'الدور',
                                'value' => 'user_role',
         'value'=> function($model){
        if($model->user_role ==1){
            return "مندوب";
        }
        else{
            return "مزارع";
        }
    }
             ],
                     
                       [
                                'attribute' => ' المحافظة المسؤول عنها',
                               
                              'value'=> function($model){
        if($model->mandoobmohafaza !=null){
            return $model->mandoobmohafaza;
        }
        else{
            return "لا يوجد";
        }
    }
                            ],
        
   
    
        //                        ['class' => 'yii\grid\ActionColumn'],
        [
            //                        'width' => '100px',
            'contentOptions' => ['style' => 'width:140px;'],
            'header' => "الإجراءات",
            'class' => ActionColumn::class,
            'template' => '{my-update}',
            'buttons' => [
//                'view' => function ($url, $model) {
//                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
//                        'class' => 'btn btn-success btn-xs',
//                        'data-pjax' => 0
//                    ]);
//                },
//                'update' => function ($url, $model) {
//                    return Html::a('<span class="glyphicon glyphicon-pencil "></span>', $url, [
//                        'class' => 'btn btn-primary btn-xs',
//                        'title' => 'تعديل'
//                    ]);
//                },
//                'delete' => function ($url, $model) {
//                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
//                        'class' => 'btn btn-danger btn-xs',
//                        'data-pjax' => 0,
//                        'data' => [
//                            'method' => 'post',
//                            'params' => [
//                                'id' => $model->id
//                            ],
//                            'confirm' => "هل أنت متأكد من الحذف؟",
//                            'title' => 'التأكيد',
//                            'ok' => 'نعم',
//                            'cancel' => 'كلا',
//                        ]
//                    ]);
//                },
                'my-update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                        'class' => 'btn btn-primary btn-xs',
                        'title' => 'تعديل'
                    ]);
                }
            ]
        ],
    ],
]);
?>

        </div>
    </div>


<?php
JSRegister::begin([
    'id' => ''
]);
?>
    <script>
        //    $(".portlet").att("display","");
        //    $(".portlet").hide().slideToggle('slow');

    </script>

<?php JSRegister::end(); ?>

<?php Pjax::end(); ?>

