<?php
namespace  App\Front;
require 'Autoloader.php';
Autoloader::register();

$routeur = new Routeur();
$routeur->directRequest();