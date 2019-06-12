<?php

namespace App;



class ControllerPost
{
    const ADMIN = 50;

    public function post()
    {
        if (isset($_GET['postid'])) {
            $idPost = htmlspecialchars($_GET['postid']);
            if ($this->postExist($idPost)) {
                $mdlpost = new Post();
                $post = $mdlpost->getPost($idPost);
                $mdlcomment = new Comments();
                $comments = $mdlcomment->getCommentsPerPost($idPost);
                $display = new View();
                $display->createViewPost($post, $comments);

            } else { // id invalide
                $ctrlHomePage = new ControllerHomePage();
                $ctrlHomePage->homePage();
            }
        } else { // pas de Get id
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }

    }

    public function signalComment()
    {
        if (isset($_GET['postid']) AND isset($_GET['commentid'])) {
            $idPost = htmlspecialchars($_GET['postid']);
            $idComment = htmlspecialchars($_GET['commentid']);

            if ($this->postExist($idPost)) {
                $mdlcomment = new Comments();
                $mdlcomment->signalComment($idComment);
                $this->post();

            } else {
                $ctrlHomePage = new ControllerHomePage();
                $ctrlHomePage->homePage();
            }

        } else if (isset($_GET['postid'])) { // pas id de commentaire
            $this->post();

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }

    public function addComment()
    {
        if (isset($_GET['postid']) AND isset($_POST['pseudo']) AND isset($_POST['content'])) {

            $idPost = htmlspecialchars($_GET['postid']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $content = htmlspecialchars($_POST['content']);
            if ($this->postExist($idPost) AND $pseudo != null AND $content != null) {
                $mdlComment = new Comments();
                $mdlComment->addComment($idPost, $pseudo, $content);
                $this->post();
            } else { // problemes dans le formulaire on essaye d'afficher le post
                $this->post();
            }

        } elseif (isset($_GET['postid'])) { // pas de pseudo ou de contenu, on affiche juste le post
            $this->post();

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }

    public function postManager()
    {
        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $mdlpost = new Post();
            $posts = $mdlpost->getPosts();
            $display = new View();
            $display->createViewPostManager($posts);

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }

    }

    public function editPost()
    {

        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= self::ADMIN) {
            $mdlpost = new Post();

            if(isset($_GET['postid'])) {
                $idpost = htmlspecialchars($_GET['postid']);

                if ($mdlpost->idPostExist($idpost)) {
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

    private function postExist($idPost)
    {
        $mdlpost = new Post();
        return $mdlpost->idPostExist($idPost);
    }


}