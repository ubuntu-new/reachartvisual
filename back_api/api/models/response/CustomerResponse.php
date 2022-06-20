<?php
namespace api\models\response;


use api\actions\CustomersAction;

class CustomerResponse
{
    public $id,
        $name,
        $phone,
        $address,
        $comment,
        $created_at,
        $updated_at,
        $last_order = [];



    public function __construct($row) {
        $this->id = $row['id'];
        $this->name = $row["name"];
        $this->phone = \Opis\Closure\unserialize($row['tel']);
        $this->address = \Opis\Closure\unserialize($row["address"]);
        $this->comment = $row['comment'];
        $this->updated_at = $row['updated_at'];
        $this->created_at = $row['created_at'];
        $this->last_order = json_decode(CustomersAction::getLastOrder($this->phone));
    }


}