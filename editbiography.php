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
            $msgerror = "Erreur : Veuillez sélectionner un format de fichier valide.";
            $error = false;
        }
        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize AND $error) {
            $msgerror = "Erreur : La taille du fichier est supérieure à la limite autorisée.";
            $error = false;
        }

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed) AND $error) {
            // Vérifie si le fichier existe avant de le télécharger.
            if (file_exists("img/" . $_FILES["photo"]["name"]) AND $error) {
                unlink("img/" . $_FILES["photo"]["name"]);
            }
            move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $_FILES["photo"]["name"]);
        }
    }
}

if ($content != null AND $error == true) {
    if (isset($_POST['FileUpdate'])) {
        $currentpost = $mdlbiography->getBiography();
        if ($currentpost[0]['Img_Name'] != $_FILES["photo"]["name"]) {
            unlink("img/" . $currentpost[0]['Img_Name']);
        }
        $mdlbiography->editBiographyWithFile($content, $_FILES["photo"]["name"]);
    } else {
        $mdlbiography->editBiographyWithoutFile($content);
    }
    header("location:index.php?action=admin");
    exit;
} else {

    if ($error == true) {
        $msgerror = "Erreur : le contenu de la biographie ne doit pas être vide";
        $error = false;
    }
    $_SESSION['PostEdit']['content'] = $content;
    $_SESSION['PostEdit']['error'] = $error;
    $_SESSION['PostEdit']['errorMsg'] = $msgerror;

    header("location:index.php?action=EditerBiographie");
    exit;

}



