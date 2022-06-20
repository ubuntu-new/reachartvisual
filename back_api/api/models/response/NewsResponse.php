<?php
namespace api\models\response;


use api\actions\NewsAction;

class NewsResponse
{
    public

        $id,
        $title,
        $status,
        $description,
        $title_ge,
        $description_ge,
        $metakeyword,
        $metakeyword_ge,
//        $isMain,
        $image;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->title_ge = $row['title_ge'];
        $this->category_id = $row['category_id'];
        $this->status = $row['staus'];
        $this->description = $row['description'];
        $this->description_ge = $row['description_ge'];
        $this->metakeyword = $row["metakeyword"];
        $this->metakeyword_ge = $row["metakeyword_ge"];
        $this->image =  NewsAction::getImages($row['id']);
//        $this->isMain =  NewsAction::getImages($row['isMain']);
    }


}