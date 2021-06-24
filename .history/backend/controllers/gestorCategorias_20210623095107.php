<?php

class GestorCategorias{

    
	#GUARDAR CATEGORIA
	#-----------------------------------------------------------
    public function guardarCategoriasController(){
    
        if(isset($_POST["nombresCategorias"])){
            $datosController = array("nombreCategoria"=>$_POST["nombresCategorias"]);
				       
			$respuesta = GestorCategoriasModel::guardarCategoriasModel($datosController, "categorias");
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


		#MOSTRAR CATEGORIA
	#-----------------------------------------------------------

	public function mostrarCategoriasController(){
		// $respuesta = GestorSLideModel::mostrarImagenVistaModel("slide");
		// $respuesta = MensajesModel::mostrarMensajesModel("mensajes");


		$respuesta = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
		// $respuesta = GestorArticulosModel::mostrarArticulosModel("articulos");
		var_dump($respuesta);

		foreach($respuesta as $row => $item) {
			echo "<script>console.log('consoila categorias: " . $respuesta . "' );</script>";

			echo ' <li>
					<span class="handleArticle">
				
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
				
					<h1>hola este es categorias</h1>
	

					<hr>

				</li>';
				

		}
		
	}
	
		#MOSTRAR ARTICULOS
	#-----------------------------------------------------------



	
	public function mostrarArticulosController1(){

		$respuesta = GestorCategoriasModel::mostrarArticulosModel1("categorias");	
	
		var_dump($respuesta);

		foreach($respuesta as $row => $item) {

			echo ' <li>
				
				
					<h1>'.$item["nombreCategoria"].'</h1>
		
					<hr>

				</li>


				</div>';

		}

	}
}