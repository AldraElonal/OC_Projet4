<?php

namespace  App;



class ControllerConnect{

    public function connect()
    {
        $display = new View();
        $display->createViewConnect();
    }
}