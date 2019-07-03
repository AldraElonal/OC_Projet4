<?php
session_start();
include_once "Autoloader.php";
\App\Autoloader::register();
$mdlpost = new \App\Post();

$title = $_POST['Title'];
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

if (isset($_POST['Status'])) {
    $status = 1;
} else {
    $status = 0;
}
if ($title != null AND $content != null AND $error == true) {
    if (isset($_GET['postId'])) {
        $postid = htmlspecialchars($_GET['postId']);

        if ($mdlpost->idPostExist($postid)) {
            if (isset($_POST['FileUpdate'])) {
                $currentpost = $mdlpost->getPost($postid);
                if($currentpost['Img_Name'] != $_FILES["photo"]["name"]) {
                    unlink("img/" . $currentpost['Img_Name']);
                }
                $mdlpost->editPostWithFile($postid, $title, $content, $_FILES["photo"]["name"], $status);
            } else {
                $mdlpost->editPostWithoutFile($postid, $title, $content, $status);
            }
        } else {
            if (isset($_POST['FileUpdate'])) {
                $mdlpost->addPostWithFile($title, $content, $_FILES["photo"]["name"], $status);
            } else {
                $mdlpost->addPostWithoutFile($title, $content, $status);
            }
        }

    } else {

        if (isset($_POST['FileUpdate'])) {
            $mdlpost->addPostWithFile($title, $content, $_FILES["photo"]["name"], $status);
        } else {
            $mdlpost->addPostWithoutFile($title, $content, $status);
        }
    }
    header("location:index.php?action=gestionArticles");
    exit;
} else {
    if($error == true){
        $msgerror = "Erreur : le titre et le contenu de l'article ne doivent pas être vides";
        $error = false;
    }
    $_SESSION['PostEdit']['title'] = $title;
    $_SESSION['PostEdit']['content'] = $content;
    $_SESSION['PostEdit']['statut'] = $status;
    $_SESSION['PostEdit']['error'] = $error;
    $_SESSION['PostEdit']['errorMsg'] = $msgerror;
    if (isset($_GET['postId'])) {
        $postid = htmlspecialchars($_GET['postId']);
        $_SESSION['PostEdit']['id'] = $postid;

        header("location:index.php?action=EditerArticle&postid=" . $postid);
        exit;
    }
    else{
        header("location:index.php?action=AjouterArticle");
        exit;
    }
}
