<?php
    include("global.php");
    include("header.php");

    if(!isset($_SESSION['user_id'])){
        //if the user is not logged in let them log in or create an account
        echo"<p><a href='create_account.php'>Create a new account</a><br>";
        echo"<a href='login.php'>Login</a></p><br>";
    }
    else{
        //if the user is logged in get their username from the database
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($connection,"select username from users where user_id ='$user_id'");
        $user_row = mysqli_fetch_assoc($result);
        $username = $user_row['username'];
        //hello user message
        echo"<p>Hello, $username</p><br>";
        //let the user log out
        echo"<p><a href='logout.php'>Logout</a></p><br>";
        //let the user create a game
        echo "<p><a href='create_game.php'>Create Game</a></p><br>";
        
    }

?>
<!--I will remove this when I'm done but I'm keeping it so I can have easier access to the reset button on the game page -->
<p><a href='game_page.php'>Go to game board(for testing)</a></p><br>

<h1>Game Instructions </h1>
<!-- not every feature mentioned is implemented
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
-->
<p>
-	Turn order (player1, player2, player3, player4, back to player 1), can vary based on how many players are in the game<br>
-	The roll dice button appears when it is your turn<br>
-	Click the roll dice button to move your game piece<br>
-	You can choose a direction to go when you reach a split path<br>
-	after each player has had a turn the current turn number goes up by 1<br>
-	Landing on red spaces takes away 2 coins<br>
-	Landing on a blue space gives you 5 coins<br>
-	Players can spend 20 coins to buy a star when they reach the star space<br>
-	At certain intersections the player can choose between multiple paths<br>
-	The player with the most stars when the turn limit is reached wins<br>

</p>
</body>
</html>