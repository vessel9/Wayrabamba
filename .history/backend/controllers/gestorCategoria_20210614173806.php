<?php

class GestorCategoria{

    
	#GUARDAR CATEGORIA
	#-----------------------------------------------------------
    public function guardarCategoriaController(){
    
        if(isset($_POST["nombresCategorias"])){
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


		#MOSTRAR CATEGORIA
	#-----------------------------------------------------------

	public function mostrarCategoriaController(){
		$respuesta = GestorCategoriaModel::mostrarCategoriaModel("categorias");	
		// $respuesta = GestorArticulosModel::mostrarArticulosModel("articulos");	



		foreach($respuesta as $row => $item) {
			// echo "<script>console.log('consoila categorias: " . $respuesta . "' );</script>";

			echo ' <li id="'.$item["idCategoria"].'" class="bloqueArticulo">
					<span class="handleArticle">
				
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
				
					<h1>'.$item["nombreCategoria"].' hola este es categorias</h1>

					<hr>

				</li>

				<div id="articulo'.$item["idCategoria"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["nombreCategoria"].'</h3>
			        
						</div>


						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}

	}
}