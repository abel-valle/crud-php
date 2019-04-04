<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

if(isset($_GET['idproduct'])) {
    $id_product = $_GET['idproduct'];
    $q = "delete from products where id_product = $id_product";
    $recordSet = execute($q);
    header("Location: admin.php");
    die();
}
?>
