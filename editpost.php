<?php

include_once "Autoloader.php";
\App\Autoloader::register();
$mdlpost = new \App\Post();

$title = $_POST['Title'];
$content = $_POST['Content'];

// Vérifie si le fichier a été uploadé sans erreur.
if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["photo"]["name"];
    $filetype = $_FILES["photo"]["type"];
    $filesize = $_FILES["photo"]["size"];

    // Vérifie l'extension du fichier
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

    // Vérifie la taille du fichier - 5Mo maximum
    $maxsize = 5 * 1024 * 1024;
    if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

    // Vérifie le type MIME du fichier
    if(in_array($filetype, $allowed)){
        // Vérifie si le fichier existe avant de le télécharger.
        if(file_exists("img/" . $_FILES["photo"]["name"])){
            echo $_FILES["photo"]["name"] . " existe déjà.";
        } else{
            move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $_FILES["photo"]["name"]);
            echo "Votre fichier a été téléchargé avec succès.";
        }
    } else{
        echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
    }
} else{
    echo "Error: " . $_FILES["photo"]["error"];
}

if (isset($_POST['Status'])) {
    $status = 1;
} else {
    $status = 0;
}
if ($title != null AND $content != null) {

    if (isset($_GET['postId'])) {
        $postid = htmlspecialchars($_GET['postId']);

        if ($mdlpost->idPostExist($postid)) {
            $mdlpost->editPost($postid, $title, $content,$_FILES["photo"]["name"],$status);
        } else {
            $mdlpost->addPost($title, $content,$_FILES["photo"]["name"], $status);
        }

    } else {

        $mdlpost->addPost($title, $content,$_FILES["photo"]["name"], $status);
    }
}


header("location:index.php?action=gestionArticles");
exit;

