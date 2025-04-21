<?php
session_start();
include("global.php");

include('phpFunctions.php');


$pin = $_POST['pin'];
$direction = $_POST['direction'];


$direction1 = $_POST['direction1'];
$direction2 = $_POST['direction2'];
$pos1 = $_POST['pos1'];
$pos2 = $_POST['pos2'];


$gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
        
$gamestate = mysqli_fetch_assoc($gamestate_query);
$player1_id = $gamestate["player1_id"];
$player2_id = $gamestate["player2_id"];
$player3_id = $gamestate["player3_id"];
$player4_id = $gamestate["player4_id"];

$count_remaining = $gamestate["count_remaining"];
$user_id = $_SESSION['user_id'];
if($user_id == $player1_id){
    $user_player_num = 1;
}elseif($user_id == $player2_id){
    $user_player_num = 2;
}elseif($user_id == $player3_id){
    $user_player_num = 3;
}elseif($user_id == $player4_id){
    $user_player_num = 4;
}
$player_id_pos = "player".$user_player_num . "_pos";

if ($direction == $direction1){
    $pos = $pos1;
}elseif($direction == $direction2){
    $pos = $pos2;
}

$next_pos_JSON = getNextPos($pos);

$count_remaining = $count_remaining - 1;

mysqli_query($connection, "UPDATE gamestate set $player_id_pos = '$pos', next_pos = '$next_pos_JSON', count_remaining = '$count_remaining' where game_PIN ='$pin'");

$gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");    
$gamestate = mysqli_fetch_assoc($gamestate_query);
$count_remaining = $gamestate['count_remaining'];

if($count_remaining == 0){
    //check if the player was on a red or blue space
    $board_data_JSON = $gamestate['board_data'];
    $board_data_array = json_decode($board_data_JSON, true);
    //get the player's position
    $whose_turn = $gamestate['whose_turn'];
    $player_pos = $gamestate['player'. $whose_turn . '_pos'];
    $player_num_coins = "player" . $whose_turn . "_coins";
    echo $player_num_coins;
    $player_coins = $gamestate[$player_num_coins];
    
    if($board_data_array[$pos] == "blue"){
        echo "+5 coins";
        $player_coins += 5;
        mysqli_query($connection, "UPDATE gamestate set $player_num_coins = '$player_coins' where game_PIN = '$pin'");
        echo "query runs";
    }
    if($board_data_array[$pos] == "red" and $player_coins != 0){
        echo "-2 coins";
        $player_coins -= 2;
        mysqli_query($connection, "UPDATE gamestate set $player_num_coins = '$player_coins' where game_PIN = '$pin'");
    }
    //increment the current_turn_num if it is the end of the 4th player's turn
    //after each player has done a turn, increment the turn number
    $current_turn_num = $gamestate['current_turn_num'];
    $turn_limit = $gamestate['turn_limit'];

    if ($gamestate['player2_id'] == ""){
        $last_player = 1;
    }elseif($gamestate['player3_id'] == ""){
        $last_player = 2;
    }elseif($gamestate['player4_id'] == ""){
        $last_player = 3;
    }else{
        $last_player = 4;
    }

    if($whose_turn == $last_player and $current_turn_num <= $turn_limit){
        $current_turn_num += 1;
        // update the turn number in the database
        mysqli_query($connection, "UPDATE gamestate set current_turn_num = '$current_turn_num' where game_PIN = '$pin'");
    }

    nextPlayerTurn($connection, $pin);
}
//return to the game
header("location: game_page.php?pin=". $pin);