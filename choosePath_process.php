<?php
include("global.php");
$direction = $_POST["direction"];
if($direction == 'up'){
    $player_pos = 48;
}elseif($direction == 'right'){
    $player_pos = 14;
}
if($_SESSION['user_player_num'] == 1){
    mysqli_query($connection, "UPDATE gamestate set player1_pos = '$player_pos'");
}elseif($_SESSION['user_player_num'] == 2){
    mysqli_query($connection, "UPDATE gamestate set player2_pos = '$player_pos'");
}elseif($_SESSION['user_player_num'] == 3){
    mysqli_query($connection, "UPDATE gamestate set player3_pos = '$player_pos'");
}elseif($_SESSION['user_player_num'] == 4){
    mysqli_query($connection, "UPDATE gamestate set player4_pos = '$player_pos'");
}
header("location: start_game.php");

?>