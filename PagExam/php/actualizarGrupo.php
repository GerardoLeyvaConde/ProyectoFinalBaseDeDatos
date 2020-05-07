<?php 
	require_once "conexion.php";
    $conexion = conexion();

    $id = $_POST['idgrupos'];
    $encargado = $_POST['encargado'];
    $nombre_grup = $_POST['nombre_grupo'];

    if(buscaRepetido($nombre_grup, $conexion) == 1){
        $sql = "UPDATE grupos SET nombre_grupo = '$nombre_grup', encargado = '$encargado' WHERE idgrupos = $id";
        echo $result = mysqli_query($conexion, $sql);
    }else{
        echo 2;
    }

    function buscaRepetido($nombre_grup, $conexion){
        $sql = "SELECT * from grupos WHERE nombre_grupo = '$nombre_grup'";
        $result = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }
 ?>
