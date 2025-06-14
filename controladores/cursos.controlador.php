<?php

class ControladorCursos{

	/*=============================================
	CREAR CURSO
	=============================================*/

	static public function ctrCrearCurso(){

		if(isset($_POST["nuevoCurso"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCurso"]) && 
			   is_numeric($_POST["nuevaCarrera"])){

				$tabla = "cursos";

				$datos = array("curso" => $_POST["nuevoCurso"],
							  "idCarrera" => $_POST["nuevaCarrera"]);

				$respuesta = ModeloCursos::mdlIngresarCurso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El curso ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cursos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El curso no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cursos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CURSOS (CON JOIN A CARRERAS)
	=============================================*/

	static public function ctrMostrarCursos($item, $valor){

		$tabla = "cursos";

		$respuesta = ModeloCursos::mdlMostrarCursos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR CARRERAS (PARA SELECT)
	=============================================*/

	static public function ctrMostrarCarreras(){

		$tabla = "carreras";

		$respuesta = ModeloCursos::mdlMostrarCarreras($tabla);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CURSO
	=============================================*/

	static public function ctrEditarCurso(){

		if(isset($_POST["editarCurso"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCurso"]) && 
			   is_numeric($_POST["editarCarrera"])){

				$tabla = "cursos";

				$datos = array("curso" => $_POST["editarCurso"],
							  "idCarrera" => $_POST["editarCarrera"],
							  "id" => $_POST["idCurso"]);

				$respuesta = ModeloCursos::mdlEditarCurso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El curso ha sido actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cursos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El curso no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cursos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CURSO
	=============================================*/

	static public function ctrBorrarCurso(){

		if(isset($_GET["idCurso"])){

			$tabla = "cursos";
			$datos = $_GET["idCurso"];

			$respuesta = ModeloCursos::mdlBorrarCurso($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El curso ha sido eliminado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cursos";

									}
								})

					</script>';
			}
		}
		
	}
}