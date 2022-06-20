<?php
namespace api\models\response;

class OrdersResponse
{
    public
        $orderData,
        $customer_id,
        $id;

    public function __construct($row) {
        $this->orderData = $row['orderData'];
        $this->customer_id= $row['customer_id'];
        $this->id= $row['id'];
    }
}