<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username=='admin' && $password=='admin'){
        $login = true;
        session_start();
        $_SESSION['loggedIn']=true;
        $_SESSION['username']=$username;
        header("location: users.php");
    } else{
        echo "
        <script>alert('Invalid Credentials');</script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Login_admin.css">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="hight=device-hight">
</head>
<body>
<div id="page">
<img id="logo" src="./Assets/GreenPeace.svg" alt="logo">
<div id="container">

    <h1>Log In</h1>

    <div id="form">
        <form action="/admincharity/Login_admin.php" name='createAccount' method="post">
        
        <label for="username">Username <font color='red'>*</font></label>
        <input type="text" class="text" name="username" placeholder="Username" required><br><br>
            
        <label for="password">Password <font color='red'>*</font></label>
        <input type="password" class="text" name="password" id="pass1" placeholder="Password" required><br>

        <button type="submit" id="button" value="Submit" onclick='validate()'>Create Account</button>

        </form>

    </div>
</div>
</div>
</body>
</html>