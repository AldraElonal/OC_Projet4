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

    public function createViewAdminPage($comments,$title){
        require "ViewAdminPage.php";
        require "TemplatePage.php";
    }

    public function createViewPostManager($posts){
        require "ViewPostManager.php";
        require "TemplatePage.php";
    }

    public function createViewEditPost($id=null,$title=null,$Created=null,$content=null,$status=null){
        require "ViewPostEdit.php";
        require "TemplatePage.php";

    }
}