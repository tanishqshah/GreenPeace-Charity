<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: login_1.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="community.css">
    
</head>
<body>
   <?php require "partials/_nav.php"; ?>
    <div class="row-grid">
        <?php 
        require "partials/_dbconnect.php";
        $query = "SELECT * FROM `charities`";
        $out = mysqli_query($conn, $query);
        $num = mysqli_num_rows($out);
        if($num>0){
            while($row = mysqli_fetch_assoc($out)){
                print_r("
                <div class='cards'>
                    <div class='blog-post'>
                        <div class='blog-post-img'>
                            <img src='./images/{$row['cover']}'>
                        </div>
                        <div class='blog-post-info'>
                            <div class='blog-post-date'>
                                <span style='color: purple;'>
                                    {$row['founder']}
                                </span>
                            </div>
                            <h1 class='title'>{$row['name']}</h1>
                        
                            <p class='text'>{$row['purpose']}</p>
                            <form action='donate.php?id={$row['id']}' method='get'>
                                <input type='text' name='id' value='{$row['id']}' hidden>
                                <button class='cta' style='cursor: pointer; padding: 1rem'>Donate</button>
                            </form>
                        </div>
                    </div>
                </div>
                ");
            }

        }
        ?>
    </div>

    <div class="copyright">
        &copyGPfoundations, 2021
     </div>
     <script>
        $('#a03').removeAttr('id');
        $('.navbar-links ul#main-comps li:nth-child(1) a').attr('id','a03');
     </script>
     
</body>
</html>