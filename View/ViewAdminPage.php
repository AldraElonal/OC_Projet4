<?php
ob_start();

?>
    <div class="row ">
        <div class="contenu rounded col-md-7 offset-md-2">
            <div class="rounded comments">
                <h2><?= $title ?></h2>
                <?php for ($i = 0; $i < count($comments); $i++) {
                    ?>
                    <div class=" row">
                        <p class="col-md-5 commentHead"><?= $comments[$i]['Name'] ?> dit le <?= $comments[$i]['jour'] ?> à <?= $comments[$i]['heure'] ?>
                            : </p>
                        <?php if ($comments[$i]['Status'] > 0) { ?>  <a
                                href="index.php?action=validerCommentaire&commentid=<?= $comments[$i]['Id'] ?>"
                                class=" btn btn-success offset-md-3 ">Valider</a>
                            <a href="index.php?action=supprimerCommentaire&commentid=<?= $comments[$i]['Id'] ?>"
                               class="btnsupprimer btn btn-danger ">Supprimer</a>
                        <?php } ?>
                    </div>
                    <p><?= $comments[$i]['Content'] ?> </p>
                <?php } ?>

            </div>
        </div>
        <nav class="col-md-2  rounded">
            <h2>Navigation</h2>
            <ul class="nav ">
                <li class="nav-item col-md-12 ">
                    Gestion des commentaires
                </li>
                <li class="nav-item col-md-12 ">
                    <a class="nav-link offset-md-1" href="index.php?action=commentairesSupprimes"><i class="fas fa-caret-right"></i> Commentaires à Modérer</a>
                </li>
                <li class="nav-item col-md-12 ">
                    <a class="nav-link offset-md-1" href="index.php?action=commentairesSupprimes"><i class="fas fa-caret-right"></i> Commentaires Supprimés</a>
                </li>

                <li class="nav-item col-md-12 ">
                    <a class="nav-link gstctn" href="index.php?action=gestionArticles">Gestion du Contenu</a>
                </li>
                <li class="nav-item col-md-12 ">
                    <a class="nav-link offset-md-1" href="index.php?action=AjouterArticle"><i class="fas fa-caret-right"></i> Ajouter un article</a>
                </li>
                <li class="nav-item col-md-12 ">
                    <a class="nav-link offset-md-1" href="index.php?action=EditerBiographie"><i class="fas fa-caret-right"></i> Editer la biographie</a>
                </li>
            </ul>
        </nav>
    </div>
<?php

$content = ob_get_clean();

?>