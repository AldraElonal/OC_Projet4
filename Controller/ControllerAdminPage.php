<?php
namespace App\Back;

use App\Comments;
use App\Front\CommentsFront;
use App\View;

class ControllerAdminPage {

    private $comments;

    public function __construct()
    {
        $this->comments = new Comments();
    }

    public function adminPage()
    {
        $display = new View();
        $display->createViewAdminPage($this->comments->getCommentsPerStatus());
    }

    public function deleteComment($idComment){
        if(is_numeric($idComment) AND $this->comments->existComment($idComment)) {
            $this->comments->deleteComment($idComment);
        }
        $this->adminPage();
    }
}