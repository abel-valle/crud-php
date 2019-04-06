<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';
session_start();

if(isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $q = "select * from users where user = '$user' and pass = password('$pass')";
    $recordSet = execute($q);
    
    if($row = mysqli_fetch_array($recordSet)) {
        $_SESSION['user'] = $row['user'];
        $_SESSION['name'] = $row['name'];
        header("Location: admin.php");
    } else {
        session_destroy();
        echo "Verificar usuario y contraseña.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Autenticación del Administrador</h1>
    <form action='login.php' method='post'>
        Usuario: <input type='text' name='user'><br>
        Contraseña: <input type='password' name='pass'><br><br>
        <input type='submit' value='Ingresar'>
    </form>
</body>
</html>