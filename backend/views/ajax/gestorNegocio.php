<?php

require_once "../../controllers/gestorNegocio.php";
require_once "../../models/gestorNegocio.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL NEGOCIO
	#----------------------------------------------------------
	
	public $imagenTemporal;

	public function gestorNegocioAjax(){

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
	$a -> gestorNegocioAjax();

}

if(isset($_POST["actualizarOrdenNegocios"])){

	$b = new Ajax();
	$b -> actualizarOrdenNegocios = $_POST["actualizarOrdenNegocios"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}