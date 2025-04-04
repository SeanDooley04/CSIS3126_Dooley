<?php
    include("global.php");
    include("header.php");

    if(!isset($_SESSION['user_id'])){
        echo"<p><a href='create_account.php'>Create a new account</a><br />";
        echo"<a href='login.php'>Login</a></p><br />";
    }
    else{
       
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($connection,"select username from users where user_id ='$user_id'");
        $user_row = mysqli_fetch_assoc($result);
        $username = $user_row['username'];
        echo"<p>Hello, $username</p><br />";
        echo"<p><a href='logout.php'>Logout</a></p><br />";
        
    }
?>
<!-- -->
<p><a href='start_game.php'>Start Game</a></p><br>
<!-- -->
<p><a href="create_game.php">Create Game</a></p><br>
<p><a href='game_setup.php'>Setup Game</a></p><br>
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