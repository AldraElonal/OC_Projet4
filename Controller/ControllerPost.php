<?php
namespace  Front;
//include "View/View.php";
//include "Model/Post.php
include "Model/Comments.php";
class ControllerPost
{

    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment =  new Comments();
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
}