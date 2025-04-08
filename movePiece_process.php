<?php

include("global.php");
$newPos = $_POST["movetext"];
$pin = $_GET['pin'];
$next_pos_JSON = getNextPos($newPos);
$gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");  
$gamestate = mysqli_fetch_assoc($gamestate_query);
$player1_id = $gamestate["player1_id"];
$player2_id = $gamestate["player2_id"];
$player3_id = $gamestate["player3_id"];
$player4_id = $gamestate["player4_id"];
$user_id = $_SESSION['user_id'];
//get the user player number from the database
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

mysqli_query($connection, "UPDATE gamestate set $player_id_pos = '$newPos' , next_pos = '$next_pos_JSON' where game_PIN = '$pin'");


header("location: game_page.php?pin=$pin");



function getNextPos($pos){
    if($pos == 58){
        $next_pos_Array = array(1);
    }elseif($pos == 42){
        $next_pos_Array = array(7);
    }elseif($pos == 47){
        $next_pos_Array = array(13);
    }elseif($pos == 69){
        $next_pos_Array = array(19);
    }elseif($pos == 13){
        $next_pos_Array = array('up' => 48, 'right' => 14);
    }elseif($pos == 53){
        $next_pos_Array = array('left' => 54, 'right' => 59);
    }elseif($pos == 31){
        $next_pos_Array = array('up' => 43,'left' => 32);
    }else{
        $next_pos = $pos + 1;
        $next_pos_Array = array($next_pos);
    }
    $next_pos_JSON = json_encode($next_pos_Array);

    return $next_pos_JSON;
}
?>