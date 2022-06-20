<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use dosamigos\tinymce\TinyMce;
use backend\models\Categories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
/* @var $model backend\models\Categories */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <?= $form->field($model, 'catId')->dropDownList(ArrayHelper::map(Categories::find()->asArray()->all(), 'id', 'name'))?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput()?>

    <?= Html::img(Yii::getAlias('@web').'/'.$img->getPath(), ['alt'=>'some', 'class'=>'thing', 'height'=>'150px', 'width'=>'150px'])?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link image charmap print preview anchor media",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages "

            ],
            'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages media"
        ]
    ]);?>

    <?= $form->field($model, 'description_ge')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link image charmap print preview anchor media",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages "

            ],
            'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages media"
        ]
    ]);?>

    <?= $form->field($model, 'metakeyword')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link image charmap print preview anchor media",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages "

            ],
            'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages media"
        ]
    ]);?>

    <?= $form->field($model, 'metakeyword_ge')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link image charmap print preview anchor media",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages "

            ],
            'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages media"
        ]
    ]);?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offer')->radioList( [0=>'No', 1 => 'Yes'], ['unselect' => null] ); ?>

    <?= $form->field($model, 'offerPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latest')->radioList( [0=>'No', 1 => 'Yes'], ['unselect' => null] ); ?>

    <?= $form->field($model, 'bestSellers')->radioList( [0=>'No', 1 => 'Yes'], ['unselect' => null] ); ?>

    <?= $form->field($model, 'trending')->radioList( [0=>'No', 1 => 'Yes'], ['unselect' => null] ); ?>

    <?= $form->field($model, 'visible')->dropDownList([ 0 => '0', 1 => '1', 13 => '13', ], ['prompt' => '']); ?>

    <?= $form->field($model, 'timePeriod')->radioList( [0=>'No', 1 => 'Yes']); ?>

    <?= $form->field($model, 'dateTime')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
