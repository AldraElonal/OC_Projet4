<?php
ob_start();
?>
    <div class="row ">
        <div class="rounded contenu col-md-7 offset-md-2">
            <form class="col-md-7 rounded" method="post" action="login.php">
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="login">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Connection</button>
                </div>

            </form>
        </div>
    </div>

<?php

$content = ob_get_clean();

?>