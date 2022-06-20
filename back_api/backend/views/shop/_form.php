<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\Artists;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Shop */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();
$_SESSION['KCFINDER'] = array(
    'disabled' => false
);
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offerPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latest')->textInput() ?>

    <?= $form->field($model, 'bestSellers')->textInput() ?>

    <?= $form->field($model, 'visible')->dropDownList([ 0 => '0', 1 => '1', 13 => '13', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'shopurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateTime')->textInput() ?>

    <?= $form->field($model, 'metakeyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'artistsId')->dropDownList(ArrayHelper::map(Artists::find()->asArray()->all(), 'id', 'fullname'))?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagramm')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
