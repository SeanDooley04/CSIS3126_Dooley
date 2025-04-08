<?php
session_start();
include("global.php");
$pin = $_GET['pin'];
$user_color = $_POST["color"];
$gamestate_query = mysqli_query($connection,"select * from gamestate where game_PIN = '$pin'");
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
}else{
    $errormessage .= "game is full";
}


// person not logged in 
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $user_query = mysqli_query($connection, "select username from users where user_id = '$user_id'");
    $user_row = mysqli_fetch_assoc($user_query);
    $username = $user_row["username"];
}




    


if($errormessage != "") {
    include("select_color.php");
    die();
}
$user_id = (string)$_SESSION['user_id'];

$next_pos = array(2);
$json_next_pos = json_encode($next_pos);

if($user_player_num == 1){
    mysqli_query($connection, "insert into gamestate(game_PIN, player1_id, player1_uname, player1_color, next_pos) values ('$pin', '$user_id', '$username', '$user_color', '$json_next_pos')");
}elseif($user_player_num == 2){
    mysqli_query($connection, "UPDATE gamestate set player2_id ='$user_id', player2_uname ='$username' , player2_color = '$user_color' where game_PIN = '$pin'");
}elseif($user_player_num == 3){
    mysqli_query($connection, "UPDATE gamestate set player3_id ='$user_id', player3_uname ='$username' , player3_color = '$user_color' where game_PIN = '$pin'");
}elseif($user_player_num == 4){
    mysqli_query($connection, "UPDATE gamestate set player4_id ='$user_id', player4_uname ='$username' , player4_color = '$user_color' where game_PIN = '$pin'");
}



$next_pos = array(58);
$json_next_pos = json_encode($next_pos);


// Encode the array into a JSON string
$jsonString = json_encode($data);

// Output the JSON string
echo $jsonString;



header("location: game_page.php?pin=". $pin);
?>

