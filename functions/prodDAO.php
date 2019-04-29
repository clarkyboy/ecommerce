<?php
/**
 * DAO- means Data Access Object - this file is incharge of all PHP-SQL Statements
 */
 require 'connection.php';
 // require means to connect the connection.php to this file

 function addProduct($prod_name, $prod_desc, $prod_date, $prod_price, $prod_stock){
    $prod_date = date('Y-m-d'); // this will automatically get the current date.
    $sql = "INSERT INTO product (prod_name, prod_desc, prod_date_added, prod_price, prod_stock) VALUES ('$prod_name', '$prod_desc', '$prod_date', '$prod_price', '$prod_stock')";
    $conn = connection();
    $result = $conn->query($sql); // this will perform the addition of data to the table product
 }
 function retrieveAllProducts(){
     $sql = "SELECT * FROM product WHERE prod_status = 'A'";
     $conn = connection();
     $result = $conn->query($sql); // means execute and assign it to the result variable
     $rows = array(); // this will hold all array results from the results variable
     while($row=$result->fetch_assoc()){
         // condition: as long as there is a set of arrays being passed to the rows array
        // the loop will not stop
        $rows[] = $row;
        // $rows = array($row);
        // print_r($row);
        // echo "<br>";
     // so every row is assigned to the rows array
     }
     return $rows;
 }

 function retrieveRecycleProducts(){
    $sql = "SELECT * FROM product WHERE prod_status = 'D'";
    $conn = connection();
    $result = $conn->query($sql); // means execute and assign it to the result variable
    $rows = array(); // this will hold all array results from the results variable
    while($row=$result->fetch_assoc()){
        // condition: as long as there is a set of arrays being passed to the rows array
       // the loop will not stop
       $rows[] = $row;
       // $rows = array($row);
       // print_r($row);
       // echo "<br>";
    // so every row is assigned to the rows array
    }
    return $rows;
}
//  retrieveAllProducts()

function retrieveSingleProduct($id){
    $sql = "SELECT * FROM product WHERE prod_id = '$id'";
    $conn = connection();
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); // this will get a single result
    return $row;
}
function updateProduct($prod_name, $prod_desc, $prod_date, $prod_price, $prod_stock, $prod_id){
    $sql = "UPDATE product SET prod_name = '$prod_name', prod_desc = '$prod_desc',
            prod_date_added = '$prod_date', prod_price='$prod_price', prod_stock = '$prod_stock'
            WHERE prod_id = '$prod_id'";
    $conn = connection();
    $result = $conn->query($sql);
}
function updateStat($prod_id){
    $sql = "UPDATE product SET prod_status = 'A' WHERE prod_id = '$prod_id'";
    $conn = connection();
    $result = $conn->query($sql);
}
function deleteProduct($prod_id){
    $sql = "UPDATE product SET prod_status = 'D' WHERE prod_id = '$prod_id'";
    $conn = connection();
    $result = $conn->query($sql);
}
function deleteProductForever($prod_id){
    $sql = "DELETE FROM product WHERE prod_id = '$prod_id'";
    $conn = connection();
    $result = $conn->query($sql);
}
?>