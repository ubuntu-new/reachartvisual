<?php
namespace rest\modules\v1\controllers;

use api\actions\NewsAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class NewsController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return NewsAction::getList();
    }
    public  function actionImages(){
        //$rcxa = \Yii::$app->request->post('name');
        return NewsAction::getImages('id');
    }



}