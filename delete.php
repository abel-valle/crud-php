<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';
session_start();

if(!isset($_SESSION['user'])) {
    http_response_code(401);
    echo "Acceso no autorizado.";
    die();
}

if(isset($_GET['idproduct'])) {
    $id_product = $_GET['idproduct'];
    $q = "delete from products where id_product = $id_product";
    $recordSet = execute($q);
    header("Location: admin.php");
    die();
}
?>
