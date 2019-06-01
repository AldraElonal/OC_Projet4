<?php
ob_start();

?>
<div class  = "rounded comments">
<h2> Commentaires</h2>
    <?php for($i=0;$i<count($comments);$i++){
        ?>
        <div <?php
        if($comments[$i]['Status'] == 0){
            ?> class ="Signaled" <?php
        }
        ?>>
        <div class=" row">
        <p class ="col-md-5"><?= $comments[$i]['Name'] ?> dit le <?= $comments[$i]['Created_at'] ?> : </p>

            <a href="admin.php?action=supprimerCommentaire&id=<?=$comments[$i]['Id'] ?>" class="btn btn-danger offset-md-2 col-md-3"> Supprimer Commentaire</a>
        </div>
        <p><?= $comments[$i]['Content']?> </p>
        </div>
    <?php } ?>

</div>
<?php

$content = ob_get_clean();

?>