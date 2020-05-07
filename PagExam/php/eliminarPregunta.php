<?php
    require_once "conexion.php";

    $conexion = conexion();

    $idpregunta = $_POST['idpregunta'];

    if(buscarPregunta($idpregunta, $conexion) == 1){
        $sql = "DELETE FROM respuestas WHERE preguntas_idpreguntas = $idpregunta";
        $result = mysqli_query($conexion, $sql);
        $sql = "DELETE FROM preguntas WHERE idpreguntas = $idpregunta";
        echo $result = mysqli_query($conexion, $sql);
    }else{
        echo 2;
    }

    function buscarPregunta($idpregunta, $conexion){
        $sql = "SELECT * FROM preguntas WHERE idpreguntas = $idpregunta";
        $result = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }
?>