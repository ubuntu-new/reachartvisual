<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'site') ?>

    <?= $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'instagramm') ?>

    <?php // echo $form->field($model, 'linkendin') ?>

    <?php // echo $form->field($model, 'metakeyword') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'top') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
