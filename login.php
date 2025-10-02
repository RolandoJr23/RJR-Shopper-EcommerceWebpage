<?php 
    session_start();

    include("config.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['mail'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) 
        {
            $query = "SELECT * FROM loginform WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result)
            {
                if ($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['pass'] == $password)
                    {
                        header("Location: home.php");
                        die;
                    }
                }
            } echo "<script type='text/javascript'> alert('Invalid Username or Password') </script>";
        } else { echo "<script type=''> alert('Invalid Username or Password') </script>"; }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Links-->
    <link rel="stylesheet" href="STYLE/login.css">

    <!--Title Form-->
    <title>Ecommerce Login</title>
</head>
<body>
    <!--Main Form-->
    <div id="form-login">
        <h1>RJR SHop</h1>
        <!--Login Form-->
        <form action="" method="POST">
            <input type="email" name="mail" placeholder="Email" required/> 
            <input type="password" name="password" placeholder="Password" required/>
            <button name="submit">Submit</button>
            <p>Not have an Account?<a href="register.php">SignUp Here</a></p>
        </form>
    </div>
</body>
</html>