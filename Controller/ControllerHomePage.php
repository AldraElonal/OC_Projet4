<?php
namespace  App\Front;
include "View/View.php";
include "Model/Post.php";

class ControllerHomePage
{

    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function homePage()
    {
        $posts = $this->post->getPosts();
        $display = new View();
        $display->createViewHomePAge($posts);
    }

}