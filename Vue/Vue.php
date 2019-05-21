<?php

namespace  Front;

class Vue{

    public function genererVue($contenu){
        ob_start();

        require "TemplatePage.php";
        ob_end_flush();

    }
}