<?php

namespace  Front;

class View{

    public function createViewHomePAge($posts){
        require "ViewHomePage.php";
        ob_start();

        require "TemplatePage.php";
        ob_end_flush();

    }

    public function createViewPost($post,$comments){
        require "ViewPost.php";
        ob_start();
        require "TemplatePage.php";
        ob_end_flush();
    }
}