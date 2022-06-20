<?php
namespace api\models\response;


class ArtistsResponse
{
    public
        $id,
        $fullname,
        $description,
        $site,
        $facebook,
        $instagramm,
        $linkendin,
        $metakeyword,
        $status;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->fullname = $row['fullname'];
        $this->description = $row['description'];
        $this->site = $row['site'];
        $this->facebook = $row['facebook'];
        $this->instagramm = $row["instagramm"];
        $this->linkendin = $row["linkendin"];
        $this->metakeyword = $row['metakeyword'];
        $this->status = $row['status'];
    }

}