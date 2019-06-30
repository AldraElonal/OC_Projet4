<?php

namespace App;

class Comments extends Model
{

    public function getCommentsPerStatus($status)
    {
        $comments = $this->executeRequest("SELECT *,DATE_FORMAT(Created_At,'%d/%m/%Y') AS jour,DATE_FORMAT(Created_At,'%Hh%imin') AS heure FROM comment WHERE Status = ? ", array($status));
        return $comments->fetchAll();

    }


    public function deleteComment($idComment)
    {
        $req = $this->executeRequest("UPDATE comment SET `Status`=0 WHERE id= ? ", array($idComment));
    }


    public function getCommentsPerPost($idPost)
    {
        $comments = $this->executeRequest("SELECT *,DATE_FORMAT(Created_At,'%d/%m/%Y') AS jour,DATE_FORMAT(Created_At,'%Hh%imin') AS heure FROM comment WHERE Id_Post = ? AND `Status`>0  ORDER BY Created_At ASC", array($idPost));
        return $comments->fetchAll();

    }

    public function addComment($idBillet, $pseudo, $content)
    {
        $this->executeRequest("INSERT INTO `comment`( `Id_Post`, `Name`, `Created_At`, `Content`) VALUES (?,?,NOW(),?)", array($idBillet, $pseudo, $content));
    }

    public function signalComment($idComment)
    {
        $this->executeRequest("UPDATE `comment` SET `Status`=1 WHERE Id=? ", array($idComment));
    }

    public function confirmComment($idComment)
    {
        $this->executeRequest("UPDATE `comment` SET `Status`=3 WHERE Id=? ", array($idComment));
    }

    public function existComment($idComment)
    {
        $exist = $this->executeRequest("SELECT COUNT(Id) FROM comment WHERE `Id`=?", array($idComment));
        $exist = $exist->fetch()[0];
        if ($exist == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function getNumberCommentsPerPosts($posts)
    {
        $numbercommentsperposts = array();
        foreach ($posts as $post) {
            array_push($numbercommentsperposts, $this->getNumberCommentsPerPost($post['Id']));
        }
        return $numbercommentsperposts;
    }


    public function getNumberCommentsPerPost($postid)
    {
        $numbercommentsperpost = $this->executeRequest("SELECT COUNT(Id) FROM comment WHERE `Id_Post`=? AND Status > 0 ", array($postid));
        return $numbercommentsperpost->fetch()[0];

    }
}