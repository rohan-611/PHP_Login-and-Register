<?php
    session_start();

    if($_SESSION['email']){
        echo "Logged In";
        echo "<br>Welcome  ".$_SESSION['email'];
        echo "<br><a href='logout.php'><button>Log out</button></a>";
    }else{
        header('Location: /Login_signup/login.php');
    }
?>
