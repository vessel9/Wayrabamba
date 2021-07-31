<?php

require_once "conexion.php";

class GestorNegocioModel{

	#GUARDAR NEGOCIO
	#------------------------------------------------------------

	public function guardarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreNegocio, imagenNegocio, telefono, linkWhatsApp, correo, direccion, ubicacion, estadoNegocio) VALUES (:nombreNegocio, :imagenNegocio, :telefono, :linkWhatsApp, :correo, :direccion, :ubicacion, :estadoNegocio)");

		$stmt -> bindParam(":nombreNegocio", $datosModel["nombreNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenNegocio", $datosModel["imagenNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":linkWhatsApp", $datosModel["linkWhatsApp"], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":ubicacion", $datosModel["ubicacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":estadoNegocio", $datosModel["estadoNegocio"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#MOSTRAR NEGOCIO
	#------------------------------------------------------
	public function mostrarNegocioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idNegocio, nombreNegocio, imagenNegocio, telefono, linkWhatsApp, correo, direccion, ubicacion, estadoNegocio FROM $tabla ORDER BY idNegocio ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR NEGOCIOS
	#-----------------------------------------------------
	public function borrarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idNegocio = :idNegocio");

		$stmt->bindParam(":idNegocio", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR NEGOCIOS
	#---------------------------------------------------
	public function editarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idNegocio = :idNegocio, nombreNegocio = :nombreNegocio, imagenNegocio = :imagenNegocio, telefono = :telefono, linkWhatsApp = :linkWhatsApp, correo = :correo, direccion = :direccion, ubicacion = :ubicacion, estadoNegocio = :estadoNegocio WHERE idNegocio = :idNegocio");	

		$stmt -> bindParam(":nombreNegocio", $datosModel["nombreNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenNegocio", $datosModel["imagenNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);linkWhatsApp
		$stmt -> bindParam(":linkWhatsApp", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":ubicacion", $datosModel["ubicacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":estadoNegocio", $datosModel["estadoNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":idNegocio", $datosModel["idNegocio"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}



}