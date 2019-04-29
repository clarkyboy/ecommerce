<?php
    session_start();
    //checker to check if the user already logged in
    if($_SESSION['logstat'] != "Active"){
        header('Location: ../index.php');
    }else{
        echo "Welcome User: ".$_SESSION['name']." <a href='../logout.php'>Logout</a>";
    }
    require '../functions/custDAO.php';
    $custlist = retrieveAllCustomer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Product Table</title>
</head>
<body>
    <div class="jumbotron bg-success text-white">
        <h1 class="display-4">Customer Table</h1>
    </div>
    <div class="container mt-3">
        <h4 class="display-4"><a href="customer_add.php" role="button" class="btn btn-info"><i class="fas fa-plus"></i> Add Product</a></h4>
        <table class="table table-striped">
            <thead>
               <th>Customer Name</th>
               <th>Customer Date of Birth</th>
               <th>Customer Address</th>
               <th>Customer Phone</th>
               <th>Customer Registration Date</th>
               <th colspan="2">Actions</th>
            </thead>
            <tbody>
                <?php
                    foreach($custlist as $key=>$value){
                        echo "<tr>";
                            echo "<td>".$value['cust_fname']." ".$value['cust_lname']."</td>";
                            echo "<td>".date('M d, Y', strtotime($value['cust_dob']))."</td>";
                            echo "<td>".$value['cust_address']."</td>";
                            echo "<td>".$value['cust_phone']."</td>";
                            // echo "<td>$ ".number_format($value['prod_price'], 2)."</td>";
                            echo "<td>".date('M d, Y', strtotime($value['cust_register_date']))."</td>";
                            echo "<td><a href='customer_edit.php?id=".$value['cust_id']."' role='button' class='btn btn-warning'><i class = 'fas fa-edit'></i></a></td>";
                            echo "<td><a href='customer_delete.php?id=".$value['cust_id']."' role='button' class='btn btn-danger'><i class = 'fas fa-trash'></i></a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>