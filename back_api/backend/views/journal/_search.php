<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JournalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'facebook') ?>

    <?= $form->field($model, 'instagramm') ?>

    <?php // echo $form->field($model, 'linkendin') ?>

    <?php // echo $form->field($model, 'metakeyword') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'file') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
