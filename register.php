<?php 
    session_start();

    include("config.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['mail'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) 
        {
            $query = "INSERT INTO loginform (fname, lname, email, pass) VALUES ('$firstname', '$lastname', '$email', '$password')";

            mysqli_query($con, $query);

            echo"<script type='text/javascript'> alert('Successfully Register') </script>";
        } else {
            echo"<script type='text/javascript'> alert('Please Enter some Valid Information') </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Links-->
    <link rel="stylesheet" href="STYLE/register.css">

    <!--Title Form-->
    <title>Ecommerce Login</title>
</head>
<body>
    <!--Main Form-->
    <div id="form-login">
        <h1>Sign Up</h1>
        <!--Login Form-->
        <form action="" method="POST">
            <input type="text" name="fname" placeholder="Firstname" required/> 
            <input type="text" name="lname" placeholder="Lasrtname" required/> 
            <input type="email" name="mail" placeholder="Email" required/> 
            <input type="password" name="password" placeholder="Password" required/>
            <button name="submit">Submit</button>
            <p>Already have an Account?<a href="login.php">SignIn Here</a></p>
        </form>
    </div>
</body>
</html>