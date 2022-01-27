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
    <title>Donation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="chardonated.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
    <?php require "partials/_nav.php"; ?>
        <div class="table">
            <div class="table-content" style="overflow-x: auto;" >
                <table id="t01">
                    <thead id="head">
                        <tr>
                            <th>Donor</th>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $user=$_SESSION['username'];
                        require "partials/_dbconnect.php";
                        // $amt+=$row['d_amount'];
                        $query = "SELECT * FROM `donors` WHERE founder='$user'";
                        $out = mysqli_query($conn, $query);
                        if(!$out){
                            echo "Some issues".mysqli_error($conn);
                        }
                        $num = mysqli_num_rows($out);
                        if($num>0){
                            while($row = mysqli_fetch_assoc($out)){
                                $date1 = strtr($row['d_date'], '/', '-');
                                $date = date('Y-m-d', strtotime($date1));
                                print_r("
                                    <tr>
                                        <td>{$row['d_name']}</td>
                                        <td>{$row['d_amount']}</td>
                                        <td>{$row['d_addr']}</td>
                                        <td>{$row['d_cell']}</td>
                                        <td>{$date}</td>
                                        <td>{$row['d_pay']}</td>
                                        <td>{$row['d_paytype']}</td>
                                    </tr>
                                ");
                            }

                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- <div class="table-footer">
            <div class="button">
                <div id="B01">
                    <button>Previous</button>
                </div>
                <div id="B02">
                    <button>Next</button>
                </div>
            </div>
        </div>
    </div> -->

    <footer>
        <div class="copyright">
            &copyGPfoundations, 2021
        </div>
    </footer>
    <script>
        $('#a03').removeAttr('id');
        $('.navbar-links ul#main-comps li:nth-child(4) a').attr('id','a03');
    </script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
$(document).ready( function () {
    $('#t01').DataTable();
    $('#t01').css("background-color",'#C5D7BD')
    $('tr:odd').css("background-color",'#eee');
    $('tr:even').css("background-color",'#fff');
} );</script>
<script>
    $("#t01").on("click", "#abc", function() {
    $(this).closest("tr").remove();
   
});
</script>
</body>
</html>