<?php

class GestorSlide{

	#MOSTRAR IMAGEN SLIDE AJAX
	#------------------------------------------------------------

	public function mostrarImagenController($datos){

		#getimagesize - Obtiene el tamaño de una imagen

		#LIST(): Al igual que array(), no es realmente una función, es un constructor del lenguaje. list() se utiliza para asignar una lista de variables en una sola operación.

		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
		
		if($ancho < 1600 || $alto < 600){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);

			$ruta = "../../views/images/slide/slide".$aleatorio.".jpg";

			#imagecreatefromjpeg — Crea una nueva imagen a partir de un fichero o de una URL

			$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

			#imagecrop() — Recorta una imagen usando las coordenadas, el tamaño, x, y, ancho y alto dados

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>600]);

			#imagejpeg() — Exportar la imagen al navegador o a un fichero

			imagejpeg($destino, $ruta);

			GestorSlideModel::subirImagenSlideModel($ruta, "slide");

			$respuesta = GestorSlideModel::mostrarImagenSlideModel($ruta, "slide");

			$enviarDatos = array("ruta"=>$respuesta["ruta"],
				                 "titulo"=>$respuesta["titulo"],
				                 "descripcion"=>$respuesta["descripcion"]);

			echo json_encode($enviarDatos);
		}

	}

	#MOSTRAR IMAGENES EN LA VISTA
	#------------------------------------------------------------

	public function mostrarImagenVistaController(){

		$respuesta = GestorSLideModel::mostrarImagenVistaModel("slide");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueSlide">	
			<a href="index.php?action=slide&idConfirmar">
			<span class="fa fa-times"></span></a>
			<img src="'.substr($item["ruta"], 6).'" class="handleImg"></li>';

		}

	}
	// <span class="fa fa-times eliminarSlide" ruta="'.$item["ruta"].'">

	#MOSTRAR IMAGENES EN EL EDITOR
	#------------------------------------------------------------

	public function editorSlideController(){

		$respuesta = GestorSLideModel::mostrarImagenVistaModel("slide");

		foreach($respuesta as $row => $item){

			echo '<li id="item'.$item["id"].'">
					<span class="fa fa-pencil editarSlide" style="background:blue"></span>
					<img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["descripcion"].'</p>
				</li>';

		}

	}
		#CONFIRMAR BORRAR ARTICULO
	#------------------------------------

	public function confirmarBorrarSlideController(){
		
		if(isset($_GET["idConfirmar"])){


			$respuesta = GestorSLideModel::mostrarImagenVistaModel("slide");
			foreach($respuesta as $row => $item) {
					echo('<script>

					swal({
						  title: "Cuidado!",
						  text: "¡Desea borrar Articulo!",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Si, borrar!",
						  cancelButtonText: "No, cancelar!",
						  closeOnConfirm: false,
						  closeOnCancel: false
					},

					function(isConfirm){
							 if (isConfirm) {		
								window.location = "redirectURL";

								swal("OK", "Se elimino diapositiva :)", "success");
								setTimeout(()=>{
									window.location = "slide";
								},1000);

							  } else {
								swal("Cancelled", "registro a salvo :)", "error");
								event.preventDefault();	
								setTimeout(()=>{
									window.location = "slide";
								},1000);							
							  }
						
					
					});

				</script>');

			}
		
		
	}
}

	#ELIMINAR ITEM DEL SLIDE
	#-----------------------------------------------------------
	public function eliminarSlideController($datos){

		$respuesta = GestorSlideModel::eliminarSlideModel($datos, "slide");

		unlink($datos["rutaSlide"]);

		echo $respuesta;

	}

	#ACTUALIZAR ITEM DEL SLIDE
	#-----------------------------------------------------------

	public function actualizarSlideController($datos){

		GestorSlideModel::actualizarSlideModel($datos, "slide");
		$respuesta = GestorSlideModel::seleccionarActualizacionSlideModel($datos, "slide");

		$enviarDatos = array("titulo"=>$respuesta["titulo"],
			                 "descripcion"=>$respuesta["descripcion"]);
		
		echo json_encode($enviarDatos);
	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

		GestorSlideModel::actualizarOrdenModel($datos, "slide");

		$respuesta = GestorSlideModel::seleccionarOrdenModel("slide");

		foreach($respuesta as $row => $item){

			echo'<li id="item'.$item["id"].'">
			     <span class="fa fa-pencil editarSlide" style="background:blue"></span>
			     <img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
			     <h1>'.$item["titulo"].'</h1>
			     <p>'.$item["descripcion"].'</p>
			     </li>';

		}




	}

}