<?php
namespace api\models\response;


class AboutResponse
{
    public
        $id,
        $title,
        $title_ge,
        $description,
        $description_ge,
        $metakeywords,
        $metakeyword_ge,
        $quote,
        $status,
        $image;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['tile'];
        $this->title_ge = $row['tile_ge'];
        $this->description = $row['description'];
        $this->description_ge = $row['description_ge'];
        $this->metakeywords = $row["metakeywords"];
        $this->metakeyword_ge = $row["metakeyword_ge"];
        $this->quote = $row["quote"];
        $this->status = $row['staus'];
        $this->status = $row['image'];
    }


}