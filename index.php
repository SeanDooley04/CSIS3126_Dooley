



<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        $logged_in = 0;
    }
    else{
        $logged_in = 1;
        $user_email = $_SESSION['user_login'];
    }

    include("header.php");
    include("global.php");




    if ($logged_in == 0){
        echo"<a href='create_account.php'>Create a new account</a><br />";
        echo"<a href='login.php'>Login</a><br />";
        
    }
    else{
        echo"Hello '$user_email'<br />";
        echo"<a href='logout.php'>Logout</a><br />";
        
    }

?>
<h1>Game Instructions </h1>
<p>
-	at the start of the game each player rolls a dice to see who moves first, the highest number goes first<br /> 
-	after each player has had a turn the players must answer a random trivia question. Whoever selects the correct answer first gets 4 coins, second gets 3 coins, third gets 2 coins, you get 0 for an incorrect answer.<br/>
-	Coins can be spent at the shop for items that can help you<br />
-	Players can also spend 20 coins to buy a star <br />
-	After someone buys a star it moves to another random space on the board<br />
-	At certain intersections the player can choose between multiple paths<br />
-	Landing on red spaces takes away 3 coins<br />
-	Landing on a blues space gives you 3 coins<br />
-	The player with the most stars at the end of the game wins<br />
</p>

</body>
</html>