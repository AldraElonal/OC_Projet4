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
                $msgerror= $_SESSION['PostEdit']['errorMsg'];
            }else {
                $mdlbiography = new Biography();
                $bio = $mdlbiography->getBiography();
                $content = $bio[0]['Content'];
                $msgerror = null;
            }
                    $display = new View();
                    $display->createViewEditBiography($content,$msgerror);

        } else {
            $ctrlHomePage = new ControllerHomePage();
            $ctrlHomePage->homePage();
        }
    }
}