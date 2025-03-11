
<?php
    include('header.php');
    include('global.php');
?>
<p><a href='index.php'>Home</a></p>
<style>
    
    
    .gameBoard{
        
        margin: 0 auto;
        display: flex;
        justify-content: center;


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
    .toprightcorner{
        background-image: url("images/board/toprightcorner.jpg");
        
    }
    .topsplitpath{
        background-image: url("images/board/topsplitpath.jpg");
        
    }
    .topleftcorner{
        background-image: url("images/board/topleftcorner.jpg");
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
    
    
    
    
</style>
    
    <div class="gameBoard">
        
        <class="flex-container">

            <div class="row row1">
                <!--each space on the board has 4 of the gamepieces invisible by default 
                -->

                <div class="flex-box toprightcorner" id="1">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box gray" id="2">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                
                <div class="flex-box red" id="3">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="4">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box gray" id="5">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box red" id="6">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box topsplitpath" id="7">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box gray" id="8">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box red" id="9">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="10">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box gray" id="11">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="12">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box topleftcorner" id="13">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                

            </div>
            <div class="column">
                <div class="row row2">
                    <div class="flex-box red" id="14">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="15">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="16">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="17">
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
                </div>
                <div class="row row3">
                    <div class="flex-box blue" id="19">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="20">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="21">
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
                </div>
                <div class="row row 4">
                    <div class="flex-box red" id="24">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="25">
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
                    <div class="flex-box red" id="27">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="28">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>

                </div>
            </div>
            <div class="row row5">
                <div class="flex-box middleleftcorner" id="29">
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
                <div class="flex-box gray" id="31">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box red" id="32">
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
                <div class="flex-box gray" id="34">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box centersplitpath" id="35">
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
                <div class="flex-box gray" id="37">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box red" id="38">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="39">
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
                <div class="flex-box downarrow" id="41">
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
                    <div class="flex-box blue" id="43">
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
                    <div class="flex-box red" id="45">
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
                </div>
                <div class="row row7">
                    <div class="flex-box blue" id="47">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="48">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="49">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="50">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="51">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                </div>
                <div class="row row8">
                    <div class="flex-box red" id="52">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box blue" id="53">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="54">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box red" id="55">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                    <div class="flex-box gray" id="56">
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                        <div class="gamepiece"></div>
                    </div>
                </div>
            </div>
            <div class="row row9">
                <div class="flex-box bottomleftcorner" id="57">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="58">
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
                <div class="flex-box leftupsplitpath" id="63">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="64">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box gray" id="65">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box red" id="66">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box blue" id="67">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box gray" id="68">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
                <div class="flex-box bottomrightcorner" id="69">
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                    <div class="gamepiece"></div>
                </div>
            </div>
            
        </div>
        
        
    </div>
    
    <p><button onclick="startGame()">start game</button></p>
    

    <?php //I couldn't get an html button to run a php function so I'm using this as a work around
        if(array_key_exists('resetbutton', $_POST)) {
            resetGame($connection);
        }
    
    ?>
    
    <form method="post">
        <input type="submit" name="resetbutton" class="button" value="Reset Button" />
    </form>

    

    <div class="diceroll">
        <p id="rollDisplay"></p>
        <p><button id="dicerollButton" class = "dicerollButton" onclick="rollDice()">Roll dice!</button></p>
        
        
    </div>
    <?php
    //fetches the gamestate from the database
    $gamestate_query = mysqli_query($connection, "select * from gamestate");

    $gamestate = mysqli_fetch_assoc($gamestate_query);
    
    
    
    $player1_pos = $gamestate["player1_pos"];
    $player2_pos = $gamestate["player2_pos"];
    $player3_pos = $gamestate["player3_pos"];
    $player4_pos= $gamestate["player4_pos"];
    $player1_color = $gamestate["player1_color"];
    $player2_color = $gamestate["player2_color"];
    $player3_color = $gamestate["player3_color"];
    $player4_color = $gamestate["player4_color"];
    //gets player1's color from the query
    
    
    function resetGame($connection){
        //clears the gamestate database to start a fresh game, for testing
        mysqli_query($connection, "delete from gamestate" );
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
        function rollDice() {
            document.getElementById("rollDisplay").innerHTML = Math.floor(Math.random()*7) + 1;
        }
        
        
        function startGame(){
            var x = document;
            x.getElementById("dicerollButton").style.visibility = "visible";
            x.getElementById("rollDisplay").style.visibility = "visible";
            
        
        }




    </script>
<?php
include('footer.php');
?>