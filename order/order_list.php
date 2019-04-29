<?php
    session_start();
    if($_SESSION['logstat'] != "Active"){
        header('Location: ../index.php');
    }else{
        echo "Welcome User: ".$_SESSION['name']." <a href='../logout.php'>Logout</a>";
    }
    require_once '../functions/ordDAO.php';
    $prodlist = getProductList();
    $user_id = $_SESSION['id']; // this is where we get the cust_id
    if(isset($_POST['order'])){
        $prod_id = $_POST['prod_id'];
        $ord_quantity = $_POST['ord_quantity'];
        $ord_date_ordered = $_POST['ord_date_ordered'];
        $ord_date_released = $_POST['ord_date_released'];
        addOrders($prod_id, $user_id, $ord_quantity, $ord_date_ordered, $ord_date_released);
    }
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
    <title>Basic Order Form</title>
</head>
<body>
    <div class="jumbotron bg-success">
        <h3 class="display-4">Order List Form</h3>
    </div>
    <div class="container mt-3 p-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Product Name</label>
                <select name="prod_id" id="" class="form-control">
                    <option value="---">Please Choose a Product</option>
                    <?php
                        foreach($prodlist as $key => $values){
                            echo "<option value='".$values['prod_id']."'>".$values['prod_name']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">How Many? (Quantity)</label>
                <input type="number" name="ord_quantity" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Date Ordered</label>
                <input type="date" name="ord_date_ordered" value="<?php echo date('Y-m-d'); ?>" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Date To be Released</label>
                <input type="date" name="ord_date_released" value="<?php echo date('Y-m-d', strtotime('+5 days'));?>" id="" class="form-control">
            </div>
            <input type="submit" value="Order" name="order" class="btn btn-outline-success">
        </form>
    </div>
</body>
</html>