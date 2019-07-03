<?php

namespace App;


class View
{

    public function createViewHomePage($posts,$bio,$numbercommentsperposts)
    {
        require "ViewHomePage.php";
        require "TemplatePage.php";


    }

    public function createViewPost($post, $comments)
    {
        require "ViewPost.php";
        require "TemplatePage.php";

    }

    public function createViewConnect()
    {
        require "ViewConnect.php";
        require "TemplatePage.php";
    }

    public function createViewAdminPage($comments, $title)
    {
        require "ViewAdminPage.php";
        require "TemplatePage.php";
    }

    public function createViewPostManager($posts)
    {
        require "ViewPostManager.php";
        require "TemplatePage.php";
    }

    public function createViewEditPost($id = null, $title = null, $content = null, $status = null,$msgerror = null)
    {
        require "scriptTinyMCE.php";
        require "ViewPostEdit.php";
        require "TemplatePage.php";

    }

    public function createViewEditBiography($content = null,$msgerror = null){
        require "scriptTinyMCE.php";
        require "ViewEditBiography.php";
        require "TemplatePage.php";
    }
}