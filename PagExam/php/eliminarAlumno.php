<?php
    require_once "conexion.php";
    
    $conexion = conexion();

    $id = $_POST['idAl'];

    if(buscarGrupo($id, $conexion) == 1){
        $sql = "DELETE FROM alumnos WHERE idalumnos = $id";
        echo $result = mysqli_query($conexion, $sql);
    }else{
        echo 2;
    }

    function buscarGrupo($id, $conexion){
        $sql = "SELECT * FROM alumnos WHERE idalumnos = $id";
        $result = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }
?>