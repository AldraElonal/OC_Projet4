<?php
ob_start();

?>
    <div class="row ">
        <div class="contenu rounded col-md-9 offset-md-2">
            <article class="rounded">
                <h2><?= $post['Title'] ?></a></h2>
                <p> Le <?= $post['jour'] ?> à <?= $post['heure'] ?> </p>
                <div class="container-fluid"><div class="row"><div class = col-md-8><?= $post['Content'] ?> </div><?php if($post['Img_Name'] != null){ ?><div class="col-md-4"><img class = "image_post img-fluid mx-auto" src="<?= "img/". $post['Img_Name']; ?>"/></div> <?php } ?></div></article>

            <div class="rounded comments">
                <h2>Commentaires</h2>
                <?php for ($i = 0; $i < count($comments); $i++) {
                    ?>
                    <div class="row">
                        <p class="col-md-4 commentHead"><?= $comments[$i]['Name'] ?> dit le <?= $comments[$i]['jour'] ?> à <?= $comments[$i]['heure'] ?>
                            : </p>
                        <?php if ($comments[$i]['Status'] == 2) { ?><a
                            href="<?= "index.php?action=signaler&postid=" . $post['Id'] . "&commentid=" . $comments[$i]['Id'] ?>"
                            class="btn btn-danger offset-md-3 btnsignal">Signaler</a><?php }
                        else{?><button class="btn btn-secondary offset-md-3 btnsignal" disabled>Signaler</button><?php

                            }?></div>
                    <p class="commentContent"><?php if ($comments[$i]['Status'] == 1) {
                            ?><em>Contenu soumis à la modération</em><?php } else {
                            echo $comments[$i]['Content'];
                        } ?> </p>
                <?php } ?>

            </div>

            <form class=" col-md-7 rounded addComment" method="post"
                  action="index.php?action=commenter&postid=<?= $post['Id'] ?>">
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control" placeholder="Votre commentaire" rows="6"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <a href="index.php" class="btn btn-primary"> Retour à l'Acceuil</a>
        </div>
    </div>
<?php

$content = ob_get_clean();

?>