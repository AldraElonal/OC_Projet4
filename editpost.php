<?php

include_once "Autoloader.php";
\App\Autoloader::register();
$mdlpost = new \App\Post();

$title =  $_POST['Title'];
$content = $_POST['Content'];
if(isset($_POST['Status'])) {
    $status = 1;
}else {
    $status = 0;
}
if($title!=null AND $content !=null) {

    if (isset($_GET['postId'])) {
        $postid = htmlspecialchars($_GET['postId']);

        if ($mdlpost->idPostExist($postid)) {
            $mdlpost->editPost($postid, $title, $content, $status);
        }else{
            $mdlpost->addPost($title,$content,$status);
        }

    }else {

        $mdlpost->addPost($title,$content,$status);
    }
}


header("location:index.php?action=gestionArticles");
exit;

