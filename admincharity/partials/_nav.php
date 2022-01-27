<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!=true){ 
    $isLoggedIn = false;
} else{
    $user = $_SESSION['username'];
    $isLoggedIn = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/_nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<div class="header">
        <div class="svg">
            <img src="./Assets/GreenPeace.svg" alt="GreenPeace">
        </div>

        <div class="heading">
            <p>GreenPeace</p>
        </div>
    </div>
    <nav class="navbar">
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul id="main-comps">
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="Requests.php">Requests</a></li>
                <li><a href="All_Charity.php" id="a03">All Charities</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </div>
        <div class="brand-title"><select name="admin" id="admin" style="width: 100%; margin: 0px;">
                <option>ADMIN</option>
                <option value="logout.php">Logout</option>
            </select>
        </div>
    </nav>
    <script>
        const x = document.getElementById("admin");
        x.addEventListener("change",()=>{
            alert("Thank You for using our portal :)");
            window.location.href=x.options[x.selectedIndex].value;
        });
    </script>
</body>
</html>


