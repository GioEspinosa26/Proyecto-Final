<?php
$usuario = $_POST['username'];
$contra = $_POST['contra'];

session_start();
$_SESSION['username'] = $usuario;

$host = "localhost";
$user = "root";
$contra_ = "";
$nameDB = "calzadoVeloz";

$conexion = mysqli_connect($host, $user, $contra_, $nameDB) or die("error en la conexion");

$consulta = "SELECT * FROM usuarios WHERE email='$usuario' and contra='$contra'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    if (isAdmin($usuario, $contra) == 1) {
        header('location:admin.php');
    } else {
        include('index.html');
    }
} else {
?>
    <?php
    include('login.php');
    echo "<script>alert('Usuario no registrado..!')</script>";
    ?>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);

function isAdmin($usuario, $contra)
{
    $conexion = mysqli_connect("localhost", "root", "", "calzadoVeloz");
    $sql = "SELECT rol FROM usuarios WHERE email='$usuario' AND contra='$contra';";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_assoc($result)) {
        if ($mostrar["rol"] == 'admin') {
            return 1;
        } else {
            return 0;
        }
    }
    mysqli_free_result($result);
}

function fecIni($usuario, $contra)
{
    $fecActual = date('Y-m-d');
    $conexion = mysqli_connect("localhost", "root", "", "login");
    $sql = "SELECT FechaIni FROM mUsuario WHERE Login='$usuario' AND Contra='$contra';";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_assoc($result)) {
        if ($mostrar["FechaIni"] <= $fecActual) {
            return 1;
        } else {
            return 0;
        }
    }
    mysqli_free_result($result);
}

function fecFin($usuario, $contra)
{
    $fecActual = date('Y-m-d');
    $conexion = mysqli_connect("localhost", "root", "", "login");
    $sql = "SELECT FechaFin FROM mUsuario WHERE Login='$usuario' AND Contra='$contra';";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_assoc($result)) {
        if ($mostrar["FechaFin"] < $fecActual) {
            return 1;
        } else {
            return 0;
        }
    }
    mysqli_free_result($result);
}

function modEdoCta($usuario, $contra)
{
    $conexion = mysqli_connect("localhost", "root", "", "login");
    $sql_edit = "UPDATE mUsuario SET EdoCta='False' WHERE Login='$usuario' AND Contra='$contra';";
    echo "<script>console.log($sql_edit); </script>";
    $result = mysqli_query($conexion, $sql_edit);
    //mysqli_free_result($result);
}

function claveUsu($usuario, $contra)
{
    $conexion = mysqli_connect("localhost", "root", "", "login");
    $sql = "SELECT CvUser FROM mUsuario WHERE Login='$usuario' AND Contra='$contra';";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_assoc($result)) {
        for ($x = 0; $x < 10; $x++) {
            if ($x = $mostrar["CvUser"]) {
                return $x;
            }
        }
    }
    //mysqli_free_result($result);
}

function persona()
{
    $conexion = mysqli_connect("localhost", "root", "", "login");
    $sql = 'SELECT mPerson.Nombre AS Nombre FROM mUsuario, mPerson WHERE mPerson.CvPerson=mUsuario.CvPerson AND CvUser=1;';
    $resultado = $conexion->pdo->query($conexion, $sql);
    $usuario = $resultado->fetch();
    return $usuario[0];


    /*$basededatos = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $consulta = $basededatos->prepare('SELECT mPerson.Nombre AS Nombre FROM mUsuario, mPerson WHERE mPerson.CvPerson=mUsuario.CvPerson AND CvUser=1;');
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);*/


    /*$conexion = mysqli_connect("localhost", "root", "", "login");
    $sql = "SELECT mPerson.Nombre AS Nombre FROM mUsuario, mPerson WHERE mPerson.CvPerson=mUsuario.CvPerson AND CvUser=1;";
    $result = mysqli_query($conexion, $sql);
    $arrayNom=array();
    while ($mostrar = mysqli_fetch_assoc($result)) {
        $arrayNom= $mostrar["Nombre"];
    }
    return $arrayNom;*/
}
