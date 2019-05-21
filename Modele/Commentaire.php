<?php
namespace Front;
include_once  "Modele/Modele.php";

class Commentaire extends Modele {

    public function getCommentaires($idBillet){
        $commentaires = $this->executerRequete("SELECT * FROM commentaires WHERE IdArticle = ?", $idBillet);
        $commentaires = $commentaires->fetchAll();
        return $commentaires;

    }

}

