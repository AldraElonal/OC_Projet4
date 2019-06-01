<?php
namespace App\Front;
use App;

class CommentsFront extends App\Model {

    public function getComments($idPost){
        $comments = $this->executeRequest("SELECT * FROM comment WHERE Id_Post = ?",array($idPost));
        $comments = $comments->fetchAll();
        return $comments;

    }
    public function addComment($idBillet,$pseudo,$content){
            $this->executeRequest("INSERT INTO `comment`( `Id_Post`, `Name`, `Created_At`, `Content`) VALUES (?,?,NOW(),?)",array($idBillet,$pseudo,$content));
    }

    public function signalComment($idComment){
        $this->executeRequest("UPDATE `comment` SET `Status`=0 WHERE Id=? ",array($idComment));
    }
}