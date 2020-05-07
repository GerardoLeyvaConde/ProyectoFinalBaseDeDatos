<?php
	require_once "conexion.php";
	$conexion = conexion();


	$nombre_pregunta = $_POST['nombre_pregunta'];
	$respuesta_correcta = $_POST['respuesta_correcta'];
	$idEx = $_POST['idEx'];
	$respuesta1 = $_POST['respuesta1'];
	$respuesta2 = $_POST['respuesta2'];
	$respuesta3 = $_POST['respuesta3'];

	if(buscaRepetido($nombre_pregunta, $idEx, $conexion) == 1){
		echo 2;
	}else{
		$sql = "INSERT into preguntas (examen_idexamen, contenido) VALUES ('$idEx','$nombre_pregunta')";
		$result = mysqli_query($conexion, $sql);

		$sql1 = "SELECT * FROM preguntas WHERE  examen_idexamen = $idEx AND contenido = $nombre_pregunta";
		$result1 = mysqli_query($conexion, $sql1);
		$datos = mysqli_fetch_row($result1);

		$sql2 = "INSERT into respuestas (preguntas_idpreguntas, contenido, correcta) VALUES ('$datos[0]','$respuesta_correcta',1)";
		$result2 = mysqli_query($conexion, $sql2);
		$sql3 = "INSERT into respuestas (preguntas_idpreguntas, contenido, correcta) VALUES ('$datos[0]','$respuesta1',0)";
		$result3 = mysqli_query($conexion, $sql3);
		$sql4 = "INSERT into respuestas (preguntas_idpreguntas, contenido, correcta) VALUES ('$datos[0]','$respuesta2',0)";
		$result4 = mysqli_query($conexion, $sql4);
		$sql5 = "INSERT into respuestas (preguntas_idpreguntas, contenido, correcta) VALUES ('$datos[0]','$respuesta3',0)";
		echo $result5 = mysqli_query($conexion, $sql5);

	}


	function buscaRepetido($nombre_pregunta, $idEx, $conexion){
		$sql = "SELECT * from preguntas WHERE examen_idexamen ='$idEx' and contenido ='$nombre_pregunta'";
		$result = mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}
 ?>

