<?php
    require '../functions/ordDAO.php';
    session_start();
    $orderlist = getAllOrders($_SESSION['id']);
    //this will fetch all orders made by the loggedin user
    //ex. if user sayie is logged in, she will only see her own lists of orders
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
    <title>Order Table</title>
</head>
<body>
    <div class="jumbotron bg-success">
        <h3 class="display-4">My Order Table</h3>
    </div>
    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
                <th>Order No.</th>
                <th>Product Name</th>
                <th>Customer Name</th>
                <th>Order Quantity</th>
                <th>Order Date</th>
                <th>Release Date</th>
                <th>Order Status</th>
            </thead>
            <tbody>
                <?php
                    foreach($orderlist as $key=>$values){
                        echo "<tr>";

                            echo "<td>".$values['ord_no']."</td>";
                            echo "<td>".$values['prod_name']."</td>";
                            echo "<td>".$values['cust_fname']."</td>";
                            echo "<td>".$values['ord_quantity']."pcs </td>";
                            echo "<td>".$values['ord_date_ordered']."</td>";
                            echo "<td>".$values['ord_date_released']."</td>";
                            echo "<td>".$values['ord_status']."</td>";

                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>