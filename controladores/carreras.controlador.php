<?php

class ControladorCarreras {

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function ctrCrearCarrera(){

		if(isset($_POST["nuevaCarrera"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCarrera"])){

				$tabla = "carreras";  

				$datos = $_POST["nuevaCarrera"];

				$respuesta = ModeloCarreras::mdlIngresarCarrera($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>
					swal({
						  type: "success",
						  title: "La carrera ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carreras"; 
									}
								})
					</script>';
				}

			}else{

				echo'<script>
					swal({
						  type: "error",
						  title: "¡La carrera no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "carreras";  // Cambié "categorias" por "carreras"
							}
						})
			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CARRERAS
	=============================================*/

	static public function ctrMostrarCarreras($item, $valor){

		$tabla = "carreras";  // Cambié "categorias" por "carreras"

		$respuesta = ModeloCarreras::mdlMostrarCarreras($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CARRERA
	=============================================*/

	static public function ctrEditarCarrera(){

		if(isset($_POST["editarCarrera"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCarrera"])){

				$tabla = "carreras";  

				$datos = array("carrera"=>$_POST["editarCarrera"],
							   "id_carrera"=>$_POST["idCarrera"]);

				$respuesta = ModeloCarreras::mdlEditarCarrera($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>
					swal({
						  type: "success",
						  title: "La carrera ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carreras";  
									}
								})
					</script>';

				}

			}else{

				echo'<script>
					swal({
						  type: "error",
						  title: "¡La carrera no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "carreras";  // Cambié "categorias" por "carreras"
							}
						})
			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CARRERA
	=============================================*/

	static public function ctrBorrarCarrera(){

		if(isset($_GET["idCarrera"])){

			$tabla ="carreras";  // Cambié "categorias" por "carreras"
			$datos = $_GET["idCarrera"];

			$respuesta = ModeloCarreras::mdlBorrarCarrera($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>
					swal({
						  type: "success",
						  title: "La carrera ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carreras";  // Cambié "categorias" por "carreras"
									}
								})
					</script>';
			}
		}
		
	}
}
?>
