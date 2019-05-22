<?php
ob_start();

?>
    <article class ="rounded">
        <h2><?= $post['Titre'] ?></a></h2>
        <p> Par  <?= $post['Auteur'] ?> le <?= $post['DateArticle'] ?> </p>
        <p><?= $post['Contenu'] ?> </p></article>

    <div class = "rounded comments">
        <h2> Commentaires</h2>
        <?php for($i=0;$i<count($comments);$i++){
            ?>

            <p><?= $comments[$i]['Auteur'] ?> dit le <?= $comments[$i]['DateCommentaire'] ?> : </p>
            <p><?= $comments[$i]['Contenu']?> </p>

        <?php } ?>
    </div>

    <form class =" col-md-7 rounded addComment" method="post" action="index.php?action=commenter&id=<?=$post['Id']?>">
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo">
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Votre commentaire" rows = "6"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="index.php" class="btn btn-primary"> Retour à l'Acceuil</a>
<?php

$content = ob_get_clean();

?>