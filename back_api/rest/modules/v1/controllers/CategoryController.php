<?php
namespace rest\modules\v1\controllers;

use api\actions\CategoryAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class CategoryController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return CategoryAction::getList();
    }
    

}