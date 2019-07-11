<?php
namespace  Front;

use App\Member;

?>
<!doctype html>
<html lang="fr">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="Livre en ligne Billet simple pour l'Alaska de Jean Forteroche">
<link rel="icon" href="../favicon.ico"/>
<title> Billet simple pour l'Alaska </title>
<!-- Ajout Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
<!-- ajout fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="style/style.css"/>

<body>
<header class="container-fluid ">
    <nav class="navbar navbar-expand-md justify-content-between navbar-light fixed-top bg-light">
        <h1><a class="navbar-brand" href="index.php"><img src="../style/img/ImgBrand.png" height="30" class="d-inline-block align-top" alt="Logo Forteroche"> Billet simple pour l'Alaska</a></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <?php if (!isset($_SESSION['User']['role']) OR $_SESSION['User']['role'] < Member::ADMIN) { ?>
                    <li class="nav-item active">
                        <a href="index.php?action=login" class ="btn btn-primary my-0">Connexion</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item active">
                        <a href="index.php?action=admin" class="btn btn-primary my-0">Panneau
                                d'administration</a>
                    </li>
                    <li class="nav-item active">
                        <a href="index.php?action=unlog" class="btn btn-primary my-0">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<div class="contenu">
    <?php echo $content ?>
</div>

<footer class="container-fluid">
    <div class="row">
        <a href="http://www.facebook.com"><i class="fab fa-facebook-f col-md-1"></i></a> <a
                href="http://www.twitter.com"><i
                    class="col-md-1 fab fa-twitter"></i></a>
    </div>
</footer>
<?php if (isset($script)) {
    echo $script;
} ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

