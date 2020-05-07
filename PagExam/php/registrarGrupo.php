<?php 
	require_once "conexion.php";
    $conexion = conexion();

	$encargado = $_POST['encargado'];
	$nombre_grup = $_POST['nombre_grupo'];

	if(buscaRepetido($nombre_grup, $conexion) == 1){
		echo 2;
	}else{
		$sql = "INSERT into grupos (encargado, nombre_grupo) VALUES ($encargado, '$nombre_grup')";
		echo $result = mysqli_query($conexion, $sql);
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