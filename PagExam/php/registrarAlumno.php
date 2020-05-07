<?php 

	require_once "conexion.php";
	$conexion = conexion();

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$grupo = $_POST['grupo'];

	if(buscaRepetido($usuario, $contrasena, $conexion) == 1){
		echo 2;
	}else{
		$sql = "INSERT into alumnos (grupos_idgrupos, NOMBRE, APELLIDO, USUARIO, CONTRASENA) VALUES ('$grupo','$nombre','$apellido','$usuario','$contrasena')";
		echo $result = mysqli_query($conexion, $sql);
	}


	function buscaRepetido($usuario, $contrasena, $conexion){
		$sql = "SELECT * from alumnos WHERE usuario ='$usuario' and contrasena ='$contrasena'";
		$result = mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}
 ?>

 