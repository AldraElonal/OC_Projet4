<?php
namespace App\Back;
use App;

class CommentsBack extends App\Model {

    public function getComments(){
        $comments = $this->executeRequest("SELECT * FROM comment");
        $comments = $comments->fetchAll();
        return $comments;

    }

}

