<?php
namespace rest\modules\v1\controllers;

use api\actions\AboutAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class AboutController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return AboutAction::getList();
    }

}