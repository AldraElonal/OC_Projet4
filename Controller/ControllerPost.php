<?php
namespace  App\Front;

use App\View;

class ControllerPost
{

    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment =  new CommentsFront();
    }

    public function post($idPost)
    {
        $post = $this->post->getPost($idPost);
        $comments = $this->comment->getComments($idPost);
        $display = new View();
        $display->createViewPost($post,$comments);
    }

    public function addComment($idPost,$pseudo,$content){
        $this->comment->addComment($idPost,$pseudo,$content);
        $this->post($idPost);
    }

    public function postExist($idPost){
        return $this->post->idPostExist($idPost);

    }

    public function signalComment($idPost,$idComment){
        $this->comment->signalComment($idComment);
        $this->post($idPost);
    }
}