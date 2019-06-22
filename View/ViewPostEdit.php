<?php
ob_start(); ?>
    <div class="row ">
        <div class="contenu rounded col-md-7 offset-md-2">
            <h2> Edition d'Article</h2>
            <form class=" col-md-10 rounded EditArticle" method="post"
                  action="editpost.php<?php if ($id !== null) { ?>?postId=<?php echo $id;
                  } ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="Title" class="form-control"
                           <?php if ($id !== null) { ?>value="<?php echo $title;
                           } else { ?>placeholder=" Titre de l'article<?php } ?>">
                </div>
                <div class="form-group">
                    <textarea name="Content" class="form-control" id="TinyMCE"
                              <?php if ($id == null) { ?>placeholder="Contenu de votre Article"<?php } ?> rows="6"><?php if ($id !== null) {
                            echo $content;
                        } ?></textarea>
                </div>
                <div class="form-group">
                    <label for="fileUpload">Fichier:</label>
                    <input type="file" name="photo" id="fileUpload">
                    <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à
                        une taille maximale de 5 Mo.</p>
                </div>

                <div class="form-group row checkbox">
                    <label for="Status">Publier</label>
                    <input type="checkbox" name="Status" id="Status" class="col-md-1 form-control"
                           <?php if ($status == 1) { ?>checked<?php } ?>/>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php?action=SupprimerArticle&postid=<?=
                $id ?>" class="btn btn-danger">Supprimer</a>
            </form>
        </div>

        <nav class="col-md-2  rounded">
            <h2>Navigation</h2>
            <ul class="nav">
                <li class="nav-item">
                    Gestion des commentaires
                </li>
                <li class="nav-item">
                    <a class="nav-link offset-md-1" href="index.php?action=commentairesSupprimes"><i class="fas fa-caret-right"></i> Commentaires à Modérer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link offset-md-1" href="index.php?action=commentairesSupprimes"><i class="fas fa-caret-right"></i> Commentaires Supprimés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=gestionArticles">Gestion des Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link offset-md-1" href="index.php?action=AjouterArticle"><i class="fas fa-caret-right"></i> Ajouter un article</a>
                </li>
            </ul>
        </nav>

    </div>
<?php
$content = ob_get_clean();

?>