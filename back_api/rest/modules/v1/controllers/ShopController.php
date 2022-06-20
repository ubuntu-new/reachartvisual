<?php
namespace rest\modules\v1\controllers;

use api\actions\ShopAction;

use backend\models\Shop;
use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;
use yii\filters\Cors;
use yii\rest\Controller;

class ShopController extends Controller  {

    public function behaviors() {

        $behaviors['cors'] = ['class' => Cors::class];

        return $behaviors;
    }
    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return ShopAction::getList();
    }

}