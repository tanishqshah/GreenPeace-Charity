<?php require "partials/_dbconnect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link rel="stylesheet" href="users.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
</head>
<body>
    <?php require "partials/_nav.php"; ?>
        <div class="table" style="margin: 0px; background-color: #C5D7BD;">
            <div class="table-content" style="overflow-x: auto;" >
                <table id="t01">
                    <thead id="head">
                        <tr>
                            <th>S.No.</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Date of creation</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM `users`";
                            $out = mysqli_query($conn, $query);
                            $num = mysqli_num_rows($out);
                            $sno=1;
                            if($num>0){
                                while($row = mysqli_fetch_assoc($out)){
                                    $id = $row['id'];
                                    $date1 = strtr($row['dt'], '/', '-');
                                    $date = date('Y-m-d', strtotime($date1));
                                    print_r("<tr>
                                    <td>{$sno}</td>
                                    <td>{$row['username']}</td>
                                    <td>{$row['password']}</td>
                                    <td>{$date}</td> 
                                    <td>
                                    <form action='deleteUser.php' method='GET' onsubmit='return confDelete();'>
                                        <input type='text' name='id' id='hi' value='{$id}' hidden>
                                        <button style='background-color: #d9534f; padding: 5px; font-size: 13pt; font-weight: bold; border-radius: 13px; cursor: pointer; color:white' id='abc' onclick='confDelete();'><i class='fa fa-trash' style='font-size: 20px; color: white;' aria-hidden='true'></i>
                                        Delete</button></td>
                                    </form>
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
        $('.navbar-links ul#main-comps li:nth-child(4) a').attr('id','a03');
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
<!-- <script>
    $("#t01").on("click", "#abc", function() {
    $(this).closest("tr").remove();
   
});
</script> -->
<script>
    function confDelete(){
        let x = confirm("Do you want to delete this user for the portal?");
        let k = document.getElementById('hi');
        sno = k.value;
        if(x){
            return true;
        }else{
            return false;
        }
    }
</script>
</body>
</html>