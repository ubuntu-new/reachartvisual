<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactTitle */

$this->title = 'Update Contact Title: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contact Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-title-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
