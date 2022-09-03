<?php

use app\models\Kadaa;
use app\models\Users;
use app\models\Village;
use kartik\widgets\Select2;
use richardfan\widget\JSRegister;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Users */

$this->title = 'مستخدم جديد';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label("اسم المستخدم") ?>

    <?= $form->field($model, 'password')->passwordInput()->label("كلمة المرور") ?>
    
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true])->label("الاسم الكامل") ?>



   <?php
//            $form->field($model, 'user_role')->dropDownList([Users::MANDOUB => 'مندوب', Users::MOZARE3 => 'مزارع'])->label("الدور") 
            ?>
    
      <?php
    echo $form->field($model, 'user_role')->widget(Select2::classname(), [
        'data' => [Users::MANDOUB => 'مندوب', Users::MOZARE3 => 'مزارع'],
        'options' => [
            'placeholder' => Yii::t("app", "Select"),
//            'dir' => 'rtl'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?php
    echo $form->field($model, 'village')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Village::find()->all(), 'id', 'name'),
        'options' => [
            'placeholder' => Yii::t("app", "Select"),
//            'dir' => 'rtl'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    
    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label("العنوان") ?>
  

  



    <?= $form->field($model, 'phone')->textInput() ?>
    
        <?php echo $form->field($model, 'mandoobId')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Users::find()->where(["user_role"=>1])->all(), 'id', 'fullname'),
        'options' => [
            'placeholder' => Yii::t("app", "Select"),
            'dir' => 'rtl'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("المندوب المسؤول");
    ?>
    
       <?php echo $form->field($model, 'mandoobmohafaza')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kadaa::find()->select("mohafaza")->distinct("mohafaza")->all(), 'mohafaza', 'mohafaza'),
        'options' => [
            'placeholder' => Yii::t("app", "Select"),
            'dir' => 'rtl'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("المحافظة المسؤول عنها",['class'=>'label-sclass'] );
    ?>

    
    
    
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
JSRegister::begin([
    'id' => '1',
    'position' => static::POS_END
]);
?>

<script>


</script>
<?php
JSRegister::end();
?>

