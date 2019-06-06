<?php
namespace App;

class Comments extends Model {

    public function getCommentsPerStatus(){
        $comments = $this->executeRequest("SELECT * FROM comment ORDER BY Status ASC");
        return $comments->fetchAll();

    }


    public function deleteComment($idComment)
    {
        $req = $this->executeRequest("DELETE FROM comment WHERE id= ? ",array($idComment));
    }


    public function getCommentsPerPost($idPost){
        $comments = $this->executeRequest("SELECT * FROM comment WHERE Id_Post = ? ORDER BY Created_At ASC",array($idPost));
        return $comments->fetchAll();

    }
    public function addComment($idBillet,$pseudo,$content){
            $this->executeRequest("INSERT INTO `comment`( `Id_Post`, `Name`, `Created_At`, `Content`) VALUES (?,?,NOW(),?)",array($idBillet,$pseudo,$content));
    }

    public function signalComment($idComment){
        $this->executeRequest("UPDATE `comment` SET `Status`=0 WHERE Id=? ",array($idComment));
    }

    public function existComment($idComment){
        $exist = $this->executeRequest("SELECT COUNT(Id) FROM Comment WHERE `Id`=?",array($idComment));
        $exist = $exist->fetch()[0];
        if($exist == '1') {
            return true;
        }
        else{
            return false;
        }
    }
}