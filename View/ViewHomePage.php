<?php
ob_start();
for($i = 0; $i< count($posts); $i++)
{
    ?>
    <article class ="rounded">
        <h2><a href="<?="index.php?action=billet&id=" .$posts[$i]['Id']?>"><?= $posts[$i]['Title'] ?></a></h2>
        <p> Le <?= $posts[$i]['Created_at'] ?> </p>
        <p><?= $posts[$i]['Content'] ?> </p></article>
<?php }

$content = ob_get_clean();

?>