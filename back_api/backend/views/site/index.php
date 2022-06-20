<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Reach art visual';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                &nbsp;<ul class="nav flex-column">
                    <li class="nav-item">
                        <?= Html::a('About', ['about/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Mus haves', ['mus/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('RAV SERVICES', ['rav/index']) ?>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        --><?//= Html::a('Categories', ['categories/index']) ?>
                    <li class="nav-item">
                        <?= Html::a('News', ['/news/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Artists', ['/artists/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Zegavlena', ['/journal/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Shop', ['/shop/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('FAQ', ['/faq/index']) ?>
                    </li>
<!--                    </li>-->

<!--                    <li class="nav-item">-->
<!--                        --><?//= Html::a('Slider', ['slider/index']) ?>
<!--                    </li>-->

                </ul>
            </div>
        </div>

    </div>

</div>
