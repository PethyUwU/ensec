<?php

require_once "conexion.php";

class ModeloCursos{

	/*=============================================
	CREAR CURSO
	=============================================*/

	static public function mdlIngresarCurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(curso, idCarrera) VALUES (:curso, :idCarrera)");

		$stmt->bindParam(":curso", $datos["curso"], PDO::PARAM_STR);
		$stmt->bindParam(":idCarrera", $datos["idCarrera"], PDO::PARAM_INT);

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

			$stmt = Conexion::conectar()->prepare("SELECT c.*, r.carrera FROM $tabla c INNER JOIN carreras r ON c.idCarrera = r.id WHERE c.$item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT c.*, r.carrera FROM $tabla c INNER JOIN carreras r ON c.idCarrera = r.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET curso = :curso, idCarrera = :idCarrera WHERE id = :id");

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

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}