<?php
namespace api\models\response;


class CategoriesResponse
{
    public
        $id,
        $name,
        $name_ge,
        $mine,
        $visible,
        $comm;

    public function __construct($row) {
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->name_ge = $row['name_ge'];
        $this->mine = $row['mine'];
        $this->visible = $row['visible'];
        $this->comm = $row['comm'];
    }
}