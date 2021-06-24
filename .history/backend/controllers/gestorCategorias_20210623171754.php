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
			// echo "<script>console.log('consoila categorias: " . $respuesta . "' );</script>";

			echo ' <li id="'.$item["idCategoria"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=cate&idBorrarCategoria='.$item["idCategoria"].'">
					<i class="fa fa-times btn btn-danger"></i>
				    </a>
					<i class="fa fa-pencil btn btn-primary editarCategoria"></i>	
					</span>	

					<h1>'.$item["nombreCategoria"].'</h1>
					<hr>

				</li>';
				

		}
		
	}

	#ACTUALIZAR CATEGORIAS
	#-----------------------------------------------------------

	public function editarCategoriasController(){
		if(isset($_POST["editarNombre"])){
	

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
#BORRAR NEGOCIO
	#------------------------------------

	public function borrarCategoriasController(){
		

		if(isset($_GET["idBorrarCategoria"])){


			

			// unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrarCategoria"];
            $respuesta = GestorCategoriasModel::borrarCategoriasModel($datosController, "categorias");


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