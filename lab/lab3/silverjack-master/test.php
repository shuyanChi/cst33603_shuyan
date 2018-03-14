<?php
    include "game.php";
    init();
    for ($i = 0; $i < 1000; $i++) {
        play();
        render();
    }
?>
