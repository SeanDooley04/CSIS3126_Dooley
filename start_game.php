
<?php
    session_start();
    include('header.php');
    include('global.php');
    $pin = $_GET['pin'];
?>
<script>
    if ( window.history.replaceState ){
        window.history.replaceState(null, null, window.location.href );
    }
</script>

<h2><a href='index.php'>Home</a></h2>


<h3>Game link: http://localhost:8888/Web%20Board%20Game/game_setup.php?pin=<?php echo $pin;?></h3>
<style>
    
    p{
        text-align: center;
    }
    .gameBoard{
        
        margin: 0 auto;
        display: flex;
        justify-content: center;
        display: none;


    }
    
    .flex-container {
        position:absolute;
        border: 1px black;
        display: flex;
        flex-flow:column;
        border-collapse: collapse;
        width: 100%;
        height: 100%;
        
    }
    .flex-box {
        width   : 2.5vw;
        height  : 2.5vw;
        border  : 1px solid black;
        color   : black;
        display : flex;
        align-items: center;
        justify-content: center;
        background-size: 100%;
        flex-wrap: wrap;
        
        
    }
    .column{
        display: flex;
        justify-content: space-between;
        width:100%;
    }
    .row1 {
        margin: 0 auto;
        display: flex;
        align-content: flex-start;
    }
    .row2{
        display: flex;
        flex-direction: column;
    }
    .row3{
        display:flex;
        flex-direction: column;
        align-content: flex-start;
    }
    .row4{
        display:flex;
        flex-direction: column;
        align-content: flex-start;
    }
    .row6{
        display: flex;
        flex-direction: column;
    }
    .row7{
        display:flex;
        flex-direction: column;
        align-content: flex-start;
    }
    .row8{
        display:flex;
        flex-direction: column;
        align-content: flex-start;
    }
    .row5{
        margin: 0 auto;
        display: flex;
        flex-direction: row;
    }
    .row9{
        margin: 0 auto;
        display: flex;
        flex-direction: row;
    }
    

    
    
    
    
    .blue {
        background-color: blue;
    }
    .red{
        background-color: red;
    }
    .gray{
        background-color: gray;
    }
    .topleftcorner{
        background-image: url("images/board/topleftcorner.jpg");
        
    }
    .topsplitpath{
        background-image: url("images/board/topsplitpath.jpg");
        
    }
    .toprightcorner{
        background-image: url("images/board/toprightcorner.jpg");
    }
    .middleleftcorner{
        background-image: url("images/board/middleleftarrow.jpg");
    }
    .centersplitpath{
        background-image: url("images/board/centersplitpath.jpg");
    }
    .downarrow{
        background-image: url("images/board/downarrow.jpg");
    }
    .leftupsplitpath{
        background-image: url("images/board/leftupsplitpath.jpg");
    }
    .bottomleftcorner{
        background-image: url("images/board/bottomleftcorner.jpg");
    }
    .bottomrightcorner{
        background-image: url("images/board/bottomrightcorner.jpg") ;
    }


    .diceroll{
        justify-content: center;
        text-align: center;
        visibility: hidden;
    }

    .gamepiece{
        width:  1.25vw;
        height: 45%;
        background-size: 100%;
    }
    .lightbluepiece{
        background-image: url("images/pieces/lightbluegamepiece.png");
        visibility: hidden;
        
    }
    .pinkpiece{
        background-image: url("images/pieces/pinkgamepiece.png");
        visibility: hidden;
    }
    .greenpiece{
        background-image: url("images/pieces/greengamepiece.png");
        visibility: hidden;

    }
    .whitepiece{
        background-image: url("images/pieces/whitegamepiece.png");
        visibility: hidden;
        
    }
    .lightgreenpiece{
        background-image: url("images/pieces/lightgreengamepiece.png");
        visibility: hidden;
    }
    .lavenderpiece{
        background-image: url("images/pieces/lavendergamepiece.png");
        visibility: hidden;
    }
    form[id="rolldiceform"] {
        display: none;
        width:80vw;
        margin: 0 auto;
    }
    form{
        width:80vw;
        margin: 0 auto;
    }

    .rollDisplay{
        visibility: hidden;
    }

    


    
    
    
    
