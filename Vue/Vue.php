<?php

namespace  Front;

class Vue{

    public function createDisplayAcceuil($posts){
        require "VueAcceuil.php";
        ob_start();

        require "TemplatePage.php";
        ob_end_flush();

    }

    public function createDisplayPost($post,$comments){
        require "VueBillet.php";
        ob_start();

        require "TemplatePage.php";
        ob_end_flush();
    }
}