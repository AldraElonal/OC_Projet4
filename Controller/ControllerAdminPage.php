<?php

namespace App;



class ControllerAdminPage
{

    const ADMIN = 50;

    public function adminPage()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $display = new View();
            $mdlcomments = new Comments();
            $title = "Commentaires soumis à modération";
            $display->createViewAdminPage($mdlcomments->getCommentsPerStatus(1), $title);
        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }

    public function deleteComment()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $mdlcomments = new Comments();

            if (isset($_GET['commentid'])) {
                $idComment = htmlspecialchars($_GET['commentid']);

                if ($mdlcomments->existComment($idComment)) {
                    $mdlcomments->deleteComment($idComment);
                }
            }
            $display = new View();
            $title = "Commentaires soumis à modération";
            $display->createViewAdminPage($mdlcomments->getCommentsPerStatus(1), $title);

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }

    public function confirmComment()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $mdlcomments = new Comments();

            if (isset($_GET['commentid'])) {
                $idComment = htmlspecialchars($_GET['commentid']);

                if ($mdlcomments->existComment($idComment)) {
                    $mdlcomments->confirmComment($idComment);
                }
            }
            $display = new View();
            $title = "Commentaires soumis à modération";
            $display->createViewAdminPage($mdlcomments->getCommentsPerStatus(1), $title);

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }

    public function deletedComments()
    {

        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $display = new View();
            $title = "Commentaires Supprimés";
            $mdlcomments = new Comments();
            $display->createViewAdminPage($mdlcomments->getCommentsPerStatus(0), $title);
        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }
}