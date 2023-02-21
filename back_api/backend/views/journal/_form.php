<?php
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Journal */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();

?>

<div class="journal-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= Html::img(Yii::getAlias('@web').'/'.$img->getPath(), ['alt'=>'some', 'class'=>'thing', 'height'=>'150px', 'width'=>'150px'])?>

    <?= $form->field($model, 'image')->fileInput()?>

    <?/*= $form->field($model, 'img')->fileInput(['accept' => 'image/*']) */?>

    <?/*= Html::img(Yii::getAlias('@web').'/images/'.$model->img, ['width' => '70px', 'alt' => 'erwrwe']);*/?>
    


    <?= $form->field($model, 'pdf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => ElFinder::ckeditorOptions('elfinder', ['language'=> 'en'])
    ]);
    ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagramm')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'linkendin')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'metakeyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'top')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
