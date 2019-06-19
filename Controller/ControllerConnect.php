<?php

namespace App;


class ControllerConnect
{

    static function connect()
    {
        $display = new View();
        $display->createViewConnect();
    }


    static function disconnect()
    {

        $_SESSION['User'] = 0;
        header("location: index.php");
    }

}