<?php

class GestorCategoria{

    public function guardaCategoriaController()
    
        if(isset($_POST["nombresCategorias"])){
            $datosController = array("nombreC"=>$_POST["tituloArticulo"],
				                     "introduccion"=>$_POST["introArticulo"]."...",
			 	                      "ruta"=>$ruta,
			 	                      "contenido"=>$_POST["contenidoArticulo"]);

			$respuesta = GestorArticulosModel::guardarArticuloModel($datosController, "articulos");
        }

    
}