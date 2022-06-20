<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Journal */

$this->title = Yii::t('app', 'Create Journal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
