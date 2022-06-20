<?php
namespace rest\modules\v1\controllers;

use api\actions\JournalAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class JournalController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return journalAction::getList();
    }



}