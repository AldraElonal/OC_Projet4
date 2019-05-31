<?php
namespace  App\Front;
use App;
require 'Autoloader.php';
App\Autoloader::register();

$routeur = new Routeur();
$routeur->directRequest();