<?php

require_once "backend/models/conexion.php";

class NegocioModels{

	public function seleccionarNegocioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idNegocio, nombreNegocio, imagenNegocio, telefono, correo, direccion, ubicacion, estadoNegocFROM $tabla ORDER BY idNegocio ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}