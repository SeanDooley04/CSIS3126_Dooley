<?php

function resetGame($connection){
    //clears the gamestate database to start a fresh game, for testing
    mysqli_query($connection, "delete from gamestate" );
}

function rollDice($connection){
    //echo 'rolldice is running<br> ';
    $pin = $_GET['pin'];
    $roll_num = rand(1,6);
    mysqli_query($connection, "UPDATE gamestate set count_remaining = '$roll_num', roll_num ='$roll_num' where game_PIN = '$pin'");
    continueMovement($connection);
}

function continueMovement($connection){
    $pin = $_GET['pin'];
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $count_remaining = $gamestate['count_remaining'];

    $GLOBALS['stop'] = 0;
    while ($count_remaining > 0 and $GLOBALS['stop'] != 1){
        $whose_turn = $gamestate['whose_turn'];
        //check if the player is on a star space
        $board_data_JSON = $gamestate['board_data'];
        $board_data_array = json_decode($board_data_JSON, true);
        //get the player's position
        $player_pos = $gamestate['player'. $whose_turn . '_pos'];
        $player_num_coins = "player" . $whose_turn . "_coins";
        $player_coins = $gamestate[$player_num_coins];
        if($board_data_array[$player_pos] == "starSpace"){
            if($player_coins < 20){
                echo "you don't have enough coins to buy the star <br>";
            }else{
                $GLOBALS['stop'] = 1;
                buyStarForm();
            }
        
        }

        //call move forward function
        if($GLOBALS['stop'] != 1){
            moveForward($connection);
        }

        // get the remaining count from the database
        $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
        $gamestate = mysqli_fetch_assoc($gamestate_query);
        $count_remaining = $gamestate['count_remaining'];

    }
    // update whose turn it is when the count remaining is 0
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $count_remaining = $gamestate['count_remaining'];
    $whose_turn = $gamestate['whose_turn'];

    if($count_remaining == 0){
        //check if the player was on a red or blue space
        $board_data_JSON = $gamestate['board_data'];
        $board_data_array = json_decode($board_data_JSON, true);
        //get the player's position
        $player_pos = $gamestate['player'. $whose_turn . "_pos"];
        $player_num_coins = "player" . $whose_turn . "_coins";
        $player_coins = $gamestate[$player_num_coins];


        if($board_data_array[$player_pos] == "blue"){
            echo "+5 coins";
            $player_coins += 5;
            mysqli_query($connection, "UPDATE gamestate set $player_num_coins = '$player_coins' where game_PIN = '$pin' ");
        }
        if($board_data_array[$player_pos] == "red" and $player_coins != 0){
            echo "-2 coins";
            $player_coins -= 2;
            mysqli_query($connection, "UPDATE gamestate set $player_num_coins = '$player_coins' where game_PIN = '$pin' ");
        }


        //increment the current_turn_num if it is the end of the last player's turn
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

        if($whose_turn == $last_player and $current_turn_num < $turn_limit){
            $current_turn_num += 1;
            // update the turn number in the database
            mysqli_query($connection, "UPDATE gamestate set current_turn_num = '$current_turn_num' where game_PIN = '$pin'");
        }
        nextPlayerTurn($connection, $pin);
    }
}

function nextPlayerTurn($connection, $pin){
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $whose_turn = $gamestate['whose_turn'];
    //determine how many players are in the game
    $player2_id = $gamestate['player2_id'];
    $player3_id = $gamestate['player3_id'];
    $player4_id = $gamestate['player4_id'];
    
    if($player2_id == ""){
        $num_of_players = 1;
    }elseif($player3_id == ""){
        $num_of_players = 2;
    }elseif($player4_id == ""){
        $num_of_players = 3;
    }else{
        $num_of_players = 4;
    }
    // determine which player has the next turn
    if($whose_turn != $num_of_players){
        $whose_turn += 1;
    }else{
        $whose_turn = 1;
    }
    $next_player_pos = $gamestate['player'.$whose_turn.'_pos'];
    $next_pos_JSON = getNextPos($next_player_pos);
    // update whose turn and the next position acordingly
    mysqli_query($connection, "UPDATE gamestate set whose_turn = '$whose_turn', next_pos = '$next_pos_JSON' where game_PIN = '$pin'");
}

function moveForward($connection){
    $pin = $_GET['pin'];
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
    //returns the next position as a JSON array
    return $next_pos_JSON;
}

function choosePathForm($next_pos_Array){
    $direction1 = $next_pos_Array['direction1'];
    $direction2 = $next_pos_Array['direction2'];
    $pos1 = $next_pos_Array['pos1'];
    $pos2 = $next_pos_Array['pos2'];
    $pin = $_GET['pin'];
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

function buyStarForm(): void{
    $pin = $_GET['pin'];
    echo "<h3>Do you want to buy a star for 20 coins?</h3>";
    echo "<form action='buy_star_process.php' method='POST'>";
    echo "<input type='hidden' name ='pin' value = '$pin'>";
    echo '<input type="radio" id = "Yes" name="decision" value ="yes" >';
    echo '<label for="yes">Yes</label><br>';
    echo '<input type="radio" id = "no" name="decision" value ="no" >';
    echo '<label for="no">No</label><br>';
    echo '<input type="submit" value="Go">';
    echo '</form>';
}