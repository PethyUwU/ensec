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

      console.log(respuesta); // para debug

      // Asigna valores en los campos
      $("#editarCurso").val(respuesta["curso"]);
      $("#idCurso").val(respuesta["id_curso"]);

      $("#editarCarrera").val(respuesta["id_carrera"]);
      $("#carreraActual").text(respuesta["carrera"]);
      $("#carreraActual").val(respuesta["id_carrera"]);
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