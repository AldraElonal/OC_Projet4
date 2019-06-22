<?php
ob_start();
?>
<div class="contenu">
    <div class="row ">
        <div class=" rounded col-md-8 offset-md-1">
            <article class="rounded">
                <h2> Biographie</h2>


    <div class ="container artfrt">
    <div class="row">
    <div class ="col-md-9">

        <p> <?php echo $bio[0]['Content']?></p>
    </div>
    </div>
    </div>
            </article>
        </div>

        <div class=" rounded col-md-8 offset-md-2">
            <?php
            for ($i = 0; $i < count($posts); $i++) {
                ?>

                <article class="rounded">
                    <h2>
                        <a href="<?= "index.php?action=billet&postid=" . $posts[$i]['Id'] ?>"><?= $posts[$i]['Title'] ?></a>
                    </h2>
                    <p> Le <?= $posts[$i]['jour'] ?> à <?=$posts[$i]['heure'] ?> </p>
                    <div class ="container artfrt"><div class="row"><div class ="col-md-8"><p><?php


                        if (strlen($posts[$i]['Content']) > 200) {

                            $extract = substr($posts[$i]['Content'], 0, 200);
                            $extract = $extract . '... ';
//                            var_dump($posts[$i]['Content']);
//                            var_dump($extract);
                            echo $extract;
                        } else {
                            echo $posts[$i]['Content'];
                        }
                                    ?> </div</p></div><?php if($posts[$i]['Img_Name'] != null){ ?><div class="col-md-3 offset-md-1"><img class = "image_homepage img-fluid mx-auto " src="<?= "img/". $posts[$i]['Img_Name']; ?>"/></div> <?php } ?></div> </article>



            <?php  } ?>

        </div>
    </div>
</div>
<?php
$content = ob_get_clean();

?>