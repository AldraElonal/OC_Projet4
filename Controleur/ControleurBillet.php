<?php
namespace  Front;
//include "Vue/Vue.php";
//include "Modele/Billet.php";
include "Modele/Commentaire.php";

class ControleurBillet
{

    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire =  new Commentaire();
    }

    public function billet($idBillet)
    {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        require "Vue/VueBillet.php";
        $vue = new Vue();
        $vue->genererVue($contenu);
    }

}