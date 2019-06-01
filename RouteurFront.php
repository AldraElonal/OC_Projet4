<?php

namespace App\Front;

use mysql_xdevapi\Exception;

include "Controller/ControllerHomePage.php";
include "Controller/ControllerPost.php";

class RouteurFront
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

                $action =  htmlspecialchars($_GET['action']);

                if ($action == 'billet') {


                    if (isset($_GET['id'])){
                        $id = htmlspecialchars($_GET['id']);


                        if(is_numeric($id) AND $this->ctrlPost->postExist($id)) {

                            $this->ctrlPost->post($id);
                        }

                    } else { // id invalide
                        $this->ctrlHomePage->homePage();

                    }

                }else if($action == 'commenter') {

                    if (isset($_GET['id']) AND isset($_POST['pseudo']) AND isset($_POST['content'])) {

                        $id = htmlspecialchars($_GET['id']);
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        $content = htmlspecialchars($_POST['content']);

                        if (is_numeric($id) AND $id > 0 AND $pseudo!= null AND $content != null) {
                            $this->ctrlPost->addComment($id, $pseudo, $content);

                        }elseif(is_numeric($id) AND $this->ctrlPost->postExist($id)){ // données formulaire invalide
                            $this->ctrlPost->post($id);

                        }else{ // id invalide
                            $this->ctrlHomePage->homePage();
                        }
                    }
                }
            } else {// pas d'action définie, on affiche la page d'acceuil

                $this->ctrlHomePage->homePage();
            }


        } catch (\Exception $e) {
            echo 'Erreur';
        }
    }

}