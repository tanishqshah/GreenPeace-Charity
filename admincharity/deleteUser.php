<?php 

require "partials/_dbconnect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $query = "DELETE FROM users WHERE id='$id'";
    $out = mysqli_query($conn, $query);
    if($out){
        echo "<script>alert('Record Successfully Deleted');</script>";
        header("location: users.php");  
    } else{
        echo "Something went wrong ".mysqli_error($conn);
    }
} else{
    echo "Something went wrong";
}

?>