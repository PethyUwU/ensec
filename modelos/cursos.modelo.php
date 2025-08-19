<?php

require_once "conexion.php";
 
class ModeloCursos{

	/*=============================================
	CREAR CURSO
	=============================================*/

	static public function mdlIngresarCurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(curso, id_carrera) VALUES (:curso, :id_carrera)");

		$stmt->bindParam(":curso", $datos["curso"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	MOSTRAR CURSOS (CON JOIN A CARRERAS)
	=============================================*/

static public function mdlMostrarCursos($tabla, $item, $valor){

  if($item != null){
    $stmt = Conexion::conectar()->prepare("
      SELECT c.id_curso, c.curso, c.id_carrera, ca.carrera 
      FROM $tabla c
      INNER JOIN carreras ca ON c.id_carrera = ca.id_carrera
      WHERE c.$item = :$item
    ");

    $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();

  } else {

    $stmt = Conexion::conectar()->prepare("
      SELECT c.id_curso, c.curso, c.id_carrera, ca.carrera 
      FROM $tabla c
      INNER JOIN carreras ca ON c.id_carrera = ca.id_carrera
    ");

    $stmt->execute();
    return $stmt->fetchAll();
  }

  $stmt = null;
}



	/*=============================================
	MOSTRAR CARRERAS (PARA SELECT)
	=============================================*/

	static public function mdlMostrarCarreras($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY carrera ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CURSO
	=============================================*/

	static public function mdlEditarCurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET curso = :curso, idCarrera = :idCarrera WHERE id_curso = :id_curso");

		$stmt -> bindParam(":curso", $datos["curso"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCarrera", $datos["idCarrera"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CURSO
	=============================================*/

	static public function mdlBorrarCurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_curso = :id_curso");

		$stmt -> bindParam(":id_curso", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}