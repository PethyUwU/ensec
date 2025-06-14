$(document).ready(function(){

    /*=============================================
    EDITAR CURSO
    =============================================*/
  
    $(".btnEditarCurso").click(function(){
  
      var idCurso = $(this).attr("idCurso");
      
      var datos = new FormData();
      datos.append("idCurso", idCurso);
  
      $.ajax({
  
        url: "ajax/cursos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
  
          $("#editarCurso").val(respuesta["curso"]);
          $("#editarCarrera").val(respuesta["idCarrera"]);
          $("#idCurso").val(respuesta["id"]);
          
          // Actualizar el texto de la opción seleccionada
          $("#carreraActual").text(respuesta["carrera"]);
          $("#carreraActual").val(respuesta["idCarrera"]);
  
        }
  
      });
  
    });
  
    /*=============================================
    ELIMINAR CURSO
    =============================================*/
  
    $(".btnEliminarCurso").click(function(){
  
      var idCurso = $(this).attr("idCurso");
      
      swal({
        title: '¿Está seguro de borrar el curso?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar curso!'
      }).then((result) => {
        
        if (result.value) {
          
          window.location = "index.php?ruta=cursos&idCurso="+idCurso;
  
        }
  
      });
  
    });
  
  });