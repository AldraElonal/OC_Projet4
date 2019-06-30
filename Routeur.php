<?php

namespace App;

class Routeur
{


    public function directRequest()
    {
        try {

            if (isset($_GET['action'])) {// on détermine l'action à effectuer
                $action = htmlspecialchars($_GET['action']);
                switch ($action) {
                    case 'billet' :
                        ControllerPost::post();
                        break;

                    case 'signaler' :
                        ControllerPost::signalComment();
                        break;

                    case   'commenter' :
                        ControllerPost::addComment();
                        break;

                    case  'login' :
                        ControllerConnect::connect();
                        break;

                    case 'admin' :
                        ControllerAdminPage::adminPage();
                        break;

                    case 'commentairesSupprimes' :
                        ControllerAdminPage::deletedComments();
                        break;

                    case "supprimerCommentaire" :
                        ControllerAdminPage::deleteComment();
                        break;

                    case "validerCommentaire" :
                        ControllerAdminPage::confirmComment();
                        break;

                    case "gestionArticles" :
                        ControllerPost::postManager();
                        break;

                    case "AjouterArticle" :
                        ControllerPost::editPost();
                        break;

                    case "EditerArticle" :
                        ControllerPost::editPost();
                        break;

                    case "SupprimerArticle" :
                        ControllerPost::deletePost();
                        break;

                    case "unlog" :
                        ControllerConnect::disconnect();
                        break;

                    case "EditerBiographie" :
                        ControllerBiography::editBiography();
                        break;

                    default: //action inconnue
                        ControllerHomePage::homePage();
                }

            } else {// pas d'action définie, on affiche la page d'acceuil
                ControllerHomePage::homePage();
            }

        } catch (\Exception $e) {
            echo 'Erreur' . $e; // afficher erreur générique?
        }
    }

}