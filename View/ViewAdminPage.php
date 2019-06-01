<?php
ob_start();

?>
<div class  = "rounded comments">
<h2> Commentaires</h2>
    <?php for($i=0;$i<count($comments);$i++){
        ?>
        <div class=" row">
        <p class ="col-md-5"><?= $comments[$i]['Name'] ?> dit le <?= $comments[$i]['Created_at'] ?> : </p>
        <form method="get" action="admin.php?action=supprimerCommentaire&id=<?=$i ?>">
            <button type="submit" class="btn btn-danger col-md-12"> Supprimer Commentaire</button>
        </form>
        </div>
        <p><?= $comments[$i]['Content']?> </p>

    <?php } ?>

</div>
<?php

$content = ob_get_clean();

?>