<?php

namespace App;

const ADMIN = 50;

class ControllerAdminPage
{

    private $comments;

    public function __construct()
    {
        $this->comments = new Comments();
    }

    public function adminPage()
    {
        if (isset($_SESSION['role']) AND $_SESSION['role'] == ADMIN) {
            $display = new View();
            $display->createViewAdminPage($this->comments->getCommentsPerStatus(1));
            return true;
        } else {
            return false;
        }
    }

    public function deleteComment($idComment)
    {
        if (isset($_SESSION['role']) AND $_SESSION['role'] == ADMIN) {
            if (is_numeric($idComment) AND $this->comments->existComment($idComment)) {
                $this->comments->deleteComment($idComment);
            }
            $this->adminPage();
            return true;
        } else {
            return false;
        }
    }

    public function confirmComment($idComment)
    {
        if (isset($_SESSION['role']) AND $_SESSION['role'] == ADMIN) {
            if (is_numeric($idComment) AND $this->comments->existComment($idComment)) {
                $this->comments->confirmComment($idComment);
            }
            $this->adminPage();
            return true;
        } else {
            return false;
        }
    }
}