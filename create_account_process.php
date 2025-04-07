<?php



include("global.php");



$user_email = mysqli_real_escape_string($connection, $_POST["user_email"]);
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$user_password = mysqli_real_escape_string($connection, $_POST["user_password"]);
$user_emails_list = mysqli_query($connection, "select user_email from users");
$user_logged_in = 1;

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

while($database_email = mysqli_fetch_assoc($user_emails_list)){
    if ($database_email["user_email"] == $user_email)
        $errormessage .= "email has already been used<br />";
}


if ($errormessage != "") {
    include("create_account.php");
    die();
}

$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
mysqli_query($connection, "insert into users (user_email,user_password_hash,username) values ('$user_email','$user_password_hash','$username')");
$user_result = mysqli_query($connection, "select * from users where user_email = '$user_email'");


$user_row = mysqli_fetch_assoc($user_result);

$user_id = $user_row["user_id"];
$_SESSION['user_id'] = $user_id;

if (isset($_GET['pin'])){
    $pin = $_GET['pin'];
    header("location: select_color.php?pin=$pin");
}else{
    header("location: index.php");
}
?>