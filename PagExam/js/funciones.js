//--------------------------FUNCIONES PARA GRUPOS---------------------------------------------------------------------
function registrarGrupo(nombreGrupo, encargado){
	cadena = "encargado=" + encargado +
            "&nombre_grupo=" + nombreGrupo;

	$.ajax({
		type:"POST",
		url:"php/registrarGrupo.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerGrupo.php');
				$('#buscador').load('php/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function agregaformGrupo(datos){

    d = datos.split('||');
    $('#idGRupoEdit').val(d[0])
	$('#encargadoEdit').val(d[1]);
	$('#nombreGrupoEdit').val(d[2]);
}

function actualizaGrupo(){
    id = $('#idGRupoEdit').val();
	nuevoNombre = $('#nombreGrupoEdit').val();
    nuevoEncargado = $('#encargadoEdit').val();

    cadena= "idgrupos=" + id +
            "&encargado=" + nuevoEncargado +
			"&nombre_grupo=" + nuevoNombre;

	$.ajax({
		type:"POST",
		url:"php/actualizarGrupo.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerGrupo.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function confirmarBorrarGrupo(id){
	alertify.confirm('Eliminar grupo', '¿Esta seguro de eliminar este grupo?',
					function(){ eliminarGrup(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarGrup(id){

	cadena = "idgrupos=" + id;

	$.ajax({
		type:"POST",
		url:"php/eliminarGrupo.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerGrupo.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

//--------------------------FUNCION PARA CAMBIAR LA TABLA---------------------------------------------------------------------
function cambiarTabla(t){
	if(t == -1){
		$('#tabla').load('php/obtenerGrupo.php');
	}else if(t == -2){
		$('#tabla').load('php/obtenerAlumno.php');
	}else if(t == -3){
		$('#tabla').load('php/obtenerExamen.php');
	}else{
		alert("UPS. zona en construcción :(s");
		//$('#tabla').load('php/obtenerPregunta.php',{'id_ex': t});
		//$('#tabla').load('php/obtenerExamen.php');
	}
}

//--------------------------FUNCION PARA ALUMNOS---------------------------------------------------------------------

function registrarAlumno(nombreAl, apellidoAl, grupoAl, usuarioAl, contraAl){
	cadena ="grupo=" + grupoAl +
			"&nombre=" + nombreAl +
			"&apellido=" + apellidoAl +
			"&usuario=" + usuarioAl +
			"&contrasena=" + contraAl;

	$.ajax({
		type:"POST",
		url:"php/registrarAlumno.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerAlumno.php');
				$('#buscador').load('php/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function agregaformAl(datos){
    d = datos.split('||');
    $('#idAlEdit').val(d[0])
	$('#nombreAlEdit').val(d[2]);
	$('#apellidoAlEdit').val(d[3]);
	$('#grupoAlEdit').val(d[1]);
	$('#usuarioAlEdit').val(d[4]);
	$('#contraAlEdit').val(d[5]);
}

function actualizarAlumno(){
	id = $('#idAlEdit').val()
	nombre = $('#nombreAlEdit').val();
	apellido = $('#apellidoAlEdit').val();
	grupo = $('#grupoAlEdit').val();
	usuario = $('#usuarioAlEdit').val();
	contra = $('#contraAlEdit').val();

	cadena ="id=" + id +
			"&grupo=" + grupo +
			"&nombre=" + nombre +
			"&apellido=" + apellido +
			"&usuario=" + usuario +
			"&contrasena=" + contra;
	$.ajax({
		type:"POST",
		url:"php/actualizarAlumno.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerAlumno.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function confirmarBorrarAl(id){
	alertify.confirm('Eliminar alumno', '¿Esta seguro de eliminar este alumno?',
					function(){ eliminarAl(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarAl(id){

	cadena = "idAl=" + id;

	$.ajax({
		type:"POST",
		url:"php/eliminarAlumno.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerAlumno.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

//--------------------------FUNCIONES PARA EXAMENES---------------------------------------------------------------------
function registrarExamen(nombreExamen, preguntas){
	cadena = "preguntas=" + preguntas +
            "&nombre_examen=" + nombreExamen;

	$.ajax({
		type:"POST",
		url:"php/registrarExamen.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerExamen.php');
				$('#buscador').load('php/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function agregaformExamen(datos){

    d = datos.split('||');
    $('#idExamenEdit').val(d[0])
	$('#preguntasEdit').val(d[1]);
	$('#nombreExamenEdit').val(d[2]);
}

function actualizarExamen(){
    id = $('#idExamenEdit').val();
    nuevoPreguntas = $('#preguntasExamenEdit').val();
	nuevoNombre = $('#nombreExamenEdit').val();

    cadena= "idexamen=" + id +
            "&preguntas=" + nuevoPreguntas +
			"&nombre_examen=" + nuevoNombre;

	$.ajax({
		type:"POST",
		url:"php/actualizarExamen.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerExamen.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(" + r);
			}
		}
	});

}

function confirmarBorrarExamen(id){
	alertify.confirm('Eliminar examen', '¿Esta seguro de eliminar este examen?',
					function(){ eliminarExamen(id) }
                , function(){ alertify.error('Se cancelo')});

}

function eliminarExamen(id){

	cadena = "idexamen=" + id;

	$.ajax({
		type:"POST",
		url:"php/eliminarExamen.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerExamen.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}
//--------------------------FUNCIONES PARA PREGUNTAS---------------------------------------------------------------------
function agregaPregunta( id_ex ){
	$('#idPreguntaIdEx').val(id_ex);
}
function test(){
	alertify.success("agregado con exito :)");

}
function registrarPregunta(nombre_pregunta, respuesta_correcta, respuesta1, respuesta2, respuesta3){

	idPreguntaIdEx = $('#idPreguntaIdEx').val();

	cadena = "nombre_pregunta=" + nombre_pregunta +
			"&idEx=" + idPreguntaIdEx +
            "&respuesta_correcta=" + respuesta_correcta +
            "&respuesta1=" + respuesta1 +
            "&respuesta2=" + respuesta2 +
            "&respuesta3=" + respuesta3;
	$.ajax({
		type:"POST",
		url:"php/registrarPregunta.php",
		data:cadena,
		success:function(r){
			if(r == 6){
				$('#tabla').load('php/obtenerPregunta.php',{'id_ex': idPreguntaIdEx});
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function agregaformPregunta(datos){

    d = datos.split('||');
    $('#idPreguntaEdit').val(d[0])
    $('#idPreguntaIdEx').val(d[1]);
    $('#PreguntaEdit').val(d[3])
    $('#idRespuestaCorrectaEdit').val(d[4])
    $('#respuestaCorrectaEdit').val(d[6])
    $('#idRespuesta1Edit').val(d[8])
    $('#respuesta1Edit').val(d[10])
    $('#idRespuesta2Edit').val(d[12])
    $('#respuesta2Edit').val(d[14])
    $('#idRespuesta3Edit').val(d[16])
    $('#respuesta3Edit').val(d[18])

}

function actualizarPregunta(){
	idPregunta = $('#idPreguntaEdit').val();
    pregunta = $('#PreguntaEdit').val();
    idRespuestaCorrecta = $('#idRespuestaCorrectaEdit').val();
    respuestaCorrecta = $('#respuestaCorrectaEdit').val();
    idRespuesta1 = $('#idRespuesta1Edit').val();
    respuesta1 = $('#respuesta1Edit').val();
    idRespuesta2 = $('#idRespuesta2Edit').val();
    respuesta2 = $('#respuesta2Edit').val();
    idRespuesta3 = $('#idRespuesta3Edit').val();
    respuesta3 = $('#respuesta3Edit').val();

    cadena= "idPregunta=" + idPregunta +
            "&pregunta=" + pregunta +
            "&idRespuestaCorrecta=" + idRespuestaCorrecta +
            "&respuestaCorrecta=" + respuestaCorrecta +
            "&idRespuesta1=" + idRespuesta1 +
            "&respuesta1=" + respuesta1 +
            "&idRespuesta2=" + idRespuesta2 +
            "&respuesta2=" + respuesta2 +
            "&idRespuesta3=" + idRespuesta3 +
			"&respuesta3=" + respuesta3;

	$.ajax({
		type:"POST",
		url:"php/actualizarPregunta.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerPregunta.php',{'id_ex': idPreguntaIdEx});
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function confirmarBorrarPregunta(idPreguntaBorrar,idExamenBorrar){
	alertify.confirm('Eliminar pregunta', '¿Esta seguro de eliminar esta pregunta?',
					function(){ eliminarPregunta(idPreguntaBorrar,idExamenBorrar) }
                , function(){ alertify.error('Se cancelo')});

}

function eliminarPregunta(idPreguntaBorrar,idPreguntaIdEx){

	cadena = "idpregunta=" + idPreguntaBorrar;

	$.ajax({
		type:"POST",
		url:"php/eliminarPregunta.php",
		data:cadena,
		success:function(r){
			if(r == 1){
				$('#tabla').load('php/obtenerPregunta.php',{'id_ex': idPreguntaIdEx});
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}