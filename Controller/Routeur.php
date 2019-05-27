<?php

namespace Front;

use mysql_xdevapi\Exception;

include "Controller/ControllerHomePage.php";
include "Controller/ControllerPost.php";

class Routeur
{

    private $ctrlHomePage;
    private $ctrlPost;

    public function __construct()
    {
        $this->ctrlHomePage = new ControllerHomePage();
        $this->ctrlPost = new ControllerPost();
    }

    public function directRequest()
    {
        try {
            if (isset($_GET['action'])) {// on détermine l'action à effectuer
                if ($_GET['action'] == 'billet') {
                    if (isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id'] > 0) {

                        $this->ctrlPost->post($_GET['id']);
                    } else {
                        $this->ctrlHomePage->homePage();
                    }
                }else if($_GET['action'] == 'commenter'){

                    $this->ctrlPost->addComment($_GET['id'],$_POST['pseudo'],$_POST['content']);
                }
            } else {// pas d'action définie, on affiche la page d'acceuil

                $this->ctrlHomePage->homePage();
            }
        } catch (Exception $e) {
            echo 'Erreur';
        }
    }

}