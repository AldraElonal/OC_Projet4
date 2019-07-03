<?php
namespace  Front;

use App\Member;

?>

<!doctype html>
<html lang="fr">
<nav class =>
    <meta charset="UTF-8"/>
    <!-- Ajout Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- ajout fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"/>
</nav>
<body>
<header class="container-fluid ">
    <nav class="navbar   fixed-top ">
       <h1> <a class="navbar-brand" href="index.php">Forteroche : Billet simple pour l'Alaska</a></h1>
     <div>
        <?php if (!isset($_SESSION['User']['role']) OR $_SESSION['User']['role'] < Member::ADMIN) { ?>
        <button class="btn btn-primary my-0" ><a href="index.php?action=login">Connexion</a></button>
        <?php } else { ?><button class="btn btn-primary my-0" ><a href="index.php?action=admin">Panneau d'administration</a></button> <button class="btn btn-primary my-0" ><a href="index.php?action=unlog">Déconnexion</a></button>
        <?php } ?>
     </div></nav>
</header>
<div class=" contenu">
<?php echo $content ?>
</div>

<footer class="container-fluid">
    <div class="row">
<a href="facebook.com"><i class="fab fa-facebook-f col-md-1"></i></a> <a href="twitter.com"><i class="col-md-1 fab fa-twitter"></i></a> <p class="col-md-4 offset-md-7"> Blog réalisé avec php,mysql et la bibliothèque css Bootstrap</p></div>
</footer>
<?php if (isset($script)) {
    echo $script;
} ?>
</body>
</html>

