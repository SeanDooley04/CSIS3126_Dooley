
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
                
                <div class="flex-box toprightcorner" id="space1">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space2">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                
                <div class="flex-box red" id="space3">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space4">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space5">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box red" id="space6">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box topsplitpath" id="space7">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space8">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box red" id="space9">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space10">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space11">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space12">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box topleftcorner" id="space13">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                

            </div>
            <div class="column">
                <div class="row row2">
                    <div class="flex-box red" id="space14">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box blue" id="space15">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space16">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space17">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space18">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                </div>
                <div class="row row3">
                    <div class="flex-box blue" id="space19">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space20">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space21">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space22">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space23">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                </div>
                <div class="row row 4">
                    <div class="flex-box red" id="space24">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box blue" id="space25">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space26">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space27">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space28">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>

                </div>
            </div>
            <div class="row row5">
                <div class="flex-box middleleftcorner" id="space29">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space30">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space31">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box red" id="space32">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space33">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space34">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box centersplitpath" id="space35">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space36">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space37">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box red" id="space38">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space39">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space40">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box downarrow" id="space41">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
            </div>
            <div class="column">
                <div class="row row6">
                    <div class="flex-box red" id="space42">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box blue" id="space43">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space44">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space45">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space46">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                </div>
                <div class="row row7">
                    <div class="flex-box blue" id="space47">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space48">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space49">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space50">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space51">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                </div>
                <div class="row row8">
                    <div class="flex-box red" id="space52">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box blue" id="space53">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space54">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box red" id="space55">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                    <div class="flex-box gray" id="space56">
                        <div class="gamepiece lightbluepiece"></div>
                        <div class="gamepiece pinkpiece"></div>
                        <div class="gamepiece greenpiece"></div>
                        <div class="gamepiece whitepiece"></div>
                    </div>
                </div>
            </div>
            <div class="row row9">
                <div class="flex-box bottomleftcorner" id="space57">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space58">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space59">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box red" id="space60">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space61">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space62">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box leftupsplitpath" id="space63">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space64">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space65">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box red" id="space66">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box blue" id="space67">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box gray" id="space68">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
                <div class="flex-box bottomrightcorner" id="space69">
                    <div class="gamepiece lightbluepiece"></div>
                    <div class="gamepiece pinkpiece"></div>
                    <div class="gamepiece greenpiece"></div>
                    <div class="gamepiece whitepiece"></div>
                </div>
            </div>
            
        </div>
        
        
    </div>
    
    <p><button onclick="startGame()">start game</button></p>
    
    <?php 
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
    $gamestate_query = mysqli_query($connection, "select * from gamestate");
    $gamestate = mysqli_fetch_assoc($gamestate_query);
    $player1_pos = "space";
    $player1_pos = $player1_pos . $gamestate["player1_pos"];
    
    $player1_color = $gamestate["player1_color"];
    
    function resetGame($connection){
        mysqli_query($connection, "delete from gamestate" );
    }

    


    ?>


    <script>
        function rollDice() {
            document.getElementById("rollDisplay").innerHTML = Math.floor(Math.random()*7) + 1;
        }
        
        
        function startGame(){
            var x = document;
            var player1_pos = "<?php echo $player1_pos; ?>";
            const collection = x.getElementById(player1_pos).children;
            
            collection[1].style.visibility = "visible";
            /*
            x.getElementById("g2").style.visibility = "visible";
            x.getElementById("b2").style.visibility = "visible";
            x.getElementById("p2").style.visibility = "visible";
            */
            x.getElementById("dicerollButton").style.visibility = "visible";
            x.getElementById("rollDisplay").style.visibility = "visible";
            
        
        }




    </script>
<?php
include('footer.php');
?>