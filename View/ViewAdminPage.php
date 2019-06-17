<?php
ob_start();

?>
    <div class="row ">
        <div class="col-md-7 offset-md-2">
            <div class="rounded comments">
                <h2><?= $title ?></h2>
                <?php for ($i = 0; $i < count($comments); $i++) {
                    ?>
                        <div class=" row">
                            <p class="col-md-5"><?= $comments[$i]['Name'] ?> dit le <?= $comments[$i]['Created_at'] ?>
                                : </p>
                            <?php if ($comments[$i]['Status'] > 0) { ?>  <a
                                    href="index.php?action=validerCommentaire&commentid=<?= $comments[$i]['Id'] ?>"
                                    class=" btn btn-success offset-md-3 col-md-1">Valider</a>
                                <a href="index.php?action=supprimerCommentaire&commentid=<?= $comments[$i]['Id'] ?>"
                                   class="btnsupprimer btn btn-danger col-md-1">Supprimer</a>
                            <?php } ?>
                        </div>
                        <p><?= $comments[$i]['Content'] ?> </p>
                <?php } ?>

            </div>
        </div>
        <nav class="col-md-2  rounded">
            <h2>Menu de navigation</h2>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=commentairesSupprimes">Commentaires Supprimés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=gestionArticles">Gestion des Articles</a>
                </li>
            </ul>
        </nav>
    </div>
<?php

$content = ob_get_clean();

?>