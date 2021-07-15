<?php

require_once "conexion.php";

class GestorPerfilesModel{

	#GUARDAR PERFIL
	#------------------------------------------------------------
	public function guardarPerfilModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email, photo, rol) VALUES (:usuario, :password, :email, :photo, :rol)");

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":photo", $datosModel["photo"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosModel["rol"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR PERFILES
	#------------------------------------------------------
	public function verPerfilesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password,  email, rol, photo FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
		#VISUALIZAR perfil rol o de administrador
	#------------------------------------------------------
	public function verPerfilesModel2($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT rol FROM $tabla WHERE id = :id AND rol=0");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error seelct";

		}

		$stmt->close();

			#VISUALIZAR perfil rol 1 de Editor
	#------------------------------------------------------

	}
	public function verPerfilesModel3($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id AND rol=1");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error seelct";

		}

		$stmt->close();

	

	}



	#ACTUALIZAR PERFIL
	#---------------------------------------------------
	public function editarPerfilModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email, rol = :rol, photo = :photo WHERE id = :id");	

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosModel["rol"], PDO::PARAM_INT);
		$stmt -> bindParam(":photo", $datosModel["photo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR PERFIL
	#-----------------------------------------------------
	public function borrarPerfilModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id AND rol=1");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


}