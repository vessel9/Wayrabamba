<?php

class GestorCategoria{

    
	#GUARDAR categoria
	#-----------------------------------------------------------
    public function guardaCategoriaController()
    
        if(isset($_POST["nombresCategorias"])){
            $datosController = array("nombreCategoria"=>$_POST["nombresCategoria"]);
				       
			$respuesta = GestorArticulosModel::guardarArticuloModel($datosController, "categorias");
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