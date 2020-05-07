<?php
	require_once "conexion.php";
    $conexion = conexion();

	$preguntas = $_POST['preguntas'];
	$nombre_examen = $_POST['nombre_examen'];

	if(buscaRepetido($nombre_examen, $conexion) == 1){
		echo 2;
	}else{
		$sql = "INSERT into examen (preguntas, nombre_examen) VALUES ($preguntas, '$nombre_examen')";
		echo $result = mysqli_query($conexion, $sql);
	}

	function buscaRepetido($nombre_examen, $conexion){
		$sql = "SELECT * from examen WHERE nombre_examen = '$nombre_examen'";
		$result = mysqli_query($conexion, $sql);

		if(mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}
 ?>