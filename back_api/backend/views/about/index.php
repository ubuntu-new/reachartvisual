<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Create About', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'status',
            'description:ntext',
            'created',
            //'quote',
            //'keywords:ntext',
            //'title_ge',
            //'description_ge:ntext',
            //'metakeyword_ge:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {link}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
