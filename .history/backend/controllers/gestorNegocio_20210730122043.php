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

			$aleatorio = mt_rand(800, 400);
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

			// $destino = imagecrop($origen, ["x"=>30, "y"=>20, "width"=>800, "height"=>400]);
			$destino = imagecropauto($origen, IMG_CROP_DEFAULT);


			imagejpeg($destino, $ruta);

			$datosController = array("nombreNegocio"=>ucwords($_POST["nombresNegocios"]),
				                     "imagenNegocio"=>$ruta,
			 	                      "telefono"=>$_POST["telefonoNegocio"],
									   "linkWhatsApp"=>$_POST["WhatsApp"],
									   "correo"=>$_POST["correoNegocio"],
			 	                      "direccion"=>strtoupper($_POST["direccionNegocio"]),
                                      "ubicacion"=>$_POST["ubicacionNegocio"],
									  "estadoNegocio"=>$_POST["estadoNegocios"]);

			$respuesta = GestorNegocioModel::guardarNegocioModel($datosController, "negocio");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El negocio ha sido creado correctamente!",
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

			echo ' <div class="card-columns">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<li class="card" id="'.$item["idNegocio"].'" class="bloqueArticulo" style="max-width:100%;width:800;height:400;">
					<span class="handleArticle">
					 <a href="index.php?action=negocios&idConfirmarNegocio='.$item["idNegocio"].'&confirmaimagenNegocio='.$item["imagenNegocio"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarNegocio"></i>	
					</span>
					
					<img src="'.$item["imagenNegocio"].'" class="img-thumbnail">
					<h1>'.$item["nombreNegocio"].'</h1>
					<br><br>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label>Telefono:</label>
				    </div>
				    <div class="col-xs-9 col-sm-9 col-md-9">
				    <p>'.$item["telefono"].'</p>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label>WhatsApp:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <p><a href="'.$item["linkWhatsApp"].'">'.$item["linkWhatsApp"].'</a></p>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label>Correo:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <h4>'.$item["correo"].'</h4>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label>Direccion:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <h5>'.$item["direccion"].'</h5>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label>Estado:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <ul>'.$item["estadoNegocio"].'</ul>
				    </div>
					<i>';    if( $_SESSION["rol"] == 0){

						echo "Administrador";
				 
					 }
				 
					 else{
				 
						echo "Editor";
				 
						echo<i/>
					<h6 style="display:none">'.$item["ubicacion"].'</h6>
					<a href="#negocio'.$item["idNegocio"].'" data-toggle="modal">
					<div class="col-xs-6 col-sm-6 col-md-12">
					<button class="btn btn-default">Leer ubicación...</button>
					</div>
					</a>
				</li>
				</div>
				</div>

				<div id="negocio'.$item["idNegocio"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["nombreNegocio"].'</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["imagenNegocio"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido"><b>Telefono: </b> '.$item["telefono"].'</p>
							<h5><b>Direccion:</b> '.$item["direccion"].'</h5>
							<b>Ubicacion: </b><div class="col-md-10 col-md-offset-2">'.$item["ubicacion"].'</div>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}

	}
	
	#CONFIRMAR BORRAR NEGOCIO
	#------------------------------------
	public function confirmarBorrarNegocioController(){
		


		if(isset($_GET["idConfirmarNegocio"])){
			$respuesta = GestorNegocioModel::mostrarNegocioModel("negocio");	
			foreach($respuesta as $row => $item) {
					echo('<script>

					swal({
						  title: "Cuidado!",
						  text: "¡Desea borrar el Negocio!",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Si, borrar!",
						  cancelButtonText: "No, cancelar!",
						  closeOnConfirm: false,
						  closeOnCancel: false
					},

					function(isConfirm){
							 if (isConfirm) {							
								window.location.href="index.php?action=negocios&idBorrarNegocio='.$_GET["idConfirmarNegocio"].'&imagenNegocio='.$_GET["confirmaimagenNegocio"].'";							
							  } else {
								event.preventDefault();
								swal("Cancelled", "registro a salvo :)", "error");
								setTimeout(()=>{
									window.location = "negocios";
								},1000);
							  }
					});

				</script>');

			}
		
		
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
				// $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);


				$destino = imagecropauto($origen, IMG_CROP_DEFAULT);

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
                                    "nombreNegocio"=>ucwords($_POST["editarNombreNegocio"]),
				                     "imagenNegocio"=>$ruta,
			 	                      "telefono"=>$_POST["editarTelefono"],
									   "linkWhatsApp"=>$_POST["editarWhatsApp"],
									   "correo"=>$_POST["editarCorreo"],
			 	                      "direccion"=>strtoupper($_POST["editarDireccion"]),
                                      "ubicacion"=>$_POST["editarUbicacion"],
									  "estadoNegocio"=>$_POST["editarEstadoNegocios"]);
			

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