<?php
require_once "conexion.php";

class CategoriaModel{
    #GUARDAR CATEGORIA
	#------------------------------------------------------------
public function categoriaModel($datosModel, $tabla)
[
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, contenido) VALUES (:)");

]
}