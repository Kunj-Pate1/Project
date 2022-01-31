<?php

session_start();

if(isset($_SESSION['username']))
{
    header("location: home.html");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    

    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            header("location: home.html");
                        }
                    }
                }
    }
}    

}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins',sans-serif;
        }
        body{
        overflow: hidden;
        }
        ::selection{
        background:red;
        }
        .container{
        max-width: 440px;
        padding: 0 20px;
        margin: 170px auto;
        }
        .wrapper{
        width: 100%;
        background:#999;
        border-radius: 5px;
        box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
        }
        .wrapper .title{
        height: 90px;
        background:red;
        border-radius: 5px 5px 0 0;
        color:white;
        font-size: 30px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .wrapper form{
        padding: 30px 25px 25px 25px;
        }
        .wrapper form .row{
        height: 45px;
        margin-bottom: 15px;
        position: relative;
        }
        .wrapper form .row input{
        height: 100%;
        width: 100%;
        outline: none;
        padding-left: 60px;
        border-radius: 5px;
        border: 1px solid lightgrey;
        font-size: 16px;
        transition: all 0.3s ease;
        }
        form .row input:focus{
        border-color:red;
        box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
        }
        form .row input::placeholder{
        color: #999;
        }
        .wrapper form .row i{
        position: absolute;
        width: 47px;
        height: 100%;
        color: #fff;
        font-size: 18px;
        background:red;
        border-radius: 5px 0 0 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .wrapper form .pass{
        margin: -8px 0 20px 0;
        }
        .wrapper form .pass a{
        color:red;
        font-size: 17px;
        text-decoration: none;
        }
        .wrapper form .pass a:hover{
        text-decoration: underline;
        }
        .wrapper form .button input{
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        padding-left: 0px;
        background:red;
        cursor: pointer;
        }
        form .button input:hover{
        background:darkred;
        }
        .wrapper form .signup-link{
        text-align: center;
        margin-top: 20px;
        font-size: 17px;
        }
        .wrapper form .signup-link a{
        color:red;
        text-decoration: none;
        }
        form .signup-link a:hover{
        text-decoration: underline;
        }
        .ReZume{
                position:absolute;
                font-family:Open Sans;
                font-style:normal;
                font-weight:bold;
                font-size:40px;
        }
    </style>
</head>
<body background="bg.jpg">
    <p class="ReZume" style=" color: #6C6A6A; top: 40px; left: 40px; ">Re</p>
    <p1 class="ReZume" style="color: #ff0000; top:41px; left: 88px; ">Z</p1>
    <p2 class="ReZume" style="color:#6C6A6A; top:41px; left: 114px;">ume</p2>
    <div class="container">
        <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="" method="post">
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" required>
            </div>
        <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="row button">
            <a href="home.html"><input type="submit" value="Login"></a>
        </div>
        <div class="signup-link">Not Registered? <a href="register.php">Signup now</a></div>
        </form>
      </div>
    </div>
  </body>
</html>