<?php
include("global.php");

$pin = $_POST['pin'];
$decision = $_POST['decision'];


$gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin' ");
$gamestate = mysqli_fetch_assoc($gamestate_query);
$whose_turn = $gamestate['whose_turn'];
$player_num_coins = "player" . $whose_turn . "_coins";
$player_coins = $gamestate[$player_num_coins];

$player_num_stars = "player" . $whose_turn . "_stars";
$player_stars = $gamestate[$player_num_stars];





if ($decision == "yes"){
    if($player_coins >= 20){
        $player_coins -= 20;
        $player_stars += 1;
        mysqli_query($connection, "UPDATE gamestate set $player_num_coins = '$player_coins', $player_num_stars = '$player_stars' where game_PIN = '$pin'");
    }
}


header("location: game_page.php?pin=". $pin);


?>