<?php
	session_start();
	require_once "conexion.php";
	$conexion = conexion();
	$id_ex = $_POST['id_ex'];
 ?>
<script src="js/funciones.js"></script>
<div class="row">
	<div class="col-sm-12">
	<h2>Preguntas<p style="text-align:right"><a href="php/salir.php" class="btn btn-info">Salir del sistema</a></p></h2>
		<table class="table table-hover table-condensed table-bordered" id= "tablaPreguntas">
		<caption>
			<button class = "btn btn-primary" data-toggle="modal" data-target="#modalNuevoPregunta" onclick="agregaPregunta('<?php echo $id_ex ?>')">
				Agregar una nueva pregunta
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<button class = "btn bt-secondary"  onclick = "cambiarTabla(-3)">
				Volver a examenes
			    <span class="glyphicon glyphicon-repeat"></span>
			</button>
		</caption>
			<thead>
				<tr class = "col text-center">
					<td>Pregunta</td>
					<td>Respuesta correcta</td>
					<td>Opcion 2</td>
					<td>Opcion 3</td>
					<td>Opcion 4</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>
			</thead>
			<tbody>
			<?php
			$sql = "SELECT * FROM preguntas WHERE examen_idexamen = $id_ex";
			$result1 = mysqli_query($conexion, $sql);
			while($datos_pregunta = mysqli_fetch_row($result1)){
				$full_info_pregunta = $datos_pregunta[0]."||".$datos_pregunta[1]."||".$datos_pregunta[2]."||".$datos_pregunta[3];
				$sql = "SELECT * FROM respuestas WHERE preguntas_idpreguntas = $datos_pregunta[0]";
				$result2 = mysqli_query($conexion, $sql);
				$i=0;
				$info_preguntas = array();
				while($datos_respuesta = mysqli_fetch_row($result2)){
					$info_preguntas[$i] = $datos_respuesta[$i];
					$info_preguntas[$i+1] = $datos_respuesta[$i];
					$info_preguntas[$i+2] = $datos_respuesta[$i];
					$info_preguntas[$i+3] = $datos_respuesta[$i];
					$full_info_pregunta = $full_info_pregunta."||".$info_preguntas[0+($i*4)]."||".$info_preguntas[1+($i*4)]."||".$info_preguntas[2+($i*4)]."||".$info_preguntas[3+($i*4)];
					$i = $i + 1;
				}
				?>
				<tr class = "col text-center">
					<td><?php echo $datos_pregunta[$i] ?></td>
					<td><?php echo $info_preguntas[$i+1] ?></td>
					<td><?php echo $info_preguntas[$i+2] ?></td>
					<td><?php echo $info_preguntas[$i+3] ?></td>
					<td><?php echo $info_preguntas[$i+4] ?></td>
					<td>
						<div class="col text-center">
							<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionPregunta" onclick="agregaformPreguntas('<?php echo $full_info_pregunta ?>')">
							</button>
						</div>
					</td>
					<td>
						<div class = "col text-center">
							<button class = "btn btn-danger glyphicon glyphicon-remove" onclick = "confirmarBorrarPregunta('<?php echo $datos_pregunta[0] ?>','<?php echo $datos_pregunta[1] ?>')">
							</button>
						</div>
					</td>
				</tr>
		<?php }?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPreguntas').DataTable({
			language:{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					},
					"buttons": {
						"copy": "Copiar",
						"colvis": "Visibilidad"
					}
			}
		});
	});
</script>