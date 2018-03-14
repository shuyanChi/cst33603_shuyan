<?php
    include "game.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Silverjacks</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body>
        <h1>Silverjacks</h1>
        <?php
            if (!isset($_SESSION["round"]) || isset($_POST["reset"])) init();
            if (isset($_POST["play"])) play();
            render();
        ?>
        <div>
            <form action="" method="post">
                <input type="submit" value="Spin" name="play">
                <input type="submit" value="Reset" name="reset">
            </form>
        </div>
    </body>
</html>
