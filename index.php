<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

function createProductList() {
    $q = "select * from products";
    $recordSet = execute($q);

    $tableHtml = "
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Imagen</th>
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
            <tr>";
    }
    $tableHtml .= "</table>";

    echo $tableHtml;
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Productos</h1>
    <?php createProductList();?>
</body>
</html>