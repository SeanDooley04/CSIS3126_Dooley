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
    $board_data_array = '{"1": "topleftcorner", "2": "red", "3": "blue", "4": "gray", "5": "red", "6": "gray", "7": "middleleftcorner", "8": "blue", "9": "gray", "10": "red", "11": "blue", "12": "gray", "13": "centersplitpath", "14": "blue", "15": "gray", "16": "red", "17": "blue", "18": "gray", "19": "downarrow", "20": "red", "21": "blue", "22": "gray", "23": "red", "24": "gray", "25": "bottomrightcorner", "26": "starSpace", "27": "blue", "28": "red", "29": "gray", "30": "blue", "31": "leftupsplitpath", "32": "gray", "33": "blue", "34": "red", "35": "gray", "36": "blue", "37": "bottomleftcorner", "38": "gray", "39": "red", "40": "gray", "41": "blue", "42": "red", "43": "red", "44": "gray", "45": "red", "46": "gray", "47": "blue", "48": "red", "49": "gray", "50": "red", "51": "gray", "52": "blue", "53": "topsplitpath", "54": "red", "55": "gray", "56": "blue", "57": "red", "58": "gray", "59": "gray", "60": "red", "61": "blue", "62": "gray", "63": "blue", "64": "toprightcorner", "65": "red", "66": "blue", "67": "gray", "68": "red", "69": "gray"}';

    mysqli_query($connection, "UPDATE gamestate SET board_data='$board_data_array' WHERE game_PIN = '$pin'");

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
   