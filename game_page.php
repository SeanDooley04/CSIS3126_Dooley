
<?php
    include('header.php');
    include('global.php');
    $pin = $_GET['pin'];
    include('phpFunctions.php');
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
            //check if the count remaining is greater than zero, if true continue piece movement
            //this allows the piece movement to continue after choosing a direction or buying a star
            if ($count_remaining > 0){
                continueMovement($connection);
            }
            //get usernames, coins, and stars so they can be displayed
            $player1_name = $gamestate["player1_uname"];
            $player2_name = $gamestate["player2_uname"];
            $player3_name = $gamestate["player3_uname"];
            $player4_name = $gamestate["player4_uname"];
            
            $player1_coins = $gamestate['player1_coins'];
            $player2_coins = $gamestate['player2_coins'];
            $player3_coins = $gamestate['player3_coins'];
            $player4_coins = $gamestate['player4_coins'];

            $player1_stars = $gamestate['player1_stars'];
            $player2_stars = $gamestate['player2_stars'];
            $player3_stars = $gamestate['player3_stars'];
            $player4_stars = $gamestate['player4_stars'];

            //checks if the roll dice button was pressed, if so run the roll dice function
            if(array_key_exists('rolldicebutton', $_POST)) {
                rollDice($connection);
            }
            ?>
            <form method="post" id="rolldiceform">
                <input type="submit" name="rolldicebutton" class="button" value="rolldice Button" />
            </form>

            <!-- show each player's number of coins and stars below their names-->
            <h3>Player names: </h3>
            <div class="playerNames">
                <div id="player1label" class="playerlabel"><br><br><br><br><br><?php echo $player1_name;?><br>Coins: <?php echo $player1_coins;?> <br>Stars: <?php echo $player1_stars;?>   </div>
                <div id="player2label" class="playerlabel"><br><br><br><br><br><?php echo $player2_name;?><br>Coins: <?php echo $player2_coins;?> <br>Stars: <?php echo $player2_stars;?>   </div>
                <div id="player3label" class="playerlabel"><br><br><br><br><br><?php echo $player3_name;?><br>Coins: <?php echo $player3_coins;?> <br>Stars: <?php echo $player3_stars;?>   </div>
                <div id="player4label" class="playerlabel"><br><br><br><br><br><?php echo $player4_name;?><br>Coins: <?php echo $player4_coins;?> <br>Stars: <?php echo $player4_stars;?>   </div>
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
        <?php 
            include('game_board_div.php');
        ?>
    </div>

    <?php
    //query the database so that the Javascript can fetch the variables it needs
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $roll_num = $gamestate["roll_num"];
    $count_remaining = $gamestate['count_remaining'];
    $whose_turn = $gamestate['whose_turn'];
    $player1_pos = $gamestate["player1_pos"];
    $player2_pos = $gamestate["player2_pos"];
    $player3_pos = $gamestate["player3_pos"];
    $player4_pos = $gamestate["player4_pos"];
    $game_started = $gamestate["game_started"];
    //get colors so that the pieces can be displayed
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
    ?>

    <script>
        window.onload = function() {
            var x = document;
            var player1_pos = "<?php echo $player1_pos; ?>";
            var player2_pos = "<?php echo $player2_pos; ?>";
            var player3_pos = "<?php echo $player3_pos; ?>";
            var player4_pos = "<?php echo $player4_pos; ?>";
            var player1_color = "<?php echo $player1_color; ?>";
            var player2_color = "<?php echo $player2_color; ?>";
            var player3_color = "<?php echo $player3_color; ?>";
            var player4_color = "<?php echo $player4_color; ?>";
            var game_started = "<?php echo $game_started; ?>";
            var count_remaining = "<?php echo $count_remaining; ?>";
            var roll_num = "<?php echo $roll_num; ?>";
            var whose_turn = "<?php echo $whose_turn; ?>";
            var user_player_num = "<?php echo $user_player_num; ?>";

            if(game_started == "1"){
                x.getElementById("gameBoard").style.display = "flex";
                x.getElementById("startbuttonform").style.visibility = "hidden";
            }
            x.getElementById("rollDisplay").innerHTML = "Dice number: " + roll_num + " remaining: " + count_remaining;
            x.getElementById("rollDisplay").style.visibility = "visible";

            if(user_player_num == whose_turn && game_started == "1"){
                const form = document.getElementById('rolldiceform');
                form.style.display = 'block';
            }

            //the collection is of the game pieces contained in the space at the player1's position
            //I get the children of the div that represents the space where player1 is
            //because the spaces where the game pieces can be displayed are stored as child divs for each space div
            const player1space = x.getElementById(player1_pos).children;

            //I know that the div for player1 is at index 0 so I set it as visible
            player1space[0].style.visibility = "visible";
            //I add the color of the piece to the class name so that the corresponding piece image can be displayed on the board
            //example: my css file specifies that elements with the greenpiece class have the greengamepiece.png as the background image
            //I did it this way because Javascript can't directly change the background image of an element, but you can change the class name
            player1space[0].className = "gamepiece "+player1_color+"piece";

            //modifies the classname for player1's label so that the image of player1's piece can be displayed above their username
            const player1nameLabel = x.getElementById("player1label");
            player1nameLabel.className = "playerlabel " +player1_color+"piece";
            player1nameLabel.style.visibility = "visible";


            if (player2_color != ""){
                const player2space = x.getElementById(player2_pos).children;
                player2space[1].style.visibility = "visible";
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