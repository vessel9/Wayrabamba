<?php
require_once "conexion.php";

class CategoriaModel{
    #GUARDAR CATEGORIA
	#------------------------------------------------------------
public function categoriaModel($datosModel, $tabla)
[
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCategoria) VALUES (:nombreCategoria)");
    $stmt -> bindParam(":nombreCategoria", $datosModel["titulo"], PDO::PARAM_STR);


]
}