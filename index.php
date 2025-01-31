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
    
}
else{
    echo"Hello '$user_email'<br />";
    
}

?>