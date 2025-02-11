<?php
include("header.php");
?>
    <form action="login_process.php" method="POST">
        <div style="color: red;">
            <?php echo $errormessage; ?>
        </div>
        
        
        
        Email Address: <input type="email" name="user_email" value="<?php echo htmlspecialchars($_POST["user_email"], ENT_QUOTES);?>"><br />
        Password: <input type="text" name="user_password" value="<?php echo htmlspecialchars($_POST["user_password"], ENT_QUOTES);?>"><br />
        <input type="submit" value="Login">
    </form>
<?php
    include("footer.php");
?>