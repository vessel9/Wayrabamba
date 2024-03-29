<?php

require_once "backend/models/conexion.php";

class NegocioModels{

	public function seleccionarNegocioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idNegocio, nombreNegocio, imagenNegocio, telefono, linkWhatsApp, correo, direccion, ubicacion, estadoNegocio FROM $tabla WHERE estadoNegocio='publico' ORDER BY idNegocio ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}