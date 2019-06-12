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

        $_SESSION['User'] = 0;
        header("location: index.php");
    }

}