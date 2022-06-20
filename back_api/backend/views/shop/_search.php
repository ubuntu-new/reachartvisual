<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ShopSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'offerPrice') ?>

    <?php // echo $form->field($model, 'latest') ?>

    <?php // echo $form->field($model, 'bestSellers') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'shopurl') ?>

    <?php // echo $form->field($model, 'dateTime') ?>

    <?php // echo $form->field($model, 'metakeyword') ?>

    <?php // echo $form->field($model, 'artistsId') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'instagramm') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
