<?php

    session_start();
    session_destroy(); // this will delete all the values inside
    //the $_SESSION variables
    header('Location: index.php');

?>