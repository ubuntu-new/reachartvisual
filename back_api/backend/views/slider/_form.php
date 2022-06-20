<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder;
use backend\models\Categories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();
$_SESSION['KCFINDER'] = array(
    'disabled' => false
);
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'image')->fileInput()?>

    <?= Html::img(Yii::getAlias('@web').'/'.$img->getPath(), ['alt'=>'some', 'class'=>'thing', 'height'=>'150px', 'width'=>'150px'])?>

    <?= $form->field($model, 'catId')->dropDownList(ArrayHelper::map(Categories::find()->asArray()->all(), 'id', 'name'))?>

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


    <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
