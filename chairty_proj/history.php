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
    <title>History</title>
    <link rel="stylesheet" href="history.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
    <?php require "partials/_nav.php"; ?>

    <div class="inner-container">
        <div class="upper-body">
            <form action='history.php' method="POST">
                <div class="date-search">
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
                </div>
            </form>
            <p id="error">

            </p>

        <div class="table">
            <div class="table-content" style="overflow-x: auto;" >
                <table id="t01">
                    <thead id="head">
                        <tr>
                            <th>Donate To</th>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user = $_SESSION['username'];
                        require "partials/_dbconnect.php";
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $from = $_POST['from'];
                            $to = $_POST['to'];
                            $sql = "SELECT * FROM donors WHERE d_date BETWEEN '$from' AND '$to' AND u_name='$user' ";
                            $out = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($out);
                        }
                        else{
                            $query = "SELECT * FROM `donors` where u_name='$user'";
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
                                    <td>{$row['founder']}</td>
                                    <td>{$row['d_amount']}</td>
                                    <td>{$row['d_addr']}</td>
                                    <td>{$row['d_cell']}</td>
                                    <td>{$date}</td>
                                    <td>{$row['d_pay']}</td>
                                    <td>{$row['d_paytype']}</td>
                                        <td><button class='edits' style='background-color: #0275d8; margin-right: 5px;padding: 5px; font-size: 13pt; font-weight: bold; border-radius: 13px; cursor: pointer; color:white' id='{$row['d_id']}' onclick='editThis({$row['d_id']});'><i class='fa fa-pencil' style='font-size: 20px; color: white;' aria-hidden='true'></i>
                                        Edit</button>
                                        <button style='background-color: #d9534f; padding: 5px; font-size: 13pt; font-weight: bold; border-radius: 13px; cursor: pointer; color:white' id='abc' onclick='confDelete({$row['d_id']});'><i class='fa fa-trash' style='font-size: 20px; color: white;' aria-hidden='true'></i>
                                        Delete</button></td>

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
        $('.navbar-links ul#main-comps li:nth-child(2) a').attr('id','a03');
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
    function confDelete(abd){
        let x = confirm("Do you want to delete this donation history?");
        // let k = document.getElementById('hello');
        // sno = k.value;
        if(x){
            window.location= `/chairty_proj/deleteHist.php?id=${abd}`;
        }else{
            window.location = `/chairty_proj/history.php`;
        }
    }
    function editThis(abd){
        // let x = confirm("Do you want to edit this record?");
        // let k = document.getElementById('hello');
        // sno = k.value;
        if(x){
            window.location.href = `/chairty_proj/editForm.php?id=${abd}`;
        }else{
            window.location = `/chairty_proj/history.php`;
        }
        
    }
</script>
</body>
</html>