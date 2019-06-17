<?php
ob_start();?>
<div class="row ">
    <div class="contenu rounded col-md-7 offset-md-2">
<h2> Gestion des Articles</h2>
<ul class=" list-group rounded">
  <div class ="row" > <a href="index.php?action=AjouterArticle"class="btn btn-success col-md-3">Ecrire un Nouveau
          Article</a></div>
<?php for ($i = 0; $i < count($posts); $i++) {
    ?>
    <div class="row"><li class ="list-group-item col-md-7"><?= $posts[$i]['Title'] ?></li><a href="index.php?action=EditerArticle&postid=<?=
        $posts[$i]['Id'] ?>"class="btn btn-primary offset-md-1 col-md-1">Editer</a></div>
<?php } ?>
</ul>
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