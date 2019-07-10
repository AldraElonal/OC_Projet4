<?php

namespace App;

class Biography extends Model
{


    public function getBiography()
    {
        $bio = $this->executeRequest("SELECT * FROM biography");
        $bio = $bio->fetchAll();
        return $bio;
    }


    public function editBiographyWithFile($content, $filename)
    {
        $this->executeRequest("UPDATE `biography` SET `Content`=?,`Img_Name`=?  WHERE Id=0", array($content, $filename));

    }

    public function editBiographyWithoutFile($content)
    {
        $this->executeRequest("UPDATE biography SET `Content`=?  WHERE Id=0", array($content));

    }

}