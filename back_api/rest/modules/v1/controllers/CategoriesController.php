<?php
namespace rest\modules\v1\controllers;

use api\actions\CategoriesAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class CategoriesController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return CategoriesAction::getList();
    }



}