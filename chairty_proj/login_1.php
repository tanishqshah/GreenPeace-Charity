<?php 

require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * from users WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);
    if($num>0){
        $row = mysqli_fetch_assoc($res);
        if($row['password']==$password){
            $login = true;
            session_start();
            $_SESSION['loggedIn']=true;
            $_SESSION['username']=$username;
            header("location: landing-page.php");
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else{
        echo "<script>alert('Please make sure you have signed up!')</script>";
    }


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login_1.css">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="hight=device-hight">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div id="page">
<img id="logo" src="GreenPeace.svg" alt="logo">
<div id="container">

    <h1>Login</h1>

    <div id="form">
        <form action="/chairty_proj/login_1.php" method="post">

        <label for="username">Username <font color='red'>*</font></label>
        <input type="text" class="text" name="username" placeholder="Username" required><br><br>
        
        <label for="password">Password <font color='red'>*</font></label>
        <input type="password" class="text" name="password" placeholder="Password" required><br><br>

        <button type="submit" id="button" value="Submit">Submit</button>

        </form>
        <p>Admin Login <a href="/admincharity/Login_admin.php">Here!</a> | New user <a href="/chairty_proj/signup.php">Signup</a></p>
    </div>
</div>
</div>
</body>
</html>