<?php
    session_start();
    //checker to check if the user already logged in
    if($_SESSION['logstat'] != "Active"){
        header('Location: ../index.php');
    }else{
        echo "Welcome User: ".$_SESSION['name']." <a href='../logout.php'>Logout</a>";
    }
    require '../functions/custDAO.php';
    if(isset($_POST['add'])){
        //initialization of variables
        //getting the data from the form
        $cust_fname= $_POST['cust_fname'];
        $cust_lname= $_POST['cust_lname'];
        $cust_dob= $_POST['cust_dob'];
        $cust_address = $_POST['cust_address'];
        $cust_login_name = $_POST['cust_login_name'];
        $cust_login_password = $_POST['cust_login_password'];
        $cust_phone = $_POST['cust_phone'];
        $cust_reg_date = $_POST['cust_reg_date'];
        addCustomer($cust_fname, $cust_lname, $cust_dob,  $cust_address, $cust_login_name, $cust_login_password, $cust_phone,  $cust_reg_date);
        header('Location: customer_tbl.php'); // this will redirect us to the product table after product adding
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
    <title>Add Customer</title>
</head>
<body>
    <div class="jumbotron bg-primary">
        <h1 class="display-4">Add Product</h1>
    </div>
    <div class="container mt-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Customer Firstname</label>
                <input type="text" name="cust_fname" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Lastname</label>
                <input type="text" name="cust_lname" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Date of Birth</label>
                <input type="date" name="cust_dob" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Address</label>
                <input type="text" name="cust_address" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Login Name</label>
                <input type="text" name="cust_login_name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Login Password</label>
                <input type="password" name="cust_login_password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Phone</label>
                <input type="number" name="cust_phone" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Customer Registration Date</label>
                <input type="date" name="cust_reg_date" id="" class="form-control" value="<?php echo date('Y-m-d');?>">
            </div>
            <input type="submit" value="Add Customer" name="add" class="btn btn-primary">
        </form>
    </div>
</body>
</html>