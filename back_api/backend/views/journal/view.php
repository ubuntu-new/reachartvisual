<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\Journal */



$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$img = $model->getImage();
$img->getPath();
?>
<div class="journal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'facebook',
            'instagramm',
            'linkendin',
            'metakeyword:ntext',
            'status',
            'top',
            'pdf',
//            'img',
            [
                'attribute'=>'image',
                'value'=> Yii::getAlias('@web').'/'.$img->getPath(),
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
        ],
    ]) ?>

</div>
