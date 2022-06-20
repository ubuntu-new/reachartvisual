<?php
namespace api\models\response;


class ProductsResponse
{
    public $id,
        $w_id,
        $category_id,
        $category_name,
        $name,
        $priceBySizes,
        $class_name,
        $is_special,
        $created_at;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->w_id = $row['w_id'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
        $this->is_special = $row['is_special'];
        $this->name = $row['name'];
        $this->price = $row["category_id"]==3?-2:$row['price'];
        $this->priceBySizes = $row["category_id"]==3?\Opis\Closure\unserialize($row['price']):$row['price'];
        $this->class_name = $row['class_name'];
        $this->created_at = $row['created_at'];

    }


}