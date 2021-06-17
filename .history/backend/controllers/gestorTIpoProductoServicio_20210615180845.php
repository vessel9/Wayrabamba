<?php

class TipoProductoServicio{

    
	#GUARDAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------
    public function guardarTipoProductoServicioController(){
    
        if(isset($_POST["noTipoProductoServicio"])){
            $datosController = array("nombreCategoria"=>$_POST["nombresCategoria"]);
				       
			$respuesta = GestorCategoriaModel::guardarCategoriaModel($datosController, "categorias");
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


		#MOSTRAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------

	public function mostrarTipoProductoServicioController(){

		$respuesta = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("categorias");	
		// $respuesta = GestorArticulosModel::mostrarArticulosModel("articulos");

		foreach($respuesta as $row => $item) {
			// echo "<script>console.log('consoila categorias: " . $respuesta . "' );</script>";

			echo ' <li>
					<span class="handleArticle">
				
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
				
					<h1>hola este es categorias</h1>
	
					<p>'.$item["nombreCategoria"].'</p>


					<hr>

				</li>';
				

		}
		
	}
}