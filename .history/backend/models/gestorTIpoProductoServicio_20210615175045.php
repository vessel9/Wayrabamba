<?php
require_once "conexion.php";

class GestorTipoProductoServicio{

    #GUARDAR CATEGORIA
	#------------------------------------------------------------
    public function guardarTipoProductoServicioModel($datosModel, $tabla){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreTipo) VALUES (:nombreTipo)");
    
    $stmt -> bindParam(":nombreTipo", $datosModel["nombreTipo"], PDO::PARAM_STR);
    
    if($stmt->execute()){

        return "ok";
    }

    else{

        return "error";
    }

    $stmt->close();

}
	#MOSTRAR CATEGORIA
	#------------------------------------------------------
	public function mostrarTipoProductoServicioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idTipoProductoServicio, nombreTipo FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
    
	#BORRAR CATEGORIA
	#-----------------------------------------------------
	public function borrarTipoProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTipoProductoServicio = :idTipoProductoServicio");

		$stmt->bindParam(":idTipoProductoServicio", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR CATEGORIA
	#---------------------------------------------------
	public function editarTipoProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreTipo = :nombreTipo WHERE idTipoProductoServicio = :idTipoProductoServicio");	

		$stmt -> bindParam(":nombreTipo", $datosModel["nombreTipo"], PDO::PARAM_STR);
		$stmt -> bindParam(":idTipoProductoServicio", $datosModel["idTipoProductoServicio"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}


}