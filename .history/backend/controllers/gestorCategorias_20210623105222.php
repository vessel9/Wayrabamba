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



		$respuesta = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
		// var_dump($respuesta);

		foreach($respuesta as $row => $item) {
			echo "<script>console.log('consoila categorias: " . $respuesta . "' );</script>";

			echo ' <li>
					<span class="handleArticle">
				
					<i class="fa fa-pencil btn btn-primary editarCategoria"></i>	
					</span>
				
					<h1>hola este es categorias</h1>
	

					<hr>

				</li>';
				

		}
		
	}

	#ACTUALIZAR CATEGORIAS
	#-----------------------------------------------------------

	public function editarCategoriasController(){

	

			$datosController = array("idCategoria"=>$_POST["idCategoria"],
								     "nombreCategoria"=>$_POST["editarNombre"]);

			$respuesta = GestorCategoriasModel::editarCategoriasModel($datosController, "categorias");

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