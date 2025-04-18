<?php
    include("header.php");
    if($pin == ""){
        $pin = $_GET['pin'];
    }
    
?>


<form action="game_setup_process.php" method="POST">
    <div style="color: red;">
        <?php echo $errormessage; ?>
    </div>
    <!--pass the game pin to create_account_process -->
    <input type="hidden" name="pin" value="<?php echo $pin; ?>" >

    <p>Choose a turn limit for how long the game should last: </p>
    
    <input type="radio" id="15" name="turn_limit" value="15">
    <label for="15">15 turns</label><br>
    
    <input type="radio" id="20" name="turn_limit" value="20">
    <label for="20">20 turns</label><br>

    <input type="radio" id="25" name="turn_limit" value="25">
    <label for="25">25 turns</label><br>

    <input type="radio" id="30" name="turn_limit" value="30">
    <label for="30">30 turns</label><br>

    <input type="radio" id="40" name="turn_limit" value="40">
    <label for="40">40 turns</label><br>

    <input type="radio" id="50" name="turn_limit" value="50">
    <label for="50">50 turns</label><br>
    
    <input type="submit" value="Continue">
</form>
