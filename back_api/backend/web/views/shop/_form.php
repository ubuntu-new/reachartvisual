<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offerPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latest')->textInput() ?>

    <?= $form->field($model, 'bestSellers')->textInput() ?>

    <?= $form->field($model, 'visible')->dropDownList([ 0 => '0', 1 => '1', 13 => '13', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateTime')->textInput() ?>

    <?= $form->field($model, 'metakeyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'artistsId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
