<?php

class GestorNegocio{

	#MOSTRAR IMAGEN NEGOCIO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/negocios/temp/negocio".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);

			echo $ruta;
		}

	}

	#GUARDAR NEGOCIO
	#-----------------------------------------------------------

	public function guardarNegocioController(){

		if(isset($_POST["tituloNegocio"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			$borrar = glob("views/images/negocios/temp/*");

			foreach($borrar as $file){

				unlink($file);

			}

			$aleatorio = mt_rand(100, 999);

			$ruta = "views/images/negocios/negocio".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

			$datosController = array("nombreNegocio"=>$_POST["nombresNegocio"],
				                     "imagenNegocio"=>$ruta,
			 	                      "telefono"=>$_POST["telefonoNegocio"],
			 	                      "direccion"=>$_POST["direccionNegocio"],
                                      "ubicacion"=>$_POST["ubicacionNegocio"]);

			$respuesta = GestorNegocioModel::guardarNegocioModel($datosController, "negocio");

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
							    window.location = "articulos";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#MOSTRAR NEGOCIOS
	#-----------------------------------------------------------

	public function mostrarNegociosController(){

		$respuesta = GestorNegocioModel::mostrarNegocioModel("negocio");	

		// var_dump($respuesta);
	

		foreach($respuesta as $row => $item) {

			echo ' <li id="'.$item["idNegocio"].'" class="bloqueNegocio">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrarNegocio='.$item["idNegocio"].'&rutaImagen='.$item["imagenNegocio"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarNegocio"></i>	
					</span>
					<img src="'.$item["imagenNegocio"].'" class="img-thumbnail">
					<h1>'.$item["nombreNegocio"].'</h1>
					<p><b>Numero:</b> '.$item["telefono"].'</p>
					<p><b>Direccion:</b> '.$item["direccion"].'</p>

					<input type="hidden" value="'.$item["direccion"].'">
                    <input type="hidden" value="'.$item["ubicacion"].'">
					<a href="#articulo'.$item["idNegocio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="negocio'.$item["idNegocio"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["nombreNegocio"].'</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["imagenNegocio"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["telefono"].'</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}

	}

	#BORRAR NEGOCIO
	#------------------------------------

	public function borrarNegocioController(){
		

		if(isset($_GET["idBorrarNegocio"])){


			

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrarNegocio"];
            $respuesta = GestorNegocioModel::borrarNegocioModel($datosController, "negocio");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El Tipo de Servicio o producto ha sido borrado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "tipoproductoservicio";
						  } 
				});


			</script>';

			}
			
		
	}
}
	#ACTUALIZAR NEGOCIO
	#-----------------------------------------------------------

	public function editarNegocioController(){

		$ruta = "";

		if(isset($_POST["editarTitulo"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen = $_FILES["editarImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/negocios/negocio".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

				imagejpeg($destino, $ruta);

				$borrar = glob("views/images/negocios/temp/*");

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
		    $datosController = array("idNegocio"=>$_POST["idNegocio"],
                                    "nombreNegocio"=>$_POST["nombresNegocio"],
				                     "imagenNegocio"=>$ruta,
			 	                      "telefono"=>$_POST["telefonoNegocio"],
			 	                      "direccion"=>$_POST["direccionNegocio"],
                                      "ubicacion"=>$_POST["ubicacionNegocio"]);
			

			$respuesta = GestorNegocioModel::editarNegocioModel($datosController, "negocio");

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
							    window.location = "negocio";
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