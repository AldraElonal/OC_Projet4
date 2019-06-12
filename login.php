<?php
session_start();
include_once "Autoloader.php";
\App\Autoloader::register();



$pseudo = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars(($_POST['password']));
$mdlmember = new \App\Member();

if($mdlmember->checkUser($pseudo,$password)) {
    $member = $mdlmember->getUser($pseudo);
    $_SESSION['User'] = array(
        "Id" => $member['Id'],
        "pseudo" => $member['pseudo'],
        "role" =>$member['role']);
    header("location: index.php?action=admin");
}
else {
   header("location: index.php");
}
exit;

