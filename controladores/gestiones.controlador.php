<?php

class ControladorGestiones{

	/*=============================================
	CREAR GESTIÓN
	=============================================*/

	static public function ctrCrearGestion(){

		if(isset($_POST["nuevaGestion"])){

			if(preg_match('/^[0-9]{4}$/', $_POST["nuevaGestion"])){

				$tabla = "gestiones";

				$datos = $_POST["nuevaGestion"];

				$respuesta = ModeloGestiones::mdlIngresarGestion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La gestión ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gestiones";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La gestión no puede ir vacía o tener caracteres no válidos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gestiones";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR GESTIONES
	=============================================*/

	static public function ctrMostrarGestiones($item, $valor){

		$tabla = "gestiones";

		$respuesta = ModeloGestiones::mdlMostrarGestiones($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR GESTIÓN
	=============================================*/

	static public function ctrEditarGestion(){

		if(isset($_POST["editarGestion"])){

			if(preg_match('/^[0-9]{4}$/', $_POST["editarGestion"])){

				$tabla = "gestiones";

				$datos = array("gestion"=>$_POST["editarGestion"],
							   "id_gestion"=>$_POST["idGestion"]);

				$respuesta = ModeloGestiones::mdlEditarGestion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La gestión ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gestiones";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La gestión no puede ir vacía o tener caracteres no válidos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gestiones";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR GESTIÓN
	=============================================*/

	static public function ctrBorrarGestion(){

		if(isset($_GET["idGestion"])){

			$tabla = "gestiones";
			$datos = $_GET["idGestion"];

			$respuesta = ModeloGestiones::mdlBorrarGestion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La gestión ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gestiones";

									}
								})

					</script>';
			}
		}
		
	}
}
