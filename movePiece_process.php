<?php

include("global.php");
$newPos = $_POST["movetext"];
mysqli_query($connection, "UPDATE gamestate set player1_pos = '$newPos' ");

header("location: start_game.php");
?>