<?php

class GestorCategoria{

    public function guardaCategoriaController()
    
        if(isset($_POST["nombresCategorias"])){
            $datosController = array("nombreCategoria"=>$_POST["nombresCategorias"]);
				       
			$respuesta = GestorArticulosModel::guardarArticuloModel($datosController, "articulos");
        }

    
}