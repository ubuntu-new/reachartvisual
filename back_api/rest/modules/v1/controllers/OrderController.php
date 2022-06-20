<?php
namespace rest\modules\v1\controllers;

use api\actions\OrderAction;
use api\actions\UserAction;
use api\models\response\Result;
use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class OrderController extends RestController  {

    public function actionCreate() {
        $orderData = \Yii::$app->request->post("orderData");
        $customer_id = \Yii::$app->request->post("customer_id");

        $response = new Response();

        if(!$customer_id) {
            $response->error_message = "Missing parameter customer_id";
            return $response;
        }

        if(!$orderData) {
            $response->error_message = "Missing parameter orderData";
            return $response;
        }

        $result = OrderAction::create($customer_id, $orderData);
        $response->is_error = $result?false:true;
        $response->data = $result;

        return $response;


    }


    public  function actionSave(){
        return ProductAction::getList();
    }



}