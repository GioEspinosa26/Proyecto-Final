<?php
include("config/connectionDB.php");

if (isset($_POST['insertdata'])) {
    //$nombreP = $_POST['nameEmple'];
    $user = $_POST['usuario'];
    $contra = $_POST['contrasenia'];
    $email = $_POST['email'];
    //$rol = $_POST['rol'];
}

if (usernameExiste($email) == 0) {
    if (contraExiste($contra) == 0) {
            $sql_edit = "INSERT INTO usuarios VALUES (NULL, '$user', '$email', '$contra', 'usuario');";
            $resultado = mysqli_query($conexion, $sql_edit);
            header('Location:admin.php');
    } else {
        include('admin.php');
        print "<script>alert('La contraseña ya esta en uso!'); </script>";
    }
} else {
    include('admin.php');
    print "<script>alert('El correo ya esta en uso!'); </script>";
}

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