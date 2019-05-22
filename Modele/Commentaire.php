<?php
namespace Front;
include_once  "Modele/Modele.php";

class Commentaire extends Modele {

    public function getCommentaires($idBillet){
        $commentaires = $this->executerRequete("SELECT * FROM commentaires WHERE IdArticle = ?",array($idBillet));
        $commentaires = $commentaires->fetchAll();
        return $commentaires;

    }
    public function addComment($idBillet,$pseudo,$content){
            $this->executerRequete("INSERT INTO `commentaires`( `IdArticle`, `Auteur`, `DateCommentaire`, `Contenu`) VALUES (?,?,NOW(),?)",array($idBillet,$pseudo,$content));
    }
}

