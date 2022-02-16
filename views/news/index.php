<?php

use app\models\NewsMedia;
use app\models\NewsSearch;
use app\models\Users;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;


/* @var $this View */
/* @var $searchModel NewsSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'الأخبار');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'اضافة خبر'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'label' => 'user',
                'value' => function($model) {
                    $user = Users::findOne(['id' => $model->userId]);
                    if ($user) {
                        return $user["username"];
                    } else {
                        return null;
                    }
                }
            ],
            'text:ntext',
            [
                'label' => 'files',
                'value' => function($model) {
                    $count = NewsMedia::find()
                            ->where(["new_id" => $model->id])
                            ->count();

                    return $count;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
