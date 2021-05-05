<?php
    include_once './db-config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <title>Potato</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- -------- Font awesome 5 kit -->
    <script src="https://kit.fontawesome.com/44fb44d106.js"></script>    
</head>

<div class="container pt-5">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
            <table class="table table-striped" id="firstTable">
                <thead class="bg-success text-white" id="firstThead">
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Email </th>
                    <th> Address </th>
                    <th> City </th>
                    <th> State </th>
                    <th> Zipcode </th>
                </thead>
                <tbody>
                    <?php
                         $sql                 =       "SELECT * FROM registration limit 2";
                         $result              =       mysqli_query($conn, $sql);
                 
                         if(mysqli_num_rows($result) > 0) {
                             $students        =       mysqli_fetch_all($result,MYSQLI_ASSOC);
                             foreach($students as $student) : ?>
                                <tr id="result">
                                    <td><?php echo $student['first_name']; ?> </td>
                                    <td><?php echo $student['last_name']; ?> </td>
                                    <td><?php echo $student['email']; ?> </td>
                                    <td><?php echo $student['address']; ?> </td>
                                    <td><?php echo $student['city']; ?> </td>
                                    <td><?php echo $student['state']; ?> </td>
                                    <td><?php echo $student['zip_code']; ?> </td>
                                </tr>
                             <?php endforeach; 
                         }   
                         ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <button type="button" class="btn btn-info btn-sm" id="loadBtn"><i class="fa fa-refresh"></i> Load More.. </button>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>