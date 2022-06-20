<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'name_ge') ?>

    <?= $form->field($model, 'description_ge') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'offer') ?>

    <?php // echo $form->field($model, 'offerPrice') ?>

    <?php // echo $form->field($model, 'latest') ?>

    <?php // echo $form->field($model, 'bestSellers') ?>

    <?php // echo $form->field($model, 'trending') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'imgHover') ?>

    <?php // echo $form->field($model, 'timePeriod') ?>

    <?php // echo $form->field($model, 'dateTime') ?>

    <?php // echo $form->field($model, 'metakeyword') ?>

    <?php // echo $form->field($model, 'metakeyword_ge') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
