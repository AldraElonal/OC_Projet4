<?php

namespace App;



 class ControllerAdminPage
{



    static function adminPage()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= Member::ADMIN) {
            $display = new View();
            $mdlcomments = new Comments();
            $title = "Commentaires soumis à modération";
            $display->createViewAdminPage($mdlcomments->getCommentsPerStatus(1), $title);
        } else {
            ControllerHomePage::homePage();
        }
    }

    static function deleteComment()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= Member::ADMIN) {
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
            ControllerHomePage::homePage();
        }
    }

    static function confirmComment()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= Member::ADMIN) {
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
            ControllerHomePage::homePage();
        }
    }

    static function deletedComments()
    {

        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= Member::ADMIN) {
            $display = new View();
            $title = "Commentaires Supprimés";
            $mdlcomments = new Comments();
            $display->createViewAdminPage($mdlcomments->getCommentsPerStatus(0), $title);
        } else {
            ControllerHomePage::homePage();
        }
    }
}