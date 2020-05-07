<?php
    require_once "conexion.php";

    $conexion = conexion();

    $id = $_POST['idexamen'];

    if(buscarExamen($id, $conexion) == 1){
        $sql = "DELETE FROM examen WHERE idexamen = $id";
        echo $result = mysqli_query($conexion, $sql);
    }else{
        echo 2;
    }

    function buscarExamen($id, $conexion){
        $sql = "SELECT * FROM examen WHERE idexamen = $id";
        $result = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }
?>