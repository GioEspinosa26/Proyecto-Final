
<?php
include("config/connectionDB.php");

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    //$nameUsu = $_POST['nameEmple'];
    $user = $_POST['usuario'];
    $contra = $_POST['contrasenia'];
    $email = $_POST['email'];
    //$rol = $_POST['rol'];

    if (usernameExiste($email, $id) == 0) {
        if (contraExiste($contra, $id) == 0) {
                $sql_edit = "UPDATE usuarios SET nombre='$user', email='$email', contra='$contra' WHERE id='$id';";
                $resultado = mysqli_query($conexion, $sql_edit);
                header('Location:admin.php');
        } else {
            include('admin.php');
            print "<script>alert('La contraseña ya esta en uso!!!'); </script>";
        }
    } else {
        //header('Location:adminUsu.php');
        include('admin.php');
        print "<script>alert('El correo ya esta en uso!!!'); </script>";
    }
}

function usernameExiste($usu, $id_)
{
    include("config/connectionDB.php");

    $sql = "SELECT * FROM usuarios WHERE (email='$usu' AND id<>'$id_');";
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

function cvPersona($name)
{
    include("config/connectionDB.php");

    $sql = "SELECT mPerson.CvPerson as clave FROM mPerson, cNombre, cApellido AP, cApellido AM 
    WHERE(mPerson.CvNombre = cNombre.CvNombre AND mPerson.ApePat = AP.CvApellido 
    AND mPerson.ApeMat = AM.CvApellido 
    AND CONCAT(cNombre.DsNombre, ' ', AP.DsApellido, ' ', AM.DsApellido)='$name');";
    $resul = $conexion->query($sql);
    $rs = $resul->fetch_assoc();

    return strval(utf8_decode($rs['clave']));
}
?>