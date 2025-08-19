/*=============================================
EDITAR GESTION
=============================================*/
$(".tablas").on("click", ".btnEditarGestion", function(){

	var idGestion = $(this).attr("idGestion");

	var datos = new FormData();
	datos.append("idGestion", idGestion);

	$.ajax({
		url: "ajax/gestiones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarGestion").val(respuesta["gestion"]);
     		$("#idGestion").val(respuesta["id_gestion"]);

     	}

	})

})

/*=============================================
ELIMINAR GESTION
=============================================*/
$(".tablas").on("click", ".btnEliminarGestion", function(){

	 var idGestion = $(this).attr("idGestion");

	 swal({
	 	title: '¿Está seguro de borrar la gestión?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar gestión!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=gestiones&idGestion="+idGestion;


	 	}

	 })

})
