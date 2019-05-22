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
    <form class =" col-md-7 rounded ajoutCommentaire">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Votre pseudo">
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Votre commentaire" rows = "6"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="index.php" class="btn btn-primary"> Retour à l'Acceuil</a>
<?php

$contenu = ob_get_clean();

?>