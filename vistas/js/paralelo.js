// Editar Paralelo
$(".tablas").on("click", ".btnEditarParalelo", function() {
    var idParalelo = $(this).attr("idParalelo");
    
    var datos = new FormData();
    datos.append("idParalelo", idParalelo);
  
    $.ajax({
      url: "ajax/paralelos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        $("#editarParalelo").val(respuesta["paralelo"]);
        $("#idParalelo").val(respuesta["id_paralelo"]);
      }
    });
  }); 
  
  // Eliminar Paralelo
  $(".tablas").on("click", ".btnEliminarParalelo", function() {
    var idParalelo = $(this).attr("idParalelo");
    
    swal({
      title: '¿Está seguro de borrar el paralelo?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar paralelo!'
    }).then((result) => {
      if (result.value) {
        window.location = "index.php?ruta=paralelo&idParalelo="+idParalelo;
      }
    });
  });