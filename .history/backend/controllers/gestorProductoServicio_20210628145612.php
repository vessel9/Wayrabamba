<?php

class GestorProductoServicio{

	#MOSTRAR IMAGEN PRODUCTO SERVICIO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/productoservicios/temp/productoservicio".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);

			echo $ruta;
		}

	}

	#GUARDAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function guardarProductoServicioController(){

		if(isset($_POST["nombreProductoServicio"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			$borrar = glob("views/images/productoservicios/temp/*");

			foreach($borrar as $file){

				unlink($file);

			}

			$aleatorio = mt_rand(100, 999);

			$ruta = "views/images/productoservicios/productoservicio".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

		$datosController = array("nombreProductoServicio"=>$_POST["nombreProductoServicio"],
			 	                      "descripcion"=>$_POST["descripcion"],
									  "imagenRuta"=>$ruta,
									  "precio"=>$_POST["precio"],
			 	                      "cantidad"=>$_POST["cantidad"],
                                      "disponibles"=>$_POST["disponibles"],
									  "idTipoProductoServicio"=>$_POST["idTipoProductoServicio"],
									  "idCategoria"=>$_POST["idCategoria"],
									  "idNegocio"=>$_POST["idNegocio"]);

			$respuesta = GestorProductoServicioModel::guardarProductoServicioModel($datosController, "productoservicio");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "productoservicios";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#MOSTRAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function mostrarProductoServicioController(){

		$respuesta = GestorProductoServicioModel::mostrarProductoServicioModel("productoservicio", "negocio", "tipoproductoservicio");	
		var_dump($respuesta);
	

		foreach($respuesta as $row => $item) {

			echo ' <li id="'.$item["idproductoServicio"].'" class="bloqueNegocio">
					<span class="handleArticle">
					<a href="index.php?action=productoservicio&idBorrar='.$item["idproductoServicio"].'&rutaImagen='.$item["imagenRuta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarNegocio"></i>	
					</span>
					<img src="'.$item["imagenRuta"].'" class="img-thumbnail">
					<h1>'.$item["nombreProductoServicio"].'</h1>
					<p>'.$item["descripcion"].'</p>
					<p>Precio: '.$item["precio"].'</p>
					<p>Cantidad:'.$item["cantidad"].'</p>
					<p>Disponibles:'.$item["disponibles"].'</p>
					<p>tipo:'.$item["nombreTipo"].'</p>
					<p>Categoria:'.$item["nombreCategoria"].'</p>
					<p>Negocio:'.$item["nombreNegocio"].'</p>



					<input type="hidden" value="'.$item["nombreTipo"].'">
                    <input type="hidden" value="'.$item["nombreCategoria"].'">
					<a href="#articulo'.$item["nombreNegocio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="negocio'.$item["idproductoServicio"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["nombreProductoServicio"].'</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["imagenRuta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["nombreProductoServicio"].'</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}

	}
	
	public function mostrarProductoServicioController2(){

		$respuesta = GestorProductoServicioModel::mostrarProductoServicioModel("productoservicio", "negocio", "tipoproductoservicio");	
		var_dump($respuesta);
		foreach($respuesta as $row => $item) {
			echo'<select name=class="form-control" required>

            <option value=>$item['nombreTipo']?></option>
		';
		}
	

	
	}


	#BORRAR PRODUCTO SERVICIO
	#------------------------------------

	public function borrarProductoServicioController(){
		

		if(isset($_GET["idBorrar"])){


			

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];
            $respuesta = GestorProductoServicioModel::borrarProductoServicioModel($datosController, "productoservicio");


			if($datosController){

					echo('<script>

					swal({
						  title: "Cuidado!",
						  text: "¡Desea borrar!",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Si, borrar!",
						  cancelButtonText: "No, cancelar!",
						  closeOnConfirm: false,
						  closeOnCancel: false
					},

					function(isConfirm){
							 if (isConfirm) {							
								swal("Deleted!", "Your imaginary file has been deleted.", "success");
							    window.location = "productoservicios";
							  } else {
								event.preventDefault();
								swal("Cancelled", "registro a salvo :)", "error");
							  }
					});

				</script>');

			}
			
		
	}
}
	#ACTUALIZAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function editarProductoServicioController(){

		$ruta = "";

		if(isset($_POST["editarTitulo"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen = $_FILES["editarImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/productoservicios/productoservicio".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

				imagejpeg($destino, $ruta);

				$borrar = glob("views/images/productoservicios/temp/*");

				foreach($borrar as $file){
				
					unlink($file);
				
				}

			}

			if($ruta == ""){

				$ruta = $_POST["fotoAntigua"];

			}

			else{

				unlink($_POST["fotoAntigua"]);

			}
			$datosController = array( "idproductoServicio"=>$_POST["idproductoServicio"],
				                      "nombreProductoServicio"=>$_POST["nombreProductoServicio"],
			 	                      "descripcion"=>$_POST["descripcion"],
									  "imagenRuta"=>$ruta,
									  "precio"=>$_POST["precio"],
			 	                      "cantidad"=>$_POST["cantidad"],
                                      "disponibles"=>$_POST["disponibles"],
									  "idNegocio"=>$_POST["idNegocio"],
									  "idCategoria"=>$_POST["idCategoria"],
									  "idTipoProductoServicio"=>$_POST["idTipoProductoServicio"],
									  "idNegocio"=>$_POST["idNegocio"],);
			$respuesta = GestorProductoServicioModel::editarProductoServicioModel($datosController, "productoservicio");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "productoservicios";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	



	
}