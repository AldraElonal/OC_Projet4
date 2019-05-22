<?php
ob_start();
for($i = 0; $i< count($posts); $i++)
{
    ?>
    <article class ="rounded">
        <h2><a href="<?="index.php?action=billet&id=" .$posts[$i]['Id']?>"><?= $posts[$i]['Titre'] ?></a></h2>
        <p> Par  <?= $posts[$i]['Auteur'] ?> le <?= $posts[$i]['DateArticle'] ?> </p>
        <p><?= $posts[$i]['Contenu'] ?> </p></article>
<?php }

$content = ob_get_clean();

?>