<?php
	session_start();
	require_once "conexion.php";
	$conexion = conexion();
 ?>
<script src="js/funciones.js"></script>
<div class="row">
	<div class="col-sm-12">
		<h2>Alumnos <p style="text-align:right"><a href="php/salir.php" class="btn btn-info">Salir del sistema</a></p></h2>
		<table class="table table-hover table-condensed table-bordered" id="tablaAlumnos">
		<caption>
			<button class = "btn btn-primary" data-toggle="modal" data-target="#modalNuevoAl">
				Agregar un alumno nuevo
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<button class = "btn bt-secondary"  onclick = "cambiarTabla(-1)">
				Grupos
			    <span class="glyphicon glyphicon-apple"></span>
			</button>
			<button class = "btn bt-secondary"  onclick = "cambiarTabla(-3)">
				Examenes
			    <span class="glyphicon glyphicon-file"></span>
			</button>
		</caption>
			<thead>
				<tr class = "col text-center">
					<td>Nombre del alumno</td>
					<td>Apellido</td>
					<td>Usuario</td>
					<td>Grupo</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM alumnos";
				$result = mysqli_query($conexion, $sql);
				while($datos = mysqli_fetch_row($result)){
					$full_info = $datos[0]."||".$datos[1]."||".$datos[2]."||".$datos[3]."||".$datos[4]."||".$datos[5]; ?>
					<tr class = "col text-center">
						<td><?php echo $datos[2] ?></td>
						<td><?php echo $datos[3] ?></td>
						<td><?php echo $datos[4]?></td>
						<td><?php
							$sql2 = "SELECT nombre_grupo FROM grupos WHERE idgrupos = '$datos[1]'";
							$res = mysqli_query($conexion, $sql2);
							$grup = mysqli_fetch_row($res);
							echo "$grup[0]";
							?></td>
						<td>
							<div class="col text-center">
								<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionAl" onclick="agregaformAl('<?php echo $full_info ?>')">
								</button>
							</div>
						</td>
						<td>
							<div class = "col text-center">
								<button class = "btn btn-danger glyphicon glyphicon-remove" onclick = "confirmarBorrarAl('<?php echo $datos[0] ?>')">
								</button>
							</div>
						</td>
					</tr>
				<?php   } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaAlumnos').DataTable({
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
