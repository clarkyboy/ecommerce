<?php

/**
 * This is where we connect to the ecommerce database in the phpmyadmin
 */
function connection(){

    $servername = "localhost"; // this will point to the localhost server of phpmyadmin
    $username = "root"; // username used in accessing the phpmyadmin
    $password = ""; //for xampp it's blank; while MAMP the password is root
    $database = "ecommerce"; // the name of the database you want to connect

    //Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    //Checking the connection
    if($conn->connect_error){
        //$conn->connect_error is a fixed variable that signals if we have an error connection
       die("Connection failed:" . $conn->connect_error);
    }else{
        return $conn;
    }
}

?>