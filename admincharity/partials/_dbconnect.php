<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "project_1";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Something went wrong not able to connect".mysqli_connect_error());
}

?>