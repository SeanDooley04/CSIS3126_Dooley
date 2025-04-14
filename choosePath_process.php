<?php
session_start();
include("global.php");

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
// above here is doing what it is supposed to
// below is not for some reason



$next_pos = $gamestate['next_pos'];
$next_pos_JSON = $gamestate['next_pos'];
$next_pos_Array = json_decode($next_pos_JSON, true);
$count_remaining = $gamestate["count_remaining"];
$whose_turn = $gamestate['whose_turn'];


if($count_remaining > 0){
    continueMovement($connection);
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $count_remaining = $gamestate['count_remaining'];
}

$whose_turn = $gamestate['whose_turn'];
if($whose_turn != 4){
    $whose_turn += 1;
}else{
    $whose_turn = 1;
}
$
$next_player_pos = $gamestate['player'.$whose_turn.'_pos'];
$next_pos_JSON = getNextPos($next_player_pos);
// update whose turn and the next position acordingly
mysqli_query($connection, "UPDATE gamestate set whose_turn = '$whose_turn', next_pos = '$next_pos_JSON', roll_num = 0 where game_PIN = '$pin'");
header("location: game_page.php?pin=". $pin);

    










function continueMovement($connection){
    $pin = $_POST['pin'];
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $count_remaining = $gamestate['count_remaining'];

    $GLOBALS['stop'] = 0;
    while ($count_remaining > 0 and $GLOBALS['stop'] != 1){
        //call move forward function
        moveForward($connection);
        // get the remaining count from the database
        $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
        $gamestate = mysqli_fetch_assoc($gamestate_query);
        $count_remaining = $gamestate['count_remaining'];
    }
}


function moveForward($connection){
    $pin = $_POST['pin'];
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
    
    $next_pos_JSON = $gamestate['next_pos'];
    $next_pos_Array = json_decode($next_pos_JSON, true );
    if (count($next_pos_Array) == 1){
        $current_pos = $next_pos_Array[0];
        
        $player_id_pos = "player".$user_player_num . "_pos";
        
        $next_pos_JSON = getNextPos($current_pos);
        //update the count remaining
        $count_remaining = $count_remaining - 1 ;
        mysqli_query($connection, "UPDATE gamestate set $player_id_pos = '$current_pos', next_pos = '$next_pos_JSON', count_remaining = '$count_remaining' where game_PIN = '$pin'");

    }else{
        $GLOBALS['stop'] = 1;
        choosePathForm($next_pos_Array);
    }
    

}
function choosePathForm($next_pos_Array){
    $direction1 = $next_pos_Array['direction1'];
    $direction2 = $next_pos_Array['direction2'];
    $pos1 = $next_pos_Array['pos1'];
    $pos2 = $next_pos_Array['pos2'];
    
    $pin = $_POST['pin'];
    echo "<form action='choosePath_process.php' method='POST'>";
    echo "<input type='hidden' name ='pin' value = '$pin'>";
    echo "<input type='hidden' name ='pos1' value = '$pos1'>";
    echo "<input type='hidden' name ='pos2' value = '$pos2'>";
    echo "<input type='hidden' name ='direction1' value = '$direction1'>";
    echo "<input type='hidden' name ='direction2' value = '$direction2'>";
    if($direction1 == "up" or $direction2 == "up"){
        echo '<input type="radio" id = "up" name="direction" value ="up" >';
        echo '<label for="up">Up</label><br>';
    }
    if($direction1 == "left" or $direction2 == "left"){
        echo '<input type="radio" id = "left" name="direction" value ="left" >';
        echo '<label for="up">Left</label><br>';
    }
    if($direction1 == "right" or $direction2 == "right"){
        echo '<input type="radio" id = "right" name="direction" value ="right" >';
        echo '<label for="right">Right</label><br>';
    }
        
    echo '<input type="submit" value="Go">';
    echo '</form>';
}


function getNextPos($pos){
        
    //connect with the sql in gamestate
    //have a JSON array and a key for the start position

    if($pos == 58){
        $next_pos_Array = array(1);
    }elseif($pos == 42){
        $next_pos_Array = array(7);
    }elseif($pos == 47){
        $next_pos_Array = array(13);
    }elseif($pos == 69){
        $next_pos_Array = array(19);
    }elseif($pos == 13){
        $next_pos_Array = array('pos1' => 48, 'pos2' => 14, 'direction1' => 'up', 'direction2' => 'right' );
    }elseif($pos == 53){
        $next_pos_Array = array('pos1' => 54, 'pos2' => 59, 'direction1' => 'left', 'direction2' => 'right');
    }elseif($pos == 31){
        $next_pos_Array = array('pos1' => 43,'pos2' => 32, 'direction1' => 'up', 'direction2' => 'left');
    }else{
        $next_pos = $pos + 1;
        $next_pos_Array = array($next_pos);
    }
    $next_pos_JSON = json_encode($next_pos_Array);

    return $next_pos_JSON;
}



?>