<?php require "partials/_dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Charities</title>
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
                            <th>Name of Charity</th>
                            <th>Purpose</th>
                            <th>Founder</th>
                            <th>Cover</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            $query = "SELECT * FROM `charities`";
                            $out = mysqli_query($conn, $query);
                            $num = mysqli_num_rows($out);
                            if($num>0){
                                while($row = mysqli_fetch_assoc($out)){
                                    print_r("<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['purpose']}</td>
                                    <td>{$row['founder']}</td>
                                    <td>{$row['cover']}</td>
                                </tr>"
                                );
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
        $('.navbar-links ul#main-comps li:nth-child(3) a').attr('id','a03');
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