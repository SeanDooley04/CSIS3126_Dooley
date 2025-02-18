
<?php
    include('header.php');
    include('global.php');
?>
<p><a href='index.php'>Home</a></p>
<style>
    
    
    .gameBoard{
        
        margin: 5vw auto;
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
        width   : 3vw;
        height  : 3vw;
        border  : 1px solid black;
        color   : black;
        display : flex;
        align-items: center;
        justify-content: center;
        background-size: 100%;
        
        
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
        background-image: url("toprightcorner.jpg");
        
    }
    .topsplitpath{
        background-image: url("topsplitpath.jpg");
        
    }
    .topleftcorner{
        background-image: url("topleftcorner.jpg");
    }
    .middleleftcorner{
        background-image: url("middleleftarrow.jpg");
    }
    .centersplitpath{
        background-image: url("centersplitpath.jpg");
    }
    .downarrow{
        background-image: url("downarrow.jpg");
    }
    .leftupsplitpath{
        background-image: url("leftupsplitpath.jpg");
    }
    .bottomleftcorner{
        background-image: url("bottomleftcorner.jpg");
    }
    .bottomrightcorner{
        background-image: url("bottomrightcorner.jpg") ;
    }
    
    
</style>
    <div class="gameBoard">
        <class="flex-container">
            <div class="row row1">
                
                <div class="flex-box toprightcorner" id="space1"></div>
                <div class="flex-box gray" id="space2"></div>
                <div class="flex-box red" id="space3"></div>
                <div class="flex-box blue" id="space4"></div>
                <div class="flex-box gray" id="space5"></div>
                <div class="flex-box red" id="space6"></div>
                <div class="flex-box topsplitpath" id="space7"></div>
                <div class="flex-box gray" id="space8"></div>
                <div class="flex-box red" id="space9"></div>
                <div class="flex-box blue" id="space10"></div>
                <div class="flex-box gray" id="space11"></div>
                <div class="flex-box blue" id="space12"></div>
                <div class="flex-box topleftcorner" id="space13"></div>
                

            </div>
            <div class="column">
                <div class="row row2">
                    <div class="flex-box red" id="space14"></div>
                    <div class="flex-box blue" id="space15"></div>
                    <div class="flex-box gray" id="space16"></div>
                    <div class="flex-box red" id="space17"></div>
                    <div class="flex-box gray" id="space18"></div>
                </div>
                <div class="row row3">
                    <div class="flex-box blue" id="space19"></div>
                    <div class="flex-box gray" id="space20"></div>
                    <div class="flex-box red" id="space21"></div>
                    <div class="flex-box gray" id="space22"></div>
                    <div class="flex-box red" id="space23"></div>
                </div>
                <div class="row row 4">
                    <div class="flex-box red" id="space24"></div>
                    <div class="flex-box blue" id="space25"></div>
                    <div class="flex-box gray" id="space26"></div>
                    <div class="flex-box red" id="space27"></div>
                    <div class="flex-box gray" id="space28"></div>

                </div>
            </div>
            <div class="row row5">
                <div class="flex-box middleleftcorner" id="space29"></div>
                <div class="flex-box blue" id="space30"></div>
                <div class="flex-box gray" id="space31"></div>
                <div class="flex-box red" id="space32"></div>
                <div class="flex-box blue" id="space33"></div>
                <div class="flex-box gray" id="space34"></div>
                <div class="flex-box centersplitpath" id="space35"></div>
                <div class="flex-box blue" id="space36"></div>
                <div class="flex-box gray" id="space37"></div>
                <div class="flex-box red" id="space38"></div>
                <div class="flex-box blue" id="space39"></div>
                <div class="flex-box gray" id="space40"></div>
                <div class="flex-box downarrow" id="space41"></div>
            </div>
            <div class="column">
                <div class="row row6">
                    <div class="flex-box red" id="space42"></div>
                    <div class="flex-box blue" id="space43"></div>
                    <div class="flex-box gray" id="space44"></div>
                    <div class="flex-box red" id="space45"></div>
                    <div class="flex-box gray" id="space46"></div>
                </div>
                <div class="row row7">
                    <div class="flex-box blue" id="space47"></div>
                    <div class="flex-box gray" id="space48"></div>
                    <div class="flex-box red" id="space49"></div>
                    <div class="flex-box gray" id="space50"></div>
                    <div class="flex-box red" id="space51"></div>
                </div>
                <div class="row row8">
                    <div class="flex-box red" id="space52"></div>
                    <div class="flex-box blue" id="space53"></div>
                    <div class="flex-box gray" id="space54"></div>
                    <div class="flex-box red" id="space55"></div>
                    <div class="flex-box gray" id="space56"></div>
                </div>
            </div>
            <div class="row row9">
                <div class="flex-box bottomleftcorner" id="space57"></div>
                <div class="flex-box blue" id="space58"></div>
                <div class="flex-box gray" id="space59"></div>
                <div class="flex-box red" id="space60"></div>
                <div class="flex-box blue" id="space61"></div>
                <div class="flex-box gray" id="space62"></div>
                <div class="flex-box leftupsplitpath" id="space63"></div>
                <div class="flex-box blue" id="space64"></div>
                <div class="flex-box gray" id="space65"></div>
                <div class="flex-box red" id="space66"></div>
                <div class="flex-box blue" id="space67"></div>
                <div class="flex-box gray" id="space68"></div>
                <div class="flex-box bottomrightcorner" id="space69"></div>
            </div>
            
        </div>
        
        
    </div>
        <p id="rollDisplay"></p>
        <p><button onclick="rollDice()">Roll dice!</button></p>
    <div>
        
    </div>

    <script>
        function rollDice() {
            document.getElementById("rollDisplay").innerHTML = Math.floor(Math.random()*7) + 1;
        }
    </script>
<?php
include('footer.php');
?>