<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php
        session_start();

        include("dbconnect.php");

        if(isset($_POST['email'])){
            $email =  $_POST["email"];
            $password =  $_POST["password"];
            $_SESSION['email']=$email;
            
        }

        if(isset($_SESSION['email'])){
            $sql = "SELECT pass FROM login where email = '$email'";
            $data = $db->prepare($sql);
            $data->execute();
            $data = $data->fetch(PDO::FETCH_ASSOC);
            $pass = $data['pass'];
             
            #extract($row);
            if($pass == $password){
                header('Location: /Login_signup/welcome.php');
            }
        }
    ?>

    <div class="login-page">
        <form class="form login-form" action="login.php" method="POST">
            <h1>Log In</h1>
            <input type="text" name="email" placeholder="Email"/>
            <input type="password" name="password" placeholder="Password"/>
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="registration.php"> Register!</a></p>
        </form>
    </div>

</body>

</html>
