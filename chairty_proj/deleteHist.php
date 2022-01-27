<?php 

require "partials/_dbconnect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $query = "DELETE FROM donors WHERE d_id='$id'";
    $out = mysqli_query($conn, $query);
    if($out){
        echo "Hello";
        header("location: history.php");
        alert("Record Successfully Deleted");
    } else{
        echo "Something went wrong ".mysqli_error($conn);
    }
} else{
    echo "Something went wrong";
}

?>