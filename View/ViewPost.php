<?php
ob_start();

?>
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <p class ="msgerrorComment rounded"> <?= $erreur?> </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class=" card rounded">
                <div class="card-header">
                    <h2><?= $post['Title'] ?></h2>
                </div>
                <div class="card-body">
                    <p class="card-date"> Le <?= $post['jour'] ?> à <?= $post['heure'] ?> </p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class=col-xl-8><?= $post['Content'] ?> </div><?php if ($post['Img_Name'] != null) { ?>
                                <div class="col-xl-4"><img class="img-fluid"
                                                           src="<?= "img/" . $post['Img_Name']; ?>"
                                                           alt="<?php
                                                           $filename = $posts['Img_Name'];
                                                           echo explode(".",$filename)[0]; ?>"/>
                                </div> <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card rounded">
                <div class="card-header">
                    <h2>Commentaires</h2>
                </div>
                <div class="card-body">
                    <?php if (count($comments) == 0) {
                        ?> <p> Pas de Commentaires</p>
                    <?php } else {
                        for ($i = 0; $i < count($comments); $i++) {
                            ?>
                            <div class="row">
                                <p class="col-md-4 commentHead"><?= $comments[$i]['Name'] ?> dit
                                    le <?= $comments[$i]['jour'] ?> à <?= $comments[$i]['heure'] ?>
                                    : </p>
                                <?php if ($comments[$i]['Status'] == 2) { ?><a
                                    href="<?= "index.php?action=signaler&postid=" . $post['Id'] . "&commentid=" . $comments[$i]['Id'] ?>"
                                    class="btn btn-danger offset-md-3 btnsignal">Signaler</a><?php } else {
                                    ?>
                                    <button class="btn btn-secondary offset-md-3 btnsignal" disabled>Signaler
                                    </button><?php

                                } ?></div>
                            <p class="commentContent"><?php if ($comments[$i]['Status'] == 1) {
                                    ?><em>Contenu soumis à la modération</em><?php } else {
                                    echo $comments[$i]['Content'];
                                } ?> </p>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Ajouter un commentaire</h2>
                </div>
                <div class="card-body">
                    <form class=" rounded addComment" method="post"
                          action="index.php?action=commenter&postid=<?= $post['Id'] ?>">
                        <div class="form-group col-md-7">
                            <input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo"
                                   maxlength="255">
                        </div>
                        <div class="form-group">
                                <textarea name="content" class="form-control" placeholder="Votre commentaire"
                                          rows="6"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <a href="index.php" class="btn btn-primary"> Retour
                à l'Accueil</a></div>
    </div>

    </div>
<?php

$content = ob_get_clean();

?>