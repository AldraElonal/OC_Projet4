<?php
namespace  Front;

use App\Member;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <!-- Ajout Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- ajout fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"/>
</head>
<body>
<header class="container-fluid ">

    <div class="row">
        <h1 class="col-sm-8"><a href="index.php">Forteroche : Billet simple pour l'Alaska</a></h1>

        <?php if (!isset($_SESSION['User']['role']) OR $_SESSION['User']['role'] < Member::ADMIN) { ?><a class="btnconnexion btn btn-danger offset-sm-2 col-sm-1 " href="index.php?action=login" role="button">Connexion</a>
        <?php } else { ?><a href="index.php?action=admin" class="btnconnexion btn btn-danger col-sm-2">Panneau
            d'Administation</a>  <a href="index.php?action=unlog" class="btndisconnexion btn btn-danger col-sm-1">Déconnexion</a>
        <?php } ?>
    </div>
</header>
<?php echo $content ?>

<footer class="container-fluid">
    <div class="row">
<a href="facebook.com"><i class="fab fa-facebook-f col-md-1"></i></a> <a href="twitter.com"><i class="col-md-1 fab fa-twitter"></i></a> <p class="col-md-4 offset-md-7"> Blog réalisé avec php,mysql et la bibliothèque css Bootstrap</p></div>
</footer>
<?php if (isset($script)) {
    echo $script;
} ?>
</body>
</html>

