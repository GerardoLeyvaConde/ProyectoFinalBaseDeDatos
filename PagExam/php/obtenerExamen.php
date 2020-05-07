<?php
	session_start();
	require_once "conexion.php";
	$conexion = conexion();
 ?>
<script src="js/funciones.js"></script>
<div class="row">
	<div class="col-sm-12">
	<h2>Examenes<p style="text-align:right"><a href="php/salir.php" class="btn btn-info">Salir del sistema</a></p></h2>
		<table class="table table-hover table-condensed table-bordered" id= "tablaExamenes">
		<caption>
			<button class = "btn btn-primary" data-toggle="modal" data-target="#modalNuevoExamen">
				Agregar un examen nuevo
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<button class = "btn bt-secondary"  onclick = "cambiarTabla(-1)">
				Grupos
			    <span class="glyphicon glyphicon-apple"></span>
			</button>
			<button class = "btn bt-secondary"  onclick = "cambiarTabla(-2)">
				Alumnos
			    <span class="glyphicon glyphicon-user"></span>
			</button>
		</caption>
			<thead>
				<tr class = "col text-center">
					<td>Nombre del examen</td>
					<td>Cantidad maxima de preguntas</td>
					<td>Modificar posibles preguntas</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>
			</thead>
			<tbody>
				<?php
			$sql = "SELECT * FROM examen";
			$result = mysqli_query($conexion, $sql);
			while($datos = mysqli_fetch_row($result)){
				$full_info = $datos[0]."||".$datos[1]."||".$datos[2]; ?>
				<tr class = "col text-center">
					<td><?php echo $datos[2] ?></td>
					<td><?php echo $datos[1] ?></td>
					<td>
						<div class="col text-center">
							<button class="btn btn-warning glyphicon glyphicon-cog" onclick="cambiarTabla(<?php echo $datos[0] ?>)">
							</button>
						</div>
					</td>
					<td>
						<div class="col text-center">
							<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionExamen" onclick="agregaformExamen('<?php echo $full_info ?>')">
							</button>
						</div>
					</td>
					<td>
						<div class = "col text-center">
							<button class = "btn btn-danger glyphicon glyphicon-remove" onclick = "confirmarBorrarExamen('<?php echo $datos[0] ?>')">
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
		$('#tablaExamenes').DataTable({
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