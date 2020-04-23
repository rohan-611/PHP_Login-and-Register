<?php
    
    $ds = "mysql:host=localhost;dbname=Student";
    $username = "root";
    $password = "";
    try{
        $GLOBALS['db'] = new PDO($ds, $username, $password);
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }    
?>