<?php
ob_start();

?>
    <div class="row ">
        <div class="  col-lg-7 offset-lg-2">
            <div class="card comments rounded">
                <div class="card-header">
                    <h2><?= $title ?></h2>
                </div>
                <div class="card-body">
                    <?php for ($i = 0; $i < count($comments); $i++) {
                        ?>
                        <div class=" row">
                            <p class="col-lg-5 commentHead"><?= $comments[$i]['Name'] ?> dit
                                le <?= $comments[$i]['jour'] ?> à <?= $comments[$i]['heure'] ?>
                                : </p>
                            <div class=" col-lg-7">
                                <div class="row">
                                    <?php if ($comments[$i]['Status'] > 0) { ?>  <a
                                            href="index.php?action=validerCommentaire&commentid=<?= $comments[$i]['Id'] ?>"
                                            class=" btn btn-success ">Afficher</a>
                                        <a href="index.php?action=supprimerCommentaire&commentid=<?= $comments[$i]['Id'] ?>"
                                           class="btnsupprimer btn btn-danger ">Supprimer</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <p><?= $comments[$i]['Content'] ?> </p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <nav class=" card col-lg-3  rounded">
            <div class="card-header">
                <h2>Navigation</h2>
            </div>
            <div class="card-body">
                <ul class="nav ">
                    <li class="nav-item col-lg-12 ">
                        Gestion des commentaires
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=admin"><i class="fas fa-caret-right"></i>
                            Commentaires à Modérer</a>
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=commentairesSupprimes"><i
                                    class="fas fa-caret-right"></i> Commentaires Supprimés</a>
                    </li>

                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link" href="index.php?action=gestionArticles">Gestion du Contenu</a>
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=AjouterArticle"><i
                                    class="fas fa-caret-right"></i> Ajouter un article</a>
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=EditerBiographie"><i
                                    class="fas fa-caret-right"></i> Editer la biographie</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<?php

$content = ob_get_clean();

?>