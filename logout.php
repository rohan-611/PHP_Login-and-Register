<?php 
session_start();
    if($_SESSION['email']){
        session_destroy();
        header('Location: /Login_signup/login.php');
    }else{
        header('Location: /Login_signup/login.php');
    }
?>
