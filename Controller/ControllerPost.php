<?php

namespace App;



class ControllerPost
{
    const ADMIN = 50;

    static function post()
    {
        if (isset($_GET['postid'])) {
            $idPost = htmlspecialchars($_GET['postid']);
            if (self::postExist($idPost)) {
                $mdlpost = new Post();
                $post = $mdlpost->getPost($idPost);
                $mdlcomment = new Comments();
                $comments = $mdlcomment->getCommentsPerPost($idPost);
                $display = new View();
                $display->createViewPost($post, $comments);

            } else { // id invalide

                ControllerHomePage::homePage();
            }
        } else { // pas de Get id
            ControllerHomePage::homePage();
        }

    }

    static function signalComment()
    {
        if (isset($_GET['postid']) AND isset($_GET['commentid'])) {
            $idPost = htmlspecialchars($_GET['postid']);
            $idComment = htmlspecialchars($_GET['commentid']);

            if (self::postExist($idPost)) {
                $mdlcomment = new Comments();
                $mdlcomment->signalComment($idComment);
                self::post();

            } else {
                ControllerHomePage::homePage();
            }

        } else if (isset($_GET['postid'])) { // pas id de commentaire
            self::post();

        } else {
            ControllerHomePage::homePage();
        }
    }

    static function addComment()
    {
        if (isset($_GET['postid']) AND isset($_POST['pseudo']) AND isset($_POST['content'])) {

            $idPost = htmlspecialchars($_GET['postid']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $content = htmlspecialchars($_POST['content']);
            if (self::postExist($idPost) AND $pseudo != null AND $content != null) {
                $mdlComment = new Comments();
                $mdlComment->addComment($idPost, $pseudo, $content);
                self::post();
            } else { // problemes dans le formulaire on essaye d'afficher le post
                self::post();
            }

        } elseif (isset($_GET['postid'])) { // pas de pseudo ou de contenu, on affiche juste le post
            self::post();

        } else {
            ControllerHomePage::homePage();
        }
    }

    static function postManager()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $mdlpost = new Post();
            $posts = $mdlpost->getPosts();
            $display = new View();
            $display->createViewPostManager($posts);

        } else {
            ControllerHomePage::homePage();
        }

    }

    static function editPost()
    {

        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {


            if(isset($_GET['postid'])) {
                $idpost = htmlspecialchars($_GET['postid']);

                if (self::postExist($idPost)) {
                    $mdlpost = new Post();
                    $post = $mdlpost->getPost($idpost);
                    $title = $post['Title'];
                    $date = $post['Created_at'];
                    $content = $post['Content'];
                    $status = $post['Status'];
                    $display = new View();
                    $display->createViewEditPost($idpost, $title, $date, $content, $status);

                } else {//post doesn't exist
                    $display = new View();
                    $display->createViewEditPost();
                }
            }else{// no postId
                $display= new View();
                $display->createViewEditPost();
            }

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }

    static function postExist($idPost)
    {
        $mdlpost = new Post();
        return $mdlpost->idPostExist($idPost);
    }


}