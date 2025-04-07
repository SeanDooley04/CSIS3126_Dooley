<?php

include("global.php");
$newPos = $_POST["movetext"];
$pin = $_GET['pin'];
$next_pos_JSON = getNextPos($newPos);
if($_SESSION['user_player_num'] == 1){
    
    mysqli_query($connection, "UPDATE gamestate set player1_pos = '$newPos' , next_pos = '$next_pos_JSON' where game_PIN = '$pin'");
}elseif($_SESSION['user_player_num'] == 2){
    mysqli_query($connection, "UPDATE gamestate set player2_pos = '$newPos', next_pos = '$next_pos_JSON' where game_PIN = '$pin'");
}elseif($_SESSION['user_player_num'] == 3){
    mysqli_query($connection, "UPDATE gamestate set player3_pos = '$newPos', next_pos = '$next_pos_JSON' where game_PIN = '$pin' ");
}elseif($_SESSION['user_player_num'] == 4){
    mysqli_query($connection, "UPDATE gamestate set player4_pos = '$newPos', next_pos = '$next_pos_JSON' where game_PIN = '$pin'");
}
header("location: start_game.php?pin=$pin");



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