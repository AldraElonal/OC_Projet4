<?php

namespace App;

class Routeur
{

    private $ctrlHomePage;
    private $ctrlPost;
    private $ctrlConnect;
    private $ctrlAdmin;

    public function __construct()
    {
        $this->ctrlHomePage = new ControllerHomePage();
        $this->ctrlPost = new ControllerPost();
        $this->ctrlConnect = new ControllerConnect();
        $this->ctrlAdmin = new ControllerAdminPage();
    }

    public function directRequest()
    {
        try {

            if (isset($_GET['action'])) {// on détermine l'action à effectuer

                $action = htmlspecialchars($_GET['action']);

                if ($action == 'billet' AND isset($_GET['id'])) {

                    $id = htmlspecialchars($_GET['id']);
                    if (!$this->ctrlPost->post($id)) {
                        $this->ctrlHomePage->homePage();
                    }

                } elseif ($action == 'signaler' AND isset($_GET['postid']) AND isset($_GET['id'])) {

                    $postid = htmlspecialchars($_GET['postid']);
                    $id = htmlspecialchars($_GET['id']);
                    if (!$this->ctrlPost->signalComment($postid, $id)) {
                        $this->ctrlHomePage->homePage();
                    }
                } elseif ($action == 'signaler' AND isset($_GET['postid']) AND !isset($_GET['id'])) { // signaler sans id de commentaire
                    $id = htmlspecialchars($_GET['postid']);

                    if (!$this->ctrlPost->post($id)) {
                        $this->ctrlHomePage->homePage();
                    }

                } elseif ($action == 'commenter') {
                    if (isset($_GET['id']) AND isset($_POST['pseudo']) AND isset($_POST['content'])) {

                        $id = htmlspecialchars($_GET['id']);
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        $content = htmlspecialchars($_POST['content']);
                        if (!$this->ctrlPost->addComment($id, $pseudo, $content)) {
                            $this->ctrlHomePage->homePage();
                        }

                    } elseif (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);
                        if (!$this->ctrlPost->post($id)) {
                            $this->ctrlHomePage->homePage();
                        }

                    } else {
                        $this->ctrlHomePage->homePage();
                    }

                } else if ($action == 'login') {
                    $this->ctrlConnect->connect();

                } else if ($action == 'admin') {
                    if (!$this->ctrlAdmin->adminPage()) {
                        $this->ctrlHomePage->homePage();
                    }
                } else if ($action == "supprimerCommentaire" AND isset($_GET['id'])) {
                    $id = htmlspecialchars($_GET['id']);
                    if (!$this->ctrlAdmin->deleteComment($id)) {
                        $this->ctrlHomePage->homePage();
                    }
                }else if($action == "unlog") {
                $this->ctrlConnect->disconnect();

                } else { //action inconnue
                    $this->ctrlHomePage->homePage();
                }
            } else {// pas d'action définie, on affiche la page d'acceuil

                $this->ctrlHomePage->homePage();
            }


        } catch (\Exception $e) {
            echo 'Erreur';
        }
    }

}