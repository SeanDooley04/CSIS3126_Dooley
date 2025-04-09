<?php
    //this page is for when the game link is copied and pasted into the url
    include("global.php");
    include("header.php");

    //get the gamePIN from the URL
    $pin = $_GET['pin'];

    //checks if the user was previously logged in 
    if(isset($_SESSION['user_id'])){
        //get the id's of the players in the game at the specified pin
        $gamestate_query = mysqli_query($connection,"select * from gamestate where game_PIN = '$pin'");
        $gamestate = mysqli_fetch_assoc($gamestate_query);
        $player1_id = $gamestate["player1_id"];
        $player2_id = $gamestate["player2_id"];
        $player3_id = $gamestate["player3_id"];
        $player4_id = $gamestate["player4_id"];
        $user_id = $_SESSION['user_id'];
        
        if($user_id == $player1_id or $user_id == $player2_id or $user_id == $player3_id or $user_id == $player4_id){
            //if the user is logged in and they were previously in this game let them back in
            header("location: game_page.php?pin=$pin");
        }
        else{
            //if the user is logged in but not already in this game select a color
            header("location: select_color.php?pin=$pin");
        }
    }
?>
<!--if the user is not logged in direct them to log in or create an account-->
<p><a href='create_account.php?pin=<?php echo $pin; ?>'>Create a new account</a><br />
<a href='login.php?pin=<?php echo $pin; ?>'>Login</a></p><br />