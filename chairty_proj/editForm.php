<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: login_1.php");
  exit;
}

?>

<?php 
require "partials/_dbconnect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM donors WHERE d_id=$id";
    $out = mysqli_query($conn,$query);
    if($out){
        $rowN = mysqli_fetch_assoc($out);
        $d_name = $rowN['d_name'];
        $d_amount = $rowN['d_amount'];
        $d_addr = $rowN['d_addr'];
        $d_cell = $rowN['d_cell'];
        $d_pay = $rowN['d_pay'];
        $d_paytype = $rowN['d_paytype'];
        $founder = $rowN['founder'];
        $purpose = $rowN['d_purpose'];
        $user = $_SESSION['username'];
    } else{
        echo "Some Error Occured".mysqli_error($conn);
    }
} else{
    header("location: community.php");
} 
?>

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
    $sql = "UPDATE `donors` SET d_name = '$d_name', d_amount = '$d_amount',d_addr='$d_addr',d_cell='$d_cell',d_pay='$d_pay',d_paytype='$d_paytype',founder='$founder',d_purpose='$purpose' WHERE `donors`.`d_id` = $id; ";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        print_r("<h4>Something Went Wrong </h4>".mysqli_error($conn));
    } else{
        echo("<script>Updated</script>");
        header("location: history.php");
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="donate.css">
    
    <title>EDIT DONATION</title>
</head>
<body>
    <?php require "partials/_nav.php"; ?>
    <div class="add-charity">
        <h1 style="margin-left: 37%; margin-bottom: 10px; padding: 10px;box-shadow: 2px 2px 4px black ;background-color: aqua; border: 1px solid black; width: fit-content; border-radius: 20px;">EDIT DONATION</h1>
        <form action="" autocomplete="off" id="charityFrm" method="POST">
            <input type="hidden" name="username" value='<?php echo $user; ?>'>
            <table style="border-spacing: 0 15px;">
                <tr>
                    <td><label for="name"><strong>Donor Name</strong></label></td>
                    <td><input type="text" placeholder="Enter name" name="d_name" maxlength="40" required value='<?php echo $d_name; ?>' ></td>    
                </tr>
                <tr>
                    <td><label for="amount"><strong>Amount</strong></label></td>
                    <td><input type="number" placeholder="Enter amount" name="amount" maxlength="20" required value='<?php echo $d_amount; ?>' ></td>
                </tr>
                <tr>
                    <td><label for="address"><strong>Address</strong></label></td>
                    <td><input type="text" placeholder="Enter address" name="address" maxlength="50" required value='<?php echo $d_addr; ?>' ></td>
                </tr>
                <tr>
                    <td><label for="cell_no"><strong>Contact Number</strong></label></td>
                    <td><input type="text" placeholder="Enter you contact number" name="cell_no" maxlength="10" id="cell_no" required value='<?php echo $d_cell; ?>' ></td>
                </tr>
                <tr>
                    <td><label for="payment"><strong>Payment</strong></label></td>
                    <td><select name="payment" id="payment" required style="width: 60%;">
                        <option value="">SELECT</option>
                        <option value="Paid">Pay Now</option>
                        <option value="Unpaid">Pay Later</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="pay_type"><strong>Payment Type</strong></label></td>
                    <td><select name="pay_type" id="pay_type" required style="width: 60%;">
                        <option value="">SELECT</option>
                        <option>Cash</option>
                        <option>Cheque</option>
                        <option>UPI</option>
                        <option>Others</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="founder"><strong>Paying to</strong></label></td>
                    <td><input type="text" name="founder" value="<?php if($founder){ echo $founder;} else {echo "";} ?>" required readonly></td>
                </tr>
                <tr>
                    <td><label for="d_purpose" ><strong>Purpose of donation</strong></label></td>
                    <td><textarea name="d_purpose" id="d_purpose" cols="67" rows="10" readonly><?php echo $purpose; ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Edit Donation" id="submitBtn"></td>
                </tr>
            </table>
        </form>
        
    </div>
    <script>
        function checkCred(){
            const payment = document.getElementById("pay_type");
            const paytype = document.getElementById("payment");
            const contact_no = document.getElementById("cell_no");
            let paymentIndex = payment.selectedIndex;
            let paytypeIndex = paytype.selectedIndex;
            if(paymentIndex==0 || paytype==0){
                console.log(uindex)
                alert("Please select a value");
                return false;
            }
            const reg = /^[0-9]{10}$/;
            if(!reg.test(contact_no.value)){
                alert("The phone number should have 10 digits (0-9)")
                return false;
            }
            alert("Thank you for your Donation! :)");
            return true;
        }
    </script>
    <script>
        $("#a03").removeAttr('id');
    </script>
</body>
</html>