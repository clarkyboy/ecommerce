<?php
    require '../functions/prodDAO.php';
    $prod_id = $_GET['id']; // this will hold the id passed from the url
    $product = retrieveSingleProduct($prod_id);
    if(isset($_POST['update'])){
        //initialization of variables
        //getting the data from the form
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc'];
        $prod_date = $_POST['prod_date'];
        $prod_price = $_POST['prod_price'];
        $prod_stock = $_POST['prod_stock'];
        updateProduct($prod_name, $prod_desc, $prod_date, $prod_price, $prod_stock, $prod_id);
        header('Location: product_tbl.php'); // this will redirect us to the product table after product adding
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
    <title>Add Product</title>
</head>
<body>
    <div class="jumbotron bg-warning">
        <h1 class="display-4">Update Product</h1>
    </div>
    <div class="container mt-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="prod_name" id="" class="form-control" value="<?php echo $product['prod_name']; ?>">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <input type="text" name="prod_desc" id="" class="form-control" value="<?php echo $product['prod_desc']; ?>">
            </div>
            <div class="form-group">
                <label for="">Product Date Added</label>
                <input type="date" name="prod_date" id="" class="form-control" value="<?php echo $product['prod_date_added']; ?>">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="number" name="prod_price" id="" class="form-control" value="<?php echo $product['prod_price']; ?>">
            </div>
            <div class="form-group">
                <label for="">Product Stock</label>
                <input type="number" name="prod_stock" id="" class="form-control" value="<?php echo $product['prod_stock']; ?>">
            </div>
            <input type="submit" value="Update Product <?php echo $product['prod_name']; ?>" name="update" class="btn btn-warning">
        </form>
    </div>
</body>
</html>