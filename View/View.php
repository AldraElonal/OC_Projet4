<?php

namespace  App;
class View{

    public function createViewHomePage($posts){
        require "ViewHomePage.php";
        require "TemplatePage.php";


    }

    public function createViewPost($post,$comments){
        require "ViewPost.php";
        require "TemplatePage.php";

    }

    public function createViewConnect(){
        require "Viewconnect.php";
        require "TemplatePage.php";
    }

    public function createViewAdminPage($comments){
        require "ViewAdminPage.php";
        require "TemplatePage.php";
    }
}