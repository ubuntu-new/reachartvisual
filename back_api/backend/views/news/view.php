<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$img = $model->getImage();
$img->getPath();
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'status',
            'description:ntext',
            'created',
            [
                'attribute'=>'image',
                'value'=> Yii::getAlias('@web').'/'.$img->getPath(),
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
//            'user_id',
            'title_ge',
            'description_ge:ntext',
            'metakeyword:ntext',
            'metakeyword_ge:ntext',
        ],
    ]) ?>

</div>
