<?php
namespace  App\Front;


use App\View;

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
        $display->createViewHomePage($posts);
    }

}