<?php
require_once "conexion.php";

class CategoriaModel{
    #GUARDAR CATEGORIA
	#------------------------------------------------------------
public function categoriaModel($datosModel, $tabla){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCategoria) VALUES (:nombreCategoria)");
    
    $stmt -> bindParam(":nombreCategoria", $datosModel["nombreCategoria"], PDO::PARAM_STR);
    
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
	public function mostrarCategoriaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idCategoria, nombreCategoria FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
    
	#BORRAR CATEGORIA
	#-----------------------------------------------------
	public function borrarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria = :idCategoria");

		$stmt->bindParam(":idCategoria", $datosModel, PDO::PARAM_INT);

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
	public function editarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreCategoria = :nombreCategoria WHERE idCategoria = :idCategoria");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCategoria", $datosModel["idCategoria"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}


}