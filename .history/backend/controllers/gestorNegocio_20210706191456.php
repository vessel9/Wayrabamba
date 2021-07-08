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

		if(isset($_POST["nombresNegocios"])){

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

			$datosController = array("nombreNegocio"=>$_POST["nombresNegocios"],
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
							    window.location = "negocios";
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
					<a href="index.php?action=negocios&idBorrarNegocio='.$item["idNegocio"].'&imagenNegocio='.$item["imagenNegocio"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarNegocio"></i>	
					</span>
					<img src="'.$item["imagenNegocio"].'" class="img-thumbnail">
					<h1>'.$item["nombreNegocio"].'</h1>
					<p>'.$item["telefono"].'</p>
					<h5>'.$item["direccion"].'</h5>
					
					<input type="hidden" value="'.$item["ubicacion"].'">
					<a href="#negocio'.$item["idNegocio"].'" data-toggle="modal">
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
							<p>'.$item["ubicacion"].'</h5>
							<h5>'.$item["direccion"].'</h5>
							<div col-md-4 col-md-offset-4"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7979.589108109794!2d-78.48356122895659!3d-0.19776159942283286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a743c13706b%3A0x3edad62731101a68!2sGonzalez%20Suarez%2C%20Quito%20170517!5e0!3m2!1ses!2sec!4v1625616589971!5m2!1ses!2sec" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
			        
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


			

			unlink($_GET["imagenNegocio"]);

			$datosController = $_GET["idBorrarNegocio"];
            $respuesta = GestorNegocioModel::borrarNegocioModel($datosController, "negocio");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El Negocio ha sido borrado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "negocios";
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

		if(isset($_POST["editarNombreNegocio"])){

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
                                    "nombreNegocio"=>$_POST["editarNombreNegocio"],
				                     "imagenNegocio"=>$ruta,
			 	                      "telefono"=>$_POST["editarTelefono"],
			 	                      "direccion"=>$_POST["editarDireccion"],
                                      "ubicacion"=>$_POST["editarUbicacion"]);
			

			$respuesta = GestorNegocioModel::editarNegocioModel($datosController, "negocio");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El negocio ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "negocios";
							  } 
					});


				</script>';

			}

			else{

				echo "<script>console.error('consola negocio: " . $respuesta . "' );</script>";

			}

		}

	}

	



	
}