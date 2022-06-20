<?php
namespace rest\modules\v1\controllers;

use api\actions\OrdersAction;
use rest\controllers\RestController;
use rest\models\response\Response;

class OrdersController extends RestController  {

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

        $result = OrdersAction::create($customer_id, $orderData);


    }

    public function actionUpdate() {
        $orderData = \Yii::$app->request->post("orderData");
        $customer_id = \Yii::$app->request->post("customer_id");
        $id = \Yii::$app->request->post("id");

        $response = new Response();

        if(!$customer_id) {
            $response->error_message = "Missing parameter customer_id";
            return $response;
        }

        if(!$orderData) {
            $response->error_message = "Missing parameter orderData";
            return $response;
        }

        if(!$id) {
            $response->error_message = "Missing parameter ID";
            return $response;
        }

        $result = OrdersAction::update($id, $customer_id, $orderData);


    }


//    public  function actionSave(){
//        return ProductAction::getList();
//    }



}