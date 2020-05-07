<?php
	session_start();

	if(isset($_SESSION['user'])){

 ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
  	<script src="js/funciones.js"></script>
</head>
<body>
	<div class="container">
		<div id="tabla"></div>
	</div>

	<!-- Modal para registros nuevos grupos-->

	<div class="modal fade" id="modalNuevoGrupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agrega nuevo grupo</h4>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input type="text" name="" id="nombreGrupoAgregar" class="form-control input-sm">
					<label>Encargado: </label>
					<select id="encargadoGrupoAgregar" class="form-control input-sm">
						<option value = "0">Seleccione a un profesor</option>
						<?php
							require_once "php/conexion.php";
							$conexion=conexion();
							$sql = "SELECT idmaestros, nombre, apellido FROM maestros";
							$result = mysqli_query($conexion,$sql);
							while($datos = mysqli_fetch_row($result)):
						?>
							<option value = "<?php echo $datos[0]?>">
								<?php echo "$datos[0] $datos[1] $datos[2]"?>
							</option>
						<?php endwhile;?>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="guardarNuevoGrupo">
					Agregar
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal para edicion de datos grupo -->

	<div class="modal fade" id="modalEdicionGrupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar datos de un grupo</h4>
				</div>
				<div class="modal-body">
					<input type="text" hidden="" id="idGRupoEdit" name="">
					<label>Nombre</label>
					<input type="text" name="" id="nombreGrupoEdit" class="form-control input-sm">
					<label>Encargado</label>
					<select id="encargadoEdit" class="form-control input-sm">
						<option value = "0">Seleccione a un profesor</option>
						<?php
							$conexion=conexion();
							$sql = "SELECT idmaestros, nombre, apellido FROM maestros";
							$result = mysqli_query($conexion,$sql);
							while($datos = mysqli_fetch_row($result)):
						?>
							<option value = "<?php echo $datos[0]?>">
								<?php echo "$datos[0] $datos[1] $datos[2]"?>
							</option>
						<?php endwhile;?>
					</select>
					<div class="col text-center modal-footer">
						<button type="button" class="btn btn-success" id="actualizarDatosGrupos" data-dismiss="modal">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal para registros nuevos alumnos-->

	<div class="modal fade" id="modalNuevoAl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agrega nuevo alumno</h4>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input type="text" name="" id="nombreAlAgregar" class="form-control input-sm">
					<label>Apellido</label>
					<input type="text" name="" id="apellidoAlAgregar" class="form-control input-sm">
					<label>Grupo </label>
					<select id="grupoAlAgregar" class="form-control input-sm">
						<option value = "0">Seleccione a un grupo</option>
						<?php
							require_once "php/conexion.php";
							$conexion=conexion();
							$sql = "SELECT * FROM grupos";
							$result = mysqli_query($conexion,$sql);
							while($datos = mysqli_fetch_row($result)):?>
							<option value = "<?php echo $datos[0]?>">
								<?php echo "$datos[0] $datos[2]"?>
							</option>
						<?php endwhile;?>
					</select>
					<label>Usuario</label>
					<input type="text" name="" id="usuarioAlAgregar" class="form-control input-sm">
					<label>Contraseña</label>
					<input type="text" name="" id="contraAlAgregar" class="form-control input-sm">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="guardarNuevoAlumno">
					Agregar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal para edicion de datos alumnos-->
	<div class="modal fade" id="modalEdicionAl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar datos de un alumno</h4>
				</div>
				<div class="modal-body">
					<input type="text" hidden="" id="idAlEdit" name="">
					<label>Nombre</label>
					<input type="text" name="" id="nombreAlEdit" class="form-control input-sm">
					<label>Apellido</label>
					<input type="text" name="" id="apellidoAlEdit" class="form-control input-sm">
					<label>Grupo </label>
					<select id="grupoAlEdit" class="form-control input-sm">
						<option value = "0">Seleccione a un grupo</option>
						<?php
							require_once "php/conexion.php";
							$conexion=conexion();
							$sql = "SELECT * FROM grupos";
							$result = mysqli_query($conexion,$sql);
							while($datos = mysqli_fetch_row($result)):?>
							<option value = "<?php echo $datos[0]?>">
								<?php echo "$datos[0] $datos[2]"?>
							</option>
						<?php endwhile;?>
					</select>
					<label>Usuario</label>
					<input type="text" name="" id="usuarioAlEdit" class="form-control input-sm">
					<label>Contraseña</label>
					<input type="text" name="" id="contraAlEdit" class="form-control input-sm">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="actualizarDatosAl">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal para registros nuevos Preguntas-->

	<div class="modal fade" id="modalNuevoPregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agrega nueva pregunta</h4>
				</div>
				<div class="modal-body">
					<input type="text" hidden="" id="idPreguntaIdEx">
					<label>Pregunta</label>
					<input type="text" name="" id="preguntaAgregar" class="form-control input-sm">
					<label>Respuesta correcta</label>
					<input type="text" name="" id="respuestaCorrectaAgregar" class="form-control input-sm">
					<label>opciones adicionales</label>
					<input type="text" name="" id="respuesta1Agregar" class="form-control input-sm">
					<input type="text" name="" id="respuesta2Agregar" class="form-control input-sm">
					<input type="text" name="" id="respuesta3Agregar" class="form-control input-sm">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="guardarNuevoPregunta">
					Agregar
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal para edicion de datos de Preguntas -->

	<div class="modal fade" id="modalEdicionPregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar datos de pregunta</h4>
				</div>
				<div class="modal-body">
					<input type="text" hidden="" id="idPreguntaEdit" name="">
					<label>Pregunta</label>
					<input type="text" name="" id="preguntaEdit" class="form-control input-sm">
					<label>Respuesta correcta</label>
					<input type="text" name="" id="respuestaCorrectaEdit" class="form-control input-sm">
					<label>opciones adicionales</label>
					<input type="text" name="" id="respuesta1Edit" class="form-control input-sm">
					<input type="text" name="" id="respuesta2Edit" class="form-control input-sm">
					<input type="text" name="" id="respuesta3Edit" class="form-control input-sm">
					<div class="col text-center modal-footer">
						<button type="button" class="btn btn-success" id="actualizarDatosPregunta" data-dismiss="modal">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal para registros nuevos Examenes-->

	<div class="modal fade" id="modalNuevoExamen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agrega nuevo examen</h4>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input type="text" name="" id="nombreExamenAgregar" class="form-control input-sm">
					<label>Preguntas</label>
					<input type="text" name="" id="preguntasExamenAgregar" class="form-control input-sm">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="guardarNuevoExamen">
					Agregar
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal para edicion de datos de examenes -->

	<div class="modal fade" id="modalEdicionExamen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar datos de un examen</h4>
				</div>
				<div class="modal-body">
					<input type="text" hidden="" id="idExamenEdit" name="">
					<label>Nombre</label>
					<input type="text" name="" id="nombreExamenEdit" class="form-control input-sm">
					<label>Preguntas</label>
					<input value="0" name="" id="preguntasExamenEdit" class="form-control input-sm">
					<div class="col text-center modal-footer">
						<button type="button" class="btn btn-success" id="actualizarDatosExamenes" data-dismiss="modal">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type = "text/javascript">
	$(document).ready(function(){
		cambiarTabla(-1);
	});
</script>

<script type = "text/javascript">
    $(document).ready(function(){
        $('#guardarNuevoGrupo').click(function(){
          nombreGrupo = $('#nombreGrupoAgregar').val();
          encargado = $('#encargadoGrupoAgregar').val();
         registrarGrupo(nombreGrupo,encargado);
        });

        $('#actualizarDatosGrupos').click(function(){
			actualizaGrupo();
		});

		$('#guardarNuevoAlumno').click(function(){
			nombreAl = $('#nombreAlAgregar').val();
			apellidoAl = $('#apellidoAlAgregar').val();
			grupoAl = $('#grupoAlAgregar').val();
			usuarioAl = $('#usuarioAlAgregar').val();
			contraAl = $('#contraAlAgregar').val();
			registrarAlumno(nombreAl, apellidoAl, grupoAl, usuarioAl, contraAl);
		});

		$('#actualizarDatosAl').click(function(){
			actualizarAlumno();
		})

		$('#guardarNuevoExamen').click(function(){
			nombre_examen = $('#nombreExamenAgregar').val();
			preguntas = $('#preguntasExamenAgregar').val();

			registrarExamen(nombre_examen, preguntas);
		});

		$('#actualizarDatosExamenes').click(function(){
			actualizarExamen();
		})

		$('#guardarNuevoPregunta').click(function(){
			nombre_pregunta = $('#preguntaAgregar').val();
			respuesta_correcta = $('#respuestaCorrectaAgregar').val();
			respuesta1 = $('#respuesta1Agregar').val();
			respuesta2 = $('#respuesta2Agregar').val();
			respuesta3 = $('#respuesta3Agregar').val();


			registrarPregunta(nombre_pregunta, respuesta_correcta,respuesta1,respuesta2,respuesta3);

		});

		$('#actualizarDatosPregunta').click(function(){
			actualizarPregunta();
		})

    });
</script>

<?php
} else {
	header("location:index.php");
	}
 ?>
