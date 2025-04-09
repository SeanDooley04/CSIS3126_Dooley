<?php
include("global.php");
// get variables from POST

$user_email = mysqli_real_escape_string($connection, $_POST["user_email"]);
$user_password = mysqli_real_escape_string($connection, $_POST["user_password"]);

// if the email or password is blank display an error
$errormessage = "";
if ($user_email == ""){
    $errormessage .= "Email is required<br />";
}
if ($user_password == ""){
    $errormessage .= "Password is required<br />";
}

//query the database to get the user's hashed password and their user id
$result = mysqli_query($connection,"select * from users where user_email ='$user_email'");
$user_row = mysqli_fetch_assoc($result);

$user_password_hash = $user_row["user_password_hash"];

//check if the password is correct
if(!(password_verify($user_password, $user_password_hash))){
    $errormessage .= "Email or Password is invalid<br />";
}

// if there are any errors return to the login screen
if($errormessage != ""){
    include("login.php");
    die();
}

//assign the user id session variable using user id given by the query
$_SESSION['user_id'] = $user_row['user_id'];

//checks if there is a gamePIN set
// if so move the user to the select_color page
// if not direct them back to the home page
if ($_POST['pin'] != ""){
    $pin = $_POST['pin'];
    header("location: select_color.php?pin=$pin");
}else{
    header("location: index.php");
}
?>