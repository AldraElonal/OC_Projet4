<?php
namespace Front;
include_once  "Modele/Modele.php";

class Billet extends Modele {


    public function getPosts(){
        $posts = $this->executeRequest("SELECT * FROM articles");
        $posts = $posts->fetchAll();
        return $posts;
    }

    public function getPost($idPost){
        $post = $this->executeRequest("Select * FROM articles WHERE Id = ?",array($idPost));
        $post = $post->fetchAll();
        $post = $post[0];
            return $post;
    }
}