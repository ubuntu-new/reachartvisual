<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use dosamigos\tinymce\TinyMce;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Journal */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();
$_SESSION['KCFINDER'] = array(
    'disabled' => false
);
?>

<div class="journal-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php $images = $model->getImages();?>

    <div class="row">
        <?php foreach ($images as $image):?>

            <div class="col-md-3 text-center">
                <img src="<?=$image->getUrl('150x');?>">
            </div>

        <?php endforeach;?>
    </div>

    <?= $form->field($model, 'image')->fileInput()?>

    <?/*= $form->field($model, 'img')->fileInput(['accept' => 'image/*']) */?>

    <?/*= Html::img(Yii::getAlias('@web').'/images/'.$model->img, ['width' => '70px', 'alt' => 'erwrwe']);*/?>
    
    <?= $form->field($model, 'pdf')->fileInput(['maxlength' => false]) ?>

    <?= $form->field($model, 'pdf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagramm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'linkendin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metakeyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 0 => '0', 1 => '1', 2 => '2', 13 => '13', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'top')->dropDownList([ '0', '1', '2', ], ['prompt' => '']) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
