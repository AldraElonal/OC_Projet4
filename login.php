<?php
session_start();
include_once "Autoloader.php";
use App\Back;
\App\Autoloader::register();

const ADMIN = 50;

$pseudo = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars(($_POST['password']));
$member = new Back\Member();
if($member->checklogin($pseudo,$password)){
    $_SESSION['role'] = ADMIN;
}else{
    $_SESSION['role'] = 0;
}

var_dump($_SESSION);
header("location: admin.php");
exit;

