<?php
    require_once "conexion.php";
    
    $conexion = conexion();

    $id = $_POST['idgrupos'];

    if(buscarGrupo($id, $conexion) == 1){
        $sql = "DELETE FROM grupos WHERE idgrupos = $id";
        echo $result = mysqli_query($conexion, $sql);
    }else{
        echo 2;
    }

    function buscarGrupo($id, $conexion){
        $sql = "SELECT * FROM grupos WHERE idgrupos = $id";
        $result = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }
?>