<?php
    include("header.php");
    include("global.php");
?>
    <form action="game_setup_process.php" method="POST">
        <div style="color: red;">
            <?php echo $errormessage; ?>
        </div>
        
        <p>Select a game piece color: </p>
        <input type="radio" id="lightblue" name="color" value="lightblue">
        <label for="lightblue">Light Blue</label><br>
        <input type="radio" id="pink" name="color" value="pink">
        <label for="pink">Pink</label><br>
        <input type="radio" id="green" name="color" value="green">
        <label for="green">Green</label><br>
        <input type="radio" id="white" name="color" value="white">
        <label for="white">White</label><br>
        <input type="submit" value="Submit">

    </form>