<?php 
require_once "conexion.php";
$conexion = conexion();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$grupo = $_POST['grupo'];

if(buscaRepetido($id, $conexion) == 1){
    $sql = "UPDATE alumnos SET grupos_idgrupos = '$grupo', NOMBRE = '$nombre', APELLIDO = '$apellido', USUARIO = '$usuario', CONTRASENA = '$contrasena' WHERE idalumnos = $id";
    echo $result = mysqli_query($conexion, $sql);
}else{
    echo 2;
}


function buscaRepetido($id,$conexion){
    $sql = "SELECT * from alumnos WHERE idalumnos ='$id'";
    $result = mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>