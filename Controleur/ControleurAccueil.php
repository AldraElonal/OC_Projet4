<?php
namespace  Front;
include "Vue/Vue.php";
include "Modele/Billet.php";

class ControleurAccueil
{

    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }

    public function accueil()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue();
        $vue->genererVueAcceuil($billets);
    }

}