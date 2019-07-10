<?php
ob_start(); ?>


    <div class="row ">
        <div class="col-lg-7 offset-lg-2">
            <div class="rounded card">
                <div class="card-header">
                    <h2> Gestion des Articles</h2>
                </div>
                <div class="card-body">
                    <ul class=" list-group rounded">
                        <div class="row"><a href="index.php?action=AjouterArticle" class="btn btn-success">Ecrire un
                                Nouveau
                                Article</a></div>
                        <?php for ($i = 0; $i < count($posts); $i++) {
                            ?>
                            <div class="row">
                                <li class="list-group-item col-lg-7"><?= $posts[$i]['Title'] ?></li>
                                <div class="col-lg-5"><a href="index.php?action=EditerArticle&postid=<?=
                                    $posts[$i]['Id'] ?>" class="btn btn-primary offset-lg-1 ">Editer</a> <a
                                            href="index.php?action=SupprimerArticle&postid=<?=
                                            $posts[$i]['Id'] ?>" class="btn btn-danger ">Supprimer</a></div>
                            </div>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <nav class=" card col-lg-3  rounded">
            <div class="card-header">
                <h2>Navigation</h2>
            </div>
            <div class="card-body">
                <ul class="nav ">
                    <li class="nav-item col-lg-12 ">
                        Gestion des commentaires
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=admin"><i class="fas fa-caret-right"></i>
                            Commentaires à Modérer</a>
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=commentairesSupprimes"><i
                                    class="fas fa-caret-right"></i> Commentaires Supprimés</a>
                    </li>

                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link " href="index.php?action=gestionArticles">Gestion du Contenu</a>
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=AjouterArticle"><i
                                    class="fas fa-caret-right"></i> Ajouter un article</a>
                    </li>
                    <li class="nav-item col-lg-12 ">
                        <a class="nav-link offset-md-1" href="index.php?action=EditerBiographie"><i
                                    class="fas fa-caret-right"></i> Editer la biographie</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


<?php
$content = ob_get_clean();

?>