<?php
namespace Front;
include_once  "Model/Model.php";

class Post extends Model {


    public function getPosts(){
        $posts = $this->executeRequest("SELECT * FROM Post");
        $posts = $posts->fetchAll();
        return $posts;
    }

    public function getPost($idPost){
        $post = $this->executeRequest("Select * FROM Post WHERE Id = ?",array($idPost));
        $post = $post->fetchAll();
        $post = $post[0];
            return $post;
    }
}