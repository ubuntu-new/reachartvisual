<?php
namespace api\models\response;


class LocationsResponse
{
    public
        $id,
        $title,
        $title_ge,
        $description,
        $description_ge,
        $keywords,
        $number,
        $metakeyword_ge,
        $quote,
        $status;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['tile'];
        $this->title_ge = $row['tile_ge'];
        $this->description = $row['description'];
        $this->description_ge = $row['description_ge'];
        $this->keywords = $row["keywords"];
        $this->number = $row["number"];
        $this->metakeyword_ge = $row["metakeyword_ge"];
        $this->quote = $row["quote"];
        $this->status = $row['staus'];
    }


}