<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';
session_start();

function createProductList() {
    $q = "select * from products where visible = 1 order by id_product";
    $recordSet = execute($q);

    $tableHtml = "
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Ruta de Foto</th>
                <th>Foto</th>
            <tr>";
    while ($row = mysqli_fetch_array($recordSet)) {
        $id_product = $row['id_product'];
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $brand = $row['brand'];
        $image = $row['image'];
        $tableHtml .= "
            <tr>
                <td>$id_product</td>
                <td>$name</td>
                <td>$description</td>
                <td>$price</td>
                <td>$brand</td>
                <td>$image</td>
                <td><img src='$image' height='50px'></td>
            <tr>";
    }
    $tableHtml .= "</table>";

    echo $tableHtml;
}

function renderHeader() {   
    if( isset($_SESSION['user']) ) {
        $user = $_SESSION['user'];
        echo "
            <table>
                <tr>
                    <td>
                    Encabezado para el usuario: $user
                    <td>
                </tr>
            </table>
        ";
    } else {
        echo "
            <table>
                <tr>
                    <td>
                        Encabezado normal
                    <td>
                </tr>
            </table>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <?php renderHeader(); ?>
    <h1>Productos</h1>
    <?php createProductList();?>
    <br>
    <a href='login.php'>Acceso al Administrador</a>
</body>
</html>