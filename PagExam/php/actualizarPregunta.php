<?php
	require_once "conexion.php";
    $conexion = conexion();

    $idPregunta = $_POST['idPregunta'];
    $pregunta = $_POST['pregunta'];
    $idRespuestaCorrecta = $_POST['idRespuestaCorrecta'];
    $respuestaCorrecta = $_POST['respuestaCorrecta'];
    $idRespuesta1 = $_POST['idRespuesta1'];
    $respuesta1 = $_POST['respuesta1'];
    $idRespuesta2 = $_POST['idRespuesta2'];
    $respuesta2 = $_POST['respuesta2'];
    $idRespuesta3 = $_POST['idRespuesta3'];
    $respuesta3 = $_POST['respuesta3'];

    if(buscaRepetido($idPregunta, $pregunta, $respuestaCorrecta, $respuesta1, $respuesta2,  $respuesta3, $conexion) == 1){
        echo 2;
    }else{
        $sql = "UPDATE preguntas SET contenido = '$pregunta' WHERE idpreguntas = $idPregunta";
        $result = mysqli_query($conexion, $sql);
        $sql = "UPDATE respuestas SET contenido = '$respuestaCorrecta' WHERE idrespuestas = $idRespuestaCorrecta";
        $result = mysqli_query($conexion, $sql);
        $sql = "UPDATE respuestas SET contenido = '$respuesta1' WHERE idrespuestas = $idRespuesta1";
        $result = mysqli_query($conexion, $sql);
        $sql = "UPDATE respuestas SET contenido = '$respuesta2' WHERE idrespuestas = $idRespuesta2";
        $result = mysqli_query($conexion, $sql);
        $sql = "UPDATE respuestas SET contenido = '$respuesta3' WHERE idrespuestas = $idRespuesta3";
        echo $result = mysqli_query($conexion, $sql);
    }

    function buscaRepetido($idPregunta, $pregunta, $respuestaCorrecta, $respuesta1, $respuesta2,  $respuesta3, $conexion){
        $sql = "SELECT * from preguntas WHERE contenido = '$pregunta'";
        $result1 = mysqli_query($conexion, $sql);
        $sql = "SELECT * from respuestas WHERE contenido = '$respuestaCorrecta' AND preguntas_idpreguntas = '$idPregunta'";
        $result2 = mysqli_query($conexion, $sql);
        $sql = "SELECT * from respuestas WHERE contenido = '$respuesta1' AND preguntas_idpreguntas = '$idPregunta'";
        $result3 = mysqli_query($conexion, $sql);
        $sql = "SELECT * from respuestas WHERE contenido = '$respuesta2' AND preguntas_idpreguntas = '$idPregunta'";
        $result4 = mysqli_query($conexion, $sql);
        $sql = "SELECT * from respuestas WHERE contenido = '$respuesta3' AND preguntas_idpreguntas = '$idPregunta'";
        $result5 = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0 && mysqli_num_rows($result3) > 0 && mysqli_num_rows($result4) > 0 && mysqli_num_rows($result5) > 0){
            return 1;
        }else{
            return 0;
        }
    }
 ?>