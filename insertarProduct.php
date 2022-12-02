<?php
include("config/connectionDB.php");

if (isset($_POST['insertdata'])) {
    //$nombreP = $_POST['nameEmple'];
    $name_product = $_POST['producto'];
    $descrip = $_POST['descrip'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    //$rol = $_POST['rol'];
}

$sql_edit = "INSERT INTO productos VALUES (NULL, $categoria, '$name_product', '$descrip', '$precio', '$stock', NULL, '');";
$resultado = mysqli_query($conexion, $sql_edit);
header('Location:productos.php');

function usernameExiste($usu)
{
    include("config/connectionDB.php");

    $sql = "SELECT * FROM usuarios WHERE email='$usu';";
    $result = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($result);

    if ($filas > 0) {
        return 1;
    } else {
        return 0;
    }

    mysqli_free_result($result);
}

function contraExiste($cont)
{
    include("config/connectionDB.php");

    $sql = "SELECT * FROM usuarios WHERE contra='$cont';";
    $result = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($result);

    if ($filas > 0) {
        return 1;
    } else {
        return 0;
    }

    mysqli_free_result($result);
}
