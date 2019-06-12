<?php

namespace App;

use App;

session_start();
require 'Autoloader.php';
App\Autoloader::register();
//session_unset();
//session_start();
//var_dump($_SESSION);

$routeur = new Routeur();
$routeur->directRequest();