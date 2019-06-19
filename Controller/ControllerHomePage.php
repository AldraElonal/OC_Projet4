<?php

namespace App;


class ControllerHomePage
{


    static function homePage()
    {
        $post = new Post();
        $posts = $post->getPosts();
        $display = new View();
        $display->createViewHomePage($posts);
    }

}