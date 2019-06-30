<?php

namespace App;


class ControllerBiography
{
    static function editBiography()
    {

        if (isset($_SESSION['User']['role']) AND $_SESSION['User']['role'] <= Member::ADMIN) {
            if($_SESSION['PostEdit']['error'] == false ){
                $_SESSION['PostEdit']['error'] = true;
                $content = $_SESSION['PostEdit']['content'];
            }else {
                $mdlbiography = new Biography();
                $bio = $mdlbiography->getBiography();
                $content = $bio[0]['Content'];
            }
                    $display = new View();
                    $display->createViewEditBiography($content);

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }
}