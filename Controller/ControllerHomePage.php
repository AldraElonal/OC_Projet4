<?php

namespace App;


class ControllerHomePage
{


    static function homePage()
    {
        $post = new Post();
        $posts = $post->getPostsPerStatus(1);
        $bio = $post->getPostsPerStatus(2);
//        var_dump($bio);
        $display = new View();
        $display->createViewHomePage($posts,$bio);
    }

}