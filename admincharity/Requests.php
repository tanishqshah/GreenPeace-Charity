<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: Login_admin.php");
  exit;
}
?>
<?php require "partials/_dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="Requests.css">
</head>
<body>
    <?php require "partials/_nav.php"; ?>
        <div class="table" style="margin: 0px;  background-color: #C5D7BD;">
            <div class="table-content" style="overflow-x: auto;" >
                <table id="t01">
                    <thead id="head">
                        <tr>
                            <th>Founder</th>
                            <th>Name of Charity</th>
                            <th>Purpose</th>
                            <th>src</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            $query = "SELECT * FROM `charities`";
                            $out = mysqli_query($conn, $query);
                            $num = mysqli_num_rows($out);
                            $sno=0;
                            if($num>0){
                                while($row = mysqli_fetch_assoc($out)){
                                    print_r("<tr>
                                    <td>{$row['founder']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['purpose']}</td>
                                    <td>{$row['cover']}</td> 
                                    
                                    <td>
                                        <button style='background-color: #d9534f; padding: 5px; font-size: 13pt; font-weight: bold; border-radius: 13px; cursor: pointer; color:white' id='abc' onclick='confDelete({$row['id']});'><i class='fa fa-times' style='font-size: 20px; color: white;' aria-hidden='true'></i>
                                        Reject</button></td>
                                </tr>"
                                );
                                $sno++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="copyright">
        &copyGPfoundations, 2021
     </div>
     <script>
         $('#a03').removeAttr('id');
        $('.navbar-links ul#main-comps li:nth-child(2) a').attr('id','a03');
        $('#a03').css("background-color","#337AB7");
     </script>
     <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#t01').DataTable();
            $('#t01').css("background-color",'#C5D7BD')
            $('tr:odd').css("background-color",'#eee');
            $('tr:even').css("background-color",'#fff');
        });
</script>
<script>
    $("#t01").on("click", "#abc", function() {
    $(this).closest("tr").remove();
   
});
</script>
<script>
    function confDelete(abd){
        let x = confirm("Do you want to Reject/Delete this Charity from the portal?");
        if(x){
            window.location= `/admincharity/deleteCharity.php?id=${abd}`;
        }else{
            window.location = `/admincharity/Requests.php`;
        }
    }
</script>
</body>
</html>