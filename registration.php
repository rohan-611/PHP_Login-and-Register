<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php

        include('dbconnect.php');

        if(isset($_POST['submit'])){
            $email =  $_POST["email"];
            $password =  $_POST["password"];
            $class =  $_POST["class"];
            $name =  $_POST["name"];
            $phonenumber =  $_POST["phonenumber"];
            $gender = $_POST["gender"];

            if(isset($_FILES["file"])){
                $propic = $_FILES["file"];
                $propic_name = $propic['name'];
                $propic_tmpname = $propic['tmp_name'];
                $propic_size = $propic['size'];
                $propic_type = $propic['type'];
                $tmp = explode('.',$propic_name);
                $propic_ext = strtolower(end($tmp));
                $extallowed = array('jpg','jpeg','png');

                if(in_array($propic_ext,$extallowed)){
                    if($propic_size < 2097152){
                        $uploadto = '../ ../home/rohan/pictures/'.$propic_name;
                        move_uploaded_file($propic_tmpname,$uploadto);
                        header('Location : /Login_signup/success.php');
                    }
                }else{
                    echo "Wrong File Format!!!";
                }
            }


            if(isset($_POST['sports'])){
                $hobb[] = $_POST['sports'];
            }
            if(isset($_POST['reading'])){
                $hobb[] = $_POST['reading'];
            }
            if(isset($_POST['swimming'])){
                $hobb[] = $_POST['swimming'];
            }
            if(isset($_POST['drawing'])){
                $hobb[] = $_POST['drawing'];
            }
                        
            $hobbies = implode(";",$hobb);
            $sql = "INSERT INTO registration (studentname, class, pswd, email, phonenumber, gender, hobbies)
                        VALUES('$name','$class','$password','$email','$phonenumber','$gender','$hobbies')";
            $db->exec($sql);
            
        }
        
    ?>

    <div class="login-page">
        <form class="form" action="registration.php" method="POST" enctype=multipart/form-data>
            <h1>Register!</h1>
            <label><input type="text" name="name" placeholder="Name"/></label>
            <label> <input type="email" name="email" placeholder="Email"></label>
            <label><input type="text" name="class" placeholder="Class"></label>
            <label><input type="password" name="password" placeholder="Password"/></label>
            <label><input type="text" name="phonenumber" placeholder="Phone Number"/></label>
            <p>Gender</p>
            <label class="rd"><input type="radio"name="gender" value="Male">Male</label>
            <label class="rd"><input type="radio"name="gender" value="Female">Female</label>
            <label class="rd"><input type="radio"name="gender" value="Other">Other </label>
            <p>Hobbies</p>
            <label class="ck"><input type="checkbox" name="sports" value="Sports">Sports </label>
            <label class="ck"><input type="checkbox" name="reading" value="Reading">Reading </label>
            <label class="ck"><input type="checkbox" name="swimming" value="Swimming">Swimming </label>
            <label class="ck"><input type="checkbox" name="drawing" value="Drawing">Drawing </label>
            <label class="propic">Upload image<input type="file" name='file'></label>
            <label><button type="submit" name="submit">Register</button>
            <label><p class="message">Already registered? <a href="login.php">Log In</a></p>
        </form>
    </div>

</body>