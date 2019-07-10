<?php

namespace App;


class ControllerHomePage
{


    static function homePage()
    {
        $mdlpost = new Post();
        $mdlbiography = new Biography();
        $mdlcomments = new Comments();
        $posts = $mdlpost->getPostsPerStatus(1);
        $numbercommentsperposts = $mdlcomments->getNumberCommentsPerPosts($posts);
        $bio = $mdlbiography->getBiography();
        $display = new View();
        $display->createViewHomePage($posts, $bio, $numbercommentsperposts);
    }

}