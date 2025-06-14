
<?php
// controlador/ControladorLicencias.php
class ControladorLicencias {

  static public function ctrCrearLicencia(){
    if(isset($_POST["nuevaCarrera"])){

      $rutaArchivo = "";
      if(isset($_FILES["justificativo"]["tmp_name"])){
        $archivo = $_FILES["justificativo"];
        $nombreArchivo = uniqid()."_".$archivo["name"];
        $rutaArchivo = "vistas/justificativos/".$nombreArchivo;
        move_uploaded_file($archivo["tmp_name"], $rutaArchivo);
      }

      $datos = array(
        "id_estudiante" => $_SESSION["id"],
        "id_carrera" => $_POST["nuevaCarrera"],
        "id_curso" => $_POST["nuevoCurso"],
        "fecha_inicio" => $_POST["fechaInicio"],
        "fecha_fin" => $_POST["fechaFin"],
        "motivo" => $_POST["motivo"],
        "justificativo" => $rutaArchivo
      );

      $respuesta = ModeloLicencias::mdlIngresarLicencia("licencias", $datos);

      if($respuesta == "ok"){
        echo '<script>
          swal({
            type: "success",
            title: "¡Licencia registrada exitosamente!",
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if (result.value) {
              window.location = "licencia";
            }
          });
        </script>';
      }
    }
  }
}
?>