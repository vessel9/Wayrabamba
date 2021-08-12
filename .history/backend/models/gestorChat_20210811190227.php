<?php
require_once "conexion.php";

class GestorChatModel{

	#GUARDAR CHATBOT
	#------------------------------------------------------------
 
	public function guardarChatModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (pregunta, respuesta) VALUES (:pregunta, :respuesta)");

		$stmt -> bindParam(":pregunta", $datosModel["pregunta"], PDO::PARAM_STR);
		$stmt -> bindParam(":respuesta", $datosModel["respuesta"], PDO::PARAM_STR);
	
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#MOSTRAR CHATBOT
	#------------------------------------------------------
	public function mostrarChatModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, pregunta, respuesta FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR CHATBOT
	#-----------------------------------------------------
	public function borrarChatModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR CHATBOT
	#---------------------------------------------------
	public function editarChatModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta, contenido = :contenido WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}
}