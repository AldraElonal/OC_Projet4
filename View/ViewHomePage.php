<?php
ob_start();
?>
    <div class="row ">
        <div class="contenu rounded col-md-8 offset-md-2">
            <?php
            for ($i = 0; $i < count($posts); $i++) {
                ?>

                <article class="rounded">
                    <h2>
                        <a href="<?= "index.php?action=billet&postid=" . $posts[$i]['Id'] ?>"><?= $posts[$i]['Title'] ?></a>
                    </h2>
                    <p> Le <?= $posts[$i]['Created_at'] ?> </p>
                    <p><?php
                        if (strlen($posts[$i]['Content']) > 250) {
                            $extract = substr($posts[$i]['Content'], 0, 250);
                            $extract = $extract . '... ';
                            echo $extract;
                        } else {
                            echo $posts[$i]['Content'];
                        }
                        ?> </p></article>

            <?php } ?>

        </div>
    </div>
<?php
$content = ob_get_clean();

?>