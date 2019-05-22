<?php
namespace  Front;
include "Vue/Vue.php";
include "Modele/Billet.php";

class ControleurAccueil
{

    private $post;

    public function __construct()
    {
        $this->post = new Billet();
    }

    public function accueil()
    {
        $posts = $this->post->getPosts();
        $display = new Vue();
        $display->createDisplayAcceuil($posts);
    }

}