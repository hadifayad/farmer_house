<?php

use app\models\News;
use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $model News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

Pjax::begin(['id' => 'pjax-id']);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userId',
            'text:ntext',
        ],
    ])
    ?>
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <label>
                Images
            </label>
            <?= Html::a(Yii::t('app', 'Add Images'), ['news/add-images', 'id' => $model->id], ['class' => 'btn btn-primary pull-right']) ?>
        </div>
        <div class="panel panel-body">

            <div class="col-lg-12">
                <?php
                for ($i = 0; $i < sizeof($newsMedia); $i++) {
//            \yii\helpers\VarDumper::dump($newsMedia, 3, true);
                    ?>
                    <div class="col-lg-2">
                        <img  
                            width="100px"
                            path="<?= Yii::getAlias('@webroot/newsUploads/') . $newsMedia[$i]["file_name"] ?>"
                            src="<?= 'newsUploads/' . $newsMedia[$i]["file_name"] ?>">   
                        <button class="delete-btn" 
                                filename="<?= $newsMedia[$i]["file_name"] ?>"
                                newsMediaId="<?= $newsMedia[$i]["id"] ?>"
                                style="top: 0px;
                                right: 60px;background-color: Transparent;border: none;
                                position: absolute;color: red;font-weight: bold;" >x</button>
                    </div>

                    <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>

<?php
//VarDumper::dump($appointments, 3, true);


JSRegister::begin([
    'id' => '1',
    'position' => static::POS_END
]);
?>

<script>

    $(".delete-btn").click(function () {

        var newsMediaId = $(this).attr("newsMediaId");
        var filename = $(this).attr("filename");

        var result = confirm("هل أنت متأكد؟");
        if (result) {
            $.ajax({
                url: '<?php echo Url::toRoute("/news/delete-file") ?>',
                type: "POST",
                data: {
                    'newsMediaId': newsMediaId,
                    'filename': filename,
                },
                success: function (data) {
                    console.log(data);
                    if (data["success"] == true) {
                        $.pjax.reload({container: '#pjax-id', async: false, timeout: 2e3});

                    } else {
                    }
                },
                error: function (errormessage) {
                    console.log("not working");
                }
            });
        }





    });


</script>
<?php
JSRegister::end();
Pjax::end();
?>
