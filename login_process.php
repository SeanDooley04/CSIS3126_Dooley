<?php
include("global.php");


$user_email = mysqli_real_escape_string($connection, $_POST["user_email"]);
$user_password = mysqli_real_escape_string($connection, $_POST["user_password"]);

$result = mysqli_query($connection,"select * from users where user_email ='$user_email'");
$user_row = mysqli_fetch_assoc($result);






$errormessage = "";
if ($user_email == "")
    $errormessage .= "Email is required<br />";
if ($user_password == "")
    $errormessage .= "Password is required<br />";
if (strlen($user_password) < 8)
    $errormessage .= "Password must be at least 8 characters<br />";
if(strlen($user_email)> 200)
    $errormessage .= "email must be less than 200 characters<br />";
if(strlen($user_password)> 200)
    $errormessage .= "password must be less than 200 characters<br />";



    

    
    



$user_password_hash = $user_row["user_password_hash"];
if(password_verify($user_password, $user_password_hash)){
    $_SESSION['user_id'] = $user_row['user_id'];
    if (isset($_GET['pin'])){
        $pin = $_GET['pin'];
        header("location: select_color.php?pin=$pin");
    }else{
        header("location: index.php");
    }
}else{
    $errormessage .= "Email or Password is invalid<br />";
}

if($errormessage != ""){
    include("login.php");
    die();
}



?>