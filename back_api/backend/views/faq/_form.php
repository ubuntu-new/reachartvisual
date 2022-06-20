<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'clientOptions' =>  elfinder\ElFinder::ckeditorOptions('elfinder',
            [
                'language'=>'en', 'title'=>'Paragraph'
            ]
        ),
    ]);?>


    <?= $form->field($model, 'description_ge')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'clientOptions' =>  elfinder\ElFinder::ckeditorOptions('elfinder',
            [
                'language'=>'en', 'title'=>'Paragraph'
            ]
        ),
    ]);?>

    <?= $form->field($model, 'metakeyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metakeyword_ge')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 0 => '0', 1 => '1', 13 => '13', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
