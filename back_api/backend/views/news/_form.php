<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use dosamigos\tinymce\TinyMce;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
$img = $model->getImage();
$img->getPath();
$_SESSION['KCFINDER'] = array(
    'disabled' => false
);
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ge')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput()?>

    <?php $images = $model->getImages();?>
    <div class="row">
    <?php foreach ($images as $image):?>

            <div class="col-md-3 text-center">
                <img src="<?=$image->getUrl('150x');?>">
            </div>

    <?php endforeach;?>
    </div>

    <?/*= Html::img(Yii::getAlias('@web').'/'.$img->getPath(), ['alt'=>'some', 'class'=>'thing', 'height'=>'150px', 'width'=>'150px'])*/?>



    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'clientOptions' =>  elfinder\ElFinder::ckeditorOptions('elfinder',
            [
                    'language'=>'en', 'title'=>'Paragraph'
            ]
        ),
    ]);?>


    <?= $form->field($model, 'description_ge')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'clientOptions' =>  elfinder\ElFinder::ckeditorOptions('elfinder',
            [
                    'language'=>'en', 'title'=>'Paragraph'
            ]
        ),
    ]);?>






    <?= $form->field($model, 'metakeyword')->textarea(['rows' => 6]);?>

    <?= $form->field($model, 'metakeyword_ge')->textarea(['rows' => 6]);?>


    <?= $form->field($model, 'feautured')->radioList( [0=>'No', 1 => 'Yes'], ['unselect' => null] ); ?>

    <?= $form->field($model, 'status')->dropDownList([ 0 => '0', 1 => '1', 13 => '13', ], ['prompt' => '']) ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