</style>
    
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
    
    <p id="rollDisplay" class="rollDisplay"></p>
    <?php //I couldn't get an html button to run a php function so I'm using this as a work around
        if(array_key_exists('startbutton', $_POST)) {
            mysqli_query($connection, "UPDATE gamestate SET game_started = '1' WHERE game_PIN ='$pin'");
        }
    ?>

    <form method="post" id="startbuttonform">
        <input type="submit" name="startbutton" class="button" value="Start Button" />
    </form>

    <?php //I couldn't get an html button to run a php function so I'm using this as a work around
        if(array_key_exists('resetbutton', $_POST)) {
            resetGame($connection);
        }
    ?>
    

    

    <form method="post" id="resetbuttonform">
        <input type="submit" name="resetbutton" class="button" value="Reset Button" />
    </form>


    



    

    <form action="movePiece_process.php?pin=<?php echo $pin; ?>" method="post" id="movepieceform">
        <input type="text" id="movetext" name="movetext" />
        <input type="submit" name="changepos" value="ChangePos" />
    </form>

    
    
    

    

    
    <?php
    //fetches the gamestate from the database
    $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = '$pin'");

    $gamestate = mysqli_fetch_assoc($gamestate_query);
    
    $game_started = $gamestate["game_started"];
    
    $player1_pos = $gamestate["player1_pos"];
    $player2_pos = $gamestate["player2_pos"];
    $player3_pos = $gamestate["player3_pos"];
    $player4_pos= $gamestate["player4_pos"];
    $player1_color = $gamestate["player1_color"];
    $player2_color = $gamestate["player2_color"];
    $player3_color = $gamestate["player3_color"];
    $player4_color = $gamestate["player4_color"];
    $user_player_num = $_SESSION["user_player_num"];
    if($user_player_num == 1){
        $user_player_pos = $player1_pos;
    }elseif($user_player_num == 2){
        $user_player_pos = $player2_pos;
    }elseif($user_player_num == 3){
        $user_player_pos = $player3_pos;
    }elseif($user_player_num == 4){
        $user_player_pos = $player4_pos;
    }

    $_SESSION['whose_turn'] = $gamestate["whose_turn"];
    
    
    if(array_key_exists('rolldicebutton', $_POST)) {
        rollDice($connection);
    }
    ?>
    <form method="post" id="rolldiceform">
        <input type="submit" name="rolldicebutton" class="button" value="rolldice Button" />
    </form>


    <?php
    //php reset function

    


    function resetGame($connection){
        //clears the gamestate database to start a fresh game, for testing
        mysqli_query($connection, "delete from gamestate" );
    }
    
    function rollDice($connection){
        $_SESSION['countremaining'] = 0;
        $GLOBALS ['roll'] = rand(1,6);
        $GLOBALS ['rollcount'] = $GLOBALS['roll'];
        while ($GLOBALS ['rollcount'] > 0){
            moveForward();
            $GLOBALS['rollcount'] = $GLOBALS ['rollcount'] - 1;
        }
        $player_pos = $GLOBALS['user_player_pos'];
        $_SESSION['pos'] = (int)$player_pos;
        if ($player_pos == 13 and $_SESSION['countremaining'] > 0){
            choosePathForm("up", "right");

        }elseif ($player_pos == 53 and $_SESSION['countremaining'] > 0){
            choosePathForm("left", "right");
        }elseif ($player_pos == 31 and $_SESSION['countremaining'] > 0){
            choosePathForm("up", "left");
        }
        if($_SESSION['countremaining'] == 0){
            if($_SESSION['whose_turn'] == 4){
                $_SESSION['whose_turn'] = 1;
            }else{
                $_SESSION['whose_turn'] += 1;
            }
            $whose_turn = $_SESSION['whose_turn'];
            mysqli_query($connection, "UPDATE gamestate set whose_turn = '$whose_turn'");
        }
        
        if($GLOBALS['user_player_num'] == 1){
            mysqli_query($connection, "UPDATE gamestate set player1_pos = '$player_pos'");
            $GLOBALS['player1_pos'] = $player_pos;
        }elseif($GLOBALS['user_player_num'] == 2){
            mysqli_query($connection, "UPDATE gamestate set player2_pos = '$player_pos'");
            $GLOBALS['player2_pos'] = $player_pos;
        }elseif($GLOBALS['user_player_num'] == 3){
            mysqli_query($connection, "UPDATE gamestate set player3_pos = '$player_pos'");
            $GLOBALS['player3_pos'] = $player_pos;
        }elseif($GLOBALS['user_player_num'] == 4){
            mysqli_query($connection, "UPDATE gamestate set player4_pos = '$player_pos'");
            $GLOBALS['player4_pos'] = $player_pos;
        }
        
    }


    //set up game id for multiple games
    //store next pos in database
    function moveForward(){
        $player_pos = (int)$GLOBALS['user_player_pos'];
        switch($player_pos){
            case 58:
                $player_pos = 1;
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;
            case 42:
                $player_pos = 7;
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;
            case 47:
                $player_pos = 13;
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;
            case 69:
                $player_pos = 19;
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;        
            case 13:
                getRemaining();
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;
            case 53:
                getRemaining();
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;
            case 31:
                getRemaining();
                $GLOBALS['user_player_pos'] = (string)$player_pos;
                break;
            default:
                $player_pos += 1;
                $GLOBALS['user_player_pos'] = (string)$player_pos;
        }
    }

    function choosePathForm($direction1, $direction2){
        echo '<form action="choosePath_process.php" method="POST">';
        if($direction1 == "up"){
            echo '<input type="radio" id = "up" name="direction" value ="up" >';
            echo '<label for="up">Up</label><br>';
        }elseif($direction1 == "left"){
            echo '<input type="radio" id = "left" name="direction" value ="left" >';
            echo '<label for="up">Left</label><br>';
        }
        if($direction2 == "right"){
            echo '<input type="radio" id = "right" name="direction" value ="right" >';
            echo '<label for="right">Right</label><br>';
        }elseif($direction2 == "left"){
            echo '<input type="radio" id = "left" name="direction" value ="left" >';
            echo '<label for="up">Left</label><br>';
        }
        echo '<input type="submit" value="Go">';
        echo '</form>';
    }

    function getRemaining(){
        if($GLOBALS['rollcount'] > $_SESSION ['countremaining']){
            $_SESSION ['countremaining'] = $GLOBALS['rollcount'];
        }
    }

    ?>


    <script>
        window.onload = function() {
            var x = document;
            //this gets player1's positon from the php
            var player1_pos = "<?php echo $player1_pos; ?>";
            var player2_pos = "<?php echo $player2_pos; ?>";
            var player3_pos = "<?php echo $player3_pos; ?>";
            var player4_pos = "<?php echo $player4_pos; ?>";
            var player1_color = "<?php echo $player1_color; ?>";
            var player2_color = "<?php echo $player2_color; ?>";
            var player3_color = "<?php echo $player3_color; ?>";
            var player4_color = "<?php echo $player4_color; ?>";
            var game_started = "<?php echo $game_started; ?>";
            var rollnum = "<?php echo $roll; ?>";
            var whose_turn = "<?php echo $_SESSION['whose_turn']; ?>";
            var user_player_num = "<?php echo $user_player_num; ?>";
            var remainingRollCount = "<?php echo $_SESSION['countremaining']; ?>";
            

            if(game_started == "1"){
                x.getElementById("gameBoard").style.display = "flex";
                x.getElementById("rollDisplay");
            }
            
            x.getElementById("rollDisplay").innerHTML = "Dice number: " + rollnum + " remaining: " + remainingRollCount;
            
            if(user_player_num == whose_turn && game_started == "1"){
                const form = document.getElementById('rolldiceform');
                form.style.display = 'block';
            }




            //the collection is of the game pieces contained in the  at the playeer's position
            const player1space = x.getElementById(player1_pos).children;
            //I can then specify a specific game piece on that space to be turned visible
            player1space[0].style.visibility = "visible";
            player1space[0].className = "gamepiece "+player1_color+"piece";
            if (player2_color != ""){
                const player2space = x.getElementById(player2_pos).children;
                player2space[1].style.visibility = "visible";
                //i can make as many color options as I want now
                player2space[1].className = "gamepiece "+player2_color+"piece";
            }

            if (player3_color != ""){
                const player3space = x.getElementById(player3_pos).children;
                player3space[2].style.visibility = "visible";
                player3space[2].className = "gamepiece "+player3_color+"piece";
            }

            if (player4_color != ""){
                const player4space = x.getElementById(player4_pos).children;
                player4space[3].style.visibility = "visible";
                player4space[3].className = "gamepiece "+player4_color+"piece";
            }
            
        }
        


    </script>
<?php
include('footer.php');
?>