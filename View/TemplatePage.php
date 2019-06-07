<?php
namespace  Front;

const ADMIN = 50;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <!-- Ajout Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
<header class = "container-fluid ">

    <div class ="row">
    <h1 class = offset-md-1> Projet 4 : Blog d'écrivain</h1>
   <?php if(!isset($_SESSION['role']) OR $_SESSION['role'] < ADMIN ){ ?><a href="index.php?action=login" class = "btnconnexion btn btn-danger offset-md-7">Connexion</a>
    <?php }else{ ?><a href="index.php?action=admin" class = "btnconnexion btn btn-danger offset-md-7">Panneau d'Administation</a>
    <?php }?>
    </div>
</header>
<div class = "row ">
    <div class = "col-md-7 offset-md-2">
<?php echo $content ?>
    </div>
    <nav class = "col-md-2  rounded">
        Menu de navigation
    </nav>
</div>
<footer class ="container-fluid">
    <p class ="col-md-3 offset-md-7"> Blog réalisé avec php,mysql et la bibliothèque css Bootstrap</p>
</footer>
</body>
</html>

