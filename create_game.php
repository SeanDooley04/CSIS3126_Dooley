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

    //show the PIN to the user
    echo"<h1>Your Game Pin: $pin</h1><br>";
    //let the user select a color for their gamepiece
    echo"<p><a href='select_color.php?pin=$pin'>Select a color</a></p>";

?>
<style>
    a{
        width:80vw;
        margin: 10vw;
    }
</style>
   