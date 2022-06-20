<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactTitle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-title-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_ge')->textInput(['maxlength' => true]) ?>
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
    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'keyword_ge')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->dropDownList([ 0 => '0', 1 => '1', 13 => '13', ], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
