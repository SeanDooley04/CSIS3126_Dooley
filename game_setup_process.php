<?php
include("global.php");

$pin = $_POST['pin'];
$turn_limit = $_POST['turn_limit'];


$errormessage = "";

if($turn_limit == ""){
    $errormessage .= "select a turn limit <br>";
}



if($errormessage != ""){
    include("game_setup.php");
    die();
}else{
    mysqli_query($connection, "UPDATE gamestate set turn_limit = '$turn_limit' where game_PIN = '$pin'");
    header("location: select_color.php?pin=" . $pin);
}





?>