<?php 

require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];
    $ins = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
    $res = mysqli_query($conn, $ins);
    if(!$res){
        print_r("<h4>Something Went Wrong</h4>");
    }
    else{
        header("location: login_1.php");
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="hight=device-hight">
</head>
<body>
<div id="page">
<img id="logo" src="GreenPeace.svg" alt="logo">
<div id="container">

    <h1>Signup</h1>

    <div id="form">
        <form action="/chairty_proj/signup.php" name='createAccount' method="post" onsubmit="return validate();">
        
        <label for="username">Username<font color='red'>*</font></label>
        <input type="text" class="text" name="username" placeholder="Username" required><br>
            
        <label for="password">Password <font color='red'>*</font></label>
        <input type="password" class="text" name="password" id="pass1" placeholder="Password" required><br>

        <label for="password">Confirm Password <font color='red'>*</font></label>
        <input type="password" class="text" name="confirmPassword" id="pass2" placeholder="Confirm Password" required><br>

        <button type="submit" id="button" value="Submit"'>Create Account</button>

        </form>

    </div>

    <script>
        function validate(){
            var pass1 = document.createAccount.password.value;
            var pass2 = document.createAccount.confirmPassword.value;
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

            if(!(pass1.match(passw))){
                alert("password should be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter")
                return false;
            }
            if(pass1!=pass2){  
                alert("Confirm password must be same!");
                return false;
            }   

            return true;

   
        }
    </script>
</div>
</div>
</body>
</html>