<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Artists */

$this->title = Yii::t('app', 'Create Artists');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
