<?php

namespace  App;



class ControllerConnect
{

    public function connect()
    {
        $display = new View();
        $display->createViewConnect();
    }


    public function disconnect()
    {

        $_SESSION['role'] = 0;
        header("location: index.php");
    }

}