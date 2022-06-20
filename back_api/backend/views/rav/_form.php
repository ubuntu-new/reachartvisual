<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Rav */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();
$_SESSION['KCFINDER'] = array(
    'disabled' => false
);
?>

<div class="rav-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput()?>

    <?= Html::img(Yii::getAlias('@web').'/'.$img->getPath(), ['alt'=>'some', 'class'=>'thing', 'height'=>'150px', 'width'=>'150px'])?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'clientOptions' =>  elfinder\ElFinder::ckeditorOptions('elfinder',
            [
                'language'=>'en', 'title'=>'Paragraph'
            ]
        ),
    ]);?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

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
