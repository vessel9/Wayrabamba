<?php

class GestorTipoProductoServicio{

    
	#GUARDAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------
    public function guardarTipoProductoServicioController(){
    
        if(isset($_POST["nombresTipoProductoServicio"])){
            $datosController = array("nombreTipo"=>$_POST["nombresCategoria"]);
				       
			$respuesta = GestorTipoProductoServicioModel::guardarTipoProductoServicioController($datosController, "tipoproductoservicio");
            if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La categoria ha sido creada correctamente!",
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

			else{

				echo $respuesta;

			}
        }
	}


		#MOSTRAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------

	public function mostrarTipoProductoServicioController(){

		$respuesta = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	
		// $respuesta = GestorArticulosModel::mostrarArticulosModel("articulos");
		var_dump($respuesta);
		foreach($respuesta as $row => $item) {
			// echo "<script>console.log('consoila tipoproductoservicio: " . $respuesta . "' );</script>";


				
			echo ' <li id="'.$item["idTipoProductoServicio"].'" class="bloqueArticulo">
			<span class="handleArticle">
			<a href="index.php?action=tipoproductoservicio&idBorrarTipo='.$item["idTipoProductoServicio"].'">
			<i class="fa fa-times btn btn-danger"></i>
			</a>
			<i class="fa fa-pencil btn btn-primary editarCategoria"></i>	
			</span>	

			<h1>'.$item["nombreTipo"].'</h1>
			<hr>

		</li>';

				

		}
		
	}
	#ACTUALIZAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------

	public function editarTipoProductoServicioController(){
		if(isset($_POST["editarNombre"])){
	

			$datosController = array("idCategoria"=>$_POST["idCategoria"],
								     "nombreCategoria"=>$_POST["editarNombre"]);

			$respuesta = GestorCategoriasModel::editarCategoriasModel($datosController, "tipoproductoservicio");

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
							    window.location = "categorias";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		

	}
}
#BORRAR NEGOCIO
	#------------------------------------

	public function borrarTipoProductoServicioController(){
		

		if(isset($_GET["idTipoProductoServicio"])){


			

			// unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idTipoProductoServicio"];
            $respuesta = GestorCategoriasModel::borrarCategoriasModel($datosController, "tipoproductoservicio");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El artículo ha sido borrado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "categorias";
						  } 
				});


			</script>';


			}
			
		
	}
}
}