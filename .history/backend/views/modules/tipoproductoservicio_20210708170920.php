<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>
<!--=====================================
TIPO DE SERVICIO ADMINISTRABLE          
======================================-->

<div id="crearPerfil" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	
	<button id="btnAgregarTipoProductoServicio" class="btn btn-info btn-lg">Agregar Tipo Servicio/Producto</button>

	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarTipoProductoServicio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresTipoProductoServicio" style="text-transform:capitalize;" type="text" placeholder="Nombre de Tipo Producto" class="form-control" required>
			<input type="submit" id="guardarTipoProductoServicio" value="Guardar Tipo Producto/servicio" class="btn btn-primary">

		</form>

	</div>
	
	<?php

		$guardarTipoProductoServicio = new GestorTipoProductoServicio();
		$guardarTipoProductoServicio -> guardarTipoProductoServicioController();
		$guardarTipoProductoServicio -> editarTipoProductoServicioController();
	?>
	<!--==== EDITAR ARTÍCULO  ====-->
	</hr>
	<div class="table-responsive">

	<table id="tablaSuscriptores" class="table table-striped display">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre Tipo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php

      $verTipoProductoServicio = new GestorTipoProductoServicio();
	  $verTipoProductoServicio -> mostrarTipoProductoServicioController();
	  $verTipoProductoServicio -> borrarTipoProductoServicioController();

    ?>

    </tbody>
  </table>

  </div>
</div>

<!--=====================================
CATEGORIAS ADMINISTRABLE          
======================================-->


<div id="crearPerfil2"  class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	
	<button id="btnAgregarCategoria" class="btn btn-info btn-lg">Agregar Categoria</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarCategoria" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresCategorias" type="text" style="text-transform:capitalize;" placeholder="Nombre de categoria" class="form-control" required>

			<input type="submit" id="guardarCategoria" value="Guardar Categoria" class="btn btn-primary">

		</form>

	</div>

	<?php

		$guardarCategorias = new GestorCategorias();
		$guardarCategorias -> guardarCategoriasController();
		$guardarCategorias -> editarCategoriasController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->
		<div class="table-responsive">

	<table id="tablaSuscriptores" class="table table-striped display">
    <thead>
      <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php

      $verCategoria = new GestorCategorias();
	  $verCategoria -> mostrarCategoriasController();
      $verCategoria -> borrarCategoriasController();
      
    
    ?>

    </tbody>
  </table>

  </div>

</div>


