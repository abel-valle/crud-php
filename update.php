<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

$id_product;
$name;
$description;
$price;
$brand;
$image;

if(isset($_GET['idproduct'])) {
    $id_product = $_GET['idproduct'];
    $q = "select * from products where id_product = $id_product";
    $recordSet = execute($q);
    if($row = mysqli_fetch_array($recordSet)) {
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $brand = $row['brand'];
        $image = $row['image'];
    }
}

if(isset($_GET['update'])) {
    $uploadOk = 0;
    $id_product = $_POST['id_product'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];

    $fileName = "";
    $tempFile = "";
    $fileNamePath = "";

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
        $imageField = "";
        if($_FILES['image']['name'] != "") {
            $imageField = ", image = '$fileNamePath'";
        }
        
        $q = "update products set name = '$name', description = '$description',
            price = '$price', brand = '$brand' $imageField
            where id_product = '$id_product'";
            
        execute($q);
        header("Location: admin.php");
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Productos</h1>
    <form action='update.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='update' value='update'>
        <input type='hidden' name='id_product' value='<?php echo $id_product; ?>'>
        Nombre:      <input type='text' name='name'         value='<?php echo $name; ?>'> <br>
        Descripción: <input type='text' name='description'  value='<?php echo $description; ?>'> <br>
        Precio:      <input type='number' name='price'      value='<?php echo $price; ?>' step='any'> <br>
        Marca:       <input type='text' name='brand'        value='<?php echo $brand; ?>'> <br>
        Foto:        <img src='<?php echo $image; ?>' height='100px'> <br>
        Nueva foto:  <input type='file' name='image'> <br><br>
        <input type='submit' value='Modificar producto'>
    </form>
</body>
</html>