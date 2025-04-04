<?php

include("global.php");
$newPos = $_POST["movetext"];
$pin = $_GET['pin'];
if($_SESSION['user_player_num'] == 1){
    mysqli_query($connection, "UPDATE gamestate set player1_pos = '$newPos' ");
}elseif($_SESSION['user_player_num'] == 2){
    mysqli_query($connection, "UPDATE gamestate set player2_pos = '$newPos' ");
}elseif($_SESSION['user_player_num'] == 3){
    mysqli_query($connection, "UPDATE gamestate set player3_pos = '$newPos' ");
}elseif($_SESSION['user_player_num'] == 4){
    mysqli_query($connection, "UPDATE gamestate set player4_pos = '$newPos' ");
}
header("location: start_game.php?pin=$pin");
?>