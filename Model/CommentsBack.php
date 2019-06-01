<?php
namespace App\Back;
use App;

class CommentsBack extends App\Model {

    public function getComments(){
        $comments = $this->executeRequest("SELECT * FROM comment ORDER BY Status ASC");
        $comments = $comments->fetchAll();
        return $comments;

    }

    public function deleteComment($idComment)
    {
        $req = $this->executeRequest("DELETE FROM comment WHERE id= ? ",array($idComment));
    }

}

