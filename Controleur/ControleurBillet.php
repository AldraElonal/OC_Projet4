<?php
namespace  Front;
//include "Vue/Vue.php";
//include "Modele/Billet.php";
include "Modele/Commentaire.php";

class ControleurBillet
{

    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new Billet();
        $this->comment =  new Commentaire();
    }

    public function post($idPost)
    {
        $post = $this->post->getPost($idPost);
        $comments = $this->comment->getComments($idPost);
        $display = new Vue();
        $display->createDisplayBillet($post,$comments);
    }

    public function addComment($idPost,$pseudo,$content){
        $this->comment->addComment($idPost,$pseudo,$content);
        $this->post($idPost);
    }
}