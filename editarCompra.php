<?php
include("config/connectionDB.php");

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    //$nameUsu = $_POST['nameEmple'];
    $cantidad = $_POST['cantidad'];

    if ($cantidad > 0) {
        $sql_edit = "UPDATE productos SET stock=".strval(intval(stock($id, $cantidad))+$cantidad)." WHERE id='$id';";
        echo "<script>console.log('sql_edit')</script>";
        $resultado = mysqli_query($conexion, $sql_edit);
        header('Location:comprar.php');
    }else{
        header('Location:comprar.php');
    }
}

function stock($id_, $cantidad_)
{
    include("config/connectionDB.php");

    $sql = "SELECT stock FROM productos WHERE id='$id_';";
    echo "<script>console.log('sql')</script>";
    $resul = $conexion->query($sql);
    $rs = $resul->fetch_assoc();

    return strval(utf8_decode($rs['stock']));
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
