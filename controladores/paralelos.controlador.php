<?php

class ControladorParalelos {
  /*=============================================
  MOSTRAR PARALELOS
  =============================================*/
  static public function ctrMostrarParalelos($item, $valor) {
    $tabla = "paralelo";
    $respuesta = ParaleloModel::mdlMostrarParalelos($tabla, $item, $valor);
    return $respuesta;
  }

  /*=============================================
  CREAR PARALELO
  =============================================*/
  public function ctrCrearParalelo() {
    if(isset($_POST["nuevoParalelo"])) {
      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoParalelo"])) {
        $tabla = "paralelo";
        $datos = $_POST["nuevoParalelo"];
        
        $respuesta = ParaleloModel::mdlCrearParalelo($tabla, $datos);
        
        if($respuesta == "ok") {
          echo '<script>
                  swal({
                    type: "success",
                    title: "¡El paralelo ha sido guardado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                  }).then(function(result){
                    if(result.value){
                      window.location = "paralelo";
                    }
                  });
                </script>';
        }
      } else {
        echo '<script>
                swal({
                  type: "error",
                  title: "¡El paralelo no puede ir vacío o llevar caracteres especiales!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "paralelo";
                  }
                });
              </script>';
      }
    }
  }

  /*=============================================
  EDITAR PARALELO
  =============================================*/
  public function ctrEditarParalelo() {
    if(isset($_POST["editarParalelo"])) {
      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarParalelo"])) {
        $tabla = "paralelo";
        $datos = array(
          "paralelo" => $_POST["editarParalelo"],
          "id" => $_POST["idParalelo"]
        );
        
        $respuesta = ParaleloModel::mdlEditarParalelo($tabla, $datos);
        
        if($respuesta == "ok") {
          echo '<script>
                  swal({
                    type: "success",
                    title: "¡El paralelo ha sido actualizado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                  }).then(function(result){
                    if(result.value){
                      window.location = "paralelo";
                    }
                  });
                </script>';
        }
      } else {
        echo '<script>
                swal({
                  type: "error",
                  title: "¡El paralelo no puede ir vacío o llevar caracteres especiales!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "paralelo";
                  }
                });
              </script>';
      }
    }
  }

  /*=============================================
  BORRAR PARALELO
  =============================================*/
  public function ctrBorrarParalelo() {
    if(isset($_GET["idParalelo"])) {
      $tabla = "paralelo";
      $datos = $_GET["idParalelo"];
      
      $respuesta = ParaleloModel::mdlBorrarParalelo($tabla, $datos);
      
      if($respuesta == "ok") {
        echo '<script>
                swal({
                  type: "success",
                  title: "¡El paralelo ha sido eliminado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "paralelo";
                  }
                });
              </script>';
      }
    }
  }
}
?>