<?php
ob_start();
?>
    <div class="card col-md-8 offset-md-1">
        <div class="card-header">
            <h2> Biographie</h2>
        </div>

        <div class="container artfrt card-body px-3">
            <div class="row">
                <div class="col-md-8">

                    <p class="card-text"> <?php echo $bio[0]['Content'] ?></p>
                </div>
                <div class="col-md-4 ">
                    <img class="img-fluid"  src="<?= "img/" . $bio[0]['Img_Name']; ?>"
                                            alt="<?php
                                            $filename = $bio[0]['Img_Name'];
                                            echo explode(".",$filename)[0]; ?>"/>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-8 offset-md-2">
        <?php
        for ($i = count($posts) - 1; $i >= 0; $i--) {
            ?>

            <div class="card rounded">

                <div class="card-header">
                    <h2>
                        <a href="<?= "index.php?action=billet&postid=" . $posts[$i]['Id'] ?>"><?= $posts[$i]['Title'] ?></a>
                    </h2>
                </div>
                <div class="card-body">
                    <p class="card-date"> Le <?= $posts[$i]['jour'] ?> à <?= $posts[$i]['heure'] ?> </p>
                    <div class="container artfrt">
                        <div class="row">
                            <div class="col-md-8"><p><?php
                                    if (strlen($posts[$i]['Content']) > 320) {

                                        $extract = substr($posts[$i]['Content'], 0, 300);
                                        $extract = $extract . '... ';
                                        echo $extract;
                                    } else {
                                        echo $posts[$i]['Content'];
                                    }
                                    ?></p></div>
                            <?php if ($posts[$i]['Img_Name'] != null) { ?>
                                <div class="col-md-4"><img class="img-fluid"
                                                           src="<?= "img/" . $posts[$i]['Img_Name']; ?>"
                                                            alt="<?php
                                                             $filename = $posts[$i]['Img_Name'];
                                                             echo explode(".",$filename)[0]; ?>"/>
                                </div> <?php } ?>
                        </div>
                        <i class="fas fa-comment"></i> <?= $numbercommentsperposts[$i] ?>
                        <div class=" row"><a href="<?= "index.php?action=billet&postid=" . $posts[$i]['Id'] ?>"
                                             class="btn btn-primary">Lire la suite</a></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
$content = ob_get_clean();

?>