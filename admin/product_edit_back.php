<?php

require '../functions/prodDAO.php';
$prod_id = $_GET['id'];
updateStat($prod_id);
header('Location: product_tbl.php');
?>