<?php
namespace api\models\response;


class JournalResponse
{
    public
        $id,
        $title,
        $description,
        $facebook,
        $instagramm,
        $linkendin,
        $metakeyword,
        $status,
        $top,
        $file,
        $pdf,
        $image;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->facebook = $row['facebook'];
        $this->instagramm = $row["instagramm"];
        $this->linkendin = $row["linkendin"];
        $this->metakeyword = $row['metakeyword'];
        $this->status = $row['status'];
        $this->top = $row['top'];
        $this->file = $row['file'];
        $this->pdf = $row['pdf'];
        $this->image = $row['image'];
    }

}