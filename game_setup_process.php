<?php
include("header.php");
include("global.php");

$user_color = $_POST["color"];
$gamestate_query = mysqli_query($connection,"select * from gamestate");
$gamestate = mysqli_fetch_assoc($gamestate_query);
$player1color = $gamestate["player1_color"];
$player2color = $gamestate["player2_color"];
$player3color = $gamestate["player3_color"];
$player4color = $gamestate["player4_color"];


$errormessage = "";

if($user_color == $player1color or $user_color == $player2color or $user_color == $player3color or $user_color == $player4color){
    $errormessage .= "color has already been used<br>";
}

$user_player_num = 0;

if(is_null($gamestate["player1_uname"])){
    $user_player_num = 1;
    $username = "guest1";
}elseif(is_null($gamestate["player2_uname"])){
    $user_player_num = 2;
    $username ="guest2";
}elseif(is_null($gamestate["player3_uname"])){
    $user_player_num = 3;
    $username = "guest3";
}elseif(is_null($gamestate["player4_uname"])){
    $user_player_num = 4;
    $username = "guest4";
}else{
    $errormessage .= "game is full";
}



if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $user_query = mysqli_query($connection, "select username from users where user_id = '$user_id'");
    $user_row = mysqli_fetch_assoc($user_query);
    $username = $user_row["username"];
}




    


if($errormessage != "") {
    include("game_setup.php");
    die();
}

if($user_player_num == 1){
    mysqli_query($connection, "insert into gamestate(player1_uname, player1_color) values ('$username', '$user_color')");
}elseif($user_player_num == 2){
    mysqli_query($connection, "UPDATE gamestate set player2_uname ='$username' , player2_color = '$user_color'");
}elseif($user_player_num == 3){
    mysqli_query($connection, "UPDATE gamestate set player3_uname ='$username' , player3_color = '$user_color'");
}elseif($user_player_num == 4){
    mysqli_query($connection, "UPDATE gamestate set player4_uname ='$username' , player4_color = '$user_color'");
}



header("location: start_game.php");
?>

