<?php

namespace  App\Back;

use App\View;

class ControllerConnect{

    public function connect()
    {
        $display = new View();
        $display->createViewConnect();
    }
}