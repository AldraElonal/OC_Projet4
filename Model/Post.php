<?php
namespace App\Front;
use App;
//Autoloader::register();

class Post extends App\Model {


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

    public function idPostExist($idPost){
        $exist = $this->executeRequest("SELECT COUNT(Id) FROM Post WHERE `Id`=?",array($idPost));
        $exist = $exist->fetch()[0];
        if($exist == '1') {
            return true;
        }
        else{
            return false;
        }
    }
}