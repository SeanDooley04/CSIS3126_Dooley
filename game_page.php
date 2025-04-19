
<?php
    session_start();
    include('header.php');
    include('global.php');
    $pin = $_GET['pin'];
?>

<!--This part below is meant to stop form resubmission -->
<script>
    if ( window.history.replaceState ){
        window.history.replaceState(null, null, window.location.href );
    }
</script>

<!--link to the .css file-->
<head>
    <link rel="stylesheet" href="gamestyle.css">
</head>
    <!-- content div contains game controls and the game board so I can display controls next to the board rather than below to minimize the need for scrolling-->
    <div class="content">
        <!--start of controls div -->
        <div class="gamecontrols">
            <!--Link to return to the home screen -->
            <h3><a href='index.php'>Home</a></h3>

            <!--displays the game link and button to copy it -->
            <h3>Game link: http://localhost:8888/Web%20Board%20Game/selection.php?pin=<?php echo $pin;?></h3>
            <h3 class="linkMessage" id="linkMessage">
                <h3>send this link to your friends so they can join, 4 players max</h3>
                <!-- The button used to copy the game link -->
                <button onclick="copyLink()">Copy Link</button>
            </h3>


            <p id="rollDisplay" class="rollDisplay"></p>
            <?php //I couldn't get an html button to run a php function so I'm using this as a work around
                if(array_key_exists('startbutton', $_POST)) {
                    mysqli_query($connection, "UPDATE gamestate SET game_started = '1' WHERE game_PIN ='$pin'");
                }
            ?>

            <form method="post" id="startbuttonform">
                <input type="submit" name="startbutton" class="button" value="Start Button" />
            </form>
            
            <!--The reset button-->
            <?php // the reset button posts back to this page, this part checks if the button was pressed
                if(array_key_exists('resetbutton', $_POST)) {
                    resetGame($connection);
                }
            ?>
            <form method="post" id="resetbuttonform">
                <input type="submit" name="resetbutton" class="button" value="Reset Button" />
            </form>


            <!--The change position form that I am using for testing -->
            <form action="movePiece_process.php?pin=<?php echo $pin; ?>" method="post" id="movepieceform">
                <input type="text" id="movetext" name="movetext" />
                <input type="submit" name="changepos" value="ChangePos(testing)" />
            </form>

            
            <?php
            //fetches the gamestate from the database
            $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");

            $gamestate = mysqli_fetch_assoc($gamestate_query);
            
            $count_remaining = $gamestate['count_remaining'];

            $game_started = $gamestate["game_started"];
            $player1_name = $gamestate["player1_uname"];
            $player2_name = $gamestate["player2_uname"];
            $player3_name = $gamestate["player3_uname"];
            $player4_name = $gamestate["player4_uname"];




            $whose_turn = $gamestate['whose_turn'];

            $player1_pos = $gamestate["player1_pos"];
            $player2_pos = $gamestate["player2_pos"];
            $player3_pos = $gamestate["player3_pos"];
            $player4_pos = $gamestate["player4_pos"];
            $player1_color = $gamestate["player1_color"];
            $player2_color = $gamestate["player2_color"];
            $player3_color = $gamestate["player3_color"];
            $player4_color = $gamestate["player4_color"];

            //determine the user_player_num
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



            if($user_player_num == 1){
                $user_player_pos = $player1_pos;
            }elseif($user_player_num == 2){
                $user_player_pos = $player2_pos;
            }elseif($user_player_num == 3){
                $user_player_pos = $player3_pos;
            }elseif($user_player_num == 4){
                $user_player_pos = $player4_pos;
            }
            
            


            
            
            if(array_key_exists('rolldicebutton', $_POST)) {
                rollDice($connection);
            }
            ?>
            <form method="post" id="rolldiceform">
                <input type="submit" name="rolldicebutton" class="button" value="rolldice Button" />
            </form>
            <h3>Player names: </h3>
            <div class="playerNames">
                <div id="player1label" class="playerlabel"><br><br><br><br><br><?php echo $player1_name;?>   </div>
                <div id="player2label" class="playerlabel"><br><br><br><br><br><?php echo $player2_name;?>   </div>
                <div id="player3label" class="playerlabel"><br><br><br><br><br><?php echo $player3_name;?>   </div>
                <div id="player4label" class="playerlabel"><br><br><br><br><br><?php echo $player4_name;?></div>
            </div>
            <!--display the current turn number and turn limit to the user -->
            <?php 
                $current_turn_num = $gamestate['current_turn_num'];
                $turn_limit = $gamestate['turn_limit'];
                echo  "<h3>current turn number: $current_turn_num / turn limit: $turn_limit</h3>";
                if($current_turn_num >= $turn_limit){
                    echo "<h2>Turn limit reached, game over </h2>";
                }
            ?>
           

        </div>

        <div class="gameBoard" id="gameBoard">
            
            <class="flex-container">

                <div class="row row1">
                    <!--each space on the board has 4 of the gamepieces invisible by default 
                    -->

                    <div class="flex-box topleftcorner" id="1">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="58">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    
                    <div class="flex-box red" id="57">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="56">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="55">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="54">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box topsplitpath" id="53">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="59">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="60">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="61">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="62">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="63">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box toprightcorner" id="64">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    

                </div>
                <div class="column">
                    <div class="row row2">
                        <div class="flex-box red" id="2">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box blue" id="3">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="4">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="5">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="6">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                    </div>
                    <div class="row row3">
                        <div class="flex-box blue" id="52">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="51">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="50">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="49">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="48">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                    </div>
                    <div class="row row 4">
                        <div class="flex-box red" id="65">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box blue" id="66">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="67">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="68">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="69">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>

                    </div>
                </div>
                <div class="row row5">
                    <div class="flex-box middleleftcorner" id="7">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="8">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="9">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="10">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="11">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="12">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box centersplitpath" id="13">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="14">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="15">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="16">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="17">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="18">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box downarrow" id="19">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                </div>
                <div class="column">
                    <div class="row row6">
                        <div class="flex-box red" id="42">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box blue" id="41">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="40">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="39">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="38">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                    </div>
                    <div class="row row7">
                        <div class="flex-box blue" id="47">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="46">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="45">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="44">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="43">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                    </div>
                    <div class="row row8">
                        <div class="flex-box red" id="20">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box blue" id="21">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="22">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box red" id="23">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                        <div class="flex-box gray" id="24">
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                            <div class="gamepiece"></div>
                        </div>
                    </div>
                </div>
                <div class="row row9">
                    <div class="flex-box bottomleftcorner" id="37">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="36">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="35">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="34">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="33">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="32">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box leftupsplitpath" id="31">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="30">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="29">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="28">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="27">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="26">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box bottomrightcorner" id="25">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>



    <?php
    //php reset function
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
        
        // update whose turn it is when the count remaining is 0
        $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
        $gamestate = mysqli_fetch_assoc($gamestate_query);
        $count_remaining = $gamestate['count_remaining'];
        $whose_turn = $gamestate['whose_turn'];

        if($count_remaining == 0){

            //increment the current_turn_num if it is the end of the 4th player's turn
            //after each player has done a turn, increment the turn number
            $current_turn_num = $gamestate['current_turn_num'];
            $turn_limit = $gamestate['turn_limit'];
            if($whose_turn == 4 and $current_turn_num <= $turn_limit){
                $current_turn_num += 1;
                // update the turn number in the database
                mysqli_query($connection, "UPDATE gamestate set current_turn_num = '$current_turn_num' where game_PIN = '$pin'");
            }

            // determine which player has the next turn
            if($whose_turn != 4){
                $whose_turn += 1;
            }else{
                $whose_turn = 1;
            }




            $next_player_pos = $gamestate['player'.$whose_turn.'_pos'];
            $next_pos_JSON = getNextPos($next_player_pos);

            
            
            // update whose turn and the next position acordingly
            mysqli_query($connection, "UPDATE gamestate set whose_turn = '$whose_turn', next_pos = '$next_pos_JSON', roll_num = 0 where game_PIN = '$pin'");
        }


        
        //crossroads are at spaces 13, 53, and 31
    }
    function continueMovement($connection){
        $pin = $_GET['pin'];
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


    //set up game id for multiple games
    //store next pos in database
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

    
    //fetches the gamestate from the database
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");

    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $roll_num = $gamestate["roll_num"];
    $count_remaining = $gamestate['count_remaining'];
    $whose_turn = $gamestate['whose_turn'];
    $player1_pos = $gamestate["player1_pos"];
    $player2_pos = $gamestate["player2_pos"];
    $player3_pos = $gamestate["player3_pos"];
    $player4_pos = $gamestate["player4_pos"];

   



    ?>


    <script>
        window.onload = function() {
            var x = document;
            //this gets player1's positon from the php
            var player1_pos = "<?php echo $player1_pos; ?>";
            var player2_pos = "<?php echo $player2_pos; ?>";
            var player3_pos = "<?php echo $player3_pos; ?>";
            var player4_pos = "<?php echo $player4_pos; ?>";

            var player1_name = "<?php echo $player1_name; ?>";
            var player2_name = "<?php echo $player2_name; ?>";
            var player3_name = "<?php echo $player3_name; ?>";
            var player4_name = "<?php echo $player4_name; ?>";
            
            var player1_color = "<?php echo $player1_color; ?>";
            var player2_color = "<?php echo $player2_color; ?>";
            var player3_color = "<?php echo $player3_color; ?>";
            var player4_color = "<?php echo $player4_color; ?>";

            var game_started = "<?php echo $game_started; ?>";
            var count_remaing = "<?php echo $count_remaining; ?>";

            var roll_num = "<?php echo $roll_num; ?>";
            
            var whose_turn = "<?php echo $whose_turn; ?>";
            var user_player_num = "<?php echo $user_player_num; ?>";

            if(game_started == "1"){
                x.getElementById("gameBoard").style.display = "flex";
                x.getElementById("startbuttonform").style.visibility = "hidden";
            }
            
            x.getElementById("rollDisplay").innerHTML = "Dice number: " + roll_num + " remaining: " + count_remaing;
            
            if(user_player_num == whose_turn && game_started == "1"){
                
                x.getElementById("rollDisplay").style.visibility = "visible";
                const form = document.getElementById('rolldiceform');
                form.style.display = 'block';
            }




            //the collection is of the game pieces contained in the  at the playeer's position
            const player1space = x.getElementById(player1_pos).children;
            //I can then specify a specific game piece on that space to be turned visible
            player1space[0].style.visibility = "visible";
            player1space[0].className = "gamepiece "+player1_color+"piece";
            
            //displays the labels for each player's username and piece
            const player1nameLabel = x.getElementById("player1label");
            player1nameLabel.className = "playerlabel " +player1_color+"piece";
            player1nameLabel.style.visibility = "visible";
            if (player2_color != ""){
                const player2space = x.getElementById(player2_pos).children;
                player2space[1].style.visibility = "visible";
                //i can make as many color options as I want now
                player2space[1].className = "gamepiece "+player2_color+"piece";
                const player2nameLabel = x.getElementById("player2label");
                player2nameLabel.className = "playerlabel " +player2_color+"piece";
                player2nameLabel.style.visibility = "visible";
            }

            if (player3_color != ""){
                const player3space = x.getElementById(player3_pos).children;
                player3space[2].style.visibility = "visible";
                player3space[2].className = "gamepiece "+player3_color+"piece";
                const player3nameLabel = x.getElementById("player3label");
                player3nameLabel.className = "playerlabel " +player3_color+"piece";
                player3nameLabel.style.visibility = "visible";
            }

            if (player4_color != ""){
                const player4space = x.getElementById(player4_pos).children;
                player4space[3].style.visibility = "visible";
                player4space[3].className = "gamepiece "+player4_color+"piece";
                const player4nameLabel = x.getElementById("player4label");
                player4nameLabel.className = "playerlabel " +player4_color+"piece";
                player4nameLabel.style.visibility = "visible";
            }
            
        }
        function copyLink() {
            var pin = "<?php echo $pin; ?>";
            var link = "http://localhost:8888/Web%20Board%20Game/selection.php?pin="+ pin;
            
            // Copy the link
            navigator.clipboard.writeText(link);

            // Alert the copied text
            alert("Copied the text: " + link);
        }
        


    </script>
<?php
include('footer.php');
?>