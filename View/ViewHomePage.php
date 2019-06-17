<?php
ob_start();
?>
<div class="row ">
    <div class="col-md-8 offset-md-2">
        <?php
for($i = 0; $i< count($posts); $i++)
{
    ?>

    <article class ="rounded">
        <h2><a href="<?="index.php?action=billet&postid=" .$posts[$i]['Id']?>"><?= $posts[$i]['Title'] ?></a></h2>
        <p> Le <?= $posts[$i]['Created_at'] ?> </p>
        <p><?= $posts[$i]['Content'] ?> </p></article>

<?php }?>

</div>
    </div>
<?php
$content = ob_get_clean();

?>