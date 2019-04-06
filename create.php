<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

if(isset($_POST['insert'])) {
    $uploadOk = 0;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];

    if($_FILES['image']['name'] != "") {
        $fileName = $_FILES['image']['name'];
        $tempFile = $_FILES['image']['tmp_name'];
        $fileNamePath = 'images/' . $fileName;

        if(move_uploaded_file($tempFile, $fileNamePath)) {
            $uploadOk = 1;
        } else {
            echo "Error al cargar el archivo.";
        }
    }
    
    if($uploadOk == 1) {
        $q = "insert into products (name, description, price, brand, image) values ('$name','$description','$price','$brand','$fileNamePath')";
        execute($q);
        header("Location: admin.php");
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Productos</h1>
    <form action='create.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='insert' value='insert'>
        Nombre: <input type='text' name='name'> <br>
        Descripción: <input type='text' name='description'> <br>
        Precio: <input type='number' name='price' step='any'> <br>
        Marca: <input type='text' name='brand'> <br>
        Foto: <input type='file' name='image'> <br><br>
        <input type='submit' value='Crear producto'>
    </form>
</body>
</html>