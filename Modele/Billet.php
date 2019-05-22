<?php
namespace Front;
include_once  "Modele/Modele.php";

class Billet extends Modele {


    public function getBillets(){
        $billets = $this->executerRequete("SELECT * FROM articles");
        $billets = $billets->fetchAll();
        return $billets;
    }

    public function getBillet($idBillet){
        $billet = $this->executerRequete("Select * FROM articles WHERE Id = ?",array($idBillet));
        $billet = $billet->fetchAll();
        $billet = $billet[0];
            return $billet;
    }
}