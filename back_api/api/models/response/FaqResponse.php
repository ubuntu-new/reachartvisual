<?php
namespace api\models\response;


class FaqResponse
{
    public
        $id,
        $title,
        $title_ge,
        $description,
        $description_ge,
        $metakeyword,
        $metakeyword_ge,
        $status;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['tile'];
        $this->title_ge = $row['tile_ge'];
        $this->description = $row['description'];
        $this->description_ge = $row['description_ge'];
        $this->metakeyword = $row["metakeyword"];
        $this->metakeyword_ge = $row["metakeyword_ge"];
        $this->status = $row['staus'];
    }

}