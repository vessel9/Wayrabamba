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
		$respuesta5 = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	
		$respuesta6 = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
		$respuesta7 = GestorNegocioModel::mostrarNegocioModel("negocio");
		// $mostrarProductoServicio = new GestorProductoServicio();
		// $mostrarProductoServicio -> mostrarProductoServicioController5(); 
		// $mostrarProductoServicio -> mostrarProductoServicioController6();
		// $mostrarProductoServicio -> mostrarProductoServicioController7();




		// var_dump($respuesta);
	

		foreach($respuesta as $row => $item) {
			
			echo ' <li id="'.$item["idproductoServicio"].'" class="bloqueNegocio">
					<span class="handleArticle">
					<a href="index.php?action=productoservicios&idBorrar='.$item["idproductoServicio"].'&rutaImagen='.$item["imagenRuta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>';

					echo '<img src="'.$item["imagenRuta"].'" class="img-thumbnail">
					<h1>'.$item["nombreProductoServicio"].'</h1>
					<h2>'.$item["descripcion"].'</h2>
					<h3>Precio: $'.$item["precio"].'</h3>
					<h4>Cantidad:'.$item["cantidad"].'</h4>
					<h5>Disponibles:'.$item["disponibles"].'</h5>
					<h5>tipo:'.$item["nombreTipo"].'<h5>
					<p>Categoria:'.$item["nombreCategoria"].'</p>
					<ul>Negocio:'.$item["nombreNegocio"].'</ul>
					';
					echo ' <input type="hidden" value="'.$item["nombreTipo"].'">
                    <input type="hidden" value="'.$item["nombreCategoria"].'">
					<a href="#productoservicio'.$item["idproductoServicio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>
					<hr>
				</li>

				<div id="productoservicio'.$item["idproductoServicio"].'" class="modal fade">

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
   #MOSTRAR PARA GUARDAR SELECTS OPTION DE TIPO PRODUCTO SERVICIO/ CATEGORIAS/ NEGOCIO
	#------------------------------------
	public function mostrarProductoServicioController2(){
		$respuesta = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	
			echo'		
			<select name="idTipoProductoServicio" class="form-control" required>
			<option value="0">Elija Tipo</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idTipoProductoServicio"].'">'.$item["nombreTipo"].'</option>';
		}
        echo'</select>';
	}
		
	public function mostrarProductoServicioController3(){
		$respuesta = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
			echo'			
			<select name="idCategoria" class="form-control" required>
			<option value="0">Escoja Categoria</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idCategoria"].'">'.$item["nombreCategoria"].'</option>';
		}
            echo'</select>';
	}
	public function mostrarProductoServicioController4(){
		$respuesta = GestorNegocioModel::mostrarNegocioModel("negocio");
			echo'			
			<select name="idNegocio" class="form-control" required>
			<option value="0">Seleccione Negocio</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idNegocio"].'">'.$item["nombreNegocio"].'</option>';
		}
            echo'</select>';
	}
	

	#BORRAR PRODUCTO SERVICIO
	#------------------------------------

	public function borrarProductoServicioController(){
		

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];
            $respuesta = GestorProductoServicioModel::borrarProductoServicioModel($datosController, "productoservicio");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El producto Servicio ha sido borrado correctamente!",
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
			
		
	}
}
	#ACTUALIZAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function editarProductoServicioController(){

		$ruta = "";

		if(isset($_POST["editarNombreProductoServicio"])){

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
			$datosController = array( "idproductoServicio"=>$_POST["idProductoServicio"],
				                      "nombreProductoServicio"=>$_POST["editarNombreProductoServicio"],
			 	                      "descripcion"=>$_POST["editarDescripcion"],
									  "imagenRuta"=>$ruta,
									  "precio"=>$_POST["editarPrecio"],
			 	                      "cantidad"=>$_POST["editarCantidad"],
                                      "disponibles"=>$_POST["editarDisponibles"],
									  "idTipoProductoServicio"=>$_POST["editarIdTipoProductoServicio"],
									  "idCategoria"=>$_POST["editarIdCategoria"],
									  "idNegocio"=>$_POST["editarIdNegocio"]);
			$respuesta = GestorProductoServicioModel::editarProductoServicioModel($datosController, "productoservicio");
			// var_dump($respuesta);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El producto ha sido actualizado correctamente!",
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