<?php
namespace rest\modules\v1\controllers;

use api\actions\ProductAction;
use api\actions\UserAction;
use api\models\database\IngredientsPrice;
use api\models\response\Result;
use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class ProductsController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return ProductAction::getList();
    }

    public  function actionFeautured(){
        //$rcxa = \Yii::$app->request->post('name');
        return ProductAction::getFeautured();
    }



}