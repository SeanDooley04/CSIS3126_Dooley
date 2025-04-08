<?php
    include("header.php");
    if (isset($_GET['pin'])){
        $pin = $_GET['pin'];
    }
?>
    <form action="create_account_process.php" method="POST">
        <div style="color: red;">
            <?php echo $errormessage; ?>
        </div>
        <!--pass the game pin to create_account_process -->
        <input type="hidden" name="pin" value="<?php echo $pin; ?>" >
        Username: <input type="text" name="username" value="<?php echo htmlspecialchars($_POST["username"], ENT_QUOTES);?>"><br />
        Email Address: <input type="email" name="user_email" value="<?php echo htmlspecialchars($_POST["user_email"], ENT_QUOTES);?>"><br />
        Password: <input type="text" name="user_password" value="<?php echo htmlspecialchars($_POST["user_password"], ENT_QUOTES);?>"><br />
        <input type="submit" value="Save new email and password">
    </form>
<?php
    include("footer.php");
?>

    