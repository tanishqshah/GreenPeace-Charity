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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="svg">
            <img id='logo' src="GreenPeace.svg" alt="GreenPeace">
        </div>

        <div class="heading">
            <p>GreenPeace</p>
        </div>
    </div>

    <nav class="navbar" id="cool">
        <a href="#"  href="javascript:void(0);" function="classy(); " class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul id="main-comps">
                <li><a href="community.php">Community</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="landing-page.php" id="a03">Raise Funds</a></li>
                <li><a href="chardonated.php">Donations</a></li>
            </ul>
        </div>
        <div class="brand-title">
            <div class="user-title"><select name="user" id="user" style="width: 100%; margin: 0px;">
                <option>
                <?php
                if($isLoggedIn){
                    echo "<strong>$user</strong>"; 
                } else{
                    echo "USER";
                }?> </option>
                <?php
                    if($isLoggedIn){
                        print_r("
                            <option value='logout.php'>Logout</option>
                        ");
                    }
                ?>
            </select></div>
        </div>
    </nav>
    <script>
        const x = document.getElementById("user");
        x.addEventListener("change",()=>{
            alert("Thank You for using our portal :)");
            window.location.href=x.options[x.selectedIndex].value;
        });
        function classy() {
            var x = document.getElementById("cool");
            console.log("Hello");
            if (x.className === "navabar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
</body>
</html>


