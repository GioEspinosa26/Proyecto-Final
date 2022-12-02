<?php 
//$conexion=mysqli_connect("localhost", "root", "", "sitcovi");
include("config/connectionDB.php");

$idUser=$_GET['id'];
$sql_elim="DELETE FROM usuarios WHERE id='$idUser';";
$resultado=mysqli_query($conexion, $sql_elim);

if ($resultado) {
    header('Location:productos.php.php');  
}else{
    echo"<script>alert('Algo salio mal, No se pudo eliminar!'); </script>";
} 

mysqli_close($conexion);
?>