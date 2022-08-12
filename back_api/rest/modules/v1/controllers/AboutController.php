<?php
namespace rest\modules\v1\controllers;

use api\actions\AboutAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;
use yii\rest\Controller;
use yii\filters\Cors;

class AboutController extends Controller  {
    public function behaviors() {

        $behaviors['cors'] = ['class' => Cors::class];

        return $behaviors;
    }

    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return AboutAction::getList();
    }

}