<?php

namespace  Front;

class Vue{

    public function genererVueAcceuil($billets){
        require "VueAcceuil.php";
        ob_start();

        require "TemplatePage.php";
        ob_end_flush();

    }

    public function genererVueBillet($billet,$commentaires){
        require "VueBillet.php";
        ob_start();

        require "TemplatePage.php";
        ob_end_flush();
    }
}