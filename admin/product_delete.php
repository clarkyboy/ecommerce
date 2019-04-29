<?php
     require '../functions/prodDAO.php';
     $prod_id = $_GET['id'];
     $product = retrieveSingleProduct($prod_id);
     if(isset($_POST['submit'])){
        $confirm = $_POST['confirm'];
        if($confirm == 'delete'){
            deleteProduct($prod_id);
            header('Location: product_recycle.php');
        }else{
            header('Location: product_tbl.php');
        }
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
    <title>Product Delete</title>
</head>
<body>
    <div class="container">
        <div class="card border-danger m-3 p-3">
            <h4 class="card-title">Are you sure you're going to delete this product?</h4>
            <p class="card-text">Please type 'delete' if you are sure. If not, type 'cancel'</p>
            <p class="card-text">
                Details <br>
                Product Name: <?php echo $product['prod_name'];?> <br>
                Product Desc: <?php echo $product['prod_desc'];?> <br>
                Product Price: $<?php echo number_format($product['prod_price'], 2);?>
            </p>
            <form method="post">
                <div class="form-group">
                    <label for="">Type Here:</label>
                    <input type="text" name="confirm" id="" class="form-control">
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-danger text-white">
            </form>
        </div>
    </div>
  
</body>
</html>