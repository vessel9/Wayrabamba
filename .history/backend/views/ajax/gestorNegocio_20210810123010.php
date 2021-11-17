<?php

require_once "../../controllers/gestorNegocio.php";
require_once "../../models/gestorNegocio.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL N
	#----------------------------------------------------------
	
	public $imagenTemporal;

	public function gestorNegociosAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = GestorNegocio::mostrarImagenController($datos);

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

if(isset($_POST["actualizarOrdenNegocios"])){

	$b = new Ajax();
	$b -> actualizarOrdenNegocios = $_POST["actualizarOrdenNegocios"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}