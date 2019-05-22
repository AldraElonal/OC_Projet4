<?php

namespace Front;

include "Controleur/ControleurAccueil.php";
include "Controleur/ControleurBillet.php";

class Routeur
{

    private $ctrlAccueil;
    private $ctrlBillet;

    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
    }

    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {// on détermine l'action à effectuer
                if ($_GET['action'] == 'billet') {
                    if (isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id'] > 0) {

                        $this->ctrlBillet->billet($_GET['id']);
                    } else {
                        $this->ctrlAccueil->accueil();
                    }
                }
            } else {// pas d'action définie, on affiche la page d'acceuil

                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            echo 'Erreur';
        }
    }

}