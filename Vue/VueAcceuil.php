<?php
ob_start();
for($i = 0; $i< count($billets); $i++)
{
    ?>
    <article class ="rounded">
        <h2><a href="<?="index.php?action=billet&id=" .$billets[$i]['Id']?>"><?= $billets[$i]['Titre'] ?></a></h2>
        <p> Par  <?= $billets[$i]['Auteur'] ?> le <?= $billets[$i]['DateArticle'] ?> </p>
        <p><?= $billets[$i]['Contenu'] ?> </p></article>
<?php }

$contenu = ob_get_clean();

?>