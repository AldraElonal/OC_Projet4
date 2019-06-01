<?php
namespace App\Back;

use App\Front\CommentsFront;
use App\View;

class ControllerAdminPage {

    private $comments;

    public function __construct()
    {
        $this->comments = new CommentsBack();
    }

    public function adminPage()
    {
        $display = new View();
        $display->createViewAdminPage($this->comments->getComments());
    }

    public function deleteComment($idComment){
        $this->comments->deleteComment($idComment);
        $this->adminPage();
    }
}