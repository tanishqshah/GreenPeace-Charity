<?php 

require "partials/_dbconnect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM charities WHERE id='$id'";
    $out = mysqli_query($conn, $query);
    if($out){
        // echo "Hello";
        echo "<script>alert('Record Successfully Deleted');</script>";
        header("location: All_Charity.php");
    } else{
        echo "Something went wrong ".mysqli_error($conn);
    }
} else{
    echo "Something went wrong";
}

?>