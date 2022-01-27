
<!-- INSERT INTO `donors` (`d_id`, `d_name`, `d_amount`, `d_purpose`, `d_date`, `d_addr`, `d_cell`, `d_pay`, `d_paytype`, `founder`, `u_name`) VALUES (NULL, 'Yash', '10000', 'ABC', current_timestamp(), 'Delhi', '9811819888', 'PAID', 'CHECK', 'ABC', 'XYZ'); -->
<?php
require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $d_name = $_POST['d_name'];
    $username = $_POST['username'];
    $d_amount = $_POST['amount'];
    $d_addr = $_POST['address'];
    $d_cell = $_POST['cell_no'];
    $d_pay = $_POST['payment'];
    $d_paytype = $_POST['pay_type'];
    $founder = $_POST['founder'];
    $purpose = $_POST['d_purpose'];
    $sql = "INSERT INTO `donors` (`d_name`, `d_amount`, `d_purpose`, `d_date`, `d_addr`, `d_cell`, `d_pay`, `d_paytype`, `founder`, `u_name`) VALUES ('$d_name', '$d_amount', '$purpose',current_timestamp(), '$d_addr', '$d_cell', '$d_pay', '$d_paytype', '$founder', '$username')";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        print_r("<h4>Something Went Wrong </h4>".mysqli_error($conn));
    } else{
        echo("<script>Thank you. You application for new charity has been successfully submitted. :)</script>");
        header("location: history.php");
    }

}


?>