<?php
    include("header.php");
    include("global.php");

    //generate  PIN
    $pin = rand(100000, 999999);

    //checks if there is already a game with that PIN, keep getting new PIN's until you get one that hasn't been used
    $gamestate = mysqli_query($connection, "select game_PIN from gamestate where game_PIN = '$pin'");
    while(mysqli_fetch_assoc($gamestate) != null){
        $pin = rand(100000, 999999);
        $gamestate = mysqli_query($connection, "select game_PIN from gamestate where game_PIN = '$pin'");
    }


    //create a row in the gamestate table with the generateed PIN
    mysqli_query($connection, "insert into gamestate(game_PIN) values ('$pin')");

    //show the PIN to the user
    echo"<h1>Your Game Pin: $pin</h1><br>";

    //user continues to game setup where they can choose the turn limit or other rules that may be added in the future

    echo"<p><a href='game_setup.php?pin=$pin'>Continue to game setup</a></p>";

?>
<!-- create a form to allow the user to select a turn limit for their game -->
    

<style>
    a{
        width:80vw;
        margin: 10vw;
    }
</style>
   