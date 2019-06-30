<?php
session_start();
include_once "Autoloader.php";
\App\Autoloader::register();
$mdlbiography = new \App\Biography();



$content = $_POST['Content'];
$error = true;
if (isset($_POST['FileUpdate'])) {
// Vérifie si le fichier a été uploadé sans erreur.
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            //die("Erreur : Veuillez sélectionner un format de fichier valide.");
            $error = false;
        }
        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize AND $error) {
            //die("Error: La taille du fichier est supérieure à la limite autorisée.");
            $error = false;
        }

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed) AND $error) {
            // Vérifie si le fichier existe avant de le télécharger.
            if (file_exists("img/" . $_FILES["photo"]["name"]) AND $error) {
//            echo $_FILES["photo"]["name"] . " existe déjà.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $_FILES["photo"]["name"]);
//            echo "Votre fichier a été téléchargé avec succès.";
            }
        }
    }


}

if ( $content != null AND $error == true) {
            if(isset($_POST['FileUpdate'])) {
                $mdlbiography->editBiographyWithFile($content, $_FILES["photo"]["name"]);
            }else{
                $mdlbiography->editBiographyWithoutFile($content);
            }
    header("location:index.php?action=admin");
    exit;
}else {
    $_SESSION['PostEdit']['content'] = $content;
    $_SESSION['PostEdit']['error'] = $error;


        header("location:index.php?action=EditerBiographie");
        exit;

}



