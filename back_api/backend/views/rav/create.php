<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rav */

$this->title = Yii::t('app', 'Create Rav');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ravs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
