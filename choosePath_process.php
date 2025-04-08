<?php
session_start();
include("global.php");
$direction = $_POST["direction"];
if($direction == 'up'){
    
    if($_SESSION['pos'] == 13){
        $player_pos = 48;
    }elseif($_SESSION['pos'] == 31){
        $player_pos = 43;
    }
    $_SESSION['countremaining'] -= 1;
}elseif($direction == 'right'){
    if($_SESSION['pos'] == 13){
        $player_pos = 14;
    }elseif($_SESSION['pos'] == 53){
        $player_pos = 59;
    }
    $_SESSION['countremaining'] -= 1;
}
if($direction == 'left'){
    if($_SESSION['pos'] == 53){
        $player_pos = 54;
    }elseif($_SESSION['pos'] == 31){
        $player_pos = 32;
    }
    $_SESSION['countremaining'] -= 1;
}
while($_SESSION['countremaining']> 0){
    switch($player_pos){
        case 58:
            $player_pos = 1;
            break;
        case 42:
            $player_pos = 7;
            break;
        case 47:
            $player_pos = 13;
            break;
        case 69:
            $player_pos = 19;
            break;        
        case 13:
            getRemaining();
            break;
        default:
            $player_pos += 1;
    }
    $_SESSION['countremaining'] -= 1;
}
if($_SESSION['countremaining'] == 0){
    if($_SESSION['whose_turn'] == 4){
        $_SESSION['whose_turn'] = 1;
    }else{
        $_SESSION['whose_turn'] +=1;
    }
    $whose_turn = $_SESSION['whose_turn'];
    mysqli_query($connection, "UPDATE gamestate set whose_turn = '$whose_turn'");
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
header("location: game_page.php");

?>