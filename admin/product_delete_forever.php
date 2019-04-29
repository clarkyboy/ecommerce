<?php

require '../functions/prodDAO.php';
$prod_id = $_GET['id'];
deleteProductForever($prod_id);
header('Location: product_recycle.php');
?>