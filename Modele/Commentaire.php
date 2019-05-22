<?php
namespace Front;
include_once  "Modele/Modele.php";

class Commentaire extends Modele {

    public function getComments($idPost){
        $comments = $this->executeRequest("SELECT * FROM commentaires WHERE IdArticle = ?",array($idPost));
        $comments = $comments->fetchAll();
        return $comments;

    }
    public function addComment($idBillet,$pseudo,$content){
            $this->executeRequest("INSERT INTO `commentaires`( `IdArticle`, `Auteur`, `DateCommentaire`, `Contenu`) VALUES (?,?,NOW(),?)",array($idBillet,$pseudo,$content));
    }
}

