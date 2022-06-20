<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactTitle */

$this->title = 'Create Contact Title';
$this->params['breadcrumbs'][] = ['label' => 'Contact Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
