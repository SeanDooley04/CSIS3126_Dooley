<?php
include("header.php");
if (isset($_GET['pin'])){
    $pin = $_GET['pin'];
    $pinURL = "?pin=".$pin; 
}
?>
    <form action="login_process.php<?php echo $pinURL; ?>" method="POST">
        <div style="color: red;">
            <?php echo $errormessage; ?>
        </div>
        
        <!--input type = hidden name PIN value = php echp pin -->
        
        Email Address: <input type="email" name="user_email" value="<?php echo htmlspecialchars($_POST["user_email"], ENT_QUOTES);?>"><br />
        Password: <input type="text" name="user_password" value="<?php echo htmlspecialchars($_POST["user_password"], ENT_QUOTES);?>"><br />
        <input type="submit" value="Login">
    </form>
<?php
    include("footer.php");
?>