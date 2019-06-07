<?php
ob_start();

?>
<div class  = "rounded comments">
<h2>Commentaires</h2>
    <?php for($i=0;$i<count($comments);$i++){
        ?>
        <div <?php
        if($comments[$i]['Status'] == 0){
            ?> class ="Signaled" <?php
        }
        ?>>
        <div class=" row">
        <p class ="col-md-5"><?= $comments[$i]['Name'] ?> dit le <?= $comments[$i]['Created_at'] ?> : </p>
            <a href="index.php?action=validerCommentaire&id=<?=$comments[$i]['Id'] ?>" class=" btn btn-success offset-md-3 col-md-1">Valider</a>
            <a href="index.php?action=supprimerCommentaire&id=<?=$comments[$i]['Id'] ?>" class="btnsupprimer btn btn-danger col-md-1">Supprimer</a>
        </div>
        <p><?= $comments[$i]['Content']?> </p>
        </div>
    <?php } ?>

</div>
<?php

$content = ob_get_clean();

?>