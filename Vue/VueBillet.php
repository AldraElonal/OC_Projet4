<?php
ob_start();

?>
    <article class ="rounded">
        <h2><?= $billet['Titre'] ?></a></h2>
        <p> Par  <?= $billet['Auteur'] ?> le <?= $billet['DateArticle'] ?> </p>
        <p><?= $billet['Contenu'] ?> </p></article>

    <div class = "rounded commentaires">
        <h2> Commentaires</h2>
        <?php for($i=0;$i<count($commentaires);$i++){
            ?>

            <p><?= $commentaires[$i]['Auteur'] ?> dit le <?= $commentaires[$i]['DateCommentaire'] ?> : </p>
            <p><?= $commentaires[$i]['Contenu']?> </p>

        <?php } ?>
    </div>
    <a href="index.php" class="btn btn-primary stretched-link"> Retour à l'Acceuil</a>
<?php

$contenu = ob_get_clean();

?>