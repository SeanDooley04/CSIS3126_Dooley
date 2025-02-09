<?php
    session_start();
    //probably don't need to store whether a user is logged in on database
    if(session_destroy()){
        header("Location: index.php");
    }
?>