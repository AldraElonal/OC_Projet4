<?php

namespace App;


class ControllerPost
{

    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comments();
    }

    public function post($idPost)
    {

        if (is_numeric($idPost) AND $this->postExist($idPost)) {


            $post = $this->post->getPost($idPost);
            $comments = $this->comment->getCommentsPerPost($idPost);
            $display = new View();
            $display->createViewPost($post, $comments);
            return true;

        } else { // id invalide
            return false;

        }

    }

    public function signalComment($idPost, $idComment)
    {
        if (is_numeric($idPost) AND $this->postExist($idPost)) {
            $this->comment->signalComment($idComment);
            $this->post($idPost);
            return true;
        } else {
            return false;
        }
    }

    public function addComment($idPost, $pseudo, $content)
    {
        if (is_numeric($idPost) AND $this->postExist($idPost) AND $pseudo != null AND $content != null) {
            $this->comment->addComment($idPost, $pseudo, $content);
            $this->post($idPost);
            return true;
        } elseif (is_numeric($idPost) AND $this->postExist($idPost)) { // problemes dans le formulaire mais id de post valide
            $this->post($idPost);
            return true;
        } else {
            return false;
        }
    }

    private function postExist($idPost)
    {
        return $this->post->idPostExist($idPost);
    }


}