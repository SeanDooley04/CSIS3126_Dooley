<?php 
    include("global.php");
    include("header.php");
    $pin = $_GET['pin'];
    
?>
<p><a href='create_account.php?pin=<?php echo $pin; ?>'>Create a new account</a><br />
<a href='login.php?pin=<?php echo $pin; ?>'>Login</a></p><br />

