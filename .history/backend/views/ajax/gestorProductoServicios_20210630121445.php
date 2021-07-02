<?php

require_once "../../controllers/gestorProductoServicio.php";
require_once "../../models/gestorProductoServicio.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL PRODUCTO O SERVICIO
	#----------------------------------------------------------
	
	public $imagenTemporal;

	public function gestorNegociosAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = GestorNegocios::mostrarImagenController($datos);

		echo $respuesta;

	}

	


}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorNegociosAjax();

}

