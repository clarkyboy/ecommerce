<?php
/**
 * DAO- means Data Access Object - this file is incharge of all PHP-SQL Statements
 */
 require 'connection.php';
 // require means to connect the connection.php to this file

 function addCustomer($cust_fname, $cust_lname, $cust_dob,  $cust_address, $cust_login_name, $cust_login_password, $cust_phone,  $cust_reg_date){
    $sql = "INSERT INTO customer (cust_fname, cust_lname, cust_dob, cust_address, cust_login_name, cust_login_password, cust_phone, cust_register_date) VALUES ('$cust_fname', '$cust_lname', '$cust_dob',  '$cust_address', '$cust_login_name', '$cust_login_password', '$cust_phone',  '$cust_reg_date')";
    $conn = connection();
    $result = $conn->query($sql); // this will perform the addition of data to the table product
 }
 function retrieveAllCustomer(){
     $sql = "SELECT * FROM customer WHERE cust_status = 'A'";
     $conn = connection();
     $result = $conn->query($sql); // means execute and assign it to the result variable
     $rows = array(); // this will hold all array results from the results variable
     while($row=$result->fetch_assoc()){
         // condition: as long as there is a set of arrays being passed to the rows array
        // the loop will not stop
        $rows[] = $row;
        // $rows = array($row);x
        // print_r($row);
        // echo "<br>";
     // so every row is assigned to the rows array
     }
     return $rows;
 }
//  retrieveAllProducts()

function retrieveSingleCustomer($id){
    $sql = "SELECT * FROM customer WHERE cust_id = '$id'";
    $conn = connection();
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); // this will get a single result
    return $row;
}
function updateCustomer($cust_fname, $cust_lname, $cust_dob,  $cust_address, $cust_phone,  $cust_reg_date, $cust_id){
    $sql = "UPDATE customer SET cust_fname = '$cust_fname', cust_lname = '$cust_lname',
            cust_dob = '$cust_dob', cust_address ='$cust_address', cust_phone = '$cust_phone', cust_register_date = '$cust_reg_date',
            WHERE cust_id = '$cust_id'";
    $conn = connection();
    $result = $conn->query($sql);
}
function deleteProduct($cust_id){
    $sql = "UPDATE customer SET cust_status = 'D' WHERE cust_id = '$cust_id'";
    $conn = connection();
    $result = $conn->query($sql);
}

function login($username, $password){
    $sql = "SELECT * FROM customer 
            WHERE cust_login_name = '$username' AND cust_login_password = '$password'";
    $conn = connection();
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
?>