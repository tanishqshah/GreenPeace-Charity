<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: Login_admin.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
    <?php require "partials/_nav.php"; ?>   
    <div class="inner-container">
        <div class="upper-body">
            <div class="date-search">
                <form method="post" action='Dashboard.php'>
                    <div class="form">
                        <label for="from">From</label>
                        <input id="From" type="date" placeholder="dd/mm/yyyy" name="from">
                    </div>
                    <div class="form">
                        <label for="to">To</label>
                        <input id="to" type="date" placeholder="dd/mm/yyyy" name="to">
                    </div>
                    <div class="form">
                        <button>Search by Date</button>
                    </div>
                </form>
            </div>
            <p id="error">
            </p>
        <div class="table">
            <div class="table-content" style="overflow-x: auto;" >
                <table id="t01">
                    <thead id="head">
                        <tr>
                            <th>Doner Name</th>
                            <th>Amount</th>
                            <th>Purpose</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Date</th>
                            <th>Payment Status</th>
                            <th>Payment Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $user = $_SESSION['username'];
                        require "partials/_dbconnect.php";
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $from = $_POST['from'];
                            $to = $_POST['to'];
                            $sql = "SELECT * FROM donors WHERE d_date BETWEEN '$from' AND '$to'";
                            $out = mysqli_query($conn,$sql);    
                            $num = mysqli_num_rows($out);
                        }
                        else{
                            $query = "SELECT * FROM `donors`";
                            $out = mysqli_query($conn, $query);
                            $num = mysqli_num_rows($out);
                        }
                        $amt=0;
                        if($num>0){
                            while($row=mysqli_fetch_assoc($out)){
                                $amt+=$row['d_amount'];
                                $date1 = strtr($row['d_date'], '/', '-');
                                $date = date('Y-m-d', strtotime($date1));
                                echo "
                                <tr>
                                    <td>{$row['d_name']}</td>
                                    <td>{$row['d_amount']}</td>
                                    <td>{$row['d_purpose']}</td>
                                    <td>{$row['d_addr']}</td>
                                    <td>{$row['d_cell']}</td>
                                    <td>{$date}</td>
                                    <td>{$row['d_pay']}</td>
                                    <td>{$row['d_paytype']}</td>
                                </tr>
                                ";
                            }
                        } 
                        else{
                            // echo "<h2>No records to fetch</h2>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-footer">
            <div class="total-amt">
                Total Amount : <?php echo $amt; ?>
            </div>
        </div>
    </div>
    <div class="copyright">
        &copyGPfoundations, 2021
     </div>
     <script>
        $('form').submit((e)=>{
            $start = new Date($("input:first").val());
            $end = new Date($("input:odd").val());
            if($start>$end){
                e.preventDefault();
                $('p#error').html("<h3>Date range you have entered is invalid</h3>").show().fadeOut(2000);
            }
        });
        $('#a03').removeAttr('id');
        $('.navbar-links ul#main-comps li:nth-child(1) a').attr('id','a03');
        $('#a03').css("background-color","#337AB7");
    </script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready( function () {
    $('#t01').DataTable();
    $('#t01').css("background-color",'#C5D7BD')
    $('tr:odd').css("background-color",'#eee');
    $('tr:even').css("background-color",'#fff');
} );
</script>
<script>
    $("#t01").on("click", "#abc", function() {
    $(this).closest("tr").remove();
   
});
</script>
</body>
</html>