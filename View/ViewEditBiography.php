<?php
ob_start(); ?>
    <div class="row ">
        <div class="col-lg-7 offset-lg-2">
            <div class="rounded card">
                <div class="card-header">
                    <h2> Edition de la Biographie</h2>
                </div>
                <form class=" col-md-10 rounded EditArticle" method="post"
                      action="editbiography.php" enctype="multipart/form-data">
                    <?php if ($msgerror != null) {
                        ?>
                        <p class="msgerror"> <?= $msgerror ?></p>
                    <?php } ?>
                    <div class="form-group">
                    <textarea name="Content" class="form-control" id="TinyMCE"
                              rows="6">
                            <?= $content; ?>
                        </textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="FileUpdate" id="FileUpdate"
                               class="col-md-1 form-control"
                        >
                        <label class="form-check-label" for="FileUpdate">
                            Cocher pour ajouter ou modifier l'image de la biographie
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="fileUpload">Fichier:</label>
                        <input type="file" name="photo" id="fileUpload">
                        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés
                            jusqu'à
                            une taille maximale de 5 Mo.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>

        <nav class=" card col-lg-3  rounded">
            <div class="card-header">
                <h2>Navigation</h2>
            </div>
            <div class="card-body">
                <ul class="nav ">
                    <li class="nav-item col-lg-12 ">
                        <span class="nav-link"> Gestion des commentaires</span>
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
                        <a class="nav-link" href="index.php?action=gestionArticles">Gestion du Contenu</a>
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