<?php

namespace App;

class Routeur
{


    public function directRequest()
    {
        try {

            if (isset($_GET['action'])) {// on détermine l'action à effectuer
                $action = htmlspecialchars($_GET['action']);
                if ($action == 'billet') {
                    ControllerPost::post();

                } elseif ($action == 'signaler') {

                   ControllerPost::signalComment();

                } elseif ($action == 'commenter') {

                    ControllerPost::addComment();

                } else if ($action == 'login') {

                    ControllerConnect::connect();

                } else if ($action == 'admin') {

                    ControllerAdminPage::adminPage();

                } else if ($action == 'commentairesSupprimes') {
                    ControllerAdminPage::deletedComments();

                } else if ($action == "supprimerCommentaire") {

                    ControllerAdminPage::deleteComment();

                } else if ($action == "validerCommentaire") {

                    ControllerAdminPage::confirmComment();

                } else if ($action == "gestionArticles") {

                   ControllerPost::postManager();

//fusion ajouter & editer ? => ajouter = editer sans indiquer postid
                } else if ($action == "AjouterArticle") {

                    ControllerPost::editPost();

                } else if ($action == "EditerArticle") {
                    ControllerPost::editPost();;

                } else if ($action == "unlog") {
                    ControllerConnect::disconnect();

                } else { //action inconnue
                   ControllerHomePage::homePage();
                }

            } else {// pas d'action définie, on affiche la page d'acceuil
                ControllerHomePage::homePage();
            }

        } catch (\Exception $e) {
            echo 'Erreur';
        }
    }

}