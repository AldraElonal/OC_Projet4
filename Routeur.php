<?php

namespace App;

class Routeur
{


    public function directRequest()
    {
        try {

            if (isset($_GET['action'])) {// on détermine l'action à effectuer
                $action = htmlspecialchars($_GET['action']);
var_dump($action);
                if ($action == 'billet') {
                    $ctrlPost = new ControllerPost();
                    $ctrlPost->post();

                } elseif ($action == 'signaler') {
                    $ctrlPost = new ControllerPost();
                    $ctrlPost->signalComment();

                } elseif ($action == 'commenter') {
                    $ctrlPost = new ControllerPost();
                    $ctrlPost->addComment();

                } else if ($action == 'login') {
                    $ctrlConnect = new ControllerConnect();
                    $ctrlConnect->connect();

                } else if ($action == 'admin') {
                    $ctrlAdmin = new ControllerAdminPage();
                    $ctrlAdmin->adminPage();

                } else if ($action == 'commentairesSupprimes') {
                    $ctrlAdmin = new ControllerAdminPage();
                    $ctrlAdmin->deletedComments();

                } else if ($action == "supprimerCommentaire") {
                    $ctrlAdmin = new ControllerAdminPage();
                    $ctrlAdmin->deleteComment();

                } else if ($action == "validerCommentaire") {
                    $ctrlAdmin = new ControllerAdminPage();
                    $ctrlAdmin->confirmComment();

                } else if ($action == "gestionArticles") {
                    $ctrlPost = new ControllerPost();
                    $ctrlPost->postManager();

//fusion ajouter & editer ? => ajouter = editer sans indiquer postid
                } else if ($action == "AjouterArticle") {
                    $ctrlPost = new ControllerPost();
                    $ctrlPost->editPost();

                } else if ($action == "EditerArticle") {
                    $ctrlPost = new ControllerPost();
                    $ctrlPost->editPost();

                } else if ($action == "unlog") {
                    $ctrlConnect = new ControllerConnect();
                    $ctrlConnect->disconnect();

                } else { //action inconnue
                    $ctrlHomePage = new ControllerHomePage();
                    $ctrlHomePage->homePage();
                }

            } else {// pas d'action définie, on affiche la page d'acceuil
                $ctrlHomePage = new ControllerHomePage();
                $ctrlHomePage->homePage();
            }

        } catch (\Exception $e) {
            echo 'Erreur';
        }
    }

}