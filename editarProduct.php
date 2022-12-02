<?php
include("config/connectionDB.php");

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    //$nameUsu = $_POST['nameEmple'];
    $name_product = $_POST['producto'];
    $descrip = $_POST['descrip'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql_edit = "UPDATE productos SET nombre='$name_product', descripcion='$descrip', 
                precio='$precio', stock='$stock', categoria_id='".strval(cvProduct($categoria))."' WHERE id='$id';";
    $resultado = mysqli_query($conexion, $sql_edit);
    header('Location:productos.php');
}

function name_productnameExiste($usu, $id_)
{
    include("config/connectionDB.php");

    $sql = "SELECT * FROM usuarios WHERE (precio='$usu' AND id<>'$id_');";
    print "<script>alert('$sql'); </script>";
    $result = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($result);

    if ($filas > 0) {
        return 1;
    } else {
        return 0;
    }

    mysqli_free_result($result);
}

function contraExiste($cont, $id_)
{
    include("config/connectionDB.php");

    $sql = "SELECT * FROM usuarios WHERE (contra='$cont' AND id<>'$id_');";
    print "<script>alert('$sql'); </script>";
    $result = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($result);

    if ($filas > 0) {
        return 1;
    } else {
        return 0;
    }

    mysqli_free_result($result);
}

function cvProduct($name)
{
    include("config/connectionDB.php");

    $sql = "SELECT categorias.id as clave FROM categorias 
    WHERE(categorias.nombre='$name');";
    $resul = $conexion->query($sql);
    $rs = $resul->fetch_assoc();

    return strval(utf8_decode($rs['clave']));
}
